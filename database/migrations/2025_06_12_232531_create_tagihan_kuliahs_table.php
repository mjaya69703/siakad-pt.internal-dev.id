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
        Schema::create('tagihan_kuliahs', function (Blueprint $table) {
            $table->id();
            $table->integer('taka_id');
            $table->integer('biaya_id')->nullable();
            $table->integer('biaya_pmb')->nullable();
            $table->integer('mahasiswa_id');
            
            $table->unsignedBigInteger('amount');
            $table->date('due_date');
            $table->enum('status', ['Pending', 'Sukses', 'Gagal'])->default('Pending');
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
        Schema::dropIfExists('tagihan_kuliahs');
    }
};
