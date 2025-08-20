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
            // Personal Data
            $table->string('nik', 16)->nullable()->after('name');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable()->after('nik');
            $table->string('agama')->nullable()->after('jenis_kelamin');
            $table->string('tempat_lahir')->nullable()->after('agama');
            $table->date('tanggal_lahir')->nullable()->after('tempat_lahir');
            
            // Address Data
            $table->text('alamat_lengkap')->nullable()->after('tanggal_lahir');
            $table->string('rt', 3)->nullable()->after('alamat_lengkap');
            $table->string('rw', 3)->nullable()->after('rt');
            $table->string('desa_kelurahan')->nullable()->after('rw');
            $table->string('kecamatan')->nullable()->after('desa_kelurahan');
            $table->string('kota_kabupaten')->nullable()->after('kecamatan');
            $table->string('provinsi')->nullable()->after('kota_kabupaten');
            $table->string('kode_pos', 5)->nullable()->after('provinsi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pendaftars', function (Blueprint $table) {
            $table->dropColumn([
                'nik', 'jenis_kelamin', 'agama', 'tempat_lahir', 'tanggal_lahir',
                'alamat_lengkap', 'rt', 'rw', 'desa_kelurahan', 'kecamatan', 
                'kota_kabupaten', 'provinsi', 'kode_pos'
            ]);
        });
    }
};
