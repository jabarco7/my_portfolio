<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ theme: localStorage.getItem('theme') || 'light' }" :class="theme">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Portfolio') }}</title>

    <!-- TailwindCSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

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
    </style>
</head>
<body class="bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 transition-colors duration-300">
    <!-- Navbar -->
    <nav class="fixed top-0 left-0 right-0 z-50 bg-white dark:bg-gray-800 shadow-md transition-all duration-300" x-data="{ isOpen: false }">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="{{ route('home') }}" class="text-2xl font-bold text-primary-600 dark:text-primary-400">
                        {{ config('app.name', 'Portfolio') }}
                    </a>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="#home" class="px-3 py-2 rounded-md text-sm font-medium hover:bg-primary-100 dark:hover:bg-gray-700 hover:text-primary-700 dark:hover:text-primary-300 transition-colors">
                            Home
                        </a>
                        <a href="#about" class="px-3 py-2 rounded-md text-sm font-medium hover:bg-primary-100 dark:hover:bg-gray-700 hover:text-primary-700 dark:hover:text-primary-300 transition-colors">
                            About
                        </a>
                        <a href="#services" class="px-3 py-2 rounded-md text-sm font-medium hover:bg-primary-100 dark:hover:bg-gray-700 hover:text-primary-700 dark:hover:text-primary-300 transition-colors">
                            Services
                        </a>
                        <a href="#portfolio" class="px-3 py-2 rounded-md text-sm font-medium hover:bg-primary-100 dark:hover:bg-gray-700 hover:text-primary-700 dark:hover:text-primary-300 transition-colors">
                            Portfolio
                        </a>
                        <a href="#contact" class="px-3 py-2 rounded-md text-sm font-medium hover:bg-primary-100 dark:hover:bg-gray-700 hover:text-primary-700 dark:hover:text-primary-300 transition-colors">
                            Contact
                        </a>

                        <!-- Theme Toggle -->
                        <button @click="theme = theme === 'light' ? 'dark' : 'light'; localStorage.setItem('theme', theme)" 
                                class="p-2 rounded-md hover:bg-primary-100 dark:hover:bg-gray-700 transition-colors">
                            <i x-show="theme === 'light'" class="fas fa-moon text-gray-600 dark:text-gray-300"></i>
                            <i x-show="theme === 'dark'" class="fas fa-sun text-yellow-500"></i>
                        </button>
                    </div>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button @click="isOpen = !isOpen" class="inline-flex items-center justify-center p-2 rounded-md hover:bg-primary-100 dark:hover:bg-gray-700 focus:outline-none">
                        <i x-show="!isOpen" class="fas fa-bars text-gray-600 dark:text-gray-300"></i>
                        <i x-show="isOpen" class="fas fa-times text-gray-600 dark:text-gray-300"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="isOpen" x-transition class="md:hidden bg-white dark:bg-gray-800 shadow-lg">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="#home" @click="isOpen = false" class="block px-3 py-2 rounded-md text-base font-medium hover:bg-primary-100 dark:hover:bg-gray-700">Home</a>
                <a href="#about" @click="isOpen = false" class="block px-3 py-2 rounded-md text-base font-medium hover:bg-primary-100 dark:hover:bg-gray-700">About</a>
                <a href="#services" @click="isOpen = false" class="block px-3 py-2 rounded-md text-base font-medium hover:bg-primary-100 dark:hover:bg-gray-700">Services</a>
                <a href="#portfolio" @click="isOpen = false" class="block px-3 py-2 rounded-md text-base font-medium hover:bg-primary-100 dark:hover:bg-gray-700">Portfolio</a>
                <a href="#contact" @click="isOpen = false" class="block px-3 py-2 rounded-md text-base font-medium hover:bg-primary-100 dark:hover:bg-gray-700">Contact</a>

                <!-- Theme Toggle -->
                <button @click="theme = theme === 'light' ? 'dark' : 'light'; localStorage.setItem('theme', theme)" 
                        class="w-full text-left px-3 py-2 rounded-md text-base font-medium hover:bg-primary-100 dark:hover:bg-gray-700">
                    <i x-show="theme === 'light'" class="fas fa-moon mr-2"></i>
                    <i x-show="theme === 'dark'" class="fas fa-sun mr-2"></i>
                    <span x-text="theme === 'light' ? 'Dark Mode' : 'Light Mode'"></span>
                </button>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300">
        <div class="container mx-auto px-4 py-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- About -->
                <div>
                    <h3 class="text-lg font-semibold mb-4 text-primary-600 dark:text-primary-400">About Me</h3>
                    <p class="mb-4">A professional web developer with a passion for creating beautiful, functional websites.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-500 hover:text-primary-600 dark:hover:text-primary-400 transition-colors">
                            <i class="fab fa-twitter text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-500 hover:text-primary-600 dark:hover:text-primary-400 transition-colors">
                            <i class="fab fa-linkedin text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-500 hover:text-primary-600 dark:hover:text-primary-400 transition-colors">
                            <i class="fab fa-github text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-500 hover:text-primary-600 dark:hover:text-primary-400 transition-colors">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-lg font-semibold mb-4 text-primary-600 dark:text-primary-400">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="#home" class="hover:text-primary-600 dark:hover:text-primary-400 transition-colors">Home</a></li>
                        <li><a href="#about" class="hover:text-primary-600 dark:hover:text-primary-400 transition-colors">About</a></li>
                        <li><a href="#services" class="hover:text-primary-600 dark:hover:text-primary-400 transition-colors">Services</a></li>
                        <li><a href="#portfolio" class="hover:text-primary-600 dark:hover:text-primary-400 transition-colors">Portfolio</a></li>
                        <li><a href="#contact" class="hover:text-primary-600 dark:hover:text-primary-400 transition-colors">Contact</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h3 class="text-lg font-semibold mb-4 text-primary-600 dark:text-primary-400">Contact Info</h3>
                    <ul class="space-y-2">
                        <li class="flex items-center">
                            <i class="fas fa-map-marker-alt mr-2"></i>
                            <span>Your Address, City, Country</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone mr-2"></i>
                            <span>+123 456 7890</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope mr-2"></i>
                            <span>your.email@example.com</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="mt-8 pt-8 border-t border-gray-300 dark:border-gray-700 text-center">
                <p>&copy; {{ date('Y') }} {{ config('app.name', 'Portfolio') }}. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Alpine.js for interactivity -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>
