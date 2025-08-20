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
        Schema::table('pendaftars', function (Blueprint $table) {
            // Add tahun_akademik_id foreign key column
            $table->unsignedBigInteger('tahun_akademik_id')->nullable()->after('pendaftar_user_id');
            
            // Add foreign key constraint
            $table->foreign('tahun_akademik_id')->references('id')->on('tahun_akademiks')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pendaftars', function (Blueprint $table) {
            // Drop foreign key first
            $table->dropForeign(['tahun_akademik_id']);
            $table->dropColumn('tahun_akademik_id');
        });
    }
};
