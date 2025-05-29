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
        Schema::create('tahun_akademiks', function (Blueprint $table) {
            $table->id();
            $table->string('name');                                         // NAMA
            $table->enum('type', ['Ganjil', 'Genap']);                      // TIPE SEMESTER
            $table->string('code')->unique();                               // KODE
            $table->date('start_date');                                     // TANGGAL MULAI
            $table->date('ended_date');                                     // TANGGAL BERAKHIR
            $table->longText('desc')->nullable();                                       // DESKRIPSI
            $table->enum('status', ['Aktif', 'Tidak Aktif'])->default('Tidak Aktif');     // TAHUN AKADEMIK SEKARANG

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
        Schema::dropIfExists('tahun_akademiks');
    }
};
