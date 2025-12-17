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

    /**
     * الحصول على الرسائل الجديدة عبر AJAX
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getNewMessages(Request $request)
    {
        $lastMessageId = $request->input('last_message_id', 0);

        $newMessages = ContactMessage::where('id', '>', $lastMessageId)
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'messages' => $newMessages,
            'count' => $newMessages->count()
        ]);
    }

    /**
     * Mark all messages as read.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function markAllAsRead(Request $request)
    {
        $messageIds = $request->input('message_ids', []);

        if (empty($messageIds)) {
            return response()->json([
                'success' => false,
                'message' => 'No message IDs provided'
            ], 400);
        }

        // Update all messages as read
        $updated = ContactMessage::whereIn('id', $messageIds)->update(['is_read' => true]);

        if ($updated > 0) {
            return response()->json([
                'success' => true,
                'message' => 'All messages marked as read successfully!'
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'No messages were updated'
        ], 400);
    }
}
