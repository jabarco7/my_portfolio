<!-- Project Details Section -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Project Details</h6>
    </div>
    <div class="card-body">
        <!-- Hero Content -->
        <div class="mb-4">
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

        <!-- Challenges -->
        <div class="mb-4">
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

        <!-- Solutions -->
        <div class="mb-4">
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

        <!-- Results -->
        <div class="mb-4">
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

        <!-- Project Details Content -->
        <div class="mb-4">
            <h5 class="mb-3">Project Details Section</h5>
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

        <!-- Explore More Content -->
        <div class="mb-4">
            <h5 class="mb-3">Explore More Section</h5>
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

        <!-- Share Content -->
        <div class="mb-4">
            <h5 class="mb-3">Share Section</h5>
            <div class="mb-3">
                <label for="share_title" class="form-label">Title</label>
                <input type="text" class="form-control" id="share_title" name="share_content[title]" value="{{ old('share_content.title', $project->share_content['title'] ?? 'Share Project') }}">
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Challenge management
    document.getElementById('add-challenge').addEventListener('click', function() {
        const container = document.getElementById('challenges-container');
        const item = document.createElement('div');
        item.className = 'challenge-item mb-3';
        item.innerHTML = `
            <div class="input-group">
                <input type="text" class="form-control" name="challenges[]">
                <button class="btn btn-outline-danger remove-challenge" type="button">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        `;
        container.appendChild(item);
    });

    document.querySelectorAll('.remove-challenge').forEach(button => {
        button.addEventListener('click', function() {
            this.closest('.challenge-item').remove();
        });
    });

    // Solution management
    document.getElementById('add-solution').addEventListener('click', function() {
        const container = document.getElementById('solutions-container');
        const item = document.createElement('div');
        item.className = 'solution-item mb-3';
        item.innerHTML = `
            <div class="input-group">
                <input type="text" class="form-control" name="solutions[]">
                <button class="btn btn-outline-danger remove-solution" type="button">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        `;
        container.appendChild(item);
    });

    document.querySelectorAll('.remove-solution').forEach(button => {
        button.addEventListener('click', function() {
            this.closest('.solution-item').remove();
        });
    });

    // Result management
    document.getElementById('add-result').addEventListener('click', function() {
        const container = document.getElementById('results-container');
        const item = document.createElement('div');
        item.className = 'result-item mb-3';
        item.innerHTML = `
            <div class="input-group">
                <input type="text" class="form-control" name="results[]">
                <button class="btn btn-outline-danger remove-result" type="button">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        `;
        container.appendChild(item);
    });

    document.querySelectorAll('.remove-result').forEach(button => {
        button.addEventListener('click', function() {
            this.closest('.result-item').remove();
        });
    });
});
</script>
