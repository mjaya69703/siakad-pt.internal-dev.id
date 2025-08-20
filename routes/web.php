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
// HAK AKSES MAHASISWA
require __DIR__.'/mahasiswa/mahasiswa-aktif.php';

// HAK AKSES PENDAFTAR (PMB)
Route::group(['prefix' => 'pendaftar'], function () {
    require __DIR__.'/pendaftar.php';
});

// Include Master Core Routes
// require __DIR__.'/master-core.php';













