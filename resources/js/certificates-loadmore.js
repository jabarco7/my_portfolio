
document.addEventListener('DOMContentLoaded', function() {
    // Load more certificates
    const loadMoreBtn = document.getElementById('load-more-certificates');
    const certificatesContainer = document.getElementById('certificates-container');
    let currentOffset = 10;
    let currentCategory = 'all';

    if (loadMoreBtn) {
        loadMoreBtn.addEventListener('click', () => {
            // Show loading state
            loadMoreBtn.innerHTML = `
                <i class="fas fa-spinner fa-spin"></i>
                <span>Loading...</span>
            `;
            loadMoreBtn.disabled = true;

            // Get the currently active filter category
            const activeFilterBtn = document.querySelector('.certificate-filter-btn.active');
            if (activeFilterBtn) {
                currentCategory = activeFilterBtn.getAttribute('data-filter');
            }

            // Fetch more certificates from the server
            fetch(`/certificates/load-more?offset=${currentOffset}&category=${currentCategory}`)
                .then(response => response.json())
                .then(data => {

                if (data.certificates.length > 0) {
                    // Create and append new certificate cards
                    data.certificates.forEach(certificate => {
                        const card = createCertificateCard(certificate);
                        certificatesContainer.appendChild(card);
                    });

                    // Update offset for next load
                    currentOffset += 10;

                    // Initialize new cards as visible
                    setTimeout(() => {
                        const newCards = certificatesContainer.querySelectorAll('.certificate-card:not(.visible)');
                        newCards.forEach(card => {
                            card.classList.add('visible');
                        });
                    }, 100);
                }

                // Hide button if no more certificates
                if (!data.hasMore) {
                    loadMoreBtn.style.display = 'none';
                } else {
                    // Reset button state
                    loadMoreBtn.innerHTML = `
                        <i class="fas fa-sync-alt"></i>
                        <span>Load More Certificates</span>
                    `;
                    loadMoreBtn.disabled = false;
                }
                })
                .catch(error => {
                    console.error('Error loading certificates:', error);
                    // Reset button state on error
                    loadMoreBtn.innerHTML = `
                        <i class="fas fa-sync-alt"></i>
                        <span>Load More Certificates</span>
                    `;
                    loadMoreBtn.disabled = false;
                    alert('Failed to load more certificates. Please try again.');
                });
        });
    }

    // Function to create a certificate card HTML element
    function createCertificateCard(certificate) {
        const card = document.createElement('div');
        card.className = 'certificate-card group';
        card.setAttribute('data-category', certificate.category ? certificate.category.slug : 'general');
        card.setAttribute('data-title', certificate.title.toLowerCase());
        card.setAttribute('data-issuer', (certificate.issuer || '').toLowerCase());

        // Determine background style
        let bgClass = '';
        let style = '';
        const categoryColor = certificate.category ? certificate.category.color : null;

        if (!certificate.category) {
            bgClass = 'bg-gradient-to-br from-gray-500 to-gray-600';
        } else if (!categoryColor) {
            bgClass = 'bg-gradient-to-br from-blue-500 to-indigo-600';
        } else if (categoryColor.startsWith('#') || categoryColor.startsWith('rgb') || categoryColor.startsWith('hsl')) {
            style = `background: linear-gradient(135deg, ${categoryColor}, ${categoryColor})`;
        } else if (categoryColor.includes('gradient')) {
            style = `background: ${categoryColor}`;
        } else if (categoryColor.startsWith('bg-') || categoryColor.startsWith('from-')) {
            if (categoryColor.startsWith('from-')) {
                bgClass = 'bg-gradient-to-br ' + categoryColor;
            } else {
                bgClass = categoryColor;
            }
        } else {
            style = `background: linear-gradient(135deg, ${categoryColor}, ${categoryColor})`;
        }

        // Format date
        const dateObj = new Date(certificate.date);
        const formattedDate = dateObj.toLocaleDateString('en-US', { month: 'short', year: 'numeric' });

        // Build card HTML
        card.innerHTML = `
            <div class="bg-base-100 rounded-2xl border border-base-300 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 overflow-hidden h-full flex flex-col">
                <div class="relative p-6 ${bgClass} text-white" style="${style}">
                    <div class="absolute top-4 right-4">
                        <div class="w-12 h-12 rounded-full bg-white/20 flex items-center justify-center">
                            <i class="fas fa-certificate text-2xl"></i>
                        </div>
                    </div>
                    <div class="pr-12">
                        <div class="text-sm font-medium opacity-90 mb-2">${certificate.issuer || 'Certificate Issuer'}</div>
                        <h3 class="text-xl font-bold">${certificate.title}</h3>
                    </div>
                </div>

                <div class="p-6 flex-grow">
                    <div class="space-y-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <div class="text-sm text-base-content/60 mb-1">Date Issued</div>
                                <div class="font-semibold text-base-content">${formattedDate}</div>
                            </div>
                            <div>
                                <div class="text-sm text-base-content/60 mb-1">Credential ID</div>
                                <div class="font-semibold text-base-content font-mono text-sm">#${certificate.id}</div>
                            </div>
                        </div>

                        ${certificate.score ? `
                        <div>
                            <div class="text-sm text-base-content/60 mb-1">Score / Level</div>
                            <div class="font-semibold text-base-content">${certificate.score}</div>
                        </div>
                        ` : ''}

                        ${certificate.description ? `
                        <div>
                            <div class="text-sm text-base-content/60 mb-1">Description</div>
                            <div class="text-sm text-base-content/70 line-clamp-3">${certificate.description.substring(0, 100)}${certificate.description.length > 100 ? '...' : ''}</div>
                        </div>
                        ` : ''}

                        <div class="pt-4 border-t border-base-300">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <div class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></div>
                                    <span class="text-sm text-green-600 dark:text-green-400">Verified</span>
                                </div>
                                <span class="text-xs px-3 py-1 rounded-full bg-base-200 text-base-content/70">
                                    ${certificate.category ? certificate.category.name.charAt(0).toUpperCase() + certificate.category.name.slice(1) : 'General'}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-6 pt-0">
                    <div class="flex gap-3">
                        ${certificate.certificate_url ? `
                        <a href="${certificate.certificate_url}" target="_blank" class="group/view flex-1 inline-flex items-center justify-center gap-2 px-4 py-3 bg-primary/10 text-primary font-medium rounded-lg hover:bg-primary/20 transition-all duration-300">
                            <i class="fas fa-external-link-alt"></i>
                            <span>View Credential</span>
                        </a>
                        ` : `
                        <a href="/certificate/${certificate.id}" class="group/view flex-1 inline-flex items-center justify-center gap-2 px-4 py-3 bg-primary/10 text-primary font-medium rounded-lg hover:bg-primary/20 transition-all duration-300">
                            <i class="fas fa-info-circle"></i>
                            <span>View Details</span>
                        </a>
                        `}
                    </div>
                </div>
            </div>
        `;

        return card;
    }
});
