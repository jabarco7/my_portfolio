<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Web Development',
                'slug' => 'web-development',
                'description' => 'Custom web applications, websites, and web-based solutions using modern technologies like Laravel, React, Vue.js, and more.',
            ],
            [
                'name' => 'Mobile App Development',
                'slug' => 'mobile-app-development',
                'description' => 'Native and cross-platform mobile applications for iOS and Android using React Native, Flutter, and native technologies.',
            ],
            [
                'name' => 'E-commerce Solutions',
                'slug' => 'e-commerce-solutions',
                'description' => 'Online stores, shopping platforms, and digital commerce solutions with payment integration and inventory management.',
            ],
            [
                'name' => 'API Development',
                'slug' => 'api-development',
                'description' => 'RESTful APIs, microservices, and backend services for web and mobile applications with proper documentation.',
            ],
            [
                'name' => 'UI/UX Design',
                'slug' => 'ui-ux-design',
                'description' => 'User interface and user experience design services, wireframing, prototyping, and design systems.',
            ],
            [
                'name' => 'Database Design',
                'slug' => 'database-design',
                'description' => 'Database architecture, optimization, and management solutions using MySQL, PostgreSQL, MongoDB, and other databases.',
            ],
            [
                'name' => 'DevOps & Deployment',
                'slug' => 'devops-deployment',
                'description' => 'CI/CD pipelines, cloud deployment, server management, and infrastructure automation using Docker, AWS, and more.',
            ],
            [
                'name' => 'Consulting & Strategy',
                'slug' => 'consulting-strategy',
                'description' => 'Technical consulting, project planning, architecture design, and strategic technology decisions.',
            ],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(
                ['slug' => $category['slug']],
                $category
            );
        }
    }
}
