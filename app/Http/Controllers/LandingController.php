<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use App\Rules\Recaptcha;
use Illuminate\Support\Facades\Log;

class LandingController extends Controller
{
    public function index()
    {
        $services = Service::where('is_active', true)->where('is_live_chat', false)->orderBy('sort_order', 'asc')->get();
        $partners = Partner::where('is_active', true)->orderBy('sort_order')->get();
        return view("pages.landing.index", compact("services", "partners"));
    }

    public function about()
    {
        return view("pages.landing.about");
    }

    public function course()
    {
        return view("pages.landing.course");
    }

    public function shop()
    {
        return view("pages.landing.shop");
    }

    public function contact()
    {
        return view("pages.landing.contact");
    }

    public function contactSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'service' => 'required|string|max:255',
            'description' => 'required|string',
            'confirm' => 'required|accepted',
            'g-recaptcha-response' => ['required', new Recaptcha]
        ]);

        try {
            // Send email to admin
            Mail::to(config('mail.admin_email'))->send(new ContactFormMail([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'service' => $request->service,
                'description' => $request->description
            ]));

            return response()->json([
                'message' => 'Ihre Nachricht wurde erfolgreich gesendet!'
            ]);
        } catch (\Exception $e) {
            Log::error('Contact form submission failed: ' . $e->getMessage());
            return response()->json([
                'message' => 'Ein Fehler ist aufgetreten. Bitte versuchen Sie es später erneut.'
            ], 500);
        }
    }

    public function medien()
    {
        $partners = Partner::where('is_active', true)->orderBy('sort_order')->get();
        return view("pages.landing.media", compact("partners"));
    }

    public function booking()
    {
        return view("pages.landing.booking");
    }

    public function payment()
    {
        return view("pages.landing.payment");
    }

    public function impressum()
    {
        return view('pages.landing.impressum');
    }

    public function datenschutz()
    {
        return view('pages.landing.datenschutz');
    }

    public function agb()
    {
        return view('pages.landing.agb');
    }

    public function payments()
    {
        $services = Service::where('is_active', true)->where('is_live_chat', false)->orderBy('sort_order', 'asc')->get();
        return view('pages.landing.account.payments', compact('services'));
    }
}
