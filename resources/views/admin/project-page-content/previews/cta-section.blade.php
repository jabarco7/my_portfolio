<div class="text-center p-4 border rounded bg-light">
    <h5 class="mb-3">{{ $data['title'] ?? 'Ready to Start Your Next Project?' }}</h5>
    <p class="text-muted mb-4">{{ $data['description'] ?? 'Let\'s collaborate to create something amazing that meets your goals and exceeds expectations.' }}</p>
    <div class="d-flex justify-content-center gap-2">
        <button class="btn btn-primary btn-sm">
            {{ $data['primary_button_text'] ?? 'Start a Project' }}
        </button>
        <button class="btn btn-outline-secondary btn-sm">
            {{ $data['secondary_button_text'] ?? 'View My Skills' }}
        </button>
    </div>
</div>
