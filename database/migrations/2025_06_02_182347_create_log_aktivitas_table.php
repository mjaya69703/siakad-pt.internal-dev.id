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
        Schema::create('log_aktivitas', function (Blueprint $table) {
            $table->id();
            // RELASI INTI
            $table->unsignedBigInteger('user_id');                                  // ID User yang melakukan aktivitas
            $table->string('user_type', 20);                                        // Tipe User (user/mahasiswa/dosen)
            $table->string('action', 20);                                           // Aksi (create/update/delete)
            $table->string('model_type');                                           // Tipe Model yang diubah
            $table->unsignedBigInteger('model_id');                                 // ID Model yang diubah
            $table->json('changes')->nullable();                                                // Perubahan (old & new values)
            $table->string('ip_address', 45)->nullable();                          // IP Address
            $table->text('user_agent')->nullable();                                // User Agent
            $table->string('description')->nullable();                             // Deskripsi aktivitas

            // AUDIT TRACKING
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();

            // INDEXES
            $table->index(['user_type', 'action']);
            $table->index(['model_type', 'model_id']);
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_aktivitas');
    }
};
