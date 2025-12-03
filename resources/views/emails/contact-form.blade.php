@component('mail::message')
# New Contact Form Message

You have received a new message from your website contact form.

**Name:** {{ $contactMessage->name }}

**Email:** {{ $contactMessage->email }}

**Subject:** {{ $contactMessage->subject }}

**Message:**
{{ $contactMessage->message }}

---

This message was sent from your website's contact form.
@endcomponent
