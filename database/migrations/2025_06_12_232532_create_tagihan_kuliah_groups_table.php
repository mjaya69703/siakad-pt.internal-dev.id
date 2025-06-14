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
        Schema::create('tagihan_kuliah_groups', function (Blueprint $table) {
            $table->id();
            $table->string('name');                              // NAMA GROUP TAGIHAN
            $table->string('code')->unique();                              // NAMA GROUP TAGIHAN
            $table->string('slug')->unique();                              // NAMA GROUP TAGIHAN
            $table->integer('taka_id');                          // ID TAHUN AKADEMIK
            $table->unsignedBigInteger('amount');                // JUMLAH TAGIHAN
            $table->date('due_date');                            // TANGGAL JATUH TEMPO
            $table->text('desc')->nullable();                    // DESKRIPSI TAGIHAN
            
            // KRITERIA PENGELOMPOKAN
            $table->integer('prodi_id')->nullable();             // ID PROGRAM STUDI
            $table->integer('kelas_id')->nullable();             // ID KELAS
            $table->integer('gelombang_id')->nullable();         // ID GELOMBANG PENDAFTARAN
            $table->integer('jalur_id')->nullable();             // ID JALUR MASUK
            $table->integer('semester')->nullable();             // SEMESTER
            
            // STATUS GROUP
            $table->enum('status', ['Draft', 'Published', 'Archived'])->default('Draft');
            
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
        Schema::dropIfExists('tagihan_kuliah_groups');
    }
}; 