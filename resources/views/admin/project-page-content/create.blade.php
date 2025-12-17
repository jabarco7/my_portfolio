@extends('admin.layouts.app')

@section('title', 'Create Project Page Content')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-lg-flex">
                        <div>
                            <h6 class="mb-0">Create Project Page Content</h6>
                            <p class="text-sm mb-0">
                                Add new dynamic content for the projects page.
                            </p>
                        </div>
                        <div class="ms-auto my-auto mt-lg-0 mt-4">
                            <div class="ms-auto my-auto">
                                <a href="{{ route('admin.project-page-content.index') }}" 
                                   class="btn btn-outline-primary btn-sm mb-0">
                                    <i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Back to List
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.project-page-content.store') }}" method="POST" id="contentForm">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="section_type" class="form-control-label">Section Type *</label>
                                    <select class="form-control @error('section_type') is-invalid @enderror" 
                                            id="section_type" name="section_type" required>
                                        <option value="">Select Section Type</option>
                                        @foreach($sectionTypes as $key => $label)
                                            <option value="{{ $key }}" {{ old('section_type') == $key ? 'selected' : '' }}>
                                                {{ $label }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('section_type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="order" class="form-control-label">Display Order</label>
                                    <input class="form-control @error('order') is-invalid @enderror" 
                                           type="number" id="order" name="order" 
                                           value="{{ old('order', 0) }}" min="0">
                                    @error('order')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-check form-switch mt-2">
                            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" 
                                   value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">
                                Active (visible on frontend)
                            </label>
                        </div>
                        
                        <hr class="horizontal dark my-4">
                        
                        <!-- Dynamic Content Fields -->
                        <div id="dynamicFields">
                            <!-- Content fields will be loaded here based on section type -->
                        </div>
                        
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-end">
                                    <button type="button" class="btn btn-light me-2" onclick="resetForm()">
                                        Reset
                                    </button>
                                    <button type="submit" class="btn bg-gradient-primary">
                                        <i class="fas fa-save"></i>&nbsp;&nbsp;Create Content
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Load dynamic fields when section type changes
    document.getElementById('section_type').addEventListener('change', function() {
        loadDynamicFields(this.value);
    });
    
    // Load fields if section type is pre-selected
    const selectedType = document.getElementById('section_type').value;
    if (selectedType) {
        loadDynamicFields(selectedType);
    }
});

function loadDynamicFields(sectionType) {
    const container = document.getElementById('dynamicFields');
    container.innerHTML = '';
    
    let fieldsHTML = '';
    
    switch(sectionType) {
        case 'hero_stats':
            fieldsHTML = `
                <h6 class="mb-3">Hero Statistics Configuration</h6>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-control-label">Projects Count *</label>
                            <input type="number" class="form-control" name="content_data[projects_count]" 
                                   value="{{ old('content_data.projects_count', 50) }}" required>
                            <small class="form-text text-muted">Number of projects to display</small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-control-label">Completed Projects *</label>
                            <input type="text" class="form-control" name="content_data[completed_projects]" 
                                   value="{{ old('content_data.completed_projects', '50+') }}" required>
                            <small class="form-text text-muted">Text to display (e.g., "50+")</small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-control-label">Client Satisfaction *</label>
                            <input type="text" class="form-control" name="content_data[client_satisfaction]" 
                                   value="{{ old('content_data.client_satisfaction', '100%') }}" required>
                            <small class="form-text text-muted">Text to display (e.g., "100%")</small>
                        </div>
                    </div>
                </div>
            `;
            break;
            
        case 'filter_buttons':
            fieldsHTML = `
                <h6 class="mb-3">Filter Buttons Configuration</h6>
                <div id="filterButtonsContainer">
                    <div class="filter-button-item mb-3 p-3 border rounded">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Filter Key *</label>
                                    <input type="text" class="form-control" name="content_data[0][key]" 
                                           placeholder="e.g., all, laravel, vue" required>
                                    <small class="form-text text-muted">Unique identifier for the filter</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Button Text *</label>
                                    <input type="text" class="form-control" name="content_data[0][label]" 
                                           placeholder="e.g., All Projects, Laravel" required>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-sm btn-danger" onclick="removeFilterButton(this)">
                            <i class="fas fa-trash"></i> Remove
                        </button>
                    </div>
                </div>
                <button type="button" class="btn btn-outline-primary btn-sm" onclick="addFilterButton()">
                    <i class="fas fa-plus"></i> Add Filter Button
                </button>
            `;
            break;
            
        case 'project_types':
            fieldsHTML = `
                <h6 class="mb-3">Project Types Configuration</h6>
                <div id="projectTypesContainer">
                    <div class="project-type-item mb-4 p-3 border rounded">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Title *</label>
                                    <input type="text" class="form-control" name="content_data[0][title]" 
                                           placeholder="e.g., Web Applications" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Count</label>
                                    <input type="text" class="form-control" name="content_data[0][count]" 
                                           placeholder="e.g., 15+">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Description *</label>
                                    <textarea class="form-control" name="content_data[0][description]" 
                                              rows="3" placeholder="Brief description" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Icon Class</label>
                                    <input type="text" class="form-control" name="content_data[0][icon]" 
                                           placeholder="e.g., fas fa-window-restore">
                                    <small class="form-text text-muted">FontAwesome icon class</small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Color Gradient</label>
                                    <input type="text" class="form-control" name="content_data[0][color]" 
                                           value="from-primary-500 to-secondary-500" 
                                           placeholder="e.g., from-blue-500 to-cyan-500">
                                    <small class="form-text text-muted">Tailwind gradient classes</small>
                                </div>
                            </div>
                            <div class="col-md-6 d-flex align-items-end">
                                <button type="button" class="btn btn-sm btn-danger" onclick="removeProjectType(this)">
                                    <i class="fas fa-trash"></i> Remove
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-outline-primary btn-sm" onclick="addProjectType()">
                    <i class="fas fa-plus"></i> Add Project Type
                </button>
            `;
            break;
            
        case 'process_steps':
            fieldsHTML = `
                <h6 class="mb-3">Process Steps Configuration</h6>
                <div id="processStepsContainer">
                    <div class="process-step-item mb-4 p-3 border rounded">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="form-control-label">Step Number *</label>
                                    <input type="number" class="form-control" name="content_data[0][step]" 
                                           value="01" min="01" max="99" required>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="form-control-label">Title *</label>
                                    <input type="text" class="form-control" name="content_data[0][title]" 
                                           placeholder="e.g., Discovery & Planning" required>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="form-control-label">Icon Class</label>
                                    <input type="text" class="form-control" name="content_data[0][icon]" 
                                           placeholder="e.g., fas fa-lightbulb">
                                    <small class="form-text text-muted">FontAwesome icon class</small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label class="form-control-label">Description *</label>
                                    <textarea class="form-control" name="content_data[0][description]" 
                                              rows="3" placeholder="Step description" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-2 d-flex align-items-end">
                                <button type="button" class="btn btn-sm btn-danger" onclick="removeProcessStep(this)">
                                    <i class="fas fa-trash"></i> Remove
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-outline-primary btn-sm" onclick="addProcessStep()">
                    <i class="fas fa-plus"></i> Add Process Step
                </button>
            `;
            break;
            
        case 'cta_section':
            fieldsHTML = `
                <h6 class="mb-3">Call-to-Action Section Configuration</h6>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Title *</label>
                            <input type="text" class="form-control" name="content_data[title]" 
                                   value="{{ old('content_data.title', 'Ready to Start Your Next Project?') }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Description *</label>
                            <textarea class="form-control" name="content_data[description]" 
                                      rows="3" required>{{ old('content_data.description', 'Let\'s collaborate to create something amazing that meets your goals and exceeds expectations.') }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Primary Button Text</label>
                            <input type="text" class="form-control" name="content_data[primary_button_text]" 
                                   value="{{ old('content_data.primary_button_text', 'Start a Project') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Primary Button Link</label>
                            <input type="text" class="form-control" name="content_data[primary_button_link]" 
                                   value="{{ old('content_data.primary_button_link', '/contact') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Secondary Button Text</label>
                            <input type="text" class="form-control" name="content_data[secondary_button_text]" 
                                   value="{{ old('content_data.secondary_button_text', 'View My Skills') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Secondary Button Link</label>
                            <input type="text" class="form-control" name="content_data[secondary_button_link]" 
                                   value="{{ old('content_data.secondary_button_link', '/skills') }}">
                        </div>
                    </div>
                </div>
            `;
            break;
            
        default:
            fieldsHTML = '<p class="text-muted">Please select a section type to configure the content fields.</p>';
    }
    
    container.innerHTML = fieldsHTML;
}

// Filter Button Functions
function addFilterButton() {
    const container = document.getElementById('filterButtonsContainer');
    const index = container.children.length;
    
    const newItem = document.createElement('div');
    newItem.className = 'filter-button-item mb-3 p-3 border rounded';
    newItem.innerHTML = `
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-control-label">Filter Key *</label>
                    <input type="text" class="form-control" name="content_data[${index}][key]" 
                           placeholder="e.g., react" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-control-label">Button Text *</label>
                    <input type="text" class="form-control" name="content_data[${index}][label]" 
                           placeholder="e.g., React" required>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-sm btn-danger" onclick="removeFilterButton(this)">
            <i class="fas fa-trash"></i> Remove
        </button>
    `;
    
    container.appendChild(newItem);
}

function removeFilterButton(button) {
    button.closest('.filter-button-item').remove();
}

// Project Type Functions
function addProjectType() {
    const container = document.getElementById('projectTypesContainer');
    const index = container.children.length;
    
    const newItem = document.createElement('div');
    newItem.className = 'project-type-item mb-4 p-3 border rounded';
    newItem.innerHTML = `
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-control-label">Title *</label>
                    <input type="text" class="form-control" name="content_data[${index}][title]" 
                           placeholder="e.g., Mobile Apps" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-control-label">Count</label>
                    <input type="text" class="form-control" name="content_data[${index}][count]" 
                           placeholder="e.g., 10+">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-control-label">Description *</label>
                    <textarea class="form-control" name="content_data[${index}][description]" 
                              rows="3" placeholder="Brief description" required></textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-control-label">Icon Class</label>
                    <input type="text" class="form-control" name="content_data[${index}][icon]" 
                           placeholder="e.g., fas fa-mobile-alt">
                    <small class="form-text text-muted">FontAwesome icon class</small>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-control-label">Color Gradient</label>
                    <input type="text" class="form-control" name="content_data[${index}][color]" 
                           value="from-primary-500 to-secondary-500" 
                           placeholder="e.g., from-green-500 to-emerald-500">
                    <small class="form-text text-muted">Tailwind gradient classes</small>
                </div>
            </div>
            <div class="col-md-6 d-flex align-items-end">
                <button type="button" class="btn btn-sm btn-danger" onclick="removeProjectType(this)">
                    <i class="fas fa-trash"></i> Remove
                </button>
            </div>
        </div>
    `;
    
    container.appendChild(newItem);
}

function removeProjectType(button) {
    button.closest('.project-type-item').remove();
}

// Process Step Functions
function addProcessStep() {
    const container = document.getElementById('processStepsContainer');
    const index = container.children.length;
    const stepNumber = String(index + 1).padStart(2, '0');
    
    const newItem = document.createElement('div');
    newItem.className = 'process-step-item mb-4 p-3 border rounded';
    newItem.innerHTML = `
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label class="form-control-label">Step Number *</label>
                    <input type="number" class="form-control" name="content_data[${index}][step]" 
                           value="${stepNumber}" min="01" max="99" required>
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <label class="form-control-label">Title *</label>
                    <input type="text" class="form-control" name="content_data[${index}][title]" 
                           placeholder="e.g., Testing & Quality" required>
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <label class="form-control-label">Icon Class</label>
                    <input type="text" class="form-control" name="content_data[${index}][icon]" 
                           placeholder="e.g., fas fa-check-double">
                    <small class="form-text text-muted">FontAwesome icon class</small>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10">
                <div class="form-group">
                    <label class="form-control-label">Description *</label>
                    <textarea class="form-control" name="content_data[${index}][description]" 
                              rows="3" placeholder="Step description" required></textarea>
                </div>
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <button type="button" class="btn btn-sm btn-danger" onclick="removeProcessStep(this)">
                    <i class="fas fa-trash"></i> Remove
                </button>
            </div>
        </div>
    `;
    
    container.appendChild(newItem);
}

function removeProcessStep(button) {
    button.closest('.process-step-item').remove();
}

function resetForm() {
    if (confirm('Are you sure you want to reset the form? All entered data will be lost.')) {
        document.getElementById('contentForm').reset();
        document.getElementById('dynamicFields').innerHTML = '<p class="text-muted">Please select a section type to configure the content fields.</p>';
    }
}
</script>
@endpush
