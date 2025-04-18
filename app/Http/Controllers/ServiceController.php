<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Stripe\Exception\ApiErrorException;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Mail\ServiceAccessEmail;
use App\Mail\ServicePurchaseMail;
use App\Notifications\ServicePurchased;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    protected $paypalProvider;

    public function __construct()
    {
        // Initialize PayPal
        $this->paypalProvider = new PayPalClient;
        $this->paypalProvider->setApiCredentials(config('paypal'));
        $this->paypalProvider->getAccessToken();
    }

    public function index()
    {
        $services = Service::where('is_active', true)->orderBy('sort_order', 'asc')->get();
        return view('pages.landing.services', compact('services'));
    }

    public function prices()
    {
        $services = Service::where('is_active', true)->orderBy('sort_order', 'asc')->get();
        return view('pages.landing.prices', compact('services'));
    }

    public function show($id)
    {
        $service = Service::findOrFail($id);
        return view('pages.landing.service-details', compact('service'));
    }

    public function createPaymentIntent(Request $request)
    {
        try {
            $request->validate([
                'service_id' => 'required',
                'payment_method' => 'required|in:stripe,paypal,twint'
            ]);

            $service = Service::findOrFail($request->service_id);
            $amount = $service->price * 100; // Convert to cents

            if ($request->payment_method === 'stripe') {
                Stripe::setApiKey(config('services.stripe.secret'));

                $paymentIntent = PaymentIntent::create([
                    'amount' => $amount,
                    'currency' => 'chf',
                    'payment_method_types' => ['card'],
                    'metadata' => [
                        'user_id' => auth()->id(),
                        'service_id' => $service->id,
                        'service_name' => $service->title
                    ]
                ]);

                return response()->json([
                    'clientSecret' => $paymentIntent->client_secret,
                    'paymentIntentId' => $paymentIntent->id
                ]);
            } elseif ($request->payment_method === 'twint') {
                Stripe::setApiKey(config('services.stripe.secret'));

                // Create a payment intent with TWINT as the payment method
                $paymentIntent = PaymentIntent::create([
                    'amount' => $amount,
                    'currency' => 'chf',
                    'payment_method_types' => ['twint'],
                    'metadata' => [
                        'user_id' => auth()->id(),
                        'service_id' => $service->id,
                        'service_name' => $service->title
                    ]
                ]);

                // Create a payment method for TWINT
                $paymentMethod = \Stripe\PaymentMethod::create([
                    'type' => 'twint',
                    'billing_details' => [
                        'name' => auth()->user()->name,
                        'email' => auth()->user()->email
                    ]
                ]);

                // Attach the payment method to the payment intent
                $paymentIntent = PaymentIntent::update($paymentIntent->id, [
                    'payment_method' => $paymentMethod->id
                ]);

                // Confirm the payment intent to get the QR code
                $paymentIntent = \Stripe\PaymentIntent::retrieve($paymentIntent->id);
                $paymentIntent->confirm([
                    'return_url' => route('service.payment.success') . '?service_id=' . $service->id . '&payment_method=twint'
                ]);

                // Check if the payment intent requires action and has a QR code
                if ($paymentIntent->status === 'requires_action' &&
                    isset($paymentIntent->next_action) &&
                    isset($paymentIntent->next_action->redirect_to_url) &&
                    isset($paymentIntent->next_action->redirect_to_url->url)) {

                    $redirectUrl = $paymentIntent->next_action->redirect_to_url->url;

                    return response()->json([
                        'redirectUrl' => $redirectUrl,
                        'paymentIntentId' => $paymentIntent->id,
                        'clientSecret' => $paymentIntent->client_secret,
                        'status' => 'requires_action'
                    ]);
                }

                // If no QR code is available, return an error
                return response()->json([
                    'error' => 'QR-Code konnte nicht generiert werden. Bitte versuchen Sie es später erneut.',
                    'status' => 'error'
                ], 400);
            } else {
                // PayPal payment
                $order = [
                    "intent" => "CAPTURE",
                    "purchase_units" => [
                        [
                            "invoice_id" => uniqid('SERVICE-'),
                            "amount" => [
                                "currency_code" => "CHF",
                                "value" => number_format($service->price, 2, '.', ''),
                            ],
                            "description" => $service->title
                        ]
                    ],
                    "application_context" => [
                        "return_url" => route('service.payment.success') . '?service_id=' . $service->id,
                        "cancel_url" => route('service.payment.cancel'),
                        "user_action" => "PAY_NOW"
                    ]
                ];

                $response = $this->paypalProvider->createOrder($order);

                if (isset($response['id']) && $response['id'] != null) {
                    foreach ($response['links'] as $links) {
                        if ($links['rel'] == 'approve') {
                            return response()->json([
                                'orderId' => $response['id'],
                                'approvalUrl' => $links['href'],
                            ]);
                        }
                    }
                }

                return response()->json(['error' => 'Erstellung der PayPal-Bestellung fehlgeschlagen'], 500);
            }
        } catch (\Exception $e) {
            Log::error('Service Payment Error: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function handleSuccess(Request $request)
    {
        try {
            $paymentMethod = $request->input('payment_method');
            $serviceId = $request->input('service_id');

            if ($paymentMethod === 'stripe') {
                $paymentIntentId = $request->input('paymentIntentId');
                Stripe::setApiKey(config('services.stripe.secret'));
                $paymentIntent = PaymentIntent::retrieve($paymentIntentId);

                if ($paymentIntent->status !== 'succeeded') {
                    return redirect()->route('prices')
                        ->with('error', 'Zahlung war nicht erfolgreich');
                }

                $this->createServiceOrder($serviceId, 'stripe', $paymentIntent->id);
            } elseif ($paymentMethod === 'twint') {
                $paymentIntentId = $request->input('payment_intent');
                Stripe::setApiKey(config('services.stripe.secret'));
                $paymentIntent = PaymentIntent::retrieve($paymentIntentId);

                if ($paymentIntent->status !== 'succeeded') {
                    return redirect()->route('prices')
                        ->with('error', 'TWINT Zahlung war nicht erfolgreich');
                }

                $this->createServiceOrder($serviceId, 'twint', $paymentIntent->id);
            } else {
                // PayPal success handling
                $provider = $this->paypalProvider;
                $response = $provider->capturePaymentOrder($request->token);

                if (isset($response['status']) && $response['status'] === 'COMPLETED') {
                    $this->createServiceOrder($serviceId, 'paypal', $response['id']);
                } else {
                    return redirect()->route('prices')
                        ->with('error', 'Zahlung war nicht erfolgreich');
                }
            }

            return redirect()->route('prices')
                ->with('success', 'Zahlung war erfolgreich. Du erhältst demnächst eine Mail mit dem weiteren Vorgehen.');
        } catch (\Exception $e) {
            Log::error('Service Payment Success Error: ' . $e->getMessage());
            return redirect()->route('prices')
                ->with('error', 'Es kam zu einem Fehler während der Verarbeitung deiner Zahlung. Bitte kontaktiere mich.');
        }
    }

    public function handleCancel()
    {
        return redirect()->route('prices')
            ->with('error', 'Zahlung wurde abgebrochen');
    }

    private function createServiceOrder($serviceId, $paymentMethod, $transactionId)
    {
        try {
            DB::beginTransaction();

            $service = Service::findOrFail($serviceId);
            $user = auth()->user();

            // Create order
            $order = Order::create([
                'user_id' => $user->id,
                'order_number' => 'SERVICE-' . strtoupper(uniqid()),
                'status' => 'completed',
                'payment_status' => 'completed',
                'payment_method' => $paymentMethod,
                'payment_id' => $transactionId,
                'total' => $service->price,
                'subtotal' => $service->price,
                'tax' => 0,
                'shipping_cost' => 0,
                'shipping_first_name' => $user->first_name,
                'shipping_last_name' => $user->last_name,
                'shipping_email' => $user->email,
                'shipping_phone' => '',
                'shipping_address' => '',
                'shipping_city' => '',
                'shipping_state' => '',
                'shipping_postal_code' => '',
                'shipping_country' => '',
            ]);

            // Create order item with service details in options
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $service->id,
                'product_type' => 'service',
                'quantity' => 1,
                'price' => $service->price,
                'name' => $service->title,
                'options' => [
                    'description' => $service->description,
                    'duration' => $service->duration,
                    'location' => $service->location
                ]
            ]);

            // Send service access email
            Mail::to($user->email)->send(new ServiceAccessEmail($service, $order));

            try {
                Mail::to(config('mail.admin_email'))->send(new ServicePurchaseMail(
                    $service,
                    auth()->user(),
                    $transactionId,
                    $paymentMethod
                ));
            } catch (\Exception $e) {
                \Log::error('Fehler beim Versand der E-Mail zum Servicekauf ' . $e->getMessage());
            }

            // Send notification after successful purchase
            $user->notify(new ServicePurchased($service));

            DB::commit();
        } catch (\Exception $e) {
            dd($e);
            DB::rollBack();
            throw $e;
        }
    }
}
