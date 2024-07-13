<?php

use Illuminate\Support\Facades\Route;

// HAK AKSES DEPARTEMENT OFFICER
Route::group(['prefix' => 'officer', 'middleware' => ['user-access:Departement Officer'], 'as' => 'officer.'],function(){
    // GLOBAL MENU AUTHENTIKASI
    Route::get('/signout',[App\Http\Controllers\Admin\AuthController::class, 'AuthSignOutPost'])->name('auth-signout-post');

    // GLOBAL MENU
    Route::get('/home',[App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home-index');
    Route::get('/profile',[App\Http\Controllers\Admin\HomeController::class, 'profile'])->name('home-profile');
    Route::get('/absen-harian',[App\Http\Controllers\Admin\PresensiController::class, 'absenHarian'])->name('presensi.absen-harian');
    Route::get('/absen-izin-cuti',[App\Http\Controllers\Admin\PresensiController::class, 'absenIzinCuti'])->name('presensi.absen-izin-cuti');
    Route::get('/absen-harian/view/{code}',[App\Http\Controllers\Admin\PresensiController::class, 'absenView'])->name('presensi.absen-harian-view');
    // // CHANGE TO ABSEN HARIAN
    // Route::get('/presensi',[App\Http\Controllers\Admin\PresensiController::class, 'index'])->name('home-presensi');
    // Route::get('/presensi/view',[App\Http\Controllers\Admin\PresensiController::class, 'presensiList'])->name('home-presensi-list');
    // Route::get('/presensi/view/{date}',[App\Http\Controllers\Admin\PresensiController::class, 'presensiView'])->name('home-presensi-view');

    // PRIVATE FUNCTION => PROFILE
    Route::patch('/profile/update-image',[App\Http\Controllers\Admin\HomeController::class, 'saveImageProfile'])->name('home-profile-save-image');
    Route::patch('/profile/update-data',[App\Http\Controllers\Admin\HomeController::class, 'saveDataProfile'])->name('home-profile-save-data');
    Route::patch('/profile/update-kontak',[App\Http\Controllers\Admin\HomeController::class, 'saveDataKontak'])->name('home-profile-save-kontak');
    Route::patch('/profile/update-password',[App\Http\Controllers\Admin\HomeController::class, 'saveDataPassword'])->name('home-profile-save-password');

    // PRIVATE FUNCTION => PRESENSI
    Route::post('/presensi/save-absen',[App\Http\Controllers\Admin\HomeController::class, 'saveAbsen'])->name('home-presensi-input-absen');
    Route::post('/presensi/save-izin',[App\Http\Controllers\Admin\HomeController::class, 'saveIzinCuti'])->name('home-presensi-input-izin');
    Route::patch('/presensi/update-absen',[App\Http\Controllers\Admin\PresensiController::class, 'absenPulang'])->name('home-presensi-update-absen');

    // PRIVATE FUNCTION => KATEGORI BERITA
    Route::get('/berita',[App\Http\Controllers\Admin\Pages\News\PostController::class, 'index'])->name('news.post-index');
    Route::get('/berita/create',[App\Http\Controllers\Admin\Pages\News\PostController::class, 'create'])->name('news.post-create');
    Route::get('/berita/view/{code}',[App\Http\Controllers\Admin\Pages\News\PostController::class, 'view'])->name('news.post-view');
    Route::post('/berita/store',[App\Http\Controllers\Admin\Pages\News\PostController::class, 'store'])->name('news.post-store');
    Route::patch('/berita/{code}/update',[App\Http\Controllers\Admin\Pages\News\PostController::class, 'update'])->name('news.post-update');
    Route::delete('/berita/{slug}/destroy',[App\Http\Controllers\Admin\Pages\News\PostController::class, 'destroy'])->name('news.post-destroy');

    // PRIVATE FUNCTION => KATEGORI BERITA
    Route::get('/berita/kategori',[App\Http\Controllers\Admin\Pages\News\CategoryController::class, 'index'])->name('news.category-index');
    Route::post('/berita/kategori/store',[App\Http\Controllers\Admin\Pages\News\CategoryController::class, 'store'])->name('news.category-store');
    Route::patch('/berita/kategori/{code}/update',[App\Http\Controllers\Admin\Pages\News\CategoryController::class, 'update'])->name('news.category-update');
    Route::delete('/berita/kategori/{code}/destroy',[App\Http\Controllers\Admin\Pages\News\CategoryController::class, 'destroy'])->name('news.category-destroy');

    // PRIVATE FUNCTION => FOTO ALBUM
    Route::get('/album',[App\Http\Controllers\Admin\Pages\Publikasi\GalleryController::class, 'index'])->name('publish.album-index');
    Route::get('/album/search',[App\Http\Controllers\Admin\Pages\Publikasi\GalleryController::class, 'search'])->name('publish.album-search');
    Route::get('/album/create',[App\Http\Controllers\Admin\Pages\Publikasi\GalleryController::class, 'create'])->name('publish.album-create');
    Route::get('/album/edit/{slug}',[App\Http\Controllers\Admin\Pages\Publikasi\GalleryController::class, 'edit'])->name('publish.album-edit');
    Route::get('/album/show/{slug}',[App\Http\Controllers\Admin\Pages\Publikasi\GalleryController::class, 'show'])->name('publish.album-show');
    Route::post('/album/store',[App\Http\Controllers\Admin\Pages\Publikasi\GalleryController::class, 'store'])->name('publish.album-store');
    Route::patch('/album/{code}/update',[App\Http\Controllers\Admin\Pages\Publikasi\GalleryController::class, 'update'])->name('publish.album-update');
    Route::delete('/album/{code}/destroy',[App\Http\Controllers\Admin\Pages\Publikasi\GalleryController::class, 'destroy'])->name('publish.album-destroy');

    // STATUS ACTIVE BOLEH AKSES INI
    Route::middleware(['is-active:1'])->group(function () {

        // PRIVATE FUNCTION => SUPPORT TICKET
        Route::get('/support',[App\Http\Controllers\Admin\Pages\Finance\TicketSupportController::class, 'index'])->name('support.ticket-index');
        Route::get('/support/view/{code}',[App\Http\Controllers\Admin\Pages\Finance\TicketSupportController::class, 'view'])->name('support.ticket-view');
        Route::post('/support/create/store-reply/{code}',[App\Http\Controllers\Admin\Pages\Finance\TicketSupportController::class, 'storeReply'])->name('support.ticket-store-reply');

        // MENU KHUSUS ATTRIBUTE SYSTEM => DATA NOTIFIKASI
        Route::get('/system/notify',[App\Http\Controllers\Core\NotifyController::class, 'index'])->name('system.notify-index');
        Route::post('/system/notify/store',[App\Http\Controllers\Core\NotifyController::class, 'store'])->name('system.notify-store');
        Route::patch('/system/notify/{code}/update',[App\Http\Controllers\Core\NotifyController::class, 'update'])->name('system.notify-update');
        Route::delete('/system/notify/{code}/destroy',[App\Http\Controllers\Core\NotifyController::class, 'destroy'])->name('system.notify-destroy');

    });

});