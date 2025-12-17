<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CertificateCategory;

class CertificateCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // حذف جميع الفئات الموجودة
        CertificateCategory::query()->delete();

        $categories = [
            [
                'name' => 'Development',
                'slug' => 'development',
                'color' => 'from-blue-500 to-indigo-600',
                'description' => 'Programming and software development certificates',
                'is_active' => true,
            ],
            [
                'name' => 'Cloud & DevOps',
                'slug' => 'cloud',
                'color' => 'from-orange-500 to-yellow-500',
                'description' => 'Cloud computing and DevOps certificates',
                'is_active' => true,
            ],
            [
                'name' => 'Design',
                'slug' => 'design',
                'color' => 'from-pink-500 to-purple-500',
                'description' => 'UI/UX and graphic design certificates',
                'is_active' => true,
            ],
            [
                'name' => 'Languages',
                'slug' => 'language',
                'color' => 'from-red-500 to-orange-500',
                'description' => 'Language proficiency certificates',
                'is_active' => true,
            ],
        ];

        foreach ($categories as $category) {
            CertificateCategory::create($category);
        }
    }
}