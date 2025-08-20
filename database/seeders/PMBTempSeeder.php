<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PMB\GelombangPendaftaran;
use App\Models\PMB\JalurPendaftaran;
use App\Models\PMB\JenisKelas;

class PMBTempSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Gelombang Pendaftaran
        GelombangPendaftaran::updateOrCreate(
            ['code' => 'G1'],
            [
                'name' => 'Gelombang 1',
                'status' => 'aktif',
                'start_date' => now(),
                'end_date' => now()->addMonths(3)
            ]
        );

        // Jalur Pendaftaran
        JalurPendaftaran::updateOrCreate(
            ['code' => 'REG'],
            [
                'name' => 'Reguler',
                'status' => 'aktif'
            ]
        );

        // Jenis Kelas
        JenisKelas::updateOrCreate(
            ['code' => 'REG'],
            [
                'name' => 'Reguler',
                'status' => 'aktif'
            ]
        );
    }
}
