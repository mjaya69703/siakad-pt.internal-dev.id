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
        Schema::create('hasil_studis', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id');                          // ID MAHASISWA
            $table->integer('taka_id');                             // ID TAHUN AKADEMIK
            $table->integer('score_absen')->default(0);             // SCORE ABSEN
            $table->integer('score_tugas')->default(0);             // SCORE TUGAS
            $table->integer('score_uas')->default(0);               // SCORE UTS 0 - 100
            $table->integer('score_uts')->default(0);               // SCORE UAS 0 - 100
            $table->integer('max_absen')->default(0);               // JUMLAH PERTEMUAN
            $table->integer('max_tugas')->default(0);               // JUMLAH TUGAS
            $table->integer('smt_id');                              // SEMESTER ID
            $table->integer('nilai_ips')->default(0);               // INDEX PRESTASI SEMENTARA
            $table->integer('nilai_ipk')->default(0);               // INDEX PRESTASI SEMENTARA
            $table->string('code')->unique();                      // PRIVATE CODE
            $table->unique(['student_id', 'smt_id']);               // STABLE UNIQUE
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_studis');
    }
};
