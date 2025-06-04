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

        // TAGIHAN KULIAH
        \App\Models\TagihanKuliah::create([
            'users_id'    => '1',
            'name'    => 'UKT Semester 1',
            'code'    => 'UKT-'.Str::random(8),
            'price'    => '2400000',
        ]);
        // TAGIHAN KULIAH
        \App\Models\TagihanKuliah::create([
            'proku_id'    => '1',
            'name'    => 'UKT Semester 2',
            'code'    => 'UKT-'.Str::random(8),
            'price'    => '2200000',
        ]);
        // DEFAULT TUGAS SEEDER
        \App\Models\studentTask::create([
            'dosen_id'    => '1',
            'jadkul_id'    => '1',
            'code'    => Str::random(8),
            'title'    => 'First Task',
            'detail_task'    => 'First Task Deskription',
            'exp_date'  => Carbon::now()->addDays(7),
            'exp_time'  => Carbon::now()->addHours(12),
        ]);
        \App\Models\studentTask::create([
            'dosen_id'    => '1',
            'jadkul_id'    => '2',
            'code'    => Str::random(8),
            'title'    => 'First Task',
            'detail_task'    => 'First Task Deskription',
            'exp_date'  => Carbon::now()->addDays(7),
            'exp_time'  => Carbon::now()->addHours(12),
        ]);
        \App\Models\studentTask::create([
            'dosen_id'    => '1',
            'jadkul_id'    => '3',
            'code'    => Str::random(8),
            'title'    => 'Second Task',
            'detail_task'    => 'Second Task Deskription',
            'exp_date'  => Carbon::now()->addDays(7),
            'exp_time'  => Carbon::now()->addHours(12),
        ]);
        \App\Models\studentTask::create([
            'dosen_id'    => '1',
            'jadkul_id'    => '4',
            'code'    => Str::random(8),
            'title'    => 'Second Task',
            'detail_task'    => 'Second Task Deskription',
            'exp_date'  => Carbon::now()->addDays(7),
            'exp_time'  => Carbon::now()->addHours(12),
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
        ]);

    }
}
