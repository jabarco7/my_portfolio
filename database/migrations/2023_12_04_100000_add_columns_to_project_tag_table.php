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
        Schema::table('project_tag', function (Blueprint $table) {
            $table->foreignId('project_id')->constrained()->onDelete('cascade');
            $table->foreignId('tag_id')->constrained('project_tags')->onDelete('cascade');

            $table->unique(['project_id', 'tag_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('project_tag', function (Blueprint $table) {
            $table->dropForeign(['project_id']);
            $table->dropForeign(['tag_id']);
            $table->dropUnique(['project_id', 'tag_id']);
            $table->dropColumn(['project_id', 'tag_id']);
        });
    }
};
