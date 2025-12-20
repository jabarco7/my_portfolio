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
        // We use updateOrCreate to preserve existing relationships if possible
        // CertificateCategory::query()->delete(); 

        $categories = [
            [
                'name' => 'Development',
                'slug' => 'development',
                'color' => 'from-blue-500 to-indigo-600',
                'description' => 'Web development and programming certificates',
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
                'name' => 'Designs',
                'slug' => 'design',
                'color' => 'from-purple-500 to-yellow-500',
                'description' => 'Design certificates',
                'is_active' => true,
            ],
            [
                'name' => 'Others',
                'slug' => 'other',
                'color' => 'from-green-500 to-yellow-500',
                'description' => 'Other types of certificates',
                'is_active' => true,
            ],
        ];

        foreach ($categories as $category) {
            CertificateCategory::updateOrCreate(
                ['slug' => $category['slug']],
                $category
            );
        }
    }
}