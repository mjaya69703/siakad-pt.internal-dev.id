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
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            // KONEK MODEL
            $table->integer('taka_id')->default(0);
            $table->integer('years_id')->default(0);
            $table->integer('class_id')->default(0);
            // DATA PRIBADI
            $table->integer('mhs_stat')->default(0);
            $table->string('mhs_nim')->unique();
            $table->string('mhs_name');
            $table->string('mhs_code')->unique();
            $table->string('mhs_image')->default('default/default-profile.jpg');
            $table->string('mhs_birthplace')->nullable();
            $table->date('mhs_birthdate')->nullable();
            $table->string('mhs_gend')->nullable(); // Value L = Laki-laki ; P = Perempuan
            $table->string('mhs_reli')->nullable();
            $table->string('mhs_addr_domisili')->nullable();
            $table->string('mhs_addr_kelurahan')->nullable();
            $table->string('mhs_addr_kecamatan')->nullable();
            $table->string('mhs_addr_kota')->nullable();
            $table->string('mhs_addr_provinsi')->nullable();            // DATA ORANG TUA / WALI
            $table->string('mhs_parent_mother')->nullable();
            $table->string('mhs_parent_father')->nullable();
            $table->string('mhs_parent_mother_phone')->nullable();
            $table->string('mhs_parent_father_phone')->nullable();
            $table->string('mhs_wali_name')->nullable();
            $table->string('mhs_wali_phone')->nullable();

            // DATA AKUN
            $table->string('mhs_user')->unique();
            $table->string('password');
            $table->string('mhs_mail')->unique();
            $table->string('mhs_phone')->unique();
            // VERIFIED TOKEN
            $table->string('verify_token')->nullable();
            $table->timestamp('token_created_at')->nullable(); // new column
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};
