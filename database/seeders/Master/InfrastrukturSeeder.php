<?php

namespace Database\Seeders\Master;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Infrastruktur\Gedung;
use App\Models\Infrastruktur\Ruang;
use App\Models\Infrastruktur\KategoriBarang;
use App\Models\Infrastruktur\Barang;
use App\Models\Infrastruktur\MutasiBarang;
use App\Models\Infrastruktur\PengadaanBarang;
use App\Models\Infrastruktur\InventarisBarang;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class InfrastrukturSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed Gedung
        $gedung = [
            [
                'name' => 'Gedung A',
                'code' => 'GDA',
                'photo' => 'gedung-a.jpg',
                'desc' => 'Gedung utama kampus',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Gedung B',
                'code' => 'GDB',
                'photo' => 'gedung-b.jpg',
                'desc' => 'Gedung laboratorium',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        Gedung::insert($gedung);

        // Seed Ruang
        $ruang = [
            [
                'gedung_id' => 1,
                'floor' => 1,
                'capacity' => 50,
                'name' => 'Ruang Kelas 101',
                'code' => 'RK101',
                'photo' => 'ruang-101.jpg',
                'type' => 'Ruang Kelas',
                'desc' => 'Ruang kelas untuk 50 orang',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'gedung_id' => 1,
                'floor' => 2,
                'capacity' => 30,
                'name' => 'Ruang Lab Komputer',
                'code' => 'RLK201',
                'photo' => 'lab-komputer.jpg',
                'type' => 'Ruang Khusus',
                'desc' => 'Laboratorium komputer dengan 30 PC',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'gedung_id' => 2,
                'floor' => 1,
                'capacity' => 20,
                'name' => 'Ruang Meeting',
                'code' => 'RM101',
                'photo' => 'ruang-meeting.jpg',
                'type' => 'Ruang Publik',
                'desc' => 'Ruang meeting untuk 20 orang',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        Ruang::insert($ruang);

        // Seed Kategori Barang
        $kategoriBarang = [
            [
                'name' => 'Elektronik',
                'code' => 'ELK',
                'slug' => 'elektronik',
                'desc' => 'Barang-barang elektronik',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Furniture',
                'code' => 'FRN',
                'slug' => 'furniture',
                'desc' => 'Perabotan dan furniture',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        KategoriBarang::insert($kategoriBarang);

        // Seed Barang
        $barang = [
            [
                'kategori_id' => 1,
                'name' => 'Laptop',
                'code' => 'LPT001',
                'merk' => 'Lenovo',
                'photo' => 'laptop.jpg',
                'satuan' => 'Unit',
                'jumlah' => 10,
                'desc' => 'Laptop untuk dosen',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kategori_id' => 1,
                'name' => 'Proyektor',
                'code' => 'PRJ001',
                'merk' => 'Epson',
                'photo' => 'proyektor.jpg',
                'satuan' => 'Unit',
                'jumlah' => 5,
                'desc' => 'Proyektor untuk ruang kelas',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kategori_id' => 2,
                'name' => 'Meja Dosen',
                'code' => 'MD001',
                'merk' => 'IKEA',
                'photo' => 'meja-dosen.jpg',
                'satuan' => 'Unit',
                'jumlah' => 15,
                'desc' => 'Meja untuk dosen',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        Barang::insert($barang);

        // Seed Mutasi Barang
        $mutasiBarang = [
            [
                'barang_id' => 1,
                'lokasi_awal' => 1,
                'lokasi_akhir' => 2,
                'jumlah' => 2,
                'code' => 'MUT-' . Str::random(8),
                'photo' => 'mutasi-1.jpg',
                'kondisi' => 'Baik',
                'status' => 'Aktif',
                'desc' => 'Mutasi untuk maintenance',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'barang_id' => 2,
                'lokasi_awal' => 2,
                'lokasi_akhir' => 3,
                'jumlah' => 1,
                'code' => 'MUT-' . Str::random(8),
                'photo' => 'mutasi-2.jpg',
                'kondisi' => 'Baik',
                'status' => 'Aktif',
                'desc' => 'Mutasi untuk presentasi',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        MutasiBarang::insert($mutasiBarang);

        // Seed Pengadaan Barang
        $pengadaanBarang = [
            [
                'barang_id' => 1,
                'code' => 'PGB-' . Str::random(8),
                'jumlah' => 5,
                'harga_satuan' => 15000000,
                'total_harga' => 75000000,
                'sumber_dana' => 'BOS',
                'tanggal_pengadaan' => '2024-03-01',
                'tanggal_pembelian' => '2024-03-15',
                'status' => 'Disetujui',
                'desc' => 'Pengadaan laptop baru',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'barang_id' => 2,
                'code' => 'PGB-' . Str::random(8),
                'jumlah' => 3,
                'harga_satuan' => 12000000,
                'total_harga' => 36000000,
                'sumber_dana' => 'BOS',
                'tanggal_pengadaan' => '2024-03-05',
                'tanggal_pembelian' => '2024-03-20',
                'status' => 'Disetujui',
                'desc' => 'Pengadaan proyektor baru',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        PengadaanBarang::insert($pengadaanBarang);

        // Seed Inventaris Barang
        $inventarisBarang = [
            [
                'barang_id' => 1,
                'lokasi_id' => 1,
                'jumlah' => 3,
                'photo' => 'inv-laptop.jpg',
                'kondisi' => 'Baik',
                'status' => 'Aktif',
                'code' => 'INV-' . Str::random(8),
                'desc' => 'Laptop untuk dosen',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'barang_id' => 2,
                'lokasi_id' => 2,
                'jumlah' => 2,
                'photo' => 'inv-proyektor.jpg',
                'kondisi' => 'Baik',
                'status' => 'Aktif',
                'code' => 'INV-' . Str::random(8),
                'desc' => 'Proyektor untuk lab',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'barang_id' => 3,
                'lokasi_id' => 3,
                'jumlah' => 5,
                'photo' => 'inv-meja.jpg',
                'kondisi' => 'Baik',
                'status' => 'Aktif',
                'code' => 'INV-' . Str::random(8),
                'desc' => 'Meja untuk ruang meeting',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        InventarisBarang::insert($inventarisBarang);
    }
}
