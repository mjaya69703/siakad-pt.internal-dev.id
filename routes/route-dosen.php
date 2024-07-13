<?php

use Illuminate\Support\Facades\Route;

// HAK AKSES DOSEN
Route::group(['prefix' => 'dosen', 'middleware' => ['dsn-access:Dosen Aktif'], 'as' => 'dosen.'],function(){
    // GLOBAL MENU AUTHENTIKASI
    Route::get('/signout',[App\Http\Controllers\Dosen\AuthController::class, 'AuthSignOutPost'])->name('auth-signout-post');

    // GLOBAL MENU
    Route::get('/home',[App\Http\Controllers\Dosen\HomeController::class, 'index'])->name('home-index');
    Route::get('/profile',[App\Http\Controllers\Dosen\HomeController::class, 'profile'])->name('home-profile');

    // PRIVATE FUNCTION => PROFILE
    Route::patch('/profile/update-image',[App\Http\Controllers\Dosen\HomeController::class, 'saveImageProfile'])->name('home-profile-save-image');
    Route::patch('/profile/update-data',[App\Http\Controllers\Dosen\HomeController::class, 'saveDataProfile'])->name('home-profile-save-data');
    Route::patch('/profile/update-kontak',[App\Http\Controllers\Dosen\HomeController::class, 'saveDataKontak'])->name('home-profile-save-kontak');
    Route::patch('/profile/update-password',[App\Http\Controllers\Dosen\HomeController::class, 'saveDataPassword'])->name('home-profile-save-password');

    // PRIVATE FUNCTION => DATA AKADEMIK - JADWAL MENGAJAR
    Route::get('/data-akademik/jadwal',[App\Http\Controllers\Dosen\Akademik\JadwalAjarController::class, 'index'])->name('akademik.jadwal-index');
    Route::get('/data-akademik/jadwal/{code}/absen',[App\Http\Controllers\Dosen\Akademik\JadwalAjarController::class, 'viewAbsen'])->name('akademik.jadwal-view-absen');
    Route::get('/data-akademik/jadwal/{code}/feedback',[App\Http\Controllers\Dosen\Akademik\JadwalAjarController::class, 'viewFeedBack'])->name('akademik.jadwal-view-feedback');
    Route::patch('/data-akademik/jadwal/absen/{code}/update',[App\Http\Controllers\Dosen\Akademik\JadwalAjarController::class, 'updateAbsen'])->name('akademik.jadwal-absen-update');

    // PRIVATE FUNCTION => DATA AKADEMIK - Kelola Tugas
    Route::get('/data-akademik/kelola-tugas',[App\Http\Controllers\Dosen\Akademik\StudentTaskController::class, 'index'])->name('akademik.stask-index');
    Route::get('/data-akademik/kelola-tugas/tambah',[App\Http\Controllers\Dosen\Akademik\StudentTaskController::class, 'create'])->name('akademik.stask-create');
    Route::get('/data-akademik/kelola-tugas/view/{code}',[App\Http\Controllers\Dosen\Akademik\StudentTaskController::class, 'view'])->name('akademik.stask-view');
    Route::get('/data-akademik/kelola-tugas/view/detail/{code}',[App\Http\Controllers\Dosen\Akademik\StudentTaskController::class, 'viewDetail'])->name('akademik.stask-view-detail');
    Route::get('/data-akademik/kelola-tugas/edit/{code}',[App\Http\Controllers\Dosen\Akademik\StudentTaskController::class, 'edit'])->name('akademik.stask-edit');
    Route::get('/data-akademik/kelola-tugas/edit/{code}/score',[App\Http\Controllers\Dosen\Akademik\StudentTaskController::class, 'editScore'])->name('akademik.stask-edit-score');
    Route::post('/data-akademik/kelola-tugas/store',[App\Http\Controllers\Dosen\Akademik\StudentTaskController::class, 'store'])->name('akademik.stask-store');
    Route::patch('/data-akademik/kelola-tugas/update/{code}',[App\Http\Controllers\Dosen\Akademik\StudentTaskController::class, 'update'])->name('akademik.stask-update');
    Route::patch('/data-akademik/kelola-tugas/update/{code}/score',[App\Http\Controllers\Dosen\Akademik\StudentTaskController::class, 'updateScore'])->name('akademik.stask-update-score');
    Route::delete('/data-akademik/kelola-tugas/delete/{code}',[App\Http\Controllers\Dosen\Akademik\StudentTaskController::class, 'destroy'])->name('akademik.stask-destroy');

    // PRIVATE FUNCTION => GRAPHIC AJAX FUNCTION
    Route::get('/services/ajax/graphic/{code}/kepuasan-mengajar',[App\Http\Controllers\Services\Ajax\GraphicController::class, 'getKepuasanMengajar'])->name('services.ajax.graphic.kepuasan-mengajar');
    Route::get('/services/ajax/graphic/kepuasan-mengajar/dosen',[App\Http\Controllers\Services\Ajax\GraphicController::class, 'getKepuasanMengajarDosen'])->name('services.ajax.graphic.kepuasan-mengajar-dosen');


});

