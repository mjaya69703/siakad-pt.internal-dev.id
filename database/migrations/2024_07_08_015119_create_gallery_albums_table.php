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
        Schema::create('gallery_albums', function (Blueprint $table) {
            $table->id();
            // $table->integer('photos_id');               // GALLERY PHOTOS ID
            $table->integer('author_id');               // ID AUTHOR
            $table->string('name');                     // ALBUM NAME
            $table->string('slug');                     // ALBUM SLUG
            $table->string('desc');                     // DESC ALBUM
            $table->string('cover');                    // COVER ALBUM PHOTOS
            $table->integer('isPublish')->default(1);   // DEFAULT 1 = TRUE ; 0 = FALSE
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gallery_albums');
    }
};
