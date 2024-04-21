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
        Schema::create('dosens', function (Blueprint $table) {
            $table->id();
            // KONEKSI MODEL

            // DATA PRIBADI
            $table->integer('dsn_stat')->default(0);
            $table->string('dsn_nidn')->unique();
            $table->string('dsn_name');
            $table->string('dsn_code');
            $table->string('dsn_image')->default('default/default-profile.jpg');
            $table->string('dsn_birthplace')->nullable();
            $table->date('dsn_birthdate')->nullable();
            $table->string('dsn_gend')->nullable();

            // DATA AKUN
            $table->string('dsn_user')->unique();
            $table->string('password');
            $table->string('dsn_mail')->unique();
            $table->string('dsn_phone')->unique();

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
        Schema::dropIfExists('dosens');
    }
};
