<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function store(Request $request)
    {
        if ($request->filled('hp_phone_field')) {
            return back()->with('success', 'Thank you for your inquiry!'); // Fake success for bots
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'phone' => 'nullable|string|max:20',
            'company_name' => 'nullable|string|max:255',
            'product_id' => 'nullable|exists:products,id',
            'quantity' => 'nullable|integer',
            'project_description' => 'nullable|string',
        ]);

        \App\Models\Inquiry::create($validated);

        return back()->with('success', 'Your inquiry has been sent successfully! Our team will contact you soon.');
    }
}
