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
        Schema::create('absensis', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('status')->default('0');
            // 0 => Auto Approve  , 1 => Pending      , 2 => Accepted           , 3 => Declined
            $table->integer('type');
            // 0 => Absen Regular , 1 => Absen Lembur , 2 => Absen Sakit        , 3 => Keperluan Berobat
            // 4 => Masuk Telat   , 5 => Pulang Awal  , 6 => Keperluan Pribadi  , 7 => Cuti Tahunan
            $table->date('date');
            $table->time('time_in');
            $table->time('time_out')->nullable();
            $table->string('code')->unique();
            $table->string('photo_in');
            $table->string('photo_out')->nullable();
            $table->longText('desc')->nullable();
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
        Schema::dropIfExists('absensis');
    }
};
