<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Update the enum to include D4
        DB::statement("ALTER TABLE program_studis MODIFY COLUMN title ENUM('D3', 'D4', 'S1', 'S2', 'S3')");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert back to original enum (remove D4)
        DB::statement("ALTER TABLE program_studis MODIFY COLUMN title ENUM('D3', 'S1', 'S2', 'S3')");
    }
};
