import './bootstrap';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import './certificates.js';
import './skills.js';
import './realtime-notifications.js';

// Project toggle functionality
document.addEventListener('DOMContentLoaded', function () {
    const toggleBtn = document.getElementById('toggle-projects-btn');
    if (toggleBtn) {
        toggleBtn.addEventListener('click', function () {
            const extraProjects = document.querySelectorAll('.extra-project');
            const isShowingAll = toggleBtn.textContent.includes('إظهار أقل');

            if (isShowingAll) {
                // Hide extra projects
                extraProjects.forEach(project => {
                    project.classList.add('hidden');
                });
                toggleBtn.textContent = 'إظهار جميع المشاريع';
            } else {
                // Show all projects
                extraProjects.forEach(project => {
                    project.classList.remove('hidden');
                });
                toggleBtn.textContent = 'إظهار أقل';
            }
        });
    }
});
