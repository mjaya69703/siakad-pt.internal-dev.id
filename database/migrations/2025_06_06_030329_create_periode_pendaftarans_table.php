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
        Schema::create('periode_pendaftarans', function (Blueprint $table) {
            $table->id();
            // RELASI INTI
            $table->integer('taka_id');

            $table->string('name');
            $table->string('code')->unique();
            $table->longText('desc')->nullable();   // DESKRIPSI
            $table->date('start_date');
            $table->date('ended_date');

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
        Schema::dropIfExists('periode_pendaftarans');
    }
};
