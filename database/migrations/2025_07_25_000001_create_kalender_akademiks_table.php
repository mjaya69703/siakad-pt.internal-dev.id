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
        Schema::create('kalender_akademiks', function (Blueprint $table) {
            $table->id();
            $table->string('name');                                          // JUDUL KEGIATAN
            $table->string('code')->unique();                               // KODE UNIK
            $table->longText('desc')->nullable();                           // DESKRIPSI KEGIATAN
            $table->date('start_date');                                      // TANGGAL MULAI
            $table->date('ended_date')->nullable();                         // TANGGAL SELESAI
            $table->enum('type', ['Perkuliahan', 'Ujian', 'Libur', 'Pendaftaran', 'Wisuda', 'Orientasi', 'Seminar', 'Lainnya'])->default('Lainnya'); // JENIS KEGIATAN
            $table->enum('status', ['Draft', 'Publish', 'Archive'])->default('Draft'); // STATUS
            $table->string('color', 7)->default('#007bff');                 // WARNA (HEX COLOR CODE)
            $table->enum('highlight', ['Ya', 'Tidak'])->default('Tidak');   // HIGHLIGHT
            $table->longText('note')->nullable();                           // CATATAN
            
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
        Schema::dropIfExists('kalender_akademiks');
    }
};
