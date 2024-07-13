<?php

use Illuminate\Support\Facades\Route;

// HAK AKSES MAHASISWA
Route::group(['prefix' => 'mahasiswa', 'middleware' => ['mhs-access:Mahasiswa Aktif'], 'as' => 'mahasiswa.'],function(){
    // GLOBAL MENU AUTHENTIKASI
    Route::get('/signout',[App\Http\Controllers\Mahasiswa\AuthController::class, 'AuthSignOutPost'])->name('auth-signout-post');

    // GLOBAL MENU
    Route::get('/home',[App\Http\Controllers\Mahasiswa\HomeController::class, 'index'])->name('home-index');
    Route::get('/profile',[App\Http\Controllers\Mahasiswa\HomeController::class, 'profile'])->name('home-profile');
    Route::get('/tagihan',[App\Http\Controllers\Mahasiswa\HomeController::class, 'tagihanIndex'])->name('home-tagihan-index');
    Route::get('/tagihan/{code}/invoice',[App\Http\Controllers\Mahasiswa\HomeController::class, 'tagihanInvoice'])->name('home-tagihan-invoice');
    Route::get('/jadwal-kuliah',[App\Http\Controllers\Mahasiswa\HomeController::class, 'jadkulIndex'])->name('home-jadkul-index');
    Route::get('/tagihan/view/{code}',[App\Http\Controllers\Mahasiswa\HomeController::class, 'tagihanView'])->name('home-tagihan-view');
    Route::post('/tagihan/view/{code}/payment',[App\Http\Controllers\Mahasiswa\HomeController::class, 'tagihanPayment'])->name('home-tagihan-payment');
    Route::get('/tagihan/view/{code}/payment/success',[App\Http\Controllers\Mahasiswa\HomeController::class, 'tagihanSuccess'])->name('home-tagihan-payment-success');
    Route::get('/jadwal-kuliah/{code}/absen',[App\Http\Controllers\Mahasiswa\HomeController::class, 'jadkulAbsen'])->name('home-jadkul-absen');
    Route::post('/jadwal-kuliah/store/absen',[App\Http\Controllers\Mahasiswa\HomeController::class, 'jadkulAbsenStore'])->name('home-jadkul-absen-store');
    Route::post('/jadwal-kuliah/store/{code}/feedback',[App\Http\Controllers\Mahasiswa\HomeController::class, 'storeFBPerkuliahan'])->name('jadkul.feedback-store');

    // PRIVATE FUNCTION => PROFILE
    Route::patch('/profile/update-image',[App\Http\Controllers\Mahasiswa\HomeController::class, 'saveImageProfile'])->name('home-profile-save-image');
    Route::patch('/profile/update-data',[App\Http\Controllers\Mahasiswa\HomeController::class, 'saveDataProfile'])->name('home-profile-save-data');
    Route::patch('/profile/update-kontak',[App\Http\Controllers\Mahasiswa\HomeController::class, 'saveDataKontak'])->name('home-profile-save-kontak');
    Route::patch('/profile/update-password',[App\Http\Controllers\Mahasiswa\HomeController::class, 'saveDataPassword'])->name('home-profile-save-password');

    // PRIVATE FUNCTION => SUPPORT TICKET
    Route::get('/support',[App\Http\Controllers\Mahasiswa\Pages\SupportController::class, 'index'])->name('support.ticket-index');
    Route::get('/support',[App\Http\Controllers\Mahasiswa\Pages\SupportController::class, 'index'])->name('support.ticket-index');
    Route::get('/support/open',[App\Http\Controllers\Mahasiswa\Pages\SupportController::class, 'open'])->name('support.ticket-open');
    Route::get('/support/view/{code}',[App\Http\Controllers\Mahasiswa\Pages\SupportController::class, 'view'])->name('support.ticket-view');
    Route::get('/support/create/{dept}',[App\Http\Controllers\Mahasiswa\Pages\SupportController::class, 'create'])->name('support.ticket-create');
    Route::post('/support/create/store',[App\Http\Controllers\Mahasiswa\Pages\SupportController::class, 'store'])->name('support.ticket-store');
    Route::post('/support/create/store-reply/{code}',[App\Http\Controllers\Mahasiswa\Pages\SupportController::class, 'storeReply'])->name('support.ticket-store-reply');

    // PRIVATE FUNCTION => TUGAS KULIAH
    Route::get('/tugas-kuliah',[App\Http\Controllers\Mahasiswa\Pages\StudentTaskController::class, 'index'])->name('akademik.tugas-index');
    Route::get('/tugas-kuliah/{code}/view',[App\Http\Controllers\Mahasiswa\Pages\StudentTaskController::class, 'view'])->name('akademik.tugas-view');
    Route::post('/tugas-kuliah/{code}/store',[App\Http\Controllers\Mahasiswa\Pages\StudentTaskController::class, 'store'])->name('akademik.tugas-store');


    // AJAX ASYNC
    Route::get('/ajax/getTicketLastReply/{code}',[App\Http\Controllers\Mahasiswa\Pages\SupportController::class, 'AjaxLastReply'])->name('ajax.support.ticket-last-reply');

    Route::get('/ajax/getTagihan',[App\Http\Controllers\Mahasiswa\HomeController::class, 'tagihanIndexAjax'])->name('ajax-tagihan-index');
});
