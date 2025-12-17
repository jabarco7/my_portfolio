@extends('admin.layouts.app')

@section('title', 'Projects')

@section('content')
    <!-- Header Section -->
    <div class="bg-gradient-to-r from-purple-500 to-indigo-600 rounded-xl shadow-lg p-6 mb-8 text-white">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold mb-2">Projects Management</h1>
                <p class="text-purple-100">Manage your portfolio projects and showcase your work</p>
            </div>
            <a href="{{ route('admin.projects.create') }}"
                class="bg-white text-purple-600 hover:bg-purple-50 px-4 py-2 rounded-lg font-medium transition-colors flex items-center">
                <i class="fas fa-plus mr-2"></i> Add New Project
            </a>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-6 border border-gray-100 dark:border-gray-700">
            <div class="flex items-center justify-between mb-2">
                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Projects</h3>
                <i class="fas fa-briefcase text-blue-500"></i>
            </div>
            <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $projects->total() }}</p>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-6 border border-gray-100 dark:border-gray-700">
            <div class="flex items-center justify-between mb-2">
                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Active</h3>
                <i class="fas fa-check-circle text-green-500"></i>
            </div>
            <p class="text-2xl font-bold text-gray-900 dark:text-white">
                {{ \App\Models\Project::where('is_active', true)->count() }}</p>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-6 border border-gray-100 dark:border-gray-700">
            <div class="flex items-center justify-between mb-2">
                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Featured</h3>
                <i class="fas fa-star text-yellow-500"></i>
            </div>
            <p class="text-2xl font-bold text-gray-900 dark:text-white">
                {{ \App\Models\Project::where('is_featured', true)->count() }}</p>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-6 border border-gray-100 dark:border-gray-700">
            <div class="flex items-center justify-between mb-2">
                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Inactive</h3>
                <i class="fas fa-pause-circle text-gray-500"></i>
            </div>
            <p class="text-2xl font-bold text-gray-900 dark:text-white">
                {{ \App\Models\Project::where('is_active', false)->count() }}</p>
        </div>
    </div>

    <!-- Projects Grid -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 dark:border-gray-700 flex items-center justify-between">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white">All Projects</h2>
            <div class="flex items-center space-x-2">
                <button
                    class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 transition-colors"
                    title="Grid View">
                    <i class="fas fa-th-large"></i>
                </button>
                <button class="text-blue-600 dark:text-blue-400" title="List View">
                    <i class="fas fa-list"></i>
                </button>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-100 dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-gray-900">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            Project</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            Client</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            Tags</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            Status</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            Featured</th>
                        <th scope="col"
                            class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                    @forelse ($projects as $project)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        @if ($project->featured_image)
                                            <img class="h-10 w-10 rounded-lg object-cover"
                                                src="{{ asset('storage/' . $project->featured_image) }}"
                                                alt="{{ $project->title }}">
                                        @else
                                            <div
                                                class="h-10 w-10 rounded-lg bg-gray-200 dark:bg-gray-600 flex items-center justify-center">
                                                <i class="fas fa-image text-gray-400 dark:text-gray-300"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900 dark:text-white">{{ $project->title }}
                                        </div>
                                        <div class="text-sm text-gray-500 dark:text-gray-400">Order: {{ $project->order }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                {{ $project->client ?? 'N/A' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if ($project->tags->count() > 0)
                                    <div class="flex flex-wrap gap-1">
                                        @foreach ($project->tags->take(2) as $tag)
                                            <span
                                                class="px-2 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300">{{ $tag->name }}</span>
                                        @endforeach
                                        @if ($project->tags->count() > 2)
                                            <span
                                                class="px-2 py-1 text-xs font-medium rounded-full bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300">+{{ $project->tags->count() - 2 }}</span>
                                        @endif
                                    </div>
                                @else
                                    <span class="text-gray-400 dark:text-gray-500 text-sm">No tags</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                {{ $project->created_at->format('M d, Y') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if ($project->is_active)
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300">Active</span>
                                @else
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300">Inactive</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if ($project->is_featured)
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300">Featured</span>
                                @else
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300">Regular</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex items-center justify-end space-x-2">
                                    <a href="{{ route('admin.projects.show', $project) }}"
                                        class="text-blue-600 dark:text-blue-400 hover:text-blue-900 dark:hover:text-blue-300"
                                        title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.projects.edit', $project) }}"
                                        class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-300"
                                        title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.projects.toggle-active', $project) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        <button type="submit"
                                            class="{{ $project->is_active ? 'text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-300' : 'text-green-600 dark:text-green-400 hover:text-green-900 dark:hover:text-green-300' }}"
                                            title="{{ $project->is_active ? 'Deactivate' : 'Activate' }}">
                                            <i class="fas {{ $project->is_active ? 'fa-eye-slash' : 'fa-eye' }}"></i>
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.projects.toggle-featured', $project) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        <button type="submit"
                                            class="{{ $project->is_featured ? 'text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-300' : 'text-yellow-600 dark:text-yellow-400 hover:text-yellow-900 dark:hover:text-yellow-300' }}"
                                            title="{{ $project->is_featured ? 'Unfeature' : 'Feature' }}">
                                            <i class="fas {{ $project->is_featured ? 'fa-star' : 'far fa-star' }}"></i>
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.projects.destroy', $project) }}" method="POST"
                                        class="inline"
                                        onsubmit="return confirm('Are you sure you want to delete this project?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-red-600 dark:text-red-400 hover:text-red-900 dark:hover:text-red-300"
                                            title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center">
                                    <div
                                        class="w-16 h-16 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center mb-4">
                                        <i class="fas fa-briefcase text-gray-400 dark:text-gray-500 text-2xl"></i>
                                    </div>
                                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">No projects yet</h3>
                                    <p class="text-gray-500 dark:text-gray-400 mb-4">Get started by creating your first
                                        project</p>
                                    <a href="{{ route('admin.projects.create') }}"
                                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                                        <i class="fas fa-plus mr-2"></i> Create Your First Project
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="px-6 py-4 border-t border-gray-100 dark:border-gray-700 flex items-center justify-between">
            <div class="text-sm text-gray-700 dark:text-gray-300">
                Showing {{ $projects->firstItem() ?? 0 }} to {{ $projects->lastItem() ?? 0 }} of {{ $projects->total() }}
                results
            </div>
            <div>
                {{ $projects->links() }}
            </div>
        </div>
    </div>
@endsection
