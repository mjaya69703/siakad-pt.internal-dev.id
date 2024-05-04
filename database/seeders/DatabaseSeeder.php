<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Str;
Use Hash;
// DEFAULT AUTHENTIKASI
use App\Models\User;
use App\Models\Dosen;
use App\Models\Mahasiswa;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Administrator',
            'code' => Str::random(6),
            'user' => 'admin',
            'gend' => 'L',
            'email' => 'mjaya69703@gmail.com',
            'phone' => '080012345670',
            'password' => Hash::make('Admin123'),
            'status' => 1,
        ]);
        Dosen::create([
            'dsn_nidn' => str_pad(rand(0, 9999999999), 10, '0', STR_PAD_LEFT),
            'dsn_stat' => '1',
            'dsn_name' => 'Dosen A',
            'dsn_code' => Str::random(6),
            'dsn_user' => 'dosen.a',
            'dsn_gend' => 'L',
            'dsn_mail' => 'dosen.a@example.com',
            'dsn_phone' => '080012345671',
            'password' => Hash::make('Dosen123'),
        ]);
        Dosen::create([
            'dsn_nidn' => str_pad(rand(0, 9999999999), 10, '0', STR_PAD_LEFT),
            'dsn_stat' => '1',
            'dsn_name' => 'Dosen B',
            'dsn_code' => Str::random(6),
            'dsn_user' => 'dosen.b',
            'dsn_gend' => 'P',
            'dsn_mail' => 'dosen.b@example.com',
            'dsn_phone' => '080012345672',
            'password' => Hash::make('Dosen123'),
        ]);
        Dosen::create([
            'dsn_nidn' => str_pad(rand(0, 9999999999), 10, '0', STR_PAD_LEFT),
            'dsn_stat' => '1',
            'dsn_name' => 'Dosen C',
            'dsn_code' => Str::random(6),
            'dsn_user' => 'dosen.c',
            'dsn_gend' => 'P',
            'dsn_mail' => 'dosen.c@example.com',
            'dsn_phone' => '080012345673',
            'password' => Hash::make('Dosen123'),
        ]);
        Dosen::create([
            'dsn_nidn' => str_pad(rand(0, 9999999999), 10, '0', STR_PAD_LEFT),
            'dsn_stat' => '1',
            'dsn_name' => 'Dosen D',
            'dsn_code' => Str::random(6),
            'dsn_user' => 'dosen.d',
            'dsn_gend' => 'P',
            'dsn_mail' => 'dosen.d@example.com',
            'dsn_phone' => '080012345674',
            'password' => Hash::make('Dosen123'),
        ]);
        Mahasiswa::create([
            'class_id' => '1',
            'mhs_nim' => str_pad(rand(0, 9999999999), 10, '0', STR_PAD_LEFT),
            'mhs_name' => 'Mahasiswa A',
            'mhs_stat' => '1',
            'mhs_gend' => 'L',
            'mhs_code' => Str::random(6),
            'mhs_user' => 'mahasiswa.a',
            'mhs_mail' => 'mahasiswa.a@example.com',
            'mhs_phone' => '080012345670',
            'password' => Hash::make('Mahasiswa123'),
        ]);
        Mahasiswa::create([
            'class_id' => '1',
            'mhs_nim' => str_pad(rand(0, 9999999999), 10, '0', STR_PAD_LEFT),
            'mhs_name' => 'Mahasiswa B',
            'mhs_stat' => '1',
            'mhs_gend' => 'L',
            'mhs_code' => Str::random(6),
            'mhs_user' => 'mahasiswa.b',
            'mhs_mail' => 'mahasiswa.b@example.com',
            'mhs_phone' => '080012345671',
            'password' => Hash::make('Mahasiswa123'),
        ]);
        Mahasiswa::create([
            'class_id' => '2',
            'mhs_nim' => str_pad(rand(0, 9999999999), 10, '0', STR_PAD_LEFT),
            'mhs_name' => 'Mahasiswa C',
            'mhs_stat' => '1',
            'mhs_gend' => 'P',
            'mhs_code' => Str::random(6),
            'mhs_user' => 'mahasiswa.c',
            'mhs_mail' => 'mahasiswa.c@example.com',
            'mhs_phone' => '080012345672',
            'password' => Hash::make('Mahasiswa123'),
        ]);
        Mahasiswa::create([
            'class_id' => '2',
            'mhs_nim' => str_pad(rand(0, 9999999999), 10, '0', STR_PAD_LEFT),
            'mhs_name' => 'Mahasiswa D',
            'mhs_stat' => '1',
            'mhs_gend' => 'L',
            'mhs_code' => Str::random(6),
            'mhs_user' => 'mahasiswa.d',
            'mhs_mail' => 'mahasiswa.d@example.com',
            'mhs_phone' => '080012345673',
            'password' => Hash::make('Mahasiswa123'),
        ]);


        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // SEEDER KHUSUS DATA MASTER AKADEMIK
        \App\Models\Fakultas::create([
            'name'       => 'Fakultas Ilmu Komputer',
            'code'       => 'FIK',
            'head_id'    => '1',
        ]);
        \App\Models\ProgramStudi::create([
            'name'       => 'Teknik Informatika',
            'code'       => 'TI',
            'title'      => ', S.Kom',
            'head_id'    => '1',
            'faku_id'    => '1',
        ]);
        \App\Models\ProgramStudi::create([
            'name'       => 'Sistem Informasi',
            'code'       => 'SI',
            'title'      => ', S.Kom',
            'head_id'    => '1',
            'faku_id'    => '1',
        ]);
        \App\Models\TahunAkademik::create([
            'name'       => 'TA. 2023/2024',
            'code'       => '012023',
            'semester'   => 'Semester I',
            'year_start' => '2023',
        ]);
        \App\Models\TahunAkademik::create([
            'name'       => 'TA. 2023/2024',
            'code'       => '022023',
            'semester'   => 'Semester II',
            'year_start' => '2023',
        ]);
        \App\Models\ProgramKuliah::create([
            'name'       => 'Regular Pagi',
            'code'       => 'G1RP-2023',
            'wave'       => 'Gelombang I',
            'taka_id'    => '1',
            'pstudi_id'  => '1',
        ]);
        \App\Models\Kurikulum::create([
            'name'       => 'Kurikulum 2020',
            'code'       => 'K20',
            'desc'       => 'Kurikulum 2020 adalah kurikulum dirancang 25 Tahun',
            'year_start' => '2019',
            'year_ended' => '2024',
        ]);
        \App\Models\MataKuliah::create([
            'name'       => 'Jaringan Komputer Dasar',
            'code'       => 'JKD',
            'desc'       => 'Matakuliah yang membahas mengenai jaringan komputer dasar',
            'bsks'       => '20',
            'kuri_id'    => '1',
            'taka_id'    => '1',
            'dosen_1'    => '1',
            'dosen_2'    => '2',
            'pstudi_id'  => '1',
        ]);
        \App\Models\MataKuliah::create([
            'name'       => 'Jaringan Komputer Expert',
            'code'       => 'JKE',
            'desc'       => 'Matakuliah yang membahas mengenai jaringan komputer dasar',
            'bsks'       => '20',
            'kuri_id'    => '1',
            'taka_id'    => '2',
            'dosen_1'    => '2',
            'pstudi_id'  => '1',
        ]);
        \App\Models\Kelas::create([
            'name'       => 'TI-2023-RP-1A',
            'code'       => 'TI-2023-RP-1A',
            'capacity'   => '32',
            'dosen_id'   => '1',
            'proku_id'   => '1',
            'taka_id'    => '1',
            'pstudi_id'  => '1',
        ]);
        \App\Models\Kelas::create([
            'name'       => 'TI-2023-RP-1B',
            'code'       => 'TI-2023-RP-1B',
            'capacity'   => '32',
            'dosen_id'   => '2',
            'proku_id'   => '1',
            'taka_id'    => '1',
            'pstudi_id'  => '1',
        ]);
        \App\Models\JadwalKuliah::create([
            'makul_id'  => '1',
            'kelas_id'  => '1',
            'dosen_id'  => '1',
            'ruang_id'  => '1',
            'pert_id'  => '1',
            'meth_id'  => '1',
            'days_id'  => '1',
            'bsks'  => '3',
            'code'  => Str::random(8),
            'date'  => '2024-04-30',
            'start'  => '11:00:00',
            'ended'  => '16:00:00',

        ]);
        \App\Models\JadwalKuliah::create([
            'makul_id'  => '1',
            'kelas_id'  => '2',
            'dosen_id'  => '1',
            'ruang_id'  => '1',
            'pert_id'  => '1',
            'meth_id'  => '1',
            'days_id'  => '1',
            'bsks'  => '3',
            'code'  => Str::random(8),
            'date'  => '2024-04-30',
            'start'  => '11:00:00',
            'ended'  => '16:00:00',

        ]);

        // SEEDER KHUSUS DATA MASTER INVENTARIS
        \App\Models\Gedung::create([
            'name'       => 'Area Luar Kampus',
            'code'       => 'ALK',
        ]);
        \App\Models\Gedung::create([
            'name'       => 'Area Sekitar Gedung',
            'code'       => 'ASG',
        ]);
        \App\Models\Gedung::create([
            'name'       => 'Gedung A',
            'code'       => 'GDA',
        ]);
        \App\Models\Ruang::create([
            'gedu_id'    => '3',
            'floor'      => '1',
            'type'       => '1',
            'name'       => 'Kelas 101',
            'code'       => 'C-101',
        ]);
        \App\Models\Ruang::create([
            'gedu_id'    => '3',
            'floor'      => '1',
            'type'       => '1',
            'name'       => 'Kelas 102',
            'code'       => 'C-102',
        ]);
        \App\Models\Ruang::create([
            'gedu_id'    => '3',
            'floor'      => '1',
            'type'       => '1',
            'name'       => 'Kelas 103',
            'code'       => 'C-103',
        ]);

    }
}
