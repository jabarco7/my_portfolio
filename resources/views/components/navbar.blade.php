    <nav class="fixed top-0 left-0 right-0 z-50 bg-base-100 shadow-md transition-all duration-300" x-data="{ isOpen: false }"
        @click.away="isOpen = false">
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
                    <div class="ml-10 flex items-baseline space-x-2">
                        <a href="{{ route('home') }}"
                            class="nav-link px-3 py-2 rounded-md text-sm font-medium text-base-content no-underline">
                            Home
                        </a>
                        <a href="{{ route('about') }}"
                            class="nav-link px-3 py-2 rounded-md text-sm font-medium text-base-content no-underline">
                            About
                        </a>
                        <a href="{{ route('skills') }}"
                            class="nav-link px-3 py-2 rounded-md text-sm font-medium text-base-content no-underline">
                            Skills
                        </a>
                        <a href="{{ route('certificates') }}"
                            class="nav-link px-3 py-2 rounded-md text-sm font-medium text-base-content no-underline">
                            Certificates
                        </a>
                        <a href="{{ route('projects') }}"
                            class="nav-link px-3 py-2 rounded-md text-sm font-medium text-base-content no-underline">
                            Projects
                        </a>
                        <a href="{{ route('contact') }}"
                            class="nav-link px-3 py-2 rounded-md text-sm font-medium text-base-content no-underline">
                            Contact
                        </a>

                        <button @click="theme = theme === 'light' ? 'dark' : 'light'"
                            class="theme-btn px-4 py-2 rounded-lg text-sm font-medium flex items-center gap-2 ml-4">
                            <span x-show="theme === 'light'" class="flex items-center gap-1">
                                <i class="fas fa-sun text-lg"></i>
                            </span>
                            <span x-show="theme === 'dark'" class="flex items-center gap-1">
                                <i class="fas fa-moon text-lg"></i>
                            </span>
                        </button>
                    </div>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden flex gap-2">
                    <button @click="theme = theme === 'light' ? 'dark' : 'light'"
                        class="theme-btn px-3 py-2 rounded-lg flex items-center">
                        <span x-show="theme === 'light'">
                            <i class="fas fa-sun text-lg"></i>
                        </span>
                        <span x-show="theme === 'dark'">
                            <i class="fas fa-moon text-lg"></i>
                        </span>
                    </button>
                    <button @click="isOpen = !isOpen"
                        class="mobile-menu-btn inline-flex items-center justify-center p-2 rounded-md focus:outline-none">
                        <i x-show="!isOpen" class="fas fa-bars text-base-content text-xl"></i>
                        <i x-show="isOpen" class="fas fa-times text-base-content text-xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="isOpen" x-transition class="md:hidden bg-base-100 shadow-lg">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="{{ route('home') }}" @click="isOpen = false"
                    class="nav-link block px-3 py-2 rounded-md text-base font-medium text-base-content no-underline">
                    Home
                </a>
                <a href="{{ route('about') }}" @click="isOpen = false"
                    class="nav-link block px-3 py-2 rounded-md text-base font-medium text-base-content no-underline">
                    About
                </a>
                <a href="{{ route('skills') }}" @click="isOpen = false"
                    class="nav-link block px-3 py-2 rounded-md text-base font-medium text-base-content no-underline">
                    Skills
                </a>
                <a href="{{ route('certificates') }}" @click="isOpen = false"
                    class="nav-link block px-3 py-2 rounded-md text-base font-medium text-base-content no-underline">
                    Certificates
                </a>
                <a href="{{ route('projects') }}" @click="isOpen = false"
                    class="nav-link block px-3 py-2 rounded-md text-base font-medium text-base-content no-underline">
                    Projects
                </a>
                <a href="{{ route('contact') }}" @click="isOpen = false"
                    class="nav-link block px-3 py-2 rounded-md text-base font-medium text-base-content no-underline">
                    Contact
                </a>
            </div>
        </div>
    </nav>
