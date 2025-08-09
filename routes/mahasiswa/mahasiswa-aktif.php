<?php

use Illuminate\Support\Facades\Route;

// HAK AKSES MAHASISWA
Route::group(['prefix' => 'mahasiswa', 'middleware' => ['checkUser:Mahasiswa Aktif'], 'as' => 'mahasiswa.'], function() {
    // Authentication
    Route::get('/logout', [App\Http\Controllers\AuthController::class, 'handleLogout'])->name('handle-logout');
    
    // Dashboard
    Route::get('/home', [App\Http\Controllers\Private\Mahasiswa\RootController::class, 'renderDashboard'])->name('dashboard-render');
    
    // Profile Section
    Route::get('/profile', [App\Http\Controllers\Private\Mahasiswa\RootController::class, 'renderProfile'])->name('profile-render');
    Route::patch('/profile', [App\Http\Controllers\Private\Mahasiswa\RootController::class, 'handleProfile'])->name('profile-handle');
    
    // Akademik Routes
    Route::prefix('akademik')->name('akademik.')->group(function () {
        // KRS (Kartu Rencana Studi)
        Route::get('/krs', [App\Http\Controllers\Private\Mahasiswa\AkademikController::class, 'krsRender'])->name('krs-render');
        Route::get('/krs/cetak', [App\Http\Controllers\Private\Mahasiswa\AkademikController::class, 'cetakKrs'])->name('krs-cetak');
        
        // Jadwal Kuliah
        Route::get('/jadwal', [App\Http\Controllers\Private\Mahasiswa\AkademikController::class, 'jadwalKuliah'])->name('jadwal');
        Route::get('/jadwal/{semester}', [App\Http\Controllers\Private\Mahasiswa\AkademikController::class, 'jadwalBySemester'])->name('jadwal.semester');
        
        // Presensi
        Route::get('/presensi', [App\Http\Controllers\Private\Mahasiswa\AkademikController::class, 'presensi'])->name('presensi');
        Route::get('/presensi/{kode_mk}', [App\Http\Controllers\Private\Mahasiswa\AkademikController::class, 'detailPresensi'])->name('presensi.detail');
        
        // Nilai & IPK
        Route::get('/nilai', [App\Http\Controllers\Private\Mahasiswa\AkademikController::class, 'nilai'])->name('nilai');
        Route::get('/nilai/{semester}', [App\Http\Controllers\Private\Mahasiswa\AkademikController::class, 'nilaiBySemester'])->name('nilai.semester');
    });
    
    // Keuangan Routes
    Route::prefix('keuangan')->name('keuangan.')->group(function () {
        // Tagihan Kuliah
        Route::get('/tagihan', [App\Http\Controllers\Private\Mahasiswa\KeuanganController::class, 'tagihan'])->name('tagihan');
        Route::get('/tagihan/{id}/detail', [App\Http\Controllers\Private\Mahasiswa\KeuanganController::class, 'detailTagihan'])->name('tagihan.detail');
        
        // Riwayat Pembayaran
        Route::get('/riwayat', [App\Http\Controllers\Private\Mahasiswa\KeuanganController::class, 'riwayatPembayaran'])->name('riwayat');
        
        // Virtual Account
        Route::get('/virtual-account', [App\Http\Controllers\Private\Mahasiswa\KeuanganController::class, 'virtualAccount'])->name('virtual-account');
        
        // Bukti Pembayaran
        Route::get('/bukti-pembayaran', [App\Http\Controllers\Private\Mahasiswa\KeuanganController::class, 'buktiPembayaran'])->name('bukti-pembayaran');
        Route::post('/upload-bukti', [App\Http\Controllers\Private\Mahasiswa\KeuanganController::class, 'uploadBuktiPembayaran'])->name('upload-bukti');
    });
    
    // Layanan Routes
    Route::prefix('layanan')->name('layanan.')->group(function () {
        // Transkrip Nilai
        Route::get('/transkrip', [App\Http\Controllers\Private\Mahasiswa\LayananController::class, 'transkripNilai'])->name('transkrip');
        Route::get('/transkrip/cetak', [App\Http\Controllers\Private\Mahasiswa\LayananController::class, 'cetakTranskrip'])->name('transkrip.cetak');
        
        // Surat Keterangan
        Route::get('/surat-keterangan', [App\Http\Controllers\Private\Mahasiswa\LayananController::class, 'suratKeterangan'])->name('surat-keterangan');
        Route::post('/ajukan-surat', [App\Http\Controllers\Private\Mahasiswa\LayananController::class, 'ajukanSuratKeterangan'])->name('ajukan-surat');
        
        // Legalisir Dokumen
        Route::get('/legalisir', [App\Http\Controllers\Private\Mahasiswa\LayananController::class, 'legalisirDokumen'])->name('legalisir');
        Route::post('/ajukan-legalisir', [App\Http\Controllers\Private\Mahasiswa\LayananController::class, 'ajukanLegalisir'])->name('ajukan-legalisir');
        
        // Cuti Akademik
        Route::get('/cuti', [App\Http\Controllers\Private\Mahasiswa\LayananController::class, 'cutiAkademik'])->name('cuti');
        Route::post('/ajukan-cuti', [App\Http\Controllers\Private\Mahasiswa\LayananController::class, 'ajukanCuti'])->name('ajukan-cuti');
    });
    
    // Informasi Routes
    Route::prefix('informasi')->name('informasi.')->group(function () {
        // Pengumuman
        Route::get('/pengumuman', [App\Http\Controllers\Private\Mahasiswa\InformasiController::class, 'pengumuman'])->name('pengumuman');
        Route::get('/pengumuman/{id}', [App\Http\Controllers\Private\Mahasiswa\InformasiController::class, 'detailPengumuman'])->name('pengumuman.detail');
        
        // Kalender Akademik
        Route::get('/kalender-akademik', [App\Http\Controllers\Private\Mahasiswa\InformasiController::class, 'kalenderAkademik'])->name('kalender-akademik');
        
        // Beasiswa
        Route::get('/beasiswa', [App\Http\Controllers\Private\Mahasiswa\InformasiController::class, 'beasiswa'])->name('beasiswa');
        Route::get('/beasiswa/{id}/detail', [App\Http\Controllers\Private\Mahasiswa\InformasiController::class, 'detailBeasiswa'])->name('beasiswa.detail');
        
        // Kontak Kampus
        Route::get('/kontak-kampus', [App\Http\Controllers\Private\Mahasiswa\InformasiController::class, 'kontakKampus'])->name('kontak-kampus');
    });
    
    // Bantuan
    Route::get('/bantuan', [App\Http\Controllers\Private\Mahasiswa\BantuanController::class, 'index'])->name('bantuan');
    Route::post('/kirim-pesan-bantuan', [App\Http\Controllers\Private\Mahasiswa\BantuanController::class, 'kirimPesan'])->name('bantuan.kirim-pesan');
});
