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
            <a href="{{ route('admin.projects') }}"
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
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        id="title" name="title" value="{{ old('title', $project->title) }}" required>
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="client">Client</label>
                                    <input type="text" class="form-control @error('client') is-invalid @enderror"
                                        id="client" name="client" value="{{ old('client', $project->client) }}">
                                    @error('client')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="start_date">Start Date</label>
                                    <input type="date" class="form-control @error('start_date') is-invalid @enderror"
                                        id="start_date" name="start_date"
                                        value="{{ old('start_date', $project->start_date?->format('Y-m-d')) }}">
                                    @error('start_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="end_date">End Date</label>
                                    <input type="date" class="form-control @error('end_date') is-invalid @enderror"
                                        id="end_date" name="end_date"
                                        value="{{ old('end_date', $project->end_date?->format('Y-m-d')) }}">
                                    @error('end_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="project_url">Project URL</label>
                                    <input type="url" class="form-control @error('project_url') is-invalid @enderror"
                                        id="project_url" name="project_url"
                                        value="{{ old('project_url', $project->project_url) }}">
                                    @error('project_url')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="github_url">GitHub URL</label>
                                    <input type="url" class="form-control @error('github_url') is-invalid @enderror"
                                        id="github_url" name="github_url"
                                        value="{{ old('github_url', $project->github_url) }}">
                                    @error('github_url')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="excerpt">Excerpt</label>
                            <textarea class="form-control @error('excerpt') is-invalid @enderror" id="excerpt" name="excerpt" rows="2">{{ old('excerpt', $project->excerpt) }}</textarea>
                            @error('excerpt')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Description <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                rows="6" required>{{ old('description', $project->description) }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="featured_image">Featured Image</label>
                                    <input type="file"
                                        class="form-control @error('featured_image') is-invalid @enderror"
                                        id="featured_image" name="featured_image" accept="image/*">
                                    @if ($project->featured_image)
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/' . $project->featured_image) }}"
                                                alt="{{ $project->title }}" class="img-thumbnail"
                                                style="max-width: 200px;">
                                        </div>
                                    @endif
                                    @error('featured_image')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="order">Order</label>
                                    <input type="number" class="form-control @error('order') is-invalid @enderror"
                                        id="order" name="order" value="{{ old('order', $project->order) }}"
                                        min="0">
                                    @error('order')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="icheck-primary d-inline mr-2">
                                        <input type="checkbox" id="is_featured" name="is_featured" value="1"
                                            {{ old('is_featured', $project->is_featured) ? 'checked' : '' }}>
                                        <label for="is_featured">Featured Project</label>
                                    </div>
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="is_active" name="is_active" value="1"
                                            {{ old('is_active', $project->is_active) ? 'checked' : '' }}>
                                        <label for="is_active">Active</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Update Project
                        </button>
                        <a href="{{ route('admin.projects') }}" class="btn btn-default">
                            <i class="fas fa-times"></i> Cancel
                        </a>
                    </div>
                </form>
            </div>
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
                                            data-image-id="{{ $image->id }}" data-caption="{{ $image->caption }}">
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
@endsection
