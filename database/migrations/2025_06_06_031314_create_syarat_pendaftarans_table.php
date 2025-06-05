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
        Schema::create('syarat_pendaftarans', function (Blueprint $table) {
            $table->id();
            // RELASI INTI
            $table->integer('jalur_id');        // JALUR PENDAFTARAN

            $table->string('name');             // NAMA SYARAT
            $table->string('code')->unique();   // KODE
            $table->longText('desc')->nullable();   // DESKRIPSI

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
        Schema::dropIfExists('syarat_pendaftarans');
    }
};
