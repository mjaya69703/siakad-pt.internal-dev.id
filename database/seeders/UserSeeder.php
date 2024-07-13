<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Str;
Use Hash;
use Carbon\Carbon;
// DEFAULT AUTHENTIKASI
use App\Models\User;
use App\Models\Dosen;
use App\Models\Mahasiswa;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Administrator',
            'code' => Str::random(6),
            'user' => 'admin',
            'gend' => 'L',
            'email' => 'mjaya69703@gmail.com',
            'phone' => '080012345660',
            'password' => Hash::make('Admin123'),
            'status' => 1,
        ]);
        User::create([
            'name' => 'Staff Finance',
            'code' => Str::random(6),
            'user' => 'finance',
            'gend' => 'L',
            'type' => 1,
            'email' => 'finance@example.com',
            'phone' => '080012345661',
            'password' => Hash::make('Admin123'),
            'status' => 1,
        ]);
        User::create([
            'name' => 'Staff Officer',
            'code' => Str::random(6),
            'user' => 'officer',
            'gend' => 'L',
            'type' => 2,
            'email' => 'officer@example.com',
            'phone' => '080012345662',
            'password' => Hash::make('Admin123'),
            'status' => 1,
        ]);
        User::create([
            'name' => 'Staff Akademik',
            'code' => Str::random(6),
            'user' => 'academic',
            'gend' => 'L',
            'type' => 3,
            'email' => 'academic@example.com',
            'phone' => '080012345663',
            'password' => Hash::make('Admin123'),
            'status' => 1,
        ]);
        User::create([
            'name' => 'Staff Admin',
            'code' => Str::random(6),
            'user' => 'admin2',
            'gend' => 'L',
            'type' => 4,
            'email' => 'admin@example.com',
            'phone' => '080012345664',
            'password' => Hash::make('Admin123'),
            'status' => 1,
        ]);
        User::create([
            'name' => 'Staff Support',
            'code' => Str::random(6),
            'user' => 'support',
            'gend' => 'L',
            'type' => 5,
            'email' => 'support@example.com',
            'phone' => '080012345665',
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
            'taka_id' => '1',
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
            'taka_id' => '1',
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
            'taka_id' => '2',
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
            'taka_id' => '2',
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

    }
}
