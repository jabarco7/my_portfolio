document.addEventListener('DOMContentLoaded', function() {
    // Get the navigation token from meta tag or response headers
    let navigationToken = document.querySelector('meta[name="nav-token"]')?.getAttribute('content');

    // If token not in meta tag, try to get from session storage
    if (!navigationToken) {
        navigationToken = sessionStorage.getItem('navToken');
    }

    // Function to update all navigation links with the current token
    function updateNavigationLinks(token) {
        if (!token) return;

        // Update all anchor tags that point to internal routes
        const links = document.querySelectorAll('a[href^="/"]');
        links.forEach(link => {
            const url = new URL(link.href, window.location.origin);

            // Skip admin links and external links
            if (url.pathname.startsWith('/admin') || link.getAttribute('target') === '_blank') {
                return;
            }

            // Add or update the nav_token parameter
            url.searchParams.set('nav_token', token);
            link.href = url.toString();
        });
    }

    // Function to handle form submissions
    function handleFormSubmissions(token) {
        if (!token) return;

        const forms = document.querySelectorAll('form[action^="/"]');
        forms.forEach(form => {
            const action = form.getAttribute('action');
            const url = new URL(action, window.location.origin);

            // Skip admin forms
            if (url.pathname.startsWith('/admin')) {
                return;
            }

            // Add the token as a hidden input
            let tokenInput = form.querySelector('input[name="nav_token"]');
            if (!tokenInput) {
                tokenInput = document.createElement('input');
                tokenInput.type = 'hidden';
                tokenInput.name = 'nav_token';
                form.appendChild(tokenInput);
            }
            tokenInput.value = token;
        });
    }

    // Function to fetch and store a new token
    async function fetchNewToken() {
        try {
            const response = await fetch(window.location.origin, {
                method: 'GET',
                headers: {
                    'Accept': 'text/html',
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });

            // Extract token from response headers
            const newToken = response.headers.get('X-Nav-Token');
            if (newToken) {
                sessionStorage.setItem('navToken', newToken);
                updateNavigationLinks(newToken);
                handleFormSubmissions(newToken);
                return newToken;
            }
        } catch (error) {
            console.error('Error fetching navigation token:', error);
        }
        return null;
    }

    // Initialize navigation with current token
    if (navigationToken) {
        sessionStorage.setItem('navToken', navigationToken);
        updateNavigationLinks(navigationToken);
        handleFormSubmissions(navigationToken);
    } else {
        // Try to fetch a new token
        fetchNewToken();
    }

    // Set up an interval to refresh the token periodically
    setInterval(fetchNewToken, 300000); // Refresh every 5 minutes

    // Add event listener for page visibility changes
    document.addEventListener('visibilitychange', function() {
        if (!document.hidden) {
            // Page became visible, refresh the token
            fetchNewToken();
        }
    });

    // Add token to all AJAX requests
    const originalFetch = window.fetch;
    window.fetch = function(...args) {
        const [url, options = {}] = args;

        // Only modify requests to our own domain
        if (typeof url === 'string' && url.startsWith('/') && !url.startsWith('/admin')) {
            const token = sessionStorage.getItem('navToken');
            if (token) {
                // Ensure headers object exists
                options.headers = options.headers || {};

                // Add token to headers
                options.headers['X-Nav-Token'] = token;
            }
        }

        return originalFetch.apply(this, args);
    };
});
