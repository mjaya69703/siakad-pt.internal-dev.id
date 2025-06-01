<?php

namespace Database\Seeders\Master;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Publikasi\Kategori;

class PublikasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategoris = [
            [
                'name' => 'Akademik',
                'desc' => 'Kategori untuk berita, pengumuman, dan galeri terkait kegiatan akademik seperti perkuliahan, penelitian, dan pengabdian masyarakat.',
            ],
            [
                'name' => 'Kemahasiswaan',
                'desc' => 'Kategori untuk berita, pengumuman, dan galeri terkait kegiatan kemahasiswaan seperti organisasi, UKM, dan event kampus.',
            ],
            [
                'name' => 'Beasiswa',
                'desc' => 'Kategori untuk berita dan pengumuman terkait informasi beasiswa, baik internal maupun eksternal kampus.',
            ],
            [
                'name' => 'Event',
                'desc' => 'Kategori untuk berita, pengumuman, dan galeri terkait event atau acara yang diselenggarakan di kampus.',
            ],
            [
                'name' => 'Prestasi',
                'desc' => 'Kategori untuk berita dan galeri terkait prestasi yang diraih oleh mahasiswa, dosen, atau institusi.',
            ],
            [
                'name' => 'Kerjasama',
                'desc' => 'Kategori untuk berita dan pengumuman terkait kerjasama dengan institusi lain, baik dalam maupun luar negeri.',
            ],
            [
                'name' => 'Fasilitas',
                'desc' => 'Kategori untuk berita, pengumuman, dan galeri terkait fasilitas kampus dan pengembangannya.',
            ],
            [
                'name' => 'Alumni',
                'desc' => 'Kategori untuk berita dan galeri terkait kegiatan dan prestasi alumni.',
            ],
            [
                'name' => 'Penerimaan Mahasiswa',
                'desc' => 'Kategori untuk berita dan pengumuman terkait penerimaan mahasiswa baru dan informasi pendaftaran.',
            ],
            [
                'name' => 'Wisuda',
                'desc' => 'Kategori untuk berita, pengumuman, dan galeri terkait kegiatan wisuda dan kelulusan mahasiswa.',
            ],
        ];

        foreach ($kategoris as $kategori) {
            Kategori::create([
                'name' => $kategori['name'],
                'code' => 'KTG-' . strtoupper(Str::random(8)),
                'slug' => Str::slug($kategori['name']),
                'desc' => $kategori['desc'],
                'created_by' => 1
            ]);
        }
    }
}
