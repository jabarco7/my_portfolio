@extends('admin.layouts.app')

@section('title', 'About Page Content Management')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="d-lg-flex">
                            <div>
                                <h6 class="mb-0">About Page Content Management</h6>
                                <p class="text-sm mb-0">
                                    Manage dynamic content for the about page including hero section, social media, skills,
                                    experience, education, and call-to-action sections.
                                </p>
                            </div>
                            <div class="ms-auto my-auto mt-lg-0 mt-4">
                                <div class="ms-auto my-auto">
                                    <a href="{{ route('admin.about.create') }}" class="btn bg-gradient-primary btn-sm mb-0">
                                        <i class="fas fa-plus"></i>&nbsp;&nbsp;Add New Section
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-0">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <span class="alert-text">{{ session('success') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="alert-text">{{ session('error') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Section Type</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Status</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Order</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Created</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($contents as $content)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">
                                                            {{ ucfirst(str_replace('_', ' ', $content->section_type)) }}
                                                        </h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span
                                                    class="badge badge-sm {{ $content->is_active ? 'bg-gradient-success' : 'bg-gradient-secondary' }}">
                                                    {{ $content->is_active ? 'Active' : 'Inactive' }}
                                                </span>
                                            </td>
                                            <td>
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $content->order }}</span>
                                            </td>
                                            <td>
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $content->created_at->format('M d, Y') }}</span>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ route('admin.about.show', $content->id) }}"
                                                        class="btn btn-link text-dark px-3 mb-0" title="View">
                                                        <i class="fas fa-eye text-dark me-2"></i>
                                                    </a>
                                                    <a href="{{ route('admin.about.edit', $content->id) }}"
                                                        class="btn btn-link text-dark px-3 mb-0" title="Edit">
                                                        <i class="fas fa-pencil-alt text-dark me-2"></i>
                                                    </a>
                                                    <button type="button" class="btn btn-link text-dark px-3 mb-0"
                                                        onclick="toggleStatus({{ $content->id }})"
                                                        title="{{ $content->is_active ? 'Deactivate' : 'Activate' }}">
                                                        <i
                                                            class="fas fa-{{ $content->is_active ? 'pause' : 'play' }} text-dark me-2"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-link text-danger px-3 mb-0"
                                                        onclick="deleteContent({{ $content->id }})" title="Delete">
                                                        <i class="fas fa-trash text-danger me-2"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center py-4">
                                                <div class="d-flex flex-column align-items-center">
                                                    <i class="fas fa-user fa-3x text-secondary mb-3"></i>
                                                    <h6 class="text-secondary">No about page content yet</h6>
                                                    <p class="text-sm text-secondary mb-3">Create your first about page
                                                        section to get started</p>
                                                    <a href="{{ route('admin.about.create') }}"
                                                        class="btn bg-gradient-primary">
                                                        <i class="fas fa-plus me-2"></i>Add First Section
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        @if ($contents->hasPages())
                            <div class="d-flex justify-content-center mt-4">
                                {{ $contents->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this about page section? This action cannot be undone.
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
                form.action = `/admin/about/${contentToDelete}`;
                form.innerHTML = `
            @csrf
            @method('DELETE')
        `;
                document.body.appendChild(form);
                form.submit();
            }
        }

        function toggleStatus(id) {
            fetch(`/admin/about/${id}/toggle-status`, {
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
