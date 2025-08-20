<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('program_studis', function (Blueprint $table) {
            $table->unsignedBigInteger('jenjang_id')->nullable()->after('fakultas_id');
            $table->foreign('jenjang_id')->references('id')->on('jenjang_pendidikans')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('program_studis', function (Blueprint $table) {
            $table->dropForeign(['jenjang_id']);
            $table->dropColumn('jenjang_id');
        });
    }
};
