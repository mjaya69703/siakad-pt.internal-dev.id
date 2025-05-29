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
        Schema::create('fakultas', function (Blueprint $table) {
            $table->id();
            // RELASI INTI
            $table->integer('dekan_id');

            $table->string('name');                                                 // Nama
            $table->string('code')->unique();                                       // Kode
            $table->longText('desc')->nullable();                                   // Deskripsi
            $table->string('slug')->unique();                                       // Slug
            // $table->enum('level', ['Diploma', 'Sarjana', 'Magister', 'Doktoral']);  // Jenjang Pendidikan
            // $table->enum('title', ['D3', 'S1', 'S2', 'S3']);                        // Jenjang Pendidikan
            // $table->string('title_start')->nullable();                              // Gelar Awal
            // $table->string('title_ended')->nullable();                              // Gelar Akhir
            $table->string('accreditation')->nullable();                            // Akreditasi
            // $table->integer('duration')->nullable();                                // Durasi
            $table->longText('objectives')->nullable();                             // Tujuan
            $table->longText('careers')->nullable();                                // Prospek Karir
            $table->enum('status', ['Aktif', 'Tidak Aktif'])->default('Aktif');     // Status

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
        Schema::dropIfExists('fakultas');
    }
};
