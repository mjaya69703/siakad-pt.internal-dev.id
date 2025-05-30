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
        Schema::create('kurikulums', function (Blueprint $table) {
            $table->id();
            // RELASI INTI
            // $table->integer('taka_id');
            $table->integer('prodi_id');
            // $table->integer('semester');                
            $table->integer('taka_start');              // TAHUN AKADEMIK MULAI BERLAKU
            $table->integer('taka_ended')->nullable();  // TAHUN AKADEMIK TIDAK BERLAKU

            $table->string('name');                     // NAMA KURIKULUM
            $table->string('code')->unique();           // KODE KURIKULUM
            $table->longText('desc');                   // DESKRIPSI
            $table->enum('status', ['Masih Berlaku', 'Tidak Berlaku']);

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
        Schema::dropIfExists('kurikulums');
    }
};
