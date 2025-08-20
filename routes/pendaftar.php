<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pendaftar\PendaftarAuthController;
use App\Http\Controllers\Pendaftar\DashboardController;

/*
|--------------------------------------------------------------------------
| Pendaftar Routes
|--------------------------------------------------------------------------
|
| Here is where you can register routes for pendaftar authentication
| and dashboard functionality.
|
*/

// Authentication Routes (Guest only)
Route::group(['middleware' => 'guest:pendaftar'], function () {
    // Login Routes
    Route::get('/login', [PendaftarAuthController::class, 'showLoginForm'])->name('pendaftar.login');
    Route::post('/login', [PendaftarAuthController::class, 'login'])->name('pendaftar.login.submit');
    
    // Register Routes
    Route::get('/register', [PendaftarAuthController::class, 'showRegisterForm'])->name('pendaftar.register.form');
    Route::post('/register', [PendaftarAuthController::class, 'register'])->name('pendaftar.register.process');
    
    // Forgot Password Routes
    Route::get('/forgot-password', [PendaftarAuthController::class, 'showForgotPasswordForm'])->name('pendaftar.password.request');
    Route::post('/forgot-password', [PendaftarAuthController::class, 'forgotPassword'])->name('pendaftar.password.email');
    
    // Reset Password Routes
    Route::get('/reset-password/{token}', [PendaftarAuthController::class, 'showResetPasswordForm'])->name('pendaftar.password.reset');
    Route::post('/reset-password', [PendaftarAuthController::class, 'resetPassword'])->name('pendaftar.password.update');
});

// Authenticated Routes (Pendaftar only)
Route::group(['middleware' => 'auth:pendaftar'], function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('pendaftar.dashboard');
    
    // Profile
    Route::get('/profile', [DashboardController::class, 'profile'])->name('pendaftar.profile');
    Route::put('/profile', [DashboardController::class, 'updateProfile'])->name('pendaftar.profile.update');
    Route::put('/profile/password', [DashboardController::class, 'changePassword'])->name('pendaftar.password.change');
    
    // Pembayaran
    Route::post('/pembayaran/upload', [DashboardController::class, 'uploadPembayaran'])->name('pendaftar.pembayaran.upload');
    
    // Documents
    Route::get('/dokumen', [DashboardController::class, 'dokumen'])->name('pendaftar.dokumen');
    Route::post('/dokumen', [DashboardController::class, 'uploadDokumen'])->name('pendaftar.dokumen.upload');
    Route::delete('/dokumen/{id}', [DashboardController::class, 'deleteDokumen'])->name('pendaftar.dokumen.delete');
    
    // Status Pendaftaran
    Route::get('/status', [DashboardController::class, 'status'])->name('pendaftar.status');
    
    // Download Kartu
    Route::get('/kartu/download', [DashboardController::class, 'downloadKartu'])->name('pendaftar.kartu.download');
    
    // Logout
    Route::post('/logout', [PendaftarAuthController::class, 'logout'])->name('pendaftar.logout');
});

// Pendaftaran Routes (Temporary public for testing)
Route::get('/pendaftaran', [DashboardController::class, 'pendaftaran'])->name('pendaftar.pendaftaran');
Route::post('/pendaftaran', [DashboardController::class, 'storePendaftaran'])->name('pendaftar.pendaftaran.store');
Route::put('/pendaftaran/{id}', [DashboardController::class, 'updatePendaftaran'])->name('pendaftar.pendaftaran.update');

// API for AJAX requests (if needed)
Route::group(['prefix' => 'api', 'middleware' => 'auth:pendaftar'], function () {
    Route::get('/program-studi/{jenjang_id}', [DashboardController::class, 'getProgramStudi'])->name('pendaftar.api.program-studi');
});

// Public API for testing (temporary)
Route::get('/public-api/program-studi/{jenjang_id}', [DashboardController::class, 'getProgramStudi'])->name('pendaftar.public-api.program-studi');
