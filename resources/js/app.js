import axios from 'axios';
window.axios = axios;

import './bootstrap';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import './certificates-final.js';
import './certificates-loadmore.js';
import './skills.js';
import './realtime-notifications.js';
import './contact.js';

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
