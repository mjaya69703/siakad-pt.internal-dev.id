<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Str;
Use Hash;
use Carbon\Carbon;
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


        \App\Models\Pengaturan\WebSetting::create([
            'school_apps' => 'Neco Siakad',
            'school_name' => 'ESEC Academy',
            'school_head' => 'Dr. Mulawarman Frietz, M.Kom',
            'school_desc' => 'Membentuk Pemimpin Digital untuk Era Transformasi Global',
            'school_link' => 'https://instagram.com/mjaya69703',
            'school_email' => 'mjaya69703@gmail.com',
            'school_phone' => '+6281234567895',
            'school_address' => 'Jl. Raya Kedungjaya No. 1, Kedungjaya, Kec. Kedungjaya, Kabupaten Kedungjaya, Jawa Tengah 56271',
            'school_longitude' => '-7.266670',
            'school_latitude' => '110.416670',
            'social_ig' => 'https://instagram.com/mjaya69703',
            'social_fb' => 'https://facebook.com/kyouma052',
            'social_in' => 'https://id.linkedin.com/in/mjaya69703',
            'social_tw' => 'https://x.com/mjaya69703',
        ]);

        $this->call([
            UserSeeder::class,
            \Database\Seeders\Master\AkademikSeeder::class,
            \Database\Seeders\Master\PublikasiSeeder::class,
            \Database\Seeders\Master\PMBSeeder::class,
        ]);

    }
}
