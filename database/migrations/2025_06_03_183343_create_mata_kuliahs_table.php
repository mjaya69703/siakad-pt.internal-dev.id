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
        Schema::create('mata_kuliahs', function (Blueprint $table) {
            $table->id();
            // RELAS INTI
            $table->integer('kurikulum_id');
            $table->integer('prodi_id');
            $table->integer('requi_id')->nullable();
            $table->integer('dosen1_id');
            $table->integer('dosen2_id')->nullable();
            $table->integer('dosen3_id')->nullable();

            $table->integer('semester');
            $table->string('photo')->default('default.png');
            $table->string('name');
            $table->string('code')->unique();
            $table->string('bsks');
            $table->text('desc');

            // DOKUMEN
            $table->string('docs_rps')->nullable();
            $table->string('docs_kontrak_kuliah')->nullable();
            
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
        Schema::dropIfExists('mata_kuliahs');
    }
};
