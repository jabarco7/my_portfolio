
// Skills page JavaScript
document.addEventListener('DOMContentLoaded', function() {
    // Skills filtering
    const filterButtons = document.querySelectorAll('.skill-filter-btn');
    const skillCards = document.querySelectorAll('.skill-card');

    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            const filter = button.getAttribute('data-filter');

            // Update active filter button
            filterButtons.forEach(btn => {
                btn.classList.remove('active', 'bg-gradient-to-r', 'from-primary-500', 'to-secondary-500', 'text-white');
                btn.classList.add('bg-base-200', 'border', 'border-base-300', 'text-base-content');
            });

            button.classList.add('active', 'bg-gradient-to-r', 'from-primary-500', 'to-secondary-500', 'text-white');
            button.classList.remove('bg-base-200', 'border', 'border-base-300', 'text-base-content');

            // Filter skill cards
            skillCards.forEach(card => {
                const category = card.getAttribute('data-category');

                if (filter === 'all' || category === filter) {
                    card.style.display = 'block';
                    setTimeout(() => {
                        card.classList.add('visible');
                    }, 50);
                } else {
                    card.classList.remove('visible');
                    setTimeout(() => {
                        card.style.display = 'none';
                    }, 300);
                }
            });
        });
    });

    // Skill progress animation
    const skillBars = document.querySelectorAll('.skill-progress');

    const animateSkillBars = function() {
        skillBars.forEach(bar => {
            const position = bar.getBoundingClientRect();

            // If element is in viewport
            if (position.top < window.innerHeight && position.bottom >= 0 && !bar.classList.contains('animated')) {
                const width = bar.getAttribute('data-width') || '0';
                bar.style.width = width;
                bar.classList.add('animated');
            }
        });
    };

    // Run once on page load
    animateSkillBars();

    // Run on scroll
    window.addEventListener('scroll', animateSkillBars);

    // Smooth scrolling for anchor links
    const anchorLinks = document.querySelectorAll('a[href^="#"]');

    anchorLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const targetId = this.getAttribute('href');

            // Skip if it's just "#"
            if (targetId === '#') return;

            const targetElement = document.querySelector(targetId);

            if (targetElement) {
                e.preventDefault();

                // Calculate offset for fixed header
                const headerHeight = document.querySelector('header')?.offsetHeight || 0;
                const targetPosition = targetElement.offsetTop - headerHeight - 20;

                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
});
