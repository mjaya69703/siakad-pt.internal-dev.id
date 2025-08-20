<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Akademik\TahunAkademik;
use App\Models\PMB\PeriodePendaftaran;

class PeriodePMBSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $taka2024 = TahunAkademik::where('name', '2024/2025')->first();
        $taka2023 = TahunAkademik::where('name', '2023/2024')->first();

        if ($taka2024) {
            PeriodePendaftaran::create([
                'name' => 'Periode PMB 2024/2025 Gelombang 1',
                'code' => 'PRD-2024-G1',
                'taka_id' => $taka2024->id,
                'start_date' => '2024-01-01',
                'ended_date' => '2024-06-30',
                'desc' => 'Periode pendaftaran mahasiswa baru gelombang 1',
                'created_by' => 1
            ]);

            PeriodePendaftaran::create([
                'name' => 'Periode PMB 2024/2025 Gelombang 2',
                'code' => 'PRD-2024-G2',
                'taka_id' => $taka2024->id,
                'start_date' => '2024-07-01',
                'ended_date' => '2024-12-31',
                'desc' => 'Periode pendaftaran mahasiswa baru gelombang 2',
                'created_by' => 1
            ]);
        }

        if ($taka2023) {
            PeriodePendaftaran::create([
                'name' => 'Periode PMB 2023/2024',
                'code' => 'PRD-2023',
                'taka_id' => $taka2023->id,
                'start_date' => '2023-01-01',
                'ended_date' => '2023-12-31',
                'desc' => 'Periode pendaftaran mahasiswa baru tahun 2023/2024',
                'created_by' => 1
            ]);
        }
    }
}
