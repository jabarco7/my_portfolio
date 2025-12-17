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
                });
            });
            
            // Certificate detail modal
            const detailButtons = document.querySelectorAll('.certificate-detail-btn');
            const modal = document.getElementById('certificate-modal');
            const modalContent = document.getElementById('certificate-modal-content');
            
            detailButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const certificate = JSON.parse(button.getAttribute('data-certificate'));
                    showCertificateModal(certificate);
                });
            });

            // Add click event to certificate titles to navigate to detail page
            const certificateTitles = document.querySelectorAll('.certificate-card h3');
            certificateTitles.forEach(title => {
                title.style.cursor = 'pointer';
                title.addEventListener('click', () => {
                    const certificateCard = title.closest('.certificate-card');
                    const certificate = JSON.parse(certificateCard.querySelector('.certificate-detail-btn').getAttribute('data-certificate'));
                    navigateToCertificateDetail(certificate);
                });
            });
            
            // Load more certificates
            const loadMoreBtn = document.getElementById('load-more-certificates');
            if (loadMoreBtn) {
                loadMoreBtn.addEventListener('click', () => {
                    // Simulate loading more certificates
                    loadMoreBtn.innerHTML = `
                        <i class="fas fa-spinner fa-spin"></i>
                        <span>Loading...</span>
                    `;
                    loadMoreBtn.disabled = true;
                    
                    setTimeout(() => {
                        // In a real application, this would load more certificates from an API
                        alert('More certificates would be loaded in a real application. This is a demonstration.');
                        
                        loadMoreBtn.innerHTML = `
                            <i class="fas fa-sync-alt"></i>
                            <span>Load More Certificates</span>
                        `;
                        loadMoreBtn.disabled = false;
                    }, 1500);
                });
            }
            
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
        function navigateToCertificateDetail(certificate) {
            // Create a URL-friendly slug from the certificate title
            const slug = certificate.title.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)/g, '');
            
            // Navigate to the certificate detail page
            window.location.href = `/certificate/${slug}?id=${certificate.id}`;
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
        
        // Close modal with Escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                hideCertificateModal();
            }
        });
