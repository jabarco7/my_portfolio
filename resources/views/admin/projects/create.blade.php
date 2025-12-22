@extends('admin.layouts.app')

@section('title', 'Create Project')

@section('content')
    <!-- Header Section -->
    <div class="bg-gradient-to-r from-purple-500 to-indigo-600 rounded-xl shadow-lg p-6 mb-8 text-white">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold mb-2">Create New Project</h1>
                <p class="text-purple-100 opacity-90">Add a new project to your portfolio</p>
            </div>
            <a href="{{ route('admin.projects.index') }}"
                class="bg-white/20 hover:bg-white/30 px-4 py-3 rounded-lg font-medium transition-all duration-300 flex items-center gap-2 hover:shadow-lg transform hover:-translate-x-1">
                <i class="fas fa-arrow-left"></i>
                <span>Back to Projects</span>
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main Content -->
        <div class="lg:col-span-2">
            <div
                class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden border border-gray-200 dark:border-gray-700">
                <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-white">Project Details</h2>
                </div>

                <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data"
                    class="p-6 space-y-6">
                    @csrf

                    <!-- Title & Client -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="title" class="block text-sm font-medium mb-2 text-gray-700 dark:text-gray-300">
                                Title <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="title" name="title" value="{{ old('title') }}"
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-800 dark:text-white focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 @error('title') border-red-500 @enderror"
                                placeholder="Enter project title" required>
                            @error('title')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="client" class="block text-sm font-medium mb-2 text-gray-700 dark:text-gray-300">
                                Client
                            </label>
                            <input type="text" id="client" name="client" value="{{ old('client') }}"
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-800 dark:text-white focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 @error('client') border-red-500 @enderror"
                                placeholder="Enter client name">
                            @error('client')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Dates -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    </div>

                    <!-- URLs -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="project_url"
                                class="block text-sm font-medium mb-2 text-gray-700 dark:text-gray-300">
                                Project URL
                            </label>
                            <input type="url" id="project_url" name="project_url" value="{{ old('project_url') }}"
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-800 dark:text-white focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 @error('project_url') border-red-500 @enderror"
                                placeholder="https://example.com">
                            @error('project_url')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="github_url" class="block text-sm font-medium mb-2 text-gray-700 dark:text-gray-300">
                                GitHub URL
                            </label>
                            <input type="url" id="github_url" name="github_url" value="{{ old('github_url') }}"
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-800 dark:text-white focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 @error('github_url') border-red-500 @enderror"
                                placeholder="https://github.com/username/repo">
                            @error('github_url')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Excerpt -->
                    <div>
                        <label for="excerpt" class="block text-sm font-medium mb-2 text-gray-700 dark:text-gray-300">
                            Excerpt
                        </label>
                        <textarea id="excerpt" name="excerpt" rows="2"
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-800 dark:text-white focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 @error('excerpt') border-red-500 @enderror"
                            placeholder="Brief project description">{{ old('excerpt') }}</textarea>
                        @error('excerpt')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-medium mb-2 text-gray-700 dark:text-gray-300">
                            Description <span class="text-red-500">*</span>
                        </label>
                        <textarea id="description" name="description" rows="6" required
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-800 dark:text-white focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 @error('description') border-red-500 @enderror"
                            placeholder="Detailed project description">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tags -->
                    <div>
                        <label class="block text-sm font-medium mb-2 text-gray-700 dark:text-gray-300">
                            Tags
                        </label>
                        <div
                            class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 p-4 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700">
                            @foreach ($tags as $tag)
                                <div class="flex items-center">
                                    <input type="checkbox" id="tag_{{ $tag->id }}" name="tags[]"
                                        value="{{ $tag->id }}"
                                        class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500 dark:bg-gray-600 dark:border-gray-500 @error('tags') border-red-500 @enderror"
                                        {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}>
                                    <label for="tag_{{ $tag->id }}"
                                        class="ml-2 block text-sm text-gray-900 dark:text-gray-300 cursor-pointer">
                                        {{ $tag->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        @error('tags')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Category -->
                    <div>
                        <label for="category_id" class="block text-sm font-medium mb-2 text-gray-700 dark:text-gray-300">
                            Category
                        </label>
                        <select id="category_id" name="category_id"
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-800 dark:text-white focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 @error('category_id') border-red-500 @enderror">
                            <option value="">Select a category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Challenges Section -->
                    <div>
                        <h3 class="text-lg font-medium mb-3 text-gray-800 dark:text-white">Key Challenges</h3>
                        <div id="challenges-container" class="space-y-3">
                            <div class="challenge-item flex gap-2">
                                <input type="text" class="flex-1 px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-800 dark:text-white" name="challenges[]" placeholder="Enter a challenge">
                                <button type="button" class="px-3 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 remove-challenge">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                        <button type="button" id="add-challenge" class="mt-3 px-4 py-2 bg-purple-500 text-white rounded-lg hover:bg-purple-600">
                            <i class="fas fa-plus mr-2"></i>Add Challenge
                        </button>
                    </div>

                    <!-- Solutions Section -->
                    <div>
                        <h3 class="text-lg font-medium mb-3 text-gray-800 dark:text-white">Implemented Solutions</h3>
                        <div id="solutions-container" class="space-y-3">
                            <div class="solution-item flex gap-2">
                                <input type="text" class="flex-1 px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-800 dark:text-white" name="solutions[]" placeholder="Enter a solution">
                                <button type="button" class="px-3 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 remove-solution">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                        <button type="button" id="add-solution" class="mt-3 px-4 py-2 bg-purple-500 text-white rounded-lg hover:bg-purple-600">
                            <i class="fas fa-plus mr-2"></i>Add Solution
                        </button>
                    </div>

                    <!-- Results Section -->
                    <div>
                        <h3 class="text-lg font-medium mb-3 text-gray-800 dark:text-white">Key Results</h3>
                        <div id="results-container" class="space-y-3">
                            <div class="result-item flex gap-2">
                                <input type="text" class="flex-1 px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-800 dark:text-white" name="results[]" placeholder="Enter a result">
                                <button type="button" class="px-3 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 remove-result">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                        <button type="button" id="add-result" class="mt-3 px-4 py-2 bg-purple-500 text-white rounded-lg hover:bg-purple-600">
                            <i class="fas fa-plus mr-2"></i>Add Result
                        </button>
                    </div>

                    <!-- Featured Image, Order, Status -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label for="featured_image"
                                class="block text-sm font-medium mb-2 text-gray-700 dark:text-gray-300">
                                Featured Image
                            </label>
                            <div class="relative">
                                <input type="file" id="featured_image" name="featured_image" accept="image/*"
                                    class="hidden" onchange="previewFeaturedImage(this)">
                                <label for="featured_image" class="cursor-pointer">
                                    <div
                                        class="border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg p-4 text-center hover:border-purple-500 dark:hover:border-purple-500 transition-all duration-300 group">
                                        <div class="flex flex-col items-center justify-center space-y-2">
                                            <i
                                                class="fas fa-cloud-upload-alt text-3xl text-gray-400 group-hover:text-purple-500 transition-colors duration-300"></i>
                                            <span
                                                class="text-sm text-gray-600 dark:text-gray-400 group-hover:text-purple-500 transition-colors duration-300">
                                                Click to upload image
                                            </span>
                                            <span class="text-xs text-gray-500">PNG, JPG, GIF up to 5MB</span>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div id="image-preview" class="mt-4 hidden">
                                <img id="preview" class="w-full h-48 object-cover rounded-lg shadow-lg" src=""
                                    alt="Preview">
                            </div>
                            @error('featured_image')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="order" class="block text-sm font-medium mb-2 text-gray-700 dark:text-gray-300">
                                Display Order
                            </label>
                            <input type="number" id="order" name="order" value="{{ old('order', 0) }}"
                                min="0"
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-800 dark:text-white focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 @error('order') border-red-500 @enderror"
                                placeholder="0">
                            @error('order')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-2 text-gray-700 dark:text-gray-300">
                                Project Status
                            </label>
                            <div class="space-y-3">
                                <label class="flex items-center space-x-3 cursor-pointer group">
                                    <div class="relative">
                                        <input type="checkbox" id="is_featured" name="is_featured" value="1"
                                            {{ old('is_featured') ? 'checked' : '' }} class="sr-only peer">
                                        <div
                                            class="w-10 h-6 bg-gray-200 dark:bg-gray-700 rounded-full peer-checked:bg-purple-600 transition-colors duration-300">
                                        </div>
                                        <div
                                            class="absolute left-1 top-1 w-4 h-4 bg-white rounded-full transition-transform duration-300 peer-checked:translate-x-4">
                                        </div>
                                    </div>
                                    <span
                                        class="text-gray-700 dark:text-gray-300 group-hover:text-purple-600 transition-colors duration-300">
                                        Featured Project
                                    </span>
                                </label>

                                <label class="flex items-center space-x-3 cursor-pointer group">
                                    <div class="relative">
                                        <input type="checkbox" id="is_active" name="is_active" value="1"
                                            {{ old('is_active', '1') ? 'checked' : '' }} class="sr-only peer">
                                        <div
                                            class="w-10 h-6 bg-gray-200 dark:bg-gray-700 rounded-full peer-checked:bg-green-600 transition-colors duration-300">
                                        </div>
                                        <div
                                            class="absolute left-1 top-1 w-4 h-4 bg-white rounded-full transition-transform duration-300 peer-checked:translate-x-4">
                                        </div>
                                    </div>
                                    <span
                                        class="text-gray-700 dark:text-gray-300 group-hover:text-green-600 transition-colors duration-300">
                                        Active
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Project Images -->
                    <div class="border-t border-gray-200 dark:border-gray-700 pt-6">
                        <h3 class="text-lg font-medium mb-4 text-gray-800 dark:text-white">Project Images</h3>

                        <div id="images-container" class="space-y-4">
                            @include('admin.projects.partials._image-upload-fix', ['imageId' => 0])
                        </div>

                        <div class="text-center mt-4">
                            <button type="button" id="add-image"
                                class="px-4 py-2 bg-purple-100 dark:bg-purple-900 text-purple-700 dark:text-purple-300 rounded-lg font-medium hover:bg-purple-200 dark:hover:bg-purple-800 transition-all duration-300 transform hover:scale-105 focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                                <i class="fas fa-plus mr-2"></i>
                                Add More Images
                            </button>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <button type="submit"
                            class="flex-1 bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white px-6 py-3 rounded-lg font-medium transition-all duration-300 transform hover:scale-105 focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 shadow-lg hover:shadow-xl">
                            <i class="fas fa-save mr-2"></i>
                            Create Project
                        </button>

                        <a href="{{ route('admin.projects.index') }}"
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
            <div
                class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden border border-gray-200 dark:border-gray-700">
                <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-white">Tips & Guidelines</h2>
                </div>

                <div class="p-6 space-y-4">
                    <div class="flex items-start space-x-3">
                        <div class="bg-purple-100 dark:bg-purple-900 p-2 rounded-lg">
                            <i class="fas fa-info-circle text-purple-600 dark:text-purple-300"></i>
                        </div>
                        <div>
                            <h3 class="font-medium text-gray-800 dark:text-white">Required Fields</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                Fields marked with <span class="text-red-500">*</span> are required.
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-3">
                        <div class="bg-blue-100 dark:bg-blue-900 p-2 rounded-lg">
                            <i class="fas fa-image text-blue-600 dark:text-blue-300"></i>
                        </div>
                        <div>
                            <h3 class="font-medium text-gray-800 dark:text-white">Image Guidelines</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                Use high-quality images (min 1200x800px). Max file size: 5MB.
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-3">
                        <div class="bg-green-100 dark:bg-green-900 p-2 rounded-lg">
                            <i class="fas fa-sort-numeric-up text-green-600 dark:text-green-300"></i>
                        </div>
                        <div>
                            <h3 class="font-medium text-gray-800 dark:text-white">Display Order</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                Lower numbers appear first. Use 0 for default ordering.
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-3">
                        <div class="bg-yellow-100 dark:bg-yellow-900 p-2 rounded-lg">
                            <i class="fas fa-star text-yellow-600 dark:text-yellow-300"></i>
                        </div>
                        <div>
                            <h3 class="font-medium text-gray-800 dark:text-white">Featured Projects</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                Featured projects are highlighted on your portfolio homepage.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Challenge management
    document.getElementById('add-challenge').addEventListener('click', function() {
        const container = document.getElementById('challenges-container');
        const item = document.createElement('div');
        item.className = 'challenge-item flex gap-2';
        item.innerHTML = `
            <input type="text" class="flex-1 px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-800 dark:text-white" name="challenges[]" placeholder="Enter a challenge">
            <button type="button" class="px-3 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 remove-challenge">
                <i class="fas fa-trash"></i>
            </button>
        `;
        container.appendChild(item);
    });

    document.addEventListener('click', function(e) {
        if (e.target.closest('.remove-challenge')) {
            e.target.closest('.challenge-item').remove();
        }
    });

    // Solution management
    document.getElementById('add-solution').addEventListener('click', function() {
        const container = document.getElementById('solutions-container');
        const item = document.createElement('div');
        item.className = 'solution-item flex gap-2';
        item.innerHTML = `
            <input type="text" class="flex-1 px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-800 dark:text-white" name="solutions[]" placeholder="Enter a solution">
            <button type="button" class="px-3 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 remove-solution">
                <i class="fas fa-trash"></i>
            </button>
        `;
        container.appendChild(item);
    });

    document.addEventListener('click', function(e) {
        if (e.target.closest('.remove-solution')) {
            e.target.closest('.solution-item').remove();
        }
    });

    // Result management
    document.getElementById('add-result').addEventListener('click', function() {
        const container = document.getElementById('results-container');
        const item = document.createElement('div');
        item.className = 'result-item flex gap-2';
        item.innerHTML = `
            <input type="text" class="flex-1 px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-800 dark:text-white" name="results[]" placeholder="Enter a result">
            <button type="button" class="px-3 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 remove-result">
                <i class="fas fa-trash"></i>
            </button>
        `;
        container.appendChild(item);
    });

    document.addEventListener('click', function(e) {
        if (e.target.closest('.remove-result')) {
            e.target.closest('.result-item').remove();
        }
    });
});
</script>
@endpush

@endsection

@push('scripts')
    <script>
        // Preview featured image
        function previewFeaturedImage(input) {
            const preview = document.getElementById('preview');
            const previewContainer = document.getElementById('image-preview');

            console.log('Preview function called');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    console.log('Reader loaded');
                    preview.src = e.target.result;
                    previewContainer.classList.remove('hidden');
                    preview.style.maxHeight = '300px';
                    preview.style.width = '100%';
                    preview.style.objectFit = 'cover';
                    preview.style.display = 'block';
                    console.log('Preview updated');
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        // Add event listener when DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            const featuredImageInput = document.getElementById('featured_image');
            if (featuredImageInput) {
                featuredImageInput.addEventListener('change', function() {
                    previewFeaturedImage(this);
                });
            }
        });

        // Preview additional image
        function previewAdditionalImage(input) {
            const label = input.parentElement.querySelector('.image-label');
            const fileName = input.files[0] ? input.files[0].name : 'No file chosen';
            label.textContent = fileName;

            // Show preview of the selected image
            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    // Create or update preview element
                    let previewContainer = input.parentElement.querySelector('.image-preview');
                    if (!previewContainer) {
                        previewContainer = document.createElement('div');
                        previewContainer.className = 'image-preview mt-2';
                        input.parentElement.appendChild(previewContainer);
                    }

                    // Clear previous preview
                    previewContainer.innerHTML = '';

                    // Create new preview image
                    const preview = document.createElement('img');
                    preview.src = e.target.result;
                    preview.className = 'w-full h-32 object-cover rounded';
                    preview.style.display = 'block';
                    previewContainer.appendChild(preview);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        // Preview featured image
        function previewImage(input) {
            const preview = document.getElementById('preview');
            const previewContainer = document.getElementById('image-preview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    previewContainer.classList.remove('hidden');
                    // Add proper styling to the preview
                    preview.style.maxHeight = '300px';
                    preview.style.width = '100%';
                    preview.style.objectFit = 'cover';
                    preview.style.display = 'block';
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        // Update image label for additional images
        function updateImageLabel(input) {
            const label = input.parentElement.querySelector('.image-label');
            const fileName = input.files[0] ? input.files[0].name : 'No file chosen';
            label.textContent = fileName;

            // Show preview of the selected image
            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    // Create or update preview element
                    let previewContainer = input.parentElement.querySelector('.image-preview');
                    if (!previewContainer) {
                        previewContainer = document.createElement('div');
                        previewContainer.className = 'image-preview mt-2';
                        input.parentElement.appendChild(previewContainer);
                    }

                    // Clear previous preview
                    previewContainer.innerHTML = '';

                    // Create new preview image
                    const preview = document.createElement('img');
                    preview.src = e.target.result;
                    preview.className = 'w-full h-32 object-cover rounded';
                    preview.style.display = 'block';
                    previewContainer.appendChild(preview);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        // Add more image rows
        document.addEventListener('DOMContentLoaded', function() {
            const addImageBtn = document.getElementById('add-image');
            const imagesContainer = document.getElementById('images-container');

            if (addImageBtn) {
                let imageCount = 1;
                addImageBtn.addEventListener('click', function() {
                    const firstRow = imagesContainer.querySelector('.image-row');
                    const newRow = firstRow.cloneNode(true);

                    // Generate unique IDs for new elements
                    const newId = imageCount++;
                    const fileInput = newRow.querySelector('.image-input');
                    const labelFor = newRow.querySelector('label[for^="image-"]');
                    const captionInput = newRow.querySelector('.image-caption');
                    const label = newRow.querySelector('.image-label');

                    // Update IDs and for attributes
                    fileInput.id = `image-${newId}`;
                    labelFor.setAttribute('for', `image-${newId}`);

                    // Clear inputs in the new row
                    fileInput.value = '';
                    captionInput.value = '';
                    label.textContent = '';

                    // Clear image preview
                    const imagePreview = newRow.querySelector('.image-preview');
                    if (imagePreview) {
                        imagePreview.innerHTML = '';
                    }

                    // Re-add event listener for file input
                    fileInput.onchange = function() {
                        previewAdditionalImage(this);
                    };

                    // Append new row
                    imagesContainer.appendChild(newRow);

                    // Smooth scroll to the new row
                    newRow.scrollIntoView({
                        behavior: 'smooth',
                        block: 'nearest'
                    });
                });
            }

            // Add event listeners to existing file inputs
            document.querySelectorAll('.image-input').forEach(input => {
                input.onchange = function() {
                    previewAdditionalImage(this);
                };
            });
        });
    </script>
@endpush
