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
        Schema::create('jadwal_p_m_b_s', function (Blueprint $table) {
            $table->id();
            // RELASI INTI
            $table->integer('gelombang_id');        // GELOMBANG PENDAFTARAN

            $table->string('name');             // NAMA JADWAL
            $table->enum('type', ['Pendaftaran', 'Tes', 'Wawancara', 'Pengumuman', 'Daftar Ulang']);
            $table->string('code')->unique();   // KODE
            $table->longText('desc')->nullable();   // DESKRIPSI
            $table->date('start_date');         // TANGGAL MULAI
            $table->date('ended_date');         // TANGGAL SELESAI

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
        Schema::dropIfExists('jadwal_p_m_b_s');
    }
};
