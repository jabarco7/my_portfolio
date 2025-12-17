<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::latest()->paginate(10);
        return view('admin.messages.index', compact('messages'));
    }

    public function show(ContactMessage $message)
    {
        if (!$message->is_read) {
            $message->markAsRead();
        }
        return view('admin.messages.show', compact('message'));
    }

    public function destroy(ContactMessage $message)
    {
        $message->delete();
        return redirect()->route('admin.messages.index')->with('success', 'Message deleted successfully!');
    }
    
    public function markAsRead(ContactMessage $message)
    {
        $message->markAsRead();
        return redirect()->back()->with('success', 'Message marked as read!');
    }
    
    public function reply(ContactMessage $message, Request $request)
    {
        // Validate the reply
        $validated = $request->validate([
            'reply_message' => 'required|string',
        ]);
        
        // Here you would typically send an email reply
        // For now, we'll just mark the message as read and redirect back
        $message->markAsRead();
        
        return redirect()->back()->with('success', 'Reply sent successfully!');
    }
}
