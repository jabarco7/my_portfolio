<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Portfolio Configuration
    |--------------------------------------------------------------------------
    |
    | This file contains configuration for static portfolio data that was
    | previously hardcoded in Blade views. This promotes better maintainability
    | and separation of concerns.
    |
    */

    'social_links' => [
        [
            'label' => 'GitHub',
            'url' => 'https://github.com/abduljabbar',
            'icon' => 'fab fa-github',
            'color' => 'text-gray-300',
        ],
        [
            'label' => 'LinkedIn',
            'url' => 'https://linkedin.com/in/abduljabbar',
            'icon' => 'fab fa-linkedin-in',
            'color' => 'text-blue-600',
        ],
        [
            'label' => 'Email',
            'url' => 'mailto:abduljabbar@example.com',
            'icon' => 'fas fa-envelope',
            'color' => 'text-red-600',
        ],
        [
            'label' => 'Instagram',
            'url' => 'https://instagram.com/abduljabbar',
            'icon' => 'fab fa-instagram',
            'color' => 'text-pink-600',
        ],
    ],

    'tech_stack' => [
        [
            'name' => 'Laravel',
            'icon' => 'fab fa-laravel',
            'color' => 'text-red-500',
            'description' => 'PHP Framework',
        ],
        [
            'name' => 'React',
            'icon' => 'fab fa-react',
            'color' => 'text-blue-400',
            'description' => 'JavaScript Library',
        ],
        [
            'name' => 'Vue.js',
            'icon' => 'fab fa-vuejs',
            'color' => 'text-green-500',
            'description' => 'Progressive Framework',
        ],
        [
            'name' => 'Node.js',
            'icon' => 'fab fa-node-js',
            'color' => 'text-green-600',
            'description' => 'Runtime Environment',
        ],
        [
            'name' => 'MySQL',
            'icon' => 'fas fa-database',
            'color' => 'text-blue-600',
            'description' => 'Database',
        ],
        [
            'name' => 'MongoDB',
            'icon' => 'fas fa-leaf',
            'color' => 'text-green-700',
            'description' => 'NoSQL Database',
        ],
        [
            'name' => 'Docker',
            'icon' => 'fab fa-docker',
            'color' => 'text-blue-500',
            'description' => 'Containerization',
        ],
        [
            'name' => 'AWS',
            'icon' => 'fab fa-aws',
            'color' => 'text-orange-500',
            'description' => 'Cloud Platform',
        ],
    ],

    'faq' => [
        [
            'question' => 'What types of projects do you take on?',
            'answer' => 'I specialize in full-stack web development, including custom web applications, e-commerce solutions, API development, and responsive website design. I enjoy challenging projects that require creative problem-solving.',
            'open' => true,
        ],
        [
            'question' => 'What is your typical response time?',
            'answer' => 'I strive to respond to all inquiries within 24 hours during weekdays. For urgent matters, email is the fastest way to reach me.',
            'open' => false,
        ],
        [
            'question' => 'Do you work remotely or on-site?',
            'answer' => 'I primarily work remotely but am open to on-site collaboration for projects in Riyadh. Remote work allows me to maintain flexible hours and work with clients worldwide.',
            'open' => false,
        ],
        [
            'question' => 'What are your rates?',
            'answer' => 'My rates vary depending on project scope, complexity, and timeline. I offer both hourly and project-based pricing. Please contact me with your project details for a customized quote.',
            'open' => false,
        ],
        [
            'question' => 'What is your development process?',
            'answer' => 'I follow an agile development process: discovery and planning, design mockups, development iterations, testing, and deployment. I maintain clear communication throughout the project.',
            'open' => false,
        ],
        [
            'question' => 'Do you provide ongoing support?',
            'answer' => 'Yes, I offer maintenance packages and ongoing support for projects I develop. This includes updates, security patches, and feature enhancements.',
            'open' => false,
        ],
    ],

    'contact_info' => [
        'email' => 'abduljabbar@example.com',
        'phone' => '+967 776 053 389',
        'location' => 'Riyadh, Saudi Arabia',
        'timezone' => 'AST (UTC+3)',
        'availability' => 'Available for new projects',
    ],

    'working_hours' => [
        'sunday_thursday' => '9:00 AM - 6:00 PM',
        'friday_saturday' => 'By Appointment',
    ],
];