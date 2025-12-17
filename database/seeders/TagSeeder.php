<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        $tags = [
            // Backend
            ['name' => 'PHP', 'color' => '#777BB4'],
            ['name' => 'Laravel', 'color' => '#FF2D20'],
            ['name' => 'Livewire', 'color' => '#FB70A9'],
            ['name' => 'Node.js', 'color' => '#3C873A'],

            // Frontend
            ['name' => 'HTML', 'color' => '#E34F26'],
            ['name' => 'CSS', 'color' => '#1572B6'],
            ['name' => 'JavaScript', 'color' => '#F7DF1E'],
            ['name' => 'Tailwind CSS', 'color' => '#38BDF8'],
            ['name' => 'Vue.js', 'color' => '#42B883'],
            ['name' => 'React', 'color' => '#61DAFB'],

            // Database
            ['name' => 'MySQL', 'color' => '#4479A1'],
            ['name' => 'PostgreSQL', 'color' => '#336791'],

            // Tools
            ['name' => 'Docker', 'color' => '#2496ED'],
            ['name' => 'Git', 'color' => '#F05032'],
        ];

        foreach ($tags as $tag) {
            Tag::updateOrCreate(
                ['name' => $tag['name']],
                $tag
            );
        }
    }
}