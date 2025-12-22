document.addEventListener('DOMContentLoaded', function() {
    // Enhanced form validation
    const contactForm = document.getElementById('contact-form');

    // Hide all error messages on page load
    const errorElements = document.querySelectorAll('[id$="-error"]');
    errorElements.forEach(element => {
        element.classList.add('hidden');
    });

    if (contactForm) {
        // Add input event listeners for real-time validation
        const nameInput = document.getElementById('name');
        const emailInput = document.getElementById('email');
        const subjectSelect = document.getElementById('subject');
        const messageInput = document.getElementById('message');

        // Real-time validation for name
        nameInput.addEventListener('blur', function() {
            validateField(this, 'name-error', this.value.trim() !== '', 'Name is required');
        });

        // Real-time validation for email
        emailInput.addEventListener('blur', function() {
            const isValidEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(this.value);
            validateField(this, 'email-error', this.value.trim() !== '' && isValidEmail, 'Valid email is required');
        });

        // Real-time validation for subject
        subjectSelect.addEventListener('blur', function() {
            validateField(this, 'subject-error', this.value !== '', 'Please select a subject');
        });

        // Real-time validation for message
        messageInput.addEventListener('blur', function() {
            validateField(this, 'message-error', this.value.trim() !== '', 'Message is required');
        });

        // Clear error when user starts typing
        [nameInput, emailInput, messageInput].forEach(input => {
            input.addEventListener('input', function() {
                if (this.classList.contains('border-red-500')) {
                    this.classList.remove('border-red-500');
                    document.getElementById(this.id + '-error').classList.add('hidden');
                }
            });
        });

        subjectSelect.addEventListener('change', function() {
            if (this.classList.contains('border-red-500')) {
                this.classList.remove('border-red-500');
                document.getElementById('subject-error').classList.add('hidden');
            }
        });
    }

    // Helper function to validate individual fields
    function validateField(field, errorElementId, isValid, errorMessage) {
        const errorElement = document.getElementById(errorElementId);

        if (isValid) {
            field.classList.remove('border-red-500');
            errorElement.classList.add('hidden');
        } else {
            field.classList.add('border-red-500');
            errorElement.textContent = errorMessage;
            errorElement.classList.remove('hidden');
        }
    }
});
