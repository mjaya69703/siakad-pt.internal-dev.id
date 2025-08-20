<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('pendaftars', function (Blueprint $table) {
            $table->unsignedBigInteger('pendaftar_user_id')->nullable()->after('mahasiswa_id');
            $table->foreign('pendaftar_user_id')->references('id')->on('pendaftar_users')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('pendaftars', function (Blueprint $table) {
            $table->dropForeign(['pendaftar_user_id']);
            $table->dropColumn('pendaftar_user_id');
        });
    }
};
