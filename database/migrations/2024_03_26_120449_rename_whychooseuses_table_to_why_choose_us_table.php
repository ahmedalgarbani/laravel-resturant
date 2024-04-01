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
        Schema::table('why_choose_us', function (Blueprint $table) {
            Schema::rename('whychooseuses', 'why_choose_us');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('why_choose_us', function (Blueprint $table) {
            //
        });
    }
};
