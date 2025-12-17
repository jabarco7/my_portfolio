<div class="row">
    @if(is_array($data))
        @foreach($data as $step)
            <div class="col-md-6 mb-3">
                <div class="d-flex">
                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" 
                         style="width: 40px; height: 40px; font-weight: bold; font-size: 0.9rem;">
                        {{ $step['step'] ?? $loop->iteration }}
                    </div>
                    <div class="flex-grow-1">
                        <h6 class="mb-1">{{ $step['title'] ?? 'Unknown' }}</h6>
                        <p class="text-sm text-muted mb-1">{{ Str::limit($step['description'] ?? '', 100) }}</p>
                        <small class="text-muted">
                            <i class="{{ $step['icon'] ?? 'fas fa-arrow-right' }}"></i>
                        </small>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="col-12">
            <p class="text-muted">No process steps configured.</p>
        </div>
    @endif
</div>
