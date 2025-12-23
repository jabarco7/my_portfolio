// Modal functionality for certificates page
document.addEventListener('DOMContentLoaded', function() {
    const certificateModal = document.getElementById('certificate-modal');
    const certificateModalContent = document.getElementById('certificate-modal-content');

    // Function to show certificate modal
    window.showCertificateModal = function(certificateId) {
        // In a real application, you would fetch certificate details from an API
        // For this example, we'll use mock data
        const certificate = {
            id: certificateId,
            title: 'Certificate Title',
            issuer: 'Certificate Authority',
            issue_date: '2023-01-15',
            expiry_date: '2025-01-15',
            credential_id: 'CERT-2023-001',
            description: 'This certificate demonstrates expertise in the specified field and represents hours of study and practical application.',
            verification_url: 'https://verify.certificate.example.com',
            is_featured: true,
            category: {
                name: 'Web Development',
                color: 'from-blue-500 to-indigo-600'
            }
        };

        // Create modal content
        const modalContent = `
            <div class="space-y-6">
                <!-- Certificate Header -->
                <div class="rounded-2xl overflow-hidden bg-gradient-to-br from-amber-50 to-amber-100 dark:from-amber-900/20 dark:to-amber-800/20 p-8">
                    <div class="text-center mb-6">
                        <div class="w-20 h-20 mx-auto mb-4 rounded-full bg-gradient-to-br from-amber-400 to-amber-600 flex items-center justify-center">
                            <i class="fas fa-award text-white text-3xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-base-content mb-2">${certificate.title}</h3>
                        <p class="text-base-content/70">Issued by: ${certificate.issuer}</p>
                    </div>

                    <!-- Certificate Details -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="text-center">
                            <div class="text-sm text-base-content/60 mb-1">Date Issued</div>
                            <div class="font-semibold text-base-content">${new Date(certificate.issue_date).toLocaleDateString('en-US', { month: 'long', year: 'numeric' })}</div>
                        </div>
                        <div class="text-center">
                            <div class="text-sm text-base-content/60 mb-1">Expiry Date</div>
                            <div class="font-semibold text-base-content">${new Date(certificate.expiry_date).toLocaleDateString('en-US', { month: 'long', year: 'numeric' })}</div>
                        </div>
                    </div>

                    <!-- Verification Badge -->
                    <div class="text-center mt-6">
                        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400 text-sm">
                            <i class="fas fa-shield-check"></i>
                            <span>Verified Credential</span>
                        </div>
                    </div>
                </div>

                <!-- Certificate Information -->
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="space-y-4">
                        <div>
                            <div class="text-sm text-base-content/60 mb-2">Credential ID</div>
                            <div class="font-semibold text-base-content">${certificate.credential_id}</div>
                        </div>
                        <div>
                            <div class="text-sm text-base-content/60 mb-2">Category</div>
                            <div>
                                <span class="inline-flex items-center px-3 py-1 rounded-full bg-primary/10 text-primary">
                                    ${certificate.category.name}
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <div class="text-sm text-base-content/60 mb-2">Verification</div>
                            <div class="flex flex-col gap-2">
                                ${certificate.verification_url ? `
                                    <a href="${certificate.verification_url}" target="_blank" class="inline-flex items-center gap-2 px-4 py-3 bg-primary/10 text-primary rounded-lg hover:bg-primary/20 transition-all duration-300">
                                        <i class="fas fa-external-link-alt"></i>
                                        <span>Verify Certificate</span>
                                    </a>
                                ` : ''}
                            </div>
                        </div>

                        <div>
                            <div class="text-sm text-base-content/60 mb-2">Status</div>
                            <div class="flex items-center gap-2">
                                <i class="fas fa-check-circle text-green-500"></i>
                                <span class="font-semibold text-base-content">Valid</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Certificate Description -->
                <div>
                    <h5 class="text-lg font-bold text-base-content mb-4">Certificate Overview</h5>
                    <div class="prose prose-primary max-w-none">
                        <p class="text-base-content/70">
                            ${certificate.description || 'This certificate demonstrates expertise in the specified field and represents hours of study and practical application.'}
                        </p>
                    </div>
                </div>

                <!-- Key Skills -->
                <div>
                    <h5 class="text-lg font-bold text-base-content mb-4">Skills Validated</h5>
                    <ul class="grid md:grid-cols-2 gap-3">
                        ${['Technical Knowledge', 'Practical Application', 'Industry Standards', 'Best Practices', 'Problem Solving', 'Professional Development'].map(skill => `
                            <li class="flex items-center gap-3">
                                <i class="fas fa-check-circle text-green-500"></i>
                                <span class="text-base-content/70">${skill}</span>
                            </li>
                        `).join('')}
                    </ul>
                </div>
            </div>
        `;

        certificateModalContent.innerHTML = modalContent;
        certificateModal.classList.add('show');
    };

    // Function to hide certificate modal
    window.hideCertificateModal = function() {
        certificateModal.classList.remove('show');
    };

    // Add click event to certificate cards
    certificateCards.forEach(card => {
        card.addEventListener('click', function() {
            const certificateId = this.getAttribute('data-certificate-id');
            if (certificateId) {
                showCertificateModal(certificateId);
            }
        });
    });
});