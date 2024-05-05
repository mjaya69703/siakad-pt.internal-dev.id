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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            // KONEKSI MODEL
            $table->tinyInteger('type')->default('0');
            // DATA PRIBADI
            $table->string('code')->unique();
            $table->string('name');
            $table->string('image')->default('default/default-profile.jpg');
            $table->string('birth_place')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('gend')->nullable(); // GENDER
            $table->string('reli')->nullable(); // RELIGION
            // DATA KONTAK DARURAT
            $table->string('contact_name_1')->nullable();
            $table->string('contact_name_2')->nullable();
            $table->string('contact_phone_1')->nullable();
            $table->string('contact_phone_2')->nullable();
            // DATA AKUN
            $table->string('user');
            $table->string('phone')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            // VERIFIED TOKEN
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('users');
    }
};
