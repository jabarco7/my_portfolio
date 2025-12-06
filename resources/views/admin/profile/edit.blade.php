@extends('admin.layouts.app')

@section('title', 'Profile Settings')

@section('content')
<div class="card rounded-lg shadow p-6">
    <h2 class="text-xl font-semibold mb-6 text-gray-900 dark:text-white">Profile Information</h2>

    <form action="{{ route('admin.profile.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-6">
            <label for="name" class="form-label">Name</label>
            <input type="text" id="name" name="name" value="{{ $admin->name }}" class="form-input" required>
        </div>

        <hr class="my-6 border-gray-200 dark:border-gray-700">

        <h3 class="text-lg font-medium mb-4 text-gray-900 dark:text-white">Change Password</h3>
        <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">Leave blank if you don't want to change your password</p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label for="current_password" class="form-label">Current Password</label>
                <input type="password" id="current_password" name="current_password" class="form-input">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label for="password" class="form-label">New Password</label>
                <input type="password" id="password" name="password" class="form-input">
            </div>

            <div>
                <label for="password_confirmation" class="form-label">Confirm New Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-input">
            </div>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Save Changes
            </button>
        </div>
    </form>
</div>
@endsection
