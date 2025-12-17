<div class="row mb-3">
    <div class="col-md-4">
        <div class="text-center p-3 border rounded bg-white">
            <div class="text-2xl font-bold text-primary mb-2">{{ $data['projects_count'] ?? 'N/A' }}</div>
            <div class="text-sm text-gray-600">Projects</div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="text-center p-3 border rounded bg-white">
            <div class="text-2xl font-bold text-secondary mb-2">{{ $data['completed_projects'] ?? 'N/A' }}</div>
            <div class="text-sm text-gray-600">Completed</div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="text-center p-3 border rounded bg-white">
            <div class="text-2xl font-bold text-purple-500 mb-2">{{ $data['client_satisfaction'] ?? 'N/A' }}</div>
            <div class="text-sm text-gray-600">Client Satisfaction</div>
        </div>
    </div>
</div>
