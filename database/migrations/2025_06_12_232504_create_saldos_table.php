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
        Schema::create('saldos', function (Blueprint $table) {
            $table->id();
            $table->integer('tagihan_id')->nullable();                                   // ID TAGIHAN OPSIONAL
            
            $table->string('code')->unique();                                            // KODE UNIQUE
            $table->enum('type', ['Pemasukan', 'Pengeluaran']);                          // TIPE SALDO
            $table->enum('status', ['Pending', 'Sukses', 'Gagal'])->default('Pending');  // STATUS SALDO
            $table->unsignedBigInteger('amount');                                        // NOMINAL SALDO
            $table->string('transaction_code')->unique();                                // KODE TRANSAKSI 
            $table->string('source');                                                    // SUMBER DANA 
            $table->text('desc')->nullable();                                       // DESKRIPSI

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
        Schema::dropIfExists('saldos');
    }
};
