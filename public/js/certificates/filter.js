// Filter functionality for certificates page
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.certificate-filter-btn');
    const certificateCards = document.querySelectorAll('.certificate-card');
    const searchInput = document.getElementById('certificate-search');

    console.log('Filter buttons found:', filterButtons.length);
    console.log('Certificate cards found:', certificateCards.length);

    // Filter functionality
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            const filter = this.getAttribute('data-filter');

            // Update active state
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');

            // Filter certificates
            certificateCards.forEach(card => {
                if (filter === 'all' || card.getAttribute('data-category') === filter) {
                    card.style.display = 'block';
                    setTimeout(() => card.classList.add('visible'), 10);
                } else {
                    card.classList.remove('visible');
                    setTimeout(() => card.style.display = 'none', 300);
                }
            });
        });
    });

    // Search functionality
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();

            certificateCards.forEach(card => {
                const title = card.getAttribute('data-title');
                const issuer = card.getAttribute('data-issuer');

                if (title.includes(searchTerm) || issuer.includes(searchTerm)) {
                    card.style.display = 'block';
                    setTimeout(() => card.classList.add('visible'), 10);
                } else {
                    card.classList.remove('visible');
                    setTimeout(() => card.style.display = 'none', 300);
                }
            });
        });
    }

    // Intersection Observer for animation
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, { threshold: 0.1 });

    certificateCards.forEach(card => {
        observer.observe(card);
    });
});