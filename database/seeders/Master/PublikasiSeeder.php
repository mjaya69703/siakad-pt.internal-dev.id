<?php

namespace Database\Seeders\Master;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Publikasi\Kategori;
use App\Models\Publikasi\KalenderAkademik;
use App\Models\Publikasi\Pengumuman;

class PublikasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $events = [
            [
                'name' => 'Awal Perkuliahan Semester Ganjil 2024/2025',
                'code' => 'KAL-' . strtoupper(Str::random(8)),
                'desc' => 'Dimulainya perkuliahan untuk semester ganjil tahun akademik 2024/2025',
                'start_date' => '2024-09-04',
                'ended_date' => null,
                'type' => 'Perkuliahan',
                'status' => 'Publish',
                'color' => '#28a745',
                'highlight' => 'Ya',
                'note' => 'Mahasiswa wajib hadir tepat waktu'
            ],
            [
                'name' => 'Ujian Tengah Semester (UTS)',
                'code' => 'KAL-' . strtoupper(Str::random(8)),
                'desc' => 'Pelaksanaan Ujian Tengah Semester untuk semua program studi',
                'start_date' => '2024-10-15',
                'ended_date' => '2024-10-26',
                'type' => 'Ujian',
                'status' => 'Publish',
                'color' => '#ffc107',
                'highlight' => 'Ya',
                'note' => 'Jadwal ujian akan diumumkan 2 minggu sebelumnya'
            ],
            [
                'name' => 'Libur Semester',
                'code' => 'KAL-' . strtoupper(Str::random(8)),
                'desc' => 'Libur semester ganjil',
                'start_date' => '2024-12-23',
                'ended_date' => '2025-01-08',
                'type' => 'Libur',
                'status' => 'Publish',
                'color' => '#dc3545',
                'highlight' => 'Tidak',
                'note' => 'Aktivitas akademik dihentikan sementara'
            ],
            [
                'name' => 'Ujian Akhir Semester (UAS)',
                'code' => 'KAL-' . strtoupper(Str::random(8)),
                'desc' => 'Pelaksanaan Ujian Akhir Semester',
                'start_date' => '2024-12-11',
                'ended_date' => '2024-12-22',
                'type' => 'Ujian',
                'status' => 'Publish',
                'color' => '#fd7e14',
                'highlight' => 'Ya',
                'note' => 'Ujian wajib diikuti oleh seluruh mahasiswa'
            ],
            [
                'name' => 'Pendaftaran Semester Genap 2024/2025',
                'code' => 'KAL-' . strtoupper(Str::random(8)),
                'desc' => 'Pembukaan pendaftaran dan registrasi untuk semester genap',
                'start_date' => '2025-01-01',
                'ended_date' => '2025-01-15',
                'type' => 'Pendaftaran',
                'status' => 'Publish',
                'color' => '#20c997',
                'highlight' => 'Ya',
                'note' => 'Pembayaran SPP dan pengisian KRS'
            ],
            [
                'name' => 'Orientasi Mahasiswa Baru',
                'code' => 'KAL-' . strtoupper(Str::random(8)),
                'desc' => 'Program orientasi untuk mahasiswa baru tahun akademik 2024/2025',
                'start_date' => '2024-08-26',
                'ended_date' => '2024-08-30',
                'type' => 'Orientasi',
                'status' => 'Publish',
                'color' => '#6f42c1',
                'highlight' => 'Ya',
                'note' => 'Wajib diikuti oleh seluruh mahasiswa baru'
            ],
            [
                'name' => 'Wisuda Periode I Tahun 2025',
                'code' => 'KAL-' . strtoupper(Str::random(8)),
                'desc' => 'Upacara wisuda untuk lulusan periode I',
                'start_date' => '2025-03-15',
                'ended_date' => null,
                'type' => 'Wisuda',
                'status' => 'Publish',
                'color' => '#e83e8c',
                'highlight' => 'Ya',
                'note' => 'Dress code jas almamater'
            ],
            [
                'name' => 'Seminar Nasional Teknologi',
                'code' => 'KAL-' . strtoupper(Str::random(8)),
                'desc' => 'Seminar nasional dengan tema "Inovasi Teknologi untuk Masa Depan"',
                'start_date' => '2024-11-20',
                'ended_date' => '2024-11-21',
                'type' => 'Seminar',
                'status' => 'Publish',
                'color' => '#17a2b8',
                'highlight' => 'Tidak',
                'note' => 'Terbuka untuk umum'
            ]
        ];

        foreach ($events as $event) {
            KalenderAkademik::create($event);
        }

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

        // Seed Pengumuman
        $pengumumans = [
            [
                'name' => 'Jadwal UTS Semester Ganjil 2024/2025',
                'content' => '<p>Dengan hormat,</p>
                             <p>Bersama ini kami sampaikan jadwal pelaksanaan Ujian Tengah Semester (UTS) untuk semester ganjil tahun akademik 2024/2025 yang akan dilaksanakan pada:</p>
                             <ul>
                             <li><strong>Tanggal:</strong> 15 - 26 Oktober 2024</li>
                             <li><strong>Waktu:</strong> Sesuai jadwal masing-masing mata kuliah</li>
                             <li><strong>Tempat:</strong> Ruang kuliah yang telah ditentukan</li>
                             </ul>
                             <p>Mohon kepada seluruh mahasiswa untuk mempersiapkan diri dengan baik dan hadir tepat waktu sesuai jadwal yang telah ditentukan.</p>
                             <p>Demikian pengumuman ini kami sampaikan, atas perhatiannya kami ucapkan terima kasih.</p>',
                'kategori_id' => 1, // Akademik
                'photo' => 'pengumuman-uts-2024.jpg'
            ],
            [
                'name' => 'Pembukaan Beasiswa Prestasi Akademik 2024',
                'content' => '<p>Yayasan Pendidikan Universitas Masa Depan membuka kesempatan bagi mahasiswa berprestasi untuk mendapatkan Beasiswa Prestasi Akademik 2024.</p>
                             <h4>Persyaratan:</h4>
                             <ul>
                             <li>Mahasiswa aktif semester 2 ke atas</li>
                             <li>IPK minimal 3.50</li>
                             <li>Tidak sedang menerima beasiswa lain</li>
                             <li>Aktif dalam kegiatan kemahasiswaan</li>
                             </ul>
                             <h4>Dokumen yang diperlukan:</h4>
                             <ul>
                             <li>Fotokopi KTM yang masih berlaku</li>
                             <li>Transkrip nilai terbaru</li>
                             <li>Surat keterangan penghasilan orang tua</li>
                             <li>Sertifikat prestasi (jika ada)</li>
                             </ul>
                             <p><strong>Pendaftaran:</strong> 1 September - 30 September 2024</p>
                             <p>Informasi lebih lanjut dapat menghubungi Bagian Kemahasiswaan.</p>',
                'kategori_id' => 3, // Beasiswa
                'photo' => 'beasiswa-prestasi-2024.jpg'
            ],
            [
                'name' => 'Registrasi Semester Genap 2024/2025',
                'content' => '<p>Kepada Yth. Seluruh Mahasiswa Universitas Masa Depan,</p>
                             <p>Dalam rangka registrasi semester genap tahun akademik 2024/2025, dengan ini disampaikan hal-hal sebagai berikut:</p>
                             <h4>Jadwal Registrasi:</h4>
                             <ul>
                             <li><strong>Pembayaran SPP:</strong> 1 - 15 Januari 2025</li>
                             <li><strong>Pengisian KRS:</strong> 10 - 20 Januari 2025</li>
                             <li><strong>Perubahan KRS:</strong> 21 - 25 Januari 2025</li>
                             </ul>
                             <h4>Ketentuan:</h4>
                             <ul>
                             <li>Mahasiswa wajib melunasi SPP sebelum mengisi KRS</li>
                             <li>Konsultasi dengan dosen pembimbing akademik sebelum mengisi KRS</li>
                             <li>Maksimal SKS yang dapat diambil sesuai dengan ketentuan akademik</li>
                             </ul>
                             <p>Bagi mahasiswa yang tidak melakukan registrasi sesuai jadwal akan dikenakan sanksi akademik.</p>',
                'kategori_id' => 1, // Akademik
                'photo' => 'registrasi-genap-2025.jpg'
            ],
            [
                'name' => 'Seminar Nasional "Teknologi AI untuk Masa Depan"',
                'content' => '<p>Fakultas Teknologi Universitas Masa Depan mengundang seluruh civitas akademika untuk menghadiri:</p>
                             <h3 style="text-align: center;">SEMINAR NASIONAL<br>"TEKNOLOGI AI UNTUK MASA DEPAN"</h3>
                             <h4>Detail Acara:</h4>
                             <ul>
                             <li><strong>Hari/Tanggal:</strong> Sabtu, 20 November 2024</li>
                             <li><strong>Waktu:</strong> 08.00 - 16.00 WIB</li>
                             <li><strong>Tempat:</strong> Auditorium Utama Kampus A</li>
                             <li><strong>Tema:</strong> "Artificial Intelligence: Transformasi Digital di Era Industry 4.0"</li>
                             </ul>
                             <h4>Narasumber:</h4>
                             <ul>
                             <li>Prof. Dr. Ahmad Zaki, M.T. (Institut Teknologi Bandung)</li>
                             <li>Dr. Sarah Wijaya, S.Kom., M.Cs. (Google Indonesia)</li>
                             <li>Ir. Budi Santoso, M.T. (Microsoft Indonesia)</li>
                             </ul>
                             <p><strong>Pendaftaran:</strong> Gratis untuk mahasiswa, Rp 150.000 untuk umum</p>
                             <p>Daftarkan diri Anda segera melalui website resmi universitas. Tersedia sertifikat untuk seluruh peserta.</p>',
                'kategori_id' => 4, // Event
                'photo' => 'seminar-ai-2024.jpg'
            ],
            [
                'name' => 'Wisuda Ke-25 Universitas Masa Depan',
                'content' => '<p>Dengan bangga kami mengumumkan pelaksanaan Wisuda Ke-25 Universitas Masa Depan untuk periode wisuda I tahun 2025.</p>
                             <h4>Informasi Wisuda:</h4>
                             <ul>
                             <li><strong>Hari/Tanggal:</strong> Sabtu, 15 Maret 2025</li>
                             <li><strong>Waktu:</strong> 09.00 WIB</li>
                             <li><strong>Tempat:</strong> Gedung Convention Center Kampus A</li>
                             <li><strong>Dress Code:</strong> Jas Almamater + Toga</li>
                             </ul>
                             <h4>Jadwal Kegiatan:</h4>
                             <ul>
                             <li>07.30 - 08.30: Registrasi dan persiapan</li>
                             <li>09.00 - 10.30: Upacara wisuda sesi I</li>
                             <li>10.30 - 11.00: Coffee break</li>
                             <li>11.00 - 12.30: Upacara wisuda sesi II</li>
                             <li>12.30 - 13.30: Foto bersama dan penutupan</li>
                             </ul>
                             <p>Kepada para wisudawan dan wisudawati, mohon untuk mengikuti gladi bersih pada tanggal 14 Maret 2025 pukul 14.00 WIB.</p>
                             <p>Selamat kepada seluruh wisudawan dan wisudawati atas pencapaian yang membanggakan ini!</p>',
                'kategori_id' => 10, // Wisuda
                'photo' => 'wisuda-25-2025.jpg'
            ],
            [
                'name' => 'Kerjasama dengan Universitas Tokyo Jepang',
                'content' => '<p>Universitas Masa Depan dengan bangga mengumumkan penandatanganan Memorandum of Understanding (MoU) dengan University of Tokyo, Jepang.</p>
                             <h4>Ruang Lingkup Kerjasama:</h4>
                             <ul>
                             <li>Program pertukaran mahasiswa dan dosen</li>
                             <li>Penelitian bersama di bidang teknologi dan sains</li>
                             <li>Program double degree untuk jenjang S2 dan S3</li>
                             <li>Pelatihan dan workshop internasional</li>
                             <li>Publikasi ilmiah bersama</li>
                             </ul>
                             <h4>Manfaat bagi Mahasiswa:</h4>
                             <ul>
                             <li>Kesempatan belajar di University of Tokyo selama 1-2 semester</li>
                             <li>Beasiswa penuh untuk mahasiswa berprestasi</li>
                             <li>Sertifikasi internasional</li>
                             <li>Jaringan akademik global</li>
                             </ul>
                             <p>Program ini akan dimulai pada semester genap 2025 dengan kuota terbatas untuk setiap fakultas.</p>
                             <p>Informasi selengkapnya akan diumumkan melalui website resmi dan kantor internasional affairs.</p>',
                'kategori_id' => 6, // Kerjasama
                'photo' => 'kerjasama-tokyo-2024.jpg'
            ]
        ];

        foreach ($pengumumans as $pengumuman) {
            Pengumuman::create([
                'name' => $pengumuman['name'],
                'code' => 'PNG-' . strtoupper(Str::random(8)),
                'slug' => Str::slug($pengumuman['name']),
                'content' => $pengumuman['content'],
                'kategori_id' => $pengumuman['kategori_id'],
                'photo' => $pengumuman['photo'],
                'status' => 'Publish',
                'created_by' => 1
            ]);
        }
    }
}
