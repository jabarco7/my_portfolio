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
        Schema::table('skills_page_contents', function (Blueprint $table) {
            $table->string('technologies_count')->nullable();
            $table->string('expert_level')->nullable();
            $table->string('up_to_date_percentage')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('skills_page_contents', function (Blueprint $table) {
            $table->dropColumn(['technologies_count', 'expert_level', 'up_to_date_percentage']);
        });
    }
};
