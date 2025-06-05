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
        Schema::create('biaya_pendaftarans', function (Blueprint $table) {
            $table->id();
            // RELASI INTI
            $table->integer('jalur_id');        // JALUR PENDAFTARAN

            $table->string('name');             // NAMA BIAYA
            $table->string('code')->unique();   // KODE
            $table->longText('desc')->nullable();   // DESKRIPSI
            $table->bigInteger('value');        // NONIMAL BIAYA

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
        Schema::dropIfExists('biaya_pendaftarans');
    }
};
