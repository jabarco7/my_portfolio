@extends('admin.layouts.app')

@section('title', 'Home Page Management')

@section('content')
<div class="card rounded-lg shadow p-6 mb-6">
    <h2 class="text-xl font-semibold mb-6 text-gray-900 dark:text-white">Hero Section</h2>

    <form action="{{ route('admin.content.home.update') }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Badge Text -->
        <div class="mb-6">
            <label for="hero_badge_text" class="form-label">Badge Text</label>
            <input type="text" id="hero_badge_text" name="hero_badge_text" 
                value="{{ $settings['hero_badge_text'] ?? 'Open for Opportunities' }}" 
                class="form-input" required>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Name -->
            <div>
                <label for="hero_name" class="form-label">Your Name</label>
                <input type="text" id="hero_name" name="hero_name" 
                    value="{{ $settings['hero_name'] ?? 'Abduljabbar' }}" 
                    class="form-input" required>
            </div>

            <!-- Title -->
            <div>
                <label for="hero_title" class="form-label">Professional Title</label>
                <input type="text" id="hero_title" name="hero_title" 
                    value="{{ $settings['hero_title'] ?? 'Full Stack Web Developer' }}" 
                    class="form-input" required>
            </div>
        </div>

        <!-- Description -->
        <div class="mt-6">
            <label for="hero_description" class="form-label">Description</label>
            <textarea id="hero_description" name="hero_description" rows="3" class="form-input" required>{{ $settings['hero_description'] ?? "I craft digital experiences that are fast, accessible, visually appealing, and responsive. Let's build something amazing together." }}</textarea>
        </div>

        <!-- Call to Action Buttons -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
            <div>
                <label for="hero_cta1_text" class="form-label">Primary Button Text</label>
                <input type="text" id="hero_cta1_text" name="hero_cta1_text" 
                    value="{{ $settings['hero_cta1_text'] ?? 'Get In Touch' }}" 
                    class="form-input" required>
            </div>

            <div>
                <label for="hero_cta2_text" class="form-label">Secondary Button Text</label>
                <input type="text" id="hero_cta2_text" name="hero_cta2_text" 
                    value="{{ $settings['hero_cta2_text'] ?? 'View My Work' }}" 
                    class="form-input" required>
            </div>
        </div>

        <!-- Tech Stack Section -->
        <div class="mt-6">
            <label for="hero_tech_stack_title" class="form-label">Tech Stack Section Title</label>
            <input type="text" id="hero_tech_stack_title" name="hero_tech_stack_title" 
                value="{{ $settings['hero_tech_stack_title'] ?? 'Tech Stack' }}" 
                class="form-input" required>
        </div>

        <!-- Social Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
            <div>
                <label for="hero_social_title" class="form-label">Social Section Title</label>
                <input type="text" id="hero_social_title" name="hero_social_title" 
                    value="{{ $settings['hero_social_title'] ?? 'Follow Me' }}" 
                    class="form-input" required>
            </div>

            <div>
                <label for="hero_social_subtitle" class="form-label">Social Section Subtitle</label>
                <input type="text" id="hero_social_subtitle" name="hero_social_subtitle" 
                    value="{{ $settings['hero_social_subtitle'] ?? 'دعنا نتواصل ونبني مشاريع رائعة معاً' }}" 
                    class="form-input" required>
            </div>
        </div>

        <div class="flex justify-end mt-8">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Save Changes
            </button>
        </div>
    </form>
</div>
@endsection