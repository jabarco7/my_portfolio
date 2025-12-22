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
        Schema::create('project_detail_contents', function (Blueprint $table) {
            $table->id();
            $table->string('section');
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->text('description')->nullable();
            $table->string('badge_text')->nullable();
            $table->string('button_text')->nullable();
            $table->string('button_link')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);

            // Additional fields for specific sections
            $table->string('technologies_title')->nullable();
            $table->string('category_title')->nullable();
            $table->string('client_title')->nullable();
            $table->string('date_title')->nullable();
            $table->string('status_title')->nullable();
            $table->string('links_title')->nullable();
            $table->string('challenges_title')->nullable();
            $table->string('solutions_title')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_detail_contents');
    }
};
