@extends('admin.layouts.app')

@section('title', 'Project Details')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $project->title }}</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="{{ route('admin.projects') }}" class="btn btn-default btn-sm">
                            <i class="fas fa-arrow-left"></i> Back to Projects
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Client:</strong> {{ $project->client ?? 'N/A' }}</p>
                            <p><strong>Start Date:</strong> {{ $project->start_date?->format('M d, Y') ?? 'N/A' }}</p>
                            <p><strong>End Date:</strong> {{ $project->end_date?->format('M d, Y') ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Status:</strong> 
                                @if ($project->is_active)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-secondary">Inactive</span>
                                @endif
                            </p>
                            <p><strong>Featured:</strong> 
                                @if ($project->is_featured)
                                    <span class="badge badge-warning">Featured</span>
                                @else
                                    <span class="badge badge-light">Regular</span>
                                @endif
                            </p>
                            <p><strong>Order:</strong> {{ $project->order }}</p>
                        </div>
                    </div>

                    <hr>

                    <h5>Excerpt</h5>
                    <p>{{ $project->excerpt ?? 'No excerpt provided' }}</p>

                    <hr>

                    <h5>Description</h5>
                    <div>{{ $project->description }}</div>

                    <hr>

                    <h5>Links</h5>
                    <div class="row">
                        @if ($project->project_url)
                            <div class="col-md-6 mb-2">
                                <a href="{{ $project->project_url }}" target="_blank" class="btn btn-primary btn-sm">
                                    <i class="fas fa-external-link-alt"></i> View Project
                                </a>
                            </div>
                        @endif
                        @if ($project->github_url)
                            <div class="col-md-6 mb-2">
                                <a href="{{ $project->github_url }}" target="_blank" class="btn btn-dark btn-sm">
                                    <i class="fab fa-github"></i> View on GitHub
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Featured Image</h3>
                </div>
                <div class="card-body">
                    @if ($project->featured_image)
                        <img src="{{ asset('storage/' . $project->featured_image) }}" alt="{{ $project->title }}" class="img-fluid" style="height: 300px; object-fit: cover; width: 100%;">
                    @else
                        <div class="text-center bg-gray-200 p-5">
                            <i class="fas fa-image fa-3x text-gray-400"></i>
                            <p class="mt-2">No featured image</p>
                        </div>
                    @endif
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header">
                    <h3 class="card-title">Actions</h3>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Edit Project
                        </a>

                        <form action="{{ route('admin.projects.toggle-active', $project) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn {{ $project->is_active ? 'btn-secondary' : 'btn-success' }} btn-block">
                                <i class="fas {{ $project->is_active ? 'fa-eye-slash' : 'fa-eye' }}"></i>
                                {{ $project->is_active ? 'Deactivate' : 'Activate' }}
                            </button>
                        </form>

                        <form action="{{ route('admin.projects.toggle-featured', $project) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn {{ $project->is_featured ? 'btn-secondary' : 'btn-warning' }} btn-block">
                                <i class="fas {{ $project->is_featured ? 'fa-star' : 'far fa-star' }}"></i>
                                {{ $project->is_featured ? 'Remove from Featured' : 'Add to Featured' }}
                            </button>
                        </form>

                        <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this project?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-block">
                                <i class="fas fa-trash"></i> Delete Project
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Project Images Section -->
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Project Images</h3>
                    <div class="card-tools">
                        <span class="badge badge-info">{{ $project->images->count() }} Images</span>
                    </div>
                </div>
                <div class="card-body">
                    @if ($project->images->count() > 0)
                        <div class="row">
                            @foreach ($project->images as $image)
                                <div class="col-md-3 mb-3">
                                    <div class="card h-100">
                                        <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $image->caption ?? $project->title }}" class="card-img-top" style="height: 200px; object-fit: cover; width: 100%;">
                                        <div class="card-body p-2 d-flex flex-column">
                                            <p class="card-text small">{{ $image->caption ?? 'No caption' }}</p>
                                            @if ($image->is_featured)
                                                <span class="badge badge-warning">Featured</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-images fa-3x text-gray-300"></i>
                            <h5 class="mt-2">No images uploaded</h5>
                            <p class="text-muted">Upload images to showcase this project</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
