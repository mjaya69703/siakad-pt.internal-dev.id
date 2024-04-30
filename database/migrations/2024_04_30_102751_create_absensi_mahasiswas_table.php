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
        Schema::create('absensi_mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->string('jadkul_code');                 // KODE JADWAL KULIAH
            $table->integer('author_id');                   // ID MAHASISWA
            $table->string('absen_type')->default('A');      // TYPE ABSEN MAHASISWA => 1 = Hadir ; 2 = Izin ; 3 = Sakit ; 0 = Tidak Hadir
            $table->string('absen_proof');                  // PROOF ABSEN MAHASISWA
            $table->string('code')->unique();               // KODE ABSENSI
            $table->date('absen_date');                     // TANGGAL ABSEN
            $table->time('absen_time');                     // WAKTU ABSEN
            $table->text('absen_desc')->nullable();         // NOTED ABSEN
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensi_mahasiswas');
    }
};
