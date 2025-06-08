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
        Schema::create('mutasi_barangs', function (Blueprint $table) {
            $table->id();
            // RELASI INTI
            $table->integer('barang_id');       // ID BARANG
            $table->integer('lokasi_awal');     // ID RUANG LAMA
            $table->integer('lokasi_akhir');    // ID RUANG BARU

            $table->integer('jumlah');
            $table->string('code')->unique();
            $table->string('photo')->nullable();
            $table->enum('kondisi', ['Baik', 'Rusak Ringan', 'Rusak Berat']);
            $table->enum('status', ['Aktif', 'Tidak Aktif', 'Dihapus'])->default('Aktif');
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
        Schema::dropIfExists('mutasi_barangs');
    }
};
