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
        Schema::create('history_tagihans', function (Blueprint $table) {
            $table->id();
            $table->integer('users_id');            // USERS ID
            $table->integer('stat')->default(0);    // STATUS PEMBAYARAN
            $table->string('tagihan_code');         // KODE TAGIHAN
            $table->string('desc');                 // DESKRIPSI TAMBAHAN
            $table->string('code')->unique();       // KODE PEMBAYARAN
            $table->string('snap_token')->nullable();       // KODE PEMBAYARAN
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_tagihans');
    }
};
