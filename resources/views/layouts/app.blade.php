<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ theme: localStorage.getItem('theme') || 'light' }" x-init="$watch('theme', value => localStorage.setItem('theme', value));
document.documentElement.setAttribute('data-theme', theme)"
    @theme-changed.window="theme = $event.detail.theme; document.documentElement.setAttribute('data-theme', theme)"
    :data-theme="theme">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Portfolio') }}</title>

    <!-- TailwindCSS -->
    @vite(['resources/css/app.css', 'resources/css/icon-sizes.css', 'resources/js/app.js'])

    <!-- Theme Override CSS -->
    <link rel="stylesheet" href="{{ asset('css/theme-override.css') }}">

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Toast JavaScript -->
    <script src="{{ asset('js/toast.js') }}"></script>

    <!-- Custom Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Custom animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }

        /* Dark mode styles */
        .dark {
            color-scheme: dark;
        }

        /* Final cursor solution */
        * {
            cursor: default !important;
            -webkit-user-select: none !important;
            -moz-user-select: none !important;
            -ms-user-select: none !important;
            user-select: none !important;
        }

        input,
        textarea,
        [contenteditable="true"] {
            cursor: text !important;
            -webkit-user-select: text !important;
            -moz-user-select: text !important;
            -ms-user-select: text !important;
            user-select: text !important;
        }

        a,
        button,
        [role="button"],
        label {
            cursor: pointer !important;
        }

        html,
        body {
            cursor: default !important;
            -webkit-user-select: none !important;
            -moz-user-select: none !important;
            -ms-user-select: none !important;
            user-select: none !important;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="fixed top-0 left-0 right-0 z-50 bg-base-100 shadow-md transition-all duration-300"
        x-data="{ isOpen: false }" @click.away="isOpen = false"
        style="color: var(--color-base-content); opacity: var(--tw-bg-opacity);">
        <style>
            nav {
                background-color: color-mix(in oklch, var(--color-base-100) calc(var(--tw-bg-opacity) * 100%), transparent);
            }

            nav a,
            nav button,
            nav i {
                color: color-mix(in oklch, var(--color-base-content) calc(var(--tw-text-opacity) * 100%), transparent);
            }
        </style>
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="{{ route('home') }}" class="text-2xl font-bold text-primary">
                        {{ config('app.name', 'Portfolio') }}
                    </a>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="{{ route('home') }}#home"
                            class="px-3 py-2 rounded-md text-sm font-medium text-base-content hover:bg-base-200 transition-colors no-underline">
                            Home
                        </a>
                        <a href="{{ route('home') }}#about"
                            class="px-3 py-2 rounded-md text-sm font-medium text-base-content hover:bg-base-200 transition-colors no-underline">
                            About
                        </a>
                        <a href="{{ route('home') }}#services"
                            class="px-3 py-2 rounded-md text-sm font-medium text-base-content hover:bg-base-200 transition-colors no-underline">
                            Services
                        </a>
                        <a href="{{ route('portfolio') }}"
                            class="px-3 py-2 rounded-md text-sm font-medium text-base-content hover:bg-base-200 transition-colors no-underline">
                            Portfolio
                        </a>
                        <a href="{{ route('home') }}#contact"
                            class="px-3 py-2 rounded-md text-sm font-medium text-base-content hover:bg-base-200 transition-colors no-underline">
                            Contact
                        </a>

                        <!-- Theme Selector -->
                        @include('components.theme-selector')

                    </div>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button @click="isOpen = !isOpen"
                        class="inline-flex items-center justify-center p-2 rounded-md hover:bg-base-200 focus:outline-none">
                        <i x-show="!isOpen" class="fas fa-bars text-base-content"></i>
                        <i x-show="isOpen" class="fas fa-times text-base-content"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="isOpen" x-transition class="md:hidden bg-base-100 shadow-lg">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="{{ route('home') }}#home" @click="isOpen = false"
                    class="nav-link block px-3 py-2 rounded-md text-base font-medium text-base-content hover:bg-base-200 transition-colors duration-200 no-underline">
                    Home
                </a>
                <a href="{{ route('home') }}#about" @click="isOpen = false"
                    class="nav-link block px-3 py-2 rounded-md text-base font-medium text-base-content hover:bg-base-200 transition-colors duration-200 no-underline">
                    About
                </a>
                <a href="{{ route('home') }}#services" @click="isOpen = false"
                    class="nav-link block px-3 py-2 rounded-md text-base font-medium text-base-content hover:bg-base-200 transition-colors duration-200 no-underline">
                    Services
                </a>
                <a href="{{ route('portfolio') }}" @click="isOpen = false"
                    class="nav-link block px-3 py-2 rounded-md text-base font-medium text-base-content hover:bg-base-200 transition-colors duration-200 no-underline">
                    Portfolio
                </a>
                <a href="{{ route('home') }}#contact" @click="isOpen = false"
                    class="nav-link block px-3 py-2 rounded-md text-base font-medium text-base-content hover:bg-base-200 transition-colors duration-200 no-underline">
                    Contact
                </a>

                <!-- Theme Toggle -->
                <button
                    @click="
                    const themes = ['light', 'dark', 'cupcake', 'bumblebee', 'emerald', 'corporate', 'synthwave', 'retro', 'cyberpunk', 'valentine', 'halloween', 'garden', 'forest', 'aqua', 'lofi'];
                    const currentIndex = themes.indexOf(theme);
                    theme = themes[(currentIndex + 1) % themes.length];
                    localStorage.setItem('theme', theme);
                    document.documentElement.setAttribute('data-theme', theme);
                "
                    class="w-full text-left px-3 py-2 rounded-md text-base font-medium hover:bg-base-200 transition-colors">
                    <i x-show="theme === 'light'" class="fas fa-sun mr-2 text-yellow-500"></i>
                    <i x-show="theme === 'dark'" class="fas fa-moon mr-2 text-blue-400"></i>
                    <i x-show="theme === 'cupcake'" class="fas fa-birthday-cake mr-2 text-pink-400"></i>
                    <i x-show="theme === 'bumblebee'" class="fas fa-bug mr-2 text-yellow-600"></i>
                    <i x-show="theme === 'emerald'" class="fas fa-gem mr-2 text-green-500"></i>
                    <i x-show="theme === 'corporate'" class="fas fa-building mr-2 text-blue-600"></i>
                    <i x-show="theme === 'synthwave'" class="fas fa-wave-square mr-2 text-purple-500"></i>
                    <i x-show="theme === 'retro'" class="fas fa-compact-disc mr-2 text-orange-500"></i>
                    <i x-show="theme === 'cyberpunk'" class="fas fa-robot mr-2 text-cyan-400"></i>
                    <i x-show="theme === 'valentine'" class="fas fa-heart mr-2 text-red-500"></i>
                    <i x-show="theme === 'halloween'" class="fas fa-ghost mr-2 text-orange-500"></i>
                    <i x-show="theme === 'garden'" class="fas fa-leaf mr-2 text-green-600"></i>
                    <i x-show="theme === 'forest'" class="fas fa-tree mr-2 text-green-700"></i>
                    <i x-show="theme === 'aqua'" class="fas fa-water mr-2 text-blue-500"></i>
                    <i x-show="theme === 'lofi'" class="fas fa-music mr-2 text-gray-600"></i>
                    <span x-text="theme.charAt(0).toUpperCase() + theme.slice(1) + ' Theme'"
                        class="text-base-content"></span>
                </button>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-base-200 text-base-content">
        <div class="container mx-auto px-4 py-8">


            <div class="mt-8 pt-8 border-t border-base-300 text-center">
                <p>&copy; {{ date('Y') }} {{ config('app.name', 'Portfolio') }}. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Alpine.js for interactivity -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Force cursor style on all elements
            const style = document.createElement('style');
            style.textContent = `
                * { cursor: default !important; }
                input, textarea, [contenteditable="true"] { cursor: text !important; }
                a, button, [role="button"], label { cursor: pointer !important; }
            `;
            document.head.appendChild(style);

            // Force default cursor on document level
            document.body.style.cursor = 'default';
            document.documentElement.style.cursor = 'default';

            // Force default cursor on any mouse event
            document.addEventListener('mousedown', function(e) {
                if (!e.target.matches('input, textarea, [contenteditable="true"]')) {
                    e.target.style.cursor = 'default';
                }
            });

            // Force default cursor on mouseup
            document.addEventListener('mouseup', function(e) {
                if (!e.target.matches('input, textarea, [contenteditable="true"]')) {
                    e.target.style.cursor = 'default';
                }
            });

            // Force default cursor on mousemove
            document.addEventListener('mousemove', function(e) {
                if (!e.target.matches(
                        'input, textarea, [contenteditable="true"], a, button, [role="button"], label')) {
                    e.target.style.cursor = 'default';
                }
            });

            // Prevent text selection
            document.addEventListener('selectstart', function(e) {
                if (!e.target.matches('input, textarea, [contenteditable="true"]')) {
                    e.preventDefault();
                }
            });

            // Override any cursor changes
            const observer = new MutationObserver(function(mutations) {
                mutations.forEach(function(mutation) {
                    if (mutation.type === 'attributes' && mutation.attributeName === 'style') {
                        const target = mutation.target;
                        if (!target.matches(
                                'input, textarea, [contenteditable="true"], a, button, [role="button"], label'
                            )) {
                            target.style.cursor = 'default';
                        }
                    }
                });
            });

            // Observe all elements for style changes
            observer.observe(document.body, {
                attributes: true,
                subtree: true
            });

            // Force default cursor on any element that gets text cursor
            setInterval(function() {
                const allElements = document.querySelectorAll('*');
                allElements.forEach(element => {
                    if (!element.matches(
                            'input, textarea, [contenteditable="true"], a, button, [role="button"], label'
                        )) {
                        if (element.style.cursor === 'text') {
                            element.style.cursor = 'default';
                        }
                    }
                });
            }, 100);

            // Force default cursor on any element with computed text cursor
            setInterval(function() {
                const allElements = document.querySelectorAll('*');
                allElements.forEach(element => {
                    if (!element.matches(
                            'input, textarea, [contenteditable="true"], a, button, [role="button"], label'
                        )) {
                        const computedStyle = window.getComputedStyle(element);
                        if (computedStyle.cursor === 'text') {
                            element.style.cursor = 'default';
                        }
                    }
                });
            }, 100);

            // Force default cursor on any element with any computed cursor that is not default, text or pointer
            setInterval(function() {
                const allElements = document.querySelectorAll('*');
                allElements.forEach(element => {
                    if (!element.matches(
                            'input, textarea, [contenteditable="true"], a, button, [role="button"], label'
                        )) {
                        const computedStyle = window.getComputedStyle(element);
                        if (computedStyle.cursor !== 'default' && computedStyle.cursor !==
                            'pointer') {
                            element.style.cursor = 'default';
                        }
                    }
                });
            }, 100);

            // Force default cursor on any element with any computed cursor that is not default, text or pointer (more aggressive)
            setInterval(function() {
                const allElements = document.querySelectorAll('*');
                allElements.forEach(element => {
                    if (!element.matches(
                            'input, textarea, [contenteditable="true"], a, button, [role="button"], label'
                        )) {
                        const computedStyle = window.getComputedStyle(element);
                        element.style.setProperty('cursor', 'default', 'important');
                    }
                });
            }, 50);

            // Force default cursor on any element with any computed cursor that is not default, text or pointer (most aggressive)
            setInterval(function() {
                const allElements = document.querySelectorAll('*');
                allElements.forEach(element => {
                    if (!element.matches(
                            'input, textarea, [contenteditable="true"], a, button, [role="button"], label'
                        )) {
                        element.setAttribute('style', element.getAttribute('style') +
                            '; cursor: default !important;');
                    }
                });
            }, 25);

            // Force default cursor on any element with any computed cursor that is not default, text or pointer (ultra aggressive)
            setInterval(function() {
                const allElements = document.querySelectorAll('*');
                allElements.forEach(element => {
                    if (!element.matches(
                            'input, textarea, [contenteditable="true"], a, button, [role="button"], label'
                        )) {
                        element.style.cssText += '; cursor: default !important;';
                    }
                });
            }, 10);
        });
    </script>

    <!-- Cursor Fix Script -->
    <script src="{{ asset('js/cursor-fix.js') }}"></script>

    <!-- Direct Cursor Fix -->
    <style>
        *:not(#toast):not(#toast *) {
            cursor: default !important;
            caret-color: transparent !important;
            user-select: none !important;
            -webkit-user-select: none !important;
            -moz-user-select: none !important;
            -ms-user-select: none !important;
        }

        input,
        textarea,
        select,
        [contenteditable="true"] {
            cursor: text !important;
            caret-color: auto !important;
            user-select: text !important;
            -webkit-user-select: text !important;
            -moz-user-select: text !important;
            -ms-user-select: text !important;
        }

        button,
        a,
        .btn {
            cursor: pointer !important;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Force cursor style on all elements
            const allElements = document.querySelectorAll('*');
            allElements.forEach(element => {
                if (!element.matches(
                        'input, textarea, select, [contenteditable="true"], button, a, .btn')) {
                    element.style.setProperty('cursor', 'default', 'important');
                    element.style.setProperty('caret-color', 'transparent', 'important');
                    element.style.setProperty('user-select', 'none', 'important');
                }
            });

            // Prevent cursor changes
            document.addEventListener('mousedown', function(e) {
                if (!e.target.matches(
                        'input, textarea, select, [contenteditable="true"], button, a, .btn')) {
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
        });
    </script>

    <!-- Toast Notification -->
    <style>
        .toast {
            display: none;
            width: fit-content;
            max-width: 500px;
            max-height: 80px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            border-radius: 12px;
            padding: 12px 16px;
            margin: 20px;
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
            font-family: inherit;
            font-size: 14px;
            line-height: 1.4;
            position: relative;
            overflow-y: auto;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }

        .toast::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0) 100%);
            animation: shimmer 2s infinite;
        }

        .toast-icon {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-left: 12px;
            animation: pulse 1.5s infinite;
        }

        @keyframes slideIn {
            from {
                transform: translateX(100%) scale(0.8);
                opacity: 0;
            }

            to {
                transform: translateX(0) scale(1);
                opacity: 1;
            }
        }

        @keyframes slideOut {
            from {
                transform: translateX(0) scale(1);
                opacity: 1;
            }

            to {
                transform: translateX(100%) scale(0.8);
                opacity: 0;
            }
        }

        @keyframes shimmer {
            0% {
                transform: translateX(-100%);
            }

            100% {
                transform: translateX(100%);
            }
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(255, 255, 255, 0.4);
            }

            70% {
                box-shadow: 0 0 0 10px rgba(255, 255, 255, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(255, 255, 255, 0);
            }
        }
    </style>
    <div id="toast" class="toast fixed top-20 right-4 z-[9999]"
        style="transform: translateX(100%); display: none;">
        <div class="flex items-center">
            <div class="toast-icon">
                <i class="fas fa-check"></i>
            </div>
            <span id="toast-message" class="font-medium" style="word-break: break-word;"></span>
        </div>
    </div>

    <script>
        window.addEventListener('load', function() {
            console.log('Window loaded, checking for success message');
            // Check for success message and show toast
            @if (session('success'))
                console.log('Found success message in session');
                showToast("{{ session('success') }}");
            @else
                console.log('No success message in session');
            @endif


        });
    </script>

    <!-- Simple Toast Notification -->
    <div id="simple-toast" x-data="{ theme: $el.getRootNode().documentElement.getAttribute('data-theme') || 'light' }" x-init="$watch('theme', value => {
        const toast = document.getElementById('simple-toast');
        const toastIcon = toast.querySelector('div > div:first-child');
    
        if (value === 'dark') {
            toast.style.background = 'linear-gradient(135deg, #34d399, #10b981)';
            toast.style.color = 'white';
            toastIcon.style.backgroundColor = 'rgba(255, 255, 255, 0.2)';
        } else {
            toast.style.background = 'linear-gradient(135deg, #10b981, #059669)';
            toast.style.color = 'white';
            toastIcon.style.backgroundColor = 'rgba(255, 255, 255, 0.2)';
        }
    })"
        style="display: none; position: fixed; top: 80px; right: 20px; background: linear-gradient(135deg, #10b981, #059669); color: white; padding: 12px 16px; border-radius: 12px; box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2); z-index: 9999; width: fit-content; max-width: 500px; max-height: 80px; overflow-y: auto;">
        <div style="display: flex; align-items: center;">
            <div
                style="width: 24px; height: 24px; border-radius: 50%; background-color: rgba(255, 255, 255, 0.2); display: flex; align-items: center; justify-content: center; margin-left: 12px;">
                <i class="fas fa-check"></i>
            </div>
            <span id="simple-toast-message" style="font-weight: 500; word-break: break-word;"></span>
        </div>
    </div>

    <style>
        /* Theme-based toast colors using CSS variables */
        #simple-toast {
            --toast-bg-light: linear-gradient(135deg, #1f2937, #111827);
            --toast-bg-dark: linear-gradient(135deg, #f9fafb, #f3f4f6);
            --toast-text-light: #f9fafb;
            --toast-text-dark: #1f2937;
            --toast-icon-light: rgba(255, 255, 255, 0.2);
            --toast-icon-dark: rgba(0, 0, 0, 0.1);

            background: var(--toast-bg-light);
            color: var(--toast-text-light);
        }

        #simple-toast div>div:first-child {
            background-color: var(--toast-icon-light);
        }

        [data-theme="dark"] #simple-toast {
            background: var(--toast-bg-dark);
            color: var(--toast-text-dark);
        }

        [data-theme="dark"] #simple-toast div>div:first-child {
            background-color: var(--toast-icon-dark);
        }

        .dark #simple-toast {
            background: var(--toast-bg-dark);
            color: var(--toast-text-dark);
        }

        .dark #simple-toast div>div:first-child {
            background-color: var(--toast-icon-dark);
        }
    </style>

    <script>
        // Update toast colors based on theme
        function updateToastColors() {
            const toast = document.getElementById('simple-toast');
            const toastIcon = toast.querySelector('div > div:first-child');

            // Check for dark theme in multiple ways
            const isDark = document.documentElement.getAttribute('data-theme') === 'dark' ||
                document.documentElement.classList.contains('dark') ||
                localStorage.getItem('theme') === 'dark' ||
                window.getComputedStyle(document.documentElement).getPropertyValue('color-scheme') === 'dark';

            console.log('Theme detection - isDark:', isDark);
            console.log('Data theme attr:', document.documentElement.getAttribute('data-theme'));
            console.log('Dark class exists:', document.documentElement.classList.contains('dark'));
            console.log('Theme in localStorage:', localStorage.getItem('theme'));

            if (isDark) {
                // Dark theme - use lighter colors
                toast.style.background = 'linear-gradient(135deg, #34d399, #10b981)';
                toast.style.color = 'white';
                toastIcon.style.backgroundColor = 'rgba(255, 255, 255, 0.2)';
                console.log('Applied dark theme colors to toast');
            } else {
                // Light theme - use standard colors
                toast.style.background = 'linear-gradient(135deg, #10b981, #059669)';
                toast.style.color = 'white';
                toastIcon.style.backgroundColor = 'rgba(255, 255, 255, 0.2)';
                console.log('Applied light theme colors to toast');
            }
        }

        // Update colors on page load
        document.addEventListener('DOMContentLoaded', updateToastColors);

        // Update colors when theme changes
        document.addEventListener('theme-changed', updateToastColors);
    </script>

    <script>
        // Simple toast notification function
        function showSimpleToast(message) {
            console.log('=== SIMPLE TOAST FUNCTION START ===');
            console.log('showSimpleToast called with message:', message);

            const toast = document.getElementById('simple-toast');
            const toastMessage = document.getElementById('simple-toast-message');

            console.log('Simple toast element:', toast);
            console.log('Simple toast message element:', toastMessage);

            if (!toast || !toastMessage) {
                console.error('Simple toast elements not found');
                console.log('Falling back to alert');
                alert(message);
                return;
            }

            // Set message
            toastMessage.textContent = message;
            console.log('Message set to:', toastMessage.textContent);

            // Update colors based on current theme
            updateToastColors();

            // Check theme directly from Alpine store
            if (window.Alpine && window.Alpine.store) {
                const theme = window.Alpine.store('theme') || 'light';
                console.log('Alpine theme:', theme);

                if (theme === 'dark') {
                    toast.style.background = 'linear-gradient(135deg, #f9fafb, #f3f4f6)';
                    toast.style.color = '#1f2937';
                    const toastIcon = toast.querySelector('div > div:first-child');
                    toastIcon.style.backgroundColor = 'rgba(0, 0, 0, 0.1)';
                } else {
                    toast.style.background = 'linear-gradient(135deg, #1f2937, #111827)';
                    toast.style.color = '#f9fafb';
                    const toastIcon = toast.querySelector('div > div:first-child');
                    toastIcon.style.backgroundColor = 'rgba(255, 255, 255, 0.2)';
                }
            }

            // Check theme using CSS variables
            const computedStyle = getComputedStyle(document.documentElement);
            const bgColor = computedStyle.getPropertyValue('--color-base-100');
            console.log('Background color from CSS vars:', bgColor);

            if (bgColor && bgColor.trim().length > 0) {
                // If we can get the background color, check if it's dark
                const rgb = bgColor.match(/\d+/g);
                if (rgb && rgb.length >= 3) {
                    const brightness = (parseInt(rgb[0]) * 299 + parseInt(rgb[1]) * 587 + parseInt(rgb[2]) * 114) / 1000;
                    console.log('Calculated brightness:', brightness);

                    if (brightness < 128) {
                        // Dark background - use light colors
                        toast.style.background = 'linear-gradient(135deg, #f9fafb, #f3f4f6)';
                        toast.style.color = '#1f2937';
                        const toastIcon = toast.querySelector('div > div:first-child');
                        toastIcon.style.backgroundColor = 'rgba(0, 0, 0, 0.1)';
                        console.log('Applied light theme based on background color');
                    } else {
                        // Light background - use dark colors
                        toast.style.background = 'linear-gradient(135deg, #1f2937, #111827)';
                        toast.style.color = '#f9fafb';
                        const toastIcon = toast.querySelector('div > div:first-child');
                        toastIcon.style.backgroundColor = 'rgba(255, 255, 255, 0.2)';
                        console.log('Applied dark theme based on background color');
                    }
                }
            }

            // Show toast
            toast.style.display = 'block';
            console.log('Simple toast displayed with message:', message);

            // Auto hide after 5 seconds
            setTimeout(() => {
                toast.style.display = 'none';
                console.log('Simple toast hidden');
            }, 5000);

            console.log('=== SIMPLE TOAST FUNCTION END ===');
        }

        // Make the function globally available
        window.showSimpleToast = showSimpleToast;
    </script>
</body>

</html>
