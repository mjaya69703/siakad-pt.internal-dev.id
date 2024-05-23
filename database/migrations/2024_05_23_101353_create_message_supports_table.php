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
        Schema::create('message_supports', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');         // STUDENT ID
            $table->integer('dept_id');         // USER ID
            $table->string('support_code');     // SUPPORT CODE
            $table->string('message');          // SUPPORT CODE
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('message_supports');
    }
};
