<?php

namespace Database\Seeders\Master;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PMB\PeriodePendaftaran;
use App\Models\PMB\JalurPendaftaran;
use App\Models\PMB\BiayaPendaftaran;
use App\Models\PMB\SyaratPendaftaran;
use App\Models\PMB\GelombangPendaftaran;
use App\Models\PMB\JadwalPMB;
use App\Models\Akademik\TahunAkademik;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class PMBSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed Periode Pendaftaran
        $periodePendaftaran = [
            [
                'taka_id' => 1, // Menggunakan Tahun Akademik 2024/2025 Ganjil
                'name' => 'Periode Pendaftaran 2024/2025 Ganjil',
                'code' => 'PP-20241',
                'desc' => 'Periode pendaftaran untuk tahun akademik 2024/2025 semester ganjil',
                'start_date' => '2024-06-01',
                'ended_date' => '2024-08-31',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'taka_id' => 2, // Menggunakan Tahun Akademik 2024/2025 Genap
                'name' => 'Periode Pendaftaran 2024/2025 Genap',
                'code' => 'PP-20242',
                'desc' => 'Periode pendaftaran untuk tahun akademik 2024/2025 semester genap',
                'start_date' => '2024-12-01',
                'ended_date' => '2025-02-28',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        PeriodePendaftaran::insert($periodePendaftaran);

        // Seed Jalur Pendaftaran
        $jalurPendaftaran = [
            [
                'periode_id' => 1,
                'name' => 'Jalur Reguler',
                'code' => 'JR-20241',
                'desc' => 'Jalur pendaftaran reguler untuk calon mahasiswa baru',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'periode_id' => 1,
                'name' => 'Jalur Beasiswa',
                'code' => 'JB-20241',
                'desc' => 'Jalur pendaftaran beasiswa untuk calon mahasiswa berprestasi',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'periode_id' => 2,
                'name' => 'Jalur Transfer',
                'code' => 'JT-20242',
                'desc' => 'Jalur pendaftaran untuk mahasiswa transfer dari perguruan tinggi lain',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        JalurPendaftaran::insert($jalurPendaftaran);

        // Seed Biaya Pendaftaran
        $biayaPendaftaran = [
            [
                'jalur_id' => 1,
                'name' => 'Biaya Pendaftaran Reguler',
                'code' => 'BPR-20241',
                'desc' => 'Biaya pendaftaran untuk jalur reguler',
                'value' => 500000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'jalur_id' => 2,
                'name' => 'Biaya Pendaftaran Beasiswa',
                'code' => 'BPB-20241',
                'desc' => 'Biaya pendaftaran untuk jalur beasiswa',
                'value' => 250000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'jalur_id' => 3,
                'name' => 'Biaya Pendaftaran Transfer',
                'code' => 'BPT-20242',
                'desc' => 'Biaya pendaftaran untuk jalur transfer',
                'value' => 750000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        BiayaPendaftaran::insert($biayaPendaftaran);

        // Seed Syarat Pendaftaran
        $syaratPendaftaran = [
            [
                'jalur_id' => 1,
                'name' => 'Ijazah SMA/SMK',
                'code' => 'SPR-20241-1',
                'desc' => 'Fotokopi ijazah SMA/SMK yang telah dilegalisir',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'jalur_id' => 1,
                'name' => 'SKHUN',
                'code' => 'SPR-20241-2',
                'desc' => 'Fotokopi SKHUN yang telah dilegalisir',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'jalur_id' => 2,
                'name' => 'Sertifikat Prestasi',
                'code' => 'SPB-20241-1',
                'desc' => 'Sertifikat prestasi akademik/non-akademik tingkat nasional',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        SyaratPendaftaran::insert($syaratPendaftaran);

        // Seed Gelombang Pendaftaran
        $gelombangPendaftaran = [
            [
                'jalur_id' => 1,
                'name' => 'Gelombang 1',
                'code' => 'GP-20241-1',
                'desc' => 'Gelombang pendaftaran pertama',
                'start_date' => '2024-06-01',
                'ended_date' => '2024-07-15',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'jalur_id' => 1,
                'name' => 'Gelombang 2',
                'code' => 'GP-20241-2',
                'desc' => 'Gelombang pendaftaran kedua',
                'start_date' => '2024-07-16',
                'ended_date' => '2024-08-31',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'jalur_id' => 2,
                'name' => 'Gelombang Beasiswa',
                'code' => 'GPB-20241-1',
                'desc' => 'Gelombang pendaftaran beasiswa',
                'start_date' => '2024-06-01',
                'ended_date' => '2024-07-31',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        GelombangPendaftaran::insert($gelombangPendaftaran);

        // Seed Jadwal PMB
        $jadwalPMB = [
            [
                'gelombang_id' => 1,
                'name' => 'Tes Tulis Gelombang 1',
                'type' => 'Tes',
                'code' => 'JPMB-20241-1',
                'desc' => 'Jadwal tes tulis untuk gelombang 1',
                'start_date' => '2024-07-20',
                'ended_date' => '2024-07-20',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'gelombang_id' => 1,
                'name' => 'Wawancara Gelombang 1',
                'type' => 'Wawancara',
                'code' => 'JPMB-20241-2',
                'desc' => 'Jadwal wawancara untuk gelombang 1',
                'start_date' => '2024-07-25',
                'ended_date' => '2024-07-25',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'gelombang_id' => 2,
                'name' => 'Tes Tulis Gelombang 2',
                'type' => 'Tes',
                'code' => 'JPMB-20241-3',
                'desc' => 'Jadwal tes tulis untuk gelombang 2',
                'start_date' => '2024-08-20',
                'ended_date' => '2024-08-20',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        JadwalPMB::insert($jadwalPMB);
    }
}
