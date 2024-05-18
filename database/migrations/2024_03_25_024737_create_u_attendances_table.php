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
        Schema::create('u_attendances', function (Blueprint $table) {
            $table->id();
            $table->integer('absen_user_id');
            $table->tinyInteger('absen_approve')->default('0');
            // 0 => Auto Approve  , 1 => Pending      , 2 => Accepted           , 3 => Declined
            $table->tinyInteger('absen_type');
            // 0 => Absen Regular , 1 => Absen Lembur , 2 => Absen Sakit        , 3 => Keperluan Berobat
            // 4 => Masuk Telat   , 5 => Pulang Awal  , 6 => Keperluan Pribadi  , 7 => Cuti Tahunan
            $table->date('absen_date');
            $table->time('absen_time_in');
            $table->time('absen_time_out')->nullable();
            $table->longText('absen_desc')->nullable();
            $table->string('absen_proof')->nullable();
            $table->string('absen_code')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('u_attendances');
    }
};
