<?php

namespace Database\Seeders\Master;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Akademik\TahunAkademik;
use App\Models\Akademik\Fakultas;
use App\Models\Akademik\ProgramStudi;
use App\Models\Akademik\Kurikulum;
use Carbon\Carbon;

class AkademikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed Tahun Akademik
        $tahunAkademik = [
            [
                'name' => 'Tahun Akademik 2024/2025 Ganjil',
                'type' => 'Ganjil',
                'code' => '20241',
                'start_date' => '2024-09-01',
                'ended_date' => '2025-02-28',
                'desc' => 'Semester Ganjil Tahun Akademik 2024/2025',
                'status' => 'Aktif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Tahun Akademik 2024/2025 Genap',
                'type' => 'Genap',
                'code' => '20242',
                'start_date' => '2025-03-01',
                'ended_date' => '2025-08-31',
                'desc' => 'Semester Genap Tahun Akademik 2024/2025',
                'status' => 'Tidak Aktif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        TahunAkademik::insert($tahunAkademik);

        // Seed Fakultas
        $fakultas = [
            [
                'dekan_id' => 1,
                'name' => 'Fakultas Teknologi Informasi',
                'code' => 'FTI',
                'desc' => 'Fakultas yang fokus pada pengembangan teknologi informasi dan komunikasi',
                'slug' => 'fakultas-teknologi-informasi',
                'accreditation' => 'A',
                'objectives' => 'Menghasilkan lulusan yang kompeten dalam bidang teknologi informasi',
                'careers' => 'Software Engineer, Data Scientist, IT Consultant',
                'status' => 'Aktif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'dekan_id' => 2,
                'name' => 'Fakultas Ekonomi dan Bisnis',
                'code' => 'FEB',
                'desc' => 'Fakultas yang fokus pada pengembangan ilmu ekonomi dan bisnis',
                'slug' => 'fakultas-ekonomi-dan-bisnis',
                'accreditation' => 'A',
                'objectives' => 'Menghasilkan lulusan yang kompeten dalam bidang ekonomi dan bisnis',
                'careers' => 'Business Analyst, Accountant, Financial Advisor',
                'status' => 'Aktif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        Fakultas::insert($fakultas);

        // Seed Program Studi
        $programStudi = [
            [
                'fakultas_id' => 1,
                'kaprodi_id' => 3,
                'name' => 'Teknik Informatika',
                'code' => 'TI',
                'desc' => 'Program studi yang fokus pada pengembangan software dan sistem informasi',
                'slug' => 'teknik-informatika',
                'level' => 'Sarjana',
                'title' => 'S1',
                'title_start' => '',
                'title_ended' => 'S.Kom.',
                'accreditation' => 'A',
                'duration' => 8,
                'objectives' => 'Menghasilkan lulusan yang kompeten dalam pengembangan software',
                'careers' => 'Software Developer, System Analyst, Database Administrator',
                'status' => 'Aktif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'fakultas_id' => 2,
                'kaprodi_id' => 4,
                'name' => 'Manajemen',
                'code' => 'MNJ',
                'desc' => 'Program studi yang fokus pada pengembangan ilmu manajemen',
                'slug' => 'manajemen',
                'level' => 'Sarjana',
                'title' => 'S1',
                'title_start' => '',
                'title_ended' => 'S.E.',
                'accreditation' => 'A',
                'duration' => 8,
                'objectives' => 'Menghasilkan lulusan yang kompeten dalam bidang manajemen',
                'careers' => 'Business Manager, Marketing Manager, HR Manager',
                'status' => 'Aktif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        ProgramStudi::insert($programStudi);

        // Seed Kurikulum
        $kurikulum = [
            [
                'prodi_id' => 1,
                'taka_start' => 20241,
                'name' => 'Kurikulum Merdeka Belajar TI 2024',
                'code' => 'KMBTI24',
                'desc' => 'Kurikulum berbasis Merdeka Belajar untuk Program Studi Teknik Informatika',
                'status' => 'Masih Berlaku',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'prodi_id' => 2,
                'taka_start' => 20241,
                'name' => 'Kurikulum Merdeka Belajar MNJ 2024',
                'code' => 'KMBMNJ24',
                'desc' => 'Kurikulum berbasis Merdeka Belajar untuk Program Studi Manajemen',
                'status' => 'Masih Berlaku',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        Kurikulum::insert($kurikulum);
    }
}
