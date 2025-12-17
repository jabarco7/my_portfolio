<div class="row">
    @if(is_array($data))
        @foreach($data as $type)
            <div class="col-md-4 mb-3">
                <div class="border rounded p-3 bg-white h-100">
                    <div class="d-flex align-items-center mb-2">
                        <div class="bg-primary text-white rounded p-2 me-3" style="font-size: 1.2rem;">
                            <i class="{{ $type['icon'] ?? 'fas fa-cube' }}"></i>
                        </div>
                        <div>
                            <h6 class="mb-0">{{ $type['title'] ?? 'Unknown' }}</h6>
                            <small class="text-muted">{{ $type['count'] ?? '' }}</small>
                        </div>
                    </div>
                    <p class="text-sm text-muted mb-0">{{ Str::limit($type['description'] ?? '', 80) }}</p>
                </div>
            </div>
        @endforeach
    @else
        <div class="col-12">
            <p class="text-muted">No project types configured.</p>
        </div>
    @endif
</div>
