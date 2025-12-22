
document.addEventListener('DOMContentLoaded', function() {
    // Certificate filtering
    const filterButtons = document.querySelectorAll('.certificate-filter-btn');
    const certificateCards = document.querySelectorAll('.certificate-card');

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

            // Filter certificate cards
            certificateCards.forEach(card => {
                card.style.display = 'none';
                card.classList.remove('visible');

                if (filter === 'all' || card.getAttribute('data-category') === filter) {
                    setTimeout(() => {
                        card.style.display = 'block';
                        setTimeout(() => {
                            card.classList.add('visible');
                        }, 50);
                    }, 50);
                }
            });

            // Hide no results message when filters are applied
            const noResults = document.getElementById('no-results');
            if (noResults && filter !== 'all') {
                noResults.classList.add('hidden');
            }
        });
    });

    // Enhanced search functionality
    const searchInput = document.getElementById('certificate-search');
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            let visibleCount = 0;

            certificateCards.forEach(card => {
                const title = card.dataset.title;
                const issuer = card.dataset.issuer;
                const category = card.dataset.category;

                if (title.includes(searchTerm) || issuer.includes(searchTerm) || category.includes(searchTerm)) {
                    card.style.display = 'block';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            // Show/hide no results message
            const noResults = document.getElementById('no-results');
            if (noResults) {
                if (visibleCount === 0) {
                    noResults.classList.remove('hidden');
                } else {
                    noResults.classList.add('hidden');
                }
            }
        });
    }

    // Enhanced share functionality
    const shareButtons = document.querySelectorAll('.certificate-share-btn');
    shareButtons.forEach(button => {
        button.addEventListener('click', function() {
            const certificateId = this.dataset.certificate;
            showShareModal(certificateId);
        });
    });


    // Certificate detail buttons
    const detailButtons = document.querySelectorAll('.certificate-detail-btn');
    const modal = document.getElementById('certificate-modal');
    const modalContent = document.getElementById('certificate-modal-content');

    detailButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Check if this button has certificate data for modal
            const certificateData = button.getAttribute('data-certificate');
            if (certificateData) {
                const certificate = JSON.parse(certificateData);
                showCertificateModal(certificate);
            } else {
                // Otherwise, navigate to certificate detail page
                const certificateId = button.getAttribute('data-certificate-id');
                if (certificateId) {
                    console.log('Navigating to certificate detail page:', certificateId);
                    window.location.href = `/certificate/${certificateId}`;
                } else {
                    console.error('No certificate ID found');
                    alert('Certificate details not available');
                }
            }
        });
    });


    // Add click event to certificate titles to navigate to detail page
    const certificateTitles = document.querySelectorAll('.certificate-card h3');
    certificateTitles.forEach(title => {
        title.style.cursor = 'pointer';
        title.addEventListener('click', () => {
            const certificateCard = title.closest('.certificate-card');
            const certificate = JSON.parse(certificateCard.querySelector('.certificate-detail-btn').getAttribute('data-certificate'));
            navigateToCertificateDetail(certificate.id);
        });
    });

    // Load more certificates functionality moved to certificates-loadmore.js
    // This file now handles the actual loading of more certificates via API

    // Initialize certificate cards as visible
    setTimeout(() => {
        certificateCards.forEach(card => {
            card.classList.add('visible');
        });
    }, 100);
});

function showCertificateModal(certificate) {
    const modal = document.getElementById('certificate-modal');
    const modalContent = document.getElementById('certificate-modal-content');

    // Create modal content
    modalContent.innerHTML = `
        <div class="space-y-6">
            <!-- Certificate Header -->
            <div class="bg-gradient-to-br ${certificate.color} rounded-2xl p-8 text-white">
                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 rounded-full bg-white/20 flex items-center justify-center">
                        <i class="${certificate.icon} text-3xl"></i>
                    </div>
                    <div>
                        <div class="text-sm font-medium opacity-90 mb-2">${certificate.issuer}</div>
                        <h4 class="text-2xl font-bold">${certificate.title}</h4>
                    </div>
                </div>
            </div>

            <!-- Certificate Details -->
            <div class="grid md:grid-cols-2 gap-6">
                <div class="space-y-4">
                    <div>
                        <div class="text-sm text-base-content/60 mb-2">Credential ID</div>
                        <div class="font-mono font-semibold text-base-content">${certificate.id}</div>
                    </div>
                    <div>
                        <div class="text-sm text-base-content/60 mb-2">Date Issued</div>
                        <div class="font-semibold text-base-content">${certificate.date}</div>
                    </div>
                    <div>
                        <div class="text-sm text-base-content/60 mb-2">Category</div>
                        <div>
                            <span class="inline-flex items-center px-3 py-1 rounded-full bg-base-200 text-base-content/70">
                                ${certificate.category.charAt(0).toUpperCase() + certificate.category.slice(1)}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="space-y-4">
                    <div>
                        <div class="text-sm text-base-content/60 mb-2">Verification Status</div>
                        <div class="flex items-center gap-2">
                            ${certificate.verified ?
                                '<div class="w-3 h-3 rounded-full bg-green-500 animate-pulse"></div><span class="text-green-600 dark:text-green-400 font-semibold">✓ Verified Credential</span>' :
                                '<div class="w-3 h-3 rounded-full bg-yellow-500"></div><span class="text-yellow-600 font-semibold">Pending Verification</span>'}
                        </div>
                    </div>
                    <div>
                        <div class="text-sm text-base-content/60 mb-2">Description</div>
                        <div class="text-base-content/80">${certificate.description}</div>
                    </div>
                </div>
            </div>
        </div>
    `;

    // Show modal
    modal.classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function hideCertificateModal() {
    const modal = document.getElementById('certificate-modal');
    if (modal) {
        modal.classList.add('hidden');
        document.body.style.overflow = '';
    }
}

function showShareModal(certificateId) {
    const modal = document.getElementById('share-modal');
    if (modal) {
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }
}

function hideShareModal() {
    const modal = document.getElementById('share-modal');
    if (modal) {
        modal.classList.add('hidden');
        document.body.style.overflow = '';
    }
}

function shareToSocial(platform) {
    const currentUrl = window.location.href;
    let shareUrl = '';

    switch(platform) {
        case 'twitter':
            shareUrl = `https://twitter.com/intent/tweet?url=${encodeURIComponent(currentUrl)}`;
            break;
        case 'linkedin':
            shareUrl = `https://www.linkedin.com/sharing/share-offsite/?url=${encodeURIComponent(currentUrl)}`;
            break;
    }

    if (shareUrl) {
        window.open(shareUrl, '_blank', 'width=600,height=400');
    }
    hideShareModal();
}

function copyCertificateLink() {
    const currentUrl = window.location.href;
    navigator.clipboard.writeText(currentUrl).then(() => {
        alert('Link copied to clipboard!');
    }).catch(err => {
        console.error('Failed to copy:', err);
    });
    hideShareModal();
}

function navigateToCertificateDetail(certificateId) {
    window.location.href = `/certificate/${certificateId}`;
}
