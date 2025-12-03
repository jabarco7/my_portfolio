<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use App\Models\ContactMessage;

class ContactController extends Controller
{
    /**
     * Show the contact form.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('contact');
    }

    /**
     * Store a new contact message.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
        ]);

        // Save message to database
        $contactMessage = ContactMessage::create($validated);

        // Send email notification (optional)
        try {
            Mail::to(config('mail.from.address'))->send(new ContactFormMail($contactMessage));
        } catch (\Exception $e) {
            // Log error but continue with success response
            \Log::error('Contact form email failed: ' . $e->getMessage());
        }

        return back()->with('success', 'Thank you for your message! I'll get back to you soon.');
    }
}
