
document.addEventListener('DOMContentLoaded', function() {
    // Project filtering
    const filterButtons = document.querySelectorAll('.project-filter-btn');
    const projectCards = document.querySelectorAll('.project-card');

    console.log('Filter buttons found:', filterButtons.length);
    console.log('Project cards found:', projectCards.length);

    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            const filter = button.getAttribute('data-filter');
            console.log('Filter clicked:', filter);

            // Update active filter button
            filterButtons.forEach(btn => {
                btn.classList.remove('active', 'bg-gradient-to-r',
                    'from-primary-500', 'to-secondary-500', 'text-white');
                btn.classList.add('bg-base-200', 'border', 'border-base-300',
                    'text-base-content');
            });

            button.classList.add('active', 'bg-gradient-to-r', 'from-primary-500',
                'to-secondary-500', 'text-white');
            button.classList.remove('bg-base-200', 'border', 'border-base-300',
                'text-base-content');

            // Filter project cards
            let visibleCount = 0;
            projectCards.forEach(card => {
                card.style.display = 'none';
                card.classList.remove('visible');

                const category = card.getAttribute('data-category');
                const tags = card.getAttribute('data-tags') ? card.getAttribute(
                    'data-tags').split(',').map(tag => tag.trim()
                    .toLowerCase()) : [];

                console.log('Card category:', category, 'tags:',
                    tags);

                // Show project if filter matches category or any tag
                const filterLower = filter.toLowerCase();
                const shouldShow = filter === 'all' ||
                    category === filter ||
                    tags.some(tag => tag.includes(filterLower));

                if (shouldShow) {
                    console.log('Showing card with category:', category, 'tags:',
                        tags);
                    setTimeout(() => {
                        card.style.display = 'block';
                        setTimeout(() => {
                            card.classList.add('visible');
                        }, 50);
                    }, visibleCount * 50); // Stagger animation
                    visibleCount++;
                }
            });
            console.log('Visible cards after filter:', visibleCount);
        });
    });

    // Project detail modal
    const modalButtons = document.querySelectorAll('.project-modal-btn');
    const modal = document.getElementById('project-modal');
    const modalContent = document.getElementById('project-modal-content');

    modalButtons.forEach(button => {
        button.addEventListener('click', () => {
            const project = JSON.parse(button.getAttribute('data-project'));
            showProjectModal(project);
        });
    });

    // Initialize project cards as visible
    setTimeout(() => {
        projectCards.forEach(card => {
            card.classList.add('visible');
        });
    }, 100);
});

function showProjectModal(project) {
    const modal = document.getElementById('project-modal');
    const modalContent = document.getElementById('project-modal-content');

    // Create modal content
    modalContent.innerHTML = `
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

    // Show modal
    modal.classList.add('show');
    document.body.style.overflow = 'hidden';
}

function hideProjectModal() {
    const modal = document.getElementById('project-modal');
    modal.classList.remove('show');
    document.body.style.overflow = 'auto';
}

// Close modal with Escape key
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
        hideProjectModal();
    }
});
