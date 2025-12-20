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

        <h3 class="text-lg font-medium mb-4 text-gray-900 dark:text-white flex items-center">
            <i class="fas fa-lock mr-2"></i> Change Password
        </h3>
        <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
            <i class="fas fa-info-circle mr-1"></i>
            Leave blank if you don't want to change your password
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label for="current_password" class="form-label flex items-center">
                    <i class="fas fa-key mr-1"></i> Current Password
                </label>
                <input type="password" id="current_password" name="current_password" class="form-input" placeholder="Enter your current password">
                @error('current_password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label for="password" class="form-label flex items-center">
                    <i class="fas fa-lock mr-1"></i> New Password
                </label>
                <input type="password" id="password" name="password" class="form-input" placeholder="Enter your new password">
                @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password_confirmation" class="form-label flex items-center">
                    <i class="fas fa-lock mr-1"></i> Confirm New Password
                </label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-input" placeholder="Confirm your new password">
                @error('password_confirmation')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-4 mb-6">
            <div class="flex">
                <div class="flex-shrink-0">
                    <i class="fas fa-info-circle text-blue-400"></i>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-blue-800 dark:text-blue-200">Password Requirements</h3>
                    <div class="mt-2 text-sm text-blue-700 dark:text-blue-300">
                        <ul class="list-disc list-inside space-y-1">
                            <li>At least 8 characters long</li>
                            <li>Include both uppercase and lowercase letters</li>
                            <li>Include at least one number</li>
                            <li>Include at least one special character</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Save Changes
            </button>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Password strength indicator
    const passwordInput = document.getElementById('password');
    const passwordConfirmation = document.getElementById('password_confirmation');
    const currentPassword = document.getElementById('current_password');

    if (passwordInput) {
        passwordInput.addEventListener('input', function() {
            const password = this.value;
            const strengthIndicator = document.getElementById('password-strength');

            if (!strengthIndicator && password.length > 0) {
                const indicator = document.createElement('div');
                indicator.id = 'password-strength';
                indicator.className = 'mt-2';
                this.parentElement.after(indicator);
            }

            if (password.length > 0) {
                const strength = calculatePasswordStrength(password);
                const indicator = document.getElementById('password-strength');
                indicator.innerHTML = getPasswordStrengthHTML(strength);
            }
        });
    }

    // Check if passwords match
    if (passwordConfirmation) {
        passwordConfirmation.addEventListener('input', function() {
            const password = passwordInput.value;
            const confirmation = this.value;

            if (confirmation.length > 0) {
                const matchIndicator = document.getElementById('password-match');

                if (!matchIndicator) {
                    const indicator = document.createElement('div');
                    indicator.id = 'password-match';
                    indicator.className = 'mt-2 text-sm';
                    this.parentElement.after(indicator);
                }

                const matchIndicator = document.getElementById('password-match');
                if (password === confirmation) {
                    matchIndicator.innerHTML = '<i class="fas fa-check-circle text-green-500"></i> Passwords match';
                    matchIndicator.className = 'mt-2 text-sm text-green-600';
                } else {
                    matchIndicator.innerHTML = '<i class="fas fa-times-circle text-red-500"></i> Passwords do not match';
                    matchIndicator.className = 'mt-2 text-sm text-red-600';
                }
            }
        });
    }

    // Enable/disable submit button based on password fields
    const form = document.querySelector('form');
    if (form) {
        form.addEventListener('submit', function(e) {
            // If password is entered but current password is empty, show error
            if (passwordInput.value.length > 0 && currentPassword.value.length === 0) {
                e.preventDefault();
                alert('Please enter your current password to change your password.');
                currentPassword.focus();
                return false;
            }

            // If password is entered but confirmation doesn't match, show error
            if (passwordInput.value.length > 0 && passwordInput.value !== passwordConfirmation.value) {
                e.preventDefault();
                alert('New password and confirmation do not match.');
                passwordConfirmation.focus();
                return false;
            }
        });
    }
});

function calculatePasswordStrength(password) {
    let strength = 0;

    // Length check
    if (password.length >= 8) strength++;
    if (password.length >= 12) strength++;

    // Character variety checks
    if (/[a-z]/.test(password)) strength++; // lowercase
    if (/[A-Z]/.test(password)) strength++; // uppercase
    if (/[0-9]/.test(password)) strength++; // numbers
    if (/[^a-zA-Z0-9]/.test(password)) strength++; // special chars

    // Return strength as a number between 0-5
    return Math.min(strength, 5);
}

function getPasswordStrengthHTML(strength) {
    const strengthLabels = ['Very Weak', 'Weak', 'Fair', 'Good', 'Strong', 'Very Strong'];
    const strengthColors = ['text-red-600', 'text-red-500', 'text-yellow-600', 'text-blue-600', 'text-green-600', 'text-green-500'];

    let html = '<div class="mt-2">';
    html += '<div class="flex items-center justify-between">';
    html += '<span class="text-sm ' + strengthColors[strength] + '">Password Strength: ' + strengthLabels[strength] + '</span>';
    html += '</div>';

    // Strength bar
    html += '<div class="w-full bg-gray-200 rounded-full h-2 mt-1">';
    html += '<div class="h-2 rounded-full ' + getStrengthBarColor(strength) + '" style="width: ' + (strength * 20) + '%"></div>';
    html += '</div>';

    html += '</div>';

    return html;
}

function getStrengthBarColor(strength) {
    if (strength <= 1) return 'bg-red-500';
    if (strength <= 2) return 'bg-orange-500';
    if (strength <= 3) return 'bg-yellow-500';
    if (strength <= 4) return 'bg-blue-500';
    return 'bg-green-500';
}
</script>
@endsection
