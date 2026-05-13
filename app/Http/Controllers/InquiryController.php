<?php

namespace App\Http\Controllers;

use App\Mail\InquiryAcknowledgement;
use App\Models\Inquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class InquiryController extends Controller
{
    public function store(Request $request)
    {
        if (! $request->has('cf-turnstile-response')) {
            Log::warning('Turnstile response missing from inquiry request', ['ip' => $request->ip()]);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:255',
            'event_date' => 'nullable|date',
            'product_interest' => 'nullable|string|max:255',
            'message' => 'required|string',
            'image' => 'nullable|image|max:10240', // 10MB
            // 'cf-turnstile-response' => 'required|string',
        ]);

        // $response = Http::asForm()->post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
        //     'secret' => config('services.turnstile.secret'),
        //     'response' => $validated['cf-turnstile-response'],
        //     'remoteip' => $request->ip(),
        // ]);

        // if (! $response->json('success')) {
        //     return back()->withErrors(['cf-turnstile-response' => 'Cloudflare Turnstile verification failed. Please try again.'])->withInput();
        // }

        $inquiry = Inquiry::create(Arr::except($validated, ['image', 'cf-turnstile-response']));

        if ($request->hasFile('image')) {
            $inquiry->addMediaFromRequest('image')
                ->toMediaCollection('picture');
        }

        if ($inquiry->email) {
            try {
                Mail::to($inquiry->email)->send(new InquiryAcknowledgement($inquiry));
            } catch (\Exception $e) {
                Log::error('Failed to send inquiry acknowledgement email: '.$e->getMessage());
            }
        }

        return back()->with('success', 'Thank you for your inquiry! We will get back to you soon.');
    }
}
