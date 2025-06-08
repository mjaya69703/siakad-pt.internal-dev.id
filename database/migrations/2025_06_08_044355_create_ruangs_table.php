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
        Schema::create('ruangs', function (Blueprint $table) {
            $table->id();
            // RELASI INTI
            $table->integer('gedung_id');   // ID GEDUNG
        
            $table->integer('floor');       // LOKASI LANTAI GEDUNG
            $table->integer('capacity');    // KAPASITAS RUANGAN
            
            $table->string('name');         // NAMA RUANGAN
            $table->string('code')->unique();
            $table->string('photo')->nullable();
            $table->enum('type', ['Ruang Publik', 'Ruang Kelas', 'Ruang Pelayanan', 'Ruang Khusus', 'Gudang']);
            $table->text('desc')->nullable();

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
        Schema::dropIfExists('ruangs');
    }
};
