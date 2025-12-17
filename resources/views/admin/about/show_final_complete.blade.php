
@extends('admin.layouts.app')

@section('title', 'View About Page Section')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="d-lg-flex">
                            <div>
                                <h6 class="mb-0">View About Page Section</h6>
                                <p class="text-sm mb-0">
                                    Details of about page section.
                                </p>
                            </div>
                            <div class="ms-auto my-auto mt-lg-0 mt-4">
                                <div class="ms-auto my-auto">
                                    <a href="{{ route('admin.about.edit', $content->id) }}"
                                        class="btn bg-gradient-warning btn-sm mb-0 me-2">
                                        <i class="fas fa-edit"></i>&nbsp;&nbsp;Edit
                                    </a>
                                    <a href="{{ route('admin.about.index') }}"
                                        class="btn bg-gradient-secondary btn-sm mb-0">
                                        <i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Back to List
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-control-label">Section Type</label>
                                    <div class="form-control-plaintext">
                                        {{ ucfirst(str_replace('_', ' ', $content->section_type)) }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label class="form-control-label">Status</label>
                                    <div class="form-control-plaintext">
                                        <span class="badge {{ $content->is_active ? 'bg-success' : 'bg-secondary' }}">
                                            {{ $content->is_active ? 'Active' : 'Inactive' }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label class="form-control-label">Order</label>
                                    <div class="form-control-plaintext">
                                        {{ $content->order }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-control-label">Created At</label>
                                    <div class="form-control-plaintext">
                                        {{ $content->created_at->format('M d, Y H:i') }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-control-label">Updated At</label>
                                    <div class="form-control-plaintext">
                                        {{ $content->updated_at->format('M d, Y H:i') }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <h6 class="mb-3">Section Content</h6>

                        @if($content->section_type === 'hero')
                            <!-- Hero Section Content -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="form-control-label">Badge Text</label>
                                        <div class="form-control-plaintext">
                                            {{ $content->content_data['badge_text'] ?? '' }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="form-control-label">Name</label>
                                        <div class="form-control-plaintext">
                                            {{ $content->content_data['name'] ?? '' }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="form-control-label">Heading Line 1</label>
                                        <div class="form-control-plaintext">
                                            {{ $content->content_data['heading_line1'] ?? '' }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="form-control-label">Heading Line 2</label>
                                        <div class="form-control-plaintext">
                                            {{ $content->content_data['heading_line2'] ?? '' }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <div class="form-group mb-3">
                                        <label class="form-control-label">Experience Years</label>
                                        <div class="form-control-plaintext">
                                            {{ $content->content_data['experience_years'] ?? '' }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-3">
                                        <label class="form-control-label">Projects Count</label>
                                        <div class="form-control-plaintext">
                                            {{ $content->content_data['projects_count'] ?? '' }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-3">
                                        <label class="form-control-label">Clients Count</label>
                                        <div class="form-control-plaintext">
                                            {{ $content->content_data['clients_count'] ?? '' }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-3">
                                        <label class="form-control-label">Satisfaction Rate</label>
                                        <div class="form-control-plaintext">
                                            {{ $content->content_data['satisfaction_rate'] ?? '' }}%
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label class="form-control-label">Profile Image</label>
                                        @if(!empty($content->content_data['profile_image']))
                                            <div class="mt-2">
                                                <img src="{{ asset($content->content_data['profile_image']) }}" alt="Profile Image" class="img-thumbnail" style="max-height: 200px;">
                                            </div>
                                        @else
                                            <div class="form-control-plaintext">No image set</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @elseif($content->section_type === 'skills')
                            <!-- Skills Section Content -->
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label class="form-control-label">Skills Title</label>
                                        <div class="form-control-plaintext">
                                            {{ $content->content_data['skills_title'] ?? 'Skills' }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label class="form-control-label">Frontend Skills</label>
                                        <div class="form-control-plaintext">
                                            @if(!empty($content->content_data['frontend_skills']))
                                                <ul class="list-unstyled">
                                                    @foreach($content->content_data['frontend_skills'] as $skill)
                                                        <li>{{ $skill }}</li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                <div class="form-control-plaintext">No frontend skills set</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label class="form-control-label">Backend Skills</label>
                                        <div class="form-control-plaintext">
                                            @if(!empty($content->content_data['backend_skills']))
                                                <ul class="list-unstyled">
                                                    @foreach($content->content_data['backend_skills'] as $skill)
                                                        <li>{{ $skill }}</li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                <div class="form-control-plaintext">No backend skills set</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label class="form-control-label">Tools & Technologies</label>
                                        <div class="form-control-plaintext">
                                            @if(!empty($content->content_data['tools_skills']))
                                                <ul class="list-unstyled">
                                                    @foreach($content->content_data['tools_skills'] as $skill)
                                                        <li>{{ $skill }}</li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                <div class="form-control-plaintext">No tools skills set</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif($content->section_type === 'experience')
                            <!-- Experience Section Content -->
                            @if(!empty($content->content_data['experience']))
                                @foreach($content->content_data['experience'] as $index => $exp)
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label class="form-control-label">Job Title</label>
                                                        <div class="form-control-plaintext">
                                                            {{ $exp['title'] ?? '' }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label class="form-control-label">Company</label>
                                                        <div class="form-control-plaintext">
                                                            {{ $exp['company'] ?? '' }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label class="form-control-label">Duration</label>
                                                        <div class="form-control-plaintext">
                                                            {{ $exp['year'] ?? '' }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <div class="form-group mb-3">
                                                        <label class="form-control-label">Description</label>
                                                        <div class="form-control-plaintext">
                                                            {{ $exp['description'] ?? '' }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="alert alert-info">No experience items set</div>
                            @endif
                        @elseif($content->section_type === 'education')
                            <!-- Education Section Content -->
                            @if(!empty($content->content_data['education']))
                                @foreach($content->content_data['education'] as $index => $edu)
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label class="form-control-label">Degree</label>
                                                        <div class="form-control-plaintext">
                                                            {{ $edu['title'] ?? '' }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label class="form-control-label">Institution</label>
                                                        <div class="form-control-plaintext">
                                                            {{ $edu['institution'] ?? '' }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label class="form-control-label">Duration</label>
                                                        <div class="form-control-plaintext">
                                                            {{ $edu['year'] ?? '' }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <div class="form-group mb-3">
                                                        <label class="form-control-label">Description</label>
                                                        <div class="form-control-plaintext">
                                                            {{ $edu['description'] ?? '' }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="alert alert-info">No education items set</div>
                            @endif
                        @elseif($content->section_type === 'cta')
                            <!-- CTA Section Content -->
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label class="form-control-label">CTA Heading</label>
                                        <div class="form-control-plaintext">
                                            {{ $content->content_data['cta_heading'] ?? '' }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label class="form-control-label">CTA Description</label>
                                        <div class="form-control-plaintext">
                                            {{ $content->content_data['cta_description'] ?? '' }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="form-control-label">Primary Button Text</label>
                                        <div class="form-control-plaintext">
                                            {{ $content->content_data['cta_button_text'] ?? '' }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="form-control-label">Primary Button URL</label>
                                        <div class="form-control-plaintext">
                                            {{ $content->content_data['cta_button_url'] ?? '' }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="form-control-label">Secondary Button Text</label>
                                        <div class="form-control-plaintext">
                                            {{ $content->content_data['cta_secondary_text'] ?? '' }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="form-control-label">Secondary Button URL</label>
                                        <div class="form-control-plaintext">
                                            {{ $content->content_data['cta_secondary_url'] ?? '' }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
