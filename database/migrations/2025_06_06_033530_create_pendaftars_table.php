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
        Schema::create('pendaftars', function (Blueprint $table) {
            $table->id();
            // RELASI INTI
            $table->integer('mahasiswa_id');    // ID AKUN MAHASISWA
            $table->integer('jalur_id');        // ID JALUR PENDAFTARAN
            $table->integer('jenis_id');        // ID JENIS KELAS
            $table->integer('gelombang_id');    // ID GELOMBANG PENDAFTARAN
            // PILIHAN PRODI
            $table->integer('prodi_1');                // PILIHAN PRODI 1
            $table->integer('prodi_2');                // PILIHAN PRODI 2
            $table->integer('prodi_3')->nullable();    // PILIHAN PRODI 3

            $table->string('phone')->unique();    // NO TELEPON MAHASISWA
            $table->string('email')->unique();    // ALAMAT EMAIL MAHASISWA
            $table->string('name');               // NAMA LENGKAP MAHASISWA
            $table->string('code')->unique();     // KODE USER
            $table->string('numb_reg')->unique(); // NOMOR REGISTRASI
            $table->date('register_date');        // TANGGAL PENDAFTARAN
            $table->enum('status', ['Pending', 'Lulus', 'Gagal', 'Batal'])->default('Pending');   // STATUS PENDAFTARAN

            // AUDIT TRACKING
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftars');
    }
};
