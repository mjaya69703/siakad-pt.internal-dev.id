<?php

use Illuminate\Support\Facades\Route;
use Rap2hpoutre\FastExcel\FastExcel;
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

// ERROR PAGE
Route::get('/', [App\Http\Controllers\Root\HomeController::class, 'index'])->name('root.home-index');
Route::get('/advice', [App\Http\Controllers\Root\HomeController::class, 'adviceIndex'])->name('root.home-advice');
Route::get('/admission/{slug}', [App\Http\Controllers\Root\HomeController::class, 'prodiIndex'])->name('root.home-prodi');
Route::post('/advice/store', [App\Http\Controllers\Root\HomeController::class, 'adviceStore'])->name('root.home-advice-store');
Route::get('/error/verify', [App\Http\Controllers\Root\ErrorController::class, 'ErrorVerify'])->name('error.verify');
Route::get('/error/access', [App\Http\Controllers\Root\ErrorController::class, 'ErrorAccess'])->name('error.access');
Route::get('/error/notfound', [App\Http\Controllers\Root\ErrorController::class, 'ErrorNotFound'])->name('error.notfound');

// Route::get('/', function () {
//     return view('base.base-auth-index');
//     // return view('base.panel.base-panel-content');
// });
    Route::get('/dev', function () {
        return view('base.base-root-index');
        // return view('base.panel.base-panel-content');
    });

// Route::get('/', [App\Http\Controllers\Root\HomeController::class, 'index'])->name('root.root-index');

Route::middleware(['guest'])->group(function () {

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


// HAK AKSES WEB ADMINISTRATOR
Route::group(['prefix' => 'web-admin', 'middleware' => ['user-access:Web Administrator'], 'as' => 'web-admin.'],function(){
    // GLOBAL MENU AUTHENTIKASI
    Route::get('/signout',[App\Http\Controllers\Admin\AuthController::class, 'AuthSignOutPost'])->name('auth-signout-post');

    // GLOBAL MENU
    Route::get('/home',[App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home-index');
    Route::get('/home/ajax/GetMhsGender',[App\Http\Controllers\Admin\HomeController::class, 'getMhsGender'])->name('home.ajax-mhs-gender');
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


    Route::get('/services/convert/export-student',[App\Http\Controllers\Services\Convert\ExportController::class, 'exportStudent'])->name('services.convert.export-student');
    Route::get('/services/convert/export-users',[App\Http\Controllers\Services\Convert\ExportController::class, 'exportUsers'])->name('services.convert.export-users');
    Route::post('/services/convert/import-users',[App\Http\Controllers\Services\Convert\ImportController::class, 'importUsers'])->name('services.convert.import-users');
    Route::post('/services/convert/import-student',[App\Http\Controllers\Services\Convert\ImportController::class, 'importStudent'])->name('services.convert.import-student');

    // STATUS ACTIVE BOLEH AKSES INI
    Route::middleware(['is-active:1'])->group(function () {

        // ADMIN AUTHORITY

        // MENU KHUSUS DATA PENGGUNA => DATA ADMIN
        Route::get('/workers/data-admin',[App\Http\Controllers\Admin\Pages\WorkersController::class, 'indexAdmin'])->name('workers.admin-index');
        Route::get('/workers/data-admin/create',[App\Http\Controllers\Admin\Pages\WorkersController::class, 'createAdmin'])->name('workers.admin-create');
        Route::get('/workers/data-admin/{code}/edit',[App\Http\Controllers\Admin\Pages\WorkersController::class, 'editAdmin'])->name('workers.admin-edit');
        Route::post('/workers/data-admin/store',[App\Http\Controllers\Admin\Pages\WorkersController::class, 'storeAdmin'])->name('workers.admin-store');
        Route::patch('/workers/data-admin/{code}/update',[App\Http\Controllers\Admin\Pages\WorkersController::class, 'updateAdmin'])->name('workers.admin-update');
        Route::delete('/workers/data-admin/{code}/destroy',[App\Http\Controllers\Admin\Pages\WorkersController::class, 'destroyAdmin'])->name('workers.admin-destroy');
        // MENU KHUSUS DATA PENGGUNA => DATA STAFF
        Route::get('/workers/data-staff',[App\Http\Controllers\Admin\Pages\WorkersController::class, 'indexWorkers'])->name('workers.staff-index');
        Route::get('/workers/data-staff/create',[App\Http\Controllers\Admin\Pages\WorkersController::class, 'createWorkers'])->name('workers.staff-create');
        Route::get('/workers/data-staff/{code}/edit',[App\Http\Controllers\Admin\Pages\WorkersController::class, 'editWorkers'])->name('workers.staff-edit');
        Route::post('/workers/data-staff/store',[App\Http\Controllers\Admin\Pages\WorkersController::class, 'storeWorkers'])->name('workers.staff-store');
        Route::patch('/workers/data-staff/{code}/update',[App\Http\Controllers\Admin\Pages\WorkersController::class, 'updateWorkers'])->name('workers.staff-update');
        Route::delete('/workers/data-staff/{code}/destroy',[App\Http\Controllers\Admin\Pages\WorkersController::class, 'destroyWorkers'])->name('workers.staff-destroy');
        // MENU KHUSUS DATA PENGGUNA => DATA DOSEN
        Route::get('/workers/data-dosen',[App\Http\Controllers\Admin\Pages\WorkersController::class, 'indexLecture'])->name('workers.lecture-index');
        Route::get('/workers/data-dosen/create',[App\Http\Controllers\Admin\Pages\WorkersController::class, 'createLecture'])->name('workers.lecture-create');
        Route::get('/workers/data-dosen/{code}/edit',[App\Http\Controllers\Admin\Pages\WorkersController::class, 'editLecture'])->name('workers.lecture-edit');
        Route::post('/workers/data-dosen/store',[App\Http\Controllers\Admin\Pages\WorkersController::class, 'storeLecture'])->name('workers.lecture-store');
        Route::patch('/workers/data-dosen/{code}/update',[App\Http\Controllers\Admin\Pages\WorkersController::class, 'updateLecture'])->name('workers.lecture-update');
        Route::delete('/workers/data-dosen/{code}/destroy',[App\Http\Controllers\Admin\Pages\WorkersController::class, 'destroyLecture'])->name('workers.lecture-destroy');
        // MENU KHUSUS DATA PENGGUNA => DATA MAHASISWA
        Route::get('/workers/data-mahasiswa',[App\Http\Controllers\Admin\Pages\WorkersController::class, 'indexStudent'])->name('workers.student-index');
        Route::get('/workers/data-mahasiswa/create',[App\Http\Controllers\Admin\Pages\WorkersController::class, 'createStudent'])->name('workers.student-create');
        Route::get('/workers/data-mahasiswa/{code}/edit',[App\Http\Controllers\Admin\Pages\WorkersController::class, 'editStudent'])->name('workers.student-edit');
        Route::post('/workers/data-mahasiswa/store',[App\Http\Controllers\Admin\Pages\WorkersController::class, 'storeStudent'])->name('workers.student-store');
        Route::patch('/workers/data-mahasiswa/{code}/update',[App\Http\Controllers\Admin\Pages\WorkersController::class, 'updateStudent'])->name('workers.student-update');
        Route::delete('/workers/data-mahasiswa/{code}/destroy',[App\Http\Controllers\Admin\Pages\WorkersController::class, 'destroyStudent'])->name('workers.student-destroy');

        // MENU KHUSUS DATA MASTER => DATA FAKULTAS
        Route::get('/master/data-fakultas',[App\Http\Controllers\Admin\Pages\Core\FakultasController::class, 'index'])->name('master.fakultas-index');
        Route::post('/master/data-fakultas/store',[App\Http\Controllers\Admin\Pages\Core\FakultasController::class, 'store'])->name('master.fakultas-store');
        Route::patch('/master/data-fakultas/{code}/update',[App\Http\Controllers\Admin\Pages\Core\FakultasController::class, 'update'])->name('master.fakultas-update');
        Route::delete('/master/data-fakultas/{code}/destroy',[App\Http\Controllers\Admin\Pages\Core\FakultasController::class, 'destroy'])->name('master.fakultas-destroy');
        // MENU KHUSUS DATA MASTER => DATA PROGRAM STUDI
        Route::get('/master/data-pstudi',[App\Http\Controllers\Admin\Pages\Core\ProgramStudiController::class, 'index'])->name('master.pstudi-index');
        Route::post('/master/data-pstudi/store',[App\Http\Controllers\Admin\Pages\Core\ProgramStudiController::class, 'store'])->name('master.pstudi-store');
        Route::patch('/master/data-pstudi/{code}/update',[App\Http\Controllers\Admin\Pages\Core\ProgramStudiController::class, 'update'])->name('master.pstudi-update');
        Route::delete('/master/data-pstudi/{code}/destroy',[App\Http\Controllers\Admin\Pages\Core\ProgramStudiController::class, 'destroy'])->name('master.pstudi-destroy');
        // MENU KHUSUS DATA MASTER => DATA TAHUN AKADEMIK
        Route::get('/master/data-taka',[App\Http\Controllers\Admin\Pages\Core\TahunAkademikController::class, 'index'])->name('master.taka-index');
        Route::post('/master/data-taka/store',[App\Http\Controllers\Admin\Pages\Core\TahunAkademikController::class, 'store'])->name('master.taka-store');
        Route::patch('/master/data-taka/{code}/update',[App\Http\Controllers\Admin\Pages\Core\TahunAkademikController::class, 'update'])->name('master.taka-update');
        Route::delete('/master/data-taka/{code}/destroy',[App\Http\Controllers\Admin\Pages\Core\TahunAkademikController::class, 'destroy'])->name('master.taka-destroy');
        // MENU KHUSUS DATA MASTER => DATA PROGRAM KULIAH
        Route::get('/master/data-proku',[App\Http\Controllers\Admin\Pages\Core\ProgramKuliahController::class, 'index'])->name('master.proku-index');
        Route::post('/master/data-proku/store',[App\Http\Controllers\Admin\Pages\Core\ProgramKuliahController::class, 'store'])->name('master.proku-store');
        Route::patch('/master/data-proku/{code}/update',[App\Http\Controllers\Admin\Pages\Core\ProgramKuliahController::class, 'update'])->name('master.proku-update');
        Route::delete('/master/data-proku/{code}/destroy',[App\Http\Controllers\Admin\Pages\Core\ProgramKuliahController::class, 'destroy'])->name('master.proku-destroy');
        // MENU KHUSUS DATA MASTER => DATA KELAS
        Route::get('/master/data-kelas',[App\Http\Controllers\Admin\Pages\Core\KelasController::class, 'index'])->name('master.kelas-index');
        Route::get('/master/data-kelas/{code}/view/mahasiswa',[App\Http\Controllers\Admin\Pages\Core\KelasController::class, 'viewMahasiswa'])->name('master.kelas-mahasiswa-view');
        Route::post('/master/data-kelas/store',[App\Http\Controllers\Admin\Pages\Core\KelasController::class, 'store'])->name('master.kelas-store');
        Route::post('/master/data-kelas/{code}/cetak/mahasiswa',[App\Http\Controllers\Admin\Pages\Core\KelasController::class, 'cetakMahasiswa'])->name('master.kelas-mahasiswa-cetak');
        Route::patch('/master/data-kelas/{code}/update',[App\Http\Controllers\Admin\Pages\Core\KelasController::class, 'update'])->name('master.kelas-update');
        Route::delete('/master/data-kelas/{code}/destroy',[App\Http\Controllers\Admin\Pages\Core\KelasController::class, 'destroy'])->name('master.kelas-destroy');
        // MENU KHUSUS DATA MASTER => DATA KURIKULUM
        Route::get('/master/data-kurikulum',[App\Http\Controllers\Admin\Pages\Core\KurikulumController::class, 'index'])->name('master.kurikulum-index');
        Route::get('/master/data-kurikulum/{code}/view/',[App\Http\Controllers\Admin\Pages\Core\KurikulumController::class, 'view'])->name('master.kurikulum-view');
        Route::post('/master/data-kurikulum/store',[App\Http\Controllers\Admin\Pages\Core\KurikulumController::class, 'store'])->name('master.kurikulum-store');
        Route::patch('/master/data-kurikulum/{code}/update',[App\Http\Controllers\Admin\Pages\Core\KurikulumController::class, 'update'])->name('master.kurikulum-update');
        Route::delete('/master/data-kurikulum/{code}/destroy',[App\Http\Controllers\Admin\Pages\Core\KurikulumController::class, 'destroy'])->name('master.kurikulum-destroy');
        // MENU KHUSUS DATA MASTER => DATA MATAKULIAH
        Route::get('/master/data-matkul',[App\Http\Controllers\Admin\Pages\Core\MataKuliahController::class, 'index'])->name('master.matkul-index');
        Route::get('/master/data-matkul/create',[App\Http\Controllers\Admin\Pages\Core\MataKuliahController::class, 'create'])->name('master.matkul-create');
        Route::post('/master/data-matkul/store',[App\Http\Controllers\Admin\Pages\Core\MataKuliahController::class, 'store'])->name('master.matkul-store');
        Route::patch('/master/data-matkul/{code}/update',[App\Http\Controllers\Admin\Pages\Core\MataKuliahController::class, 'update'])->name('master.matkul-update');
        Route::delete('/master/data-matkul/{code}/destroy',[App\Http\Controllers\Admin\Pages\Core\MataKuliahController::class, 'destroy'])->name('master.matkul-destroy');
        // MENU KHUSUS DATA MASTER => DATA JADWAL KULIAH
        Route::get('/master/data-jadkul',[App\Http\Controllers\Admin\Pages\Core\JadwalKuliahController::class, 'index'])->name('master.jadkul-index');
        Route::get('/master/data-jadkul/{code}/viewAbsen',[App\Http\Controllers\Admin\Pages\Core\JadwalKuliahController::class, 'viewAbsen'])->name('master.jadkul-absen-view');
        Route::get('/master/data-jadkul/create',[App\Http\Controllers\Admin\Pages\Core\JadwalKuliahController::class, 'create'])->name('master.jadkul-create');
        Route::post('/master/data-jadkul/store',[App\Http\Controllers\Admin\Pages\Core\JadwalKuliahController::class, 'store'])->name('master.jadkul-store');
        Route::post('/master/data-jadkul/{code}/cetakAbsen',[App\Http\Controllers\Admin\Pages\Core\JadwalKuliahController::class, 'cetakAbsen'])->name('master.jadkul-absen-cetak');
        Route::patch('/master/data-jadkul/{code}/updateAbsen',[App\Http\Controllers\Admin\Pages\Core\JadwalKuliahController::class, 'updateAbsen'])->name('master.jadkul-absen-update');
        Route::patch('/master/data-jadkul/{code}/update',[App\Http\Controllers\Admin\Pages\Core\JadwalKuliahController::class, 'update'])->name('master.jadkul-update');
        Route::delete('/master/data-jadkul/{code}/destroy',[App\Http\Controllers\Admin\Pages\Core\JadwalKuliahController::class, 'destroy'])->name('master.jadkul-destroy');


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




        // MENU KHUSUS FINANCE DEPARTEMENT => DATA TAGIHAN
        Route::get('/finance/data-tagihan',[App\Http\Controllers\Admin\Pages\Finance\GenerateTagihanController::class, 'index'])->name('finance.tagihan-index');
        Route::get('/finance/data-tagihan/create',[App\Http\Controllers\Admin\Pages\Finance\GenerateTagihanController::class, 'create'])->name('finance.tagihan-create');
        Route::post('/finance/data-tagihan/store',[App\Http\Controllers\Admin\Pages\Finance\GenerateTagihanController::class, 'store'])->name('finance.tagihan-store');
        Route::patch('/finance/data-tagihan/{code}/update',[App\Http\Controllers\Admin\Pages\Finance\GenerateTagihanController::class, 'update'])->name('finance.tagihan-update');
        Route::delete('/finance/data-tagihan/{code}/destroy',[App\Http\Controllers\Admin\Pages\Finance\GenerateTagihanController::class, 'destroy'])->name('finance.tagihan-destroy');
        // MENU KHUSUS FINANCE DEPARTEMENT => DATA PEMBAYARAN
        Route::get('/finance/data-pembayaran',[App\Http\Controllers\Admin\Pages\Finance\PembayaranController::class, 'index'])->name('finance.pembayaran-index');
        Route::get('/finance/data-pembayaran/create',[App\Http\Controllers\Admin\Pages\Finance\PembayaranController::class, 'create'])->name('finance.pembayaran-create');
        Route::post('/finance/data-pembayaran/store',[App\Http\Controllers\Admin\Pages\Finance\PembayaranController::class, 'store'])->name('finance.pembayaran-store');
        Route::patch('/finance/data-pembayaran/{code}/update',[App\Http\Controllers\Admin\Pages\Finance\PembayaranController::class, 'update'])->name('finance.pembayaran-update');
        Route::delete('/finance/data-pembayaran/{code}/destroy',[App\Http\Controllers\Admin\Pages\Finance\PembayaranController::class, 'destroy'])->name('finance.pembayaran-destroy');
        // MENU KHUSUS FINANCE DEPARTEMENT => DATA KEUANGAN
        Route::get('/finance/data-keuangan',[App\Http\Controllers\Admin\Pages\Finance\BalanceController::class, 'index'])->name('finance.keuangan-index');
        Route::post('/finance/data-keuangan/store',[App\Http\Controllers\Admin\Pages\Finance\BalanceController::class, 'store'])->name('finance.keuangan-store');
        Route::patch('/finance/data-keuangan/{code}/update',[App\Http\Controllers\Admin\Pages\Finance\BalanceController::class, 'update'])->name('finance.keuangan-update');
        Route::delete('/finance/data-keuangan/{code}/destroy',[App\Http\Controllers\Admin\Pages\Finance\BalanceController::class, 'destroy'])->name('finance.keuangan-destroy');
        // MENU KHUSUS FINANCE DEPARTEMENT => DATA APPROVAL ABSENSI KARYAWAN
        Route::get('/finance/approval-absen',[App\Http\Controllers\Admin\Pages\Finance\ApprovalController::class, 'indexAbsen'])->name('approval.absen-index');
        Route::get('/finance/approval-absen/approved',[App\Http\Controllers\Admin\Pages\Finance\ApprovalController::class, 'indexAbsenApproved'])->name('approval.absen-index-approved');
        Route::get('/finance/approval-absen/rejected',[App\Http\Controllers\Admin\Pages\Finance\ApprovalController::class, 'indexAbsenRejected'])->name('approval.absen-index-rejected');
        Route::patch('/finance/approval-absen/{code}/update/accept',[App\Http\Controllers\Admin\Pages\Finance\ApprovalController::class, 'updateAbsenAccept'])->name('approval.absen-update-accept');
        Route::patch('/finance/approval-absen/{code}/update/reject',[App\Http\Controllers\Admin\Pages\Finance\ApprovalController::class, 'updateAbsenReject'])->name('approval.absen-update-reject');

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

// HAK AKSES DEPARTEMENT FINANCE
Route::group(['prefix' => 'finance', 'middleware' => ['user-access:Departement Finance'], 'as' => 'finance.'],function(){
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
// HAK AKSES DEPARTEMENT ACADEMIC
Route::group(['prefix' => 'academic', 'middleware' => ['user-access:Departement Academic'], 'as' => 'academic.'],function(){
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
        // STATUS ACTIVE BOLEH AKSES INI
    Route::middleware(['is-active:1'])->group(function () {

        // MENU KHUSUS DATA PENGGUNA => DATA MAHASISWA
        Route::get('/data-mahasiswa',[App\Http\Controllers\Admin\Pages\WorkersController::class, 'indexStudent'])->name('workers.student-index');
        Route::get('/data-mahasiswa/create',[App\Http\Controllers\Admin\Pages\WorkersController::class, 'createStudent'])->name('workers.student-create');
        Route::get('/data-mahasiswa/{code}/edit',[App\Http\Controllers\Admin\Pages\WorkersController::class, 'editStudent'])->name('workers.student-edit');
        Route::post('/data-mahasiswa/store',[App\Http\Controllers\Admin\Pages\WorkersController::class, 'storeStudent'])->name('workers.student-store');
        Route::patch('/data-mahasiswa/{code}/update',[App\Http\Controllers\Admin\Pages\WorkersController::class, 'updateStudent'])->name('workers.student-update');
        Route::delete('/data-mahasiswa/{code}/destroy',[App\Http\Controllers\Admin\Pages\WorkersController::class, 'destroyStudent'])->name('workers.student-destroy');

        // MENU KHUSUS DATA MASTER => DATA KELAS
        Route::get('/master/data-kelas',[App\Http\Controllers\Admin\Pages\Core\KelasController::class, 'index'])->name('master.kelas-index');
        Route::get('/master/data-kelas/{code}/view/mahasiswa',[App\Http\Controllers\Admin\Pages\Core\KelasController::class, 'viewMahasiswa'])->name('master.kelas-mahasiswa-view');
        Route::post('/master/data-kelas/store',[App\Http\Controllers\Admin\Pages\Core\KelasController::class, 'store'])->name('master.kelas-store');
        Route::post('/master/data-kelas/{code}/cetak/mahasiswa',[App\Http\Controllers\Admin\Pages\Core\KelasController::class, 'cetakMahasiswa'])->name('master.kelas-mahasiswa-cetak');
        Route::patch('/master/data-kelas/{code}/update',[App\Http\Controllers\Admin\Pages\Core\KelasController::class, 'update'])->name('master.kelas-update');
        Route::delete('/master/data-kelas/{code}/destroy',[App\Http\Controllers\Admin\Pages\Core\KelasController::class, 'destroy'])->name('master.kelas-destroy');
        // MENU KHUSUS DATA MASTER => DATA KURIKULUM
        Route::get('/master/data-kurikulum',[App\Http\Controllers\Admin\Pages\Core\KurikulumController::class, 'index'])->name('master.kurikulum-index');
        Route::get('/master/data-kurikulum/{code}/view/',[App\Http\Controllers\Admin\Pages\Core\KurikulumController::class, 'view'])->name('master.kurikulum-view');
        Route::post('/master/data-kurikulum/store',[App\Http\Controllers\Admin\Pages\Core\KurikulumController::class, 'store'])->name('master.kurikulum-store');
        Route::patch('/master/data-kurikulum/{code}/update',[App\Http\Controllers\Admin\Pages\Core\KurikulumController::class, 'update'])->name('master.kurikulum-update');
        Route::delete('/master/data-kurikulum/{code}/destroy',[App\Http\Controllers\Admin\Pages\Core\KurikulumController::class, 'destroy'])->name('master.kurikulum-destroy');
        // MENU KHUSUS DATA MASTER => DATA MATAKULIAH
        Route::get('/master/data-matkul',[App\Http\Controllers\Admin\Pages\Core\MataKuliahController::class, 'index'])->name('master.matkul-index');
        Route::get('/master/data-matkul/create',[App\Http\Controllers\Admin\Pages\Core\MataKuliahController::class, 'create'])->name('master.matkul-create');
        Route::post('/master/data-matkul/store',[App\Http\Controllers\Admin\Pages\Core\MataKuliahController::class, 'store'])->name('master.matkul-store');
        Route::patch('/master/data-matkul/{code}/update',[App\Http\Controllers\Admin\Pages\Core\MataKuliahController::class, 'update'])->name('master.matkul-update');
        Route::delete('/master/data-matkul/{code}/destroy',[App\Http\Controllers\Admin\Pages\Core\MataKuliahController::class, 'destroy'])->name('master.matkul-destroy');
        // MENU KHUSUS DATA MASTER => DATA JADWAL KULIAH
        Route::get('/master/data-jadkul',[App\Http\Controllers\Admin\Pages\Core\JadwalKuliahController::class, 'index'])->name('master.jadkul-index');
        Route::get('/master/data-jadkul/{code}/viewAbsen',[App\Http\Controllers\Admin\Pages\Core\JadwalKuliahController::class, 'viewAbsen'])->name('master.jadkul-absen-view');
        Route::get('/master/data-jadkul/create',[App\Http\Controllers\Admin\Pages\Core\JadwalKuliahController::class, 'create'])->name('master.jadkul-create');
        Route::post('/master/data-jadkul/store',[App\Http\Controllers\Admin\Pages\Core\JadwalKuliahController::class, 'store'])->name('master.jadkul-store');
        Route::post('/master/data-jadkul/{code}/cetakAbsen',[App\Http\Controllers\Admin\Pages\Core\JadwalKuliahController::class, 'cetakAbsen'])->name('master.jadkul-absen-cetak');
        Route::patch('/master/data-jadkul/{code}/updateAbsen',[App\Http\Controllers\Admin\Pages\Core\JadwalKuliahController::class, 'updateAbsen'])->name('master.jadkul-absen-update');
        Route::patch('/master/data-jadkul/{code}/update',[App\Http\Controllers\Admin\Pages\Core\JadwalKuliahController::class, 'update'])->name('master.jadkul-update');
        Route::delete('/master/data-jadkul/{code}/destroy',[App\Http\Controllers\Admin\Pages\Core\JadwalKuliahController::class, 'destroy'])->name('master.jadkul-destroy');

        Route::get('/services/convert/export-student',[App\Http\Controllers\Services\Convert\ExportController::class, 'exportStudent'])->name('services.convert.export-student');
        Route::get('/services/convert/export-users',[App\Http\Controllers\Services\Convert\ExportController::class, 'exportUsers'])->name('services.convert.export-users');
        Route::post('/services/convert/import-users',[App\Http\Controllers\Services\Convert\ImportController::class, 'importUsers'])->name('services.convert.import-users');
        Route::post('/services/convert/import-student',[App\Http\Controllers\Services\Convert\ImportController::class, 'importStudent'])->name('services.convert.import-student');


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

// HAK AKSES DEPARTEMENT SUPPORT
Route::group(['prefix' => 'support', 'middleware' => ['user-access:Departement Support'], 'as' => 'support.'],function(){
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
    Route::get('/data-akademik/kelola-tugas/edit/{code}',[App\Http\Controllers\Dosen\Akademik\StudentTaskController::class, 'edit'])->name('akademik.stask-edit');
    Route::post('/data-akademik/kelola-tugas/store',[App\Http\Controllers\Dosen\Akademik\StudentTaskController::class, 'store'])->name('akademik.stask-store');
    Route::patch('/data-akademik/kelola-tugas/update/{code}',[App\Http\Controllers\Dosen\Akademik\StudentTaskController::class, 'update'])->name('akademik.stask-update');

    // PRIVATE FUNCTION => GRAPHIC AJAX FUNCTION
    Route::get('/services/ajax/graphic/{code}/kepuasan-mengajar',[App\Http\Controllers\Services\Ajax\GraphicController::class, 'getKepuasanMengajar'])->name('services.ajax.graphic.kepuasan-mengajar');


});


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
    Route::get('/support/open',[App\Http\Controllers\Mahasiswa\Pages\SupportController::class, 'open'])->name('support.ticket-open');
    Route::get('/support/view/{code}',[App\Http\Controllers\Mahasiswa\Pages\SupportController::class, 'view'])->name('support.ticket-view');
    Route::get('/support/create/{dept}',[App\Http\Controllers\Mahasiswa\Pages\SupportController::class, 'create'])->name('support.ticket-create');
    Route::post('/support/create/store',[App\Http\Controllers\Mahasiswa\Pages\SupportController::class, 'store'])->name('support.ticket-store');
    Route::post('/support/create/store-reply/{code}',[App\Http\Controllers\Mahasiswa\Pages\SupportController::class, 'storeReply'])->name('support.ticket-store-reply');



    // AJAX ASYNC
    Route::get('/ajax/getTicketLastReply/{code}',[App\Http\Controllers\Mahasiswa\Pages\SupportController::class, 'AjaxLastReply'])->name('ajax.support.ticket-last-reply');

    Route::get('/ajax/getTagihan',[App\Http\Controllers\Mahasiswa\HomeController::class, 'tagihanIndexAjax'])->name('ajax-tagihan-index');
});
