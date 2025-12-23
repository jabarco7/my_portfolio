@extends('layouts.app')

@section('title', 'Projects')

@section('content')
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
                style="background-image: url('data:image/svg+xml,%3Csvg width=\"60\" height=\"60\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cpath d=\"M0 0h60v60H0z\" fill=\"none\"/%3E%3Cpath d=\"M0 0h2v60H0zM20 0h2v60H20zM40 0h2v60H40zM58 0h2v60H58zM0 0v2h60V0zM0 20v2h60V20zM0 40v2h60V40zM0 58v2h60V58z\" fill=\"%23000000\" fill-opacity=\"0.2\"/%3E%3C/svg%3E');">
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

    <!-- Projects Filter Section -->
    <section id="projects-filter" class="py-12 bg-base-200/30">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
                    <div>
                        <h2 class="text-2xl font-bold text-base-content">Browse Projects</h2>
                        <p class="text-base-content/70">Filter by category or technology</p>
                    </div>

                    <!-- Category Filter Dropdown -->
                    <div class="flex flex-wrap gap-3">
                        <!-- All Projects Button -->
                        <a href="{{ route('projects') }}"
                            class="px-4 py-2 rounded-lg {{ !request()->has('category') ? 'bg-gradient-to-r from-primary-500 to-secondary-500 text-white' : 'bg-base-200 text-base-content border border-base-300 hover:bg-base-300' }} font-medium transition-all duration-300 hover:shadow-lg">
                            All Projects
                        </a>

                        <!-- Category Buttons -->
                        @foreach ($categories as $category)
                            <a href="{{ route('projects', ['category' => $category->id]) }}"
                                class="px-4 py-2 rounded-lg {{ request()->get('category') == $category->id ? 'bg-gradient-to-r from-primary-500 to-secondary-500 text-white' : 'bg-base-200 text-base-content border border-base-300 hover:bg-base-300' }} font-medium transition-all duration-300 hover:shadow-lg">
                                {{ $category->name }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Projects Grid Section -->
    <section id="projects-grid" class="py-20 bg-base-100/50 relative">
        <div class="absolute inset-0 overflow-hidden opacity-10">
            <div class="absolute top-0 right-0 w-96 h-96 bg-primary-400/20 rounded-full mix-blend-multiply blur-3xl"></div>
        </div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="max-w-7xl mx-auto">
                @if ($projects->count() > 0)
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach ($projects as $project)
                            @php
                                // Get actual category from database
                                $category = $project->category ? $project->category->name : 'Uncategorized';
                                $categorySlug = $project->category ? $project->category->slug : 'uncategorized';
                                // Get tags for filtering
                                $tagNames = $project->tags
                                    ->pluck('name')
                                    ->map(function ($name) {
                                        return strtolower($name);
                                    })
                                    ->toArray();
                            @endphp

                            <div class="project-card group" data-category="{{ $categorySlug }}"
                                data-tags="{{ implode(',', $tagNames) }}">
                                <div
                                    class="bg-base-100 rounded-2xl border border-base-300 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 overflow-hidden h-full flex flex-col">
                                    <!-- Project Image -->
                                    <div class="relative h-64 overflow-hidden">
                                        @if ($project->featured_image)
                                            <img src="{{ asset('storage/' . $project->featured_image) }}"
                                                alt="{{ $project->title }}"
                                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                        @else
                                            <div
                                                class="w-full h-full bg-gradient-to-br from-primary-500/20 to-secondary-500/20 flex items-center justify-center">
                                                <i class="fas fa-code text-5xl text-primary/50"></i>
                                            </div>
                                        @endif

                                        <!-- Project Overlay -->
                                        <div
                                            class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                            <div
                                                class="absolute bottom-0 left-0 right-0 p-6 text-white transform translate-y-full group-hover:translate-y-0 transition-transform duration-500">
                                                <div class="flex gap-2">
                                                    @if ($project->project_url)
                                                        <a href="{{ $project->project_url }}" target="_blank"
                                                            class="flex-1 inline-flex items-center justify-center gap-2 px-3 py-2 bg-white/20 backdrop-blur-sm rounded-lg hover:bg-white/30 transition-all duration-300">
                                                            <i class="fas fa-external-link-alt text-xs"></i>
                                                            <span class="text-sm">Live Demo</span>
                                                        </a>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>

                                        <!-- Project Category Badge -->
                                        <div class="absolute top-4 right-4">
                                            <span
                                                class="px-3 py-1 rounded-full bg-primary/90 backdrop-blur-sm text-white text-xs font-medium">
                                                {{ ucfirst($category) }}
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Project Content -->
                                    <div class="p-6 flex-grow">
                                        <div class="flex items-start justify-between mb-4">
                                            <h3 class="text-xl font-bold text-base-content">{{ $project->title }}</h3>
                                            @if ($project->is_featured)
                                                <span
                                                    class="px-2 py-1 rounded bg-amber-100 dark:bg-amber-900/30 text-amber-800 dark:text-amber-400 text-xs font-medium">
                                                    Featured
                                                </span>
                                            @endif
                                        </div>

                                        <p class="text-base-content/70 mb-6 leading-relaxed">
                                            {{ $project->excerpt ?? Str::limit($project->description, 120) }}
                                        </p>

                                        <!-- Tech Stack -->
                                        <div class="mb-6">
                                            <div class="flex flex-wrap gap-2">
                                                @foreach ($project->tags as $tag)
                                                    <span
                                                        class="px-3 py-1.5 rounded-lg bg-base-200 text-base-content text-sm">
                                                        {{ $tag->name }}
                                                    </span>
                                                @endforeach
                                            </div>
                                        </div>

                                        <!-- Project Meta -->
                                        <div
                                            class="flex items-center justify-center text-sm text-base-content/60 border-t border-base-300 pt-4">
                                            <div class="flex items-center gap-1">
                                                <i class="fas fa-calendar-alt"></i>
                                                <span>{{ $project->created_at->format('M Y') }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Project Actions -->
                                    <div class="p-6 pt-0">
                                        <div class="flex gap-3">
                                            <a href="{{ route('projects.show', $project->slug ?? $project->id) }}"
                                                class="group/view flex-1 inline-flex items-center justify-center gap-2 px-4 py-3 bg-primary/10 text-primary font-medium rounded-lg hover:bg-primary/20 transition-all duration-300">
                                                <i class="fas fa-expand-alt"></i>
                                                <span>View Details</span>
                                            </a>
                                            <a href="{{ route('projects.show', $project->slug ?? $project->id) }}"
                                                class="inline-flex items-center justify-center w-12 h-12 bg-base-200 rounded-lg hover:bg-base-300 transition-all duration-300 group/expand">
                                                <i
                                                    class="fas fa-eye text-base-content/70 group-hover/expand:text-primary"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination or Load More -->
                    @if (request()->get('page', 1) == 1 && $totalActiveProjects > 6)
                        <div class="text-center mt-12">
                            <a href="{{ route('projects', ['page' => 2]) }}"
                                class="group inline-flex items-center gap-3 px-8 py-4 bg-base-200 backdrop-blur-sm border border-base-300 text-base-content font-semibold rounded-xl hover:bg-base-300 shadow-md hover:shadow-lg transition-all duration-300">
                                <i class="fas fa-sync-alt group-hover:rotate-180 transition-transform duration-300"></i>
                                <span>Load More Projects</span>
                            </a>
                        </div>
                    @elseif (request()->get('page', 1) > 1)
                        <div class="text-center mt-12">
                            <a href="{{ route('projects') }}"
                                class="group inline-flex items-center gap-3 px-8 py-4 bg-base-200 backdrop-blur-sm border border-base-300 text-base-content font-semibold rounded-xl hover:bg-base-300 shadow-md hover:shadow-lg transition-all duration-300">
                                <i class="fas fa-arrow-left"></i>
                                <span>Show Less</span>
                            </a>
                        </div>
                    @endif
                @else
                    <!-- No Projects Message -->
                    <div class="text-center py-20">
                        <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-base-200 mb-6">
                            <i class="fas fa-folder-open text-3xl text-base-content/50"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-base-content mb-4">No Projects Available</h3>
                        <p class="text-base-content/70 max-w-md mx-auto mb-8">
                            Currently working on new projects. Check back soon or contact me to discuss your project ideas.
                        </p>
                        <a href="{{ route('contact') }}"
                            class="inline-flex items-center gap-3 px-8 py-4 bg-gradient-to-r from-primary-500 to-secondary-500 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                            <i class="fas fa-envelope"></i>
                            <span>Start a Project</span>
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Project Types Section -->
    {{-- <section id="project-types" class="py-20 bg-base-200/30 relative">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-6xl mx-auto">
                <!-- Project Type Cards -->
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @if ($pageContent['project_types'] ?? null)
                        @foreach ($pageContent['project_types'] as $type)
                            <div class="group">
                                <div
                                    class="bg-base-100 rounded-2xl p-8 border border-base-300 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2 h-full">
                                    <div
                                        class="inline-flex items-center justify-center w-16 h-16 rounded-xl bg-gradient-to-br {{ $type['color'] }} text-white text-2xl mb-6">
                                        <i class="{{ $type['icon'] }}"></i>
                                    </div>
                                    <h3 class="text-xl font-bold text-base-content mb-4">{{ $type['title'] }}</h3>
                                    <p class="text-base-content/70 mb-6">{{ $type['description'] }}</p>

                                    <div class="flex items-center justify-between">
                                        <span class="text-sm text-base-content/60">{{ $type['count'] }} projects</span>
                                        <span
                                            class="text-primary group-hover:translate-x-1 transition-transform duration-300">
                                            <i class="fas fa-arrow-right"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        @foreach ([
            ['title' => 'Web Applications', 'description' => 'Custom web applications with modern frameworks and responsive design.', 'icon' => 'fas fa-window-restore', 'color' => 'from-primary-500 to-secondary-500', 'count' => '15+'],
            ['title' => 'E-Commerce Solutions', 'description' => 'Online stores with secure payment integration and inventory management.', 'icon' => 'fas fa-shopping-cart', 'color' => 'from-blue-500 to-cyan-500', 'count' => '8+'],
            ['title' => 'API Development', 'description' => 'RESTful APIs and backend services for web and mobile applications.', 'icon' => 'fas fa-code-branch', 'color' => 'from-purple-500 to-pink-500', 'count' => '12+'],
            ['title' => 'Mobile Responsive', 'description' => 'Websites that work perfectly on all devices and screen sizes.', 'icon' => 'fas fa-mobile-alt', 'color' => 'from-green-500 to-emerald-500', 'count' => '20+'],
            ['title' => 'Dashboard & Admin Panels', 'description' => 'Management interfaces with data visualization and analytics.', 'icon' => 'fas fa-chart-line', 'color' => 'from-orange-500 to-red-500', 'count' => '10+'],
            ['title' => 'Custom Solutions', 'description' => 'Tailored software solutions for unique business needs.', 'icon' => 'fas fa-cogs', 'color' => 'from-indigo-500 to-purple-500', 'count' => '25+'],
        ] as $type)
                            <div class="group">
                                <div
                                    class="bg-base-100 rounded-2xl p-8 border border-base-300 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2 h-full">
                                    <div
                                        class="inline-flex items-center justify-center w-16 h-16 rounded-xl bg-gradient-to-br {{ $type['color'] }} text-white text-2xl mb-6">
                                        <i class="{{ $type['icon'] }}"></i>
                                    </div>
                                    <h3 class="text-xl font-bold text-base-content mb-4">{{ $type['title'] }}</h3>
                                    <p class="text-base-content/70 mb-6">{{ $type['description'] }}</p>

                                    <div class="flex items-center justify-between">
                                        <span class="text-sm text-base-content/60">{{ $type['count'] }} projects</span>
                                        <span
                                            class="text-primary group-hover:translate-x-1 transition-transform duration-300">
                                            <i class="fas fa-arrow-right"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section> --}}

    <!-- Project Process Section -->
    <section id="project-process" class="py-20 bg-base-100 relative">
        <div class="absolute inset-0 overflow-hidden opacity-10">
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-secondary-400/20 rounded-full mix-blend-multiply blur-3xl">
            </div>
        </div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="max-w-4xl mx-auto">
                <!-- Section Header -->
                <div class="text-center mb-16">
                    <div
                        class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary/10 text-primary text-sm font-medium mb-4">
                        <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                        Development Process
                    </div>
                    <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-6">
                        <span class="text-base-content">How I Bring</span>
                        <span
                            class="text-transparent bg-clip-text bg-gradient-to-r from-primary-500 to-secondary-500">Ideas
                            to Life</span>
                    </h2>
                    <p class="text-lg text-base-content/70 max-w-3xl mx-auto">
                        Every successful project follows a structured process to ensure quality, efficiency, and client
                        satisfaction.
                    </p>
                </div>

                <!-- Process Steps -->
                <div class="relative">
                    <!-- Timeline Line -->
                    <div
                        class="absolute left-8 md:left-1/2 transform md:-translate-x-1/2 h-full w-1 bg-gradient-to-b from-primary-400 to-secondary-400 hidden md:block">
                    </div>

                    <div class="space-y-12 md:space-y-0">
                        @if ($pageContent['process_steps'] ?? null)
                            @foreach ($pageContent['process_steps'] as $index => $step)
                                <div class="relative md:w-1/2 {{ $index % 2 == 0 ? 'md:pr-12' : 'md:ml-auto md:pl-12' }}">
                                    <!-- Step Circle -->
                                    <div
                                        class="absolute left-0 md:left-auto {{ $index % 2 == 0 ? 'md:-right-6' : 'md:-left-6' }} top-6 w-12 h-12 rounded-full border-4 border-base-100 bg-gradient-to-r from-primary-500 to-secondary-500 flex items-center justify-center text-white font-bold z-10">
                                        {{ $step['step'] }}
                                    </div>

                                    <!-- Step Card -->
                                    <div
                                        class="ml-14 md:ml-0 bg-base-100 rounded-2xl p-8 border border-base-300 shadow-lg hover:shadow-xl transition-shadow duration-300">
                                        <div
                                            class="inline-flex items-center justify-center w-12 h-12 rounded-lg bg-primary/10 text-primary text-xl mb-4">
                                            <i class="{{ $step['icon'] }}"></i>
                                        </div>
                                        <h3 class="text-xl font-bold text-base-content mb-4">{{ $step['title'] }}</h3>
                                        <p class="text-base-content/70">{{ $step['description'] }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            @foreach ([
            ['step' => '01', 'title' => 'Discovery & Planning', 'description' => 'Understanding requirements, defining scope, and planning the project architecture.', 'icon' => 'fas fa-lightbulb'],
            ['step' => '02', 'title' => 'Design & Prototyping', 'description' => 'Creating wireframes, mockups, and interactive prototypes for client approval.', 'icon' => 'fas fa-paint-brush'],
            ['step' => '03', 'title' => 'Development', 'description' => 'Writing clean, maintainable code with regular updates and testing.', 'icon' => 'fas fa-code'],
            ['step' => '04', 'title' => 'Testing & Quality', 'description' => 'Rigorous testing across devices and browsers to ensure flawless performance.', 'icon' => 'fas fa-check-double'],
            ['step' => '05', 'title' => 'Deployment', 'description' => 'Launching the project with proper hosting, security, and optimization.', 'icon' => 'fas fa-rocket'],
            ['step' => '06', 'title' => 'Support & Maintenance', 'description' => 'Ongoing support, updates, and maintenance for long-term success.', 'icon' => 'fas fa-headset'],
        ] as $index => $step)
                                <div class="relative md:w-1/2 {{ $index % 2 == 0 ? 'md:pr-12' : 'md:ml-auto md:pl-12' }}">
                                    <!-- Step Circle -->
                                    <div
                                        class="absolute left-0 md:left-auto {{ $index % 2 == 0 ? 'md:-right-6' : 'md:-left-6' }} top-6 w-12 h-12 rounded-full border-4 border-base-100 bg-gradient-to-r from-primary-500 to-secondary-500 flex items-center justify-center text-white font-bold z-10">
                                        {{ $step['step'] }}
                                    </div>

                                    <!-- Step Card -->
                                    <div
                                        class="ml-14 md:ml-0 bg-base-100 rounded-2xl p-8 border border-base-300 shadow-lg hover:shadow-xl transition-shadow duration-300">
                                        <div
                                            class="inline-flex items-center justify-center w-12 h-12 rounded-lg bg-primary/10 text-primary text-xl mb-4">
                                            <i class="{{ $step['icon'] }}"></i>
                                        </div>
                                        <h3 class="text-xl font-bold text-base-content mb-4">{{ $step['title'] }}</h3>
                                        <p class="text-base-content/70">{{ $step['description'] }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Project Detail Modal -->
    <div id="project-modal" class="fixed inset-0 z-50 hidden overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen p-4">
            <!-- Modal Backdrop -->
            <div class="fixed inset-0 bg-black/50 backdrop-blur-sm" onclick="hideProjectModal()"></div>

            <!-- Modal Content -->
            <div class="relative bg-base-100 rounded-2xl shadow-2xl max-w-4xl w-full max-h-[90vh] overflow-y-auto">
                <div class="sticky top-0 z-10 flex justify-between items-center p-6 border-b border-base-300 bg-base-100">
                    <h3 class="text-2xl font-bold text-base-content">Project Details</h3>
                    <button onclick="hideProjectModal()"
                        class="w-10 h-10 rounded-lg bg-base-200 hover:bg-base-300 flex items-center justify-center transition-colors duration-300">
                        <i class="fas fa-times text-base-content/70"></i>
                    </button>
                </div>

                <div class="p-6">
                    <!-- Dynamic content will be inserted here by JavaScript -->
                    <div id="project-modal-content"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        /* Custom animations for projects page */
        @keyframes slide-up {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-slide-up {
            animation: slide-up 0.8s ease-out;
        }

        /* Project card animations */
        .project-card {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.5s ease, transform 0.5s ease;
        }

        .project-card.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Filter button styling */
        .project-filter-btn.active {
            box-shadow: 0 10px 30px rgba(99, 102, 241, 0.3);
        }

        /* Modal animations */
        #project-modal {
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }

        #project-modal.show {
            opacity: 1;
            visibility: visible;
        }

        #project-modal>div>div {
            transform: scale(0.9);
            transition: transform 0.3s ease;
        }

        #project-modal.show>div>div {
            transform: scale(1);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            #projects-filter .flex-wrap {
                justify-content: center;
            }

            .project-process .md\:w-1\/2 {
                width: 100% !important;
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Project filtering
            const filterButtons = document.querySelectorAll('.project-filter-btn');
            const projectCards = document.querySelectorAll('.project-card');

            console.log('Filter buttons found:', filterButtons.length);
            console.log('Project cards found:', projectCards.length);

            filterButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const filter = button.getAttribute('data-filter');
                    console.log('Filter clicked:', filter);

                    // Update active filter button
                    filterButtons.forEach(btn => {
                        btn.classList.remove('active', 'bg-gradient-to-r',
                            'from-primary-500', 'to-secondary-500', 'text-white');
                        btn.classList.add('bg-base-200', 'border', 'border-base-300',
                            'text-base-content');
                    });

                    button.classList.add('active', 'bg-gradient-to-r', 'from-primary-500',
                        'to-secondary-500', 'text-white');
                    button.classList.remove('bg-base-200', 'border', 'border-base-300',
                        'text-base-content');

                    // Filter project cards
                    let visibleCount = 0;
                    projectCards.forEach(card => {
                        card.style.display = 'none';
                        card.classList.remove('visible');

                        const category = card.getAttribute('data-category');
                        const tags = card.getAttribute('data-tags') ? card.getAttribute(
                            'data-tags').split(',').map(tag => tag.trim()
                            .toLowerCase()) : [];

                        console.log('Card category:', category, 'tags:', tags);

                        // Show project if filter matches category or any tag
                        const filterLower = filter.toLowerCase();
                        const shouldShow = filter === 'all' ||
                            category === filter ||
                            tags.some(tag => tag.includes(filterLower));

                        if (shouldShow) {
                            console.log('Showing card with category:', category, 'tags:',
                                tags);
                            setTimeout(() => {
                                card.style.display = 'block';
                                setTimeout(() => {
                                    card.classList.add('visible');
                                }, 50);
                            }, visibleCount * 50); // Stagger animation
                            visibleCount++;
                        }
                    });
                    console.log('Visible cards after filter:', visibleCount);
                });
            });

            // Project detail modal
            const modalButtons = document.querySelectorAll('.project-modal-btn');
            const modal = document.getElementById('project-modal');
            const modalContent = document.getElementById('project-modal-content');

            modalButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const project = JSON.parse(button.getAttribute('data-project'));
                    showProjectModal(project);
                });
            });

            // Initialize project cards as visible
            setTimeout(() => {
                projectCards.forEach(card => {
                    card.classList.add('visible');
                });
            }, 100);
        });

        function showProjectModal(project) {
            const modal = document.getElementById('project-modal');
            const modalContent = document.getElementById('project-modal-content');

            // Create modal content
            modalContent.innerHTML = `
                <div class="space-y-6">
                    <!-- Project Header -->
                    <div class="rounded-2xl overflow-hidden bg-gradient-to-br from-primary-500/10 to-secondary-500/10 p-8">
                        <div class="flex items-center justify-between mb-4">
                            <h4 class="text-2xl font-bold text-base-content">${project.title}</h4>
                            ${project.is_featured ? '<span class="px-3 py-1 rounded-full bg-amber-100 dark:bg-amber-900/30 text-amber-800 dark:text-amber-400 text-sm font-medium">Featured</span>' : ''}
                        </div>
                        <p class="text-base-content/70">${project.excerpt || project.description || 'No description available.'}</p>
                    </div>
                    
                    <!-- Project Details -->
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="space-y-4">
                            <div>
                                <div class="text-sm text-base-content/60 mb-2">Technologies Used</div>
                                <div class="flex flex-wrap gap-2">
                                    ${['Laravel', 'Vue.js', 'Tailwind CSS', 'MySQL', 'API'].map(tech => `
                                                                                                <span class="px-3 py-1.5 rounded-lg bg-base-200 text-base-content text-sm">${tech}</span>
                                                                                            `).join('')}
                                </div>
                            </div>
                            <div>
                                <div class="text-sm text-base-content/60 mb-2">Project Type</div>
                                <div>
                                    <span class="inline-flex items-center px-3 py-1 rounded-full bg-primary/10 text-primary">
                                        Full Stack Application
                                    </span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="space-y-4">
                            <div>
                                <div class="text-sm text-base-content/60 mb-2">Project Links</div>
                                <div class="flex flex-col gap-2">
                                    ${project.project_url ? `
                                                                                            <a href="${project.project_url}" target="_blank" class="inline-flex items-center gap-2 px-4 py-3 bg-primary/10 text-primary rounded-lg hover:bg-primary/20 transition-all duration-300">
                                                                                                <i class="fas fa-external-link-alt"></i>
                                                                                                <span>Live Demo</span>
                                                                                            </a>
                                                                                            ` : ''}
                                    ${project.github_url ? `
                                                                                           
                                                                                            ` : ''}
                                </div>
                            </div>
                            
                            <div>
                                <div class="text-sm text-base-content/60 mb-2">Project Timeline</div>
                                <div class="flex items-center gap-2">
                                    <i class="fas fa-calendar-alt text-primary"></i>
                                    <span class="font-semibold text-base-content">${new Date(project.created_at).toLocaleDateString('en-US', { month: 'long', year: 'numeric' })}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Project Description -->
                    <div>
                        <h5 class="text-lg font-bold text-base-content mb-4">Project Overview</h5>
                        <div class="prose prose-primary max-w-none">
                            <p class="text-base-content/70">
                                ${project.description || 'This project demonstrates expertise in modern web development practices. It includes responsive design, optimized performance, and clean code architecture.'}
                            </p>
                        </div>
                    </div>
                    
                    <!-- Key Features -->
                    <div>
                        <h5 class="text-lg font-bold text-base-content mb-4">Key Features</h5>
                        <ul class="grid md:grid-cols-2 gap-3">
                            ${['Responsive Design', 'User Authentication', 'Database Integration', 'API Endpoints', 'Admin Dashboard', 'Performance Optimized'].map(feature => `
                                                                                        <li class="flex items-center gap-3">
                                                                                            <i class="fas fa-check-circle text-green-500"></i>
                                                                                            <span class="text-base-content/70">${feature}</span>
                                                                                        </li>
                                                                                    `).join('')}
                        </ul>
                    </div>
                </div>
            `;

            // Show modal
            modal.classList.add('show');
            document.body.style.overflow = 'hidden';
        }

        function hideProjectModal() {
            const modal = document.getElementById('project-modal');
            modal.classList.remove('show');
            document.body.style.overflow = 'auto';
        }

        // Close modal with Escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                hideProjectModal();
            }
        });
    </script>
@endpush
