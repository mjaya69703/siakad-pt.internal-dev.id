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
            'mhs_nim' => str_pad(rand(0, 9999999999), 10, '0', STR_PAD_LEFT),
            'mhs_name' => 'Akun Demo Mahasiswa',
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


    }
}
