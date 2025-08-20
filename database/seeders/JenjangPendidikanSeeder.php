<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenjangPendidikanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('jenjang_pendidikans')->insert([
            ['nama' => 'Diploma Tiga', 'singkatan' => 'D3', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Diploma Empat', 'singkatan' => 'D4', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Sarjana', 'singkatan' => 'S1', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Magister', 'singkatan' => 'S2', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Doktoral', 'singkatan' => 'S3', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
