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
        Schema::table('dokumen_p_m_b_s', function (Blueprint $table) {
            // Make type, name, path, code, and desc nullable since they're not always required
            $table->string('type')->nullable()->change();
            $table->string('name')->nullable()->change();
            $table->string('path')->nullable()->change();
            $table->string('code')->nullable()->change();
            $table->text('desc')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dokumen_p_m_b_s', function (Blueprint $table) {
            // Revert to non-nullable
            $table->string('type')->nullable(false)->change();
            $table->string('name')->nullable(false)->change();
            $table->string('path')->nullable(false)->change();
            $table->string('code')->nullable(false)->change();
            $table->text('desc')->nullable(false)->change();
        });
    }
};
