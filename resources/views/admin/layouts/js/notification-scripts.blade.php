<script>
    // Notification functionality
    document.addEventListener('DOMContentLoaded', function() {
        // Debug: Log notifications
        console.log('Checking for notifications...');
        const successNotifications = document.querySelectorAll('.notification-success');
        console.log('Found success notifications:', successNotifications.length);

        successNotifications.forEach(function(notification) {
            // Auto-hide after 5 seconds
            setTimeout(function() {
                notification.style.opacity = '0';
                setTimeout(function() {
                    notification.style.display = 'none';
                }, 300);
            }, 5000);
        });

        // Error notifications
        const errorNotifications = document.querySelectorAll('.notification-error');
        errorNotifications.forEach(function(notification) {
            // Auto-hide after 8 seconds
            setTimeout(function() {
                notification.style.opacity = '0';
                setTimeout(function() {
                    notification.style.display = 'none';
                }, 300);
            }, 8000);
        });
    });
</script>
