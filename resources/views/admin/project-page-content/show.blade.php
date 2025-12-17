@extends('admin.layouts.app')

@section('title', 'View Project Page Content')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-lg-flex">
                        <div>
                            <h6 class="mb-0">Project Page Content Details</h6>
                            <p class="text-sm mb-0">
                                View detailed information about this project page content.
                            </p>
                        </div>
                        <div class="ms-auto my-auto mt-lg-0 mt-4">
                            <div class="ms-auto my-auto">
                                <a href="{{ route('admin.project-page-content.index') }}" 
                                   class="btn btn-outline-primary btn-sm mb-0">
                                    <i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Back to List
                                </a>
                                <a href="{{ route('admin.project-page-content.edit', $projectPageContent->id) }}" 
                                   class="btn bg-gradient-primary btn-sm mb-0">
                                    <i class="fas fa-edit"></i>&nbsp;&nbsp;Edit Content
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label text-uppercase text-secondary text-xs font-weight-bolder">Section Type</label>
                                <div class="form-control bg-gray-100">
                                    <strong>{{ $projectPageContent->section_type }}</strong>
                                    <small class="d-block text-muted">{{ ProjectPageContent::SECTION_TYPES[$projectPageContent->section_type] ?? 'Unknown' }}</small>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label text-uppercase text-secondary text-xs font-weight-bolder">Status</label>
                                <div class="form-control bg-gray-100">
                                    <span class="badge badge-sm {{ $projectPageContent->is_active ? 'bg-gradient-success' : 'bg-gradient-secondary' }}">
                                        {{ $projectPageContent->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label text-uppercase text-secondary text-xs font-weight-bolder">Display Order</label>
                                <div class="form-control bg-gray-100">
                                    <strong>{{ $projectPageContent->order }}</strong>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label text-uppercase text-secondary text-xs font-weight-bolder">Created At</label>
                                <div class="form-control bg-gray-100">
                                    <strong>{{ $projectPageContent->created_at->format('M d, Y h:i A') }}</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label text-uppercase text-secondary text-xs font-weight-bolder">Updated At</label>
                                <div class="form-control bg-gray-100">
                                    <strong>{{ $projectPageContent->updated_at->format('M d, Y h:i A') }}</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <hr class="horizontal dark my-4">
                    
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-control-label text-uppercase text-secondary text-xs font-weight-bolder">Content Data</label>
                                <div class="form-control bg-gray-100" style="min-height: 200px;">
                                    @if(is_array($projectPageContent->content_data))
                                        <pre class="mb-0" style="white-space: pre-wrap; word-wrap: break-word;">
{{ json_encode($projectPageContent->content_data, JSON_PRETTY_PRINT) }}
                                        </pre>
                                    @else
                                        <p class="mb-0">{{ $projectPageContent->content_data }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <hr class="horizontal dark my-4">
                    
                    <!-- Content Preview Section -->
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-control-label text-uppercase text-secondary text-xs font-weight-bolder">Content Preview</label>
                                <div class="border rounded p-3" style="background-color: #f8f9fa;">
                                    @switch($projectPageContent->section_type)
                                        @case('hero_stats')
                                            @include('admin.project-page-content.previews.hero-stats', ['data' => $projectPageContent->content_data])
                                            @break
                                        
                                        @case('filter_buttons')
                                            @include('admin.project-page-content.previews.filter-buttons', ['data' => $projectPageContent->content_data])
                                            @break
                                        
                                        @case('project_types')
                                            @include('admin.project-page-content.previews.project-types', ['data' => $projectPageContent->content_data])
                                            @break
                                        
                                        @case('process_steps')
                                            @include('admin.project-page-content.previews.process-steps', ['data' => $projectPageContent->content_data])
                                            @break
                                        
                                        @case('cta_section')
                                            @include('admin.project-page-content.previews.cta-section', ['data' => $projectPageContent->content_data])
                                            @break
                                        
                                        @default
                                            <p class="text-muted">Preview not available for this section type.</p>
                                    @endswitch
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <button type="button" class="btn btn-warning" 
                                            onclick="toggleStatus({{ $projectPageContent->id }})">
                                        <i class="fas fa-toggle-{{ $projectPageContent->is_active ? 'on' : 'off' }}"></i>
                                        {{ $projectPageContent->is_active ? 'Deactivate' : 'Activate' }}
                                    </button>
                                </div>
                                <div>
                                    <button type="button" class="btn btn-danger" 
                                            onclick="deleteContent({{ $projectPageContent->id }})">
                                        <i class="fas fa-trash"></i> Delete Content
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this content? This action cannot be undone.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" onclick="confirmDelete()">Delete</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
let contentToDelete = null;

function deleteContent(id) {
    contentToDelete = id;
    let modal = new bootstrap.Modal(document.getElementById('deleteModal'));
    modal.show();
}

function confirmDelete() {
    if (contentToDelete) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = `/admin/project-page-content/${contentToDelete}`;
        form.innerHTML = `
            @csrf
            @method('DELETE')
        `;
        document.body.appendChild(form);
        form.submit();
    }
}

function toggleStatus(id) {
    fetch(`/admin/project-page-content/${id}/toggle-status`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json',
        }
    })
    .then(response => response.json())
    .then(data => {
        location.reload();
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred while updating the status.');
    });
}
</script>
@endpush
