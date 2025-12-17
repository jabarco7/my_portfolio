@extends('admin.layouts.app')

@section('title', 'Message Details')

@section('content')
<div class="card rounded-lg shadow overflow-hidden mb-6">
    <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 flex items-center justify-between">
        <h3 class="text-lg font-medium text-gray-900 dark:text-white">Message Details</h3>
        <div>
            <a href="{{ route('admin.messages.index') }}" class="btn btn-secondary mr-2">
                <i class="fas fa-arrow-left"></i> Back to Messages
            </a>
            <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this message?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-secondary text-red-600 dark:text-red-400">
                    <i class="fas fa-trash"></i> Delete
                </button>
            </form>
        </div>
    </div>

    <div class="p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">From</h4>
                <p class="text-lg font-medium text-gray-900 dark:text-white">{{ $message->name }}</p>
                <p class="text-sm text-gray-600 dark:text-gray-400">{{ $message->email }}</p>
            </div>

            <div>
                <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Date</h4>
                <p class="text-lg font-medium text-gray-900 dark:text-white">{{ $message->created_at->format('F d, Y \a\t g:i A') }}</p>
                <p class="text-sm text-gray-600 dark:text-gray-400">{{ $message->created_at->diffForHumans() }}</p>
            </div>
        </div>

        <div class="mb-6">
            <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Subject</h4>
            <p class="text-lg font-medium text-gray-900 dark:text-white">{{ $message->subject }}</p>
        </div>

        <div>
            <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Message</h4>
            <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4 mt-2">
                <p class="text-gray-900 dark:text-white whitespace-pre-wrap">{{ $message->message }}</p>
            </div>
        </div>

        @if (!$message->is_read)
            <div class="mt-6">
                <form action="{{ route('admin.messages.mark-read', $message->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-check"></i> Mark as Read
                    </button>
                </form>
            </div>
        @endif
    </div>
</div>

<div class="card rounded-lg shadow p-6">
    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Reply to Message</h3>

    <form action="{{ route('admin.messages.reply', $message->id) }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="to" class="form-label">To</label>
            <input type="email" id="to" name="to" value="{{ $message->email }}" class="form-input" required>
        </div>

        <div class="mb-4">
            <label for="subject" class="form-label">Subject</label>
            <input type="text" id="subject" name="subject" value="Re: {{ $message->subject }}" class="form-input" required>
        </div>

        <div class="mb-4">
            <label for="message" class="form-label">Message</label>
            <textarea id="message" name="message" rows="6" class="form-input" required></textarea>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-paper-plane"></i> Send Reply
            </button>
        </div>
    </form>
</div>
@endsection
