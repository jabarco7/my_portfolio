@extends('layouts.app')

@section('title', 'Projects')

@section('content')
    <section id="portfolio" class="py-20 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold mb-4 tracking-tight">My Portfolio</h2>
                <div class="w-20 h-1 bg-primary-600 mx-auto"></div>
                <p class="mt-4 text-gray-600 dark:text-gray-300 max-w-2xl mx-auto leading-relaxed">
                    Take a look at some of my recent projects and see how I can help bring your ideas to life.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @if ($projects->count() > 0)
                    @foreach ($projects as $project)
                        <div class="group relative overflow-hidden rounded-lg shadow-lg">
                            @if ($project->featured_image)
                                <img src="{{ asset('storage/' . $project->featured_image) }}" alt="{{ $project->title }}"
                                    class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-110">
                            @else
                                <img src="https://images.unsplash.com/photo-1557862921-37829c790f19?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
                                    alt="{{ $project->title }}"
                                    class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-110">
                            @endif
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <div
                                    class="absolute bottom-0 left-0 right-0 p-6 text-white transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                                    <h3 class="text-xl font-semibold mb-2 tracking-tight">{{ $project->title }}</h3>
                                    <p class="text-sm mb-4 leading-relaxed">
                                        {{ $project->excerpt ?? Str::limit($project->description, 100) }}</p>
                                    <div class="flex space-x-4">
                                        @if ($project->project_url)
                                            <a href="{{ $project->project_url }}" target="_blank"
                                                class="text-white hover:text-primary-300 transition-colors font-medium no-underline">
                                                <i class="fas fa-link"></i> View Project
                                            </a>
                                        @endif
                                        @if ($project->github_url)
                                            <a href="{{ $project->github_url }}" target="_blank"
                                                class="text-white hover:text-primary-300 transition-colors font-medium no-underline">
                                                <i class="fab fa-github"></i> Code
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-span-3 text-center">
                        <p class="text-gray-600 dark:text-gray-300">No projects available at the moment.</p>
                    </div>
                @endif
            </div>

            @if (count($projects) > 0)
                <div class="text-center mt-12">
                    <div class="flex justify-center space-x-4">
                        @if (request()->get('page', 1) == 1 && Project::where('is_active', true)->count() > 6)
                            <a href="{{ route('portfolio', ['page' => 2]) }}"
                                class="bg-primary-600 hover:bg-primary-700 text-white px-6 py-3 rounded-lg font-medium transition-colors inline-flex items-center">
                                <i class="fas fa-eye mr-2"></i> إظهار جميع المشاريع
                            </a>
                        @elseif (request()->get('page', 1) > 1)
                            <a href="{{ route('portfolio') }}"
                                class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-3 rounded-lg font-medium transition-colors inline-flex items-center">
                                <i class="fas fa-arrow-left mr-2"></i> إظهار أقل
                            </a>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
