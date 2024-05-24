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
            $table->string('code')->nullable()->unique();   // TICKET CODE
            $table->string('codr')->nullable();             // TICKET CODE REPLY
            $table->string('core')->unique();               // MESSAGE CODE
            $table->integer('dept_id');                     // DEPARTEMEN ID
            $table->integer('sent_to');                     // RECEIVER ID
            $table->integer('users_id')->nullable();        // MAHASISWA ID
            $table->integer('admin_id')->nullable();        // STAFF ID
            $table->integer('stat_id')->default(0);         // STATUS ID => 0 = OPEN ; 1 = IN PROGRESS ; 2 = CLOSED ; 3 = ON HOLD ; 4 = PENDING RESPONSE ; 5 = ANSWERED ; 6 = STUDENT REPLY
            $table->integer('prio_id')->default(0);         // PRIORITY ID => 0 = LOW ; 1 = MEDIUM ; 2 = HIGH ; 3 = URGENT
            $table->text('subject');                        // SUBJECT MESSAGE
            $table->longText('message');                    // MESSAGE
            $table->string('attach_1')->nullable();         // ATTACHMENT 1
            $table->string('attach_2')->nullable();         // ATTACHMENT 2
            $table->string('attach_3')->nullable();         // ATTACHMENT 3
            $table->string('attach_4')->nullable();         // ATTACHMENT 4
            $table->string('attach_5')->nullable();         // ATTACHMENT 5
            $table->string('attach_6')->nullable();         // ATTACHMENT 6
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
