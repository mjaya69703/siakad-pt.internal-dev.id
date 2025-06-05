<?php

namespace Database\Seeders\Master;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Akademik\TahunAkademik;
use App\Models\Akademik\Fakultas;
use App\Models\Akademik\ProgramStudi;
use App\Models\Akademik\Kurikulum;
use App\Models\Akademik\WaktuKuliah;
use App\Models\Akademik\JenisKelas;
use App\Models\Akademik\Kelas;
use App\Models\Akademik\MataKuliah;
use App\Models\Akademik\JadwalKuliah;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class AkademikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jenisKelas = [
            [
                'name' => 'Regular',
                'code' => 'REG',
                'desc' => 'Kelas reguler dengan jadwal pagi',
                'status' => 'Aktif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Karyawan',
                'code' => 'KAR',
                'desc' => 'Kelas khusus karyawan dengan jadwal malam',
                'status' => 'Aktif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        JenisKelas::insert($jenisKelas);

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

        // Seed Waktu Kuliah
        $waktuKuliah = [
            [
                'jenis_kelas_id' => 1,
                'name' => 'Jam Kuliah ke 1',
                'code' => 'JK-01',
                'time_start' => '08:00',
                'time_ended' => '08:50',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'jenis_kelas_id' => 1,
                'name' => 'Jam Kuliah ke 2',
                'code' => 'JK-02',
                'time_start' => '09:00',
                'time_ended' => '09:50',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'jenis_kelas_id' => 1,
                'name' => 'Jam Kuliah ke 3',
                'code' => 'JK-03',
                'time_start' => '10:00',
                'time_ended' => '10:50',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'jenis_kelas_id' => 1,
                'name' => 'Jam Kuliah ke 4',
                'code' => 'JK-04',
                'time_start' => '11:00',
                'time_ended' => '11:50',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'jenis_kelas_id' => 1,
                'name' => 'Jam Kuliah ke 5',
                'code' => 'JK-05',
                'time_start' => '13:00',
                'time_ended' => '13:50',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'jenis_kelas_id' => 1,
                'name' => 'Jam Kuliah ke 6',
                'code' => 'JK-06',
                'time_start' => '14:00',
                'time_ended' => '14:50',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'jenis_kelas_id' => 1,
                'name' => 'Jam Kuliah ke 7',
                'code' => 'JK-07',
                'time_start' => '15:00',
                'time_ended' => '15:50',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'jenis_kelas_id' => 1,
                'name' => 'Jam Kuliah ke 8',
                'code' => 'JK-08',
                'time_start' => '16:00',
                'time_ended' => '16:50',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        WaktuKuliah::insert($waktuKuliah);

        // Seed Kelas (referencing existing Program Studi, Tahun Akademik, Jenis Kelas)
        $kelas = [
            [
                'taka_id' => 1,
                'prodi_id' => 1,
                'jenis_kelas_id' => 1,
                'ketua_id' => null,
                'capacity' => 50,
                'name' => 'Kelas A',
                'code' => 'A2024',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'taka_id' => 1,
                'prodi_id' => 1,
                'jenis_kelas_id' => 1,
                'ketua_id' => null,
                'capacity' => 45,
                'name' => 'Kelas B',
                'code' => 'B2024',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'taka_id' => 1,
                'prodi_id' => 2,
                'jenis_kelas_id' => 2,
                'ketua_id' => null,
                'capacity' => 30,
                'name' => 'Kelas X Karyawan',
                'code' => 'XK2024',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        Kelas::insert($kelas);

        // Seed Mata Kuliah (referencing existing Kurikulum, Program Studi, Dosen)
        // Assuming Dosen with id 1 and 2 exist
        $mataKuliah = [
            [
                'kurikulum_id' => 1,
                'prodi_id' => 1,
                'requi_id' => null,
                'dosen1_id' => 1,
                'dosen2_id' => null,
                'dosen3_id' => null,
                'semester' => 1,
                'photo' => 'default.png',
                'name' => 'Algoritma & Pemrograman',
                'code' => 'A&P101',
                'bsks' => '3',
                'desc' => 'Mempelajari dasar algoritma dan pemrograman',
                'docs_rps' => null,
                'docs_kontrak_kuliah' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kurikulum_id' => 1,
                'prodi_id' => 1,
                'requi_id' => 1,
                'dosen1_id' => 2,
                'dosen2_id' => 1,
                'dosen3_id' => null,
                'semester' => 2,
                'photo' => 'default.png',
                'name' => 'Struktur Data',
                'code' => 'SD201',
                'bsks' => '3',
                'desc' => 'Mempelajari berbagai struktur data',
                'docs_rps' => null,
                'docs_kontrak_kuliah' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kurikulum_id' => 2,
                'prodi_id' => 2,
                'requi_id' => null,
                'dosen1_id' => 2,
                'dosen2_id' => null,
                'dosen3_id' => null,
                'semester' => 1,
                'photo' => 'default.png',
                'name' => 'Pengantar Manajemen',
                'code' => 'PM101',
                'bsks' => '3',
                'desc' => 'Konsep dasar manajemen',
                'docs_rps' => null,
                'docs_kontrak_kuliah' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        MataKuliah::insert($mataKuliah);

        // Seed Jadwal Kuliah (referencing other models)
        // Assuming Dosen with id 1 & 2, Ruang with id 1 & 2, MataKuliah with id 1, 2, 3, JenisKelas with id 1 & 2, WaktuKuliah with id 1-8 exist
        $jadwalKuliahData = [
            [
                'dosen_id' => 1,
                'ruang_id' => 1,
                'matkul_id' => 1,
                'jenis_kelas_id' => 1,
                'waktu_kuliah_id' => 1,
                'bsks' => 3,
                'pertemuan' => 16,
                'hari' => 'Senin',
                'metode' => 'Tatap Muka',
                'tanggal' => '2025-01-13',
                'link' => null,
                'code' => 'JDW-' . Str::random(8),
            ],
            [
                'dosen_id' => 2,
                'ruang_id' => 2,
                'matkul_id' => 2,
                'jenis_kelas_id' => 1,
                'waktu_kuliah_id' => 3,
                'bsks' => 3,
                'pertemuan' => 16,
                'hari' => 'Selasa',
                'metode' => 'Tatap Muka',
                'tanggal' => '2025-01-14',
                'link' => null,
                'code' => 'JDW-' . Str::random(8),
            ],
            [
                'dosen_id' => 2,
                'ruang_id' => 2,
                'matkul_id' => 3,
                'jenis_kelas_id' => 2,
                'waktu_kuliah_id' => 8,
                'bsks' => 3,
                'pertemuan' => 16,
                'hari' => 'Rabu',
                'metode' => 'Teleconference',
                'tanggal' => '2025-01-15',
                'link' => 'https://meet.google.com/abc-def-ghi',
                'code' => 'JDW-' . Str::random(8),
            ]
        ];

        // Retrieve the seeded kelas to get their IDs
        $kelasA = Kelas::where('code', 'A2024')->first();
        $kelasB = Kelas::where('code', 'B2024')->first();
        $kelasXK = Kelas::where('code', 'XK2024')->first();

        // Create JadwalKuliah and attach classes
        foreach ($jadwalKuliahData as $data) {
            $jadwalKuliah = JadwalKuliah::create($data);

            // Attach classes based on matkul_id
            if ($jadwalKuliah->matkul_id === 1 && $kelasA && $kelasB) {
                $jadwalKuliah->kelas()->attach([$kelasA->id, $kelasB->id]);
            } elseif ($jadwalKuliah->matkul_id === 2 && $kelasA) {
                $jadwalKuliah->kelas()->attach([$kelasA->id]);
            } elseif ($jadwalKuliah->matkul_id === 3 && $kelasXK) {
                $jadwalKuliah->kelas()->attach([$kelasXK->id]);
            }
        }
    }
}
