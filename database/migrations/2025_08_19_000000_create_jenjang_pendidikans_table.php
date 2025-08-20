<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('jenjang_pendidikans', function (Blueprint $table) {
            $table->id();
            $table->string('nama'); // e.g. Sarjana, Magister
            $table->string('singkatan'); // e.g. S1, S2
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jenjang_pendidikans');
    }
};
