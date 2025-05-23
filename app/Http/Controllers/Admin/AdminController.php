<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Course;
use App\Models\Booking;
use App\Models\ChatMessage;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        // Get counts
        $productCount = Product::count();
        $courseCount = Course::count();
        $orderCount = Order::count();
        $bookingCount = Booking::count();

        // Get user statistics
        $registeredUserCount = User::count();
        $guestOrderCount = Order::whereNull('user_id')->count();
        $averageOrderValue = Order::where('status', 'delivered')
            ->avg('total');

        // Calculate total benefits
        $totalBenefits = Order::where('status', 'delivered')->sum('total');

        // Get recent orders with user and order items
        $recentOrders = Order::with(['user', 'items'])
            ->latest()
            ->take(5)
            ->get();

        // Get recent guest orders
        $recentGuestOrders = Order::with('items')
            ->whereNull('user_id')
            ->latest()
            ->take(5)
            ->get();

        // Get recent bookings with user
        $recentBookings = Booking::with('user')
            ->latest()
            ->take(5)
            ->get();

        // Get top selling products
        $topProducts = Product::select('products.*')
            ->selectRaw('COUNT(order_items.id) as sales_count')
            ->selectRaw('SUM(order_items.quantity * order_items.price) as total_revenue')
            ->leftJoin('order_items', 'products.id', '=', 'order_items.product_id')
            ->leftJoin('orders', 'order_items.order_id', '=', 'orders.id')
            ->where('orders.status', 'delivered')
            ->groupBy('products.id')
            ->orderBy('sales_count', 'desc')
            ->take(5)
            ->get();

        // Get sales data for chart
        $salesData = new Collection();

        // Get last 30 days
        $dates = collect();
        for ($i = 29; $i >= 0; $i--) {
            $dates->push(Carbon::now()->subDays($i)->format('Y-m-d'));
        }

        // Get course sales
        $courseSales = Booking::where('status', 'completed')
            ->where('payment_status', 'paid')
            ->where('created_at', '>=', Carbon::now()->subDays(30))
            ->selectRaw('DATE(created_at) as date, SUM(amount) as total')
            ->groupBy('date')
            ->get()
            ->pluck('total', 'date');

        // Get product sales (both guest and registered users)
        $productSales = Order::where('status', 'delivered')
            ->where('created_at', '>=', Carbon::now()->subDays(30))
            ->selectRaw('DATE(created_at) as date, SUM(total) as total')
            ->groupBy('date')
            ->get()
            ->pluck('total', 'date');

        // Get guest sales
        $guestSales = Order::whereNull('user_id')
            ->where('status', 'delivered')
            ->where('created_at', '>=', Carbon::now()->subDays(30))
            ->selectRaw('DATE(created_at) as date, SUM(total) as total')
            ->groupBy('date')
            ->get()
            ->pluck('total', 'date');

        // Combine all sales data
        foreach ($dates as $date) {
            $salesData->push([
                'date' => $date,
                'course' => $courseSales[$date] ?? 0,
                'product' => $productSales[$date] ?? 0,
                'guest' => $guestSales[$date] ?? 0,
                'other' => 0,
                'total' => ($courseSales[$date] ?? 0) + ($productSales[$date] ?? 0)
            ]);
        }

        return view('pages.admin.dashboard', compact(
            'productCount',
            'courseCount',
            'orderCount',
            'bookingCount',
            'totalBenefits',
            'recentOrders',
            'recentGuestOrders',
            'recentBookings',
            'salesData',
            'topProducts',
            'registeredUserCount',
            'guestOrderCount',
            'averageOrderValue'
        ));
    }
}
