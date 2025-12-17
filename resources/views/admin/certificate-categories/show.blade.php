
@extends('admin.layouts.app')

@section('title', 'Certificate Category Details')

@section('content')
    <!-- Header Section -->
    <div class="bg-gradient-to-r from-blue-500 to-indigo-600 rounded-xl shadow-lg p-6 mb-8 text-white">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold mb-2">Category Details</h1>
                <p class="text-blue-100 opacity-90">View certificate category information</p>
            </div>
            <div class="flex flex-wrap gap-3">
                <a href="{{ route('admin.certificate-categories.edit', $category) }}"
                    class="bg-white/20 hover:bg-white/30 px-4 py-3 rounded-lg font-medium transition-all duration-300 flex items-center gap-2 hover:shadow-lg">
                    <i class="fas fa-edit"></i>
                    <span>Edit Category</span>
                </a>
                <a href="{{ route('admin.certificate-categories.index') }}"
                    class="bg-white/20 hover:bg-white/30 px-4 py-3 rounded-lg font-medium transition-all duration-300 flex items-center gap-2 hover:shadow-lg transform hover:-translate-x-1">
                    <i class="fas fa-arrow-left"></i>
                    <span>Back to Categories</span>
                </a>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Category Details -->
        <div class="lg:col-span-2">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-200 dark:border-gray-700">
                <div class="mb-6">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Category Information</h2>
                    <div class="space-y-4">
                        <div>
                            <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Name</h3>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $category->name }}</p>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Slug</h3>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $category->slug }}</p>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Description</h3>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white">
                                {{ $category->description ?: 'No description provided' }}
                            </p>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Color</h3>
                            <div class="mt-1 flex items-center">
                                @if($category->color)
                                    <span class="h-6 w-6 rounded-full mr-2" style="background-color: {{ $category->color }}"></span>
                                    <span class="text-sm text-gray-900 dark:text-white">{{ $category->color }}</span>
                                @else
                                    <span class="text-sm text-gray-900 dark:text-white">No color set</span>
                                @endif
                            </div>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Status</h3>
                            <p class="mt-1">
                                @if($category->is_active)
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300">
                                        Active
                                    </span>
                                @else
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300">
                                        Inactive
                                    </span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistics -->
        <div class="lg:col-span-1">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-200 dark:border-gray-700">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Statistics</h2>
                <div class="space-y-4">
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Certificates</p>
                                <p class="text-2xl font-semibold text-gray-900 dark:text-white">{{ $category->certificates()->count() }}</p>
                            </div>
                            <div class="p-3 bg-blue-100 dark:bg-blue-900 rounded-full">
                                <i class="fas fa-certificate text-blue-600 dark:text-blue-300"></i>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Active Certificates</p>
                                <p class="text-2xl font-semibold text-gray-900 dark:text-white">{{ $category->certificates()->active()->count() }}</p>
                            </div>
                            <div class="p-3 bg-green-100 dark:bg-green-900 rounded-full">
                                <i class="fas fa-check-circle text-green-600 dark:text-green-300"></i>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Inactive Certificates</p>
                                <p class="text-2xl font-semibold text-gray-900 dark:text-white">{{ $category->certificates()->where('is_active', false)->count() }}</p>
                            </div>
                            <div class="p-3 bg-red-100 dark:bg-red-900 rounded-full">
                                <i class="fas fa-times-circle text-red-600 dark:text-red-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Certificates in this Category -->
    <div class="mt-8">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden border border-gray-200 dark:border-gray-700">
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                <h2 class="text-lg font-medium text-gray-900 dark:text-white">Certificates in this Category</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                ID
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Title
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Date
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Status
                            </th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse ($category->certificates as $certificate)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                    {{ $certificate->id }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900 dark:text-white">
                                        {{ $certificate->title }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                    {{ $certificate->date->format('Y-m-d') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($certificate->is_active)
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300">
                                            Active
                                        </span>
                                    @else
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300">
                                            Inactive
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('admin.certificates.show', $certificate) }}"
                                        class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300 mr-3">
                                        <i class="fas fa-eye"></i> View
                                    </a>
                                    <a href="{{ route('admin.certificates.edit', $certificate) }}"
                                        class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                    No certificates found in this category.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
