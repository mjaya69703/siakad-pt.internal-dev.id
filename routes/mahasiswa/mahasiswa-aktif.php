<?php

use Illuminate\Support\Facades\Route;

// HAK AKSES MAHASISWA
Route::group(['prefix' => 'mahasiswa', 'middleware' => ['checkUser:Mahasiswa Aktif'], 'as' => 'mahasiswa.'],function(){

    Route::get('/logout', [App\Http\Controllers\AuthController::class, 'handleLogout'])->name('handle-logout');
    Route::get('/home',[App\Http\Controllers\Private\Mahasiswa\RootController::class, 'renderDashboard'])->name('dashboard-render');
    // PROFILE SECTION
    Route::get('/profile',[App\Http\Controllers\Private\Mahasiswa\RootController::class, 'renderProfile'])->name('profile-render');
    Route::patch('/profile',[App\Http\Controllers\Private\Mahasiswa\RootController::class, 'handleProfile'])->name('profile-handle');

});
