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
        Schema::create('jadwal_kuliahs', function (Blueprint $table) {
            $table->id();
            // RELASI INTI
            $table->integer('dosen_id');
            $table->integer('ruang_id');
            $table->integer('matkul_id');
            $table->integer('jenis_kelas_id');
            $table->integer('waktu_kuliah_id');

            $table->integer('bsks');
            $table->integer('pertemuan');
            $table->string('code')->unique();
            $table->string('link')->nullable();
            $table->enum('hari', ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu']);
            $table->enum('metode', ['Tatap Muka', 'Teleconference']);
            $table->date('tanggal');


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
        Schema::dropIfExists('jadwal_kuliahs');
    }
};
