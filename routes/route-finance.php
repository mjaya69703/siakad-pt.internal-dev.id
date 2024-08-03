<?php

use Illuminate\Support\Facades\Route;

// HAK AKSES DEPARTEMENT FINANCE
Route::group(['prefix' => 'finance', 'middleware' => ['user-access:Departement Finance'], 'as' => 'finance.'],function(){

    // GLOBAL ROUTE
    require __DIR__.'/route-global.php';

    // STATUS ACTIVE BOLEH AKSES INI
    Route::middleware(['is-active:1'])->group(function () {



        // MENU KHUSUS FINANCE DEPARTEMENT => DATA TAGIHAN
        Route::get('/data-tagihan',[App\Http\Controllers\Admin\Pages\Finance\GenerateTagihanController::class, 'index'])->name('finance.tagihan-index');
        Route::get('/data-tagihan/create',[App\Http\Controllers\Admin\Pages\Finance\GenerateTagihanController::class, 'create'])->name('finance.tagihan-create');
        Route::post('/data-tagihan/store',[App\Http\Controllers\Admin\Pages\Finance\GenerateTagihanController::class, 'store'])->name('finance.tagihan-store');
        Route::patch('/data-tagihan/{code}/update',[App\Http\Controllers\Admin\Pages\Finance\GenerateTagihanController::class, 'update'])->name('finance.tagihan-update');
        Route::delete('/data-tagihan/{code}/destroy',[App\Http\Controllers\Admin\Pages\Finance\GenerateTagihanController::class, 'destroy'])->name('finance.tagihan-destroy');
        // MENU KHUSUS FINANCE DEPARTEMENT => DATA PEMBAYARAN
        Route::get('/data-pembayaran',[App\Http\Controllers\Admin\Pages\Finance\PembayaranController::class, 'index'])->name('finance.pembayaran-index');
        Route::get('/data-pembayaran/create',[App\Http\Controllers\Admin\Pages\Finance\PembayaranController::class, 'create'])->name('finance.pembayaran-create');
        Route::post('/data-pembayaran/store',[App\Http\Controllers\Admin\Pages\Finance\PembayaranController::class, 'store'])->name('finance.pembayaran-store');
        Route::patch('/data-pembayaran/{code}/update',[App\Http\Controllers\Admin\Pages\Finance\PembayaranController::class, 'update'])->name('finance.pembayaran-update');
        Route::delete('/data-pembayaran/{code}/destroy',[App\Http\Controllers\Admin\Pages\Finance\PembayaranController::class, 'destroy'])->name('finance.pembayaran-destroy');
        // MENU KHUSUS FINANCE DEPARTEMENT => DATA KEUANGAN
        Route::get('/data-keuangan',[App\Http\Controllers\Admin\Pages\Finance\BalanceController::class, 'index'])->name('finance.keuangan-index');
        Route::post('/data-keuangan/store',[App\Http\Controllers\Admin\Pages\Finance\BalanceController::class, 'store'])->name('finance.keuangan-store');
        Route::patch('/data-keuangan/{code}/update',[App\Http\Controllers\Admin\Pages\Finance\BalanceController::class, 'update'])->name('finance.keuangan-update');
        Route::delete('/data-keuangan/{code}/destroy',[App\Http\Controllers\Admin\Pages\Finance\BalanceController::class, 'destroy'])->name('finance.keuangan-destroy');

        // MENU KHUSUS FINANCE DEPARTEMENT => DATA APPROVAL ABSENSI KARYAWAN
        Route::get('/approval-absen',[App\Http\Controllers\Admin\Pages\Finance\ApprovalController::class, 'indexAbsen'])->name('approval.absen-index');
        Route::get('/approval-absen/approved',[App\Http\Controllers\Admin\Pages\Finance\ApprovalController::class, 'indexAbsenApproved'])->name('approval.absen-index-approved');
        Route::get('/approval-absen/rejected',[App\Http\Controllers\Admin\Pages\Finance\ApprovalController::class, 'indexAbsenRejected'])->name('approval.absen-index-rejected');
        Route::patch('/approval-absen/{code}/update/accept',[App\Http\Controllers\Admin\Pages\Finance\ApprovalController::class, 'updateAbsenAccept'])->name('approval.absen-update-accept');
        Route::patch('/approval-absen/{code}/update/reject',[App\Http\Controllers\Admin\Pages\Finance\ApprovalController::class, 'updateAbsenReject'])->name('approval.absen-update-reject');

    });

});
