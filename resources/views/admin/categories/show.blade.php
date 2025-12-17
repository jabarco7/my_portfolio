@extends('admin.layouts.app')

@section('title', 'Category Details')

@section('content')
    <!-- Header Section -->
    <div class="bg-gradient-to-r from-blue-500 to-teal-600 rounded-xl shadow-lg p-6 mb-8 text-white">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold mb-2">{{ $category->name }}</h1>
                <p class="text-blue-100 opacity-90">Category details and associated projects</p>
            </div>
            <div class="flex gap-2">
                <a href="{{ route('admin.categories.edit', $category) }}"
                    class="bg-white/20 hover:bg-white/30 px-4 py-3 rounded-lg font-medium transition-all duration-300 flex items-center gap-2 hover:shadow-lg">
                    <i class="fas fa-edit"></i>
                    <span>Edit</span>
                </a>
                <a href="{{ route('admin.categories.index') }}"
                    class="bg-white/20 hover:bg-white/30 px-4 py-3 rounded-lg font-medium transition-all duration-300 flex items-center gap-2 hover:shadow-lg transform hover:-translate-x-1">
                    <i class="fas fa-arrow-left"></i>
                    <span>Back to Categories</span>
                </a>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Category Information -->
        <div class="lg:col-span-1">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Category Information</h3>

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Name</label>
                        <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $category->name }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Slug</label>
                        <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $category->slug }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Description</label>
                        <p class="mt-1 text-sm text-gray-900 dark:text-white">
                            {{ $category->description ?? 'No description provided' }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Created At</label>
                        <p class="mt-1 text-sm text-gray-900 dark:text-white">
                            {{ $category->created_at->format('M d, Y H:i') }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Updated At</label>
                        <p class="mt-1 text-sm text-gray-900 dark:text-white">
                            {{ $category->updated_at->format('M d, Y H:i') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Associated Projects -->
        <div class="lg:col-span-2">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-200 dark:border-gray-700">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Associated Projects</h3>
                    <span
                        class="px-2 py-1 text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300 rounded-full">
                        {{ $category->projects->count() }} projects
                    </span>
                </div>

                @if ($category->projects->count() > 0)
                    <div class="space-y-4">
                        @foreach ($category->projects as $project)
                            <div
                                class="border border-gray-200 dark:border-gray-600 rounded-lg p-4 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                <div class="flex items-start justify-between">
                                    <div class="flex-1">
                                        <h4 class="text-sm font-medium text-gray-900 dark:text-white">{{ $project->title }}
                                        </h4>
                                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">{{ $project->excerpt }}
                                        </p>
                                        <div class="flex items-center gap-4 mt-2">
                                            <span class="text-xs text-gray-500 dark:text-gray-400">
                                                <i class="fas fa-calendar-alt mr-1"></i>
                                                {{ $project->created_at->format('M d, Y') }}
                                            </span>
                                            @if ($project->is_featured)
                                                <span
                                                    class="px-2 py-1 text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300 rounded-full">
                                                    Featured
                                                </span>
                                            @endif
                                            @if (!$project->is_active)
                                                <span
                                                    class="px-2 py-1 text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300 rounded-full">
                                                    Inactive
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="flex gap-2 ml-4">
                                        <a href="{{ route('admin.projects.show', $project) }}"
                                            class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300 text-sm">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.projects.edit', $project) }}"
                                            class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300 text-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8">
                        <i class="fas fa-folder-open text-gray-400 text-4xl mb-4"></i>
                        <p class="text-gray-500 dark:text-gray-400">No projects in this category yet.</p>
                        <a href="{{ route('admin.projects.create') }}"
                            class="inline-flex items-center mt-2 px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-blue-600 bg-blue-100 hover:bg-blue-200 dark:bg-blue-900 dark:text-blue-300 dark:hover:bg-blue-800 transition-colors">
                            <i class="fas fa-plus mr-2"></i>
                            Add First Project
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
