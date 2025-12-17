<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SocialLink;

class SocialLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $socialLinks = [
            [
                'platform' => 'GitHub',
                'url' => 'https://github.com/abduljabbar',
                'icon' => 'ri-github-fill',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'platform' => 'LinkedIn',
                'url' => 'https://linkedin.com/in/abduljabbar',
                'icon' => 'ri-linkedin-box-fill',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'platform' => 'Facebook',
                'url' => 'https://instagram.com/abduljabbar',
                'icon' => 'ri-facebook-fill',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'platform' => 'Email',
                'url' => 'mailto:abduljabbar@example.com',
                'icon' => 'ri-mail-fill',
                'order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($socialLinks as $link) {
            SocialLink::create($link);
        }
    }
}
