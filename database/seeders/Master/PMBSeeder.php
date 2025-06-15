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

        // Seed pendaftar
        $pendaftars = [
            [
                'mahasiswa_id' => 1, // Mahasiswa A
                'jalur_id' => 1, // Jalur Reguler
                'gelombang_id' => 1, // Gelombang 1
                'jenis_id' => 1, // Jenis Kuliah
                'prodi_1' => 1, // Pilihan Prodi 1
                'prodi_2' => 2, // Pilihan Prodi 2
                'phone' => '081234567890',
                'email' => 'mahasiswa.a@example.com',
                'name' => 'Mahasiswa A',
                'code' => Str::random(8),
                'numb_reg' => 'REG-' . date('Ymd') . '-0001',
                'register_date' => now(),
                'status' => 'Lulus',
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'mahasiswa_id' => 2, // Mahasiswa B
                'jalur_id' => 1, // Jalur Reguler
                'gelombang_id' => 2, // Gelombang 2
                'jenis_id' => 2, // Jenis Kuliah
                'prodi_1' => 2, // Pilihan Prodi 1
                'prodi_2' => 1, // Pilihan Prodi 2
                'phone' => '081234567891',
                'email' => 'mahasiswa.b@example.com',
                'name' => 'Mahasiswa B',
                'code' => Str::random(8),
                'numb_reg' => 'REG-' . date('Ymd') . '-0002',
                'register_date' => now(),
                'status' => 'Lulus',
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'mahasiswa_id' => 3, // Mahasiswa C
                'jalur_id' => 2, // Jalur Beasiswa
                'gelombang_id' => 1, // Gelombang 1
                'jenis_id' => 1, // Jenis Kuliah
                'prodi_1' => 2, // Pilihan Prodi 1
                'prodi_2' => 1, // Pilihan Prodi 2
                'phone' => '081234567892',
                'email' => 'mahasiswa.c@example.com',
                'name' => 'Mahasiswa C',
                'code' => Str::random(8),
                'numb_reg' => 'REG-' . date('Ymd') . '-0003',
                'register_date' => now(),
                'status' => 'Pending',
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'mahasiswa_id' => 4, // Mahasiswa D
                'jalur_id' => 2, // Jalur Beasiswa
                'gelombang_id' => 2, // Gelombang 2
                'jenis_id' => 1, // Jenis Kuliah
                'prodi_1' => 1, // Pilihan Prodi 1
                'prodi_2' => 2, // Pilihan Prodi 2
                'phone' => '081234567893',
                'email' => 'mahasiswa.d@example.com',
                'name' => 'Mahasiswa D',
                'code' => Str::random(8),
                'numb_reg' => 'REG-' . date('Ymd') . '-0004',
                'register_date' => now(),
                'status' => 'Pending',
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        foreach ($pendaftars as $pendaftar) {
            $pendaftarModel = \App\Models\Pendaftaran\Pendaftar::create($pendaftar);

            // Buat dokumen berdasarkan jalur pendaftaran
            if ($pendaftar['jalur_id'] == 1) { // Jalur Reguler
                // Ijazah SMA/SMK
                \App\Models\Pendaftaran\DokumenPMB::create([
                    'pendaftar_id' => $pendaftarModel->id,
                    'syarat_id' => 1, // ID dari syarat Ijazah SMA/SMK
                    'type' => 'Ijazah',
                    'name' => 'Ijazah SMA/SMK',
                    'path' => 'dokumen/pmb/' . $pendaftarModel->code . '/ijazah.pdf',
                    'code' => Str::random(8),
                    'status' => 'Pending', // Status dokumen selalu Pending saat pertama kali diupload
                    'desc' => 'Menunggu validasi dokumen',
                    'created_by' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);

                // SKHUN
                \App\Models\Pendaftaran\DokumenPMB::create([
                    'pendaftar_id' => $pendaftarModel->id,
                    'syarat_id' => 2, // ID dari syarat SKHUN
                    'type' => 'Transkrip',
                    'name' => 'SKHUN',
                    'path' => 'dokumen/pmb/' . $pendaftarModel->code . '/skhun.pdf',
                    'code' => Str::random(8),
                    'status' => 'Pending', // Status dokumen selalu Pending saat pertama kali diupload
                    'desc' => 'Menunggu validasi dokumen',
                    'created_by' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            } else { // Jalur Beasiswa
                // Sertifikat Prestasi
                \App\Models\Pendaftaran\DokumenPMB::create([
                    'pendaftar_id' => $pendaftarModel->id,
                    'syarat_id' => 3, // ID dari syarat Sertifikat Prestasi
                    'type' => 'Sertifikat',
                    'name' => 'Sertifikat Prestasi',
                    'path' => 'dokumen/pmb/' . $pendaftarModel->code . '/sertifikat.pdf',
                    'code' => Str::random(8),
                    'status' => 'Pending', // Status dokumen selalu Pending saat pertama kali diupload
                    'desc' => 'Menunggu validasi dokumen',
                    'created_by' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }
    }
}
