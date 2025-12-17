@extends('admin.layouts.app')

@section('title', 'Create Tag')

@section('content')
    <!-- Header Section -->
    <div class="bg-gradient-to-r from-purple-500 to-indigo-600 rounded-xl shadow-lg p-6 mb-8 text-white">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold mb-2">Create New Tag</h1>
                <p class="text-purple-100">Add a new tag for projects</p>
            </div>
            <a href="{{ route('admin.tags.index') }}"
                class="bg-white bg-opacity-20 hover:bg-opacity-30 px-4 py-2 rounded-lg font-medium transition-colors flex items-center">
                <i class="fas fa-arrow-left mr-2"></i> Back to Tags
            </a>
        </div>
    </div>

    <!-- Create Form -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden">
        <form action="{{ route('admin.tags.store') }}" method="POST" class="p-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Name Field -->
                <div class="md:col-span-2">
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Tag Name <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white @error('name') border-red-500 @enderror"
                        placeholder="Enter tag name" required>
                    @error('name')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Color Field -->
                <div class="md:col-span-2">
                    <label for="color" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Color (Optional)
                    </label>
                    <div class="flex items-center space-x-3">
                        <input type="color" id="color" name="color" value="{{ old('color', '#3B82F6') }}"
                            class="w-12 h-10 border border-gray-300 dark:border-gray-600 rounded cursor-pointer">
                        <input type="text" id="color_hex" name="color_hex" value="{{ old('color', '#3B82F6') }}"
                            class="flex-1 px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white"
                            placeholder="#3B82F6" pattern="^#[0-9A-Fa-f]{6}$">
                        <button type="button"
                            onclick="document.getElementById('color').value='#3B82F6'; document.getElementById('color_hex').value='#3B82F6';"
                            class="px-3 py-2 text-sm bg-gray-100 dark:bg-gray-600 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-500">
                            Reset
                        </button>
                    </div>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Choose a color to visually distinguish this tag
                    </p>
                    @error('color')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Form Actions -->
            <div class="flex justify-end space-x-3 mt-8 pt-6 border-t border-gray-200 dark:border-gray-700">
                <a href="{{ route('admin.tags.index') }}"
                    class="px-4 py-2 text-gray-700 dark:text-gray-300 bg-gray-100 dark:bg-gray-600 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-500 transition-colors">
                    Cancel
                </a>
                <button type="submit"
                    class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors">
                    <i class="fas fa-save mr-2"></i> Create Tag
                </button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const colorInput = document.getElementById('color');
            const colorHexInput = document.getElementById('color_hex');

            // Sync color picker with hex input
            colorInput.addEventListener('input', function() {
                colorHexInput.value = this.value.toUpperCase();
            });

            // Sync hex input with color picker
            colorHexInput.addEventListener('input', function() {
                const hex = this.value;
                if (/^#[0-9A-Fa-f]{6}$/.test(hex)) {
                    colorInput.value = hex;
                }
            });

            // Validate hex input on blur
            colorHexInput.addEventListener('blur', function() {
                const hex = this.value;
                if (!/^#[0-9A-Fa-f]{6}$/.test(hex)) {
                    this.value = '#3B82F6';
                    colorInput.value = '#3B82F6';
                }
            });
        });
    </script>
@endpush
