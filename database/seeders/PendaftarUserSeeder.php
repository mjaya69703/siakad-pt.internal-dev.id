<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PendaftarUser;
use Illuminate\Support\Facades\Hash;

class PendaftarUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create test pendaftar users
        PendaftarUser::create([
            'name' => 'Test Pendaftar',
            'email' => 'test@pendaftar.com',
            'phone' => '08123456789',
            'password' => Hash::make('password'),
            'status' => 'active',
            'email_verified_at' => now(),
        ]);

        PendaftarUser::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '08987654321',
            'password' => Hash::make('password123'),
            'status' => 'active',
            'email_verified_at' => now(),
        ]);

        PendaftarUser::create([
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'phone' => '08555666777',
            'password' => Hash::make('password123'),
            'status' => 'active',
            'email_verified_at' => now(),
        ]);
    }
}
