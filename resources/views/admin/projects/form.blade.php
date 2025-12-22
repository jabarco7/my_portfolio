@extends('layouts.admin')

@section('title', $project ? 'Edit Project' : 'Create Project')

@section('content')
<div class="container-fluid px-4">
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">
                        {{ $project ? 'Edit Project' : 'Create New Project' }}
                    </h6>
                    <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back to Projects
                    </a>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ $project ? route('admin.projects.update', $project->id) : route('admin.projects.store') }}" enctype="multipart/form-data">
                        @csrf
                        @if ($project)
                            @method('PUT')
                        @endif

                        <div class="row">
                            <!-- Basic Information -->
                            <div class="col-lg-6">
                                <h5 class="mb-3">Basic Information</h5>

                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $project->title ?? '') }}" required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="slug" class="form-label">Slug</label>
                                    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $project->slug ?? '') }}">
                                    @error('slug')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="excerpt" class="form-label">Excerpt</label>
                                    <textarea class="form-control @error('excerpt') is-invalid @enderror" id="excerpt" name="excerpt" rows="3">{{ old('excerpt', $project->excerpt ?? '') }}</textarea>
                                    @error('excerpt')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5">{{ old('description', $project->description ?? '') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="client" class="form-label">Client</label>
                                    <input type="text" class="form-control @error('client') is-invalid @enderror" id="client" name="client" value="{{ old('client', $project->client ?? '') }}">
                                    @error('client')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="start_date" class="form-label">Start Date</label>
                                            <input type="date" class="form-control @error('start_date') is-invalid @enderror" id="start_date" name="start_date" value="{{ old('start_date', $project->start_date ? $project->start_date->format('Y-m-d') : '') }}">
                                            @error('start_date')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="end_date" class="form-label">End Date</label>
                                            <input type="date" class="form-control @error('end_date') is-invalid @enderror" id="end_date" name="end_date" value="{{ old('end_date', $project->end_date ? $project->end_date->format('Y-m-d') : '') }}">
                                            @error('end_date')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="featured_image" class="form-label">Featured Image</label>
                                    <input type="file" class="form-control @error('featured_image') is-invalid @enderror" id="featured_image" name="featured_image" accept="image/*">
                                    @if ($project && $project->featured_image)
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/' . $project->featured_image) }}" alt="{{ $project->title }}" class="img-thumbnail" style="max-height: 200px;">
                                        </div>
                                    @endif
                                    @error('featured_image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Project Details -->
                            <div class="col-lg-6">
                                <h5 class="mb-3">Project Details</h5>

                                <div class="mb-3">
                                    <label for="project_url" class="form-label">Project URL</label>
                                    <input type="url" class="form-control @error('project_url') is-invalid @enderror" id="project_url" name="project_url" value="{{ old('project_url', $project->project_url ?? '') }}">
                                    @error('project_url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="github_url" class="form-label">GitHub URL</label>
                                    <input type="url" class="form-control @error('github_url') is-invalid @enderror" id="github_url" name="github_url" value="{{ old('github_url', $project->github_url ?? '') }}">
                                    @error('github_url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="technologies" class="form-label">Technologies (comma-separated)</label>
                                    <input type="text" class="form-control @error('technologies') is-invalid @enderror" id="technologies" name="technologies" value="{{ old('technologies', $project->technologies ?? '') }}" placeholder="e.g. Laravel, Vue.js, MySQL">
                                    @error('technologies')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="category_id" class="form-label">Category</label>
                                    <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id', $project->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="order" class="form-label">Order</label>
                                    <input type="number" class="form-control @error('order') is-invalid @enderror" id="order" name="order" value="{{ old('order', $project->order ?? 0) }}" min="0">
                                    @error('order')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input @error('is_featured') is-invalid @enderror" id="is_featured" name="is_featured" {{ old('is_featured', $project->is_featured ?? false) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_featured">Featured Project</label>
                                    @error('is_featured')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input @error('is_active') is-invalid @enderror" id="is_active" name="is_active" {{ old('is_active', $project->is_active ?? true) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">Active</label>
                                    @error('is_active')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Hero Section Content -->
                        <div class="mt-4">
                            <h5 class="mb-3">Hero Section Content</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="hero_badge_text" class="form-label">Badge Text</label>
                                        <input type="text" class="form-control" id="hero_badge_text" name="hero_content[badge_text]" value="{{ old('hero_content.badge_text', $project->hero_content['badge_text'] ?? 'Project Case Study') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="hero_title" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="hero_title" name="hero_content[title]" value="{{ old('hero_content.title', $project->hero_content['title'] ?? 'Project Details') }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Challenges Section -->
                        <div class="mt-4">
                            <h5 class="mb-3">Key Challenges</h5>
                            <div id="challenges-container">
                                @php
                                    $challenges = old('challenges', $project->challenges ?? [
                                        'Complex database design requirements',
                                        'Performance optimization for large datasets',
                                        'Real-time data synchronization needs',
                                        'Cross-browser compatibility requirements'
                                    ]);
                                @endphp
                                @foreach ($challenges as $index => $challenge)
                                    <div class="challenge-item mb-3">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="challenges[]" value="{{ $challenge }}">
                                            <button class="btn btn-outline-danger remove-challenge" type="button">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <button type="button" id="add-challenge" class="btn btn-outline-primary">
                                <i class="fas fa-plus"></i> Add Challenge
                            </button>
                        </div>

                        <!-- Solutions Section -->
                        <div class="mt-4">
                            <h5 class="mb-3">Implemented Solutions</h5>
                            <div id="solutions-container">
                                @php
                                    $solutions = old('solutions', $project->solutions ?? [
                                        'Optimized database indexing and query design',
                                        'Implemented caching strategies for faster performance',
                                        'Used WebSockets for real-time updates',
                                        'Comprehensive testing across all major browsers'
                                    ]);
                                @endphp
                                @foreach ($solutions as $index => $solution)
                                    <div class="solution-item mb-3">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="solutions[]" value="{{ $solution }}">
                                            <button class="btn btn-outline-danger remove-solution" type="button">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <button type="button" id="add-solution" class="btn btn-outline-primary">
                                <i class="fas fa-plus"></i> Add Solution
                            </button>
                        </div>

                        <!-- Results Section -->
                        <div class="mt-4">
                            <h5 class="mb-3">Key Results</h5>
                            <div id="results-container">
                                @php
                                    $results = old('results', $project->results ?? [
                                        '40% increase in user engagement',
                                        '60% reduction in page load time',
                                        '100% uptime since deployment',
                                        '5-star user satisfaction rating'
                                    ]);
                                @endphp
                                @foreach ($results as $index => $result)
                                    <div class="result-item mb-3">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="results[]" value="{{ $result }}">
                                            <button class="btn btn-outline-danger remove-result" type="button">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <button type="button" id="add-result" class="btn btn-outline-primary">
                                <i class="fas fa-plus"></i> Add Result
                            </button>
                        </div>

                        <!-- Project Details Section Content -->
                        <div class="mt-4">
                            <h5 class="mb-3">Project Details Section Content</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="details_title" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="details_title" name="project_details_content[title]" value="{{ old('project_details_content.title', $project->project_details_content['title'] ?? 'Project Details') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="technologies_title" class="form-label">Technologies Title</label>
                                        <input type="text" class="form-control" id="technologies_title" name="project_details_content[technologies_title]" value="{{ old('project_details_content.technologies_title', $project->project_details_content['technologies_title'] ?? 'Technologies Used') }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Explore More Section Content -->
                        <div class="mt-4">
                            <h5 class="mb-3">Explore More Section Content</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="explore_title" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="explore_title" name="explore_more_content[title]" value="{{ old('explore_more_content.title', $project->explore_more_content['title'] ?? 'Explore More Projects') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="explore_subtitle" class="form-label">Subtitle</label>
                                        <input type="text" class="form-control" id="explore_subtitle" name="explore_more_content[subtitle]" value="{{ old('explore_more_content.subtitle', $project->explore_more_content['subtitle'] ?? 'Check out other projects in my portfolio') }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Share Section Content -->
                        <div class="mt-4">
                            <h5 class="mb-3">Share Section Content</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="share_title" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="share_title" name="share_content[title]" value="{{ old('share_content.title', $project->share_content['title'] ?? 'Share Project') }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Challenges, Solutions, and Results -->
                        <div class="mt-4">
                            <h5 class="mb-3">Project Challenges, Solutions, and Results</h5>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Challenges</label>
                                        <div id="challenges-container">
                                            @foreach (old('challenges', $project->challenges ?? [
                                                'Complex database design requirements',
                                                'Performance optimization for large datasets',
                                                'Real-time data synchronization needs',
                                                'Cross-browser compatibility requirements'
                                            ]) as $index => $challenge)
                                                <div class="input-group mb-2 challenge-item">
                                                    <input type="text" class="form-control" name="challenges[]" value="{{ $challenge }}">
                                                    <button type="button" class="btn btn-outline-danger remove-challenge">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </div>
                                            @endforeach
                                        </div>
                                        <button type="button" class="btn btn-outline-primary btn-sm" id="add-challenge">
                                            <i class="fas fa-plus"></i> Add Challenge
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Solutions</label>
                                        <div id="solutions-container">
                                            @foreach (old('solutions', $project->solutions ?? [
                                                'Optimized database indexing and query design',
                                                'Implemented caching strategies for faster performance',
                                                'Used WebSockets for real-time updates',
                                                'Comprehensive testing across all major browsers'
                                            ]) as $index => $solution)
                                                <div class="input-group mb-2 solution-item">
                                                    <input type="text" class="form-control" name="solutions[]" value="{{ $solution }}">
                                                    <button type="button" class="btn btn-outline-danger remove-solution">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </div>
                                            @endforeach
                                        </div>
                                        <button type="button" class="btn btn-outline-primary btn-sm" id="add-solution">
                                            <i class="fas fa-plus"></i> Add Solution
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Results</label>
                                        <div id="results-container">
                                            @foreach (old('results', $project->results ?? [
                                                '40% increase in user engagement',
                                                '60% reduction in page load time',
                                                '100% uptime since deployment',
                                                '5-star user satisfaction rating'
                                            ]) as $index => $result)
                                                <div class="input-group mb-2 result-item">
                                                    <input type="text" class="form-control" name="results[]" value="{{ $result }}">
                                                    <button type="button" class="btn btn-outline-danger remove-result">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </div>
                                            @endforeach
                                        </div>
                                        <button type="button" class="btn btn-outline-primary btn-sm" id="add-result">
                                            <i class="fas fa-plus"></i> Add Result
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> {{ $project ? 'Update Project' : 'Create Project' }}
                            </button>
                            <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add new challenge
    document.getElementById('add-challenge').addEventListener('click', function() {
        const container = document.getElementById('challenges-container');
        const newChallenge = document.createElement('div');
        newChallenge.className = 'input-group mb-2 challenge-item';
        newChallenge.innerHTML = `
            <input type="text" class="form-control" name="challenges[]">
            <button type="button" class="btn btn-outline-danger remove-challenge">
                <i class="fas fa-times"></i>
            </button>
        `;
        container.appendChild(newChallenge);

        // Add event listener to remove button
        newChallenge.querySelector('.remove-challenge').addEventListener('click', function() {
            newChallenge.remove();
        });
    });

    // Add new solution
    document.getElementById('add-solution').addEventListener('click', function() {
        const container = document.getElementById('solutions-container');
        const newSolution = document.createElement('div');
        newSolution.className = 'input-group mb-2 solution-item';
        newSolution.innerHTML = `
            <input type="text" class="form-control" name="solutions[]">
            <button type="button" class="btn btn-outline-danger remove-solution">
                <i class="fas fa-times"></i>
            </button>
        `;
        container.appendChild(newSolution);

        // Add event listener to remove button
        newSolution.querySelector('.remove-solution').addEventListener('click', function() {
            newSolution.remove();
        });
    });

    // Add new result
    document.getElementById('add-result').addEventListener('click', function() {
        const container = document.getElementById('results-container');
        const newResult = document.createElement('div');
        newResult.className = 'input-group mb-2 result-item';
        newResult.innerHTML = `
            <input type="text" class="form-control" name="results[]">
            <button type="button" class="btn btn-outline-danger remove-result">
                <i class="fas fa-times"></i>
            </button>
        `;
        container.appendChild(newResult);

        // Add event listener to remove button
        newResult.querySelector('.remove-result').addEventListener('click', function() {
            newResult.remove();
        });
    });

    // Remove existing challenge
    document.querySelectorAll('.remove-challenge').forEach(button => {
        button.addEventListener('click', function() {
            this.closest('.challenge-item').remove();
        });
    });

    // Remove existing solution
    document.querySelectorAll('.remove-solution').forEach(button => {
        button.addEventListener('click', function() {
            this.closest('.solution-item').remove();
        });
    });

    // Remove existing result
    document.querySelectorAll('.remove-result').forEach(button => {
        button.addEventListener('click', function() {
            this.closest('.result-item').remove();
        });
    });

    // Auto-generate slug from title
    document.getElementById('title').addEventListener('input', function() {
        const title = this.value;
        const slug = title.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/^-+|-+$/g, '');
        document.getElementById('slug').value = slug;
    });
});
</script>
@endsection
@endsection
