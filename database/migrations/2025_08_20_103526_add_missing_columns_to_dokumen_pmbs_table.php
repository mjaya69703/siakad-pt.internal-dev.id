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
            // Add columns needed by the upload functionality
            $table->string('nama_dokumen')->nullable()->after('pendaftar_id');
            $table->string('file_path')->nullable()->after('nama_dokumen');
            $table->string('file_name')->nullable()->after('file_path');
            $table->bigInteger('file_size')->nullable()->after('file_name');
            $table->string('mime_type')->nullable()->after('file_size');
            
            // Update status column to match current usage
            $table->string('status')->default('pending')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dokumen_p_m_b_s', function (Blueprint $table) {
            $table->dropColumn([
                'nama_dokumen',
                'file_path',
                'file_name', 
                'file_size',
                'mime_type'
            ]);
            
            // Revert status column
            $table->enum('status', ['Pending', 'Valid', 'Tidak Valid'])->default('Pending')->change();
        });
    }
};
