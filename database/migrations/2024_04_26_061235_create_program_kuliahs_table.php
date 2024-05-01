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
        Schema::create('program_kuliahs', function (Blueprint $table) {
            $table->id();
            $table->integer('taka_id');  // Tahun Akademik ID
            $table->integer('pstudi_id'); // Program Studi
            $table->string('name');      // Nama Program Kuliah ex: Regular Pagi
            $table->string('code')->unique();      // Kode Program Kuliah ex: Gelombang-Singkatan-Taka => G1-RP-2023
            $table->string('wave');      // Gelombang Program Kuliah ex: Gelombang I, Gelombang II
            $table->date('wave_start')->nullable();     // Tanggal Mulai Gelombang
            $table->date('wave_ended')->nullable();     // Tanggal Akhir Gelombang
            $table->timestamps();
        });

        // CONTOH KOP SURAT
        // PENERIMAAN MAHASISWA BARU - UNIVERSITAS AYAM KAMBING
        // GELOMBANG I TAHUN AKADEMIK 2023/2024
        // PERIODE 17 APRIL 2024 - 20 MEI 2024

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_kuliahs');
    }
};
