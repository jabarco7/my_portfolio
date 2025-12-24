// Real-time notifications for admin panel
document.addEventListener('DOMContentLoaded', function() {
    // Check if we're on the messages page
    const isMessagesPage = window.location.pathname.includes('/admin/messages');

    // Function to check for new messages
    function checkForNewMessages() {
        // Only check if we're on the messages page
        if (!isMessagesPage) return;

        // Get the ID of the first message in the table
        let lastMessageId = 0;
        const firstMessageRow = document.querySelector('tbody tr:first-child');
        if (firstMessageRow) {
            const messageIdElement = firstMessageRow.querySelector('.text-sm.text-gray-500');
            if (messageIdElement) {
                lastMessageId = parseInt(messageIdElement.textContent.replace('ID: ', ''));
            }
        }

        // Fetch new messages
        fetch(`/admin/messages/new?last_message_id=${lastMessageId}`, {
            headers: {
                'Accept': 'application/json'
            }
        })
            .then(response => response.json())
            .then(data => {
                if (data.count > 0) {
                    // Show notification
                    showNotification(`You have ${data.count} new message${data.count > 1 ? 's' : ''}!`);

                    // Update the new messages counter if it exists
                    const newMessagesCount = document.getElementById('new-messages-count');
                    if (newMessagesCount) {
                        const currentCount = parseInt(newMessagesCount.textContent) || 0;
                        newMessagesCount.textContent = currentCount + data.count;

                        // Add visual effect
                        newMessagesCount.parentElement.classList.add('ring-2', 'ring-red-500', 'ring-opacity-50');
                    }

                    // Update last message ID
                    if (data.messages.length > 0) {
                        lastMessageId = data.messages[0].id;
                    }
                }
            })
            .catch(error => {
                console.error('Error checking for new messages:', error);
            });
    }

    // Function to show notification
    function showNotification(message) {
        const notification = document.createElement('div');
        notification.className = 'fixed top-4 right-4 bg-blue-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 flex items-center';
        notification.innerHTML = `
            <i class="fas fa-envelope mr-2"></i>
            <span>${message}</span>
            <button class="ml-4 text-white hover:text-gray-200" onclick="location.reload()">
                <i class="fas fa-sync-alt"></i>
            </button>
        `;
        document.body.appendChild(notification);

        // Remove notification after 10 seconds
        setTimeout(() => {
            notification.remove();
        }, 10000);
    }

    // Check for new messages every 5 seconds
    setInterval(checkForNewMessages, 5000);

    // Initial check when page loads
    checkForNewMessages();

    // Update the new messages counter every 30 seconds
    setInterval(function() {
        fetch('/admin/messages/new?last_message_id=0', {
            headers: {
                'Accept': 'application/json'
            }
        })
            .then(response => response.json())
            .then(data => {
                const newMessagesCount = document.getElementById('new-messages-count');
                if (newMessagesCount) {
                    newMessagesCount.textContent = data.count;

                    // Add or remove visual effect based on count
                    if (data.count > 0) {
                        newMessagesCount.parentElement.classList.add('ring-2', 'ring-red-500', 'ring-opacity-50');
                    } else {
                        newMessagesCount.parentElement.classList.remove('ring-2', 'ring-red-500', 'ring-opacity-50');
                    }
                }
            })
            .catch(error => {
                console.error('Error updating new messages count:', error);
            });
    }, 30000);
});
