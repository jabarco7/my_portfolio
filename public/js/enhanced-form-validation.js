document.addEventListener('DOMContentLoaded', function() {
    // Enhanced form validation
    const contactForm = document.getElementById('contact-form');
    const submitBtn = document.getElementById('submit-btn');

    console.log('Form validation script loaded');

    // Hide all error messages on page load
    const errorElements = document.querySelectorAll('[id$="-error"]');
    console.log('Found error elements:', errorElements.length);

    errorElements.forEach(element => {
        element.classList.add('hidden');
        console.log('Hiding error element:', element.id);
    });

    if (contactForm) {
        console.log('Contact form found');

        // Add input event listeners for real-time validation
        const nameInput = document.getElementById('name');
        const emailInput = document.getElementById('email');
        const subjectSelect = document.getElementById('subject');
        const messageInput = document.getElementById('message');

        console.log('Form inputs found:', {
            name: !!nameInput,
            email: !!emailInput,
            subject: !!subjectSelect,
            message: !!messageInput
        });

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

        // Enhanced form submission validation
        contactForm.addEventListener('submit', function(e) {
            console.log('Form submission triggered');

            // Reset error states
            nameInput.classList.remove('border-red-500');
            emailInput.classList.remove('border-red-500');
            subjectSelect.classList.remove('border-red-500');
            messageInput.classList.remove('border-red-500');

            let isValid = true;

            // Validate name
            if (!nameInput.value.trim()) {
                validateField(nameInput, 'name-error', false, 'Name is required');
                isValid = false;
            }

            // Validate email
            const isValidEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailInput.value);
            if (!emailInput.value.trim() || !isValidEmail) {
                validateField(emailInput, 'email-error', false, 'Valid email is required');
                isValid = false;
            }

            // Validate subject
            if (!subjectSelect.value) {
                validateField(subjectSelect, 'subject-error', false, 'Please select a subject');
                isValid = false;
            }

            // Validate message
            if (!messageInput.value.trim()) {
                validateField(messageInput, 'message-error', false, 'Message is required');
                isValid = false;
            }

            if (!isValid) {
                e.preventDefault();

                // Scroll to the first error
                const firstError = document.querySelector('[id$="-error"]:not(.hidden)');
                if (firstError) {
                    firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }

                // Shake form to indicate errors
                contactForm.classList.add('animate-pulse');
                setTimeout(() => {
                    contactForm.classList.remove('animate-pulse');
                }, 1000);

                return false;
            }
        });
    }

    // Helper function to validate individual fields
    function validateField(field, errorElementId, isValid, errorMessage) {
        const errorElement = document.getElementById(errorElementId);

        console.log('Validating field:', field.id, 'Error element:', errorElementId, 'Valid:', isValid);

        if (isValid) {
            field.classList.remove('border-red-500');
            errorElement.classList.add('hidden');
            console.log('Field is valid, hiding error');
        } else {
            field.classList.add('border-red-500');
            errorElement.textContent = errorMessage;
            errorElement.classList.remove('hidden');
            console.log('Field is invalid, showing error:', errorMessage);
        }
    }
});
