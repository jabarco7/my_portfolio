<script>
    // Sidebar functionality
    document.addEventListener('DOMContentLoaded', function() {
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
    });
</script>
