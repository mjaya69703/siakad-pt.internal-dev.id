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
        Schema::create('rencana_studis', function (Blueprint $table) {
            $table->id();
            // INTI RELASI
            $table->integer('taka_regist');
            $table->integer('taka_active');
            $table->integer('semester');
            $table->integer('invoice_id')->nullable();

            
            $table->string('name');
            $table->string('code')->unique();
            $table->integer('bsks');
            $table->date('start_date');
            $table->date('ended_date');
            $table->longText('desc')->nullable();
            $table->timestamps();
        });

        Schema::create('matkul_rencana_studis', function (Blueprint $table) {
            $table->id();
            $table->integer('renstu_id');
            $table->integer('matkul_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rencana_studis');
    }
};
