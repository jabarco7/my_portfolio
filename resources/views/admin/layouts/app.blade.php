<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Portfolio') }} - @yield('title', 'Admin Panel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .fa,
        .fas,
        .far,
        .fab,
        .fal {
            display: inline-block;
            font-style: normal;
            font-variant: normal;
            text-rendering: auto;
            line-height: 1;
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root {
            --color-primary: #3b82f6;
            --color-primary-content: #ffffff;
            --color-base-100: #ffffff;
            --color-base-200: #f3f4f6;
            --color-base-300: #e5e7eb;
            --color-base-content: #111827;
        }

        [data-theme="dark"] {
            --color-primary: #3b82f6;
            --color-primary-content: #ffffff;
            --color-base-100: #1f2937;
            --color-base-200: #374151;
            --color-base-300: #4b5563;
            --color-base-content: #f9fafb;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--color-base-200);
            color: var(--color-base-content);
        }

        .sidebar {
            background-color: var(--color-base-100);
            border-right: 1px solid var(--color-base-300);
        }

        .main-content {
            background-color: var(--color-base-200);
        }

        .card {
            background-color: var(--color-base-100);
            border: 1px solid var(--color-base-300);
        }

        .nav-link {
            color: var(--color-base-content);
            transition: all 0.2s;
            text-decoration: none;
        }

        .nav-link:hover {
            background-color: var(--color-base-200);
            color: var(--color-primary);
            text-decoration: none;
        }

        .nav-link.active {
            background-color: var(--color-primary);
            color: var(--color-primary-content);
            text-decoration: none;
        }

        .btn {
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            font-weight: 500;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            text-decoration: none;
            border: none;
            cursor: pointer;
        }

        .btn-primary {
            background-color: var(--color-primary);
            color: var(--color-primary-content);
        }

        .btn-primary:hover {
            opacity: 0.9;
        }

        .btn-secondary {
            background-color: transparent;
            color: var(--color-base-content);
            border: 1px solid var(--color-base-300);
        }

        .btn-secondary:hover {
            background-color: var(--color-base-200);
        }

        .form-input {
            width: 100%;
            padding: 0.5rem 0.75rem;
            border: 1px solid var(--color-base-300);
            border-radius: 0.375rem;
            background-color: var(--color-base-100);
            color: var(--color-base-content);
        }

        .form-input:focus {
            outline: none;
            border-color: var(--color-primary);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--color-base-content);
        }

        .notification {
            padding: 1rem 1.5rem;
            border-radius: 0.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            transition: opacity 0.3s ease-in-out;
            position: relative;
            display: flex;
            align-items: center;
        }

        .notification::before {
            margin-right: 0.75rem;
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
            font-size: 1.25rem;
        }

        .notification-success {
            background-color: #10b981;
            color: white;
        }

        .notification-success::before {
            content: "\f058";
        }

        .notification-error {
            background-color: #ef4444;
            color: white;
        }

        .notification-error::before {
            content: "\f057";
        }

        /* Cursor fix for admin panel */
        * {
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
        .btn,
        .nav-link {
            cursor: pointer !important;
        }
    </style>
</head>

<body>
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="sidebar w-64 flex-shrink-0 fixed lg:relative h-full z-30 transform transition-transform duration-300 ease-in-out lg:transform-none -translate-x-full lg:translate-x-0"
            id="sidebar">
            <div class="flex flex-col h-full">
                <!-- Logo -->
                <div class="p-6 border-b border-gray-200 dark:border-gray-700 flex items-center justify-between">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-primary-600 rounded-lg flex items-center justify-center">
                            <i class="fas fa-cog text-white"></i>
                        </div>
                        <span class="text-xl font-bold text-gray-900 dark:text-white">Admin Panel</span>
                    </a>
                    <button id="sidebar-toggle"
                        class="lg:hidden text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 focus:outline-none">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>

                <!-- Navigation -->
                <nav class="flex-1 p-4 space-y-2">
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link flex items-center px-4 py-3 rounded-lg {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="fas fa-tachometer-alt mr-3"></i>
                        Dashboard
                    </a>
                    <a href="{{ route('admin.about.index') }}"
                        class="nav-link flex items-center px-4 py-3 rounded-lg {{ request()->routeIs('admin.about*') ? 'active' : '' }}">
                        <i class="fas fa-user mr-3"></i>
                        About Page
                    </a>

                    <a href="{{ route('admin.content') }}"
                        class="nav-link flex items-center px-4 py-3 rounded-lg {{ request()->routeIs('admin.content*') ? 'active' : '' }}">
                        <i class="fas fa-file-alt mr-3"></i>
                        Content
                    </a>
                    <a href="{{ route('admin.content.home') }}"
                        class="nav-link flex items-center px-4 py-3 rounded-lg {{ request()->routeIs('admin.content.home*') ? 'active' : '' }}">
                        <i class="fas fa-home mr-3"></i>
                        Home Page
                    </a>

                    <a href="{{ route('admin.projects.index') }}"
                        class="nav-link flex items-center px-4 py-3 rounded-lg {{ request()->routeIs('admin.projects*') ? 'active' : '' }}">
                        <i class="fas fa-briefcase mr-3"></i>
                        Projects
                    </a>
                    <a href="{{ route('admin.skills.index') }}"
                        class="nav-link flex items-center px-4 py-3 rounded-lg {{ request()->routeIs('admin.skills*') ? 'active' : '' }}">
                        <i class="fas fa-code mr-3"></i>
                        Skills
                    </a>
                    <a href="{{ route('admin.certificates.index') }}"
                        class="nav-link flex items-center px-4 py-3 rounded-lg {{ request()->routeIs('admin.certificates*') ? 'active' : '' }}">
                        <i class="fas fa-certificate mr-3"></i>
                        Certificates
                    </a>
                    <a href="{{ route('admin.messages.index') }}"
                        class="nav-link flex items-center px-4 py-3 rounded-lg {{ request()->routeIs('admin.messages*') ? 'active' : '' }}">
                        <i class="fas fa-envelope mr-3"></i>
                        Messages
                    </a>
                    <a href="{{ route('admin.social.index') }}"
                        class="nav-link flex items-center px-4 py-3 rounded-lg {{ request()->routeIs('admin.social*') ? 'active' : '' }}">
                        <i class="fas fa-share-alt mr-3"></i>
                        Social Links
                    </a>
                    <a href="{{ route('admin.profile.edit') }}"
                        class="nav-link flex items-center px-4 py-3 rounded-lg {{ request()->routeIs('admin.profile*') ? 'active' : '' }}">
                        <i class="fas fa-user mr-3"></i>
                        Profile
                    </a>
                </nav>

                <!-- User menu -->
                <div class="p-4 border-t border-gray-200 dark:border-gray-700">
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-primary-600 flex items-center justify-center mr-3">
                            <i class="fas fa-user text-white"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-900 dark:text-white">
                                {{ Auth::guard('admin')->check() ? Auth::guard('admin')->user()->name : 'Admin' }}</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Administrator</p>
                        </div>
                        <form action="{{ route('admin.logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit"
                                class="text-gray-500 dark:text-gray-400 hover:text-red-500 dark:hover:text-red-400">
                                <i class="fas fa-sign-out-alt"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <div class="main-content flex-1 overflow-auto lg:ml-0 lg:pl-0 pl-0">
            <!-- Header -->
            <header class="bg-white dark:bg-gray-800 shadow-sm border-b border-gray-200 dark:border-gray-700 px-6 py-4">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <button id="mobile-sidebar-toggle"
                            class="lg:hidden text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 focus:outline-none">
                            <i class="fas fa-bars text-xl"></i>
                        </button>
                        <h1 class="text-xl font-semibold text-gray-900 dark:text-white">@yield('title', 'Admin Panel')</h1>
                    </div>
                    <button id="theme-toggle" class="p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
                        <i class="fas fa-moon dark:hidden"></i>
                        <i class="fas fa-sun hidden dark:inline"></i>
                    </button>
                </div>
            </header>

            <!-- Page content -->
            <main class="p-6">
                @if (session('success'))
                    <div class="notification notification-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="notification notification-error">
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <script>
        // Show notifications
        document.addEventListener('DOMContentLoaded', function() {
            // Success notifications
            const successNotifications = document.querySelectorAll('.notification-success');
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
        document.getElementById('theme-toggle').addEventListener('click', function() {
            const html = document.documentElement;

            if (html.hasAttribute('data-theme')) {
                html.removeAttribute('data-theme');
                localStorage.removeItem('theme');
            } else {
                html.setAttribute('data-theme', 'dark');
                localStorage.setItem('theme', 'dark');
            }
        });

        // Load saved theme
        if (localStorage.getItem('theme') === 'dark') {
            document.documentElement.setAttribute('data-theme', 'dark');
        }

        // Check system preference
        if (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches) {
            document.documentElement.setAttribute('data-theme', 'dark');
        }

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
    @stack('scripts')
</body>

</html>
