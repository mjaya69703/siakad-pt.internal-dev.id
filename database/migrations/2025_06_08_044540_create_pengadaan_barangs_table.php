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
        Schema::create('pengadaan_barangs', function (Blueprint $table) {
            $table->id();
            // RELASI INTI
            $table->integer('barang_id');
            
            $table->string('code')->unique();
            $table->integer('jumlah');
            $table->integer('harga_satuan');
            $table->integer('total_harga');
            $table->string('sumber_dana');
            $table->date('tanggal_pengadaan');
            $table->date('tanggal_pembelian');
            $table->enum('status', ['Pending', 'Disetujui', 'Tidak Disetujui'])->nullable();
            $table->text('desc')->nullable();
            
            // AUDIT TRACKING
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->unsignedBigInteger('accepted_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengadaan_barangs');
    }
};
