
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
            
            // Load more certificates functionality is now handled by certificates-loadmore.js
            // Load more certificates functionality is now handled by certificates-loadmore.js
                // Event listener moved to certificates-loadmore.js
                    // Simulate loading more certificates
                    // Loading state moved to certificates-loadmore.js
                    // Disabled state moved to certificates-loadmore.js
                    
                    // Timeout and API call moved to certificates-loadmore.js
                        // Load more certificates via certificates-loadmore.js
                        
                        // Button reset moved to certificates-loadmore.js
                    // Timeout duration moved to certificates-loadmore.js
             
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
                            
                            ${certificate.score ? `
                            <div>
                                <div class="text-sm text-base-content/60 mb-2">Score / Level</div>
                                <div class="font-semibold text-base-content">${certificate.score}</div>
                            </div>
                            ` : ''}
                            
                            <div>
                                <div class="text-sm text-base-content/60 mb-2">Actions</div>
                                <div class="flex gap-3">
                                    <a href="${certificate.credential_url}" target="_blank" class="flex-1 inline-flex items-center justify-center gap-2 px-4 py-3 bg-primary/10 text-primary font-medium rounded-lg hover:bg-primary/20 transition-all duration-300">
                                        <i class="fas fa-external-link-alt"></i>
                                        <span>View on Platform</span>
                                    </a>
                                    <button class="inline-flex items-center justify-center px-4 py-3 bg-base-200 rounded-lg hover:bg-base-300 transition-all duration-300">
                                        <i class="fas fa-download mr-2"></i>
                                        Download PDF
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Skills Gained -->
                    <div>
                        <h5 class="text-lg font-bold text-base-content mb-4">Skills & Competencies</h5>
                        <div class="flex flex-wrap gap-2">
                            ${getSkillsForCertificate(certificate.title).map(skill => `
                                <span class="px-3 py-1.5 rounded-lg bg-base-200 text-base-content text-sm">${skill}</span>
                            `).join('')}
                        </div>
                    </div>
                    
                    <!-- Description -->
                    <div>
                        <h5 class="text-lg font-bold text-base-content mb-4">Description</h5>
                        <p class="text-base-content/70">
                            This certification validates expertise in ${certificate.title.toLowerCase()}. 
                            It demonstrates comprehensive knowledge and practical skills that have been rigorously 
                            tested and verified by ${certificate.issuer}.
                        </p>
                    </div>
                </div>
            `;
            
            // Show modal
            modal.classList.add('show');
            document.body.style.overflow = 'hidden';
        }
        
        function hideCertificateModal() {
            const modal = document.getElementById('certificate-modal');
            modal.classList.remove('show');
            document.body.style.overflow = 'auto';
        }
        





        // Function to navigate to certificate detail page
        window.navigateToCertificateDetail = function(certificateId) {
            try {
                console.log('navigateToCertificateDetail called with ID:', certificateId);
                if (certificateId) {
                    // Navigate to the certificate detail page using ID
                    console.log('Navigating to:', `/certificate/${certificateId}`);
                    window.location.href = `/certificate/${certificateId}`;
                } else {
                    console.log('No certificate ID provided');
                    // Could open a modal or show a toast notification
                    alert('Certificate details will be available soon!');
                }
            } catch (error) {
                console.error('Error navigating to certificate detail:', error);
                alert('Unable to load certificate details. Please try again later.');
            }
        };

        // Function to navigate to certificate detail by slug
        function navigateToCertificateBySlug(slug) {
            try {
                if (slug) {
                    window.location.href = `/certificate/${slug}`;
                } else {
                    console.log('No certificate slug provided');
                    alert('Certificate details will be available soon!');
                }
            } catch (error) {
                console.error('Error navigating to certificate detail:', error);
                alert('Unable to load certificate details. Please try again later.');
            }
        }

        // Alternative function for when we have full certificate object
        function navigateToCertificateDetailObject(certificate) {
            try {
                // Check if certificate has an ID (from data-certificate attribute)
                if (!certificate.id && certificate.title) {
                    // Create a URL-friendly slug from the certificate title
                    const slug = certificate.title.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)/g, '');
                    
                    // Navigate to the certificate detail page using slug
                    window.location.href = `/certificate/${slug}`;
                } else if (certificate.id) {
                    // Use ID if available (this would require ID in the data)
                    window.location.href = `/certificate/${certificate.id}`;
                } else {
                    // Fallback: open certificate modal instead
                    console.log('No certificate ID available, opening modal');
                    showCertificateModal(certificate);
                }
            } catch (error) {
                console.error('Error navigating to certificate detail:', error);
                // Fallback to modal
                showCertificateModal(certificate);
            }
        }

        // Helper function to get skills for certificate
        function getSkillsForCertificate(certificateTitle) {
            const skillsMap = {
                'AWS Certified Developer': ['Cloud Computing', 'AWS Services', 'Serverless Architecture', 'DevOps'],
                'Laravel Certified Developer': ['PHP', 'Laravel Framework', 'MVC Architecture', 'API Development'],
                'React Professional': ['React.js', 'Hooks', 'State Management', 'Component Architecture'],
                'Vue.js Mastery': ['Vue.js', 'Vuex', 'Vue Router', 'Composition API'],
                'Full Stack Web Development': ['HTML/CSS', 'JavaScript', 'Backend Development', 'Database Design'],
                'Node.js Backend Development': ['Node.js', 'Express.js', 'REST APIs', 'Authentication'],
                'Google Cloud Associate': ['GCP Services', 'Cloud Infrastructure', 'Storage Solutions', 'Networking'],
                'Docker Certified Associate': ['Containerization', 'Docker', 'Orchestration', 'CI/CD'],
                'UI/UX Design Specialization': ['User Research', 'Wireframing', 'Prototyping', 'Design Systems'],
                'IELTS Academic': ['English Proficiency', 'Academic Writing', 'Listening Comprehension', 'Speaking'],
                'TypeScript Fundamentals': ['TypeScript', 'Type Safety', 'Modern JavaScript', 'Tooling'],
                'Git Advanced Techniques': ['Version Control', 'Git Workflows', 'Collaboration', 'DevOps']
            };
            
            return skillsMap[certificateTitle] || ['Technical Skills', 'Problem Solving', 'Best Practices'];
        }
        
        // Function to show certificate details
        function showCertificateDetails(certificate) {
            // Check if certificate data exists
            if (!certificate) {
                console.error('Certificate data is missing');
                return;
            }

            console.log('Certificate data:', certificate);

            // Format certificate data
            const formattedCertificate = {
                ...certificate,
                color: certificate.category?.color || 'from-blue-500 to-indigo-600',
                icon: certificate.icon || 'fas fa-certificate',
                date: certificate.issued_at ? new Date(certificate.issued_at).toLocaleDateString('en-US', { month: 'long', year: 'numeric' }) : 'Unknown',
                verified: true, // Assuming all certificates are verified
                category: certificate.category?.name || 'uncategorized'
            };

            // Show the modal with formatted certificate data
            showCertificateModal(formattedCertificate);
        }


        // Close modal with Escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                hideCertificateModal();
            }
        });

        // Share functionality for unified pages
        function showShareModal(certificateId) {
            const shareModal = document.getElementById('share-modal');
            if (shareModal) {
                shareModal.classList.remove('hidden');
                window.currentCertificateId = certificateId;
            }
        }

        function hideShareModal() {
            const shareModal = document.getElementById('share-modal');
            if (shareModal) {
                shareModal.classList.add('hidden');
            }
        }

        function shareToSocial(platform) {
            const certificateId = window.currentCertificateId;
            const url = `${window.location.origin}/certificate/${certificateId}`;
            const text = 'Check out my professional certification!';

            let shareUrl = '';
            switch(platform) {
                case 'twitter':
                    shareUrl = `https://twitter.com/intent/tweet?text=${encodeURIComponent(text)}&url=${encodeURIComponent(url)}`;
                    break;
                case 'linkedin':
                    shareUrl = `https://www.linkedin.com/sharing/share-offsite/?url=${encodeURIComponent(url)}`;
                    break;
            }

            if (shareUrl) {
                window.open(shareUrl, '_blank', 'width=600,height=400');
            }
            hideShareModal();
        }

        function copyCertificateLink() {
            const certificateId = window.currentCertificateId;
            const url = `${window.location.origin}/certificate/${certificateId}`;
            
            navigator.clipboard.writeText(url).then(() => {
                showToast('Link copied to clipboard!');
            });
            hideShareModal();
        }

        function showToast(message) {
            const toast = document.createElement('div');
            toast.className = 'fixed top-4 right-4 bg-primary text-white px-4 py-2 rounded-lg z-50 shadow-lg';
            toast.textContent = message;
            document.body.appendChild(toast);
            
            setTimeout(() => {
                toast.remove();
            }, 3000);
        }

        // Global functions for sharing
        window.showShareModal = showShareModal;
        window.hideShareModal = hideShareModal;
        window.shareToSocial = shareToSocial;
        window.copyCertificateLink = copyCertificateLink;
        window.showToast = showToast;
