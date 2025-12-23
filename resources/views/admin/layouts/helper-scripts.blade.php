<script>
    // Show notifications
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

    // Theme toggle
    document.addEventListener('DOMContentLoaded', function() {
        const themeToggle = document.getElementById('theme-toggle');
        const html = document.documentElement;

        if (themeToggle) {
            themeToggle.addEventListener('click', function() {
                // التحقق من الوضع الحالي
                const isDark = html.classList.contains('dark') || html.getAttribute('data-theme') === 'dark';

                if (isDark) {
                    // تحويل إلى Light
                    html.classList.remove('dark');
                    html.setAttribute('data-theme', 'light');
                    localStorage.setItem('theme', 'light');
                } else {
                    // تحويل إلى Dark
                    html.classList.add('dark');
                    html.setAttribute('data-theme', 'dark');
                    localStorage.setItem('theme', 'dark');
                }
            });
        }
    });

    // Mobile sidebar toggle
    document.getElementById('mobile-sidebar-toggle')?.addEventListener('click', function() {
        document.getElementById('sidebar').classList.remove('-translate-x-full');
        document.getElementById('sidebar').classList.add('translate-x-0');
    });

    // Close sidebar when clicking on close button
    document.getElementById('sidebar-toggle')?.addEventListener('click', function() {
        document.getElementById('sidebar').classList.add('-translate-x-full');
        document.getElementById('sidebar').classList.remove('translate-x-0');
    });

    // Close sidebar when clicking outside on mobile
    document.addEventListener('click', function(event) {
        const sidebar = document.getElementById('sidebar');
        const toggleButton = document.getElementById('mobile-sidebar-toggle');

        if (window.innerWidth < 1024 &&
            !sidebar.contains(event.target) &&
            !toggleButton.contains(event.target) &&
            !sidebar.classList.contains('-translate-x-full')) {
            sidebar.classList.add('-translate-x-full');
            sidebar.classList.remove('translate-x-0');
        }
    });

    // Cursor fix for admin panel
    document.addEventListener('DOMContentLoaded', function() {
        // Force cursor style on all elements
        const allElements = document.querySelectorAll('*');
        allElements.forEach(element => {
            if (!element.matches(
                    'input, textarea, select, [contenteditable="true"], button, a, .btn, .nav-link')) {
                element.style.setProperty('cursor', 'default', 'important');
                element.style.setProperty('caret-color', 'transparent', 'important');
                element.style.setProperty('user-select', 'none', 'important');
            }
        });

        // Prevent cursor changes
        document.addEventListener('mousedown', function(e) {
            if (!e.target.matches(
                    'input, textarea, select, [contenteditable="true"], button, a, .btn, .nav-link')) {
                e.target.style.setProperty('cursor', 'default', 'important');
                e.target.style.setProperty('caret-color', 'transparent', 'important');
            }
        });

        // Prevent text selection
        document.addEventListener('selectstart', function(e) {
            if (!e.target.matches('input, textarea, select, [contenteditable="true"]')) {
                e.preventDefault();
            }
        });

        // Force default cursor on any element that gets text cursor
        setInterval(function() {
            const allElements = document.querySelectorAll('*');
            allElements.forEach(element => {
                if (!element.matches(
                        'input, textarea, select, [contenteditable="true"], button, a, .btn, .nav-link'
                    )) {
                    if (element.style.cursor === 'text') {
                        element.style.cursor = 'default';
                    }
                }
            });
        }, 100);
    });
</script>
