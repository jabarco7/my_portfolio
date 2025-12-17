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