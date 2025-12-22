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
        Schema::table('projects', function (Blueprint $table) {
            $table->json('challenges')->nullable();
            $table->json('solutions')->nullable();
            $table->json('results')->nullable();
            $table->json('hero_content')->nullable();
            $table->json('project_details_content')->nullable();
            $table->json('explore_more_content')->nullable();
            $table->json('share_content')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn([
                'challenges',
                'solutions',
                'results',
                'hero_content',
                'project_details_content',
                'explore_more_content',
                'share_content'
            ]);
        });
    }
};
