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
        Schema::table('mahasiswas', function (Blueprint $table) {
            $table->dropColumn([
                // pendidikan pertama
                'edu1_type',
                'edu1_place',
                'edu1_major',
                'edu1_average_score',
                'edu1_graduate_year',

                // pendidikan kedua
                'edu2_type',
                'edu2_place',
                'edu2_major',
                'edu2_average_score',
                'edu2_graduate_year',

                // pendidikan ketiga
                'edu3_type',
                'edu3_place',
                'edu3_major',
                'edu3_average_score',
                'edu3_graduate_year',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mahasiswas', function (Blueprint $table) {
            // restore kolom kalau di-rollback
            $table->enum('edu1_type', ['SMA/SMK', 'Diploma', 'Sarjana', 'Magister', 'Doktor'])->default('SMA/SMK');
            $table->string('edu1_place')->nullable();
            $table->string('edu1_major')->nullable();
            $table->string('edu1_average_score')->nullable();
            $table->string('edu1_graduate_year')->nullable();

            $table->enum('edu2_type', ['SMA/SMK', 'Diploma', 'Sarjana', 'Magister', 'Doktor'])->nullable();
            $table->string('edu2_place')->nullable();
            $table->string('edu2_major')->nullable();
            $table->string('edu2_average_score')->nullable();
            $table->string('edu2_graduate_year')->nullable();

            $table->enum('edu3_type', ['SMA/SMK', 'Diploma', 'Sarjana', 'Magister', 'Doktor'])->nullable();
            $table->string('edu3_place')->nullable();
            $table->string('edu3_major')->nullable();
            $table->string('edu3_average_score')->nullable();
            $table->string('edu3_graduate_year')->nullable();
        });
    }
};
