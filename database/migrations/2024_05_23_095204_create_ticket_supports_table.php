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
        Schema::create('ticket_supports', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->integer('dept_id');             // DEPARTEMEN ID
            $table->integer('user_id');             // MAHASISWA ID
            $table->integer('stat_id')->default(0); // STATUS ID => 0 = OPEN ; 1 = IN PROGRESS ; 2 = CLOSED ; 3 = ON HOLD ; 4 = PENDING RESPONSE
            $table->integer('prio_id');             // PRIORITY ID => 1 = LOW ; 2 = MEDIUM ; 3 = HIGH ; 4 = URGENT
            $table->string('subject');              // SUBJECT MESSAGE
            $table->string('message');              // MESSAGE
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_supports');
    }
};
