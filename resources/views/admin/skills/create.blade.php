@extends('admin.layouts.app')

@section('title', 'Create Skill')

@section('content')
    <!-- Header Section -->
    <div class="bg-gradient-to-r from-purple-500 to-indigo-600 rounded-xl shadow-lg p-6 mb-8 text-white">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold mb-2">Create New Skill</h1>
                <p class="text-purple-100 opacity-90">Add a new skill to your portfolio</p>
            </div>
            <a href="{{ route('admin.skills.index') }}"
                class="bg-white/20 hover:bg-white/30 px-4 py-3 rounded-lg font-medium transition-all duration-300 flex items-center gap-2 hover:shadow-lg transform hover:-translate-x-1">
                <i class="fas fa-arrow-left"></i>
                <span>Back to Skills</span>
            </a>
        </div>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-200 dark:border-gray-700">
        <form action="{{ route('admin.skills.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Skill Name *
                    </label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 dark:bg-gray-700 dark:text-white @error('name') border-red-500 @enderror"
                        placeholder="e.g., Laravel" required>
                    @error('name')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Category -->
               <!-- Category -->
<div>
    <label for="category" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
        Category
    </label>
    <select name="category" id="category"
        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 dark:bg-gray-700 dark:text-white @error('category') border-red-500 @enderror">
        <option value="">-- Select Category --</option>
        <option value="Backend" {{ old('category') == 'Backend' ? 'selected' : '' }}>Backend</option>
        <option value="Frontend" {{ old('category') == 'Frontend' ? 'selected' : '' }}>Frontend</option>
        <option value="DevOps" {{ old('category') == 'DevOps' ? 'selected' : '' }}>DevOps</option>
        <option value="Mobile" {{ old('category') == 'Mobile' ? 'selected' : '' }}>Mobile</option>
        <option value="Other" {{ old('category') == 'Other' ? 'selected' : '' }}>Other</option>
    </select>
    @error('category')
        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
    @enderror
</div>


                <!-- Percentage -->
                <div>
                    <label for="percentage" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Proficiency Percentage (0-100) *
                    </label>
                    <input type="number" name="percentage" id="percentage" value="{{ old('percentage', 0) }}" min="0" max="100"
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 dark:bg-gray-700 dark:text-white @error('percentage') border-red-500 @enderror"
                        required>
                    @error('percentage')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Order -->
                <div>
                    <label for="order" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Display Order
                    </label>
                    <input type="number" name="order" id="order" value="{{ old('order', 0) }}" min="0"
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 dark:bg-gray-700 dark:text-white @error('order') border-red-500 @enderror">
                    @error('order')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Is Active -->
            <div class="mt-6">
                <div class="flex items-center">
                    <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                        class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded">
                    <label for="is_active" class="ml-2 block text-sm text-gray-900 dark:text-gray-300">
                        Active (Visible on website)
                    </label>
                </div>
            </div>

            <!-- Submit Buttons -->
            <div class="mt-8 flex items-center justify-end gap-4">
                <a href="{{ route('admin.skills.index') }}"
                    class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition-colors">
                    Cancel
                </a>
                <button type="submit"
                    class="px-4 py-2 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition-colors">
                    Create Skill
                </button>
            </div>
        </form>
    </div>
@endsection
