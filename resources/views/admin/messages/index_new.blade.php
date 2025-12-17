@extends('admin.layouts.app')

@section('title', 'Messages')

@section('content')
    <!-- Header Section -->
    <div class="bg-gradient-to-r from-blue-500 to-purple-600 rounded-xl shadow-lg p-6 mb-8 text-white">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold mb-2">Contact Messages</h1>
                <p class="text-blue-100">Manage messages from your contact form</p>
            </div>
            <div class="flex items-center space-x-2">
                <a href="{{ route('admin.dashboard') }}" class="bg-white/20 hover:bg-white/30 text-white px-4 py-2 rounded-lg font-medium transition-colors flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i> Dashboard
                </a>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-6 border border-gray-100 dark:border-gray-700">
            <div class="flex items-center justify-between mb-2">
                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Messages</h3>
                <i class="fas fa-envelope text-blue-500"></i>
            </div>
            <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $messages->count() }}</p>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-6 border border-gray-100 dark:border-gray-700">
            <div class="flex items-center justify-between mb-2">
                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Read</h3>
                <i class="fas fa-envelope-open text-green-500"></i>
            </div>
            <p class="text-2xl font-bold text-gray-900 dark:text-white">
                {{ $messages->where('is_read', true)->count() }}</p>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-6 border border-gray-100 dark:border-gray-700">
            <div class="flex items-center justify-between mb-2">
                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Unread</h3>
                <i class="fas fa-envelope text-yellow-500"></i>
            </div>
            <p class="text-2xl font-bold text-gray-900 dark:text-white">
                {{ $messages->where('is_read', false)->count() }}</p>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-6 border border-gray-100 dark:border-gray-700 relative overflow-hidden">
            <div class="flex items-center justify-between mb-2">
                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">New Messages</h3>
                <i class="fas fa-bell text-red-500 animate-pulse"></i>
            </div>
            <p id="new-messages-count" class="text-2xl font-bold text-gray-900 dark:text-white">0</p>
            <div class="absolute top-0 right-0 -mt-4 -mr-4 w-16 h-16 bg-red-500 rounded-full opacity-10"></div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-6 border border-gray-100 dark:border-gray-700">
            <div class="flex items-center justify-between mb-2">
                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Today</h3>
                <i class="fas fa-calendar-day text-purple-500"></i>
            </div>
            <p class="text-2xl font-bold text-gray-900 dark:text-white">
                {{ $messages->where('created_at', '>=', now()->startOfDay())->count() }}</p>
        </div>
    </div>

    <!-- Messages Table -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 dark:border-gray-700 flex items-center justify-between">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white">All Messages</h2>
            <div class="flex items-center space-x-2">
                <button id="mark-all-read-btn"
                    class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 transition-colors"
                    title="Mark All as Read">
                    <i class="fas fa-envelope-open"></i>
                </button>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-100 dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-gray-900">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            From</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            Email</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            Subject</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            Date</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            Status</th>
                        <th scope="col"
                            class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                    @forelse ($messages as $message)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors {{ !$message->is_read ? 'bg-blue-50 dark:bg-blue-900/10' : '' }}">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <div class="h-10 w-10 rounded-full bg-gradient-to-br from-blue-500 to-purple-500 flex items-center justify-center">
                                            <span class="text-white font-medium">{{ substr($message->name, 0, 1) }}</span>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900 dark:text-white">{{ $message->name }}
                                        </div>
                                        <div class="text-sm text-gray-500 dark:text-gray-400">ID: {{ $message->id }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="mailto:{{ $message->email }}" target="_blank"
                                    class="text-sm text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 truncate max-w-xs block"
                                    title="{{ $message->email }}">
                                    {{ Str::limit($message->email, 30) }}
                                    <i class="fas fa-external-link-alt ml-1"></i>
                                </a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                {{ Str::limit($message->subject, 30) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                {{ $message->created_at->format('M d, Y') }}
                                <div class="text-xs">{{ $message->created_at->diffForHumans() }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if ($message->is_read)
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300">Read</span>
                                @else
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300">Unread</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex items-center justify-end space-x-2">
                                    <a href="{{ route('admin.messages.show', $message->id) }}"
                                        class="text-blue-600 dark:text-blue-400 hover:text-blue-900 dark:hover:text-blue-300"
                                        title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    @if (!$message->is_read)
                                        <form action="{{ route('admin.messages.mark-read', $message->id) }}" method="POST" class="inline">
                                            @csrf
                                            
                                            <button type="submit"
                                                class="text-green-600 dark:text-green-400 hover:text-green-900 dark:hover:text-green-300"
                                                title="Mark as Read">
                                                <i class="fas fa-envelope-open"></i>
                                            </button>
                                        </form>
                                    @endif
                                    <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST" class="inline"
                                        onsubmit="return confirm('Are you sure you want to delete this message?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-red-600 dark:text-red-400 hover:text-red-900 dark:hover:text-red-300"
                                            title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center">
                                    <div
                                        class="w-16 h-16 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center mb-4">
                                        <i class="fas fa-envelope text-gray-400 dark:text-gray-500 text-2xl"></i>
                                    </div>
                                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">No messages yet
                                    </h3>
                                    <p class="text-gray-500 dark:text-gray-400 mb-4">Messages from your contact form will appear here</p>
                                    <a href="{{ route('contact') }}" target="_blank"
                                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                                        <i class="fas fa-external-link-alt mr-2"></i> View Contact Form
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    @if ($messages->hasPages())
        <div class="bg-white dark:bg-gray-900 px-4 py-3 flex items-center justify-between border-t border-gray-200 dark:border-gray-700 sm:px-6">
            <div class="flex-1 flex justify-between sm:hidden">
                                {{ $messages->links() }}
            </div>
            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm text-gray-700 dark:text-gray-300">
                        Showing
                        <span class="font-medium">{{ $messages->firstItem() }}</span>
                        to
                        <span class="font-medium">{{ $messages->lastItem() }}</span>
                        of
                        <span class="font-medium">{{ $messages->total() }}</span>
                        results
                    </p>
                </div>
                <div>
                    {{ $messages->links() }}
                </div>
            </div>
        </div>
    @endif
</div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // الحصول على معرف آخر رسالة في الصفحة
            let lastMessageId = 0;
            const firstMessageRow = document.querySelector('tbody tr:first-child');
            if (firstMessageRow) {
                const messageIdElement = firstMessageRow.querySelector('.text-sm.text-gray-500');
                if (messageIdElement) {
                    lastMessageId = parseInt(messageIdElement.textContent.replace('ID: ', ''));
                }
            }

            // التحقق من الرسائل الجديدة كل 5 ثوانٍ
            setInterval(function() {
                fetch(`{{ route('admin.messages.new') }}?last_message_id=${lastMessageId}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.count > 0) {
                            // عرض إشعار بوجود رسائل جديدة
                            const notification = document.createElement('div');
                            notification.className = 'fixed top-4 right-4 bg-blue-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 flex items-center';
                            notification.innerHTML = `
                                <i class="fas fa-envelope mr-2"></i>
                                <span>You have ${data.count} new message${data.count > 1 ? 's' : ''}!</span>
                                <button class="ml-4 text-white hover:text-gray-200" onclick="location.reload()">
                                    <i class="fas fa-sync-alt"></i>
                                </button>
                            `;
                            document.body.appendChild(notification);

                            // إزالة الإشعار بعد 10 ثوانٍ
                            setTimeout(() => {
                                notification.remove();
                            }, 10000);

                            // تحديث معرف آخر رسالة
                            if (data.messages.length > 0) {
                                lastMessageId = data.messages[0].id;
                            }
                        }
                    })
                    .catch(error => {
                        console.error('Error checking for new messages:', error);
                    });
            }, 5000); // التحقق كل 5 ثوانٍ

            // تحديث عداد الرسائل الجديدة
            function updateNewMessagesCount() {
                fetch(`{{ route('admin.messages.new') }}?last_message_id=0`)
                    .then(response => response.json())
                    .then(data => {
                        const countElement = document.getElementById('new-messages-count');
                        if (countElement) {
                            countElement.textContent = data.count;

                            // إضافة تأثير بصري عند وجود رسائل جديدة
                            if (data.count > 0) {
                                countElement.parentElement.classList.add('ring-2', 'ring-red-500', 'ring-opacity-50');
                            } else {
                                countElement.parentElement.classList.remove('ring-2', 'ring-red-500', 'ring-opacity-50');
                            }
                        }
                    })
                    .catch(error => {
                        console.error('Error updating new messages count:', error);
                    });
            }

            // تحديث العداد عند تحميل الصفحة
            updateNewMessagesCount();

            // تحديث العداد كل 30 ثانية
            setInterval(updateNewMessagesCount, 30000);

            // Mark all as read functionality
            const markAllReadBtn = document.getElementById('mark-all-read-btn');

            if (markAllReadBtn) {
                markAllReadBtn.addEventListener('click', function() {
                    if (confirm('Are you sure you want to mark all messages as read?')) {
                        const unreadMessageIds = [];
                        document.querySelectorAll('tr:has(.bg-yellow-100)').forEach(row => {
                            const markReadForm = row.querySelector('form[action*="mark-read"]');
                            if (markReadForm) {
                                unreadMessageIds.push(markReadForm.action.match(/\/\d+$/)[0].substring(1));
                            }
                        });

                        if (unreadMessageIds.length > 0) {
                            // Send AJAX request to mark all as read
                            fetch('{{ route('admin.messages.mark-all-read') }}', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                },
                                body: JSON.stringify({
                                    message_ids: unreadMessageIds
                                })
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    // Show success message
                                    const successMessage = document.createElement('div');
                                    successMessage.className = 'fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50';
                                    successMessage.textContent = 'All messages marked as read!';
                                    document.body.appendChild(successMessage);

                                    // Reload page after showing success message
                                    setTimeout(() => {
                                        successMessage.remove();
                                        location.reload();
                                    }, 1500);
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                // Show error message
                                const errorMessage = document.createElement('div');
                                errorMessage.className = 'fixed top-4 right-4 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg z-50';
                                errorMessage.textContent = 'An error occurred. Please try again.';
                                document.body.appendChild(errorMessage);

                                setTimeout(() => {
                                    errorMessage.remove();
                                }, 5000);
                            });
                        } else {
                            // Show info message if no unread messages
                            const infoMessage = document.createElement('div');
                            infoMessage.className = 'fixed top-4 right-4 bg-blue-500 text-white px-6 py-3 rounded-lg shadow-lg z-50';
                            infoMessage.textContent = 'No unread messages to mark as read.';
                            document.body.appendChild(infoMessage);

                            setTimeout(() => {
                                infoMessage.remove();
                            }, 3000);
                        }
                    }
                });
            }
        });
    </script>
@endsection
