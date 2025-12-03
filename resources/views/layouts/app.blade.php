<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ theme: localStorage.getItem('theme') || 'light' }" x-init="$watch('theme', value => localStorage.setItem('theme', value)); document.documentElement.setAttribute('data-theme', theme)" @theme-changed.window="theme = $event.detail.theme; document.documentElement.setAttribute('data-theme', theme)"
    :data-theme="theme">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Portfolio') }}</title>

    <!-- TailwindCSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Theme Override CSS -->
    <link rel="stylesheet" href="{{ asset('css/theme-override.css') }}">

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

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
        x-data="{ isOpen: false }" style="color: var(--color-base-content); opacity: var(--tw-bg-opacity);">
        <style>
            nav {
                background-color: color-mix(in oklch, var(--color-base-100) calc(var(--tw-bg-opacity) * 100%), transparent);
            }
            nav a, nav button, nav i {
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
                        <a href="#home"
                            class="px-3 py-2 rounded-md text-sm font-medium text-base-content hover:bg-base-200 transition-colors">
                            Home
                        </a>
                        <a href="#about"
                            class="px-3 py-2 rounded-md text-sm font-medium text-base-content hover:bg-base-200 transition-colors">
                            About
                        </a>
                        <a href="#services"
                            class="px-3 py-2 rounded-md text-sm font-medium text-base-content hover:bg-base-200 transition-colors">
                            Services
                        </a>
                        <a href="#portfolio"
                            class="px-3 py-2 rounded-md text-sm font-medium text-base-content hover:bg-base-200 transition-colors">
                            Portfolio
                        </a>
                        <a href="#contact"
                            class="px-3 py-2 rounded-md text-sm font-medium text-base-content hover:bg-base-200 transition-colors">
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
                <a href="#home" @click="isOpen = false"
                    class="nav-link block px-3 py-2 rounded-md text-base font-medium text-base-content hover:bg-base-200 transition-colors duration-200">
                    Home
                </a>
                <a href="#about" @click="isOpen = false"
                    class="nav-link block px-3 py-2 rounded-md text-base font-medium text-base-content hover:bg-base-200 transition-colors duration-200">
                    About
                </a>
                <a href="#services" @click="isOpen = false"
                    class="nav-link block px-3 py-2 rounded-md text-base font-medium text-base-content hover:bg-base-200 transition-colors duration-200">
                    Services
                </a>
                <a href="#portfolio" @click="isOpen = false"
                    class="nav-link block px-3 py-2 rounded-md text-base font-medium text-base-content hover:bg-base-200 transition-colors duration-200">
                    Portfolio
                </a>
                <a href="#contact" @click="isOpen = false"
                    class="nav-link block px-3 py-2 rounded-md text-base font-medium text-base-content hover:bg-base-200 transition-colors duration-200">
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
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- About -->
                <div>
                    <h3 class="text-lg font-semibold mb-4 text-primary-600 dark:text-primary-400">About Me</h3>
                    <p class="mb-4">A professional web developer with a passion for creating beautiful, functional
                        websites.</p>
                    <div class="flex space-x-4">
                        <a href="#"
                            class="text-gray-500 dark:text-white hover:text-primary-600 dark:hover:text-primary-400 transition-colors">
                            <i class="fab fa-twitter text-xl"></i>
                        </a>
                        <a href="#"
                            class="text-gray-500 dark:text-white hover:text-primary-600 dark:hover:text-primary-400 transition-colors">
                            <i class="fab fa-linkedin text-xl"></i>
                        </a>
                        <a href="#"
                            class="text-gray-500 dark:text-white hover:text-primary-600 dark:hover:text-primary-400 transition-colors">
                            <i class="fab fa-github text-xl"></i>
                        </a>
                        <a href="#"
                            class="text-gray-500 dark:text-white hover:text-primary-600 dark:hover:text-primary-400 transition-colors">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-lg font-semibold mb-4 text-primary-600 dark:text-primary-400">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="#home"
                                class="dark:text-white hover:text-primary-600 dark:hover:text-primary-400 transition-colors">Home</a>
                        </li>
                        <li><a href="#about"
                                class="dark:text-white hover:text-primary-600 dark:hover:text-primary-400 transition-colors">About</a>
                        </li>
                        <li><a href="#services"
                                class="dark:text-white hover:text-primary-600 dark:hover:text-primary-400 transition-colors">Services</a>
                        </li>
                        <li><a href="#portfolio"
                                class="dark:text-white hover:text-primary-600 dark:hover:text-primary-400 transition-colors">Portfolio</a>
                        </li>
                        <li><a href="#contact"
                                class="dark:text-white hover:text-primary-600 dark:hover:text-primary-400 transition-colors">Contact</a>
                        </li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div class="bg-base-100 rounded-lg shadow-md p-6 transition-all duration-300 hover:shadow-lg">
                    <h3 class="text-xl font-bold mb-6 text-primary-600 dark:text-primary-400 flex items-center">
                        <i class="fas fa-address-card mr-3 dark:text-white"></i>
                        معلومات الاتصال
                    </h3>
                    <ul class="space-y-4">
                        <li
                            class="flex items-center p-3 rounded-md bg-base-200 hover:bg-base-300 transition-colors duration-200">
                            <div
                                class="w-10 h-10 bg-primary rounded-full flex items-center justify-center ml-4 flex-shrink-0">
                                <i class="fas fa-map-marker-alt text-primary-content"></i>
                            </div>
                            <div class="text-right" style="width: 100%;">
                                <p class="text-sm text-base-content/70">العنوان</p>
                                <p class="font-medium text-base-content">عنوانك، المدينة، البلد</p>
                            </div>
                        </li>
                        <li
                            class="flex items-center p-3 rounded-md bg-base-200 hover:bg-base-300 transition-colors duration-200">
                            <div
                                class="w-10 h-10 bg-primary rounded-full flex items-center justify-center ml-4 flex-shrink-0">
                                <i class="fas fa-phone text-primary-content"></i>
                            </div>
                            <div class="text-right" style="width: 100%;">
                                <p class="text-sm text-base-content/70">الهاتف</p>
                                <p class="font-medium text-base-content">+966 50 123 4567</p>
                            </div>
                        </li>
                        <li
                            class="flex items-center p-3 rounded-md bg-base-200 hover:bg-base-300 transition-colors duration-200">
                            <div
                                class="w-10 h-10 bg-primary rounded-full flex items-center justify-center ml-4 flex-shrink-0">
                                <i class="fas fa-envelope text-primary-content"></i>
                            </div>
                            <div class="text-right" style="width: 100%;">
                                <p class="text-sm text-base-content/70">البريد الإلكتروني</p>
                                <p class="font-medium text-base-content">your.email@example.com</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

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
</body>

</html>
