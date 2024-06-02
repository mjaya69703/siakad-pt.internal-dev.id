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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->integer('auth_id');                                  // AUTHOR ID
            $table->integer('send_to');                                  // SEND TO => 0 = FOR ALL ; 1 = FOR STAFF ; 2 = FOR LECTURE ; 3 = FOR STUDENT
            $table->integer('dept_id')->nullable();                      // DEPT ID => FOR STAFF ONLY
            $table->integer('user_id')->nullable();                      // USER ID => FOR STAFF ONLY
            $table->integer('faku_id')->nullable();                      // FAKU ID => FOR LECTURE AND STUDENT
            $table->integer('prodi_id')->nullable();                     // CLASS ID => FOR STUDENT ONLY VIA PRODI
            $table->integer('proku_id')->nullable();                     // PROKU ID => FOR STUDENT ONLY VIA PROGRAM KULIAH
            $table->integer('class_id')->nullable();                     // CLASS ID => FOR STUDENT ONLY VIA KELAS
            $table->integer('student_id')->nullable();                   // STUDENT ID => FOR STUDENT ONLY
            $table->integer('lecture_id')->nullable();                   // LECTURE ID => FOR LECTURE ONLY
            $table->string('name');                                      // TITLE NOTIFICATION
            $table->string('slug');                                      // URL NOTIFICATION
            $table->string('type');                                      // CATEGORY NOTIFICATION
            $table->longText('desc');                                      // DESCRIPTION NOTIFICATION
            $table->string('code')->unique();                            // CODE NOTIFICATION
            $table->boolean('read')->default(false);              // MARK AS READ
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
