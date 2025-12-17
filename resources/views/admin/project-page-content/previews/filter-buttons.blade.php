<div class="mb-3">
    <div class="d-flex flex-wrap gap-2">
        @if(is_array($data))
            @foreach($data as $filter)
                <button class="btn btn-sm px-3 py-1 rounded-lg border" style="background-color: #e9ecef;">
                    {{ $filter['label'] ?? 'Unknown' }}
                </button>
            @endforeach
        @else
            <p class="text-muted">No filter buttons configured.</p>
        @endif
    </div>
</div>
