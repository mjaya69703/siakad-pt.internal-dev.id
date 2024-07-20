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
        Schema::create('menu_settings', function (Blueprint $table) {
            $table->id();
            $table->integer('locate')->default(0);              # 0 = FRONT MENU; 1 = GLOBAL MENU; 2 = USER MENU; 
            $table->integer('target')->default(0);              # 0 = FRONT MENU; 1 = GLOBAL MENU; 2 = USER MENU; 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
    */
    public function down(): void
    {
        Schema::dropIfExists('menu_settings');
    }
};
