
@extends('admin.layouts.app')

@section('title', 'Edit Certificate Category')

@section('content')
    <!-- Header Section -->
    <div class="bg-gradient-to-r from-blue-500 to-indigo-600 rounded-xl shadow-lg p-6 mb-8 text-white">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold mb-2">Edit Category</h1>
                <p class="text-blue-100 opacity-90">Update certificate category information</p>
            </div>
            <a href="{{ route('admin.certificate-categories.index') }}"
                class="bg-white/20 hover:bg-white/30 px-4 py-3 rounded-lg font-medium transition-all duration-300 flex items-center gap-2 hover:shadow-lg transform hover:-translate-x-1">
                <i class="fas fa-arrow-left"></i>
                <span>Back to Categories</span>
            </a>
        </div>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-200 dark:border-gray-700">
        <form action="{{ route('admin.certificate-categories.update', $category) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Category Name *
                    </label>
                    <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}"
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white @error('name') border-red-500 @enderror"
                        placeholder="e.g., Web Development" required>
                    @error('name')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Slug -->
                <div>
                    <label for="slug" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Slug
                    </label>
                    <input type="text" name="slug" id="slug" value="{{ old('slug', $category->slug) }}"
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white @error('slug') border-red-500 @enderror"
                        placeholder="e.g., web-development">
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                        Leave empty to auto-generate from name
                    </p>
                    @error('slug')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                <!-- Color -->
                <div>
                    <label for="color" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Color
                    </label>
                    <div class="flex">
                        <input type="text" name="color" id="color" value="{{ old('color', $category->color ?? '#6B7280') }}"
                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-l-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white @error('color') border-red-500 @enderror"
                            placeholder="#6B7280">
                        <input type="color" id="color-picker" value="{{ old('color', $category->color ?? '#6B7280') }}"
                            class="h-10 w-16 border border-l-0 border-gray-300 dark:border-gray-600 rounded-r-lg cursor-pointer">
                    </div>
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                        Used for category display
                    </p>
                    @error('color')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Is Active -->
                <div>
                    <div class="flex items-center h-full">
                        <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $category->is_active) ? 'checked' : '' }}
                            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label for="is_active" class="ml-2 block text-sm text-gray-900 dark:text-gray-300">
                            Active (Available for certificates)
                        </label>
                    </div>
                </div>
            </div>

            <!-- Description -->
            <div class="mt-6">
                <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Description
                </label>
                <textarea name="description" id="description" rows="4"
                    class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white @error('description') border-red-500 @enderror"
                    placeholder="Brief description of the category">{{ old('description', $category->description) }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Buttons -->
            <div class="mt-8 flex items-center justify-end gap-4">
                <a href="{{ route('admin.certificate-categories.index') }}"
                    class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                    Cancel
                </a>
                <button type="submit"
                    class="px-4 py-2 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                    Update Category
                </button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
<script>
    // Color picker synchronization
    document.getElementById('color-picker').addEventListener('change', function(e) {
        document.getElementById('color').value = e.target.value;
    });

    document.getElementById('color').addEventListener('input', function(e) {
        if (/^#[0-9A-F]{6}$/i.test(e.target.value)) {
            document.getElementById('color-picker').value = e.target.value;
        }
    });

    // Auto-generate slug from name
    let originalSlug = document.getElementById('slug').value;
    document.getElementById('name').addEventListener('input', function(e) {
        if (document.getElementById('slug').value === originalSlug) {
            document.getElementById('slug').value = e.target.value.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/^-+|-+$/g, '');
        }
    });

    // Update original slug when user manually changes it
    document.getElementById('slug').addEventListener('input', function(e) {
        originalSlug = e.target.value;
    });
</script>
@endpush
