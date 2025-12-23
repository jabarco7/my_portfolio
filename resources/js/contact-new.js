document.addEventListener('DOMContentLoaded', function() {
            // Update current time
            function updateCurrentTime() {
                const now = new Date();
                const options = {
                    timeZone: 'Asia/Riyadh',
                    hour12: true,
                    hour: '2-digit',
                    minute: '2-digit',
                    second: '2-digit'
                };
                const timeString = now.toLocaleTimeString('en-US', options);
                document.getElementById('current-time').textContent = timeString + ' AST';
            }

            // Update time immediately and every second
            updateCurrentTime();
            setInterval(updateCurrentTime, 1000);

            // FAQ Accordion
            const faqQuestions = document.querySelectorAll('.faq-question');

            faqQuestions.forEach(question => {
                question.addEventListener('click', () => {
                    const faqItem = question.closest('.faq-item');
                    const answer = faqItem.querySelector('.faq-answer');
                    const icon = question.querySelector('i');

                    // Close all other FAQ items
                    document.querySelectorAll('.faq-item').forEach(item => {
                        if (item !== faqItem) {
                            const otherAnswer = item.querySelector('.faq-answer');
                            const otherIcon = item.querySelector('.faq-question i');
                            otherAnswer.classList.remove('max-h-96');
                            otherAnswer.classList.add('max-h-0');
                            otherIcon.classList.remove('rotate-180');
                        }
                    });

                    // Toggle current FAQ item
                    if (answer.classList.contains('max-h-96')) {
                        answer.classList.remove('max-h-96');
                        answer.classList.add('max-h-0');
                        icon.classList.remove('rotate-180');
                    } else {
                        answer.classList.remove('max-h-0');
                        answer.classList.add('max-h-96');
                        icon.classList.add('rotate-180');
                    }
                });
            });

            // Contact Form Validation and Submission
            const contactForm = document.getElementById('contact-form');
            const submitBtn = document.getElementById('submit-btn');
            const formSuccess = document.getElementById('form-success');
            const formError = document.getElementById('form-error');

            contactForm.addEventListener('submit', function(e) {
                e.preventDefault();

                // Reset previous errors
                document.querySelectorAll('[id$="-error"]').forEach(el => {
                    el.classList.add('hidden');
                });

                // Basic validation
                let isValid = true;
                const name = document.getElementById('name');
                const email = document.getElementById('email');
                const message = document.getElementById('message');

                if (!name.value.trim()) {
                    document.getElementById('name-error').textContent = 'Name is required';
                    document.getElementById('name-error').classList.remove('hidden');
                    isValid = false;
                }

                if (!email.value.trim() || !isValidEmail(email.value)) {
                    document.getElementById('email-error').textContent = 'Valid email is required';
                    document.getElementById('email-error').classList.remove('hidden');
                    isValid = false;
                }

                if (!message.value.trim()) {
                    document.getElementById('message-error').textContent = 'Message is required';
                    document.getElementById('message-error').classList.remove('hidden');
                    isValid = false;
                }

                if (!isValid) return;

                // Disable submit button and show loading state
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = `
                    <i class="fas fa-spinner fa-spin"></i>
                    <span>Sending...</span>
                `;
                submitBtn.disabled = true;

                // Send AJAX request
                const subject = document.getElementById('subject');
                axios.post('/contact', {
                    name: name.value,
                    email: email.value,
                    subject: subject.value,
                    message: message.value
                })
                .then(response => {
                    // Show success message using Toast
                    showToast(response.data.message || 'Message sent successfully! I\'ll get back to you soon.', 'success');

                    // Reset form
                    contactForm.reset();
                })
                .catch(error => {
                    // Show error message
                    formError.classList.remove('hidden');
                    formSuccess.classList.add('hidden');

                    if (error.response && error.response.data && error.response.data.errors) {
                        // Display validation errors
                        const errors = error.response.data.errors;
                        if (errors.name) {
                            document.getElementById('name-error').textContent = errors.name[0];
                            document.getElementById('name-error').classList.remove('hidden');
                        }
                        if (errors.email) {
                            document.getElementById('email-error').textContent = errors.email[0];
                            document.getElementById('email-error').classList.remove('hidden');
                        }
                        if (errors.message) {
                            document.getElementById('message-error').textContent = errors.message[0];
                            document.getElementById('message-error').classList.remove('hidden');
                        }
                    } else {
                        formError.textContent = 'Something went wrong. Please try again later.';
                    }
                })
                .finally(() => {
                    // Reset button
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                });
            });

            // Toast notification function
            function showToast(message, type = 'success') {
                // Create toast container if it doesn't exist
                let toastContainer = document.getElementById('toast-container');
                if (!toastContainer) {
                    toastContainer = document.createElement('div');
                    toastContainer.id = 'toast-container';
                    toastContainer.className = 'fixed top-4 right-4 z-50 flex flex-col gap-2';
                    document.body.appendChild(toastContainer);
                }

                // Create toast element
                const toast = document.createElement('div');
                const bgColor = type === 'success' ? 'bg-green-500' : 'bg-red-500';
                const icon = type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle';

                toast.className = `${bgColor} text-white p-4 rounded-lg shadow-lg flex items-center gap-3 transform transition-all duration-300 translate-x-full`;
                toast.innerHTML = `
                    <i class="fas ${icon}"></i>
                    <span>${message}</span>
                `;

                // Add toast to container
                toastContainer.appendChild(toast);

                // Animate in
                setTimeout(() => {
                    toast.classList.remove('translate-x-full');
                }, 100);

                // Remove after 5 seconds
                setTimeout(() => {
                    toast.classList.add('translate-x-full');
                    setTimeout(() => {
                        toastContainer.removeChild(toast);
                    }, 300);
                }, 5000);
            }

            // Email validation helper
            function isValidEmail(email) {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return emailRegex.test(email);
            }

            // Smooth scroll for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    if (this.getAttribute('href') === '#') return;

                    e.preventDefault();
                    const targetId = this.getAttribute('href');
                    const targetElement = document.querySelector(targetId);

                    if (targetElement) {
                        window.scrollTo({
                            top: targetElement.offsetTop - 80,
                            behavior: 'smooth'
                        });
                    }
                });
            });

            // Animate elements on scroll
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-slide-up');
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            // Observe platform cards and FAQ items
            document.querySelectorAll('.platform-card, .contact-card').forEach(card => {
                observer.observe(card);
            });
        });