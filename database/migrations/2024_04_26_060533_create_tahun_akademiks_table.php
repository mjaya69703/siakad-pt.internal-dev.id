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
            $table->string('name'); // NAMA PERIODE TAHUN AKADEMIK ex: Tahun Akademik 2023/2024 Ganjil
            $table->string('code')->unique(); // KODE TAHUN AKADEMIK ex: Kode Semester - Tahun Akademik => Semester 2 - TA. 2023/2024 => 022023
            $table->integer('semester');
            $table->year('year_start');
            $table->integer('is_active')->default(0);
            $table->timestamps();
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
