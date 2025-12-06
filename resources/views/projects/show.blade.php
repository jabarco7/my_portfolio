@extends('layouts.app')

@section('title', $project->title . ' - Portfolio')

@section('content')
    <div class="min-h-screen bg-gray-50 dark:bg-gray-900">
        <!-- Hero Section -->
        <div class="relative bg-gradient-to-r from-primary-600 to-primary-800 text-white">
            <div class="absolute inset-0 bg-black/20"></div>
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
                <div class="text-center">
                    <h1 class="text-4xl md:text-6xl font-bold mb-6 tracking-tight">
                        {{ $project->title }}
                    </h1>
                    <p class="text-xl md:text-2xl text-primary-100 max-w-3xl mx-auto leading-relaxed">
                        {{ $project->excerpt ?? Str::limit($project->description, 150) }}
                    </p>
                    <div class="mt-8 flex flex-wrap justify-center gap-4">
                        @if ($project->project_url)
                            <a href="{{ $project->project_url }}" target="_blank"
                                class="inline-flex items-center px-6 py-3 bg-white text-primary-600 font-semibold rounded-lg hover:bg-primary-50 transition-colors">
                                <i class="fas fa-external-link-alt mr-2"></i> View Live Project
                            </a>
                        @endif

                    </div>
                </div>
            </div>
        </div>

        <!-- Project Content -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                <!-- Main Content -->
                <div class="lg:col-span-2">
                    <!-- Featured Image -->
                    @if ($project->featured_image)
                        <div class="mb-8">
                            <img src="{{ asset('storage/' . $project->featured_image) }}" alt="{{ $project->title }}"
                                class="w-full h-96 object-cover rounded-lg shadow-lg">
                        </div>
                    @endif

                    <!-- Project Description -->
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-8 mb-8">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Project Overview</h2>
                        <div class="prose prose-lg dark:prose-invert max-w-none">
                            {!! nl2br(e($project->description)) !!}
                        </div>
                    </div>

                    <!-- Project Images Gallery -->
                    @if ($project->images->count() > 0)
                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-8 mb-8">
                            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Project Gallery</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                @foreach ($project->images as $image)
                                    <div class="relative group">
                                        <img src="{{ asset('storage/' . $image->image_path) }}"
                                            alt="{{ $image->alt_text ?? $project->title }}"
                                            class="w-full h-48 object-cover rounded-lg shadow-md transition-transform group-hover:scale-105">
                                        @if ($image->caption)
                                            <div
                                                class="absolute bottom-0 left-0 right-0 bg-black/70 text-white p-3 rounded-b-lg">
                                                <p class="text-sm">{{ $image->caption }}</p>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <!-- Project Details -->
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 mb-8">
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Project Details</h3>
                        <div class="space-y-3">
                            @if ($project->technologies)
                                <div>
                                    <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Technologies:</span>
                                    <div class="flex flex-wrap gap-2 mt-1">
                                        @foreach (explode(',', $project->technologies) as $tech)
                                            <span
                                                class="px-3 py-1 bg-primary-100 dark:bg-primary-900 text-primary-800 dark:text-primary-200 text-sm rounded-full">
                                                {{ trim($tech) }}
                                            </span>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                            @if ($project->created_at)
                                <div>
                                    <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Completed:</span>
                                    <p class="text-gray-900 dark:text-white">{{ $project->created_at->format('M Y') }}</p>
                                </div>
                            @endif
                            @if ($project->project_url)
                                <div>
                                    <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Links:</span>
                                    <div class="flex flex-col space-y-2 mt-1">
                                        @if ($project->project_url)
                                            <a href="{{ $project->project_url }}" target="_blank"
                                                class="text-primary-600 dark:text-primary-400 hover:text-primary-700 dark:hover:text-primary-300 flex items-center">
                                                <i class="fas fa-external-link-alt mr-2"></i> Live Demo
                                            </a>
                                        @endif

                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Back to Portfolio -->
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
                        <a href="{{ route('portfolio') }}"
                            class="inline-flex items-center text-primary-600 dark:text-primary-400 hover:text-primary-700 dark:hover:text-primary-300 font-medium">
                            <i class="fas fa-arrow-left mr-2"></i> Back to Portfolio
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
