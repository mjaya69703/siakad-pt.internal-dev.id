<?php

use Rap2hpoutre\FastExcel\FastExcel;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [App\Http\Controllers\RootController::class, 'renderHomePage'])->name('root.home-index');

// PMB (eAdmisi) ROUTES
Route::prefix('pmb')->name('pmb.')->group(function () {
    Route::get('/', [App\Http\Controllers\PMB\PmbController::class, 'index'])->name('index');
    Route::get('/daftar', [App\Http\Controllers\PMB\PmbController::class, 'registrationForm'])->name('registration-form');
    Route::get('/get-program-studi', [App\Http\Controllers\PMB\PmbController::class, 'getProgramStudi'])->name('get-program-studi');
    Route::get('/get-registration-fee', [App\Http\Controllers\PMB\PmbController::class, 'getRegistrationFee'])->name('get-registration-fee');
    Route::get('/informasi-pembayaran', [App\Http\Controllers\PMB\PmbController::class, 'paymentInfo'])->name('payment-info');
    Route::get('/hasil-seleksi', [App\Http\Controllers\PMB\PmbController::class, 'selectionResults'])->name('selection-results');
    Route::get('/cek-status', [App\Http\Controllers\PMB\PmbController::class, 'checkStatus'])->name('check-status');
});

// DASHBOARD ROUTES
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.leadership');
    Route::post('/dashboard/refresh', [App\Http\Controllers\DashboardController::class, 'refreshData'])->name('dashboard.refresh');
});

// REGISTRATION MODULE ROUTES
Route::middleware(['auth'])->prefix('master/registrasi')->name('master.registrasi.')->group(function () {
    // Main dashboard
    Route::get('/', [App\Http\Controllers\Master\Registrasi\RegistrasiController::class, 'index'])->name('dashboard');
    
    // PMB Migration
    Route::get('/pending-pmb', [App\Http\Controllers\Master\Registrasi\RegistrasiController::class, 'pendingPmb'])->name('pending-pmb');
    Route::post('/migrate-single/{pendaftar}', [App\Http\Controllers\Master\Registrasi\RegistrasiController::class, 'migrateSingle'])->name('migrate-single');
    Route::post('/migrate-bulk', [App\Http\Controllers\Master\Registrasi\RegistrasiController::class, 'migrateBulk'])->name('migrate-bulk');
    
    // Student Management
    Route::get('/mahasiswa', [App\Http\Controllers\Master\Registrasi\RegistrasiController::class, 'manajemenMahasiswa'])->name('manajemen-mahasiswa');
    Route::get('/mahasiswa/{mahasiswa}', [App\Http\Controllers\Master\Registrasi\RegistrasiController::class, 'detailMahasiswa'])->name('detail-mahasiswa');
    Route::post('/mahasiswa/{mahasiswa}/update-status', [App\Http\Controllers\Master\Registrasi\RegistrasiController::class, 'updateStatus'])->name('update-status');
    
    // KTM Generation
    Route::post('/mahasiswa/{mahasiswa}/generate-ktm', [App\Http\Controllers\Master\Registrasi\RegistrasiController::class, 'generateKTM'])->name('generate-ktm');
    Route::get('/mahasiswa/{mahasiswa}/download-ktm', [App\Http\Controllers\Master\Registrasi\RegistrasiController::class, 'downloadKTM'])->name('download-ktm');
    
    // Export & Import
    Route::get('/export', [App\Http\Controllers\Master\Registrasi\RegistrasiController::class, 'export'])->name('export');
    Route::post('/import', [App\Http\Controllers\Master\Registrasi\RegistrasiController::class, 'import'])->name('import');
    Route::get('/download-template', [App\Http\Controllers\Master\Registrasi\RegistrasiController::class, 'downloadTemplate'])->name('download-template');
    
    // Additional routes for academic records
    Route::get('/mahasiswa/{mahasiswa}/transcript', [App\Http\Controllers\Master\Registrasi\RegistrasiController::class, 'transcript'])->name('transcript');
    Route::get('/mahasiswa/{mahasiswa}/academic-record', [App\Http\Controllers\Master\Registrasi\RegistrasiController::class, 'academicRecord'])->name('academic-record');
    Route::get('/mahasiswa/{mahasiswa}/billing-history', [App\Http\Controllers\Master\Registrasi\RegistrasiController::class, 'billingHistory'])->name('billing-history');
});

// TEST ROUTE - Remove this after fixing mahasiswa routes
Route::get('/test-mahasiswa-route', function() {
    return 'Mahasiswa route test working!';
})->name('test.mahasiswa');

// TEMPORARY MAHASISWA ROUTES - Testing
// MAHASISWA MAIN ROUTES
Route::get('/mahasiswa/logout', [App\Http\Controllers\AuthController::class, 'handleLogout'])->name('mahasiswa.handle-logout');
Route::get('/mahasiswa/home', [App\Http\Controllers\Private\Mahasiswa\RootController::class, 'renderDashboard'])->name('mahasiswa.dashboard-render');
Route::get('/mahasiswa/profile', [App\Http\Controllers\Private\Mahasiswa\RootController::class, 'renderProfile'])->name('mahasiswa.profile-render');
Route::patch('/mahasiswa/profile', [App\Http\Controllers\Private\Mahasiswa\RootController::class, 'handleProfile'])->name('mahasiswa.profile-handle');

// SIMPLE TEST KRS ROUTE
Route::get('/mahasiswa/akademik/krs', function() {
    return 'KRS Route is working! Controller will be added back.';
})->name('mahasiswa.akademik.krs-render');
Route::get('/mahasiswa/akademik/jadwal', [App\Http\Controllers\Private\Mahasiswa\AkademikController::class, 'jadwalKuliah'])->name('mahasiswa.akademik.jadwal');
Route::get('/mahasiswa/akademik/presensi', [App\Http\Controllers\Private\Mahasiswa\AkademikController::class, 'presensi'])->name('mahasiswa.akademik.presensi');
Route::get('/mahasiswa/akademik/nilai', [App\Http\Controllers\Private\Mahasiswa\AkademikController::class, 'nilai'])->name('mahasiswa.akademik.nilai');

// MAHASISWA KEUANGAN ROUTES - Placeholder
Route::get('/mahasiswa/keuangan/tagihan', function() { return 'Tagihan page - under development'; })->name('mahasiswa.keuangan.tagihan');
Route::get('/mahasiswa/keuangan/riwayat', function() { return 'Riwayat page - under development'; })->name('mahasiswa.keuangan.riwayat');
Route::get('/mahasiswa/keuangan/virtual-account', function() { return 'Virtual Account page - under development'; })->name('mahasiswa.keuangan.virtual-account');
Route::get('/mahasiswa/keuangan/bukti-pembayaran', function() { return 'Bukti Pembayaran page - under development'; })->name('mahasiswa.keuangan.bukti-pembayaran');

// MAHASISWA LAYANAN ROUTES - Placeholder
Route::get('/mahasiswa/layanan/transkrip', function() { return 'Transkrip page - under development'; })->name('mahasiswa.layanan.transkrip');
Route::get('/mahasiswa/layanan/surat-keterangan', function() { return 'Surat Keterangan page - under development'; })->name('mahasiswa.layanan.surat-keterangan');
Route::get('/mahasiswa/layanan/legalisir', function() { return 'Legalisir page - under development'; })->name('mahasiswa.layanan.legalisir');
Route::get('/mahasiswa/layanan/cuti', function() { return 'Cuti page - under development'; })->name('mahasiswa.layanan.cuti');

// MAHASISWA INFORMASI ROUTES - Placeholder
Route::get('/mahasiswa/informasi/pengumuman', function() { return 'Pengumuman page - under development'; })->name('mahasiswa.informasi.pengumuman');
Route::get('/mahasiswa/informasi/kalender-akademik', function() { return 'Kalender Akademik page - under development'; })->name('mahasiswa.informasi.kalender-akademik');
Route::get('/mahasiswa/informasi/beasiswa', function() { return 'Beasiswa page - under development'; })->name('mahasiswa.informasi.beasiswa');
Route::get('/mahasiswa/informasi/kontak-kampus', function() { return 'Kontak Kampus page - under development'; })->name('mahasiswa.informasi.kontak-kampus');

// MAHASISWA BANTUAN ROUTES - Placeholder
Route::get('/mahasiswa/bantuan', function() { return 'Bantuan page - under development'; })->name('mahasiswa.bantuan');

// TEST ROUTE untuk verifikasi data master
Route::get('/test-master', function() {
    $jenjangs = \App\Models\Akademik\JenjangPendidikan::all();
    return view('test-master', compact('jenjangs'));
});

// Test route untuk pendaftaran tanpa CSRF (untuk testing)
Route::post('/test-pendaftaran', function(\Illuminate\Http\Request $request) {
    try {
        $data = $request->all();
        
        // Get first valid pendaftar user or use null
        $pendaftarUser = \App\Models\PendaftarUser::first();
        $pendaftarUserId = $pendaftarUser ? $pendaftarUser->id : null;
        
        // Simulate creating a pendaftar record
        $pendaftaran = \App\Models\Pendaftaran\Pendaftar::create([
            'mahasiswa_id' => 0,
            'jalur_id' => $data['jalur_id'] ?? 1,
            'jenis_id' => $data['jenis_id'] ?? 1,
            'gelombang_id' => $data['gelombang_id'] ?? 1,
            'prodi_1' => $data['program_studi_id'],
            'prodi_2' => $data['program_studi_id'], // Same as primary
            'prodi_3' => null,
            'phone' => $data['no_hp'],
            'email' => $pendaftarUser ? $pendaftarUser->email : 'test@example.com',
            'name' => $data['nama_lengkap'],
            'code' => 'PMB-TEST-' . time(),
            'numb_reg' => 'PMB-TEST-' . time(),
            'register_date' => now(),
            'status' => 'Pending',
            'pendaftar_user_id' => $pendaftarUserId,
            'nik' => $data['nik'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'agama' => $data['agama'],
            'tempat_lahir' => $data['tempat_lahir'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'alamat_lengkap' => $data['alamat_lengkap'],
            'rt' => $data['rt'],
            'rw' => $data['rw'],
            'desa_kelurahan' => $data['desa_kelurahan'],
            'kecamatan' => $data['kecamatan'],
            'kota_kabupaten' => $data['kota_kabupaten'],
            'provinsi' => $data['provinsi'],
            'kode_pos' => $data['kode_pos'],
        ]);
        
        return response()->json([
            'success' => true,
            'message' => 'Test pendaftaran berhasil!',
            'data' => $pendaftaran
        ]);
        
    } catch(\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Error: ' . $e->getMessage(),
            'data' => $request->all()
        ], 500);
    }
})->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);

// Test route untuk upload dokumen tanpa CSRF (untuk testing)
Route::post('/test-upload-dokumen', function(\Illuminate\Http\Request $request) {
    try {
        // Get a valid pendaftaran record
        $pendaftaran = \App\Models\Pendaftaran\Pendaftar::latest()->first();
        
        if (!$pendaftaran) {
            return response()->json([
                'success' => false,
                'message' => 'No pendaftaran found. Please create one first.',
            ], 404);
        }
        
        $request->validate([
            'nama_dokumen' => 'required|string|max:255',
            'file_dokumen' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);
        
        $file = $request->file('file_dokumen');
        $filename = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('dokumen-pmb/' . $pendaftaran->id, $filename, 'public');

        $dokumen = \App\Models\Pendaftaran\DokumenPMB::create([
            'pendaftar_id' => $pendaftaran->id,
            'nama_dokumen' => $request->nama_dokumen,
            'file_path' => $path,
            'file_name' => $filename,
            'file_size' => $file->getSize(),
            'mime_type' => $file->getMimeType(),
            'status' => 'pending',
        ]);
        
        return response()->json([
            'success' => true,
            'message' => 'Dokumen berhasil diupload!',
            'data' => $dokumen
        ]);
        
    } catch(\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Error: ' . $e->getMessage(),
            'errors' => $e->getTrace()
        ], 500);
    }
})->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);

// Test API Program Studi
Route::get('/test-prodi/{jenjang_id}', function($jenjang_id) {
    $prodis = \App\Models\Akademik\ProgramStudi::where('jenjang_id', $jenjang_id)
                                             ->where('status', 'Aktif')
                                             ->get(['id', 'name', 'code']);
    return response()->json($prodis);
});

// Test Form Pendaftaran (tanpa auth sementara)
Route::get('/test-form', function() {
    $jenjangs = \App\Models\Akademik\JenjangPendidikan::all();
    $gelombangs = collect([(object)['id' => 1, 'name' => 'Gelombang 1']]);
    $jalurs = collect([(object)['id' => 1, 'name' => 'Reguler']]);
    $jenisKelas = collect([(object)['id' => 1, 'name' => 'Reguler']]);
    
    return view('pendaftar.dashboard.pendaftaran', compact('jenjangs', 'gelombangs', 'jalurs', 'jenisKelas'));
});

// PUBLICATION ROUTES
Route::get('/pengumuman', [App\Http\Controllers\RootController::class, 'renderPengumuman'])->name('root.pengumuman-index');
Route::get('/pengumuman/{code}/view', [App\Http\Controllers\RootController::class, 'renderPengumumanView'])->name('root.pengumuman-view');
Route::get('/kalender-akademik', [App\Http\Controllers\RootController::class, 'renderKalenderAkademik'])->name('root.kalender-akademik-index');
Route::get('/kalender-akademik/{code}/view', [App\Http\Controllers\RootController::class, 'renderKalenderAkademikView'])->name('root.kalender-akademik-view');
Route::get('/berita', [App\Http\Controllers\RootController::class, 'renderBerita'])->name('root.berita-index');
Route::get('/berita/{slug}/view', [App\Http\Controllers\RootController::class, 'renderBeritaView'])->name('root.berita-view');
// GALLERY ROUTES
Route::get('/galeri', [App\Http\Controllers\RootController::class, 'renderGaleri'])->name('root.galeri-index');
Route::get('/galeri/{code}/view', [App\Http\Controllers\RootController::class, 'renderGaleriView'])->name('root.galeri-view');
// PROGRAM STUDI ROUTES
Route::get('/program-studi', [App\Http\Controllers\RootController::class, 'renderProgramStudi'])->name('root.prodi-index');
Route::get('/program-studi/{slug}/view', [App\Http\Controllers\RootController::class, 'renderProgramStudiView'])->name('root.prodi-view');

Route::get('/welcome', [App\Http\Controllers\RootController::class, 'renderWelcome'])->name('root.welcome');
Route::post('/api/setup', [App\Http\Controllers\SetupController::class, 'processSetup'])->name('setup.process');

// LATEST DEVELOPMENT
Route::middleware(['guest', 'first.setup'])->group(function () {

    // AUTH - SIGNIN
    Route::get('/signin', [App\Http\Controllers\AuthController::class, 'renderSignin'])->name('auth.render-signin');
    Route::post('/signin', [App\Http\Controllers\AuthController::class, 'handleSignin'])->name('auth.handle-signin');
    // AUTH - SIGNUP (PENDAFTAR)
    Route::get('/register', [App\Http\Controllers\Pendaftar\PendaftarAuthController::class, 'showRegisterForm'])->name('pendaftar.register');
    Route::post('/register', [App\Http\Controllers\Pendaftar\PendaftarAuthController::class, 'register'])->name('pendaftar.register.submit');
    // AUTH - FORGOT PASSWORD
    Route::get('/forgot', [App\Http\Controllers\AuthController::class, 'renderForgot'])->name('auth.render-forgot');
    Route::post('/forgot', [App\Http\Controllers\AuthController::class, 'handleForgot'])->name('auth.handle-forgot');
    // AUTH - LOGOUT
    Route::get('/logout', [App\Http\Controllers\AuthController::class, 'handleLogout'])->name('auth.handle-logout');

});





// ERROR PAGE
Route::get('/error/verify', [App\Http\Controllers\Root\ErrorController::class, 'ErrorVerify'])->name('error.verify');
Route::get('/error/access', [App\Http\Controllers\Root\ErrorController::class, 'ErrorAccess'])->name('error.access');
Route::get('/error/notfound', [App\Http\Controllers\Root\ErrorController::class, 'ErrorNotFound'])->name('error.notfound');




// HAK AKSES DEPARTEMENT WEB ADMINISTRATOR
require __DIR__.'/users/route-web-admin.php';
// HAK AKSES DEPARTEMENT ADMIN
// require __DIR__.'/users/route-admin.php';
// // HAK AKSES DEPARTEMENT AKADEMIK
// require __DIR__.'/users/route-akademik.php';
// HAK AKSES DEPARTEMENT FINANSIAL
require __DIR__.'/users/route-finance.php';
// // HAK AKSES DEPARTEMENT OFFICER
// require __DIR__.'/users/route-officer.php';
// // HAK AKSES DEPARTEMENT SUPPORT
// require __DIR__.'/users/route-support.php';
// // HAK AKSES DOSEN
// require __DIR__.'/auth.php';

// Include debug routes for testing
if (app()->environment('local')) {
    require __DIR__.'/debug.php';
}
// HAK AKSES MAHASISWA (TEMPORARILY DISABLED - MOVED TO INLINE ROUTES ABOVE)
// require __DIR__.'/mahasiswa/mahasiswa-aktif.php';

// HAK AKSES PENDAFTAR (PMB)
Route::group(['prefix' => 'pendaftar'], function () {
    require __DIR__.'/pendaftar.php';
});

// Include Master Core Routes
require __DIR__.'/master-core.php';

// Include Academic Integration Routes
require __DIR__.'/academic-integration.php';

/*
|--------------------------------------------------------------------------
| COMPREHENSIVE SIAKAD PORTAL ROUTES
|--------------------------------------------------------------------------
| Complete route definitions for SIAKAD Portal with admin monitoring,
| Back-office Academic, Portal Academic, NeoFeeder, and Tripay integration
*/

// MAIN PORTAL ENTRY
Route::get('/portal', [App\Http\Controllers\Portal\PortalAcademicController::class, 'index'])->name('portal.index');

// ADMIN MONITORING ROUTES
Route::prefix('admin')->name('admin.')->middleware(['auth', 'verified'])->group(function () {
    // Monitoring Dashboard
    Route::get('/monitoring', [App\Http\Controllers\Admin\MonitoringController::class, 'index'])->name('monitoring.dashboard');
    
    // Mahasiswa Monitoring
    Route::get('/monitoring/mahasiswa', [App\Http\Controllers\Admin\MonitoringController::class, 'mahasiswaList'])->name('monitoring.mahasiswa');
    Route::get('/monitoring/mahasiswa/{id}', [App\Http\Controllers\Admin\MonitoringController::class, 'mahasiswaDetail'])->name('monitoring.mahasiswa.detail');
    
    // Login As (Impersonation) - Fitur Login Sebagai Mahasiswa
    Route::post('/monitoring/login-as-student', [App\Http\Controllers\Admin\MonitoringController::class, 'loginAsStudent'])->name('monitoring.login-as-student');
    Route::get('/monitoring/stop-impersonation', [App\Http\Controllers\Admin\MonitoringController::class, 'stopImpersonation'])->name('monitoring.stop-impersonation');
    
    // System Health - Kesehatan Sistem
    Route::get('/monitoring/system-health', [App\Http\Controllers\Admin\MonitoringController::class, 'systemHealth'])->name('monitoring.system-health');
    
    // Back-office Academic Routes - Sistem Akademik Back Office
    Route::prefix('academic')->name('academic.')->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\Admin\Academic\BackOfficeController::class, 'dashboard'])->name('dashboard');
        
        // Manajemen Program Studi
        Route::get('/program-studi', [App\Http\Controllers\Admin\Academic\BackOfficeController::class, 'programStudi'])->name('program-studi');
        Route::post('/program-studi', [App\Http\Controllers\Admin\Academic\BackOfficeController::class, 'storeProgramStudi'])->name('program-studi.store');
        
        // Manajemen Mata Kuliah
        Route::get('/mata-kuliah', [App\Http\Controllers\Admin\Academic\BackOfficeController::class, 'mataKuliah'])->name('mata-kuliah');
        Route::post('/mata-kuliah', [App\Http\Controllers\Admin\Academic\BackOfficeController::class, 'storeMataKuliah'])->name('mata-kuliah.store');
        
        // Manajemen Jadwal Kuliah
        Route::get('/jadwal-kuliah', [App\Http\Controllers\Admin\Academic\BackOfficeController::class, 'jadwalKuliah'])->name('jadwal-kuliah');
        Route::post('/jadwal-kuliah', [App\Http\Controllers\Admin\Academic\BackOfficeController::class, 'storeJadwalKuliah'])->name('jadwal-kuliah.store');
        
        // Manajemen KRS
        Route::get('/krs-management', [App\Http\Controllers\Admin\Academic\BackOfficeController::class, 'krsManagement'])->name('krs');
        Route::post('/krs/{id}/approve', [App\Http\Controllers\Admin\Academic\BackOfficeController::class, 'approveKRS'])->name('krs.approve');
        Route::post('/krs/{id}/reject', [App\Http\Controllers\Admin\Academic\BackOfficeController::class, 'rejectKRS'])->name('krs.reject');
        
        // Manajemen Nilai
        Route::get('/nilai-management', [App\Http\Controllers\Admin\Academic\BackOfficeController::class, 'nilaiManagement'])->name('nilai');
        
        // Laporan Akademik
        Route::get('/laporan', [App\Http\Controllers\Admin\Academic\BackOfficeController::class, 'laporanAkademik'])->name('laporan');
    });
});

// PORTAL ACADEMIC ROUTES - Portal Akademik untuk Semua Pengguna
Route::prefix('portal')->name('portal.')->group(function () {
    // Portal Mahasiswa
    Route::middleware(['auth:mahasiswa'])->group(function () {
        Route::get('/mahasiswa/dashboard', [App\Http\Controllers\Portal\PortalAcademicController::class, 'mahasiswaDashboard'])->name('mahasiswa.dashboard');
    });
    
    // Portal Dosen
    Route::middleware(['auth:dosen'])->group(function () {
        Route::get('/dosen/dashboard', [App\Http\Controllers\Portal\PortalAcademicController::class, 'dosenDashboard'])->name('dosen.dashboard');
    });
    
    // Portal Admin
    Route::middleware(['auth'])->group(function () {
        Route::get('/admin/dashboard', [App\Http\Controllers\Portal\PortalAcademicController::class, 'adminDashboard'])->name('admin.dashboard');
    });
    
    // Kalender Akademik (semua pengguna)
    Route::get('/calendar', [App\Http\Controllers\Portal\PortalAcademicController::class, 'calendar'])->name('calendar');
});

// NEOFEEDER INTEGRATION ROUTES - Integrasi NeoFeeder 3.0.1 PDDIKTI
Route::prefix('integration/neofeeder')->name('neofeeder.')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Integration\NeoFeederController::class, 'dashboard'])->name('dashboard');
    Route::get('/check-connection', [App\Http\Controllers\Integration\NeoFeederController::class, 'checkConnection'])->name('check-connection');
    
    // Sinkronisasi Data
    Route::post('/sync/mahasiswa', [App\Http\Controllers\Integration\NeoFeederController::class, 'syncMahasiswa'])->name('sync.mahasiswa');
    Route::post('/sync/krs', [App\Http\Controllers\Integration\NeoFeederController::class, 'syncKRS'])->name('sync.krs');
    Route::post('/sync/nilai', [App\Http\Controllers\Integration\NeoFeederController::class, 'syncNilai'])->name('sync.nilai');
    
    // Pengaturan dan Log
    Route::get('/settings', [App\Http\Controllers\Integration\NeoFeederController::class, 'settings'])->name('settings');
    Route::post('/settings', [App\Http\Controllers\Integration\NeoFeederController::class, 'updateSettings'])->name('settings.update');
    Route::get('/logs', [App\Http\Controllers\Integration\NeoFeederController::class, 'logs'])->name('logs');
});

// TRIPAY INTEGRATION ROUTES - Integrasi Gateway Pembayaran Tripay
Route::prefix('integration/tripay')->name('tripay.')->group(function () {
    // Admin routes - Rute Admin
    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\Integration\TripayController::class, 'dashboard'])->name('dashboard');
        Route::get('/transactions', [App\Http\Controllers\Integration\TripayController::class, 'transactions'])->name('transactions');
        Route::get('/settings', [App\Http\Controllers\Integration\TripayController::class, 'settings'])->name('settings');
        Route::post('/settings', [App\Http\Controllers\Integration\TripayController::class, 'updateSettings'])->name('settings.update');
    });
    
    // Payment routes (untuk mahasiswa) - Rute Pembayaran untuk Mahasiswa
    Route::middleware(['auth:mahasiswa'])->group(function () {
        Route::post('/create-transaction', [App\Http\Controllers\Integration\TripayController::class, 'createTransaction'])->name('create-transaction');
        Route::post('/create-virtual-account', [App\Http\Controllers\Integration\TripayController::class, 'createVirtualAccount'])->name('create-va');
        Route::get('/check-status/{reference}', [App\Http\Controllers\Integration\TripayController::class, 'checkTransactionStatus'])->name('check-status');
    });
    
    // Callback route (tanpa autentikasi) - Rute Callback
    Route::post('/callback', [App\Http\Controllers\Integration\TripayController::class, 'handleCallback'])->name('callback');
});

// COMPREHENSIVE MAHASISWA ROUTES - Rute Lengkap untuk Mahasiswa
Route::middleware(['auth:mahasiswa'])->group(function () {
    // Dashboard utama (redirect ke mahasiswa/home)
    Route::get('/mahasiswa/home', [App\Http\Controllers\Private\Mahasiswa\RootController::class, 'renderDashboard'])->name('mahasiswa.dashboard');
    
    // Rute profil
    Route::get('/mahasiswa/profile', [App\Http\Controllers\Private\Mahasiswa\RootController::class, 'renderProfile'])->name('mahasiswa.profile-render');
    Route::post('/mahasiswa/profile', [App\Http\Controllers\Private\Mahasiswa\RootController::class, 'handleProfile'])->name('mahasiswa.profile-update');
    
    // Rute akademik
    Route::prefix('mahasiswa/akademik')->name('mahasiswa.akademik.')->group(function () {
        Route::get('/krs', function() { return view('portal.mahasiswa.akademik.krs'); })->name('krs-render');
        Route::get('/jadwal', function() { return view('portal.mahasiswa.akademik.jadwal'); })->name('jadwal');
        Route::get('/presensi', function() { return view('portal.mahasiswa.akademik.presensi'); })->name('presensi');
        Route::get('/nilai', function() { return view('portal.mahasiswa.akademik.nilai'); })->name('nilai');
    });
    
    // Rute keuangan
    Route::prefix('mahasiswa/keuangan')->name('mahasiswa.keuangan.')->group(function () {
        Route::get('/tagihan', function() { return view('portal.mahasiswa.keuangan.tagihan'); })->name('tagihan');
        Route::get('/riwayat', function() { return view('portal.mahasiswa.keuangan.riwayat'); })->name('riwayat');
        Route::get('/virtual-account', function() { return view('portal.mahasiswa.keuangan.virtual-account'); })->name('virtual-account');
        Route::get('/bukti-pembayaran', function() { return view('portal.mahasiswa.keuangan.bukti-pembayaran'); })->name('bukti-pembayaran');
    });
    
    // Rute layanan
    Route::prefix('mahasiswa/layanan')->name('mahasiswa.layanan.')->group(function () {
        Route::get('/transkrip', function() { return view('portal.mahasiswa.layanan.transkrip'); })->name('transkrip');
        Route::get('/surat-keterangan', function() { return view('portal.mahasiswa.layanan.surat-keterangan'); })->name('surat-keterangan');
        Route::get('/legalisir', function() { return view('portal.mahasiswa.layanan.legalisir'); })->name('legalisir');
        Route::get('/cuti', function() { return view('portal.mahasiswa.layanan.cuti'); })->name('cuti');
    });
    
    // Rute informasi
    Route::prefix('mahasiswa/informasi')->name('mahasiswa.informasi.')->group(function () {
        Route::get('/pengumuman', function() { return view('portal.mahasiswa.informasi.pengumuman'); })->name('pengumuman');
        Route::get('/berita', function() { return view('portal.mahasiswa.informasi.berita'); })->name('berita');
        Route::get('/kalender-akademik', function() { return view('portal.mahasiswa.informasi.kalender'); })->name('kalender-akademik');
        Route::get('/kontak', function() { return view('portal.mahasiswa.informasi.kontak'); })->name('kontak');
    });
    
    // Rute bantuan
    Route::prefix('mahasiswa/bantuan')->name('mahasiswa.bantuan.')->group(function () {
        Route::get('/panduan', function() { return view('portal.mahasiswa.bantuan.panduan'); })->name('panduan');
        Route::get('/faq', function() { return view('portal.mahasiswa.bantuan.faq'); })->name('faq');
        Route::get('/tiket-bantuan', function() { return view('portal.mahasiswa.bantuan.tiket'); })->name('tiket-bantuan');
        Route::get('/kontak-support', function() { return view('portal.mahasiswa.bantuan.kontak-support'); })->name('kontak-support');
    });
    
    // Rute sukses pembayaran
    Route::get('/mahasiswa/pembayaran/success', function() {
        return view('portal.mahasiswa.keuangan.success');
    })->name('mahasiswa.pembayaran.success');
});

// LOGOUT ROUTE FOR MAHASISWA - Rute Logout untuk Mahasiswa
Route::get('/mahasiswa/logout', [App\Http\Controllers\AuthController::class, 'handleLogout'])->name('mahasiswa.handle-logout');

// IMPERSONATION NOTICE COMPONENT (untuk admin login sebagai mahasiswa)
Route::middleware(['auth:mahasiswa'])->group(function () {
    Route::get('/admin/back-to-admin', [App\Http\Controllers\Admin\MonitoringController::class, 'stopImpersonation'])->name('admin.back-to-admin');
});













