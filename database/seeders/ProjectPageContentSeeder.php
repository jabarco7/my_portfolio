<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProjectPageContent;

class ProjectPageContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hero Stats
        ProjectPageContent::create([
            'section_type' => 'hero_stats',
            'content_data' => [
                'projects_count' => 50,
                'completed_projects' => '50+',
                'client_satisfaction' => '100%'
            ],
            'is_active' => true,
            'order' => 1
        ]);

        // Filter Buttons
        ProjectPageContent::create([
            'section_type' => 'filter_buttons',
            'content_data' => [
                ['key' => 'all', 'label' => 'All Projects'],
                ['key' => 'laravel', 'label' => 'Laravel'],
                ['key' => 'vue', 'label' => 'Vue.js'],
                ['key' => 'react', 'label' => 'React'],
                ['key' => 'fullstack', 'label' => 'Full Stack']
            ],
            'is_active' => true,
            'order' => 2
        ]);

        // Project Types
        ProjectPageContent::create([
            'section_type' => 'project_types',
            'content_data' => [
                [
                    'title' => 'Web Applications',
                    'description' => 'Custom web applications with modern frameworks and responsive design.',
                    'icon' => 'fas fa-window-restore',
                    'color' => 'from-primary-500 to-secondary-500',
                    'count' => '15+'
                ],
                [
                    'title' => 'E-Commerce Solutions',
                    'description' => 'Online stores with secure payment integration and inventory management.',
                    'icon' => 'fas fa-shopping-cart',
                    'color' => 'from-blue-500 to-cyan-500',
                    'count' => '8+'
                ],
                [
                    'title' => 'API Development',
                    'description' => 'RESTful APIs and backend services for web and mobile applications.',
                    'icon' => 'fas fa-code-branch',
                    'color' => 'from-purple-500 to-pink-500',
                    'count' => '12+'
                ],
                [
                    'title' => 'Mobile Responsive',
                    'description' => 'Websites that work perfectly on all devices and screen sizes.',
                    'icon' => 'fas fa-mobile-alt',
                    'color' => 'from-green-500 to-emerald-500',
                    'count' => '20+'
                ],
                [
                    'title' => 'Dashboard & Admin Panels',
                    'description' => 'Management interfaces with data visualization and analytics.',
                    'icon' => 'fas fa-chart-line',
                    'color' => 'from-orange-500 to-red-500',
                    'count' => '10+'
                ],
                [
                    'title' => 'Custom Solutions',
                    'description' => 'Tailored software solutions for unique business needs.',
                    'icon' => 'fas fa-cogs',
                    'color' => 'from-indigo-500 to-purple-500',
                    'count' => '25+'
                ]
            ],
            'is_active' => true,
            'order' => 3
        ]);

        // Process Steps
        ProjectPageContent::create([
            'section_type' => 'process_steps',
            'content_data' => [
                [
                    'step' => '01',
                    'title' => 'Discovery & Planning',
                    'description' => 'Understanding requirements, defining scope, and planning the project architecture.',
                    'icon' => 'fas fa-lightbulb'
                ],
                [
                    'step' => '02',
                    'title' => 'Design & Prototyping',
                    'description' => 'Creating wireframes, mockups, and interactive prototypes for client approval.',
                    'icon' => 'fas fa-paint-brush'
                ],
                [
                    'step' => '03',
                    'title' => 'Development',
                    'description' => 'Writing clean, maintainable code with regular updates and testing.',
                    'icon' => 'fas fa-code'
                ],
                [
                    'step' => '04',
                    'title' => 'Testing & Quality',
                    'description' => 'Rigorous testing across devices and browsers to ensure flawless performance.',
                    'icon' => 'fas fa-check-double'
                ],
                [
                    'step' => '05',
                    'title' => 'Deployment',
                    'description' => 'Launching the project with proper hosting, security, and optimization.',
                    'icon' => 'fas fa-rocket'
                ],
                [
                    'step' => '06',
                    'title' => 'Support & Maintenance',
                    'description' => 'Ongoing support, updates, and maintenance for long-term success.',
                    'icon' => 'fas fa-headset'
                ]
            ],
            'is_active' => true,
            'order' => 4
        ]);

        // CTA Section
        ProjectPageContent::create([
            'section_type' => 'cta_section',
            'content_data' => [
                'title' => 'Ready to Start Your Next Project?',
                'description' => 'Let\'s collaborate to create something amazing that meets your goals and exceeds expectations.',
                'primary_button_text' => 'Start a Project',
                'primary_button_link' => '/contact',
                'secondary_button_text' => 'View My Skills',
                'secondary_button_link' => '/skills'
            ],
            'is_active' => true,
            'order' => 5
        ]);
    }
}