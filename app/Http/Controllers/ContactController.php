<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactFormMail;
use App\Models\ContactMessage;
use App\Services\ContactService;

class ContactController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ContactFormRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ContactFormRequest $request)
    {
        // Create the contact message
        $contactMessage = ContactMessage::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'ip_address' => $request->ip(),
        ]);

        // Send email notification
        try {
            Mail::to(config('mail.from.address'))->send(new ContactFormMail($contactMessage));
        } catch (\Exception $e) {
            // Log error but continue with success response
            \Log::error('Failed to send contact email: ' . $e->getMessage());
        }

        return redirect()->back()->with('success', 'Your message has been sent successfully. Thank you!');
    }
}