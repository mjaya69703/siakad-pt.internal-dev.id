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
        Schema::create('program_studis', function (Blueprint $table) {
            $table->id();
            $table->integer('faku_id');  // ID Fakultas
            $table->string('name');      // Nama Program Studi
            $table->string('cnim')->unique();      // Kode Nomor Induk Mahasiswa
            $table->string('code')->unique();      // Kode Program Studi
            $table->string('slug')->unique();      // Slug Program Studi
            $table->integer('head_id');  // Kepala Program Studi
            $table->string('title');     // Gelar Program Studi
            $table->string('level');     // Jenjang Program Studi
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_studis');
    }
};
