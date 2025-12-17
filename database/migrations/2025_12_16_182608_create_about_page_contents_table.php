<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       Schema::create('about_page_contents', function (Blueprint $table) {
    $table->id();
    $table->string('badge_text')->nullable();
    $table->string('heading_line1')->nullable();
    $table->string('heading_line2')->nullable();
    $table->string('name')->nullable();
    $table->integer('experience_years')->default(0);
    $table->integer('projects_count')->default(0);
    $table->integer('clients_count')->default(0);
    $table->integer('satisfaction_rate')->default(100);
    $table->text('description')->nullable();
    $table->string('cv_link')->nullable();
    $table->string('skills_title')->nullable();
    $table->json('timeline')->nullable(); // لتخزين الخبرات والتعليم
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_page_contents');
    }
};