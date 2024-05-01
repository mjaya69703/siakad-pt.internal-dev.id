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
        Schema::create('mata_kuliahs', function (Blueprint $table) {
            $table->id();
            $table->integer('kuri_id');                 // ID Kurikulum
            $table->integer('taka_id');                 // ID Tahun Akademik
            $table->integer('requ_id')->nullable();     // ID Persyaratan Mata Kuliah
            $table->integer('pstudi_id');               // ID Program Studi
            $table->integer('dosen_1');                 // Dosen Utama
            $table->integer('dosen_2')->nullable();     // Dosen Cadangan 1 
            $table->integer('dosen_3')->nullable();     // Dosen Cadangan 2
            $table->string('name');                     // Nama Mata Kuliah    
            $table->string('code')->unique();           // Kode Mata Kuliah
            $table->string('bsks');                     // Beban SKS
            $table->longText('desc');                   // Deskripsi Mata Kuliah
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mata_kuliahs');
    }
};
