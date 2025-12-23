<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a single admin user
        Admin::firstOrCreate([
            'email' => 'jabargaloom@gmail.com',
        ], [
            'name' => 'jabar',
            'email' => 'jabargaloom@gmail.com',
            'password' => Hash::make('12345678!A'),
        ]);
    }
}