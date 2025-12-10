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
                
                // Simulate form submission (in a real app, this would be an AJAX call)
                setTimeout(() => {
                    // Show success message
                    formSuccess.classList.remove('hidden');
                    formError.classList.add('hidden');
                    
                    // Reset form
                    contactForm.reset();
                    
                    // Reset button
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                    
                    // Hide success message after 5 seconds
                    setTimeout(() => {
                        formSuccess.classList.add('hidden');
                    }, 5000);
                    
                    // Scroll to success message
                    formSuccess.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                    
                }, 1500);
            });
            
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
