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
        Schema::table('about_page_contents', function (Blueprint $table) {
            $table->string('section_type')->nullable();
            $table->json('content_data')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('about_page_contents', function (Blueprint $table) {
            $table->dropColumn(['section_type', 'content_data', 'is_active', 'order']);
        });
    }
};
