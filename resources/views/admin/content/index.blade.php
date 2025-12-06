@extends('admin.layouts.app')

@section('title', 'Content Management')

@section('content')
<div class="card rounded-lg shadow p-6 mb-6">
    <h2 class="text-xl font-semibold mb-6 text-gray-900 dark:text-white">Hero Section</h2>

    <form action="{{ route('admin.content.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="hero_name" class="form-label">Your Name</label>
                <input type="text" id="hero_name" name="hero_name" value="{{ $homeContent['hero_name'] ?? '' }}" class="form-input" required>
            </div>

            <div>
                <label for="hero_title" class="form-label">Professional Title</label>
                <input type="text" id="hero_title" name="hero_title" value="{{ $homeContent['hero_title'] ?? '' }}" class="form-input" required>
            </div>
        </div>

        <div class="mt-6">
            <label for="hero_description" class="form-label">Description</label>
            <textarea id="hero_description" name="hero_description" rows="3" class="form-input" required>{{ $homeContent['hero_description'] ?? '' }}</textarea>
        </div>
</div>

<div class="card rounded-lg shadow p-6 mb-6">
    <h2 class="text-xl font-semibold mb-6 text-gray-900 dark:text-white">About Section</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label for="about_title" class="form-label">Section Title</label>
            <input type="text" id="about_title" name="about_title" value="{{ $homeContent['about_title'] ?? '' }}" class="form-input" required>
        </div>
    </div>

    <div class="mt-6">
        <label for="about_description" class="form-label">About Description</label>
        <textarea id="about_description" name="about_description" rows="4" class="form-input" required>{{ $homeContent['about_description'] ?? '' }}</textarea>
    </div>
</div>

<div class="card rounded-lg shadow p-6 mb-6">
    <h2 class="text-xl font-semibold mb-6 text-gray-900 dark:text-white">Services Section</h2>

    <div id="services-container">
        @forelse ($homeContent['services'] ?? [] as $index => $service)
            <div class="service-item border border-gray-200 dark:border-gray-700 rounded-lg p-4 mb-4">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white">Service {{ $index + 1 }}</h3>
                    <button type="button" class="remove-service text-red-500 hover:text-red-700">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="form-label">Service Title</label>
                        <input type="text" name="service_title[]" value="{{ $service['title'] ?? '' }}" class="form-input" required>
                    </div>

                    <div>
                        <label class="form-label">Service Description</label>
                        <input type="text" name="service_description[]" value="{{ $service['description'] ?? '' }}" class="form-input" required>
                    </div>
                </div>
            </div>
        @empty
            <div class="service-item border border-gray-200 dark:border-gray-700 rounded-lg p-4 mb-4">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white">Service 1</h3>
                    <button type="button" class="remove-service text-red-500 hover:text-red-700">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="form-label">Service Title</label>
                        <input type="text" name="service_title[]" value="Web Development" class="form-input" required>
                    </div>

                    <div>
                        <label class="form-label">Service Description</label>
                        <input type="text" name="service_description[]" value="Creating responsive, fast, and secure websites using the latest technologies and best practices." class="form-input" required>
                    </div>
                </div>
            </div>
        @endforelse
    </div>

    <button type="button" id="add-service" class="btn btn-secondary mt-4">
        <i class="fas fa-plus"></i> Add Service
    </button>
</div>

<div class="flex justify-end">
    <button type="submit" class="btn btn-primary">
        <i class="fas fa-save"></i> Save Changes
    </button>
</div>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add service functionality
        const addServiceBtn = document.getElementById('add-service');
        const servicesContainer = document.getElementById('services-container');
        let serviceCount = document.querySelectorAll('.service-item').length;

        addServiceBtn.addEventListener('click', function() {
            serviceCount++;

            const serviceItem = document.createElement('div');
            serviceItem.className = 'service-item border border-gray-200 dark:border-gray-700 rounded-lg p-4 mb-4';

            serviceItem.innerHTML = `
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white">Service ${serviceCount}</h3>
                    <button type="button" class="remove-service text-red-500 hover:text-red-700">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="form-label">Service Title</label>
                        <input type="text" name="service_title[]" class="form-input" required>
                    </div>

                    <div>
                        <label class="form-label">Service Description</label>
                        <input type="text" name="service_description[]" class="form-input" required>
                    </div>
                </div>
            `;

            servicesContainer.appendChild(serviceItem);

            // Add remove functionality
            serviceItem.querySelector('.remove-service').addEventListener('click', function() {
                serviceItem.remove();
            });
        });

        // Remove service functionality
        document.querySelectorAll('.remove-service').forEach(button => {
            button.addEventListener('click', function() {
                this.closest('.service-item').remove();
            });
        });
    });
</script>
@endsection
