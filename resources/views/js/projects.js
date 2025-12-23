
// Projects page JavaScript
document.addEventListener('DOMContentLoaded', function() {
    // Project modal functionality
    const modalTriggers = document.querySelectorAll('.modal-trigger');
    const modal = document.getElementById('project-modal');
    const modalClose = document.querySelector('.modal-close');

    // Function to show project modal
    function showProjectModal(projectId) {
        // Get project data (in a real app, this would be fetched from an API)
        const project = getProjectById(projectId);

        if (!project) return;

        // Update modal content
        const modalContent = document.querySelector('.modal-content');
        modalContent.innerHTML = `
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Project Image -->
                <div class="lg:w-1/2">
                    <img src="${project.image || '/images/project-placeholder.jpg'}" 
                         alt="${project.title}" 
                         class="w-full h-auto rounded-xl shadow-lg">
                </div>

                <!-- Project Details -->
                <div class="lg:w-1/2 space-y-6">
                    <!-- Project Title and Status -->
                    <div>
                        <h3 class="text-2xl font-bold text-base-content mb-2">${project.title}</h3>
                        <div class="flex items-center gap-2">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium ${
                                project.status === 'completed' ? 'bg-green-100 text-green-800' : 
                                project.status === 'in-progress' ? 'bg-blue-100 text-blue-800' : 
                                'bg-gray-100 text-gray-800'
                            }">
                                ${project.status === 'completed' ? 'Completed' : 
                                  project.status === 'in-progress' ? 'In Progress' : 
                                  'Planned'}
                            </span>
                            <span class="text-sm text-base-content/60">
                                ${new Date(project.created_at).toLocaleDateString()}
                            </span>
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
            </div>
        `;

        // Show modal
        modal.classList.add('show');
        document.body.style.overflow = 'hidden';
    }

    // Function to hide project modal
    function hideProjectModal() {
        modal.classList.remove('show');
        document.body.style.overflow = 'auto';
    }

    // Mock function to get project data (in a real app, this would fetch from an API)
    function getProjectById(projectId) {
        // This would normally be an API call
        return {
            id: projectId,
            title: 'Project ' + projectId,
            description: 'Description for project ' + projectId,
            status: 'completed',
            created_at: new Date().toISOString()
        };
    }

    // Add click event to modal triggers
    modalTriggers.forEach(trigger => {
        trigger.addEventListener('click', function(e) {
            e.preventDefault();
            const projectId = this.getAttribute('data-project-id');
            showProjectModal(projectId);
        });
    });

    // Close modal with close button
    if (modalClose) {
        modalClose.addEventListener('click', hideProjectModal);
    }

    // Close modal with Escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            hideProjectModal();
        }
    });
});
