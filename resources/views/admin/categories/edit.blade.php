@extends('admin.layouts.app')

@section('title', 'Edit Category')

@section('content')
    <!-- Header Section -->
    <div class="bg-gradient-to-r from-purple-500 to-indigo-600 rounded-xl shadow-lg p-6 mb-8 text-white">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold mb-2">Edit Category</h1>
                <p class="text-purple-100 opacity-90">Update category details</p>
            </div>
            <a href="{{ route('admin.categories.index') }}"
                class="bg-white/20 hover:bg-white/30 px-4 py-3 rounded-lg font-medium transition-all duration-300 flex items-center gap-2 hover:shadow-lg transform hover:-translate-x-1">
                <i class="fas fa-arrow-left"></i>
                <span>Back to Categories</span>
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main Content -->
        <div class="lg:col-span-2">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden border border-gray-200 dark:border-gray-700">
                <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-white">Category Details</h2>
                </div>

                <form action="{{ route('admin.categories.update', $category) }}" method="POST" class="p-6 space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium mb-2 text-gray-700 dark:text-gray-300">
                            Name <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="name" name="name" value="{{ old('name', $category->name) }}"
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-800 dark:text-white focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 @error('name') border-red-500 @enderror"
                            placeholder="Enter category name" required>
                        @error('name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-medium mb-2 text-gray-700 dark:text-gray-300">
                            Description
                        </label>
                        <textarea id="description" name="description" rows="4"
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-800 dark:text-white focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 @error('description') border-red-500 @enderror"
                            placeholder="Brief description of the category">{{ old('description', $category->description) }}</textarea>
                        @error('description')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Form Actions -->
                    <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <button type="submit"
                            class="flex-1 bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white px-6 py-3 rounded-lg font-medium transition-all duration-300 transform hover:scale-105 focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 shadow-lg hover:shadow-xl">
                            <i class="fas fa-save mr-2"></i>
                            Update Category
                        </button>

                        <a href="{{ route('admin.categories.index') }}"
                            class="flex-1 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 text-gray-800 dark:text-gray-300 px-6 py-3 rounded-lg font-medium text-center transition-all duration-300 transform hover:scale-105 focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                            <i class="fas fa-times mr-2"></i>
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="lg:col-span-1">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden border border-gray-200 dark:border-gray-700">
                <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-white">Category Information</h2>
                </div>

                <div class="p-6 space-y-4">
                    <div class="flex items-start space-x-3">
                        <div class="bg-purple-100 dark:bg-purple-900 p-2 rounded-lg">
                            <i class="fas fa-folder text-purple-600 dark:text-purple-300"></i>
                        </div>
                        <div>
                            <h3 class="font-medium text-gray-800 dark:text-white">Slug</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                {{ $category->slug }}
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-3">
                        <div class="bg-blue-100 dark:bg-blue-900 p-2 rounded-lg">
                            <i class="fas fa-calendar text-blue-600 dark:text-blue-300"></i>
                        </div>
                        <div>
                            <h3 class="font-medium text-gray-800 dark:text-white">Created At</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                {{ $category->created_at->format('M d, Y') }}
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-3">
                        <div class="bg-green-100 dark:bg-green-900 p-2 rounded-lg">
                            <i class="fas fa-project-diagram text-green-600 dark:text-green-300"></i>
                        </div>
                        <div>
                            <h3 class="font-medium text-gray-800 dark:text-white">Projects Count</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                {{ $category->projects->count() }} projects in this category
                            </p>
                        </div>
                    </div>

                    @if ($category->projects->count() > 0)
                        <div class="mt-4 p-4 bg-yellow-50 dark:bg-yellow-900/20 rounded-lg border border-yellow-200 dark:border-yellow-800">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-exclamation-triangle text-yellow-400"></i>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-sm font-medium text-yellow-800 dark:text-yellow-200">
                                        Cannot Delete
                                    </h3>
                                    <div class="mt-2 text-sm text-yellow-700 dark:text-yellow-300">
                                        <p>This category has projects associated with it. You must remove or reassign those projects before deleting this category.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
