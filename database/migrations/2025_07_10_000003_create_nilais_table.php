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
        Schema::create('nilais', function (Blueprint $table) {
            $table->id();

            // RELASI INTI
            $table->string('code')->unique();
            $table->unsignedBigInteger('mahasiswa_id');
            $table->unsignedBigInteger('matkul_id');
            $table->unsignedBigInteger('krs_detail_id')->nullable();
            $table->unsignedBigInteger('taka_id');
            $table->integer('semester');

            // KOMPONEN NILAI
            $table->decimal('tugas_1', 5, 2)->nullable(); // 0-100
            $table->decimal('tugas_2', 5, 2)->nullable();
            $table->decimal('tugas_3', 5, 2)->nullable();
            $table->decimal('quiz_1', 5, 2)->nullable();
            $table->decimal('quiz_2', 5, 2)->nullable();
            $table->decimal('uts', 5, 2)->nullable(); // Ujian Tengah Semester
            $table->decimal('uas', 5, 2)->nullable(); // Ujian Akhir Semester
            $table->decimal('praktikum', 5, 2)->nullable();
            $table->decimal('kehadiran', 5, 2)->nullable();

            // BOBOT NILAI (Persentase)
            $table->decimal('bobot_tugas', 5, 2)->default(20.00); // 20%
            $table->decimal('bobot_quiz', 5, 2)->default(10.00);  // 10%
            $table->decimal('bobot_uts', 5, 2)->default(30.00);   // 30%
            $table->decimal('bobot_uas', 5, 2)->default(35.00);   // 35%
            $table->decimal('bobot_praktikum', 5, 2)->default(0.00); // 0%
            $table->decimal('bobot_kehadiran', 5, 2)->default(5.00); // 5%

            // NILAI AKHIR
            $table->decimal('nilai_angka', 5, 2)->nullable(); // Nilai angka (0-100)
            $table->char('nilai_huruf', 2)->nullable(); // A, A-, B+, B, B-, C+, C, C-, D+, D, E
            $table->decimal('nilai_mutu', 4, 2)->nullable(); // 4.00, 3.67, 3.33, 3.00, dst
            $table->integer('sks'); // SKS mata kuliah
            $table->decimal('mutu_x_sks', 6, 2)->nullable(); // nilai_mutu * sks

            // STATUS NILAI
            $table->enum('status', ['Draft', 'Published', 'Locked'])->default('Draft');
            $table->timestamp('published_at')->nullable();
            $table->text('notes')->nullable();

            // REMIDI DAN SUSULAN
            $table->boolean('is_remidi')->default(false);
            $table->decimal('nilai_remidi', 5, 2)->nullable();
            $table->boolean('is_susulan')->default(false);

            // AUDIT TRACKING
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();

            // FOREIGN KEYS
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswas')->onDelete('cascade');
            $table->foreign('matkul_id')->references('id')->on('mata_kuliahs')->onDelete('cascade');
            $table->foreign('krs_detail_id')->references('id')->on('krs_details')->onDelete('set null');
            $table->foreign('taka_id')->references('id')->on('tahun_akademiks')->onDelete('cascade');

            // UNIQUE CONSTRAINT
            $table->unique(['mahasiswa_id', 'matkul_id', 'taka_id', 'semester']);

            // INDEXES
            $table->index(['mahasiswa_id', 'taka_id', 'semester']);
            $table->index(['matkul_id', 'taka_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilais');
    }
};
