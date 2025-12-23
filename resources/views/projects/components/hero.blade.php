<!-- Hero Section for Projects -->
<section id="projects-hero" class="relative min-h-screen flex items-center overflow-hidden bg-base-100 pt-20">
    <!-- Abstract Background Shapes -->
    <div class="absolute inset-0 overflow-hidden">
        <div
            class="absolute top-1/4 left-1/4 w-72 h-72 bg-primary-100/30 dark:bg-primary-900/20 rounded-full mix-blend-multiply blur-3xl animate-pulse-slow">
        </div>
        <div
            class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-secondary-100/20 dark:bg-secondary-900/10 rounded-full mix-blend-multiply blur-3xl">
        </div>
        <div
            class="absolute top-1/2 left-1/3 w-64 h-64 bg-blue-100/20 dark:bg-blue-900/10 rounded-full mix-blend-multiply blur-3xl">
        </div>
    </div>

    <!-- Grid Pattern -->
    <div class="absolute inset-0 opacity-5 dark:opacity-10">
        <div class="absolute inset-0"
            style="background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" xmlns="http://www.w3.org/2000/svg"%3E%3Cpath d="M0 0h60v60H0z" fill="none"/%3E%3Cpath d="M0 0h2v60H0zM20 0h2v60H20zM40 0h2v60H40zM58 0h2v60H58zM0 0v2h60V0zM0 20v2h60V20zM0 40v2h60V40zM0 58v2h60V58z" fill="%23000000" fill-opacity="0.2"/%3E%3C/svg%3E');">
        </div>
    </div>

    <!-- Floating Elements -->
    <div class="absolute top-20 right-20 hidden lg:block">
        <div class="relative">
            <div
                class="w-16 h-16 rounded-2xl bg-gradient-to-br from-primary-400 to-secondary-400 rotate-12 opacity-20 animate-float-slow">
            </div>
            <div
                class="absolute -top-4 -left-4 w-8 h-8 rounded-full bg-secondary-300/40 dark:bg-secondary-700/40 animate-float">
            </div>
        </div>
    </div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="max-w-7xl mx-auto">
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-20 items-center">
                <!-- Content Column -->
                <div>
                    <!-- Main Heading -->
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold tracking-tight mb-6">
                        <span class="block text-base-content">My Creative</span>
                        <span
                            class="block mt-2 text-transparent bg-clip-text bg-gradient-to-r from-primary-500 via-purple-500 to-secondary-500 animate-gradient">
                            Projects
                        </span>
                    </h1>
                    <!-- Description -->
                    <div class="space-y-4 mb-8">
                        <p class="text-lg text-base-content/70 leading-relaxed">
                            Explore my portfolio of web development projects. Each project represents a unique challenge
                            solved with clean code, modern design, and user-focused solutions.
                        </p>
                        <p class="text-lg text-base-content/70 leading-relaxed">
                            From full-stack applications to responsive websites, see how I bring ideas to life.
                        </p>
                    </div>

                    <!-- Project Stats -->
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-6 mb-10">
                        <div class="text-center p-4 rounded-xl bg-base-200/50 backdrop-blur-sm border border-base-300">
                            <div class="text-3xl font-bold text-primary mb-2">
                                {{ $pageContent['hero_stats']['projects_count'] ?? $projects->count() }}+</div>
                            <div class="text-sm text-base-content/70">Projects</div>
                        </div>
                        <div class="text-center p-4 rounded-xl bg-base-200/50 backdrop-blur-sm border border-base-300">
                            <div class="text-3xl font-bold text-secondary mb-2">
                                {{ $pageContent['hero_stats']['completed_projects'] ?? $totalActiveProjects }}</div>
                            <div class="text-sm text-base-content/70">Completed</div>
                        </div>
                        <div class="text-center p-4 rounded-xl bg-base-200/50 backdrop-blur-sm border border-base-300">
                            <div class="text-3xl font-bold text-purple-500 mb-2">
                                {{ $pageContent['hero_stats']['client_satisfaction'] ?? '100%' }}</div>
                            <div class="text-sm text-base-content/70">Client Satisfaction</div>
                        </div>
                    </div>

                    <!-- Call to Action Buttons -->
                    <div class="flex flex-wrap justify-center gap-4">
                        <a href="#projects-grid"
                            class="group relative inline-flex items-center gap-3 px-3 py-4 bg-gradient-to-r from-primary-500 to-secondary-500 hover:from-primary-600 hover:to-secondary-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 overflow-hidden">
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-primary-600 to-secondary-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            </div>
                            <i class="fas fa-eye relative z-10"></i>
                            <span class="relative z-10">View Projects</span>
                            <i
                                class="fas fa-arrow-down relative z-10 group-hover:translate-y-1 transition-transform duration-300"></i>
                        </a>
                        <a href="{{ route('contact') }}"
                            class="group inline-flex items-center gap-3 px-4 py-4 bg-base-200 backdrop-blur-sm border border-base-300 text-base-content font-semibold rounded-xl hover:bg-base-300 shadow-md hover:shadow-lg transition-all duration-300">
                            <i class="fas fa-envelope"></i>
                            <span>Discuss Project</span>
                            <i
                                class="fas fa-arrow-right opacity-0 group-hover:opacity-100 group-hover:translate-x-1 transition-all duration-300"></i>
                        </a>
                    </div>
                </div>

                <!-- Visual Column - Projects Showcase -->
                <div class="relative hidden lg:block">
                    <div class="relative max-w-lg mx-auto">
                        <!-- Projects Display Concept -->
                        <div
                            class="relative bg-gradient-to-br from-primary-400/20 via-transparent to-secondary-400/20 rounded-3xl p-8 backdrop-blur-sm">
                            <!-- Main Project Card -->
                            <div class="relative rounded-2xl overflow-hidden shadow-2xl border border-base-300">
                                <!-- Project Mockup -->
                                <div class="relative bg-gradient-to-br from-gray-900 to-gray-800">
                                    <!-- Browser Mockup -->
                                    <div class="bg-gray-800 px-4 py-3 flex items-center justify-between">
                                        <div class="flex items-center gap-2">
                                            <div class="flex gap-1.5">
                                                <div class="w-3 h-3 rounded-full bg-red-500"></div>
                                                <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                                                <div class="w-3 h-3 rounded-full bg-green-500"></div>
                                            </div>
                                            <span class="text-xs text-gray-400 ml-2">project-demo.com</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <i class="fas fa-lock text-gray-500 text-xs"></i>
                                            <i class="fas fa-star text-gray-500 text-xs"></i>
                                        </div>
                                    </div>

                                    <!-- Project Preview -->
                                    <div class="p-6">
                                        <div class="grid grid-cols-3 gap-2 mb-4">
                                            <div class="h-3 bg-blue-500/30 rounded"></div>
                                            <div class="h-3 bg-purple-500/30 rounded"></div>
                                            <div class="h-3 bg-green-500/30 rounded"></div>
                                        </div>
                                        <div class="space-y-2">
                                            <div class="h-2 bg-gray-700 rounded"></div>
                                            <div class="h-2 bg-gray-700 rounded w-5/6"></div>
                                            <div class="h-2 bg-gray-700 rounded w-4/6"></div>
                                        </div>
                                        <div class="mt-6 grid grid-cols-2 gap-3">
                                            <div
                                                class="h-20 bg-gradient-to-br from-primary-500/20 to-transparent rounded-lg">
                                            </div>
                                            <div
                                                class="h-20 bg-gradient-to-br from-secondary-500/20 to-transparent rounded-lg">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Project Info -->
                                <div class="p-6 bg-base-100">
                                    <div class="flex items-center justify-between mb-4">
                                        <h3 class="text-lg font-bold text-base-content">Modern Web App</h3>
                                        <span
                                            class="px-3 py-1 rounded-full bg-primary/10 text-primary text-xs font-medium">
                                            Featured
                                        </span>
                                    </div>
                                    <div class="flex flex-wrap gap-2 mb-4">
                                        <span
                                            class="px-2 py-1 rounded bg-base-200 text-xs text-base-content">Laravel</span>
                                        <span
                                            class="px-2 py-1 rounded bg-base-200 text-xs text-base-content">Vue.js</span>
                                        <span
                                            class="px-2 py-1 rounded bg-base-200 text-xs text-base-content">Tailwind</span>
                                    </div>
                                    <div class="flex gap-3">
                                        <button
                                            class="flex-1 py-2 rounded-lg bg-primary/10 text-primary text-sm font-medium hover:bg-primary/20 transition-colors duration-300">
                                            Live Demo
                                        </button>
                                        <button
                                            class="flex-1 py-2 rounded-lg bg-base-200 text-base-content text-sm font-medium hover:bg-base-300 transition-colors duration-300">
                                            View Details
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Floating Elements -->
                        <div
                            class="absolute -top-6 -right-6 w-40 h-40 bg-gradient-to-br from-primary-400/20 to-transparent rounded-3xl -rotate-12 animate-float-slow">
                        </div>
                        <div
                            class="absolute -bottom-8 -left-8 w-32 h-32 bg-gradient-to-br from-secondary-400/20 to-transparent rounded-2xl rotate-12 animate-float-slower">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 hidden lg:block">
        <a href="#projects-grid" class="animate-bounce">
            <div class="w-10 h-16 rounded-full border-2 border-base-300 flex justify-center">
                <div class="w-1 h-3 bg-base-content/40 rounded-full mt-2"></div>
            </div>
        </a>
    </div>
</section>