<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PendaftarUser;
use Illuminate\Support\Facades\Hash;

class TestPendaftarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PendaftarUser::create([
            'name' => 'Test Pendaftar',
            'email' => 'test@pendaftar.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
    }
}
