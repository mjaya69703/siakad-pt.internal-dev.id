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
            $table->string('file_1');         // FILENAME
            $table->string('file_2')->nullable();         // FILENAME
            $table->string('file_3')->nullable();         // FILENAME
            $table->string('file_4')->nullable();         // FILENAME
            $table->string('file_5')->nullable();         // FILENAME
            $table->string('file_6')->nullable();         // FILENAME
            $table->string('file_7')->nullable();         // FILENAME
            $table->string('file_8')->nullable();         // FILENAME
            $table->string('file_9')->nullable();         // FILENAME
            $table->string('file_10')->nullable();         // FILENAME
            $table->string('file_11')->nullable();         // FILENAME
            $table->string('file_12')->nullable();         // FILENAME
            $table->string('file_13')->nullable();         // FILENAME
            $table->string('file_14')->nullable();         // FILENAME
            $table->string('file_15')->nullable();         // FILENAME
            $table->string('file_16')->nullable();         // FILENAME
            $table->string('file_17')->nullable();         // FILENAME
            $table->string('file_18')->nullable();         // FILENAME
            $table->string('file_19')->nullable();         // FILENAME
            $table->string('file_20')->nullable();         // FILENAME
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
