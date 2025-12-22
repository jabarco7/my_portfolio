@extends('admin.layouts.app')

@section('title', 'Edit Project')

@section('content')
    <!-- Header Section -->
    <div class="bg-gradient-to-r from-purple-500 to-indigo-600 rounded-xl shadow-lg p-6 mb-8 text-white">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold mb-2">Edit Project</h1>
                <p class="text-purple-100">Update project details and images</p>
            </div>
            <a href="{{ route('admin.projects.index') }}"
                class="bg-white bg-opacity-20 hover:bg-opacity-30 px-4 py-2 rounded-lg font-medium transition-colors flex items-center">
                <i class="fas fa-arrow-left mr-2"></i> Back to Projects
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main Content Form -->
        <div class="lg:col-span-2">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden">
                <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label for="title"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Title <span
                                        class="text-red-500">*</span></label>
                                <input type="text"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:text-white @error('title') border-red-500 @enderror"
                                    id="title" name="title" value="{{ old('title', $project->title) }}" required>
                                @error('title')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="client"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Client</label>
                                <input type="text"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:text-white @error('client') border-red-500 @enderror"
                                    id="client" name="client" value="{{ old('client', $project->client) }}">
                                @error('client')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>



                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label for="project_url"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Project
                                    URL</label>
                                <input type="url"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:text-white @error('project_url') border-red-500 @enderror"
                                    id="project_url" name="project_url"
                                    value="{{ old('project_url', $project->project_url) }}">
                                @error('project_url')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="github_url"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">GitHub
                                    URL</label>
                                <input type="url"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:text-white @error('github_url') border-red-500 @enderror"
                                    id="github_url" name="github_url" value="{{ old('github_url', $project->github_url) }}">
                                @error('github_url')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-6">
                            <label for="excerpt"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Excerpt</label>
                            <textarea
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:text-white @error('excerpt') border-red-500 @enderror"
                                id="excerpt" name="excerpt" rows="2">{{ old('excerpt', $project->excerpt) }}</textarea>
                            @error('excerpt')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="description"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Description <span
                                    class="text-red-500">*</span></label>
                            <textarea
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:text-white @error('description') border-red-500 @enderror"
                                id="description" name="description" rows="6" required>{{ old('description', $project->description) }}</textarea>
                            @error('description')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Tags</label>
                            <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                                @foreach ($tags as $tag)
                                    <div class="flex items-center">
                                        <input type="checkbox" id="tag_{{ $tag->id }}" name="tags[]"
                                            value="{{ $tag->id }}"
                                            class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500"
                                            {{ in_array($tag->id, old('tags', $project->tags->pluck('id')->toArray())) ? 'checked' : '' }}>
                                        <label for="tag_{{ $tag->id }}"
                                            class="ml-2 block text-sm text-gray-900 dark:text-gray-300">
                                            {{ $tag->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            @error('tags')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="category_id"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Category</label>
                            <select
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:text-white @error('category_id') border-red-500 @enderror"
                                id="category_id" name="category_id">
                                <option value="">Select a category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $project->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Challenges Section -->
                        <div class="mb-6">
                            <h3 class="text-lg font-medium mb-3 text-gray-800 dark:text-white">Key Challenges</h3>
                            <div id="challenges-container" class="space-y-3">
                                @php
                                    $projectChallenges = $project->challenges;
                                    if (!is_array($projectChallenges) && is_string($projectChallenges)) {
                                        $projectChallenges = json_decode($projectChallenges, true);
                                    }
                                    $challenges = old('challenges', $projectChallenges ?? []);
                                    if (empty($challenges)) {
                                        $challenges = [''];
                                    }
                                @endphp
                                @foreach ($challenges as $challenge)
                                    <div class="challenge-item flex gap-2">
                                        <input type="text" class="flex-1 px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-800 dark:text-white" name="challenges[]" value="{{ $challenge }}" placeholder="Enter a challenge">
                                        <button type="button" class="px-3 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 remove-challenge">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                            <button type="button" id="add-challenge" class="mt-3 px-4 py-2 bg-purple-500 text-white rounded-lg hover:bg-purple-600">
                                <i class="fas fa-plus mr-2"></i>Add Challenge
                            </button>
                        </div>

                        <!-- Solutions Section -->
                        <div class="mb-6">
                            <h3 class="text-lg font-medium mb-3 text-gray-800 dark:text-white">Implemented Solutions</h3>
                            <div id="solutions-container" class="space-y-3">
                                @php
                                    $projectSolutions = $project->solutions;
                                    if (!is_array($projectSolutions) && is_string($projectSolutions)) {
                                        $projectSolutions = json_decode($projectSolutions, true);
                                    }
                                    $solutions = old('solutions', $projectSolutions ?? []);
                                    if (empty($solutions)) {
                                        $solutions = [''];
                                    }
                                @endphp
                                @foreach ($solutions as $solution)
                                    <div class="solution-item flex gap-2">
                                        <input type="text" class="flex-1 px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-800 dark:text-white" name="solutions[]" value="{{ $solution }}" placeholder="Enter a solution">
                                        <button type="button" class="px-3 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 remove-solution">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                            <button type="button" id="add-solution" class="mt-3 px-4 py-2 bg-purple-500 text-white rounded-lg hover:bg-purple-600">
                                <i class="fas fa-plus mr-2"></i>Add Solution
                            </button>
                        </div>

                        <!-- Results Section -->
                        <div class="mb-6">
                            <h3 class="text-lg font-medium mb-3 text-gray-800 dark:text-white">Key Results</h3>
                            <div id="results-container" class="space-y-3">
                                @php
                                    $projectResults = $project->results;
                                    if (!is_array($projectResults) && is_string($projectResults)) {
                                        $projectResults = json_decode($projectResults, true);
                                    }
                                    $results = old('results', $projectResults ?? []);
                                    if (empty($results)) {
                                        $results = [''];
                                    }
                                @endphp
                                @foreach ($results as $result)
                                    <div class="result-item flex gap-2">
                                        <input type="text" class="flex-1 px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-800 dark:text-white" name="results[]" value="{{ $result }}" placeholder="Enter a result">
                                        <button type="button" class="px-3 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 remove-result">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                            <button type="button" id="add-result" class="mt-3 px-4 py-2 bg-purple-500 text-white rounded-lg hover:bg-purple-600">
                                <i class="fas fa-plus mr-2"></i>Add Result
                            </button>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                            <div>
                                <label for="featured_image"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Featured
                                    Image</label>
                                <input type="file"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:text-white @error('featured_image') border-red-500 @enderror"
                                    id="featured_image" name="featured_image" accept="image/*">
                                @if ($project->featured_image)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $project->featured_image) }}"
                                            alt="{{ $project->title }}" class="rounded-lg shadow-sm"
                                            style="max-width: 200px;">
                                    </div>
                                @endif
                                @error('featured_image')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="order"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Order</label>
                                <input type="number"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:text-white @error('order') border-red-500 @enderror"
                                    id="order" name="order" value="{{ old('order', $project->order) }}"
                                    min="0">
                                @error('order')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="flex flex-col justify-center space-y-4">
                                <div class="flex items-center">
                                    <input type="checkbox" id="is_featured" name="is_featured" value="1"
                                        class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500"
                                        {{ old('is_featured', $project->is_featured) ? 'checked' : '' }}>
                                    <label for="is_featured"
                                        class="ml-2 block text-sm text-gray-900 dark:text-gray-300">Featured
                                        Project</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="is_active" name="is_active" value="1"
                                        class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500"
                                        {{ old('is_active', $project->is_active) ? 'checked' : '' }}>
                                    <label for="is_active"
                                        class="ml-2 block text-sm text-gray-900 dark:text-gray-300">Active</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="px-6 py-4 bg-gray-50 dark:bg-gray-700 border-t border-gray-200 dark:border-gray-600 flex justify-end">
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-medium transition-colors flex items-center">
                            <i class="fas fa-save mr-2"></i> Update Project
                        </button>
                        <a href="{{ route('admin.projects.index') }}"
                            class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-6 py-2 rounded-lg font-medium transition-colors ml-2 flex items-center">
                            <i class="fas fa-times mr-2"></i> Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Project Images Section -->
        <div class="lg:col-span-1">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden h-full flex flex-col">
                <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 flex items-center justify-between">
                    <h3 class="text-lg font-semibold">Project Images</h3>
                    <label for="add-image-modal"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded-lg text-sm font-medium transition-colors cursor-pointer">
                        <i class="fas fa-plus"></i> Add New Image
                    </label>
                </div>
                <div class="p-6">
                    @if ($project->images->count() > 0)
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-4">
                            @foreach ($project->images as $image)
                                <div
                                    class="bg-gray-50 dark:bg-gray-700 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                                    <img src="{{ $image->url }}" class="w-full h-48 object-cover"
                                        alt="{{ $image->caption ?? 'Project image' }}">
                                    <div class="p-3">
                                        <p class="text-sm text-gray-600 dark:text-gray-300 mb-3">
                                            {{ $image->caption ?? 'No caption' }}</p>
                                        <div class="flex gap-2">
                                            <form action="{{ route('admin.projects.images.feature', $image) }}"
                                                method="POST" class="flex-1">
                                                @csrf
                                                <button type="submit"
                                                    class="w-full px-2 py-1 text-xs rounded font-medium transition-colors {{ $image->is_featured ? 'bg-yellow-500 hover:bg-yellow-600 text-white' : 'bg-gray-200 hover:bg-gray-300 text-gray-800' }}">
                                                    <i class="fas fa-star"></i>
                                                    {{ $image->is_featured ? 'Featured' : 'Feature' }}
                                                </button>
                                            </form>
                                            <label for="edit-image-modal"
                                                class="flex-1 px-2 py-1 text-xs rounded font-medium bg-blue-500 hover:bg-blue-600 text-white transition-colors cursor-pointer"
                                                data-image-id="{{ $image->id }}"
                                                data-caption="{{ $image->caption }}">
                                                <i class="fas fa-edit"></i>
                                            </label>
                                            <form action="{{ route('admin.projects.images.destroy', $image) }}"
                                                method="POST" class="flex-1">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="w-full px-2 py-1 text-xs rounded font-medium bg-red-500 hover:bg-red-600 text-white transition-colors"
                                                    onclick="return confirm('Are you sure you want to delete this image?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-12">
                            <i class="fas fa-images fa-3x text-gray-300 mb-3 block"></i>
                            <h5 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-1">No Images</h5>
                            <p class="text-gray-500 dark:text-gray-400">Add images to showcase this project.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Add Image Modal -->
    <input type="checkbox" id="add-image-modal" class="modal-toggle" />
    <div class="modal">
        <div class="modal-box max-w-2xl">
            <h3 class="font-bold text-lg">Add New Images</h3>
            <form action="{{ route('admin.projects.images.store', $project) }}" method="POST"
                enctype="multipart/form-data" id="addImagesForm">
                @csrf
                <div class="py-4">
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Images <span class="text-red-500">*</span></span>
                            <span class="label-text-alt">Select multiple images at once</span>
                        </label>
                        <input type="file"
                            class="file-input file-input-bordered w-full @error('images') file-input-error @enderror"
                            id="images" name="images[]" accept="image/*" multiple required>
                        @error('images')
                            <label class="label">
                                <span class="label-text-alt text-red-500">{{ $message }}</span>
                            </label>
                        @enderror
                    </div>
                    <div id="imagePreviews" class="mt-4 space-y-3">
                        <!-- Caption inputs will be added here dynamically -->
                    </div>
                </div>
                <div class="modal-action">
                    <label for="add-image-modal" class="btn">Cancel</label>
                    <button type="submit" class="btn btn-primary" id="addImagesBtn">Add Images</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Image Modal -->
    <input type="checkbox" id="edit-image-modal" class="modal-toggle" />
    <div class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Edit Image Caption</h3>
            <form id="editImageForm" method="POST">
                @csrf
                @method('PUT')
                <div class="py-4">
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Caption</span>
                        </label>
                        <input type="text" class="input input-bordered w-full @error('caption') input-error @enderror"
                            id="edit_caption" name="caption">
                        @error('caption')
                            <label class="label">
                                <span class="label-text-alt text-red-500">{{ $message }}</span>
                            </label>
                        @enderror
                    </div>
                </div>
                <div class="modal-action">
                    <label for="edit-image-modal" class="btn">Cancel</label>
                    <button type="submit" class="btn btn-primary">Update Caption</button>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Handle edit modal
                const editLabels = document.querySelectorAll('label[for="edit-image-modal"]');
                editLabels.forEach(label => {
                    label.addEventListener('click', function() {
                        const imageId = this.dataset.imageId;
                        const caption = this.dataset.caption;

                        const editCaption = document.getElementById('edit_caption');
                        const editImageForm = document.getElementById('editImageForm');

                        editCaption.value = caption;
                        editImageForm.action = '/admin/projects/images/' + imageId;
                    });
                });
            });
        </script>
    @endpush
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
