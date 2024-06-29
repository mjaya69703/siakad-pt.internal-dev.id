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

            // IDENTITY KAMPUS
            $table->string('school_apps');      // NAMA APLIKASI
            $table->string('school_name');      // NAMA KAMPUS
            $table->string('school_head');      // KEPALA UNIV / REKTOR
            $table->string('school_logo')->default('website/site-logo.png');      // LOGO KAMPUS
            $table->string('school_link');      // WEB KAMPUS
            $table->longText('school_desc');      // KATA SAMBUTAN REKTOR

            // CONTACT INFO
            $table->string('school_email');      // WEB KAMPUS
            $table->string('school_phone');      // WEB KAMPUS

            // SOCIAL INFO
            $table->string('social_fb');      // FACEBOOK KAMPUS
            $table->string('social_ig');      // INSTAGRAM KAMPUS
            $table->string('social_in');      // LINKEDIN KAMPUS
            $table->string('social_tw');      // TWITTER / X KAMPUS
            
            $table->timestamps();
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
