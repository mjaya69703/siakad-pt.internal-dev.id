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
        Schema::create('jenis_kelas', function (Blueprint $table) {
            $table->id();
            
            $table->string('name');                                                   // NAMA JENIS KELAS
            $table->string('code')->unique();                                         // KODE JENIS KELAS
            $table->text('desc');                                                     // DESKRIPSI
            $table->enum('status', ['Aktif', 'Tidak Aktif'])->default('Aktif');       // DESKRIPSI

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
        Schema::dropIfExists('jenis_kelas');
    }
};
