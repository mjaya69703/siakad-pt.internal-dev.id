<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdateProgramStudiJenjangSeeder extends Seeder
{
    public function run(): void
    {
        // Update program studi berdasarkan level yang sudah ada
        DB::table('program_studis')->where('level', 'Diploma')->update(['jenjang_id' => 1]); // D4
        DB::table('program_studis')->where('level', 'Sarjana')->update(['jenjang_id' => 2]); // S1
        DB::table('program_studis')->where('level', 'Magister')->update(['jenjang_id' => 3]); // S2
        DB::table('program_studis')->where('level', 'Doktoral')->update(['jenjang_id' => 4]); // S3
    }
}
