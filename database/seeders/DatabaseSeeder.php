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
            'email' => 'mjaya69703@gmail.com',
            'phone' => '080012345670',
            'password' => Hash::make('Admin123'),
            'status' => 1,
        ]);
        Dosen::create([
            'dsn_nidn' => str_pad(rand(0, 9999999999), 10, '0', STR_PAD_LEFT),
            'dsn_stat' => '1',
            'dsn_name' => 'Akun Demo Dosen',
            'dsn_code' => Str::random(6),
            'dsn_user' => 'dosen',
            'dsn_mail' => 'dosen@example.com',
            'dsn_phone' => '080012345671',
            'password' => Hash::make('Dosen123'),
        ]);
        Mahasiswa::create([
            'class_id' => '1',
            'mhs_nim' => str_pad(rand(0, 9999999999), 10, '0', STR_PAD_LEFT),
            'mhs_name' => 'Akun Demo Mahasiswa',
            'mhs_stat' => '1',
            'mhs_code' => Str::random(6),
            'mhs_user' => 'mahasiswa',
            'mhs_mail' => 'mahasiswa@example.com',
            'mhs_phone' => '080012345672',
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
            'code'       => 'RPG1-2023',
            'wave'       => 'Gelombang I',
            'taka_id'    => '1',
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

        // SEEDER KHUSUS DATA MASTER INVENTARIS
        \App\Models\Gedung::create([
            'name'       => 'Area Luar Gedung',
            'code'       => 'ALG',
        ]);
        \App\Models\Gedung::create([
            'name'       => 'Gedung A',
            'code'       => 'GDA',
        ]);
        \App\Models\Ruang::create([
            'gedu_id'    => '1',
            'floor'      => '0',
            'type'       => '1',
            'name'       => 'Kelas 101',
            'code'       => 'C-101',
        ]);

    }
}
