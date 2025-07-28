<?php

namespace Database\Seeders\Master;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Publikasi\Kategori;
use App\Models\Publikasi\KalenderAkademik;
use App\Models\Publikasi\Pengumuman;
use App\Models\Publikasi\Berita;

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
            // Check if kategori already exists to avoid duplicate
            $existingKategori = Kategori::where('slug', Str::slug($kategori['name']))->first();
            if (!$existingKategori) {
                Kategori::create([
                    'name' => $kategori['name'],
                    'code' => 'KTG-' . strtoupper(Str::random(8)),
                    'slug' => Str::slug($kategori['name']),
                    'desc' => $kategori['desc'],
                    'created_by' => 1
                ]);
            }
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
            // Check if pengumuman already exists to avoid duplicate
            $existingPengumuman = Pengumuman::where('slug', Str::slug($pengumuman['name']))->first();
            if (!$existingPengumuman) {
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

        // Seed Berita
        $beritas = [
            [
                'name' => 'Mahasiswa Universitas Masa Depan Raih Juara 1 Kompetisi Robotik Nasional',
                'content' => '<p>Tim robotik Universitas Masa Depan berhasil meraih juara 1 dalam Kompetisi Robotik Nasional 2024 yang diselenggarakan di Institut Teknologi Bandung.</p>
                             <h4>Prestasi yang Membanggakan</h4>
                             <p>Tim yang terdiri dari 5 mahasiswa Fakultas Teknik berhasil mengalahkan 50 tim dari seluruh Indonesia dalam kompetisi bergengsi ini. Robot yang mereka ciptakan mampu menyelesaikan tantangan dengan waktu tercepat dan akurasi tertinggi.</p>
                             <h4>Anggota Tim Pemenang:</h4>
                             <ul>
                             <li>Ahmad Rizki (Teknik Elektro)</li>
                             <li>Sari Wulandari (Teknik Informatika)</li>
                             <li>Budi Santoso (Teknik Mesin)</li>
                             <li>Maya Putri (Teknik Elektro)</li>
                             <li>Doni Prasetyo (Teknik Informatika)</li>
                             </ul>
                             <p>Kompetisi ini menguji kemampuan peserta dalam merancang robot autonomous yang dapat menyelesaikan berbagai tantangan seperti line following, obstacle avoidance, dan object manipulation.</p>
                             <p>"Kami sangat bangga dengan prestasi tim robotik. Ini membuktikan kualitas pendidikan dan dedikasi mahasiswa kita," ujar Rektor Universitas Masa Depan.</p>',
                'kategori_id' => 5, // Prestasi
                'photo' => 'berita-robotik-juara-2024.jpg'
            ],
            [
                'name' => 'Universitas Masa Depan Launching Program Beasiswa AI untuk Mahasiswa Berprestasi',
                'content' => '<p>Universitas Masa Depan meluncurkan program beasiswa khusus bidang Artificial Intelligence (AI) untuk mendukung mahasiswa berprestasi dalam mengembangkan kompetensi di era digital.</p>
                             <h4>Detail Program Beasiswa AI:</h4>
                             <ul>
                             <li><strong>Kuota:</strong> 50 mahasiswa per tahun</li>
                             <li><strong>Nilai Beasiswa:</strong> Rp 25.000.000 per semester</li>
                             <li><strong>Durasi:</strong> 4 semester (2 tahun)</li>
                             <li><strong>Cakupan:</strong> SPP, buku, dan pelatihan khusus</li>
                             </ul>
                             <h4>Persyaratan:</h4>
                             <ul>
                             <li>Mahasiswa aktif semester 3 ke atas</li>
                             <li>IPK minimal 3.70</li>
                             <li>Lulus tes kemampuan programming</li>
                             <li>Berkomitmen mengikuti program mentoring</li>
                             </ul>
                             <h4>Fasilitas Program:</h4>
                             <ul>
                             <li>Akses ke laboratorium AI terbaru</li>
                             <li>Mentoring dengan expert industri</li>
                             <li>Sertifikasi internasional</li>
                             <li>Magang di perusahaan teknologi</li>
                             </ul>
                             <p>Program ini merupakan hasil kerjasama dengan Google Indonesia, Microsoft, dan startup teknologi terkemuka. Pendaftaran dibuka mulai 1 Februari 2025.</p>
                             <p>"Dengan program ini, kami berharap dapat mencetak talent AI berkualitas yang siap menghadapi tantangan industri 4.0," kata Dekan Fakultas Teknologi.</p>',
                'kategori_id' => 3, // Beasiswa
                'photo' => 'beasiswa-ai-2025.jpg'
            ],
            [
                'name' => 'Grand Opening Perpustakaan Digital Modern dengan Teknologi VR dan AR',
                'content' => '<p>Universitas Masa Depan meresmikan perpustakaan digital modern yang dilengkapi teknologi Virtual Reality (VR) dan Augmented Reality (AR) untuk mendukung pembelajaran interaktif.</p>
                             <h4>Fasilitas Perpustakaan Baru:</h4>
                             <ul>
                             <li>15 VR Station untuk pembelajaran immersive</li>
                             <li>20 AR Table untuk collaborative learning</li>
                             <li>1 juta koleksi buku digital</li>
                             <li>100 ruang study pod dengan teknologi smart glass</li>
                             <li>Area diskusi dengan soundproof technology</li>
                             </ul>
                             <h4>Teknologi Unggulan:</h4>
                             <ul>
                             <li><strong>Virtual Reality Learning:</strong> Simulasi praktikum lab, virtual museum, dan historical recreation</li>
                             <li><strong>Augmented Reality Books:</strong> Buku dengan konten 3D interaktif</li>
                             <li><strong>AI Library Assistant:</strong> Chatbot untuk bantuan pencarian referensi</li>
                             <li><strong>Smart Search System:</strong> Pencarian berbasis AI dan voice command</li>
                             </ul>
                             <p>Pembangunan perpustakaan ini memakan investasi sebesar Rp 15 miliar dan merupakan yang pertama di Indonesia yang mengintegrasikan teknologi VR/AR secara komprehensif.</p>
                             <p>Perpustakaan ini juga dilengkapi dengan maker space untuk mahasiswa yang ingin mengembangkan prototype dan 3D printing facility untuk mendukung penelitian.</p>
                             <p>"Perpustakaan bukan lagi tempat penyimpanan buku, tetapi pusat inovasi dan kreativitas," ujar Kepala Perpustakaan Universitas.</p>',
                'kategori_id' => 7, // Fasilitas
                'photo' => 'perpustakaan-digital-vr-2024.jpg'
            ],
            [
                'name' => 'Penelitian Dosen Universitas Masa Depan Tentang Energi Terbarukan Dipublikasi di Jurnal Internasional',
                'content' => '<p>Tim peneliti dari Fakultas Teknik Universitas Masa Depan berhasil mempublikasikan penelitian breakthrough tentang teknologi solar panel efisiensi tinggi di jurnal Nature Energy.</p>
                             <h4>Inovasi Penelitian:</h4>
                             <p>Penelitian yang dipimpin oleh Prof. Dr. Ir. Siti Nurhaliza, M.T. ini menghasilkan desain solar panel dengan efisiensi 45%, jauh melampaui standar industri saat ini yang hanya 22%.</p>
                             <h4>Tim Peneliti:</h4>
                             <ul>
                             <li>Prof. Dr. Ir. Siti Nurhaliza, M.T. (Ketua)</li>
                             <li>Dr. Eng. Bambang Widodo, S.T., M.T.</li>
                             <li>Dr. Rina Kartika, S.Si., M.Sc.</li>
                             <li>Ahmad Fauzi, S.T., M.T. (Peneliti Muda)</li>
                             </ul>
                             <h4>Dampak Penelitian:</h4>
                             <ul>
                             <li>Potensi mengurangi biaya energi surya hingga 60%</li>
                             <li>Aplikasi untuk daerah tropis dengan kelembaban tinggi</li>
                             <li>Ramah lingkungan dengan material daur ulang</li>
                             <li>Cocok untuk instalasi skala residential dan industrial</li>
                             </ul>
                             <p>Penelitian ini telah mendapat paten internasional dan menarik minat investor dari Jepang dan Singapura untuk pengembangan komersial.</p>
                             <p>University startup incubator juga akan membantu komersialisasi teknologi ini melalui spin-off company yang akan didirikan tahun 2025.</p>
                             <p>"Ini adalah bukti nyata bahwa penelitian universitas dapat memberikan kontribusi nyata untuk solusi global," kata Wakil Rektor Bidang Penelitian.</p>',
                'kategori_id' => 1, // Akademik
                'photo' => 'penelitian-solar-panel-2024.jpg'
            ],
            [
                'name' => 'Festival Seni dan Budaya 2024: Menampilkan Kreativitas Mahasiswa dari Seluruh Nusantara',
                'content' => '<p>Universitas Masa Depan menggelar Festival Seni dan Budaya 2024 dengan tema "Bhinneka Tunggal Ika: Merajut Kreativitas Nusantara" yang menampilkan berbagai pertunjukan dan pameran karya mahasiswa.</p>
                             <h4>Highlight Acara:</h4>
                             <ul>
                             <li><strong>Pentas Seni:</strong> Tari tradisional, musik daerah, dan teater kontemporer</li>
                             <li><strong>Pameran Karya:</strong> Lukisan, patung, fotografi, dan digital art</li>
                             <li><strong>Fashion Show:</strong> Busana tradisional modern dari berbagai daerah</li>
                             <li><strong>Kuliner Nusantara:</strong> Food festival dengan 100+ menu tradisional</li>
                             </ul>
                             <h4>Peserta dan Partisipasi:</h4>
                             <ul>
                             <li>500+ mahasiswa dari 15 fakultas</li>
                             <li>50 mahasiswa exchange dari 10 negara</li>
                             <li>20 komunitas seni lokal</li>
                             <li>10.000+ pengunjung dalam 3 hari</li>
                             </ul>
                             <h4>Kompetisi dan Penghargaan:</h4>
                             <ul>
                             <li>Best Traditional Dance Performance</li>
                             <li>Most Creative Art Installation</li>
                             <li>Outstanding Cultural Photography</li>
                             <li>People Choice Award</li>
                             </ul>
                             <p>Festival ini juga menampilkan workshop batik, tenun, dan kerajinan tradisional yang dipandu langsung oleh master craftsman dari berbagai daerah.</p>
                             <p>Sebagai puncak acara, dilakukan penandatanganan MoU dengan Dinas Kebudayaan untuk program pelestarian seni budaya lokal.</p>
                             <p>"Festival ini menjadi wadah untuk mengenalkan dan melestarikan kekayaan budaya Indonesia kepada generasi muda," ujar Wakil Rektor Bidang Kemahasiswaan.</p>',
                'kategori_id' => 4, // Event
                'photo' => 'festival-seni-budaya-2024.jpg'
            ],
            [
                'name' => 'Kerjasama Strategis dengan Silicon Valley Tech Companies untuk Program Internship',
                'content' => '<p>Universitas Masa Depan menandatangani kerjasama strategis dengan 5 perusahaan teknologi terkemuka di Silicon Valley untuk program magang internasional bagi mahasiswa terbaik.</p>
                             <h4>Partner Perusahaan:</h4>
                             <ul>
                             <li><strong>Google:</strong> Software engineering dan AI research</li>
                             <li><strong>Meta:</strong> AR/VR development dan social media technology</li>
                             <li><strong>Tesla:</strong> Automotive engineering dan sustainable energy</li>
                             <li><strong>Airbnb:</strong> Product management dan user experience design</li>
                             <li><strong>Stripe:</strong> Fintech dan payment system development</li>
                             </ul>
                             <h4>Program Benefits:</h4>
                             <ul>
                             <li>6-12 bulan magang di headquarters perusahaan</li>
                             <li>Mentoring langsung dari senior engineers</li>
                             <li>Gaji kompetitif setara fresh graduate Silicon Valley</li>
                             <li>Tunjangan akomodasi dan transportasi</li>
                             <li>Sertifikat dan recommendation letter</li>
                             <li>Kesempatan full-time job offer</li>
                             </ul>
                             <h4>Seleksi dan Persyaratan:</h4>
                             <ul>
                             <li>IPK minimal 3.75 untuk mahasiswa S1/S2</li>
                             <li>Portfolio project yang impressive</li>
                             <li>TOEFL/IELTS score tinggi</li>
                             <li>Coding interview dan technical assessment</li>
                             <li>Cultural fit interview</li>
                             </ul>
                             <p>Program ini akan dimulai pada musim panas 2025 dengan kuota awal 25 mahasiswa dari berbagai program studi teknik dan bisnis.</p>
                             <p>Sebagai persiapan, universitas akan mengadakan intensive bootcamp selama 3 bulan untuk mempersiapkan mahasiswa menghadapi standar industri Silicon Valley.</p>
                             <p>"Ini adalah peluang emas bagi mahasiswa kita untuk belajar langsung di jantung inovasi teknologi dunia," kata Direktur Career Center.</p>',
                'kategori_id' => 6, // Kerjasama
                'photo' => 'kerjasama-silicon-valley-2024.jpg'
            ],
            [
                'name' => 'Alumni Sukses: CEO Startup Unicorn Berbagi Pengalaman dengan Mahasiswa',
                'content' => '<p>Dr. Andi Pratama, alumni Teknik Informatika 2010 dan CEO startup unicorn "InnovateTech", berbagi pengalaman kepada mahasiswa dalam acara "Alumni Inspiring Talk".</p>
                             <h4>Profil Alumni Sukses:</h4>
                             <ul>
                             <li><strong>Nama:</strong> Dr. Andi Pratama</li>
                             <li><strong>Lulusan:</strong> Teknik Informatika 2010, S2 MIT 2013, Ph.D Stanford 2016</li>
                             <li><strong>Posisi:</strong> CEO & Founder InnovateTech</li>
                             <li><strong>Valuasi Perusahaan:</strong> $2.5 Billion (2024)</li>
                             <li><strong>Karyawan:</strong> 3,000+ people across 15 countries</li>
                             </ul>
                             <h4>Journey to Success:</h4>
                             <p>Andi memulai karirnya sebagai software engineer fresh graduate, kemudian melanjutkan studi S2 dan S3 di Amerika dengan beasiswa Fulbright. Setelah bekerja di Google selama 3 tahun, ia mendirikan InnovateTech pada 2019.</p>
                             <h4>Tips untuk Mahasiswa:</h4>
                             <ul>
                             <li><strong>Continuous Learning:</strong> "Teknologi berkembang sangat cepat, jangan pernah berhenti belajar"</li>
                             <li><strong>Build Strong Network:</strong> "Relationships are as important as technical skills"</li>
                             <li><strong>Take Calculated Risks:</strong> "Don\'t be afraid to fail, but learn from every failure"</li>
                             <li><strong>Focus on Impact:</strong> "Build products that solve real problems for real people"</li>
                             </ul>
                             <h4>Kontribusi untuk Almamater:</h4>
                             <ul>
                             <li>Mendirikan "Andi Pratama Innovation Fund" senilai $1 juta</li>
                             <li>Scholarship untuk 50 mahasiswa berprestasi per tahun</li>
                             <li>Mentoring program untuk startup mahasiswa</li>
                             <li>Guest lecture series dengan tech leaders</li>
                             </ul>
                             <p>Dalam sesi Q&A, Andi menekankan pentingnya mindset growth dan adaptability dalam menghadapi perubahan teknologi yang cepat.</p>
                             <p>"Universitas Masa Depan memberikan foundation yang kuat untuk karir saya. Sekarang saatnya saya berkontribusi untuk generasi berikutnya," ungkap Andi.</p>',
                'kategori_id' => 8, // Alumni
                'photo' => 'alumni-ceo-unicorn-2024.jpg'
            ],
            [
                'name' => 'Workshop "Future Skills for Digital Era" dengan Industry Experts',
                'content' => '<p>Career Development Center mengadakan workshop intensif "Future Skills for Digital Era" dengan menghadirkan para praktisi dan expert dari industri teknologi terkemuka.</p>
                             <h4>Agenda Workshop:</h4>
                             <ul>
                             <li><strong>Day 1:</strong> AI & Machine Learning Fundamentals</li>
                             <li><strong>Day 2:</strong> Data Science and Analytics</li>
                             <li><strong>Day 3:</strong> Cybersecurity and Blockchain</li>
                             <li><strong>Day 4:</strong> Cloud Computing and DevOps</li>
                             <li><strong>Day 5:</strong> UI/UX Design and Digital Marketing</li>
                             </ul>
                             <h4>Expert Speakers:</h4>
                             <ul>
                             <li>Sarah Chen - Head of AI, Gojek</li>
                             <li>Ravi Patel - Senior Data Scientist, Tokopedia</li>
                             <li>Dr. Indira Sari - Cybersecurity Consultant</li>
                             <li>Michael Kim - Cloud Architect, AWS</li>
                             <li>Lisa Wang - Lead UX Designer, Shopee</li>
                             </ul>
                             <h4>Workshop Highlights:</h4>
                             <ul>
                             <li>Hands-on praktikum dengan real industry cases</li>
                             <li>Portfolio building session</li>
                             <li>Mock interview dengan HR professionals</li>
                             <li>Networking session dengan industry leaders</li>
                             <li>Job matching dengan partner companies</li>
                             </ul>
                             <h4>Outcome dan Benefits:</h4>
                             <ul>
                             <li>Sertifikat completion dari masing-masing track</li>
                             <li>Project portfolio yang industry-ready</li>
                             <li>Direct connection dengan hiring managers</li>
                             <li>Follow-up mentoring program selama 3 bulan</li>
                             </ul>
                             <p>Workshop ini diikuti oleh 200 mahasiswa semester akhir dari berbagai program studi. Lebih dari 70% peserta workshop tahun lalu berhasil mendapat job offer dalam 6 bulan.</p>
                             <p>"Skills gap antara dunia pendidikan dan industri perlu dijembatani melalui program seperti ini," kata Director of Industry Relations.</p>',
                'kategori_id' => 2, // Kemahasiswaan
                'photo' => 'workshop-future-skills-2024.jpg'
            ]
        ];

        foreach ($beritas as $berita) {
            // Check if berita already exists to avoid duplicate
            $existingBerita = Berita::where('slug', Str::slug($berita['name']))->first();
            if (!$existingBerita) {
                Berita::create([
                    'name' => $berita['name'],
                    'code' => 'BRT-' . strtoupper(Str::random(8)),
                    'slug' => Str::slug($berita['name']),
                    'content' => $berita['content'],
                    'kategori_id' => $berita['kategori_id'],
                    'photo' => $berita['photo'],
                    'status' => 'Publish',
                    'created_by' => 1
                ]);
            }
        }
    }
}
