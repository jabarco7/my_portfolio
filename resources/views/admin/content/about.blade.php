@extends('admin.layouts.app')

@section('title', 'About Page Management')

@section('content')
<div class="card rounded-lg shadow p-6 mb-6">
    <h2 class="text-xl font-semibold mb-6 text-gray-900 dark:text-white">About Page Content</h2>

    <form action="{{ route('admin.about.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="title" class="form-label">Page Title</label>
                <input type="text" id="title" name="title" value="{{ old('title', $aboutPage->title) }}" class="form-input" required>
            </div>

            <div>
                <label for="subtitle" class="form-label">Subtitle</label>
                <input type="text" id="subtitle" name="subtitle" value="{{ old('subtitle', $aboutPage->subtitle) }}" class="form-input">
            </div>
        </div>

        <div class="mt-6">
            <label for="description" class="form-label">About Description</label>
            <textarea id="description" name="description" rows="6" class="form-input" required>{{ old('description', $aboutPage->description) }}</textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
            <div>
                <label for="cv_file" class="form-label">CV File (PDF)</label>
                <input type="file" id="cv_file" name="cv_file" class="form-input" accept=".pdf">
                @if($aboutPage->cv_file)
                    <div class="mt-2 text-sm text-gray-600">
                        Current CV: <a href="{{ asset('storage/' . $aboutPage->cv_file) }}" target="_blank" class="text-blue-600 hover:underline">View PDF</a>
                    </div>
                @endif
            </div>

            <div>
                <label for="profile_image" class="form-label">Profile Image</label>
                <input type="file" id="profile_image" name="profile_image" class="form-input" accept="image/*">
                @if($aboutPage->profile_image)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $aboutPage->profile_image) }}" alt="Profile Image" class="h-20 w-20 object-cover rounded">
                    </div>
                @endif
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mt-6">
            <div>
                <label for="experience_years" class="form-label">Experience Years</label>
                <input type="number" id="experience_years" name="experience_years" value="{{ old('experience_years', $aboutPage->experience_years) }}" class="form-input" min="0">
            </div>
            <div>
                <label for="projects_count" class="form-label">Projects Count</label>
                <input type="number" id="projects_count" name="projects_count" value="{{ old('projects_count', $aboutPage->projects_count) }}" class="form-input" min="0">
            </div>
            <div>
                <label for="clients_count" class="form-label">Clients Count</label>
                <input type="number" id="clients_count" name="clients_count" value="{{ old('clients_count', $aboutPage->clients_count) }}" class="form-input" min="0">
            </div>
            <div>
                <label for="satisfaction_rate" class="form-label">Satisfaction Rate (%)</label>
                <input type="number" id="satisfaction_rate" name="satisfaction_rate" value="{{ old('satisfaction_rate', $aboutPage->satisfaction_rate) }}" class="form-input" min="0" max="100">
            </div>
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