<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // إضافة بيانات المهارات
        DB::table('skills')->insert([
            ['name' => 'Laravel', 'category' => 'Backend', 'percentage' => 90, 'is_active' => true, 'order' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'PHP', 'category' => 'Backend', 'percentage' => 85, 'is_active' => true, 'order' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'MySQL', 'category' => 'Database', 'percentage' => 80, 'is_active' => true, 'order' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'JavaScript', 'category' => 'Frontend', 'percentage' => 75, 'is_active' => true, 'order' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'HTML/CSS', 'category' => 'Frontend', 'percentage' => 85, 'is_active' => true, 'order' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Vue.js', 'category' => 'Frontend', 'percentage' => 70, 'is_active' => true, 'order' => 6, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Git', 'category' => 'Tools', 'percentage' => 80, 'is_active' => true, 'order' => 7, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Docker', 'category' => 'DevOps', 'percentage' => 65, 'is_active' => true, 'order' => 8, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('skills')->whereIn('name', [
            'Laravel', 'PHP', 'MySQL', 'JavaScript', 'HTML/CSS', 'Vue.js', 'Git', 'Docker'
        ])->delete();
    }
};
