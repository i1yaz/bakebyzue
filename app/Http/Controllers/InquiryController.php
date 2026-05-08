<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function store(\Illuminate\Http\Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:255',
            'event_date' => 'nullable|date',
            'product_interest' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);
        
        \App\Models\Inquiry::create($validated);
        
        return back()->with('success', 'Thank you for your inquiry! We will get back to you soon.');
    }
}
