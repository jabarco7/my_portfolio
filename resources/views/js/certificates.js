
// Certificates page JavaScript
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

    // Certificate modal functionality
    const modalTriggers = document.querySelectorAll('.modal-trigger');
    const modal = document.getElementById('certificate-modal');
    const modalClose = document.querySelector('.modal-close');

    // Function to show certificate modal
    function showCertificateModal(certificateId) {
        // Get certificate data (in a real app, this would be fetched from an API)
        const certificate = getCertificateById(certificateId);

        if (!certificate) return;

        // Update modal content
        const modalContent = document.querySelector('.modal-content');
        modalContent.innerHTML = `
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Certificate Image -->
                <div class="lg:w-1/2">
                    <img src="${certificate.image || '/images/certificate-placeholder.jpg'}" 
                         alt="${certificate.title}" 
                         class="w-full h-auto rounded-xl shadow-lg">
                </div>

                <!-- Certificate Details -->
                <div class="lg:w-1/2 space-y-6">
                    <!-- Certificate Title and Issuer -->
                    <div>
                        <h3 class="text-2xl font-bold text-base-content mb-2">${certificate.title}</h3>
                        <div class="flex items-center gap-2">
                            <span class="text-sm text-base-content/60">Issued by:</span>
                            <span class="font-semibold text-base-content">${certificate.issuer || 'Unknown'}</span>
                        </div>
                    </div>

                    <!-- Certificate Description -->
                    <div>
                        <h5 class="text-lg font-bold text-base-content mb-4">Certificate Overview</h5>
                        <div class="prose prose-primary max-w-none">
                            <p class="text-base-content/70">
                                ${certificate.description || 'This certificate demonstrates expertise and knowledge in the field. It includes comprehensive training and validation of skills.'}
                            </p>
                        </div>
                    </div>

                    <!-- Certificate Details -->
                    <div>
                        <h5 class="text-lg font-bold text-base-content mb-4">Certificate Details</h5>
                        <ul class="space-y-2">
                            <li class="flex items-center gap-3">
                                <i class="fas fa-calendar-alt text-primary"></i>
                                <span class="text-base-content/70">Issued: ${new Date(certificate.issue_date).toLocaleDateString()}</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <i class="fas fa-clock text-secondary"></i>
                                <span class="text-base-content/70">Valid until: ${certificate.expiry_date ? new Date(certificate.expiry_date).toLocaleDateString() : 'No expiry'}</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <i class="fas fa-certificate text-purple-500"></i>
                                <span class="text-base-content/70">Credential ID: ${certificate.credential_id || 'N/A'}</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Verify Button -->
                    <div>
                        <a href="${certificate.verify_url || '#'}" target="_blank" 
                           class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-primary-500 to-secondary-500 hover:from-primary-600 hover:to-secondary-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300">
                            <i class="fas fa-check-circle"></i>
                            <span>Verify Certificate</span>
                        </a>
                    </div>
                </div>
            </div>
        `;

        // Show modal
        modal.classList.add('show');
        document.body.style.overflow = 'hidden';
    }

    // Function to hide certificate modal
    function hideCertificateModal() {
        modal.classList.remove('show');
        document.body.style.overflow = 'auto';
    }

    // Mock function to get certificate data (in a real app, this would fetch from an API)
    function getCertificateById(certificateId) {
        // This would normally be an API call
        return {
            id: certificateId,
            title: 'Certificate ' + certificateId,
            description: 'Description for certificate ' + certificateId,
            issuer: 'Organization Name',
            issue_date: new Date().toISOString(),
            expiry_date: null,
            credential_id: 'CERT-' + certificateId,
            verify_url: '#'
        };
    }

    // Add click event to modal triggers
    modalTriggers.forEach(trigger => {
        trigger.addEventListener('click', function(e) {
            e.preventDefault();
            const certificateId = this.getAttribute('data-certificate-id');
            showCertificateModal(certificateId);
        });
    });

    // Close modal with close button
    if (modalClose) {
        modalClose.addEventListener('click', hideCertificateModal);
    }

    // Close modal with Escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            hideCertificateModal();
        }
    });

    // Share certificate functionality
    const shareButtons = document.querySelectorAll('.share-btn');
    shareButtons.forEach(button => {
        button.addEventListener('click', function() {
            const platform = this.getAttribute('data-platform');
            shareCertificate(platform);
        });
    });

    function shareCertificate(platform) {
        // Get current certificate details
        const certificateTitle = document.querySelector('.modal-content h3').textContent;
        const certificateUrl = window.location.href;

        let shareUrl = '';

        switch (platform) {
            case 'twitter':
                shareUrl = `https://twitter.com/intent/tweet?text=Check out my certificate: ${certificateTitle}&url=${certificateUrl}`;
                break;
            case 'linkedin':
                shareUrl = `https://www.linkedin.com/sharing/share-offsite/?url=${certificateUrl}`;
                break;
            case 'facebook':
                shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${certificateUrl}`;
                break;
            case 'copy':
                navigator.clipboard.writeText(certificateUrl).then(() => {
                    // Show success message
                    const toast = document.createElement('div');
                    toast.className = 'fixed bottom-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50';
                    toast.textContent = 'Link copied to clipboard!';
                    document.body.appendChild(toast);

                    setTimeout(() => {
                        toast.style.opacity = '0';
                        setTimeout(() => {
                            document.body.removeChild(toast);
                        }, 300);
                    }, 2000);
                });
                return;
        }

        if (shareUrl) {
            window.open(shareUrl, '_blank');
        }
    }
});
