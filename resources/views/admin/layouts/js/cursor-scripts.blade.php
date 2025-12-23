<script>
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
