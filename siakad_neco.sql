-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 19, 2025 at 09:51 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siakad_neco`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensis`
--

CREATE TABLE `absensis` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `type` int NOT NULL,
  `date` date NOT NULL,
  `time_in` time NOT NULL,
  `time_out` time DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_in` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_out` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `activity_log_changes`
--

CREATE TABLE `activity_log_changes` (
  `id` bigint UNSIGNED NOT NULL,
  `activity_log_id` bigint UNSIGNED NOT NULL,
  `field_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `old_value` text COLLATE utf8mb4_unicode_ci,
  `new_value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `barangs`
--

CREATE TABLE `barangs` (
  `id` bigint UNSIGNED NOT NULL,
  `kategori_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `satuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barangs`
--

INSERT INTO `barangs` (`id`, `kategori_id`, `name`, `code`, `merk`, `photo`, `satuan`, `jumlah`, `desc`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 1, 'Laptop', 'LPT001', 'Lenovo', 'laptop.jpg', 'Unit', 10, 'Laptop untuk dosen', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL),
(2, 1, 'Proyektor', 'PRJ001', 'Epson', 'proyektor.jpg', 'Unit', 5, 'Proyektor untuk ruang kelas', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL),
(3, 2, 'Meja Dosen', 'MD001', 'IKEA', 'meja-dosen.jpg', 'Unit', 15, 'Meja untuk dosen', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `beritas`
--

CREATE TABLE `beritas` (
  `id` bigint UNSIGNED NOT NULL,
  `kategori_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Draft','Publish','Archive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Draft',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `beritas`
--

INSERT INTO `beritas` (`id`, `kategori_id`, `name`, `code`, `slug`, `photo`, `content`, `status`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 5, 'Mahasiswa Universitas Masa Depan Raih Juara 1 Kompetisi Robotik Nasional', 'BRT-JF64ZYW7', 'mahasiswa-universitas-masa-depan-raih-juara-1-kompetisi-robotik-nasional', 'berita-robotik-juara-2024.jpg', '<p>Tim robotik Universitas Masa Depan berhasil meraih juara 1 dalam Kompetisi Robotik Nasional 2024 yang diselenggarakan di Institut Teknologi Bandung.</p>\n                             <h4>Prestasi yang Membanggakan</h4>\n                             <p>Tim yang terdiri dari 5 mahasiswa Fakultas Teknik berhasil mengalahkan 50 tim dari seluruh Indonesia dalam kompetisi bergengsi ini. Robot yang mereka ciptakan mampu menyelesaikan tantangan dengan waktu tercepat dan akurasi tertinggi.</p>\n                             <h4>Anggota Tim Pemenang:</h4>\n                             <ul>\n                             <li>Ahmad Rizki (Teknik Elektro)</li>\n                             <li>Sari Wulandari (Teknik Informatika)</li>\n                             <li>Budi Santoso (Teknik Mesin)</li>\n                             <li>Maya Putri (Teknik Elektro)</li>\n                             <li>Doni Prasetyo (Teknik Informatika)</li>\n                             </ul>\n                             <p>Kompetisi ini menguji kemampuan peserta dalam merancang robot autonomous yang dapat menyelesaikan berbagai tantangan seperti line following, obstacle avoidance, dan object manipulation.</p>\n                             <p>\"Kami sangat bangga dengan prestasi tim robotik. Ini membuktikan kualitas pendidikan dan dedikasi mahasiswa kita,\" ujar Rektor Universitas Masa Depan.</p>', 'Publish', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, 1, NULL, NULL),
(2, 3, 'Universitas Masa Depan Launching Program Beasiswa AI untuk Mahasiswa Berprestasi', 'BRT-XNHO1IAE', 'universitas-masa-depan-launching-program-beasiswa-ai-untuk-mahasiswa-berprestasi', 'beasiswa-ai-2025.jpg', '<p>Universitas Masa Depan meluncurkan program beasiswa khusus bidang Artificial Intelligence (AI) untuk mendukung mahasiswa berprestasi dalam mengembangkan kompetensi di era digital.</p>\n                             <h4>Detail Program Beasiswa AI:</h4>\n                             <ul>\n                             <li><strong>Kuota:</strong> 50 mahasiswa per tahun</li>\n                             <li><strong>Nilai Beasiswa:</strong> Rp 25.000.000 per semester</li>\n                             <li><strong>Durasi:</strong> 4 semester (2 tahun)</li>\n                             <li><strong>Cakupan:</strong> SPP, buku, dan pelatihan khusus</li>\n                             </ul>\n                             <h4>Persyaratan:</h4>\n                             <ul>\n                             <li>Mahasiswa aktif semester 3 ke atas</li>\n                             <li>IPK minimal 3.70</li>\n                             <li>Lulus tes kemampuan programming</li>\n                             <li>Berkomitmen mengikuti program mentoring</li>\n                             </ul>\n                             <h4>Fasilitas Program:</h4>\n                             <ul>\n                             <li>Akses ke laboratorium AI terbaru</li>\n                             <li>Mentoring dengan expert industri</li>\n                             <li>Sertifikasi internasional</li>\n                             <li>Magang di perusahaan teknologi</li>\n                             </ul>\n                             <p>Program ini merupakan hasil kerjasama dengan Google Indonesia, Microsoft, dan startup teknologi terkemuka. Pendaftaran dibuka mulai 1 Februari 2025.</p>\n                             <p>\"Dengan program ini, kami berharap dapat mencetak talent AI berkualitas yang siap menghadapi tantangan industri 4.0,\" kata Dekan Fakultas Teknologi.</p>', 'Publish', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, 1, NULL, NULL),
(3, 7, 'Grand Opening Perpustakaan Digital Modern dengan Teknologi VR dan AR', 'BRT-BJTQN8F6', 'grand-opening-perpustakaan-digital-modern-dengan-teknologi-vr-dan-ar', 'perpustakaan-digital-vr-2024.jpg', '<p>Universitas Masa Depan meresmikan perpustakaan digital modern yang dilengkapi teknologi Virtual Reality (VR) dan Augmented Reality (AR) untuk mendukung pembelajaran interaktif.</p>\n                             <h4>Fasilitas Perpustakaan Baru:</h4>\n                             <ul>\n                             <li>15 VR Station untuk pembelajaran immersive</li>\n                             <li>20 AR Table untuk collaborative learning</li>\n                             <li>1 juta koleksi buku digital</li>\n                             <li>100 ruang study pod dengan teknologi smart glass</li>\n                             <li>Area diskusi dengan soundproof technology</li>\n                             </ul>\n                             <h4>Teknologi Unggulan:</h4>\n                             <ul>\n                             <li><strong>Virtual Reality Learning:</strong> Simulasi praktikum lab, virtual museum, dan historical recreation</li>\n                             <li><strong>Augmented Reality Books:</strong> Buku dengan konten 3D interaktif</li>\n                             <li><strong>AI Library Assistant:</strong> Chatbot untuk bantuan pencarian referensi</li>\n                             <li><strong>Smart Search System:</strong> Pencarian berbasis AI dan voice command</li>\n                             </ul>\n                             <p>Pembangunan perpustakaan ini memakan investasi sebesar Rp 15 miliar dan merupakan yang pertama di Indonesia yang mengintegrasikan teknologi VR/AR secara komprehensif.</p>\n                             <p>Perpustakaan ini juga dilengkapi dengan maker space untuk mahasiswa yang ingin mengembangkan prototype dan 3D printing facility untuk mendukung penelitian.</p>\n                             <p>\"Perpustakaan bukan lagi tempat penyimpanan buku, tetapi pusat inovasi dan kreativitas,\" ujar Kepala Perpustakaan Universitas.</p>', 'Publish', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, 1, NULL, NULL),
(4, 1, 'Penelitian Dosen Universitas Masa Depan Tentang Energi Terbarukan Dipublikasi di Jurnal Internasional', 'BRT-XXBJHVLC', 'penelitian-dosen-universitas-masa-depan-tentang-energi-terbarukan-dipublikasi-di-jurnal-internasional', 'penelitian-solar-panel-2024.jpg', '<p>Tim peneliti dari Fakultas Teknik Universitas Masa Depan berhasil mempublikasikan penelitian breakthrough tentang teknologi solar panel efisiensi tinggi di jurnal Nature Energy.</p>\n                             <h4>Inovasi Penelitian:</h4>\n                             <p>Penelitian yang dipimpin oleh Prof. Dr. Ir. Siti Nurhaliza, M.T. ini menghasilkan desain solar panel dengan efisiensi 45%, jauh melampaui standar industri saat ini yang hanya 22%.</p>\n                             <h4>Tim Peneliti:</h4>\n                             <ul>\n                             <li>Prof. Dr. Ir. Siti Nurhaliza, M.T. (Ketua)</li>\n                             <li>Dr. Eng. Bambang Widodo, S.T., M.T.</li>\n                             <li>Dr. Rina Kartika, S.Si., M.Sc.</li>\n                             <li>Ahmad Fauzi, S.T., M.T. (Peneliti Muda)</li>\n                             </ul>\n                             <h4>Dampak Penelitian:</h4>\n                             <ul>\n                             <li>Potensi mengurangi biaya energi surya hingga 60%</li>\n                             <li>Aplikasi untuk daerah tropis dengan kelembaban tinggi</li>\n                             <li>Ramah lingkungan dengan material daur ulang</li>\n                             <li>Cocok untuk instalasi skala residential dan industrial</li>\n                             </ul>\n                             <p>Penelitian ini telah mendapat paten internasional dan menarik minat investor dari Jepang dan Singapura untuk pengembangan komersial.</p>\n                             <p>University startup incubator juga akan membantu komersialisasi teknologi ini melalui spin-off company yang akan didirikan tahun 2025.</p>\n                             <p>\"Ini adalah bukti nyata bahwa penelitian universitas dapat memberikan kontribusi nyata untuk solusi global,\" kata Wakil Rektor Bidang Penelitian.</p>', 'Publish', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, 1, NULL, NULL),
(5, 4, 'Festival Seni dan Budaya 2024: Menampilkan Kreativitas Mahasiswa dari Seluruh Nusantara', 'BRT-OMGPLEPH', 'festival-seni-dan-budaya-2024-menampilkan-kreativitas-mahasiswa-dari-seluruh-nusantara', 'festival-seni-budaya-2024.jpg', '<p>Universitas Masa Depan menggelar Festival Seni dan Budaya 2024 dengan tema \"Bhinneka Tunggal Ika: Merajut Kreativitas Nusantara\" yang menampilkan berbagai pertunjukan dan pameran karya mahasiswa.</p>\n                             <h4>Highlight Acara:</h4>\n                             <ul>\n                             <li><strong>Pentas Seni:</strong> Tari tradisional, musik daerah, dan teater kontemporer</li>\n                             <li><strong>Pameran Karya:</strong> Lukisan, patung, fotografi, dan digital art</li>\n                             <li><strong>Fashion Show:</strong> Busana tradisional modern dari berbagai daerah</li>\n                             <li><strong>Kuliner Nusantara:</strong> Food festival dengan 100+ menu tradisional</li>\n                             </ul>\n                             <h4>Peserta dan Partisipasi:</h4>\n                             <ul>\n                             <li>500+ mahasiswa dari 15 fakultas</li>\n                             <li>50 mahasiswa exchange dari 10 negara</li>\n                             <li>20 komunitas seni lokal</li>\n                             <li>10.000+ pengunjung dalam 3 hari</li>\n                             </ul>\n                             <h4>Kompetisi dan Penghargaan:</h4>\n                             <ul>\n                             <li>Best Traditional Dance Performance</li>\n                             <li>Most Creative Art Installation</li>\n                             <li>Outstanding Cultural Photography</li>\n                             <li>People Choice Award</li>\n                             </ul>\n                             <p>Festival ini juga menampilkan workshop batik, tenun, dan kerajinan tradisional yang dipandu langsung oleh master craftsman dari berbagai daerah.</p>\n                             <p>Sebagai puncak acara, dilakukan penandatanganan MoU dengan Dinas Kebudayaan untuk program pelestarian seni budaya lokal.</p>\n                             <p>\"Festival ini menjadi wadah untuk mengenalkan dan melestarikan kekayaan budaya Indonesia kepada generasi muda,\" ujar Wakil Rektor Bidang Kemahasiswaan.</p>', 'Publish', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, 1, NULL, NULL),
(6, 6, 'Kerjasama Strategis dengan Silicon Valley Tech Companies untuk Program Internship', 'BRT-V2WHBRVN', 'kerjasama-strategis-dengan-silicon-valley-tech-companies-untuk-program-internship', 'kerjasama-silicon-valley-2024.jpg', '<p>Universitas Masa Depan menandatangani kerjasama strategis dengan 5 perusahaan teknologi terkemuka di Silicon Valley untuk program magang internasional bagi mahasiswa terbaik.</p>\n                             <h4>Partner Perusahaan:</h4>\n                             <ul>\n                             <li><strong>Google:</strong> Software engineering dan AI research</li>\n                             <li><strong>Meta:</strong> AR/VR development dan social media technology</li>\n                             <li><strong>Tesla:</strong> Automotive engineering dan sustainable energy</li>\n                             <li><strong>Airbnb:</strong> Product management dan user experience design</li>\n                             <li><strong>Stripe:</strong> Fintech dan payment system development</li>\n                             </ul>\n                             <h4>Program Benefits:</h4>\n                             <ul>\n                             <li>6-12 bulan magang di headquarters perusahaan</li>\n                             <li>Mentoring langsung dari senior engineers</li>\n                             <li>Gaji kompetitif setara fresh graduate Silicon Valley</li>\n                             <li>Tunjangan akomodasi dan transportasi</li>\n                             <li>Sertifikat dan recommendation letter</li>\n                             <li>Kesempatan full-time job offer</li>\n                             </ul>\n                             <h4>Seleksi dan Persyaratan:</h4>\n                             <ul>\n                             <li>IPK minimal 3.75 untuk mahasiswa S1/S2</li>\n                             <li>Portfolio project yang impressive</li>\n                             <li>TOEFL/IELTS score tinggi</li>\n                             <li>Coding interview dan technical assessment</li>\n                             <li>Cultural fit interview</li>\n                             </ul>\n                             <p>Program ini akan dimulai pada musim panas 2025 dengan kuota awal 25 mahasiswa dari berbagai program studi teknik dan bisnis.</p>\n                             <p>Sebagai persiapan, universitas akan mengadakan intensive bootcamp selama 3 bulan untuk mempersiapkan mahasiswa menghadapi standar industri Silicon Valley.</p>\n                             <p>\"Ini adalah peluang emas bagi mahasiswa kita untuk belajar langsung di jantung inovasi teknologi dunia,\" kata Direktur Career Center.</p>', 'Publish', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, 1, NULL, NULL),
(7, 8, 'Alumni Sukses: CEO Startup Unicorn Berbagi Pengalaman dengan Mahasiswa', 'BRT-5GRYRLX4', 'alumni-sukses-ceo-startup-unicorn-berbagi-pengalaman-dengan-mahasiswa', 'alumni-ceo-unicorn-2024.jpg', '<p>Dr. Andi Pratama, alumni Teknik Informatika 2010 dan CEO startup unicorn \"InnovateTech\", berbagi pengalaman kepada mahasiswa dalam acara \"Alumni Inspiring Talk\".</p>\n                             <h4>Profil Alumni Sukses:</h4>\n                             <ul>\n                             <li><strong>Nama:</strong> Dr. Andi Pratama</li>\n                             <li><strong>Lulusan:</strong> Teknik Informatika 2010, S2 MIT 2013, Ph.D Stanford 2016</li>\n                             <li><strong>Posisi:</strong> CEO & Founder InnovateTech</li>\n                             <li><strong>Valuasi Perusahaan:</strong> $2.5 Billion (2024)</li>\n                             <li><strong>Karyawan:</strong> 3,000+ people across 15 countries</li>\n                             </ul>\n                             <h4>Journey to Success:</h4>\n                             <p>Andi memulai karirnya sebagai software engineer fresh graduate, kemudian melanjutkan studi S2 dan S3 di Amerika dengan beasiswa Fulbright. Setelah bekerja di Google selama 3 tahun, ia mendirikan InnovateTech pada 2019.</p>\n                             <h4>Tips untuk Mahasiswa:</h4>\n                             <ul>\n                             <li><strong>Continuous Learning:</strong> \"Teknologi berkembang sangat cepat, jangan pernah berhenti belajar\"</li>\n                             <li><strong>Build Strong Network:</strong> \"Relationships are as important as technical skills\"</li>\n                             <li><strong>Take Calculated Risks:</strong> \"Don\'t be afraid to fail, but learn from every failure\"</li>\n                             <li><strong>Focus on Impact:</strong> \"Build products that solve real problems for real people\"</li>\n                             </ul>\n                             <h4>Kontribusi untuk Almamater:</h4>\n                             <ul>\n                             <li>Mendirikan \"Andi Pratama Innovation Fund\" senilai $1 juta</li>\n                             <li>Scholarship untuk 50 mahasiswa berprestasi per tahun</li>\n                             <li>Mentoring program untuk startup mahasiswa</li>\n                             <li>Guest lecture series dengan tech leaders</li>\n                             </ul>\n                             <p>Dalam sesi Q&A, Andi menekankan pentingnya mindset growth dan adaptability dalam menghadapi perubahan teknologi yang cepat.</p>\n                             <p>\"Universitas Masa Depan memberikan foundation yang kuat untuk karir saya. Sekarang saatnya saya berkontribusi untuk generasi berikutnya,\" ungkap Andi.</p>', 'Publish', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, 1, NULL, NULL),
(8, 2, 'Workshop \"Future Skills for Digital Era\" dengan Industry Experts', 'BRT-C4EZA8UQ', 'workshop-future-skills-for-digital-era-dengan-industry-experts', 'workshop-future-skills-2024.jpg', '<p>Career Development Center mengadakan workshop intensif \"Future Skills for Digital Era\" dengan menghadirkan para praktisi dan expert dari industri teknologi terkemuka.</p>\n                             <h4>Agenda Workshop:</h4>\n                             <ul>\n                             <li><strong>Day 1:</strong> AI & Machine Learning Fundamentals</li>\n                             <li><strong>Day 2:</strong> Data Science and Analytics</li>\n                             <li><strong>Day 3:</strong> Cybersecurity and Blockchain</li>\n                             <li><strong>Day 4:</strong> Cloud Computing and DevOps</li>\n                             <li><strong>Day 5:</strong> UI/UX Design and Digital Marketing</li>\n                             </ul>\n                             <h4>Expert Speakers:</h4>\n                             <ul>\n                             <li>Sarah Chen - Head of AI, Gojek</li>\n                             <li>Ravi Patel - Senior Data Scientist, Tokopedia</li>\n                             <li>Dr. Indira Sari - Cybersecurity Consultant</li>\n                             <li>Michael Kim - Cloud Architect, AWS</li>\n                             <li>Lisa Wang - Lead UX Designer, Shopee</li>\n                             </ul>\n                             <h4>Workshop Highlights:</h4>\n                             <ul>\n                             <li>Hands-on praktikum dengan real industry cases</li>\n                             <li>Portfolio building session</li>\n                             <li>Mock interview dengan HR professionals</li>\n                             <li>Networking session dengan industry leaders</li>\n                             <li>Job matching dengan partner companies</li>\n                             </ul>\n                             <h4>Outcome dan Benefits:</h4>\n                             <ul>\n                             <li>Sertifikat completion dari masing-masing track</li>\n                             <li>Project portfolio yang industry-ready</li>\n                             <li>Direct connection dengan hiring managers</li>\n                             <li>Follow-up mentoring program selama 3 bulan</li>\n                             </ul>\n                             <p>Workshop ini diikuti oleh 200 mahasiswa semester akhir dari berbagai program studi. Lebih dari 70% peserta workshop tahun lalu berhasil mendapat job offer dalam 6 bulan.</p>\n                             <p>\"Skills gap antara dunia pendidikan dan industri perlu dijembatani melalui program seperti ini,\" kata Director of Industry Relations.</p>', 'Publish', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `biaya_pendaftarans`
--

CREATE TABLE `biaya_pendaftarans` (
  `id` bigint UNSIGNED NOT NULL,
  `jalur_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` longtext COLLATE utf8mb4_unicode_ci,
  `value` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `biaya_pendaftarans`
--

INSERT INTO `biaya_pendaftarans` (`id`, `jalur_id`, `name`, `code`, `desc`, `value`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 1, 'Biaya Pendaftaran Reguler', 'BPR-20241', 'Biaya pendaftaran untuk jalur reguler', 500000, '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL),
(2, 2, 'Biaya Pendaftaran Beasiswa', 'BPB-20241', 'Biaya pendaftaran untuk jalur beasiswa', 250000, '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL),
(3, 3, 'Biaya Pendaftaran Transfer', 'BPT-20242', 'Biaya pendaftaran untuk jalur transfer', 750000, '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dokumen_p_m_b_s`
--

CREATE TABLE `dokumen_p_m_b_s` (
  `id` bigint UNSIGNED NOT NULL,
  `pendaftar_id` int NOT NULL,
  `syarat_id` int NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `status` enum('Pending','Valid','Tidak Valid') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dokumen_p_m_b_s`
--

INSERT INTO `dokumen_p_m_b_s` (`id`, `pendaftar_id`, `syarat_id`, `type`, `name`, `path`, `code`, `desc`, `status`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 1, 1, 'Ijazah', 'Ijazah SMA/SMK', 'dokumen/pmb/RGrYuCG5/ijazah.pdf', '9WgxgnVl', 'Menunggu validasi dokumen', 'Pending', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, 1, NULL, NULL),
(2, 1, 2, 'Transkrip', 'SKHUN', 'dokumen/pmb/RGrYuCG5/skhun.pdf', 'oUwIvyXY', 'Menunggu validasi dokumen', 'Pending', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, 1, NULL, NULL),
(3, 2, 1, 'Ijazah', 'Ijazah SMA/SMK', 'dokumen/pmb/Y4xPucw4/ijazah.pdf', 'yKXBFBYY', 'Menunggu validasi dokumen', 'Pending', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, 1, NULL, NULL),
(4, 2, 2, 'Transkrip', 'SKHUN', 'dokumen/pmb/Y4xPucw4/skhun.pdf', 'LrPDVn3G', 'Menunggu validasi dokumen', 'Pending', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, 1, NULL, NULL),
(5, 3, 3, 'Sertifikat', 'Sertifikat Prestasi', 'dokumen/pmb/F5UEUL0V/sertifikat.pdf', 'lroMUarl', 'Menunggu validasi dokumen', 'Pending', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, 1, NULL, NULL),
(6, 4, 3, 'Sertifikat', 'Sertifikat Prestasi', 'dokumen/pmb/HO8iUXuE/sertifikat.pdf', 'C7Ho7Fzt', 'Menunggu validasi dokumen', 'Pending', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dosens`
--

CREATE TABLE `dosens` (
  `id` bigint UNSIGNED NOT NULL,
  `type` tinyint NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_ig` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_fb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_in` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio_blood` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio_height` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio_weight` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio_gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio_religion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio_placebirth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio_nationality` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio_datebirth` date DEFAULT NULL,
  `numb_kk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numb_ktp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numb_npsn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numb_nidn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numb_nitk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numb_staff` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fst_setup` tinyint(1) NOT NULL DEFAULT '0',
  `tfa_setup` tinyint(1) NOT NULL DEFAULT '0',
  `ktp_addres` text COLLATE utf8mb4_unicode_ci,
  `ktp_rt` text COLLATE utf8mb4_unicode_ci,
  `ktp_rw` text COLLATE utf8mb4_unicode_ci,
  `ktp_village` text COLLATE utf8mb4_unicode_ci,
  `ktp_subdistrict` text COLLATE utf8mb4_unicode_ci,
  `ktp_poscode` text COLLATE utf8mb4_unicode_ci,
  `ktp_city` text COLLATE utf8mb4_unicode_ci,
  `ktp_province` text COLLATE utf8mb4_unicode_ci,
  `domicile_same` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `domicile_addres` text COLLATE utf8mb4_unicode_ci,
  `domicile_rt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domicile_rw` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domicile_village` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domicile_subdistrict` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domicile_poscode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domicile_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domicile_province` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_refresh_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_front` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_behind` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edu1_type` enum('SMA/SMK','Diploma','Sarjana','Magister','Doktor') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'SMA/SMK',
  `edu1_place` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edu1_major` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edu1_average_score` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edu1_graduate_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edu2_type` enum('SMA/SMK','Diploma','Sarjana','Magister','Doktor') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edu2_place` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edu2_major` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edu2_average_score` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edu2_graduate_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edu3_type` enum('SMA/SMK','Diploma','Sarjana','Magister','Doktor') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edu3_place` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edu3_major` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edu3_average_score` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edu3_graduate_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dosens`
--

INSERT INTO `dosens` (`id`, `type`, `name`, `photo`, `username`, `phone`, `email`, `link_ig`, `link_fb`, `link_in`, `bio_blood`, `bio_height`, `bio_weight`, `bio_gender`, `bio_religion`, `bio_placebirth`, `bio_nationality`, `bio_datebirth`, `numb_kk`, `numb_ktp`, `numb_npsn`, `numb_nidn`, `numb_nitk`, `numb_staff`, `code`, `password`, `fst_setup`, `tfa_setup`, `ktp_addres`, `ktp_rt`, `ktp_rw`, `ktp_village`, `ktp_subdistrict`, `ktp_poscode`, `ktp_city`, `ktp_province`, `domicile_same`, `domicile_addres`, `domicile_rt`, `domicile_rw`, `domicile_village`, `domicile_subdistrict`, `domicile_poscode`, `domicile_city`, `domicile_province`, `google_id`, `google_token`, `google_refresh_token`, `title_front`, `title_behind`, `edu1_type`, `edu1_place`, `edu1_major`, `edu1_average_score`, `edu1_graduate_year`, `edu2_type`, `edu2_place`, `edu2_major`, `edu2_average_score`, `edu2_graduate_year`, `edu3_type`, `edu3_place`, `edu3_major`, `edu3_average_score`, `edu3_graduate_year`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 1, 'Dosen A', 'default.jpg', 'dosen.a', '080012345671', 'dosen.a@example.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'jjjZSp', '$2y$12$EQKe71BJ5b.v.Z042vnIq.bsJrZU6iwzAX1brXSuHdCObSot756UW', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SMA/SMK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-19 09:43:16', '2025-08-19 09:43:16', NULL, NULL, NULL, NULL),
(2, 1, 'Dosen B', 'default.jpg', 'dosen.b', '080012345672', 'dosen.b@example.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0nMVmT', '$2y$12$x7zRxvrv232rFIMM6TUJ7uVV.rMZlCMbdM5vsfVp7CWvjr0qGFQXy', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SMA/SMK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-19 09:43:16', '2025-08-19 09:43:16', NULL, NULL, NULL, NULL),
(3, 1, 'Dosen C', 'default.jpg', 'dosen.c', '080012345673', 'dosen.c@example.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'vDPl0s', '$2y$12$VvWEdX7/gafSXkHtSWMes..1aGwsbl.JLvkLdLs71ZFQCl.YK4zuO', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SMA/SMK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-19 09:43:17', '2025-08-19 09:43:17', NULL, NULL, NULL, NULL),
(4, 1, 'Dosen D', 'default.jpg', 'dosen.d', '080012345674', 'dosen.d@example.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'hv76E7', '$2y$12$WjKFeJ60mU3BDdtmKaMRleXsTF7vYQlkl6i3UBS3cjoScAFNj6dee', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SMA/SMK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-19 09:43:17', '2025-08-19 09:43:17', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `id` bigint UNSIGNED NOT NULL,
  `dekan_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` longtext COLLATE utf8mb4_unicode_ci,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accreditation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `objectives` longtext COLLATE utf8mb4_unicode_ci,
  `careers` longtext COLLATE utf8mb4_unicode_ci,
  `status` enum('Aktif','Tidak Aktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`id`, `dekan_id`, `name`, `code`, `desc`, `slug`, `accreditation`, `objectives`, `careers`, `status`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 1, 'Fakultas Teknologi Informasi', 'FTI', 'Fakultas yang fokus pada pengembangan teknologi informasi dan komunikasi', 'fakultas-teknologi-informasi', 'A', 'Menghasilkan lulusan yang kompeten dalam bidang teknologi informasi', 'Software Engineer, Data Scientist, IT Consultant', 'Aktif', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL),
(2, 2, 'Fakultas Ekonomi dan Bisnis', 'FEB', 'Fakultas yang fokus pada pengembangan ilmu ekonomi dan bisnis', 'fakultas-ekonomi-dan-bisnis', 'A', 'Menghasilkan lulusan yang kompeten dalam bidang ekonomi dan bisnis', 'Business Analyst, Accountant, Financial Advisor', 'Aktif', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `galeris`
--

CREATE TABLE `galeris` (
  `id` bigint UNSIGNED NOT NULL,
  `kategori_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Draft','Publish','Archive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Draft',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galeris_foto`
--

CREATE TABLE `galeris_foto` (
  `id` bigint UNSIGNED NOT NULL,
  `galeri_id` int NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gedungs`
--

CREATE TABLE `gedungs` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gedungs`
--

INSERT INTO `gedungs` (`id`, `name`, `code`, `photo`, `desc`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 'Gedung A', 'GDA', 'gedung-a.jpg', 'Gedung utama kampus', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL),
(2, 'Gedung B', 'GDB', 'gedung-b.jpg', 'Gedung laboratorium', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gelombang_pendaftarans`
--

CREATE TABLE `gelombang_pendaftarans` (
  `id` bigint UNSIGNED NOT NULL,
  `jalur_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` longtext COLLATE utf8mb4_unicode_ci,
  `start_date` date NOT NULL,
  `ended_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gelombang_pendaftarans`
--

INSERT INTO `gelombang_pendaftarans` (`id`, `jalur_id`, `name`, `code`, `desc`, `start_date`, `ended_date`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 1, 'Gelombang 1', 'GP-20241-1', 'Gelombang pendaftaran pertama', '2024-06-01', '2024-07-15', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL),
(2, 1, 'Gelombang 2', 'GP-20241-2', 'Gelombang pendaftaran kedua', '2024-07-16', '2024-08-31', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL),
(3, 2, 'Gelombang Beasiswa', 'GPB-20241-1', 'Gelombang pendaftaran beasiswa', '2024-06-01', '2024-07-31', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inventaris_barangs`
--

CREATE TABLE `inventaris_barangs` (
  `id` bigint UNSIGNED NOT NULL,
  `barang_id` int NOT NULL,
  `lokasi_id` int NOT NULL,
  `jumlah` int NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kondisi` enum('Baik','Rusak Ringan','Rusak Berat') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Aktif','Tidak Aktif','Dihapus') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Aktif',
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventaris_barangs`
--

INSERT INTO `inventaris_barangs` (`id`, `barang_id`, `lokasi_id`, `jumlah`, `photo`, `kondisi`, `status`, `code`, `desc`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 1, 1, 3, 'inv-laptop.jpg', 'Baik', 'Aktif', 'INV-vmJaW1B9', 'Laptop untuk dosen', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL),
(2, 2, 2, 2, 'inv-proyektor.jpg', 'Baik', 'Aktif', 'INV-62I84nwR', 'Proyektor untuk lab', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL),
(3, 3, 3, 5, 'inv-meja.jpg', 'Baik', 'Aktif', 'INV-FvtRbtXt', 'Meja untuk ruang meeting', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_kelas`
--

CREATE TABLE `jadwal_kelas` (
  `id` bigint UNSIGNED NOT NULL,
  `jadwal_id` bigint UNSIGNED NOT NULL,
  `kelas_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal_kelas`
--

INSERT INTO `jadwal_kelas` (`id`, `jadwal_id`, `kelas_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 2, 1, NULL, NULL),
(4, 3, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_kuliahs`
--

CREATE TABLE `jadwal_kuliahs` (
  `id` bigint UNSIGNED NOT NULL,
  `dosen_id` int NOT NULL,
  `ruang_id` int NOT NULL,
  `matkul_id` int NOT NULL,
  `jenis_kelas_id` int NOT NULL,
  `waktu_kuliah_id` int NOT NULL,
  `bsks` int NOT NULL,
  `pertemuan` int NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu') COLLATE utf8mb4_unicode_ci NOT NULL,
  `metode` enum('Tatap Muka','Teleconference') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal_kuliahs`
--

INSERT INTO `jadwal_kuliahs` (`id`, `dosen_id`, `ruang_id`, `matkul_id`, `jenis_kelas_id`, `waktu_kuliah_id`, `bsks`, `pertemuan`, `code`, `link`, `hari`, `metode`, `tanggal`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 1, 1, 1, 1, 1, 3, 16, 'JDW-g4WI1JQg', NULL, 'Senin', 'Tatap Muka', '2025-01-13', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL),
(2, 2, 2, 2, 1, 3, 3, 16, 'JDW-FCbelu2h', NULL, 'Selasa', 'Tatap Muka', '2025-01-14', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL),
(3, 2, 2, 3, 2, 8, 3, 16, 'JDW-h3RYMEur', 'https://meet.google.com/abc-def-ghi', 'Rabu', 'Teleconference', '2025-01-15', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_p_m_b_s`
--

CREATE TABLE `jadwal_p_m_b_s` (
  `id` bigint UNSIGNED NOT NULL,
  `gelombang_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('Pendaftaran','Tes','Wawancara','Pengumuman','Daftar Ulang') COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` longtext COLLATE utf8mb4_unicode_ci,
  `start_date` date NOT NULL,
  `ended_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal_p_m_b_s`
--

INSERT INTO `jadwal_p_m_b_s` (`id`, `gelombang_id`, `name`, `type`, `code`, `desc`, `start_date`, `ended_date`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 1, 'Tes Tulis Gelombang 1', 'Tes', 'JPMB-20241-1', 'Jadwal tes tulis untuk gelombang 1', '2024-07-20', '2024-07-20', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL),
(2, 1, 'Wawancara Gelombang 1', 'Wawancara', 'JPMB-20241-2', 'Jadwal wawancara untuk gelombang 1', '2024-07-25', '2024-07-25', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL),
(3, 2, 'Tes Tulis Gelombang 2', 'Tes', 'JPMB-20241-3', 'Jadwal tes tulis untuk gelombang 2', '2024-08-20', '2024-08-20', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jalur_pendaftarans`
--

CREATE TABLE `jalur_pendaftarans` (
  `id` bigint UNSIGNED NOT NULL,
  `periode_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jalur_pendaftarans`
--

INSERT INTO `jalur_pendaftarans` (`id`, `periode_id`, `name`, `code`, `desc`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 1, 'Jalur Reguler', 'JR-20241', 'Jalur pendaftaran reguler untuk calon mahasiswa baru', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL),
(2, 1, 'Jalur Beasiswa', 'JB-20241', 'Jalur pendaftaran beasiswa untuk calon mahasiswa berprestasi', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL),
(3, 2, 'Jalur Transfer', 'JT-20242', 'Jalur pendaftaran untuk mahasiswa transfer dari perguruan tinggi lain', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kelas`
--

CREATE TABLE `jenis_kelas` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Aktif','Tidak Aktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_kelas`
--

INSERT INTO `jenis_kelas` (`id`, `name`, `code`, `desc`, `status`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 'Regular', 'REG', 'Kelas reguler dengan jadwal pagi', 'Aktif', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL),
(2, 'Karyawan', 'KAR', 'Kelas khusus karyawan dengan jadwal malam', 'Aktif', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jenjang_pendidikans`
--

CREATE TABLE `jenjang_pendidikans` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `singkatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenjang_pendidikans`
--

INSERT INTO `jenjang_pendidikans` (`id`, `nama`, `singkatan`, `created_at`, `updated_at`) VALUES
(1, 'Diploma Tiga', 'D3', '2025-08-19 09:43:18', '2025-08-19 09:43:18'),
(2, 'Diploma Empat', 'D4', '2025-08-19 09:43:18', '2025-08-19 09:43:18'),
(3, 'Sarjana', 'S1', '2025-08-19 09:43:18', '2025-08-19 09:43:18'),
(4, 'Magister', 'S2', '2025-08-19 09:43:18', '2025-08-19 09:43:18'),
(5, 'Doktoral', 'S3', '2025-08-19 09:43:18', '2025-08-19 09:43:18'),
(6, 'Diploma Tiga', 'D3', '2025-08-19 09:51:00', '2025-08-19 09:51:00'),
(7, 'Diploma Empat', 'D4', '2025-08-19 09:51:00', '2025-08-19 09:51:00'),
(8, 'Sarjana', 'S1', '2025-08-19 09:51:00', '2025-08-19 09:51:00'),
(9, 'Magister', 'S2', '2025-08-19 09:51:00', '2025-08-19 09:51:00'),
(10, 'Doktoral', 'S3', '2025-08-19 09:51:00', '2025-08-19 09:51:00');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kalender_akademiks`
--

CREATE TABLE `kalender_akademiks` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` longtext COLLATE utf8mb4_unicode_ci,
  `start_date` date NOT NULL,
  `ended_date` date DEFAULT NULL,
  `type` enum('Perkuliahan','Ujian','Libur','Pendaftaran','Wisuda','Orientasi','Seminar','Lainnya') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Lainnya',
  `status` enum('Draft','Publish','Archive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Draft',
  `color` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#007bff',
  `highlight` enum('Ya','Tidak') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Tidak',
  `note` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kalender_akademiks`
--

INSERT INTO `kalender_akademiks` (`id`, `name`, `code`, `desc`, `start_date`, `ended_date`, `type`, `status`, `color`, `highlight`, `note`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 'Awal Perkuliahan Semester Ganjil 2024/2025', 'KAL-H22TV6VD', 'Dimulainya perkuliahan untuk semester ganjil tahun akademik 2024/2025', '2024-09-04', NULL, 'Perkuliahan', 'Publish', '#28a745', 'Ya', 'Mahasiswa wajib hadir tepat waktu', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL),
(2, 'Ujian Tengah Semester (UTS)', 'KAL-QCQHFRZ3', 'Pelaksanaan Ujian Tengah Semester untuk semua program studi', '2024-10-15', '2024-10-26', 'Ujian', 'Publish', '#ffc107', 'Ya', 'Jadwal ujian akan diumumkan 2 minggu sebelumnya', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL),
(3, 'Libur Semester', 'KAL-ICVX2NCW', 'Libur semester ganjil', '2024-12-23', '2025-01-08', 'Libur', 'Publish', '#dc3545', 'Tidak', 'Aktivitas akademik dihentikan sementara', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL),
(4, 'Ujian Akhir Semester (UAS)', 'KAL-CHYMDZS9', 'Pelaksanaan Ujian Akhir Semester', '2024-12-11', '2024-12-22', 'Ujian', 'Publish', '#fd7e14', 'Ya', 'Ujian wajib diikuti oleh seluruh mahasiswa', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL),
(5, 'Pendaftaran Semester Genap 2024/2025', 'KAL-L43D29DD', 'Pembukaan pendaftaran dan registrasi untuk semester genap', '2025-01-01', '2025-01-15', 'Pendaftaran', 'Publish', '#20c997', 'Ya', 'Pembayaran SPP dan pengisian KRS', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL),
(6, 'Orientasi Mahasiswa Baru', 'KAL-CCOCHTJK', 'Program orientasi untuk mahasiswa baru tahun akademik 2024/2025', '2024-08-26', '2024-08-30', 'Orientasi', 'Publish', '#6f42c1', 'Ya', 'Wajib diikuti oleh seluruh mahasiswa baru', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL),
(7, 'Wisuda Periode I Tahun 2025', 'KAL-WFI6ZAAC', 'Upacara wisuda untuk lulusan periode I', '2025-03-15', NULL, 'Wisuda', 'Publish', '#e83e8c', 'Ya', 'Dress code jas almamater', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL),
(8, 'Seminar Nasional Teknologi', 'KAL-JCWTWHEF', 'Seminar nasional dengan tema \"Inovasi Teknologi untuk Masa Depan\"', '2024-11-20', '2024-11-21', 'Seminar', 'Publish', '#17a2b8', 'Tidak', 'Terbuka untuk umum', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategoris`
--

INSERT INTO `kategoris` (`id`, `name`, `code`, `slug`, `desc`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 'Akademik', 'KTG-J1F9UDSX', 'akademik', 'Kategori untuk berita, pengumuman, dan galeri terkait kegiatan akademik seperti perkuliahan, penelitian, dan pengabdian masyarakat.', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, 1, NULL, NULL),
(2, 'Kemahasiswaan', 'KTG-PNWPWASR', 'kemahasiswaan', 'Kategori untuk berita, pengumuman, dan galeri terkait kegiatan kemahasiswaan seperti organisasi, UKM, dan event kampus.', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, 1, NULL, NULL),
(3, 'Beasiswa', 'KTG-YK7IGT0R', 'beasiswa', 'Kategori untuk berita dan pengumuman terkait informasi beasiswa, baik internal maupun eksternal kampus.', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, 1, NULL, NULL),
(4, 'Event', 'KTG-OAT76BYX', 'event', 'Kategori untuk berita, pengumuman, dan galeri terkait event atau acara yang diselenggarakan di kampus.', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, 1, NULL, NULL),
(5, 'Prestasi', 'KTG-HVXDBSQX', 'prestasi', 'Kategori untuk berita dan galeri terkait prestasi yang diraih oleh mahasiswa, dosen, atau institusi.', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, 1, NULL, NULL),
(6, 'Kerjasama', 'KTG-WBGSFESO', 'kerjasama', 'Kategori untuk berita dan pengumuman terkait kerjasama dengan institusi lain, baik dalam maupun luar negeri.', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, 1, NULL, NULL),
(7, 'Fasilitas', 'KTG-H3SKXZGG', 'fasilitas', 'Kategori untuk berita, pengumuman, dan galeri terkait fasilitas kampus dan pengembangannya.', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, 1, NULL, NULL),
(8, 'Alumni', 'KTG-URB3EFXO', 'alumni', 'Kategori untuk berita dan galeri terkait kegiatan dan prestasi alumni.', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, 1, NULL, NULL),
(9, 'Penerimaan Mahasiswa', 'KTG-CKRASDYZ', 'penerimaan-mahasiswa', 'Kategori untuk berita dan pengumuman terkait penerimaan mahasiswa baru dan informasi pendaftaran.', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, 1, NULL, NULL),
(10, 'Wisuda', 'KTG-QUEWEH6R', 'wisuda', 'Kategori untuk berita, pengumuman, dan galeri terkait kegiatan wisuda dan kelulusan mahasiswa.', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_barangs`
--

CREATE TABLE `kategori_barangs` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_barangs`
--

INSERT INTO `kategori_barangs` (`id`, `name`, `code`, `slug`, `desc`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 'Elektronik', 'ELK', 'elektronik', 'Barang-barang elektronik', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL),
(2, 'Furniture', 'FRN', 'furniture', 'Perabotan dan furniture', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint UNSIGNED NOT NULL,
  `taka_id` int NOT NULL,
  `prodi_id` int NOT NULL,
  `jenis_kelas_id` int NOT NULL,
  `ketua_id` int DEFAULT NULL,
  `capacity` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `taka_id`, `prodi_id`, `jenis_kelas_id`, `ketua_id`, `capacity`, `name`, `code`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 1, 1, 1, NULL, 50, 'Kelas A', 'A2024', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL),
(2, 1, 1, 1, NULL, 45, 'Kelas B', 'B2024', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL),
(3, 1, 2, 2, NULL, 30, 'Kelas X Karyawan', 'XK2024', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `krs_details`
--

CREATE TABLE `krs_details` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `krs_id` bigint UNSIGNED NOT NULL,
  `matkul_id` bigint UNSIGNED NOT NULL,
  `kelas_id` bigint UNSIGNED DEFAULT NULL,
  `dosen_id` bigint UNSIGNED DEFAULT NULL,
  `sks` int NOT NULL,
  `status` enum('Aktif','Batal','Mengulang') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Aktif',
  `notes` text COLLATE utf8mb4_unicode_ci,
  `prasyarat_terpenuhi` tinyint(1) NOT NULL DEFAULT '1',
  `prasyarat_notes` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kurikulums`
--

CREATE TABLE `kurikulums` (
  `id` bigint UNSIGNED NOT NULL,
  `prodi_id` int NOT NULL,
  `taka_start` int NOT NULL,
  `taka_ended` int DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Masih Berlaku','Tidak Berlaku') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kurikulums`
--

INSERT INTO `kurikulums` (`id`, `prodi_id`, `taka_start`, `taka_ended`, `name`, `code`, `desc`, `status`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 1, 20241, NULL, 'Kurikulum Merdeka Belajar TI 2024', 'KMBTI24', 'Kurikulum berbasis Merdeka Belajar untuk Program Studi Teknik Informatika', 'Masih Berlaku', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL),
(2, 2, 20241, NULL, 'Kurikulum Merdeka Belajar MNJ 2024', 'KMBMNJ24', 'Kurikulum berbasis Merdeka Belajar untuk Program Studi Manajemen', 'Masih Berlaku', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `k_h_s`
--

CREATE TABLE `k_h_s` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mahasiswa_id` bigint UNSIGNED NOT NULL,
  `taka_id` bigint UNSIGNED NOT NULL,
  `semester` int NOT NULL,
  `total_sks_tempuh` int NOT NULL DEFAULT '0',
  `total_sks_lulus` int NOT NULL DEFAULT '0',
  `total_mutu` decimal(8,2) NOT NULL DEFAULT '0.00',
  `ips` decimal(3,2) NOT NULL DEFAULT '0.00',
  `total_sks_kumulatif` int NOT NULL DEFAULT '0',
  `total_mutu_kumulatif` decimal(8,2) NOT NULL DEFAULT '0.00',
  `ipk` decimal(3,2) NOT NULL DEFAULT '0.00',
  `status_akademik` enum('Aktif','Cuti','DO','Lulus','Non-Aktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Aktif',
  `prediksi_kelulusan` enum('Tepat Waktu','Terlambat','Berisiko DO','Tidak Terprediksi') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ranking_semester` int DEFAULT NULL,
  `ranking_angkatan` int DEFAULT NULL,
  `ranking_prodi` int DEFAULT NULL,
  `prestasi` text COLLATE utf8mb4_unicode_ci,
  `catatan_akademik` text COLLATE utf8mb4_unicode_ci,
  `rekomendasi` text COLLATE utf8mb4_unicode_ci,
  `status_generate` enum('Draft','Final','Published') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Draft',
  `published_at` timestamp NULL DEFAULT NULL,
  `is_locked` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `k_r_s`
--

CREATE TABLE `k_r_s` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mahasiswa_id` bigint UNSIGNED NOT NULL,
  `taka_id` bigint UNSIGNED NOT NULL,
  `semester` bigint UNSIGNED NOT NULL,
  `status` enum('Draft','Diajukan','Disetujui','Ditolak') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Draft',
  `dosen_pa_id` bigint UNSIGNED DEFAULT NULL,
  `approved_at` timestamp NULL DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `total_sks` int NOT NULL DEFAULT '0',
  `max_sks` int NOT NULL DEFAULT '24',
  `ipk_sebelumnya` decimal(3,2) NOT NULL DEFAULT '0.00',
  `periode_mulai` date DEFAULT NULL,
  `periode_selesai` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `log_aktivitas`
--

CREATE TABLE `log_aktivitas` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `user_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  `changes` json DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswas`
--

CREATE TABLE `mahasiswas` (
  `id` bigint UNSIGNED NOT NULL,
  `type` tinyint NOT NULL DEFAULT '0',
  `semester` int NOT NULL DEFAULT '0',
  `taka_regist` int NOT NULL DEFAULT '0',
  `taka_active` int NOT NULL DEFAULT '0',
  `prodi_id` int NOT NULL DEFAULT '0',
  `kelas_id` int NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_ig` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_fb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_in` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio_blood` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio_height` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio_weight` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio_gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio_religion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio_placebirth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio_nationality` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio_datebirth` date DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fst_setup` tinyint(1) NOT NULL DEFAULT '0',
  `tfa_setup` tinyint(1) NOT NULL DEFAULT '0',
  `ktp_addres` text COLLATE utf8mb4_unicode_ci,
  `ktp_rt` text COLLATE utf8mb4_unicode_ci,
  `ktp_rw` text COLLATE utf8mb4_unicode_ci,
  `ktp_village` text COLLATE utf8mb4_unicode_ci,
  `ktp_subdistrict` text COLLATE utf8mb4_unicode_ci,
  `ktp_poscode` text COLLATE utf8mb4_unicode_ci,
  `ktp_city` text COLLATE utf8mb4_unicode_ci,
  `ktp_province` text COLLATE utf8mb4_unicode_ci,
  `domicile_same` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `domicile_addres` text COLLATE utf8mb4_unicode_ci,
  `domicile_rt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domicile_rw` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domicile_village` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domicile_subdistrict` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domicile_poscode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domicile_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domicile_province` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_refresh_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_front` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_behind` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edu1_type` enum('SMA/SMK','Diploma','Sarjana','Magister','Doktor') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'SMA/SMK',
  `edu1_place` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edu1_major` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edu1_average_score` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edu1_graduate_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edu2_type` enum('SMA/SMK','Diploma','Sarjana','Magister','Doktor') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edu2_place` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edu2_major` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edu2_average_score` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edu2_graduate_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edu3_type` enum('SMA/SMK','Diploma','Sarjana','Magister','Doktor') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edu3_place` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edu3_major` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edu3_average_score` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edu3_graduate_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numb_kk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numb_ktp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numb_nim` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numb_reg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numb_nisn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_datebirth` date DEFAULT NULL,
  `father_lifestat` enum('Hidup','Meninggal') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Hidup',
  `father_education` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_occupation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_income` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_address` text COLLATE utf8mb4_unicode_ci,
  `mother_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_datebirth` date DEFAULT NULL,
  `mother_lifestat` enum('Hidup','Meninggal') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Hidup',
  `mother_education` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_occupation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_income` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_address` text COLLATE utf8mb4_unicode_ci,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guard_nik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guard_datebirth` date DEFAULT NULL,
  `guard_relation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guard_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guard_address` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mahasiswas`
--

INSERT INTO `mahasiswas` (`id`, `type`, `semester`, `taka_regist`, `taka_active`, `prodi_id`, `kelas_id`, `name`, `photo`, `username`, `phone`, `email`, `link_ig`, `link_fb`, `link_in`, `bio_blood`, `bio_height`, `bio_weight`, `bio_gender`, `bio_religion`, `bio_placebirth`, `bio_nationality`, `bio_datebirth`, `code`, `password`, `fst_setup`, `tfa_setup`, `ktp_addres`, `ktp_rt`, `ktp_rw`, `ktp_village`, `ktp_subdistrict`, `ktp_poscode`, `ktp_city`, `ktp_province`, `domicile_same`, `domicile_addres`, `domicile_rt`, `domicile_rw`, `domicile_village`, `domicile_subdistrict`, `domicile_poscode`, `domicile_city`, `domicile_province`, `google_id`, `google_token`, `google_refresh_token`, `title_front`, `title_behind`, `edu1_type`, `edu1_place`, `edu1_major`, `edu1_average_score`, `edu1_graduate_year`, `edu2_type`, `edu2_place`, `edu2_major`, `edu2_average_score`, `edu2_graduate_year`, `edu3_type`, `edu3_place`, `edu3_major`, `edu3_average_score`, `edu3_graduate_year`, `numb_kk`, `numb_ktp`, `numb_nim`, `numb_reg`, `numb_nisn`, `father_name`, `father_datebirth`, `father_lifestat`, `father_education`, `father_occupation`, `father_income`, `father_phone`, `father_address`, `mother_name`, `mother_datebirth`, `mother_lifestat`, `mother_education`, `mother_occupation`, `mother_income`, `mother_phone`, `mother_address`, `guard_name`, `guard_nik`, `guard_datebirth`, `guard_relation`, `guard_phone`, `guard_address`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 1, 1, 0, 0, 1, 1, 'Mahasiswa A', 'default.jpg', 'mahasiswa.a', '080012345670', 'mahasiswa.a@example.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8KvUdl', '$2y$12$w.wHUnGmwaN249OxNC0/9OyuYmQNQ5EqknbhZKEA/xLwABjeTrPDi', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SMA/SMK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '24213241', NULL, NULL, NULL, NULL, 'Hidup', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Hidup', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-19 09:43:17', '2025-08-19 09:43:17', NULL, NULL, NULL, NULL),
(2, 1, 1, 0, 0, 2, 3, 'Mahasiswa B', 'default.jpg', 'mahasiswa.b', '080012345671', 'mahasiswa.b@example.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pPJghk', '$2y$12$Cpn84AzBQmhk0j/KrhMdKuMG6R3xWgVR3dS26DQOUXtXSxoqHRDWe', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SMA/SMK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '24213242', NULL, NULL, NULL, NULL, 'Hidup', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Hidup', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-19 09:43:17', '2025-08-19 09:43:17', NULL, NULL, NULL, NULL),
(3, 0, 0, 0, 0, 0, 0, 'Mahasiswa C', 'default.jpg', 'mahasiswa.c', '080012345672', 'mahasiswa.c@example.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2edBpw', '$2y$12$4r9InRJarQVFG19Ro0iP0.tlC8Qc2PcEWPHT.LbRnxn5K51rZJFa.', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SMA/SMK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Hidup', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Hidup', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-19 09:43:17', '2025-08-19 09:43:17', NULL, NULL, NULL, NULL),
(4, 0, 0, 0, 0, 0, 0, 'Mahasiswa D', 'default.jpg', 'mahasiswa.d', '080012345673', 'mahasiswa.d@example.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'UtNxlr', '$2y$12$1bML7A/xA8Y.6zBBRo.b2eab923ZWiWddxEVTtr7mR/uaeKf0vhh2', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SMA/SMK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Hidup', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Hidup', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mata_kuliahs`
--

CREATE TABLE `mata_kuliahs` (
  `id` bigint UNSIGNED NOT NULL,
  `kurikulum_id` int NOT NULL,
  `prodi_id` int NOT NULL,
  `requi_id` int DEFAULT NULL,
  `dosen1_id` int NOT NULL,
  `dosen2_id` int DEFAULT NULL,
  `dosen3_id` int DEFAULT NULL,
  `semester` int NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bsks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `docs_rps` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `docs_kontrak_kuliah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mata_kuliahs`
--

INSERT INTO `mata_kuliahs` (`id`, `kurikulum_id`, `prodi_id`, `requi_id`, `dosen1_id`, `dosen2_id`, `dosen3_id`, `semester`, `photo`, `name`, `code`, `bsks`, `desc`, `docs_rps`, `docs_kontrak_kuliah`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 1, 1, NULL, 1, NULL, NULL, 1, 'default.png', 'Algoritma & Pemrograman', 'A&P101', '3', 'Mempelajari dasar algoritma dan pemrograman', NULL, NULL, '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL),
(2, 1, 1, 1, 2, 1, NULL, 2, 'default.png', 'Struktur Data', 'SD201', '3', 'Mempelajari berbagai struktur data', NULL, NULL, '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL),
(3, 2, 2, NULL, 2, NULL, NULL, 1, 'default.png', 'Pengantar Manajemen', 'PM101', '3', 'Konsep dasar manajemen', NULL, NULL, '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `matkul_rencana_studis`
--

CREATE TABLE `matkul_rencana_studis` (
  `id` bigint UNSIGNED NOT NULL,
  `renstu_id` int NOT NULL,
  `matkul_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_03_09_024013_create_mahasiswas_table', 1),
(6, '2024_03_09_024021_create_dosens_table', 1),
(7, '2025_05_27_231222_create_absensis_table', 1),
(8, '2025_05_29_100556_create_tahun_akademiks_table', 1),
(9, '2025_05_29_104807_create_fakultas_table', 1),
(10, '2025_05_29_104814_create_program_studis_table', 1),
(11, '2025_05_30_212448_create_kurikulums_table', 1),
(12, '2025_06_02_003942_create_kategoris_table', 1),
(13, '2025_06_02_004058_create_beritas_table', 1),
(14, '2025_06_02_004105_create_pengumumen_table', 1),
(15, '2025_06_02_004215_create_galeris_table', 1),
(16, '2025_06_02_005353_create_galeris_foto_table', 1),
(17, '2025_06_02_182347_create_log_aktivitas_table', 1),
(18, '2025_06_02_202721_create_activity_log_changes_table', 1),
(19, '2025_06_03_013437_create_jobs_table', 1),
(20, '2025_06_03_022238_create_web_settings_table', 1),
(21, '2025_06_03_183327_create_jenis_kelas_table', 1),
(22, '2025_06_03_183343_create_mata_kuliahs_table', 1),
(23, '2025_06_03_183423_create_kelas_table', 1),
(24, '2025_06_03_183550_create_waktu_kuliahs_table', 1),
(25, '2025_06_03_183557_create_jadwal_kuliahs_table', 1),
(26, '2025_06_03_193705_create_jadwal_kelas', 1),
(27, '2025_06_06_030329_create_periode_pendaftarans_table', 1),
(28, '2025_06_06_030734_create_jalur_pendaftarans_table', 1),
(29, '2025_06_06_030748_create_biaya_pendaftarans_table', 1),
(30, '2025_06_06_031314_create_syarat_pendaftarans_table', 1),
(31, '2025_06_06_031332_create_gelombang_pendaftarans_table', 1),
(32, '2025_06_06_031354_create_jadwal_p_m_b_s_table', 1),
(33, '2025_06_06_033530_create_pendaftars_table', 1),
(34, '2025_06_06_033538_create_dokumen_p_m_b_s_table', 1),
(35, '2025_06_08_044344_create_gedungs_table', 1),
(36, '2025_06_08_044355_create_ruangs_table', 1),
(37, '2025_06_08_044519_create_kategori_barangs_table', 1),
(38, '2025_06_08_044523_create_barangs_table', 1),
(39, '2025_06_08_044540_create_pengadaan_barangs_table', 1),
(40, '2025_06_08_044549_create_inventaris_barangs_table', 1),
(41, '2025_06_08_044556_create_mutasi_barangs_table', 1),
(42, '2025_06_12_232504_create_saldos_table', 1),
(43, '2025_06_12_232531_create_tagihan_kuliahs_table', 1),
(44, '2025_06_12_232532_create_tagihan_kuliah_groups_table', 1),
(45, '2025_06_12_232614_create_riwayat_pembayarans_table', 1),
(46, '2025_06_24_054307_create_rencana_studis_table', 1),
(47, '2025_06_24_054517_create_riwayat_rencana_studis_table', 1),
(48, '2025_07_10_000001_create_k_r_s_table', 1),
(49, '2025_07_10_000002_create_krs_details_table', 1),
(50, '2025_07_10_000003_create_nilais_table', 1),
(51, '2025_07_10_000004_create_k_h_s_table', 1),
(52, '2025_07_25_000001_create_kalender_akademiks_table', 1),
(53, '2025_08_19_000000_create_jenjang_pendidikans_table', 1),
(54, '2025_08_19_000001_add_jenjang_id_to_program_studis_table', 1),
(55, '2025_08_19_000002_add_jenjang_id_to_pendaftars_table', 1),
(56, '2025_08_19_000003_create_pendaftar_users_table', 1),
(57, '2025_08_19_000004_add_pendaftar_user_id_to_pendaftars_table', 1),
(58, '2025_08_19_152033_add_payment_fields_to_pendaftars_table', 1),
(59, '2025_08_19_152100_add_payment_fields_to_pendaftars_table', 1),
(60, '2025_08_19_162213_update_program_studis_title_enum', 1),
(61, '2025_08_19_163751_add_personal_data_fields_to_pendaftars_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mutasi_barangs`
--

CREATE TABLE `mutasi_barangs` (
  `id` bigint UNSIGNED NOT NULL,
  `barang_id` int NOT NULL,
  `lokasi_awal` int NOT NULL,
  `lokasi_akhir` int NOT NULL,
  `jumlah` int NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kondisi` enum('Baik','Rusak Ringan','Rusak Berat') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Aktif','Tidak Aktif','Dihapus') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Aktif',
  `desc` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mutasi_barangs`
--

INSERT INTO `mutasi_barangs` (`id`, `barang_id`, `lokasi_awal`, `lokasi_akhir`, `jumlah`, `code`, `photo`, `kondisi`, `status`, `desc`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 1, 1, 2, 2, 'MUT-rxD9093l', 'mutasi-1.jpg', 'Baik', 'Aktif', 'Mutasi untuk maintenance', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL),
(2, 2, 2, 3, 1, 'MUT-nBgejnc8', 'mutasi-2.jpg', 'Baik', 'Aktif', 'Mutasi untuk presentasi', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nilais`
--

CREATE TABLE `nilais` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mahasiswa_id` bigint UNSIGNED NOT NULL,
  `matkul_id` bigint UNSIGNED NOT NULL,
  `krs_detail_id` bigint UNSIGNED DEFAULT NULL,
  `taka_id` bigint UNSIGNED NOT NULL,
  `semester` int NOT NULL,
  `tugas_1` decimal(5,2) DEFAULT NULL,
  `tugas_2` decimal(5,2) DEFAULT NULL,
  `tugas_3` decimal(5,2) DEFAULT NULL,
  `quiz_1` decimal(5,2) DEFAULT NULL,
  `quiz_2` decimal(5,2) DEFAULT NULL,
  `uts` decimal(5,2) DEFAULT NULL,
  `uas` decimal(5,2) DEFAULT NULL,
  `praktikum` decimal(5,2) DEFAULT NULL,
  `kehadiran` decimal(5,2) DEFAULT NULL,
  `bobot_tugas` decimal(5,2) NOT NULL DEFAULT '20.00',
  `bobot_quiz` decimal(5,2) NOT NULL DEFAULT '10.00',
  `bobot_uts` decimal(5,2) NOT NULL DEFAULT '30.00',
  `bobot_uas` decimal(5,2) NOT NULL DEFAULT '35.00',
  `bobot_praktikum` decimal(5,2) NOT NULL DEFAULT '0.00',
  `bobot_kehadiran` decimal(5,2) NOT NULL DEFAULT '5.00',
  `nilai_angka` decimal(5,2) DEFAULT NULL,
  `nilai_huruf` char(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nilai_mutu` decimal(4,2) DEFAULT NULL,
  `sks` int NOT NULL,
  `mutu_x_sks` decimal(6,2) DEFAULT NULL,
  `status` enum('Draft','Published','Locked') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Draft',
  `published_at` timestamp NULL DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `is_remidi` tinyint(1) NOT NULL DEFAULT '0',
  `nilai_remidi` decimal(5,2) DEFAULT NULL,
  `is_susulan` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pendaftars`
--

CREATE TABLE `pendaftars` (
  `id` bigint UNSIGNED NOT NULL,
  `mahasiswa_id` int NOT NULL,
  `pendaftar_user_id` bigint UNSIGNED DEFAULT NULL,
  `jenjang_id` bigint UNSIGNED DEFAULT NULL,
  `jalur_id` int NOT NULL,
  `jenis_id` int NOT NULL,
  `gelombang_id` int NOT NULL,
  `prodi_1` int NOT NULL,
  `prodi_2` int NOT NULL,
  `prodi_3` int DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat_lengkap` text COLLATE utf8mb4_unicode_ci,
  `rt` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rw` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desa_kelurahan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kota_kabupaten` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provinsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_pos` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numb_reg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `register_date` date NOT NULL,
  `status` enum('Pending','Lulus','Gagal','Batal') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `bank_tujuan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_pengirim` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_pengirim` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah_transfer` decimal(12,2) DEFAULT NULL,
  `tanggal_transfer` date DEFAULT NULL,
  `bukti_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `catatan_transfer` text COLLATE utf8mb4_unicode_ci,
  `status_pembayaran` enum('pending','verified','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `tanggal_verifikasi_pembayaran` timestamp NULL DEFAULT NULL,
  `catatan_verifikasi` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pendaftars`
--

INSERT INTO `pendaftars` (`id`, `mahasiswa_id`, `pendaftar_user_id`, `jenjang_id`, `jalur_id`, `jenis_id`, `gelombang_id`, `prodi_1`, `prodi_2`, `prodi_3`, `phone`, `email`, `name`, `nik`, `jenis_kelamin`, `agama`, `tempat_lahir`, `tanggal_lahir`, `alamat_lengkap`, `rt`, `rw`, `desa_kelurahan`, `kecamatan`, `kota_kabupaten`, `provinsi`, `kode_pos`, `code`, `numb_reg`, `register_date`, `status`, `bank_tujuan`, `bank_pengirim`, `nama_pengirim`, `jumlah_transfer`, `tanggal_transfer`, `bukti_pembayaran`, `catatan_transfer`, `status_pembayaran`, `tanggal_verifikasi_pembayaran`, `catatan_verifikasi`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 1, NULL, NULL, 1, 1, 1, 1, 2, NULL, '081234567890', 'mahasiswa.a@example.com', 'Mahasiswa A', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'RGrYuCG5', 'REG-20250819-0001', '2025-08-19', 'Lulus', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', NULL, NULL, '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, 1, NULL, NULL),
(2, 2, NULL, NULL, 1, 2, 2, 2, 1, NULL, '081234567891', 'mahasiswa.b@example.com', 'Mahasiswa B', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Y4xPucw4', 'REG-20250819-0002', '2025-08-19', 'Lulus', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', NULL, NULL, '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, 1, NULL, NULL),
(3, 3, NULL, NULL, 2, 1, 1, 2, 1, NULL, '081234567892', 'mahasiswa.c@example.com', 'Mahasiswa C', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'F5UEUL0V', 'REG-20250819-0003', '2025-08-19', 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', NULL, NULL, '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, 1, NULL, NULL),
(4, 4, NULL, NULL, 2, 1, 2, 1, 2, NULL, '081234567893', 'mahasiswa.d@example.com', 'Mahasiswa D', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'HO8iUXuE', 'REG-20250819-0004', '2025-08-19', 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', NULL, NULL, '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pendaftar_users`
--

CREATE TABLE `pendaftar_users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Active','Inactive','Pending') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `verification_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token_expires_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pendaftar_users`
--

INSERT INTO `pendaftar_users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `status`, `verification_token`, `token_expires_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test Pendaftar', 'test@pendaftar.com', '2025-08-19 09:43:35', '$2y$12$rR4Pi.NFnOZry683l6GU1uxehDUGjNi2slMI3EFjx29ZMi1Pq19Wi', NULL, 'Pending', NULL, NULL, NULL, '2025-08-19 09:43:35', '2025-08-19 09:43:35'),
(2, 'Tohir Solehudin', 'tohirsolehudin47@gmail.com', NULL, '$2y$12$UJZ7I1eR/gWEuFqTeZQnNudto/GoN2djxoneqWlUMx8j4z7d7oblO', '082110975474', 'Active', NULL, NULL, NULL, '2025-08-19 09:46:22', '2025-08-19 09:46:22');

-- --------------------------------------------------------

--
-- Table structure for table `pengadaan_barangs`
--

CREATE TABLE `pengadaan_barangs` (
  `id` bigint UNSIGNED NOT NULL,
  `barang_id` int NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int NOT NULL,
  `harga_satuan` int NOT NULL,
  `total_harga` int NOT NULL,
  `sumber_dana` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_pengadaan` date NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `status` enum('Pending','Disetujui','Tidak Disetujui') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL,
  `accepted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengadaan_barangs`
--

INSERT INTO `pengadaan_barangs` (`id`, `barang_id`, `code`, `jumlah`, `harga_satuan`, `total_harga`, `sumber_dana`, `tanggal_pengadaan`, `tanggal_pembelian`, `status`, `desc`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`, `accepted_by`) VALUES
(1, 1, 'PGB-9MFyw5tH', 5, 15000000, 75000000, 'BOS', '2024-03-01', '2024-03-15', 'Disetujui', 'Pengadaan laptop baru', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL, NULL),
(2, 2, 'PGB-aHZwExHY', 3, 12000000, 36000000, 'BOS', '2024-03-05', '2024-03-20', 'Disetujui', 'Pengadaan proyektor baru', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengumumen`
--

CREATE TABLE `pengumumen` (
  `id` bigint UNSIGNED NOT NULL,
  `kategori_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Draft','Publish','Archive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Draft',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengumumen`
--

INSERT INTO `pengumumen` (`id`, `kategori_id`, `name`, `code`, `slug`, `photo`, `content`, `status`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 1, 'Jadwal UTS Semester Ganjil 2024/2025', 'PNG-FNBAVQPZ', 'jadwal-uts-semester-ganjil-20242025', 'pengumuman-uts-2024.jpg', '<p>Dengan hormat,</p>\n                             <p>Bersama ini kami sampaikan jadwal pelaksanaan Ujian Tengah Semester (UTS) untuk semester ganjil tahun akademik 2024/2025 yang akan dilaksanakan pada:</p>\n                             <ul>\n                             <li><strong>Tanggal:</strong> 15 - 26 Oktober 2024</li>\n                             <li><strong>Waktu:</strong> Sesuai jadwal masing-masing mata kuliah</li>\n                             <li><strong>Tempat:</strong> Ruang kuliah yang telah ditentukan</li>\n                             </ul>\n                             <p>Mohon kepada seluruh mahasiswa untuk mempersiapkan diri dengan baik dan hadir tepat waktu sesuai jadwal yang telah ditentukan.</p>\n                             <p>Demikian pengumuman ini kami sampaikan, atas perhatiannya kami ucapkan terima kasih.</p>', 'Publish', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, 1, NULL, NULL),
(2, 3, 'Pembukaan Beasiswa Prestasi Akademik 2024', 'PNG-1JPZDUHM', 'pembukaan-beasiswa-prestasi-akademik-2024', 'beasiswa-prestasi-2024.jpg', '<p>Yayasan Pendidikan Universitas Masa Depan membuka kesempatan bagi mahasiswa berprestasi untuk mendapatkan Beasiswa Prestasi Akademik 2024.</p>\n                             <h4>Persyaratan:</h4>\n                             <ul>\n                             <li>Mahasiswa aktif semester 2 ke atas</li>\n                             <li>IPK minimal 3.50</li>\n                             <li>Tidak sedang menerima beasiswa lain</li>\n                             <li>Aktif dalam kegiatan kemahasiswaan</li>\n                             </ul>\n                             <h4>Dokumen yang diperlukan:</h4>\n                             <ul>\n                             <li>Fotokopi KTM yang masih berlaku</li>\n                             <li>Transkrip nilai terbaru</li>\n                             <li>Surat keterangan penghasilan orang tua</li>\n                             <li>Sertifikat prestasi (jika ada)</li>\n                             </ul>\n                             <p><strong>Pendaftaran:</strong> 1 September - 30 September 2024</p>\n                             <p>Informasi lebih lanjut dapat menghubungi Bagian Kemahasiswaan.</p>', 'Publish', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, 1, NULL, NULL),
(3, 1, 'Registrasi Semester Genap 2024/2025', 'PNG-ZIBUNPZ5', 'registrasi-semester-genap-20242025', 'registrasi-genap-2025.jpg', '<p>Kepada Yth. Seluruh Mahasiswa Universitas Masa Depan,</p>\n                             <p>Dalam rangka registrasi semester genap tahun akademik 2024/2025, dengan ini disampaikan hal-hal sebagai berikut:</p>\n                             <h4>Jadwal Registrasi:</h4>\n                             <ul>\n                             <li><strong>Pembayaran SPP:</strong> 1 - 15 Januari 2025</li>\n                             <li><strong>Pengisian KRS:</strong> 10 - 20 Januari 2025</li>\n                             <li><strong>Perubahan KRS:</strong> 21 - 25 Januari 2025</li>\n                             </ul>\n                             <h4>Ketentuan:</h4>\n                             <ul>\n                             <li>Mahasiswa wajib melunasi SPP sebelum mengisi KRS</li>\n                             <li>Konsultasi dengan dosen pembimbing akademik sebelum mengisi KRS</li>\n                             <li>Maksimal SKS yang dapat diambil sesuai dengan ketentuan akademik</li>\n                             </ul>\n                             <p>Bagi mahasiswa yang tidak melakukan registrasi sesuai jadwal akan dikenakan sanksi akademik.</p>', 'Publish', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, 1, NULL, NULL),
(4, 4, 'Seminar Nasional \"Teknologi AI untuk Masa Depan\"', 'PNG-9DUH8TBH', 'seminar-nasional-teknologi-ai-untuk-masa-depan', 'seminar-ai-2024.jpg', '<p>Fakultas Teknologi Universitas Masa Depan mengundang seluruh civitas akademika untuk menghadiri:</p>\n                             <h3 style=\"text-align: center;\">SEMINAR NASIONAL<br>\"TEKNOLOGI AI UNTUK MASA DEPAN\"</h3>\n                             <h4>Detail Acara:</h4>\n                             <ul>\n                             <li><strong>Hari/Tanggal:</strong> Sabtu, 20 November 2024</li>\n                             <li><strong>Waktu:</strong> 08.00 - 16.00 WIB</li>\n                             <li><strong>Tempat:</strong> Auditorium Utama Kampus A</li>\n                             <li><strong>Tema:</strong> \"Artificial Intelligence: Transformasi Digital di Era Industry 4.0\"</li>\n                             </ul>\n                             <h4>Narasumber:</h4>\n                             <ul>\n                             <li>Prof. Dr. Ahmad Zaki, M.T. (Institut Teknologi Bandung)</li>\n                             <li>Dr. Sarah Wijaya, S.Kom., M.Cs. (Google Indonesia)</li>\n                             <li>Ir. Budi Santoso, M.T. (Microsoft Indonesia)</li>\n                             </ul>\n                             <p><strong>Pendaftaran:</strong> Gratis untuk mahasiswa, Rp 150.000 untuk umum</p>\n                             <p>Daftarkan diri Anda segera melalui website resmi universitas. Tersedia sertifikat untuk seluruh peserta.</p>', 'Publish', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, 1, NULL, NULL),
(5, 10, 'Wisuda Ke-25 Universitas Masa Depan', 'PNG-NQSFRVIE', 'wisuda-ke-25-universitas-masa-depan', 'wisuda-25-2025.jpg', '<p>Dengan bangga kami mengumumkan pelaksanaan Wisuda Ke-25 Universitas Masa Depan untuk periode wisuda I tahun 2025.</p>\n                             <h4>Informasi Wisuda:</h4>\n                             <ul>\n                             <li><strong>Hari/Tanggal:</strong> Sabtu, 15 Maret 2025</li>\n                             <li><strong>Waktu:</strong> 09.00 WIB</li>\n                             <li><strong>Tempat:</strong> Gedung Convention Center Kampus A</li>\n                             <li><strong>Dress Code:</strong> Jas Almamater + Toga</li>\n                             </ul>\n                             <h4>Jadwal Kegiatan:</h4>\n                             <ul>\n                             <li>07.30 - 08.30: Registrasi dan persiapan</li>\n                             <li>09.00 - 10.30: Upacara wisuda sesi I</li>\n                             <li>10.30 - 11.00: Coffee break</li>\n                             <li>11.00 - 12.30: Upacara wisuda sesi II</li>\n                             <li>12.30 - 13.30: Foto bersama dan penutupan</li>\n                             </ul>\n                             <p>Kepada para wisudawan dan wisudawati, mohon untuk mengikuti gladi bersih pada tanggal 14 Maret 2025 pukul 14.00 WIB.</p>\n                             <p>Selamat kepada seluruh wisudawan dan wisudawati atas pencapaian yang membanggakan ini!</p>', 'Publish', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, 1, NULL, NULL),
(6, 6, 'Kerjasama dengan Universitas Tokyo Jepang', 'PNG-3E00ZOE1', 'kerjasama-dengan-universitas-tokyo-jepang', 'kerjasama-tokyo-2024.jpg', '<p>Universitas Masa Depan dengan bangga mengumumkan penandatanganan Memorandum of Understanding (MoU) dengan University of Tokyo, Jepang.</p>\n                             <h4>Ruang Lingkup Kerjasama:</h4>\n                             <ul>\n                             <li>Program pertukaran mahasiswa dan dosen</li>\n                             <li>Penelitian bersama di bidang teknologi dan sains</li>\n                             <li>Program double degree untuk jenjang S2 dan S3</li>\n                             <li>Pelatihan dan workshop internasional</li>\n                             <li>Publikasi ilmiah bersama</li>\n                             </ul>\n                             <h4>Manfaat bagi Mahasiswa:</h4>\n                             <ul>\n                             <li>Kesempatan belajar di University of Tokyo selama 1-2 semester</li>\n                             <li>Beasiswa penuh untuk mahasiswa berprestasi</li>\n                             <li>Sertifikasi internasional</li>\n                             <li>Jaringan akademik global</li>\n                             </ul>\n                             <p>Program ini akan dimulai pada semester genap 2025 dengan kuota terbatas untuk setiap fakultas.</p>\n                             <p>Informasi selengkapnya akan diumumkan melalui website resmi dan kantor internasional affairs.</p>', 'Publish', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `periode_pendaftarans`
--

CREATE TABLE `periode_pendaftarans` (
  `id` bigint UNSIGNED NOT NULL,
  `taka_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` longtext COLLATE utf8mb4_unicode_ci,
  `start_date` date NOT NULL,
  `ended_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `periode_pendaftarans`
--

INSERT INTO `periode_pendaftarans` (`id`, `taka_id`, `name`, `code`, `desc`, `start_date`, `ended_date`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 1, 'Periode Pendaftaran 2024/2025 Ganjil', 'PP-20241', 'Periode pendaftaran untuk tahun akademik 2024/2025 semester ganjil', '2024-06-01', '2024-08-31', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL),
(2, 2, 'Periode Pendaftaran 2024/2025 Genap', 'PP-20242', 'Periode pendaftaran untuk tahun akademik 2024/2025 semester genap', '2024-12-01', '2025-02-28', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `program_studis`
--

CREATE TABLE `program_studis` (
  `id` bigint UNSIGNED NOT NULL,
  `fakultas_id` int NOT NULL,
  `jenjang_id` bigint UNSIGNED DEFAULT NULL,
  `kaprodi_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` longtext COLLATE utf8mb4_unicode_ci,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('Diploma','Sarjana','Magister','Doktoral') COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` enum('D3','D4','S1','S2','S3') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_start` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ended` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accreditation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` int DEFAULT NULL,
  `objectives` longtext COLLATE utf8mb4_unicode_ci,
  `careers` longtext COLLATE utf8mb4_unicode_ci,
  `status` enum('Aktif','Tidak Aktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `program_studis`
--

INSERT INTO `program_studis` (`id`, `fakultas_id`, `jenjang_id`, `kaprodi_id`, `name`, `code`, `desc`, `slug`, `level`, `title`, `title_start`, `title_ended`, `accreditation`, `duration`, `objectives`, `careers`, `status`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 1, 1, 3, 'Manajemen Informatika', 'MI', 'Program studi diploma tiga manajemen informatika', 'manajemen-informatika', 'Diploma', 'D3', '', 'A.Md.Kom.', 'B', 6, 'Menghasilkan lulusan yang kompeten dalam manajemen sistem informasi', 'IT Support, Network Administrator, Database Operator', 'Aktif', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL),
(2, 1, 2, 3, 'Teknologi Rekayasa Perangkat Lunak', 'TRPL', 'Program studi diploma empat teknologi rekayasa perangkat lunak', 'teknologi-rekayasa-perangkat-lunak', 'Diploma', 'D4', '', 'S.Tr.Kom.', 'A', 8, 'Menghasilkan lulusan yang kompeten dalam rekayasa perangkat lunak', 'Software Engineer, Mobile Developer, Web Developer', 'Aktif', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL),
(3, 1, 3, 3, 'Teknik Informatika', 'TI', 'Program studi yang fokus pada pengembangan software dan sistem informasi', 'teknik-informatika', 'Sarjana', 'S1', '', 'S.Kom.', 'A', 8, 'Menghasilkan lulusan yang kompeten dalam pengembangan software', 'Software Developer, System Analyst, Database Administrator', 'Aktif', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL),
(4, 1, 3, 4, 'Sistem Informasi', 'SI', 'Program studi yang fokus pada sistem informasi bisnis', 'sistem-informasi', 'Sarjana', 'S1', '', 'S.Kom.', 'A', 8, 'Menghasilkan lulusan yang kompeten dalam sistem informasi', 'Business Analyst, IT Consultant, Project Manager', 'Aktif', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL),
(5, 2, 3, 4, 'Manajemen', 'MNJ', 'Program studi yang fokus pada pengembangan ilmu manajemen', 'manajemen', 'Sarjana', 'S1', '', 'S.E.', 'A', 8, 'Menghasilkan lulusan yang kompeten dalam bidang manajemen', 'Business Manager, Marketing Manager, HR Manager', 'Aktif', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL),
(6, 2, 3, 4, 'Akuntansi', 'AKT', 'Program studi yang fokus pada ilmu akuntansi', 'akuntansi', 'Sarjana', 'S1', '', 'S.E.', 'B', 8, 'Menghasilkan lulusan yang kompeten dalam bidang akuntansi', 'Accountant, Auditor, Tax Consultant', 'Aktif', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL),
(7, 1, 4, 3, 'Magister Teknologi Informasi', 'MTI', 'Program studi magister teknologi informasi', 'magister-teknologi-informasi', 'Magister', 'S2', '', 'M.Kom.', 'A', 4, 'Menghasilkan lulusan magister yang kompeten dalam teknologi informasi', 'IT Manager, Research Analyst, Technology Consultant', 'Aktif', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL),
(8, 2, 4, 4, 'Magister Manajemen', 'MM', 'Program studi magister manajemen', 'magister-manajemen', 'Magister', 'S2', '', 'M.M.', 'A', 4, 'Menghasilkan lulusan magister yang kompeten dalam manajemen', 'CEO, Strategic Manager, Business Consultant', 'Aktif', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rencana_studis`
--

CREATE TABLE `rencana_studis` (
  `id` bigint UNSIGNED NOT NULL,
  `taka_regist` int NOT NULL,
  `taka_active` int NOT NULL,
  `semester` int NOT NULL,
  `invoice_id` int DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bsks` int NOT NULL,
  `start_date` date NOT NULL,
  `ended_date` date NOT NULL,
  `desc` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_pembayarans`
--

CREATE TABLE `riwayat_pembayarans` (
  `id` bigint UNSIGNED NOT NULL,
  `tagihan_kuliah_id` bigint UNSIGNED NOT NULL,
  `mahasiswa_id` bigint UNSIGNED NOT NULL,
  `kode_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_bayar` bigint UNSIGNED NOT NULL,
  `tgl_pembayaran` date NOT NULL,
  `metode_pembayaran` enum('Transfer Bank','Virtual Account','E-Wallet','Lainnya') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pembayaran` enum('Pending','Sukses','Gagal','Dibatalkan') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `referensi_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_pengirim` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_pengirim` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bukti_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_rencana_studis`
--

CREATE TABLE `riwayat_rencana_studis` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ruangs`
--

CREATE TABLE `ruangs` (
  `id` bigint UNSIGNED NOT NULL,
  `gedung_id` int NOT NULL,
  `floor` int NOT NULL,
  `capacity` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('Ruang Publik','Ruang Kelas','Ruang Pelayanan','Ruang Khusus','Gudang') COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ruangs`
--

INSERT INTO `ruangs` (`id`, `gedung_id`, `floor`, `capacity`, `name`, `code`, `photo`, `type`, `desc`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 1, 1, 50, 'Ruang Kelas 101', 'RK101', 'ruang-101.jpg', 'Ruang Kelas', 'Ruang kelas untuk 50 orang', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL),
(2, 1, 2, 30, 'Ruang Lab Komputer', 'RLK201', 'lab-komputer.jpg', 'Ruang Khusus', 'Laboratorium komputer dengan 30 PC', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL),
(3, 2, 1, 20, 'Ruang Meeting', 'RM101', 'ruang-meeting.jpg', 'Ruang Publik', 'Ruang meeting untuk 20 orang', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `saldos`
--

CREATE TABLE `saldos` (
  `id` bigint UNSIGNED NOT NULL,
  `tagihan_id` int DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('Pemasukan','Pengeluaran') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Pending','Sukses','Gagal') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `amount` bigint UNSIGNED NOT NULL,
  `transaction_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `syarat_pendaftarans`
--

CREATE TABLE `syarat_pendaftarans` (
  `id` bigint UNSIGNED NOT NULL,
  `jalur_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `syarat_pendaftarans`
--

INSERT INTO `syarat_pendaftarans` (`id`, `jalur_id`, `name`, `code`, `desc`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 1, 'Ijazah SMA/SMK', 'SPR-20241-1', 'Fotokopi ijazah SMA/SMK yang telah dilegalisir', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL),
(2, 1, 'SKHUN', 'SPR-20241-2', 'Fotokopi SKHUN yang telah dilegalisir', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL),
(3, 2, 'Sertifikat Prestasi', 'SPB-20241-1', 'Sertifikat prestasi akademik/non-akademik tingkat nasional', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tagihan_kuliahs`
--

CREATE TABLE `tagihan_kuliahs` (
  `id` bigint UNSIGNED NOT NULL,
  `taka_id` int NOT NULL,
  `biaya_id` int DEFAULT NULL,
  `biaya_pmb` int DEFAULT NULL,
  `mahasiswa_id` int NOT NULL,
  `group_id` int DEFAULT NULL,
  `amount` bigint UNSIGNED NOT NULL,
  `due_date` date NOT NULL,
  `status` enum('Pending','Sukses','Gagal') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `desc` text COLLATE utf8mb4_unicode_ci,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tagihan_kuliah_groups`
--

CREATE TABLE `tagihan_kuliah_groups` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `taka_id` int NOT NULL,
  `amount` bigint UNSIGNED NOT NULL,
  `due_date` date NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `prodi_id` int DEFAULT NULL,
  `kelas_id` int DEFAULT NULL,
  `gelombang_id` int DEFAULT NULL,
  `jalur_id` int DEFAULT NULL,
  `semester` int DEFAULT NULL,
  `status` enum('Draft','Published','Archived') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Draft',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tahun_akademiks`
--

CREATE TABLE `tahun_akademiks` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('Ganjil','Genap') COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `ended_date` date NOT NULL,
  `desc` longtext COLLATE utf8mb4_unicode_ci,
  `status` enum('Aktif','Tidak Aktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Tidak Aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tahun_akademiks`
--

INSERT INTO `tahun_akademiks` (`id`, `name`, `type`, `code`, `start_date`, `ended_date`, `desc`, `status`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 'Tahun Akademik 2024/2025 Ganjil', 'Ganjil', '20241', '2024-09-01', '2025-02-28', 'Semester Ganjil Tahun Akademik 2024/2025', 'Aktif', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL),
(2, 'Tahun Akademik 2024/2025 Genap', 'Genap', '20242', '2025-03-01', '2025-08-31', 'Semester Genap Tahun Akademik 2024/2025', 'Tidak Aktif', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `type` tinyint NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_ig` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_fb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_in` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio_blood` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio_height` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio_weight` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio_gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio_religion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio_placebirth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio_nationality` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio_datebirth` date DEFAULT NULL,
  `numb_kk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numb_ktp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numb_npsn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numb_nitk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numb_staff` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fst_setup` tinyint(1) NOT NULL DEFAULT '0',
  `tfa_setup` tinyint(1) NOT NULL DEFAULT '0',
  `ktp_addres` text COLLATE utf8mb4_unicode_ci,
  `ktp_rt` text COLLATE utf8mb4_unicode_ci,
  `ktp_rw` text COLLATE utf8mb4_unicode_ci,
  `ktp_village` text COLLATE utf8mb4_unicode_ci,
  `ktp_subdistrict` text COLLATE utf8mb4_unicode_ci,
  `ktp_poscode` text COLLATE utf8mb4_unicode_ci,
  `ktp_city` text COLLATE utf8mb4_unicode_ci,
  `ktp_province` text COLLATE utf8mb4_unicode_ci,
  `domicile_same` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `domicile_addres` text COLLATE utf8mb4_unicode_ci,
  `domicile_rt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domicile_rw` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domicile_village` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domicile_subdistrict` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domicile_poscode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domicile_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domicile_province` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_refresh_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_front` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_behind` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edu1_type` enum('SMA/SMK','Diploma','Sarjana','Magister','Doktor') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'SMA/SMK',
  `edu1_place` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edu1_major` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edu1_average_score` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edu1_graduate_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edu2_type` enum('SMA/SMK','Diploma','Sarjana','Magister','Doktor') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edu2_place` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edu2_major` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edu2_average_score` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edu2_graduate_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edu3_type` enum('SMA/SMK','Diploma','Sarjana','Magister','Doktor') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edu3_place` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edu3_major` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edu3_average_score` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edu3_graduate_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type`, `name`, `photo`, `username`, `phone`, `email`, `link_ig`, `link_fb`, `link_in`, `bio_blood`, `bio_height`, `bio_weight`, `bio_gender`, `bio_religion`, `bio_placebirth`, `bio_nationality`, `bio_datebirth`, `numb_kk`, `numb_ktp`, `numb_npsn`, `numb_nitk`, `numb_staff`, `code`, `password`, `fst_setup`, `tfa_setup`, `ktp_addres`, `ktp_rt`, `ktp_rw`, `ktp_village`, `ktp_subdistrict`, `ktp_poscode`, `ktp_city`, `ktp_province`, `domicile_same`, `domicile_addres`, `domicile_rt`, `domicile_rw`, `domicile_village`, `domicile_subdistrict`, `domicile_poscode`, `domicile_city`, `domicile_province`, `google_id`, `google_token`, `google_refresh_token`, `title_front`, `title_behind`, `edu1_type`, `edu1_place`, `edu1_major`, `edu1_average_score`, `edu1_graduate_year`, `edu2_type`, `edu2_place`, `edu2_major`, `edu2_average_score`, `edu2_graduate_year`, `edu3_type`, `edu3_place`, `edu3_major`, `edu3_average_score`, `edu3_graduate_year`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 0, 'Administrator', 'default.jpg', 'admin', '080012345660', 'mjaya69703@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'r9iisz', '$2y$12$jfpnB77piQkXTQeC19hMS.voMkO928zYwgh0ZHDkJX6HXF38IKicW', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SMA/SMK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-19 09:43:15', '2025-08-19 09:43:15', NULL, NULL, NULL, NULL),
(2, 1, 'Staff Finance', 'default.jpg', 'finance', '080012345661', 'finance@example.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fXJP4O', '$2y$12$Nbs2Kcu4MIKheBZEiGq1hufzd4z2WqQUR8u/PBUjX/t7MGRv1CW82', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SMA/SMK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-19 09:43:15', '2025-08-19 09:43:15', NULL, NULL, NULL, NULL),
(3, 2, 'Staff Officer', 'default.jpg', 'officer', '080012345662', 'officer@example.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8GxWgJ', '$2y$12$d6xO3neA6fxtEa1Nl6I0fefEyXA6wF1/g5UJb0aaftCjczEftDFT6', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SMA/SMK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-19 09:43:15', '2025-08-19 09:43:15', NULL, NULL, NULL, NULL),
(4, 3, 'Staff Akademik', 'default.jpg', 'academic', '080012345663', 'academic@example.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cqLTNe', '$2y$12$kxwtJL34RqTzS5FkLzLG.u/Elt8ZBytC2QP751lPBBdbe7e64BkX.', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SMA/SMK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-19 09:43:16', '2025-08-19 09:43:16', NULL, NULL, NULL, NULL),
(5, 4, 'Staff Admin', 'default.jpg', 'admin2', '080012345664', 'admin@example.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '24O8lj', '$2y$12$EBiXn15BROlMDf1X3vekIOrSfM9Hxf5kMkoEhPdJGJWMRJvQlp7Yy', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SMA/SMK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-19 09:43:16', '2025-08-19 09:43:16', NULL, NULL, NULL, NULL),
(6, 5, 'Staff Support', 'default.jpg', 'support', '080012345665', 'support@example.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ueM6Jv', '$2y$12$ReNWiZn73s5BML9dQXmHo.D0l4tpY8ONWhKVEtYGbooDP78HkQrqa', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SMA/SMK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-19 09:43:16', '2025-08-19 09:43:16', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `waktu_kuliahs`
--

CREATE TABLE `waktu_kuliahs` (
  `id` bigint UNSIGNED NOT NULL,
  `jenis_kelas_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_start` time NOT NULL,
  `time_ended` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `waktu_kuliahs`
--

INSERT INTO `waktu_kuliahs` (`id`, `jenis_kelas_id`, `name`, `code`, `time_start`, `time_ended`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 1, 'Jam Kuliah ke 1', 'JK-01', '08:00:00', '08:50:00', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL),
(2, 1, 'Jam Kuliah ke 2', 'JK-02', '09:00:00', '09:50:00', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL),
(3, 1, 'Jam Kuliah ke 3', 'JK-03', '10:00:00', '10:50:00', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL),
(4, 1, 'Jam Kuliah ke 4', 'JK-04', '11:00:00', '11:50:00', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL),
(5, 1, 'Jam Kuliah ke 5', 'JK-05', '13:00:00', '13:50:00', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL),
(6, 1, 'Jam Kuliah ke 6', 'JK-06', '14:00:00', '14:50:00', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL),
(7, 1, 'Jam Kuliah ke 7', 'JK-07', '15:00:00', '15:50:00', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL),
(8, 1, 'Jam Kuliah ke 8', 'JK-08', '16:00:00', '16:50:00', '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `web_settings`
--

CREATE TABLE `web_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `taka_now` int DEFAULT NULL,
  `school_apps` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_head` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_logo_vert` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'logo-vert.png',
  `school_logo_hori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'logo-hori.png',
  `school_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_fb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_ig` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_in` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_tw` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maintenance_mode` tinyint(1) NOT NULL DEFAULT '0',
  `enable_captcha` tinyint(1) NOT NULL DEFAULT '0',
  `max_login_attempts` int NOT NULL DEFAULT '5',
  `login_decay_seconds` int NOT NULL DEFAULT '60',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `web_settings`
--

INSERT INTO `web_settings` (`id`, `taka_now`, `school_apps`, `school_name`, `school_head`, `school_link`, `school_desc`, `school_logo_vert`, `school_logo_hori`, `school_email`, `school_phone`, `school_address`, `school_longitude`, `school_latitude`, `social_fb`, `social_ig`, `social_in`, `social_tw`, `maintenance_mode`, `enable_captcha`, `max_login_attempts`, `login_decay_seconds`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, NULL, 'Neco Siakad v2.0-beta 1', 'IDev Fun', 'Dr. Mulawarman Frietz, M.Kom', 'https://mjaya69703.idev-fun.org', 'Membentuk Pemimpin Digital untuk Era Transformasi Global', 'logo-vert.png', 'logo-hori.png', 'mjaya69703@gmail.com', '+6281234567895', 'Jl. Raya Kedungjaya No. 1, Kedungjaya, Kec. Kedungjaya, Kabupaten Kedungjaya, Jawa Tengah 56271', '-7.266670', '110.416670', 'https://facebook.com/kyouma052', 'https://instagram.com/mjaya69703', 'https://id.linkedin.com/in/mjaya69703', 'https://x.com/mjaya69703', 0, 0, 5, 60, '2025-08-19 09:43:18', '2025-08-19 09:43:18', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensis`
--
ALTER TABLE `absensis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `absensis_code_unique` (`code`);

--
-- Indexes for table `activity_log_changes`
--
ALTER TABLE `activity_log_changes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_log_changes_activity_log_id_foreign` (`activity_log_id`);

--
-- Indexes for table `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `barangs_code_unique` (`code`);

--
-- Indexes for table `beritas`
--
ALTER TABLE `beritas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `beritas_code_unique` (`code`),
  ADD UNIQUE KEY `beritas_slug_unique` (`slug`);

--
-- Indexes for table `biaya_pendaftarans`
--
ALTER TABLE `biaya_pendaftarans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `biaya_pendaftarans_code_unique` (`code`);

--
-- Indexes for table `dokumen_p_m_b_s`
--
ALTER TABLE `dokumen_p_m_b_s`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dokumen_p_m_b_s_path_unique` (`path`),
  ADD UNIQUE KEY `dokumen_p_m_b_s_code_unique` (`code`);

--
-- Indexes for table `dosens`
--
ALTER TABLE `dosens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dosens_phone_unique` (`phone`),
  ADD UNIQUE KEY `dosens_email_unique` (`email`),
  ADD UNIQUE KEY `dosens_code_unique` (`code`),
  ADD UNIQUE KEY `dosens_username_unique` (`username`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fakultas_code_unique` (`code`),
  ADD UNIQUE KEY `fakultas_slug_unique` (`slug`);

--
-- Indexes for table `galeris`
--
ALTER TABLE `galeris`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `galeris_code_unique` (`code`),
  ADD UNIQUE KEY `galeris_slug_unique` (`slug`);

--
-- Indexes for table `galeris_foto`
--
ALTER TABLE `galeris_foto`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `galeris_foto_code_unique` (`code`);

--
-- Indexes for table `gedungs`
--
ALTER TABLE `gedungs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gedungs_code_unique` (`code`);

--
-- Indexes for table `gelombang_pendaftarans`
--
ALTER TABLE `gelombang_pendaftarans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gelombang_pendaftarans_code_unique` (`code`);

--
-- Indexes for table `inventaris_barangs`
--
ALTER TABLE `inventaris_barangs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `inventaris_barangs_code_unique` (`code`);

--
-- Indexes for table `jadwal_kelas`
--
ALTER TABLE `jadwal_kelas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jadwal_kelas_jadwal_id_kelas_id_unique` (`jadwal_id`,`kelas_id`),
  ADD KEY `jadwal_kelas_kelas_id_foreign` (`kelas_id`);

--
-- Indexes for table `jadwal_kuliahs`
--
ALTER TABLE `jadwal_kuliahs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jadwal_kuliahs_code_unique` (`code`);

--
-- Indexes for table `jadwal_p_m_b_s`
--
ALTER TABLE `jadwal_p_m_b_s`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jadwal_p_m_b_s_code_unique` (`code`);

--
-- Indexes for table `jalur_pendaftarans`
--
ALTER TABLE `jalur_pendaftarans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jalur_pendaftarans_code_unique` (`code`);

--
-- Indexes for table `jenis_kelas`
--
ALTER TABLE `jenis_kelas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jenis_kelas_code_unique` (`code`);

--
-- Indexes for table `jenjang_pendidikans`
--
ALTER TABLE `jenjang_pendidikans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `kalender_akademiks`
--
ALTER TABLE `kalender_akademiks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kalender_akademiks_code_unique` (`code`);

--
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kategoris_code_unique` (`code`),
  ADD UNIQUE KEY `kategoris_slug_unique` (`slug`);

--
-- Indexes for table `kategori_barangs`
--
ALTER TABLE `kategori_barangs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kategori_barangs_code_unique` (`code`),
  ADD UNIQUE KEY `kategori_barangs_slug_unique` (`slug`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kelas_code_unique` (`code`);

--
-- Indexes for table `krs_details`
--
ALTER TABLE `krs_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `krs_details_krs_id_matkul_id_unique` (`krs_id`,`matkul_id`),
  ADD UNIQUE KEY `krs_details_code_unique` (`code`),
  ADD KEY `krs_details_matkul_id_foreign` (`matkul_id`),
  ADD KEY `krs_details_kelas_id_foreign` (`kelas_id`),
  ADD KEY `krs_details_dosen_id_foreign` (`dosen_id`);

--
-- Indexes for table `kurikulums`
--
ALTER TABLE `kurikulums`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kurikulums_code_unique` (`code`);

--
-- Indexes for table `k_h_s`
--
ALTER TABLE `k_h_s`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `k_h_s_mahasiswa_id_taka_id_semester_unique` (`mahasiswa_id`,`taka_id`,`semester`),
  ADD UNIQUE KEY `k_h_s_code_unique` (`code`),
  ADD KEY `k_h_s_mahasiswa_id_semester_index` (`mahasiswa_id`,`semester`),
  ADD KEY `k_h_s_taka_id_semester_index` (`taka_id`,`semester`),
  ADD KEY `k_h_s_ipk_index` (`ipk`);

--
-- Indexes for table `k_r_s`
--
ALTER TABLE `k_r_s`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `k_r_s_code_unique` (`code`),
  ADD KEY `k_r_s_taka_id_foreign` (`taka_id`),
  ADD KEY `k_r_s_dosen_pa_id_foreign` (`dosen_pa_id`),
  ADD KEY `k_r_s_mahasiswa_id_taka_id_semester_index` (`mahasiswa_id`,`taka_id`,`semester`);

--
-- Indexes for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `log_aktivitas_user_type_action_index` (`user_type`,`action`),
  ADD KEY `log_aktivitas_model_type_model_id_index` (`model_type`,`model_id`),
  ADD KEY `log_aktivitas_created_at_index` (`created_at`);

--
-- Indexes for table `mahasiswas`
--
ALTER TABLE `mahasiswas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mahasiswas_phone_unique` (`phone`),
  ADD UNIQUE KEY `mahasiswas_email_unique` (`email`),
  ADD UNIQUE KEY `mahasiswas_code_unique` (`code`),
  ADD UNIQUE KEY `mahasiswas_username_unique` (`username`),
  ADD UNIQUE KEY `mahasiswas_numb_kk_unique` (`numb_kk`),
  ADD UNIQUE KEY `mahasiswas_numb_ktp_unique` (`numb_ktp`),
  ADD UNIQUE KEY `mahasiswas_numb_nim_unique` (`numb_nim`),
  ADD UNIQUE KEY `mahasiswas_numb_reg_unique` (`numb_reg`),
  ADD UNIQUE KEY `mahasiswas_numb_nisn_unique` (`numb_nisn`);

--
-- Indexes for table `mata_kuliahs`
--
ALTER TABLE `mata_kuliahs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mata_kuliahs_code_unique` (`code`);

--
-- Indexes for table `matkul_rencana_studis`
--
ALTER TABLE `matkul_rencana_studis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mutasi_barangs`
--
ALTER TABLE `mutasi_barangs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mutasi_barangs_code_unique` (`code`);

--
-- Indexes for table `nilais`
--
ALTER TABLE `nilais`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nilais_mahasiswa_id_matkul_id_taka_id_semester_unique` (`mahasiswa_id`,`matkul_id`,`taka_id`,`semester`),
  ADD UNIQUE KEY `nilais_code_unique` (`code`),
  ADD KEY `nilais_krs_detail_id_foreign` (`krs_detail_id`),
  ADD KEY `nilais_taka_id_foreign` (`taka_id`),
  ADD KEY `nilais_mahasiswa_id_taka_id_semester_index` (`mahasiswa_id`,`taka_id`,`semester`),
  ADD KEY `nilais_matkul_id_taka_id_index` (`matkul_id`,`taka_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pendaftars`
--
ALTER TABLE `pendaftars`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pendaftars_phone_unique` (`phone`),
  ADD UNIQUE KEY `pendaftars_email_unique` (`email`),
  ADD UNIQUE KEY `pendaftars_code_unique` (`code`),
  ADD UNIQUE KEY `pendaftars_numb_reg_unique` (`numb_reg`),
  ADD KEY `pendaftars_jenjang_id_foreign` (`jenjang_id`),
  ADD KEY `pendaftars_pendaftar_user_id_foreign` (`pendaftar_user_id`);

--
-- Indexes for table `pendaftar_users`
--
ALTER TABLE `pendaftar_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pendaftar_users_email_unique` (`email`);

--
-- Indexes for table `pengadaan_barangs`
--
ALTER TABLE `pengadaan_barangs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pengadaan_barangs_code_unique` (`code`);

--
-- Indexes for table `pengumumen`
--
ALTER TABLE `pengumumen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pengumumen_code_unique` (`code`),
  ADD UNIQUE KEY `pengumumen_slug_unique` (`slug`);

--
-- Indexes for table `periode_pendaftarans`
--
ALTER TABLE `periode_pendaftarans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `periode_pendaftarans_code_unique` (`code`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `program_studis`
--
ALTER TABLE `program_studis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `program_studis_code_unique` (`code`),
  ADD UNIQUE KEY `program_studis_slug_unique` (`slug`),
  ADD KEY `program_studis_jenjang_id_foreign` (`jenjang_id`);

--
-- Indexes for table `rencana_studis`
--
ALTER TABLE `rencana_studis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rencana_studis_code_unique` (`code`);

--
-- Indexes for table `riwayat_pembayarans`
--
ALTER TABLE `riwayat_pembayarans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `riwayat_pembayarans_kode_pembayaran_unique` (`kode_pembayaran`),
  ADD KEY `riwayat_pembayarans_tagihan_kuliah_id_foreign` (`tagihan_kuliah_id`),
  ADD KEY `riwayat_pembayarans_mahasiswa_id_foreign` (`mahasiswa_id`),
  ADD KEY `riwayat_pembayarans_kode_pembayaran_index` (`kode_pembayaran`),
  ADD KEY `riwayat_pembayarans_tgl_pembayaran_index` (`tgl_pembayaran`),
  ADD KEY `riwayat_pembayarans_status_pembayaran_index` (`status_pembayaran`);

--
-- Indexes for table `riwayat_rencana_studis`
--
ALTER TABLE `riwayat_rencana_studis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ruangs`
--
ALTER TABLE `ruangs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ruangs_code_unique` (`code`);

--
-- Indexes for table `saldos`
--
ALTER TABLE `saldos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `saldos_code_unique` (`code`),
  ADD UNIQUE KEY `saldos_transaction_code_unique` (`transaction_code`);

--
-- Indexes for table `syarat_pendaftarans`
--
ALTER TABLE `syarat_pendaftarans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `syarat_pendaftarans_code_unique` (`code`);

--
-- Indexes for table `tagihan_kuliahs`
--
ALTER TABLE `tagihan_kuliahs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tagihan_kuliahs_code_unique` (`code`);

--
-- Indexes for table `tagihan_kuliah_groups`
--
ALTER TABLE `tagihan_kuliah_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tagihan_kuliah_groups_code_unique` (`code`),
  ADD UNIQUE KEY `tagihan_kuliah_groups_slug_unique` (`slug`);

--
-- Indexes for table `tahun_akademiks`
--
ALTER TABLE `tahun_akademiks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tahun_akademiks_code_unique` (`code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_code_unique` (`code`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `waktu_kuliahs`
--
ALTER TABLE `waktu_kuliahs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `waktu_kuliahs_code_unique` (`code`);

--
-- Indexes for table `web_settings`
--
ALTER TABLE `web_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensis`
--
ALTER TABLE `absensis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `activity_log_changes`
--
ALTER TABLE `activity_log_changes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `beritas`
--
ALTER TABLE `beritas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `biaya_pendaftarans`
--
ALTER TABLE `biaya_pendaftarans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dokumen_p_m_b_s`
--
ALTER TABLE `dokumen_p_m_b_s`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dosens`
--
ALTER TABLE `dosens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `galeris`
--
ALTER TABLE `galeris`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galeris_foto`
--
ALTER TABLE `galeris_foto`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gedungs`
--
ALTER TABLE `gedungs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gelombang_pendaftarans`
--
ALTER TABLE `gelombang_pendaftarans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `inventaris_barangs`
--
ALTER TABLE `inventaris_barangs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jadwal_kelas`
--
ALTER TABLE `jadwal_kelas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jadwal_kuliahs`
--
ALTER TABLE `jadwal_kuliahs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jadwal_p_m_b_s`
--
ALTER TABLE `jadwal_p_m_b_s`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jalur_pendaftarans`
--
ALTER TABLE `jalur_pendaftarans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jenis_kelas`
--
ALTER TABLE `jenis_kelas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jenjang_pendidikans`
--
ALTER TABLE `jenjang_pendidikans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kalender_akademiks`
--
ALTER TABLE `kalender_akademiks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kategori_barangs`
--
ALTER TABLE `kategori_barangs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `krs_details`
--
ALTER TABLE `krs_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kurikulums`
--
ALTER TABLE `kurikulums`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `k_h_s`
--
ALTER TABLE `k_h_s`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `k_r_s`
--
ALTER TABLE `k_r_s`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mahasiswas`
--
ALTER TABLE `mahasiswas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mata_kuliahs`
--
ALTER TABLE `mata_kuliahs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `matkul_rencana_studis`
--
ALTER TABLE `matkul_rencana_studis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `mutasi_barangs`
--
ALTER TABLE `mutasi_barangs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nilais`
--
ALTER TABLE `nilais`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pendaftars`
--
ALTER TABLE `pendaftars`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pendaftar_users`
--
ALTER TABLE `pendaftar_users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengadaan_barangs`
--
ALTER TABLE `pengadaan_barangs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengumumen`
--
ALTER TABLE `pengumumen`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `periode_pendaftarans`
--
ALTER TABLE `periode_pendaftarans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `program_studis`
--
ALTER TABLE `program_studis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rencana_studis`
--
ALTER TABLE `rencana_studis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `riwayat_pembayarans`
--
ALTER TABLE `riwayat_pembayarans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `riwayat_rencana_studis`
--
ALTER TABLE `riwayat_rencana_studis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ruangs`
--
ALTER TABLE `ruangs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `saldos`
--
ALTER TABLE `saldos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `syarat_pendaftarans`
--
ALTER TABLE `syarat_pendaftarans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tagihan_kuliahs`
--
ALTER TABLE `tagihan_kuliahs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tagihan_kuliah_groups`
--
ALTER TABLE `tagihan_kuliah_groups`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tahun_akademiks`
--
ALTER TABLE `tahun_akademiks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `waktu_kuliahs`
--
ALTER TABLE `waktu_kuliahs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `web_settings`
--
ALTER TABLE `web_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_log_changes`
--
ALTER TABLE `activity_log_changes`
  ADD CONSTRAINT `activity_log_changes_activity_log_id_foreign` FOREIGN KEY (`activity_log_id`) REFERENCES `log_aktivitas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `jadwal_kelas`
--
ALTER TABLE `jadwal_kelas`
  ADD CONSTRAINT `jadwal_kelas_jadwal_id_foreign` FOREIGN KEY (`jadwal_id`) REFERENCES `jadwal_kuliahs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jadwal_kelas_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `krs_details`
--
ALTER TABLE `krs_details`
  ADD CONSTRAINT `krs_details_dosen_id_foreign` FOREIGN KEY (`dosen_id`) REFERENCES `dosens` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `krs_details_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `krs_details_krs_id_foreign` FOREIGN KEY (`krs_id`) REFERENCES `k_r_s` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `krs_details_matkul_id_foreign` FOREIGN KEY (`matkul_id`) REFERENCES `mata_kuliahs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `k_h_s`
--
ALTER TABLE `k_h_s`
  ADD CONSTRAINT `k_h_s_mahasiswa_id_foreign` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `k_h_s_taka_id_foreign` FOREIGN KEY (`taka_id`) REFERENCES `tahun_akademiks` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `k_r_s`
--
ALTER TABLE `k_r_s`
  ADD CONSTRAINT `k_r_s_dosen_pa_id_foreign` FOREIGN KEY (`dosen_pa_id`) REFERENCES `dosens` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `k_r_s_mahasiswa_id_foreign` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `k_r_s_taka_id_foreign` FOREIGN KEY (`taka_id`) REFERENCES `tahun_akademiks` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nilais`
--
ALTER TABLE `nilais`
  ADD CONSTRAINT `nilais_krs_detail_id_foreign` FOREIGN KEY (`krs_detail_id`) REFERENCES `krs_details` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `nilais_mahasiswa_id_foreign` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nilais_matkul_id_foreign` FOREIGN KEY (`matkul_id`) REFERENCES `mata_kuliahs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nilais_taka_id_foreign` FOREIGN KEY (`taka_id`) REFERENCES `tahun_akademiks` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pendaftars`
--
ALTER TABLE `pendaftars`
  ADD CONSTRAINT `pendaftars_jenjang_id_foreign` FOREIGN KEY (`jenjang_id`) REFERENCES `jenjang_pendidikans` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `pendaftars_pendaftar_user_id_foreign` FOREIGN KEY (`pendaftar_user_id`) REFERENCES `pendaftar_users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `program_studis`
--
ALTER TABLE `program_studis`
  ADD CONSTRAINT `program_studis_jenjang_id_foreign` FOREIGN KEY (`jenjang_id`) REFERENCES `jenjang_pendidikans` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `riwayat_pembayarans`
--
ALTER TABLE `riwayat_pembayarans`
  ADD CONSTRAINT `riwayat_pembayarans_mahasiswa_id_foreign` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswas` (`id`),
  ADD CONSTRAINT `riwayat_pembayarans_tagihan_kuliah_id_foreign` FOREIGN KEY (`tagihan_kuliah_id`) REFERENCES `tagihan_kuliahs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
