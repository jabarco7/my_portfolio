        document.addEventListener('DOMContentLoaded', function() {
            // Skills tabs functionality
            const tabButtons = document.querySelectorAll('.skills-tab');
            const tabContents = document.querySelectorAll('.skills-tab-content');
            
            tabButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const tabId = button.getAttribute('data-tab');
                    
                    // Update active tab button
                    tabButtons.forEach(btn => {
                        btn.classList.remove('active');
                        btn.classList.add('bg-base-200', 'border', 'border-base-300', 'text-base-content');
                        btn.classList.remove('bg-gradient-to-r', 'from-primary-500', 'to-secondary-500', 'text-white');
                    });
                    
                    button.classList.add('active', 'bg-gradient-to-r', 'from-primary-500', 'to-secondary-500', 'text-white');
                    button.classList.remove('bg-base-200', 'border', 'border-base-300', 'text-base-content');
                    
                    // Update active tab content
                    tabContents.forEach(content => {
                        content.classList.remove('active');
                        content.classList.add('hidden');
                    });
                    
                    const activeContent = document.getElementById(`${tabId}-tab`);
                    activeContent.classList.remove('hidden');
                    setTimeout(() => {
                        activeContent.classList.add('active');
                    }, 50);
                    
                    // Animate progress bars in the active tab
                    setTimeout(() => {
                        animateProgressBars(activeContent);
                    }, 300);
                });
            });
            
            // Animate progress bars on page load
            function animateProgressBars(container = document) {
                const progressBars = container.querySelectorAll('[data-width]');
                progressBars.forEach(bar => {
                    const width = bar.getAttribute('data-width');
                    bar.style.width = width;
                });
            }
            
            // Animate progress bars in the initial active tab
            animateProgressBars(document.querySelector('.skills-tab-content.active'));
            
            // Animate skill cards on scroll
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
            
            // Observe skill cards
            document.querySelectorAll('.skill-card').forEach(card => {
                observer.observe(card);
            });
        });
