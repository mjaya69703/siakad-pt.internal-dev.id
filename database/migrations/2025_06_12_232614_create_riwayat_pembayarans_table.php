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
        Schema::create('riwayat_pembayarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tagihan_kuliah_id')->constrained('tagihan_kuliahs');
            $table->foreignId('mahasiswa_id')->constrained('mahasiswas');
            
            // Payment Information
            $table->string('kode_pembayaran')->unique();
            $table->unsignedBigInteger('jumlah_bayar');
            $table->date('tgl_pembayaran');
            $table->enum('metode_pembayaran', ['Transfer Bank', 'Virtual Account', 'E-Wallet', 'Lainnya']);
            $table->enum('status_pembayaran', ['Pending', 'Sukses', 'Gagal', 'Dibatalkan'])->default('Pending');
            $table->text('keterangan')->nullable();
            
            // Reference to payment gateway if any
            $table->string('referensi_pembayaran')->nullable();
            $table->string('bank_pengirim')->nullable();
            $table->string('nama_pengirim')->nullable();
            $table->string('bukti_pembayaran')->nullable();
            
            // AUDIT TRACKING
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            
            // Indexes
            $table->index('kode_pembayaran');
            $table->index('tgl_pembayaran');
            $table->index('status_pembayaran');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_pembayarans');
    }
};
