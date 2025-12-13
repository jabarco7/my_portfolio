@extends('layouts.app')

@section('title', $project->title . ' - Portfolio')

@section('content')
    <!-- Hero Section for Project Detail -->
    <section id="project-detail-hero" class="relative min-h-screen flex items-center overflow-hidden bg-base-100 pt-20">
        <!-- Abstract Background Shapes -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute top-1/4 left-1/4 w-72 h-72 bg-primary-100/30 dark:bg-primary-900/20 rounded-full mix-blend-multiply blur-3xl animate-pulse-slow"></div>
            <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-secondary-100/20 dark:bg-secondary-900/10 rounded-full mix-blend-multiply blur-3xl"></div>
            <div class="absolute top-1/2 left-1/3 w-64 h-64 bg-blue-100/20 dark:bg-blue-900/10 rounded-full mix-blend-multiply blur-3xl"></div>
        </div>

        <!-- Grid Pattern -->
        <div class="absolute inset-0 opacity-5 dark:opacity-10">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=\"60\" height=\"60\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cpath d=\"M0 0h60v60H0z\" fill=\"none\"/%3E%3Cpath d=\"M0 0h2v60H0zM20 0h2v60H20zM40 0h2v60H40zM58 0h2v60H58zM0 0v2h60V0zM0 20v2h60V20zM0 40v2h60V40zM0 58v2h60V58z\" fill=\"%23000000\" fill-opacity=\"0.2\"/%3E%3C/svg%3E');"></div>
        </div>

        <!-- Floating Elements -->
        <div class="absolute top-20 right-20 hidden lg:block">
            <div class="relative">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-primary-400 to-secondary-400 rotate-12 opacity-20 animate-float-slow"></div>
                <div class="absolute -top-4 -left-4 w-8 h-8 rounded-full bg-secondary-300/40 dark:bg-secondary-700/40 animate-float"></div>
            </div>
        </div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="max-w-7xl mx-auto">
                <div class="grid lg:grid-cols-2 gap-12 lg:gap-20 items-center">
                    <!-- Content Column -->
                    <div class="animate-slide-up">
                        <!-- Badge -->
                        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary/10 text-primary text-sm font-medium mb-6">
                            <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                            Project Case Study
                        </div>

                        <!-- Main Heading -->
                        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold tracking-tight mb-6">
                            <span class="block text-base-content">{{ $project->title }}</span>
                            <span class="block mt-2 text-transparent bg-clip-text bg-gradient-to-r from-primary-500 via-purple-500 to-secondary-500 animate-gradient">
                                Project Details
                            </span>
                        </h1>

                        <!-- Description -->
                        <div class="space-y-4 mb-8">
                            <p class="text-lg text-base-content/70 leading-relaxed">
                                {{ $project->excerpt ?? Str::limit($project->description, 200) }}
                            </p>
                        </div>

                        <!-- Project Stats -->
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-6 mb-10">
                            <div class="text-center p-4 rounded-xl bg-base-200/50 backdrop-blur-sm border border-base-300">
                                <div class="text-3xl font-bold text-primary mb-2">
                                    {{ $project->technologies ? count(explode(',', $project->technologies)) : '5+' }}
                                </div>
                                <div class="text-sm text-base-content/70">Technologies</div>
                            </div>
                            <div class="text-center p-4 rounded-xl bg-base-200/50 backdrop-blur-sm border border-base-300">
                                <div class="text-3xl font-bold text-secondary mb-2">
                                    {{ $project->created_at ? $project->created_at->format('M Y') : 'Recent' }}
                                </div>
                                <div class="text-sm text-base-content/70">Completed</div>
                            </div>
                            <div class="text-center p-4 rounded-xl bg-base-200/50 backdrop-blur-sm border border-base-300">
                                <div class="text-3xl font-bold text-purple-500 mb-2">
                                    {{ $project->is_featured ? '⭐' : '✓' }}
                                </div>
                                <div class="text-sm text-base-content/70">
                                    {{ $project->is_featured ? 'Featured' : 'Completed' }}
                                </div>
                            </div>
                        </div>

                        <!-- Call to Action Buttons -->
                        <div class="flex flex-wrap gap-4">
                            @if ($project->project_url)
                                <a href="{{ $project->project_url }}" target="_blank" 
                                   class="group relative inline-flex items-center gap-3 px-8 py-4 bg-gradient-to-r from-primary-500 to-secondary-500 hover:from-primary-600 hover:to-secondary-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 overflow-hidden">
                                    <div class="absolute inset-0 bg-gradient-to-r from-primary-600 to-secondary-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                    <i class="fas fa-external-link-alt relative z-10"></i>
                                    <span class="relative z-10">Live Demo</span>
                                    <i class="fas fa-arrow-right relative z-10 opacity-0 group-hover:opacity-100 group-hover:translate-x-1 transition-all duration-300"></i>
                                </a>
                            @endif
                            
                            @if ($project->github_url)
                                <a href="{{ $project->github_url }}" target="_blank" 
                                   class="group inline-flex items-center gap-3 px-8 py-4 bg-base-200 backdrop-blur-sm border border-base-300 text-base-content font-semibold rounded-xl hover:bg-base-300 shadow-md hover:shadow-lg transition-all duration-300">
                                    <i class="fab fa-github"></i>
                                    <span>View Code</span>
                                    <i class="fas fa-arrow-right opacity-0 group-hover:opacity-100 group-hover:translate-x-1 transition-all duration-300"></i>
                                </a>
                            @endif
                        </div>
                    </div>

                    <!-- Visual Column - Project Preview -->
                    <div class="relative hidden lg:block">
                        <div class="relative max-w-lg mx-auto">
                            <!-- Project Display Concept -->
                            <div class="relative bg-gradient-to-br from-primary-400/20 via-transparent to-secondary-400/20 rounded-3xl p-8 backdrop-blur-sm">
                                <!-- Main Project Card -->
                                <div class="relative rounded-2xl overflow-hidden shadow-2xl border border-base-300">
                                    <!-- Project Mockup -->
                                    <div class="relative bg-gradient-to-br from-gray-900 to-gray-800">
                                        <!-- Browser Mockup Header -->
                                        <div class="bg-gray-800 px-4 py-3 flex items-center justify-between">
                                            <div class="flex items-center gap-2">
                                                <div class="flex gap-1.5">
                                                    <div class="w-3 h-3 rounded-full bg-red-500"></div>
                                                    <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                                                    <div class="w-3 h-3 rounded-full bg-green-500"></div>
                                                </div>
                                                <span class="text-xs text-gray-400 ml-2">
                                                    {{ parse_url($project->project_url ?? '#', PHP_URL_HOST) ?? 'project-demo.com' }}
                                                </span>
                                            </div>
                                            <div class="flex items-center gap-2">
                                                <i class="fas fa-lock text-gray-500 text-xs"></i>
                                                <i class="fas fa-star text-gray-500 text-xs"></i>
                                            </div>
                                        </div>
                                        
                                        <!-- Project Preview Content -->
                                        @if ($project->featured_image)
                                            <img src="{{ asset('storage/' . $project->featured_image) }}" 
                                                 alt="{{ $project->title }}"
                                                 class="w-full h-64 object-cover">
                                        @else
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
                                                    <div class="h-20 bg-gradient-to-br from-primary-500/20 to-transparent rounded-lg"></div>
                                                    <div class="h-20 bg-gradient-to-br from-secondary-500/20 to-transparent rounded-lg"></div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    
                                    <!-- Quick Info -->
                                    <div class="p-6 bg-base-100">
                                        <div class="flex flex-wrap gap-2 mb-4">
                                            @if($project->technologies)
                                                @foreach(array_slice(explode(',', $project->technologies), 0, 3) as $tech)
                                                    <span class="px-3 py-1.5 rounded-lg bg-base-200 text-base-content text-sm">
                                                        {{ trim($tech) }}
                                                    </span>
                                                @endforeach
                                            @endif
                                        </div>
                                        <div class="text-center">
                                            <a href="#project-content" class="text-primary font-medium hover:underline">
                                                Scroll for Details <i class="fas fa-arrow-down ml-2"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Floating Elements -->
                            <div class="absolute -top-6 -right-6 w-40 h-40 bg-gradient-to-br from-primary-400/20 to-transparent rounded-3xl -rotate-12 animate-float-slow"></div>
                            <div class="absolute -bottom-8 -left-8 w-32 h-32 bg-gradient-to-br from-secondary-400/20 to-transparent rounded-2xl rotate-12 animate-float-slower"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 hidden lg:block">
            <a href="#project-content" class="animate-bounce">
                <div class="w-10 h-16 rounded-full border-2 border-base-300 flex justify-center">
                    <div class="w-1 h-3 bg-base-content/40 rounded-full mt-2"></div>
                </div>
            </a>
        </div>
    </section>

    <!-- Project Content Section -->
    <section id="project-content" class="py-20 bg-base-100/50 relative">
        <div class="absolute inset-0 overflow-hidden opacity-10">
            <div class="absolute top-0 right-0 w-96 h-96 bg-primary-400/20 rounded-full mix-blend-multiply blur-3xl"></div>
        </div>
        
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="max-w-7xl mx-auto">
                <div class="grid lg:grid-cols-3 gap-12">
                    <!-- Main Content -->
                    <div class="lg:col-span-2 space-y-12">
                        <!-- Featured Image -->
                        @if ($project->featured_image)
                            <div class="rounded-2xl overflow-hidden shadow-2xl border border-base-300">
                                <img src="{{ asset('storage/' . $project->featured_image) }}" 
                                     alt="{{ $project->title }}"
                                     class="w-full h-auto object-cover">
                            </div>
                        @endif

                        <!-- Project Description -->
                        <div class="bg-base-100 rounded-2xl border border-base-300 shadow-lg p-8">
                            <div class="flex items-center gap-3 mb-8">
                                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-primary-500 to-secondary-500 flex items-center justify-center text-white text-xl">
                                    <i class="fas fa-info-circle"></i>
                                </div>
                                <div>
                                    <h2 class="text-2xl font-bold text-base-content">Project Overview</h2>
                                    <p class="text-base-content/70">Detailed insights about the project</p>
                                </div>
                            </div>
                            
                            <div class="prose prose-lg max-w-none text-base-content/80">
                                {!! nl2br(e($project->description)) !!}
                            </div>
                        </div>

                        <!-- Project Gallery -->
                        @if ($project->images && $project->images->count() > 0)
                            <div class="bg-base-100 rounded-2xl border border-base-300 shadow-lg p-8">
                                <div class="flex items-center gap-3 mb-8">
                                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-blue-500 to-cyan-500 flex items-center justify-center text-white text-xl">
                                        <i class="fas fa-images"></i>
                                    </div>
                                    <div>
                                        <h2 class="text-2xl font-bold text-base-content">Project Gallery</h2>
                                        <p class="text-base-content/70">Visual showcase of the project</p>
                                    </div>
                                </div>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    @foreach ($project->images as $image)
                                        <div class="group relative overflow-hidden rounded-xl border border-base-300">
                                            <img src="{{ asset('storage/' . $image->image_path) }}"
                                                 alt="{{ $image->alt_text ?? $project->title }}"
                                                 class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-110">
                                            @if ($image->caption)
                                                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                                    <div class="absolute bottom-0 left-0 right-0 p-4 text-white transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                                                        <p class="text-sm">{{ $image->caption }}</p>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- Key Features -->
                        <div class="bg-base-100 rounded-2xl border border-base-300 shadow-lg p-8">
                            <div class="flex items-center gap-3 mb-8">
                                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-green-500 to-emerald-500 flex items-center justify-center text-white text-xl">
                                    <i class="fas fa-star"></i>
                                </div>
                                <div>
                                    <h2 class="text-2xl font-bold text-base-content">Key Features</h2>
                                    <p class="text-base-content/70">Notable functionalities and capabilities</p>
                                </div>
                            </div>
                            
                            <div class="grid md:grid-cols-2 gap-6">
                                @foreach([
                                    'Responsive Design' => 'Works perfectly on all devices and screen sizes',
                                    'Modern Framework' => 'Built with the latest technologies and best practices',
                                    'Optimized Performance' => 'Fast loading times and efficient resource usage',
                                    'User Friendly' => 'Intuitive interface and seamless user experience',
                                    'Scalable Architecture' => 'Easy to extend and maintain as needs grow',
                                    'Security Focused' => 'Built with security best practices in mind'
                                ] as $feature => $description)
                                    <div class="flex gap-4 p-4 rounded-lg bg-base-200/50 hover:bg-base-200 transition-colors duration-300">
                                        <div class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center text-primary">
                                            <i class="fas fa-check"></i>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-base-content mb-1">{{ $feature }}</h4>
                                            <p class="text-sm text-base-content/70">{{ $description }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar -->
                    <div class="lg:col-span-1 space-y-8">
                        <!-- Project Details Card -->
                        <div class="bg-base-100 rounded-2xl border border-base-300 shadow-lg p-8">
                            <div class="flex items-center gap-3 mb-6">
                                <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-primary-500 to-secondary-500 flex items-center justify-center text-white">
                                    <i class="fas fa-cog"></i>
                                </div>
                                <h3 class="text-xl font-bold text-base-content">Project Details</h3>
                            </div>
                            
                            <div class="space-y-6">
                                <!-- Technologies -->
                                @if ($project->technologies)
                                    <div>
                                        <div class="flex items-center gap-2 mb-3">
                                            <i class="fas fa-code text-primary"></i>
                                            <span class="font-medium text-base-content">Technologies Used</span>
                                        </div>
                                        <div class="flex flex-wrap gap-2">
                                            @foreach(explode(',', $project->technologies) as $tech)
                                                <span class="px-3 py-2 rounded-lg bg-base-200 text-base-content text-sm">
                                                    {{ trim($tech) }}
                                                </span>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                <!-- Project Links -->
                                <div>
                                    <div class="flex items-center gap-2 mb-3">
                                        <i class="fas fa-link text-primary"></i>
                                        <span class="font-medium text-base-content">Project Links</span>
                                    </div>
                                    <div class="space-y-3">
                                        @if ($project->project_url)
                                            <a href="{{ $project->project_url }}" target="_blank"
                                               class="flex items-center gap-3 p-3 rounded-lg bg-primary/10 text-primary hover:bg-primary/20 transition-all duration-300 group">
                                                <div class="w-10 h-10 rounded-lg bg-primary/20 flex items-center justify-center">
                                                    <i class="fas fa-external-link-alt"></i>
                                                </div>
                                                <div class="flex-1">
                                                    <div class="font-medium">Live Demo</div>
                                                    <div class="text-xs text-primary/70 truncate">
                                                        {{ parse_url($project->project_url, PHP_URL_HOST) }}
                                                    </div>
                                                </div>
                                                <i class="fas fa-arrow-right opacity-0 group-hover:opacity-100 group-hover:translate-x-1 transition-all duration-300"></i>
                                            </a>
                                        @endif
                                        
                                        @if ($project->github_url)
                                            <a href="{{ $project->github_url }}" target="_blank"
                                               class="flex items-center gap-3 p-3 rounded-lg bg-base-200 text-base-content hover:bg-base-300 transition-all duration-300 group">
                                                <div class="w-10 h-10 rounded-lg bg-base-300 flex items-center justify-center">
                                                    <i class="fab fa-github"></i>
                                                </div>
                                                <div class="flex-1">
                                                    <div class="font-medium">Source Code</div>
                                                    <div class="text-xs text-base-content/70 truncate">
                                                        {{ parse_url($project->github_url, PHP_URL_HOST) }}
                                                    </div>
                                                </div>
                                                <i class="fas fa-arrow-right opacity-0 group-hover:opacity-100 group-hover:translate-x-1 transition-all duration-300"></i>
                                            </a>
                                        @endif
                                    </div>
                                </div>

                                <!-- Timeline -->
                                <div>
                                    <div class="flex items-center gap-2 mb-3">
                                        <i class="fas fa-calendar-alt text-primary"></i>
                                        <span class="font-medium text-base-content">Project Timeline</span>
                                    </div>
                                    <div class="space-y-2">
                                        <div class="flex justify-between items-center">
                                            <span class="text-sm text-base-content/70">Start Date</span>
                                            <span class="font-medium text-base-content">
                                                {{ $project->created_at ? $project->created_at->subMonths(2)->format('M Y') : 'Jan 2023' }}
                                            </span>
                                        </div>
                                        <div class="flex justify-between items-center">
                                            <span class="text-sm text-base-content/70">Completion Date</span>
                                            <span class="font-medium text-base-content">
                                                {{ $project->created_at ? $project->created_at->format('M Y') : 'Mar 2023' }}
                                            </span>
                                        </div>
                                        <div class="flex justify-between items-center">
                                            <span class="text-sm text-base-content/70">Duration</span>
                                            <span class="font-medium text-base-content">2 months</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Project Status -->
                                <div>
                                    <div class="flex items-center gap-2 mb-3">
                                        <i class="fas fa-chart-line text-primary"></i>
                                        <span class="font-medium text-base-content">Project Status</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <div class="w-3 h-3 rounded-full bg-green-500 animate-pulse"></div>
                                        <span class="font-medium text-green-600">Successfully Completed</span>
                                    </div>
                                    <p class="text-sm text-base-content/70 mt-2">
                                        Project delivered on time with all requirements met.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Back to Portfolio -->
                        <div class="bg-gradient-to-br from-primary-500/10 via-transparent to-secondary-500/10 rounded-2xl border border-primary/20 p-8">
                            <div class="text-center">
                                <div class="w-16 h-16 rounded-full bg-gradient-to-br from-primary-500 to-secondary-500 flex items-center justify-center text-white text-2xl mb-4 mx-auto">
                                    <i class="fas fa-arrow-left"></i>
                                </div>
                                <h4 class="text-lg font-bold text-base-content mb-2">Explore More Projects</h4>
                                <p class="text-base-content/70 mb-6">Check out other projects in my portfolio</p>
                                <a href="{{ route('projects') }}"
                                   class="group inline-flex items-center gap-3 px-6 py-3 bg-base-200 text-base-content font-medium rounded-lg hover:bg-base-300 transition-all duration-300 w-full justify-center">
                                    <i class="fas fa-briefcase"></i>
                                    <span>View Portfolio</span>
                                    <i class="fas fa-arrow-right opacity-0 group-hover:opacity-100 group-hover:translate-x-1 transition-all duration-300"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Share Project -->
                        <div class="bg-base-100 rounded-2xl border border-base-300 shadow-lg p-8">
                            <div class="flex items-center gap-3 mb-6">
                                <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-purple-500 to-pink-500 flex items-center justify-center text-white">
                                    <i class="fas fa-share-alt"></i>
                                </div>
                                <h3 class="text-xl font-bold text-base-content">Share Project</h3>
                            </div>
                            
<div class="grid grid-cols-4 gap-3">
    <!-- LinkedIn -->
    <a href="#" class="w-12 h-12 rounded-full bg-blue-600 text-white hover:bg-blue-700 transition-colors duration-300 flex items-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
            <path d="M4 4h4v16H4V4zm6 0h4v2h.06c.56-1.06 2.08-2 4.44-2 4.76 0 5.5 3.14 5.5 7.24V20h-4v-7.2c0-1.72-.03-3.94-2.4-3.94-2.42 0-2.78 1.88-2.78 3.82V20h-4V4z"/>
        </svg>
    </a>

    <!-- GitHub -->
    <a href="#" class="w-12 h-12 rounded-full bg-gray-800 text-white hover:bg-gray-900 transition-colors duration-300 flex items-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 0C5.37 0 0 5.37 0 12c0 5.3 3.44 9.8 8.2 11.4.6.11.82-.26.82-.58v-2.02c-3.34.72-4.03-1.61-4.03-1.61-.55-1.4-1.35-1.77-1.35-1.77-1.1-.76.08-.75.08-.75 1.22.09 1.86 1.26 1.86 1.26 1.08 1.84 2.84 1.31 3.54 1 .11-.78.42-1.31.76-1.61-2.66-.3-5.46-1.33-5.46-5.93 0-1.31.47-2.38 1.23-3.22-.12-.3-.53-1.51.12-3.14 0 0 1-.32 3.3 1.23a11.5 11.5 0 0 1 6 0c2.3-1.55 3.3-1.23 3.3-1.23.65 1.63.24 2.84.12 3.14.76.84 1.23 1.91 1.23 3.22 0 4.61-2.8 5.63-5.47 5.93.43.37.81 1.1.81 2.22v3.29c0 .32.21.7.82.58C20.56 21.8 24 17.3 24 12c0-6.63-5.37-12-12-12z"/>
        </svg>
    </a>

    <!-- Facebook -->
    <a href="#" class="w-12 h-12 rounded-full bg-blue-500 text-white hover:bg-blue-600 transition-colors duration-300 flex items-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
            <path d="M22.675 0H1.325C.593 0 0 .592 0 1.325v21.351C0 23.407.593 24 1.325 24h11.495v-9.294H9.691V11.18h3.129V8.414c0-3.1 1.893-4.788 4.658-4.788 1.325 0 2.463.099 2.795.143v3.24h-1.918c-1.504 0-1.796.716-1.796 1.766v2.317h3.59l-.467 3.527h-3.123V24h6.116c.73 0 1.324-.593 1.324-1.324V1.325C24 .592 23.407 0 22.675 0z"/>
        </svg>
    </a>

    <!-- Instagram -->
    <a href="#" class="w-12 h-12 rounded-full bg-pink-500 text-white hover:bg-pink-600 transition-colors duration-300 flex items-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 1.17.056 1.97.24 2.43.403a4.92 4.92 0 0 1 1.77 1.048 4.918 4.918 0 0 1 1.048 1.77c.163.46.347 1.26.403 2.43.058 1.266.07 1.645.07 4.85s-.012 3.584-.07 4.85c-.056 1.17-.24 1.97-.403 2.43a4.92 4.92 0 0 1-1.048 1.77 4.918 4.918 0 0 1-1.77 1.048c-.46.163-1.26.347-2.43.403-1.266.058-1.645.07-4.85.07s-3.584-.012-4.85-.07c-1.17-.056-1.97-.24-2.43-.403a4.92 4.92 0 0 1-1.77-1.048 4.918 4.918 0 0 1-1.048-1.77c-.163-.46-.347-1.26-.403-2.43C2.175 15.747 2.163 15.368 2.163 12s.012-3.584.07-4.85c.056-1.17.24-1.97.403-2.43a4.92 4.92 0 0 1 1.048-1.77A4.918 4.918 0 0 1 5.384 2.636c.46-.163 1.26-.347 2.43-.403C8.416 2.175 8.796 2.163 12 2.163zm0-2.163C8.735 0 8.332.013 7.052.072 5.775.131 4.842.345 4.042.63c-.822.296-1.513.692-2.208 1.386S1.226 3.373.93 4.195C.645 4.995.431 5.927.372 7.205.313 8.484.3 8.887.3 12s.013 3.516.072 4.795c.059 1.278.273 2.21.558 3.01.296.822.692 1.513 1.386 2.208s1.386 1.09 2.208 1.386c.8.285 1.732.499 3.01.558C8.484 23.687 8.887 23.7 12 23.7s3.516-.013 4.795-.072c1.278-.059 2.21-.273 3.01-.558.822-.296 1.513-.692 2.208-1.386s1.09-1.386 1.386-2.208c.285-.8.499-1.732.558-3.01.059-1.279.072-1.682.072-4.795s-.013-3.516-.072-4.795c-.059-1.278-.273-2.21-.558-3.01-.296-.822-.692-1.513-1.386-2.208S20.033.926 19.21.63c-.8-.285-1.732-.499-3.01-.558C15.516.013 15.113 0 12 0z"/>
            <path d="M12 5.838a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 0 0 0-12.324zm0 10.162a3.999 3.999 0 1 1 0-7.998 3.999 3.999 0 0 1 0 7.998z"/>
            <circle cx="18.406" cy="5.594" r="1.44"/>
        </svg>
    </a>
</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Challenges & Solutions Section -->
    <section id="challenges" class="py-20 bg-base-200/30 relative">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto">
                <!-- Section Header -->
                <div class="text-center mb-16">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary/10 text-primary text-sm font-medium mb-4">
                        <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                        Development Insights
                    </div>
                    <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-6">
                        <span class="text-base-content">Challenges &</span>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-500 to-secondary-500">Solutions</span>
                    </h2>
                    <p class="text-lg text-base-content/70 max-w-3xl mx-auto">
                        Every project comes with unique challenges. Here's how we solved them.
                    </p>
                </div>

                <!-- Challenges Cards -->
                <div class="grid md:grid-cols-2 gap-8">
                    <!-- Challenge Card -->
                    <div class="bg-base-100 rounded-2xl p-8 border border-base-300 shadow-lg">
                        <div class="inline-flex items-center justify-center w-12 h-12 rounded-xl bg-red-100 dark:bg-red-900/30 text-red-600 dark:text-red-400 text-xl mb-6">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <h3 class="text-xl font-bold text-base-content mb-4">Key Challenges</h3>
                        <ul class="space-y-3">
                            <li class="flex items-start gap-3">
                                <i class="fas fa-times text-red-500 mt-1"></i>
                                <span class="text-base-content/70">Complex database design requirements</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <i class="fas fa-times text-red-500 mt-1"></i>
                                <span class="text-base-content/70">Performance optimization for large datasets</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <i class="fas fa-times text-red-500 mt-1"></i>
                                <span class="text-base-content/70">Real-time data synchronization needs</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <i class="fas fa-times text-red-500 mt-1"></i>
                                <span class="text-base-content/70">Cross-browser compatibility requirements</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Solution Card -->
                    <div class="bg-base-100 rounded-2xl p-8 border border-base-300 shadow-lg">
                        <div class="inline-flex items-center justify-center w-12 h-12 rounded-xl bg-green-100 dark:bg-green-900/30 text-green-600 dark:text-green-400 text-xl mb-6">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <h3 class="text-xl font-bold text-base-content mb-4">Implemented Solutions</h3>
                        <ul class="space-y-3">
                            <li class="flex items-start gap-3">
                                <i class="fas fa-check text-green-500 mt-1"></i>
                                <span class="text-base-content/70">Optimized database indexing and query design</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <i class="fas fa-check text-green-500 mt-1"></i>
                                <span class="text-base-content/70">Implemented caching strategies for faster performance</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <i class="fas fa-check text-green-500 mt-1"></i>
                                <span class="text-base-content/70">Used WebSockets for real-time updates</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <i class="fas fa-check text-green-500 mt-1"></i>
                                <span class="text-base-content/70">Comprehensive testing across all major browsers</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section id="project-detail-cta" class="py-20 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-primary-500/5 via-transparent to-secondary-500/5"></div>
        
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-6">
                    <span class="text-base-content">Like What You See?</span>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-500 to-secondary-500">Let's Work Together</span>
                </h2>
                <p class="text-xl text-base-content/70 mb-10 max-w-2xl mx-auto">
                    Ready to bring your next project to life with the same quality and attention to detail?
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('contact') }}" class="group relative inline-flex items-center justify-center gap-3 px-8 py-4 bg-gradient-to-r from-primary-500 to-secondary-500 hover:from-primary-600 hover:to-secondary-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-r from-primary-600 to-secondary-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <i class="fas fa-envelope relative z-10"></i>
                        <span class="relative z-10">Start a Project</span>
                        <i class="fas fa-arrow-right relative z-10 group-hover:translate-x-1 transition-transform duration-300"></i>
                    </a>
                    <a href="{{ route('projects') }}" class="group inline-flex items-center justify-center gap-3 px-8 py-4 bg-base-200 backdrop-blur-sm border border-base-300 text-base-content font-semibold rounded-xl hover:bg-base-300 shadow-md hover:shadow-lg transition-all duration-300">
                        <i class="fas fa-briefcase"></i>
                        <span>View More Projects</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Navigation Helper -->
    <div class="fixed bottom-8 right-8 z-40 hidden lg:block">
        <div class="flex flex-col gap-3">
            <a href="#project-detail-hero" 
               class="w-12 h-12 rounded-full bg-base-100 border border-base-300 shadow-lg flex items-center justify-center text-base-content hover:bg-base-200 transition-all duration-300"
               title="Back to top">
                <i class="fas fa-arrow-up"></i>
            </a>
            <a href="{{ route('projects') }}"
               class="w-12 h-12 rounded-full bg-base-100 border border-base-300 shadow-lg flex items-center justify-center text-base-content hover:bg-base-200 transition-all duration-300"
               title="Back to portfolio">
                <i class="fas fa-briefcase"></i>
            </a>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        /* Custom animations for project detail page */
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
        
        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }
        
        /* Project content styling */
        .prose {
            line-height: 1.8;
        }
        
        .prose p {
            margin-bottom: 1.5rem;
        }
        
        .prose ul, .prose ol {
            margin-bottom: 1.5rem;
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .project-stats .grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .navigation-helper {
                display: none;
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Smooth scroll for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    if (this.getAttribute('href') === '#') return;
                    
                    e.preventDefault();
                    const targetId = this.getAttribute('href');
                    const targetElement = document.querySelector(targetId);
                    
                    if (targetElement) {
                        window.scrollTo({
                            top: targetElement.offsetTop - 80,
                            behavior: 'smooth'
                        });
                    }
                });
            });
            
            // Add animation to elements on scroll
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-slide-up');
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);
            
            // Observe project sections
            document.querySelectorAll('.bg-base-100.rounded-2xl').forEach(section => {
                observer.observe(section);
            });
            
            // Update active navigation
            function updateActiveNav() {
                const sections = document.querySelectorAll('section[id]');
                const scrollPosition = window.scrollY + 100;
                
                sections.forEach(section => {
                    const sectionTop = section.offsetTop;
                    const sectionHeight = section.clientHeight;
                    const sectionId = section.getAttribute('id');
                    
                    if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
                        document.querySelectorAll('a[href^="#"]').forEach(link => {
                            link.classList.remove('active');
                            if (link.getAttribute('href') === `#${sectionId}`) {
                                link.classList.add('active');
                            }
                        });
                    }
                });
            }
            
            // Throttle scroll event for performance
            let scrollTimeout;
            window.addEventListener('scroll', () => {
                if (!scrollTimeout) {
                    scrollTimeout = setTimeout(() => {
                        scrollTimeout = null;
                        updateActiveNav();
                    }, 100);
                }
            });
            
            // Initialize
            updateActiveNav();
        });
    </script>
@endpush