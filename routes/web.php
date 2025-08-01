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
    // AUTH - SIGNUP
    // Route::get('/signup', [App\Http\Controllers\AuthController::class, 'renderSignup'])->name('auth.render-signup');
    // Route::post('/signup', [App\Http\Controllers\AuthController::class, 'handleSignup'])->name('auth.handle-signup');
    // AUTH - FORGOT PASSWORD
    Route::get('/forgot', [App\Http\Controllers\AuthController::class, 'renderForgot'])->name('auth.render-forgot');
    Route::post('/forgot', [App\Http\Controllers\AuthController::class, 'handleForgot'])->name('auth.handle-forgot');
    // AUTH - LOGOUT
    Route::get('/logout', [App\Http\Controllers\AuthController::class, 'handleLogout'])->name('auth.handle-logout');

    // HALAMAN UTAMA / FRONTEND
    // Route::get('/old', [App\Http\Controllers\Root\HomeController::class, 'index'])->name('root.home-index');
    // Route::get('/post/view/{slug}', [App\Http\Controllers\Root\HomeController::class, 'postView'])->name('root.post-view');
    // Route::get('/advice', [App\Http\Controllers\Root\HomeController::class, 'adviceIndex'])->name('root.home-advice');
    // Route::get('/download', [App\Http\Controllers\Root\HomeController::class, 'downloadIndex'])->name('root.home-download');
    // Route::get('/album-foto', [App\Http\Controllers\Root\HomeController::class, 'galleryIndex'])->name('root.gallery-index');
    // Route::get('/album-foto/search', [App\Http\Controllers\Root\HomeController::class, 'gallerySearch'])->name('root.gallery-search');
    // Route::get('/album-foto/show/{slug}', [App\Http\Controllers\Root\HomeController::class, 'galleryShow'])->name('root.gallery-show');
    // Route::get('/admission/{slug}', [App\Http\Controllers\Root\HomeController::class, 'prodiIndex'])->name('root.home-prodi');
    // Route::get('/program-kuliah/{code}', [App\Http\Controllers\Root\HomeController::class, 'prokuIndex'])->name('root.home-proku');
    // Route::post('/advice/store', [App\Http\Controllers\Root\HomeController::class, 'adviceStore'])->name('root.home-advice-store');
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
// // HAK AKSES DEPARTEMENT FINANSIAL
// require __DIR__.'/users/route-finance.php';
// // HAK AKSES DEPARTEMENT OFFICER
// require __DIR__.'/users/route-officer.php';
// // HAK AKSES DEPARTEMENT SUPPORT
// require __DIR__.'/users/route-support.php';
// // HAK AKSES DOSEN
// require __DIR__.'/lectures/route-dosen.php';
// // HAK AKSES MAHASISWA
// require __DIR__.'/students/route-mahasiswa.php';

// Include Master Core Routes
// require __DIR__.'/master-core.php';













