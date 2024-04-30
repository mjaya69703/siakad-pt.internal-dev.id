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
            $table->integer('makul_id');            // ID MATA KULIAH
            $table->integer('kelas_id');            // ID KELAS
            $table->integer('dosen_id');            // ID DOSEN
            $table->integer('ruang_id');            // ID RUANGAN
            $table->integer('pert_id');             // ID PERTEMUAN
            $table->integer('meth_id');             // ID METODE PERTEMUAN
            $table->integer('days_id');             // ID HARI
            $table->integer('bsks');                // BEBAN SKS HARI INI
            $table->date('date');                   // TANGGAL PERKULIAHAN
            $table->time('start');                  // WAKTU MULAI PERKULIAHAN
            $table->time('ended');                  // WAKTU SELESAI PERKULIAHAN
            $table->string('code')->unique();       // CODE JADWAL KULIAH
            $table->timestamps();
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
