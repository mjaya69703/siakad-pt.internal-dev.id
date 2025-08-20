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
        Schema::table('dokumen_p_m_b_s', function (Blueprint $table) {
            // Make syarat_id nullable since it's not always required for document uploads
            $table->integer('syarat_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dokumen_p_m_b_s', function (Blueprint $table) {
            // Revert syarat_id to non-nullable
            $table->integer('syarat_id')->nullable(false)->change();
        });
    }
};
