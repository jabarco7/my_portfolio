@extends('admin.layouts.app')

@section('title', 'About Page Management')

@section('content')
<div class="card rounded-lg shadow p-6 mb-6">
    <h2 class="text-xl font-semibold mb-6 text-gray-900 dark:text-white">About Page Content</h2>

    <form action="{{ route('admin.about.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="about_title" class="form-label">Page Title</label>
                <input type="text" id="about_title" name="about_title" value="{{ $settings['about_title'] ?? '' }}" class="form-input" required>
            </div>

            <div>
                <label for="about_cv_link" class="form-label">CV Download Link</label>
                <input type="url" id="about_cv_link" name="about_cv_link" value="{{ $settings['about_cv_link'] ?? '' }}" class="form-input">
            </div>
        </div>

        <div class="mt-6">
            <label for="about_description" class="form-label">About Description</label>
            <textarea id="about_description" name="about_description" rows="6" class="form-input" required>{{ $settings['about_description'] ?? '' }}</textarea>
        </div>

        <div class="mt-6">
            <label for="about_image" class="form-label">Profile Image URL</label>
            <input type="url" id="about_image" name="about_image" value="{{ $settings['about_image'] ?? '' }}" class="form-input">
        </div>
</div>

<div class="card rounded-lg shadow p-6 mb-6">
    <h2 class="text-xl font-semibold mb-6 text-gray-900 dark:text-white">Section Titles</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div>
            <label for="about_skills_title" class="form-label">Skills Section Title</label>
            <input type="text" id="about_skills_title" name="about_skills_title" value="{{ $settings['about_skills_title'] ?? 'My Skills' }}" class="form-input" required>
        </div>

        <div>
            <label for="about_experience_title" class="form-label">Experience Section Title</label>
            <input type="text" id="about_experience_title" name="about_experience_title" value="{{ $settings['about_experience_title'] ?? 'Experience' }}" class="form-input" required>
        </div>

        <div>
            <label for="about_education_title" class="form-label">Education Section Title</label>
            <input type="text" id="about_education_title" name="about_education_title" value="{{ $settings['about_education_title'] ?? 'Education' }}" class="form-input" required>
        </div>
    </div>
</div>

<div class="flex justify-end">
    <button type="submit" class="btn btn-primary">
        <i class="fas fa-save"></i> Save Changes
    </button>
</div>
</form>
@endsection