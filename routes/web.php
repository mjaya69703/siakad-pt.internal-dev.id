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

// LATEST DEVELOPMENT
Route::get('/dev', [App\Http\Controllers\DevController::class, 'index'])->name('dev.home-index');


Route::get('/tabauth', function () {
    return view('tabler.signin-content');
});

// HALAMAN UTAMA / FRONTEND
Route::get('/', [App\Http\Controllers\Root\HomeController::class, 'index'])->name('root.home-index');
Route::get('/post/view/{slug}', [App\Http\Controllers\Root\HomeController::class, 'postView'])->name('root.post-view');
Route::get('/advice', [App\Http\Controllers\Root\HomeController::class, 'adviceIndex'])->name('root.home-advice');
Route::get('/download', [App\Http\Controllers\Root\HomeController::class, 'downloadIndex'])->name('root.home-download');
Route::get('/album-foto', [App\Http\Controllers\Root\HomeController::class, 'galleryIndex'])->name('root.gallery-index');
Route::get('/album-foto/search', [App\Http\Controllers\Root\HomeController::class, 'gallerySearch'])->name('root.gallery-search');
Route::get('/album-foto/show/{slug}', [App\Http\Controllers\Root\HomeController::class, 'galleryShow'])->name('root.gallery-show');
Route::get('/admission/{slug}', [App\Http\Controllers\Root\HomeController::class, 'prodiIndex'])->name('root.home-prodi');
Route::get('/program-kuliah/{code}', [App\Http\Controllers\Root\HomeController::class, 'prokuIndex'])->name('root.home-proku');
Route::post('/advice/store', [App\Http\Controllers\Root\HomeController::class, 'adviceStore'])->name('root.home-advice-store');

// ERROR PAGE
Route::get('/error/verify', [App\Http\Controllers\Root\ErrorController::class, 'ErrorVerify'])->name('error.verify');
Route::get('/error/access', [App\Http\Controllers\Root\ErrorController::class, 'ErrorAccess'])->name('error.access');
Route::get('/error/notfound', [App\Http\Controllers\Root\ErrorController::class, 'ErrorNotFound'])->name('error.notfound');

// HALAMAN AUTHENTIKASI
Route::middleware(['guest'])->group(function () {

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
    Route::post('/logout', [App\Http\Controllers\AuthController::class, 'handleLogout'])->name('auth.handle-logout');

    // AUTENTIKASI MAHASISWA
    Route::get('/mahasiswa/auth-signin', [App\Http\Controllers\Mahasiswa\AuthController::class, 'AuthSignInPage'])->name('mahasiswa.auth-signin-page');
    Route::post('/mahasiswa/auth-signin/post', [App\Http\Controllers\Mahasiswa\AuthController::class, 'AuthSignInPost'])->name('mahasiswa.auth-signin-post');
    Route::get('/mahasiswa/auth-forgot', [App\Http\Controllers\Mahasiswa\AuthController::class, 'AuthForgotPage'])->name('mahasiswa.auth-forgot-page');
    Route::post('/mahasiswa/auth-forgot/verify', [App\Http\Controllers\Mahasiswa\AuthController::class, 'AuthForgotVerify'])->name('mahasiswa.auth-forgot-verify');
    Route::get('/mahasiswa/auth-reset/{token}', [App\Http\Controllers\Mahasiswa\AuthController::class, 'AuthResetPage'])->name('mahasiswa.auth-reset-page');
    Route::post('/mahasiswa/auth-reset/{token}/save', [App\Http\Controllers\Mahasiswa\AuthController::class, 'AuthResetPassword'])->name('mahasiswa.auth-reset-post');

    // AUTENTIKASI ADMIN
    Route::get('/admin/auth-signin', [App\Http\Controllers\Admin\AuthController::class, 'AuthSignInPage'])->name('admin.auth-signin-page');
    Route::post('/admin/auth-signin/post', [App\Http\Controllers\Admin\AuthController::class, 'AuthSignInPost'])->name('admin.auth-signin-post');
    Route::get('/admin/auth-forgot', [App\Http\Controllers\Admin\AuthController::class, 'AuthForgotPage'])->name('admin.auth-forgot-page');
    Route::post('/admin/auth-forgot/verify', [App\Http\Controllers\Admin\AuthController::class, 'AuthForgotVerify'])->name('admin.auth-forgot-verify');
    Route::get('/admin/auth-reset/{token}', [App\Http\Controllers\Admin\AuthController::class, 'AuthResetPage'])->name('admin.auth-reset-page');
    Route::post('/admin/auth-reset/{token}/save', [App\Http\Controllers\Admin\AuthController::class, 'AuthResetPassword'])->name('admin.auth-reset-post');

    // AUTENTIKASI DOSEN
    Route::get('/dosen/auth-signin', [App\Http\Controllers\Dosen\AuthController::class, 'AuthSignInPage'])->name('dosen.auth-signin-page');
    Route::post('/dosen/auth-signin/post', [App\Http\Controllers\Dosen\AuthController::class, 'AuthSignInPost'])->name('dosen.auth-signin-post');
    Route::get('/dosen/auth-forgot', [App\Http\Controllers\Dosen\AuthController::class, 'AuthForgotPage'])->name('dosen.auth-forgot-page');
    Route::post('/dosen/auth-forgot/verify', [App\Http\Controllers\Dosen\AuthController::class, 'AuthForgotVerify'])->name('dosen.auth-forgot-verify');
    Route::get('/dosen/auth-reset/{token}', [App\Http\Controllers\Dosen\AuthController::class, 'AuthResetPage'])->name('dosen.auth-reset-page');
    Route::post('/dosen/auth-reset/{token}/save', [App\Http\Controllers\Dosen\AuthController::class, 'AuthResetPassword'])->name('dosen.auth-reset-post');

});


// HAK AKSES DEPARTEMENT WEB ADMINISTRATOR
require __DIR__.'/users/route-web-admin.php';
// HAK AKSES DEPARTEMENT ADMIN
require __DIR__.'/users/route-admin.php';
// HAK AKSES DEPARTEMENT AKADEMIK
require __DIR__.'/users/route-akademik.php';
// HAK AKSES DEPARTEMENT FINANSIAL
require __DIR__.'/users/route-finance.php';
// HAK AKSES DEPARTEMENT OFFICER
require __DIR__.'/users/route-officer.php';
// HAK AKSES DEPARTEMENT SUPPORT
require __DIR__.'/users/route-support.php';
// HAK AKSES DOSEN
require __DIR__.'/lectures/route-dosen.php';
// HAK AKSES MAHASISWA
require __DIR__.'/students/route-mahasiswa.php';










