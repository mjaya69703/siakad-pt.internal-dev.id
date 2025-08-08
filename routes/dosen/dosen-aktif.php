<?php

use Illuminate\Support\Facades\Route;

// HAK AKSES DOSEN
Route::group(['prefix' => 'dosen', 'middleware' => ['checkUser:Dosen Aktif'], 'as' => 'dosen.'],function(){

    Route::get('/logout', [App\Http\Controllers\AuthController::class, 'handleLogout'])->name('handle-logout');
    Route::get('/home',[App\Http\Controllers\Private\Dosen\RootController::class, 'renderDashboard'])->name('dashboard-render');
    // PROFILE SECTION
    Route::get('/profile',[App\Http\Controllers\Private\Dosen\RootController::class, 'renderProfile'])->name('profile-render');
    Route::patch('/profile',[App\Http\Controllers\Private\Dosen\RootController::class, 'handleProfile'])->name('profile-handle');


});

