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
        Schema::create('kelas', function (Blueprint $table) {
            $table->id();
            $table->integer('taka_id');                 // Tahun Akademik
            $table->integer('pstudi_id');               // Program Studi
            $table->integer('proku_id')->nullable();    // Program Kuliah
            $table->integer('dosen_id')->nullable();    // Wali Kelas 
            $table->integer('capacity')->nullable();    // Kapasitas Mahasiswa 
            $table->string('name');                     // Nama Kelas
            $table->string('code')->unique();           // Kode Kelas => Jurusan-Tahun-Proku-Semester(A-Z)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas');
    }
};
