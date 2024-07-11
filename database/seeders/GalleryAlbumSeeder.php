<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Connect to Models
use App\Models\GalleryAlbum;

class GalleryAlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $albums = [
            [
                'name' => 'Album A',
                'desc' => 'Deskripsi Album A',
                'cover' => 'images/gallery/album-a.jpg',
                'author_id' => 1,
                'isPublish' => 1,
                'slug' => 'album-a',
                'file_1' => 'images/gallery/album-b.jpg',
            ],
            [
                'name' => 'Album B',
                'desc' => 'Deskripsi Album B',
                'cover' => 'images/gallery/album-b.jpg',
                'author_id' => 2,
                'isPublish' => 1,
                'slug' => 'album-b',
                'file_1' => 'images/gallery/album-c.jpg',

            ],
            [
                'name' => 'Album C',
                'desc' => 'Deskripsi Album C',
                'cover' => 'images/gallery/album-c.jpg',
                'author_id' => 1,
                'isPublish' => 0,
                'slug' => 'album-c',
                'file_1' => 'images/gallery/album-a.jpg',

            ],
            // Tambahkan data lainnya sesuai kebutuhan
        ];

        // Masukkan data dummy ke dalam database
        foreach ($albums as $album) {
            GalleryAlbum::create($album);
        }
    }
}
