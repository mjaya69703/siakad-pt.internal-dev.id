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
        Schema::create('k_h_s', function (Blueprint $table) {
            $table->id();

            // RELASI INTI
            $table->string('code')->unique();
            $table->unsignedBigInteger('mahasiswa_id');
            $table->unsignedBigInteger('taka_id');
            $table->integer('semester');

            // STATISTIK SEMESTER
            $table->integer('total_sks_tempuh')->default(0);
            $table->integer('total_sks_lulus')->default(0);
            $table->decimal('total_mutu', 8, 2)->default(0);
            $table->decimal('ips', 3, 2)->default(0); // Indeks Prestasi Semester

            // STATISTIK KUMULATIF
            $table->integer('total_sks_kumulatif')->default(0);
            $table->decimal('total_mutu_kumulatif', 8, 2)->default(0);
            $table->decimal('ipk', 3, 2)->default(0); // Indeks Prestasi Kumulatif

            // STATUS DAN PREDIKSI
            $table->enum('status_akademik', ['Aktif', 'Cuti', 'DO', 'Lulus', 'Non-Aktif'])->default('Aktif');
            $table->enum('prediksi_kelulusan', ['Tepat Waktu', 'Terlambat', 'Berisiko DO', 'Tidak Terprediksi'])->nullable();

            // PERINGKAT
            $table->integer('ranking_semester')->nullable(); // Ranking di semester ini
            $table->integer('ranking_angkatan')->nullable();  // Ranking di angkatan
            $table->integer('ranking_prodi')->nullable();     // Ranking di program studi

            // CATATAN
            $table->text('prestasi')->nullable(); // Prestasi yang diraih semester ini
            $table->text('catatan_akademik')->nullable(); // Catatan dari dosen PA
            $table->text('rekomendasi')->nullable(); // Rekomendasi untuk semester depan

            // STATUS GENERATE
            $table->enum('status_generate', ['Draft', 'Final', 'Published'])->default('Draft');
            $table->timestamp('published_at')->nullable();
            $table->boolean('is_locked')->default(false);

            // AUDIT TRACKING
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();

            // FOREIGN KEYS
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswas')->onDelete('cascade');
            $table->foreign('taka_id')->references('id')->on('tahun_akademiks')->onDelete('cascade');

            // UNIQUE CONSTRAINT
            $table->unique(['mahasiswa_id', 'taka_id', 'semester']);

            // INDEXES
            $table->index(['mahasiswa_id', 'semester']);
            $table->index(['taka_id', 'semester']);
            $table->index(['ipk']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('k_h_s');
    }
};
