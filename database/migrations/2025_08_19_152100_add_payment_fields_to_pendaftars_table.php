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
        Schema::table('pendaftars', function (Blueprint $table) {
            $table->string('bank_tujuan')->nullable()->after('status');
            $table->string('bank_pengirim')->nullable()->after('bank_tujuan');
            $table->string('nama_pengirim')->nullable()->after('bank_pengirim');
            $table->decimal('jumlah_transfer', 12, 2)->nullable()->after('nama_pengirim');
            $table->date('tanggal_transfer')->nullable()->after('jumlah_transfer');
            $table->string('bukti_pembayaran')->nullable()->after('tanggal_transfer');
            $table->text('catatan_transfer')->nullable()->after('bukti_pembayaran');
            $table->enum('status_pembayaran', ['pending', 'verified', 'rejected'])->default('pending')->after('catatan_transfer');
            $table->timestamp('tanggal_verifikasi_pembayaran')->nullable()->after('status_pembayaran');
            $table->text('catatan_verifikasi')->nullable()->after('tanggal_verifikasi_pembayaran');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pendaftars', function (Blueprint $table) {
            $table->dropColumn([
                'bank_tujuan',
                'bank_pengirim', 
                'nama_pengirim',
                'jumlah_transfer',
                'tanggal_transfer',
                'bukti_pembayaran',
                'catatan_transfer',
                'status_pembayaran',
                'tanggal_verifikasi_pembayaran',
                'catatan_verifikasi'
            ]);
        });
    }
};
