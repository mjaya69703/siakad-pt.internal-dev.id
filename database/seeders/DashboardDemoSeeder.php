<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

// Models
use App\Models\Akademik\TahunAkademik;
use App\Models\Akademik\JenjangPendidikan;
use App\Models\Akademik\Fakultas;
use App\Models\Akademik\ProgramStudi;
use App\Models\Pengaturan\WebSetting;

class DashboardDemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Web Settings (just minimal data)
        try {
            WebSetting::updateOrCreate(
                ['id' => 1],
                [
                    'school_name' => 'Universitas Ibn Khaldun',
                    'school_apps' => 'SIAKAD PT',
                    'school_head' => 'Prof. Dr. H. Ahmad Mukri Aji, M.A',
                    'school_link' => 'https://uika-bogor.ac.id',
                    'school_desc' => 'Universitas Ibn Khaldun Bogor adalah perguruan tinggi swasta yang berkomitmen untuk memberikan pendidikan berkualitas.',
                    'school_address' => 'Jl. K.H. Sholeh Iskandar KM.2 Kedung Badak, Tanah Sereal, Kota Bogor',
                    'school_phone' => '+62 251 8316202',
                    'school_email' => 'info@uika-bogor.ac.id',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
            $this->command->info('Web settings created successfully!');
        } catch (\Exception $e) {
            $this->command->warn('Web settings already exist or column mismatch: ' . $e->getMessage());
        }

        // Create Academic Years
        try {
            $activeTahunAkademik = TahunAkademik::updateOrCreate(
                ['code' => '2024-GANJIL'],
                [
                    'name' => '2024/2025 Ganjil',
                    'type' => 'Ganjil',
                    'code' => '2024-GANJIL',
                    'status' => 'Aktif',
                    'start_date' => '2024-09-01',
                    'ended_date' => '2025-01-31',
                    'desc' => 'Tahun Akademik 2024/2025 Semester Ganjil',
                ]
            );
            
            // Add is_active column if it exists
            if (\Illuminate\Support\Facades\Schema::hasColumn('tahun_akademiks', 'is_active')) {
                $activeTahunAkademik->update(['is_active' => true]);
            }
            
            $this->command->info('Academic year created successfully!');
        } catch (\Exception $e) {
            $this->command->warn('Academic year creation failed or column mismatch: ' . $e->getMessage());
        }

        $this->command->info('Dashboard demo data seeded successfully!');
    }
}