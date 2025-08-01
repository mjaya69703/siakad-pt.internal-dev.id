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
        Schema::create('krs_details', function (Blueprint $table) {
            $table->id();

            // RELASI INTI
            $table->string('code')->unique();
            $table->unsignedBigInteger('krs_id');
            $table->unsignedBigInteger('matkul_id');
            $table->unsignedBigInteger('kelas_id')->nullable();
            $table->unsignedBigInteger('dosen_id')->nullable();

            // INFORMASI MATA KULIAH
            $table->integer('sks');
            $table->enum('status', ['Aktif', 'Batal', 'Mengulang'])->default('Aktif');
            $table->text('notes')->nullable();

            // PRASYARAT
            $table->boolean('prasyarat_terpenuhi')->default(true);
            $table->text('prasyarat_notes')->nullable();

            // AUDIT TRACKING
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();

            // FOREIGN KEYS
            $table->foreign('krs_id')->references('id')->on('k_r_s')->onDelete('cascade');
            $table->foreign('matkul_id')->references('id')->on('mata_kuliahs')->onDelete('cascade');
            $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('set null');
            $table->foreign('dosen_id')->references('id')->on('dosens')->onDelete('set null');

            // UNIQUE CONSTRAINT - Satu mahasiswa tidak bisa ambil mata kuliah yang sama di semester yang sama
            $table->unique(['krs_id', 'matkul_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('krs_details');
    }
};
