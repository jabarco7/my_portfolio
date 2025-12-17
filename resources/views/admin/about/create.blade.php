@extends('admin.layouts.app')

@section('title', 'Add New About Page Section')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="d-lg-flex">
                            <div>
                                <h6 class="mb-0">Add New About Page Section</h6>
                                <p class="text-sm mb-0">
                                    Create a new section for the about page. Choose a section type and fill in the required
                                    content.
                                </p>
                            </div>
                            <div class="ms-auto my-auto mt-lg-0 mt-4">
                                <div class="ms-auto my-auto">
                                    <a href="{{ route('admin.about.index') }}"
                                        class="btn bg-gradient-secondary btn-sm mb-0">
                                        <i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Back to List
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.about.store') }}" method="POST" id="aboutForm">
                            @csrf

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="section_type" class="form-control-label">Section Type <span
                                                class="text-danger">*</span></label>
                                        <select name="section_type" id="section_type" class="form-control" required>
                                            <option value="">Select Section Type</option>
                                            @foreach (\App\Models\AboutPageContent::SECTION_TYPES as $key => $label)
                                                <option value="{{ $key }}"
                                                    {{ old('section_type') == $key ? 'selected' : '' }}>
                                                    {{ $label }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="is_active" class="form-control-label">Status</label>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="is_active" name="is_active"
                                                value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="is_active">Active</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="order" class="form-control-label">Order</label>
                                        <input type="number" name="order" id="order" class="form-control"
                                            value="{{ old('order', 0) }}" min="0">
                                    </div>
                                </div>
                            </div>

                            <div id="contentFields" class="mt-4">
                                <!-- Dynamic content fields will be loaded here based on section type -->
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn bg-gradient-primary">
                                        <i class="fas fa-save me-2"></i>Create Section
                                    </button>
                                    <a href="{{ route('admin.about.index') }}" class="btn btn-secondary">
                                        <i class="fas fa-times me-2"></i>Cancel
                                    </a>
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
        document.getElementById('section_type').addEventListener('change', function() {
            const sectionType = this.value;
            const contentFields = document.getElementById('contentFields');

            if (!sectionType) {
                contentFields.innerHTML = '';
                return;
            }

            // Load content fields based on section type
            fetch(`/admin/about/content-fields/${sectionType}`)
                .then(response => response.text())
                .then(html => {
                    contentFields.innerHTML = html;
                })
                .catch(error => {
                    console.error('Error loading content fields:', error);
                    contentFields.innerHTML =
                        '<div class="alert alert-danger">Error loading form fields. Please try again.</div>';
                });
        });
    </script>
@endpush
