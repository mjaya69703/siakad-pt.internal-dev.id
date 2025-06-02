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
        Schema::create('web_settings', function (Blueprint $table) {
            $table->id();

            // RELASI INTI
            $table->integer('taka_now')->nullable();         // TAHUN AKADEMIK SEKARANG

            // IDENTITY KAMPUS
            $table->string('school_apps');      // NAMA APLIKASI
            $table->string('school_name');      // NAMA KAMPUS
            $table->string('school_head');      // KEPALA UNIV / REKTOR
            $table->string('school_link');      // WEB KAMPUS
            $table->longText('school_desc');    // DESKRIPSI KAMPUS

            // LOGO
            $table->string('school_logo_vert')->default('logo-vert.png');       // LOGO KAMPUS VERTICAL
            $table->string('school_logo_hori')->default('logo-hori.png');       // LOGO KAMPUS HORIZONTAL

            // CONTACT INFO
            $table->string('school_email')->nullable();      // EMAIL KAMPUS
            $table->string('school_phone')->nullable();      // TELEPON KAMPUS

            // LOCATION INFO
            $table->string('school_address')->nullable();       // ALAMAT KAMPUS
            $table->string('school_longitude')->nullable();     // LONGITUDE KAMPUS
            $table->string('school_latitude')->nullable();      // LATITUDE KAMPUS

            // SOCIAL INFO
            $table->string('social_fb')->nullable();      // FACEBOOK KAMPUS
            $table->string('social_ig')->nullable();      // INSTAGRAM KAMPUS
            $table->string('social_in')->nullable();      // LINKEDIN KAMPUS
            $table->string('social_tw')->nullable();      // TWITTER / X KAMPUS

            // SYSTEM SETTINGS
            $table->boolean('maintenance_mode')->default(false);      // MODE MAINTENANCE
            $table->boolean('enable_captcha')->default(false);        // AKTIFKAN CAPTCHA
            $table->integer('max_login_attempts')->default(5);        // BATAS PERCOBAAN LOGIN

            // AUDIT TRACKING
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('web_settings');
    }
};
