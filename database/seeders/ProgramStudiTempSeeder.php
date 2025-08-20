<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Akademik\ProgramStudi;
use App\Models\Akademik\JenjangPendidikan;

class ProgramStudiTempSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get the first jenjang
        $jenjang = JenjangPendidikan::first();
        
        if ($jenjang) {
            $programStudi = [
                [
                    'code' => 'SI',
                    'name' => 'Sistem Informasi',
                    'title' => 'S1',
                    'level' => 'Sarjana',
                    'jenjang_id' => $jenjang->id,
                    'fakultas_id' => 1,
                    'kaprodi_id' => 1,
                    'slug' => 'sistem-informasi',
                    'status' => 'Aktif'
                ],
                [
                    'code' => 'TI',
                    'name' => 'Teknik Informatika',
                    'title' => 'S1',
                    'level' => 'Sarjana',
                    'jenjang_id' => $jenjang->id,
                    'fakultas_id' => 1,
                    'kaprodi_id' => 1,
                    'slug' => 'teknik-informatika',
                    'status' => 'Aktif'
                ],
                [
                    'code' => 'MI',
                    'name' => 'Manajemen Informatika',
                    'title' => 'D3',
                    'level' => 'Diploma',
                    'jenjang_id' => $jenjang->id,
                    'fakultas_id' => 1,
                    'kaprodi_id' => 1,
                    'slug' => 'manajemen-informatika',
                    'status' => 'Aktif'
                ]
            ];
            
            foreach ($programStudi as $prodi) {
                ProgramStudi::updateOrCreate(
                    ['code' => $prodi['code']],
                    $prodi
                );
            }
            
            echo "Created/Updated Program Studi data\n";
        } else {
            echo "No Jenjang Pendidikan found\n";
        }
    }
}
