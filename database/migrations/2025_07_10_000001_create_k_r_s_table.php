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
        Schema::create('k_r_s', function (Blueprint $table) {
            $table->id();

            // RELASI INTI
            $table->string('code')->unique();
            $table->unsignedBigInteger('mahasiswa_id');
            $table->unsignedBigInteger('taka_id');
            $table->unsignedBigInteger('semester');

            // STATUS DAN PERSETUJUAN
            $table->enum('status', ['Draft', 'Diajukan', 'Disetujui', 'Ditolak'])->default('Draft');
            $table->unsignedBigInteger('dosen_pa_id')->nullable(); // Dosen Pembimbing Akademik
            $table->timestamp('approved_at')->nullable();
            $table->text('notes')->nullable(); // Catatan dari dosen PA

            // STATISTIK KRS
            $table->integer('total_sks')->default(0);
            $table->integer('max_sks')->default(24); // Batas maksimal SKS
            $table->decimal('ipk_sebelumnya', 3, 2)->default(0);

            // PERIODE KRS
            $table->date('periode_mulai')->nullable();
            $table->date('periode_selesai')->nullable();

            // AUDIT TRACKING
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();

            // FOREIGN KEYS
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswas')->onDelete('cascade');
            $table->foreign('taka_id')->references('id')->on('tahun_akademiks')->onDelete('cascade');
            $table->foreign('dosen_pa_id')->references('id')->on('dosens')->onDelete('set null');

            // INDEXES
            $table->index(['mahasiswa_id', 'taka_id', 'semester']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('k_r_s');
    }
};
