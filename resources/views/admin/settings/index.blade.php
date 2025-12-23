@extends('admin.layouts.app')

@section('title', 'Settings')

@section('content')
<div class="card rounded-lg shadow p-6">
    <h2 class="text-xl font-semibold mb-6 text-gray-900 dark:text-white">Contact Information Settings</h2>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <form action="{{ route('admin.settings.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label for="email" class="form-label">Email Address</label>
                <input type="email" id="email" name="email" value="{{ $contactInfo['email'] }}" class="form-input" required>
            </div>

            <div>
                <label for="phone" class="form-label">Phone Number</label>
                <input type="text" id="phone" name="phone" value="{{ $contactInfo['phone'] }}" class="form-input" required>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label for="location" class="form-label">Location</label>
                <input type="text" id="location" name="location" value="{{ $contactInfo['location'] }}" class="form-input" required>
            </div>

            <div>
                <label for="timezone" class="form-label">Timezone</label>
                <input type="text" id="timezone" name="timezone" value="{{ $contactInfo['timezone'] }}" class="form-input" required>
            </div>
        </div>

        <div class="mb-6">
            <label for="availability" class="form-label">Availability Status</label>
            <input type="text" id="availability" name="availability" value="{{ $contactInfo['availability'] }}" class="form-input">
        </div>

        <div class="flex justify-end">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Save Changes
            </button>
        </div>
    </form>
</div>
@endsection