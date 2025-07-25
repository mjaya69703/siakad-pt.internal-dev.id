<?php

use Illuminate\Support\Facades\Route;

    Route::get('/logout', [App\Http\Controllers\AuthController::class, 'handleLogout'])->name('handle-logout');
    Route::get('/home',[App\Http\Controllers\Private\User\RootController::class, 'renderDashboard'])->name('dashboard-render');
    // PROFILE SECTION
    Route::get('/profile',[App\Http\Controllers\Private\User\RootController::class, 'renderProfile'])->name('profile-render');
    Route::patch('/profile',[App\Http\Controllers\Private\User\RootController::class, 'handleProfile'])->name('profile-handle');
    // KEPEGAWAIAN => ABSENSI
    Route::get('/absen',[App\Http\Controllers\Private\User\Pages\AbsensiController::class, 'renderAbsensi'])->name('absensi-render');
    Route::post('/absen',[App\Http\Controllers\Private\User\Pages\AbsensiController::class, 'handleAbsensi'])->name('absensi-handle');
    Route::patch('/absen/{code}',[App\Http\Controllers\Private\User\Pages\AbsensiController::class, 'updateAbsensi'])->name('absensi-update');
