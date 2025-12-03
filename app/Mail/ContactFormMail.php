<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\ContactMessage;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The contact message instance.
     *
     * @var \App\Models\ContactMessage
     */
    public $contactMessage;

    /**
     * Create a new message instance.
     *
     * @param  \App\Models\ContactMessage  $contactMessage
     * @return void
     */
    public function __construct(ContactMessage $contactMessage)
    {
        $this->contactMessage = $contactMessage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New Contact Form Message: ' . $this->contactMessage->subject)
                    ->markdown('emails.contact-form');
    }
}
