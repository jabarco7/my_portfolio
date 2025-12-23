<script>
    // Theme toggle functionality
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
</script>
