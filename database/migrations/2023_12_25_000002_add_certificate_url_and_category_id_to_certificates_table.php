<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('certificates', function (Blueprint $table) {
            if (!Schema::hasColumn('certificates', 'certificate_url')) {
                $table->string('certificate_url')->nullable()->after('image');
            }
            if (!Schema::hasColumn('certificates', 'category_id')) {
                $table->bigInteger('category_id')->nullable()->after('id');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('certificates', function (Blueprint $table) {
            if (Schema::hasColumn('certificates', 'certificate_url')) {
                $table->dropColumn('certificate_url');
            }
            if (Schema::hasColumn('certificates', 'category_id')) {
                $table->dropColumn('category_id');
            }
        });
    }
};

