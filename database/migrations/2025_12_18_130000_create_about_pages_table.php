<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('about_pages', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->text('description')->nullable();
            $table->string('cv_file')->nullable(); // لتحميل ملف السيرة الذاتية
            $table->string('cv_link')->nullable(); // رابط خارجي كبديل
            $table->string('profile_image')->nullable();
            $table->integer('experience_years')->default(0);
            $table->integer('projects_count')->default(0);
            $table->integer('clients_count')->default(0);
            $table->integer('satisfaction_rate')->default(100);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('about_pages');
    }
};
