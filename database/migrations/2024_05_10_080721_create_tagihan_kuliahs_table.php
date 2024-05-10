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
        Schema::create('tagihan_kuliahs', function (Blueprint $table) {
            $table->id();
            $table->string('proku_id')->default(0);     // TAGIHAN KEPADA ...
            $table->string('users_id')->default(0);     // TAGIHAN KEPADA ...
            $table->string('name');                     // NAMA TAGIHAN
            $table->string('code')->unique();                     // CODE TAGIHAN
            $table->string('price');                    // PRICE TAGIHAN
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tagihan_kuliahs');
    }
};
