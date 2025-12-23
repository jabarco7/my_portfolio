<script>
(function () {
    const KEY = 'theme';
    const DARK = 'dark';
    const LIGHT = 'light';
    const html = document.documentElement;

    function apply(theme) {
        if (theme === DARK) {
            html.classList.add(DARK);
            html.setAttribute('data-theme', DARK);
        } else {
            html.classList.remove(DARK);
            html.setAttribute('data-theme', LIGHT);
        }
    }

    let theme = localStorage.getItem(KEY);

    if (theme !== DARK && theme !== LIGHT) {
        theme = LIGHT; // الافتراضي
        localStorage.setItem(KEY, theme);
    }

    apply(theme);

    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('theme-toggle')?.addEventListener('click', function () {
            theme = localStorage.getItem(KEY) === DARK ? LIGHT : DARK;
            localStorage.setItem(KEY, theme);
            apply(theme);
        });

        // Sidebar toggle for mobile
        const sidebar = document.getElementById('sidebar');
        const sidebarToggle = document.getElementById('sidebar-toggle');
        const mobileSidebarToggle = document.getElementById('mobile-sidebar-toggle');

        sidebarToggle?.addEventListener('click', function () {
            sidebar.classList.toggle('-translate-x-full');
        });

        mobileSidebarToggle?.addEventListener('click', function () {
            sidebar.classList.toggle('-translate-x-full');
        });

        // Dropdown functionality using details/summary
        const dropdowns = document.querySelectorAll('.dropdown');

        // Close all dropdowns when clicking outside
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.dropdown')) {
                dropdowns.forEach(dropdown => {
                    dropdown.removeAttribute('open');
                });
            }
        });
    });
})();
</script>
