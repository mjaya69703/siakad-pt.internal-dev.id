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
        Schema::create('f_b_perkuliahans', function (Blueprint $table) {
            $table->id();
            $table->string('fb_users_code');              // Kode Mahasiswa ( IDENTITAS ANONIM )
            $table->string('fb_jakul_code');              // Kode Jadwal Perkuliahan
            $table->string('fb_code')->unique();          // Kode FeedBack
            $table->enum('fb_score' ,['Tidak Puas', 'Cukup Puas', 'Sangat Puas']);
            $table->text('fb_reason');                    // Alasan Dari Rating
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('f_b_perkuliahans');
    }
};
