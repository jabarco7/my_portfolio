// Modal functionality for projects page
document.addEventListener('DOMContentLoaded', function() {
    const projectModal = document.getElementById('project-modal');
    const projectModalContent = document.getElementById('project-modal-content');

    // Function to show project modal
    window.showProjectModal = function(projectId) {
        // In a real application, you would fetch project details from an API
        // For this example, we'll use mock data
        const project = {
            id: projectId,
            title: 'Project Title',
            excerpt: 'Project excerpt or description',
            is_featured: true,
            project_url: 'https://example.com',
            github_url: 'https://github.com/example',
            created_at: '2023-01-15',
            description: 'This project demonstrates expertise in modern web development practices. It includes responsive design, optimized performance, and clean code architecture.'
        };

        // Create modal content
        const modalContent = `
            <div class="space-y-6">
                <!-- Project Header -->
                <div class="rounded-2xl overflow-hidden bg-gradient-to-br from-primary-500/10 to-secondary-500/10 p-8">
                    <div class="flex items-center justify-between mb-4">
                        <h4 class="text-2xl font-bold text-base-content">${project.title}</h4>
                        ${project.is_featured ? '<span class="px-3 py-1 rounded-full bg-amber-100 dark:bg-amber-900/30 text-amber-800 dark:text-amber-400 text-sm font-medium">Featured</span>' : ''}
                    </div>
                    <p class="text-base-content/70">${project.excerpt || project.description || 'No description available.'}</p>
                </div>

                <!-- Project Details -->
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="space-y-4">
                        <div>
                            <div class="text-sm text-base-content/60 mb-2">Technologies Used</div>
                            <div class="flex flex-wrap gap-2">
                                ${['Laravel', 'Vue.js', 'Tailwind CSS', 'MySQL', 'API'].map(tech => `
                                    <span class="px-3 py-1.5 rounded-lg bg-base-200 text-base-content text-sm">${tech}</span>
                                `).join('')}
                            </div>
                        </div>
                        <div>
                            <div class="text-sm text-base-content/60 mb-2">Project Type</div>
                            <div>
                                <span class="inline-flex items-center px-3 py-1 rounded-full bg-primary/10 text-primary">
                                    Full Stack Application
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <div class="text-sm text-base-content/60 mb-2">Project Links</div>
                            <div class="flex flex-col gap-2">
                                ${project.project_url ? `
                                    <a href="${project.project_url}" target="_blank" class="inline-flex items-center gap-2 px-4 py-3 bg-primary/10 text-primary rounded-lg hover:bg-primary/20 transition-all duration-300">
                                        <i class="fas fa-external-link-alt"></i>
                                        <span>Live Demo</span>
                                    </a>
                                ` : ''}
                                ${project.github_url ? `
                                    <a href="${project.github_url}" target="_blank" class="inline-flex items-center gap-2 px-4 py-3 bg-base-200 text-base-content rounded-lg hover:bg-base-300 transition-all duration-300">
                                        <i class="fab fa-github"></i>
                                        <span>View Source</span>
                                    </a>
                                ` : ''}
                            </div>
                        </div>

                        <div>
                            <div class="text-sm text-base-content/60 mb-2">Project Timeline</div>
                            <div class="flex items-center gap-2">
                                <i class="fas fa-calendar-alt text-primary"></i>
                                <span class="font-semibold text-base-content">${new Date(project.created_at).toLocaleDateString('en-US', { month: 'long', year: 'numeric' })}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Project Description -->
                <div>
                    <h5 class="text-lg font-bold text-base-content mb-4">Project Overview</h5>
                    <div class="prose prose-primary max-w-none">
                        <p class="text-base-content/70">
                            ${project.description || 'This project demonstrates expertise in modern web development practices. It includes responsive design, optimized performance, and clean code architecture.'}
                        </p>
                    </div>
                </div>

                <!-- Key Features -->
                <div>
                    <h5 class="text-lg font-bold text-base-content mb-4">Key Features</h5>
                    <ul class="grid md:grid-cols-2 gap-3">
                        ${['Responsive Design', 'User Authentication', 'Database Integration', 'API Endpoints', 'Admin Dashboard', 'Performance Optimized'].map(feature => `
                            <li class="flex items-center gap-3">
                                <i class="fas fa-check-circle text-green-500"></i>
                                <span class="text-base-content/70">${feature}</span>
                            </li>
                        `).join('')}
                    </ul>
                </div>
            </div>
        `;

        projectModalContent.innerHTML = modalContent;
        projectModal.classList.add('show');
    };

    // Function to hide project modal
    window.hideProjectModal = function() {
        projectModal.classList.remove('show');
    };

    // Add click event to project cards
    projectCards.forEach(card => {
        card.addEventListener('click', function() {
            const projectId = this.getAttribute('data-project-id');
            if (projectId) {
                showProjectModal(projectId);
            }
        });
    });
});