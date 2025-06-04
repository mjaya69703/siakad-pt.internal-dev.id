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
        Schema::create('waktu_kuliahs', function (Blueprint $table) {
            $table->id();
            // RELASI INTI
            $table->integer('jenis_kelas_id');          // ID JENIS KELAS

            // DATA
            $table->string('name');                     // NAMA JAM KULIAH  Example : Jam Kuliah ke 1
            $table->string('code')->unique();           // KODE JAM KULIAH  Example : JK-01
            $table->time('time_start');                 // WAKTU MULAI      Example : 08.00
            $table->time('time_ended');                 // WAKTU SELESAI    Example : 08.50

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
        Schema::dropIfExists('waktu_kuliahs');
    }
};
