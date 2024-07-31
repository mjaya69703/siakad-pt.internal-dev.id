<?php

use Illuminate\Support\Facades\Route;

// HAK AKSES DEPARTEMENT SUPPORT
Route::group(['prefix' => 'support', 'middleware' => ['user-access:Departement Support'], 'as' => 'support.'],function(){

    // GLOBAL ROUTE
    require __DIR__.'/route-global.php';
    

    // STATUS ACTIVE BOLEH AKSES INI
    Route::middleware(['is-active:1'])->group(function () {

        // MENU KHUSUS DATA INVENTORY => DATA GEDUNG
        Route::get('/inventory/data-gedung',[App\Http\Controllers\Admin\Pages\Inventory\GedungController::class, 'index'])->name('inventory.gedung-index');
        Route::post('/inventory/data-gedung/store',[App\Http\Controllers\Admin\Pages\Inventory\GedungController::class, 'store'])->name('inventory.gedung-store');
        Route::patch('/inventory/data-gedung/{code}/update',[App\Http\Controllers\Admin\Pages\Inventory\GedungController::class, 'update'])->name('inventory.gedung-update');
        Route::delete('/inventory/data-gedung/{code}/destroy',[App\Http\Controllers\Admin\Pages\Inventory\GedungController::class, 'destroy'])->name('inventory.gedung-destroy');
        // MENU KHUSUS DATA INVENTORY => DATA RUANG
        Route::get('/inventory/data-ruang',[App\Http\Controllers\Admin\Pages\Inventory\RuangController::class, 'index'])->name('inventory.ruang-index');
        Route::post('/inventory/data-ruang/store',[App\Http\Controllers\Admin\Pages\Inventory\RuangController::class, 'store'])->name('inventory.ruang-store');
        Route::patch('/inventory/data-ruang/{code}/update',[App\Http\Controllers\Admin\Pages\Inventory\RuangController::class, 'update'])->name('inventory.ruang-update');
        Route::delete('/inventory/data-ruang/{code}/destroy',[App\Http\Controllers\Admin\Pages\Inventory\RuangController::class, 'destroy'])->name('inventory.ruang-destroy');


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