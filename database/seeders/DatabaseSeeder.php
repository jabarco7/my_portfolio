<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::firstOrCreate([
            'email' => 'jabarjaloom@gmail.com',
        ], [
            'name' => 'Test User',
            'email' => 'jabarjaloom@gmail.com',
            'password' => bcrypt('password'),
            
        ]);

        $this->call([
            AdminSeeder::class,
            TagSeeder::class,
            CategorySeeder::class,
            CertificateCategorySeeder::class,
        ]);
    }
}