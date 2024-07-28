<?php

use Illuminate\Support\Facades\Route;

// HAK AKSES WEB ADMINISTRATOR
Route::group(['prefix' => 'web-admin', 'middleware' => ['user-access:Web Administrator'], 'as' => 'web-admin.'],function(){
    // GLOBAL MENU AUTHENTIKASI

    // GLOBAL ROUTE
    require __DIR__.'/route-global.php';

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

        // MENU KHUSUS ATTRIBUTE SYSTEM => DATA WEB SETTINGS
        Route::get('/system/setting',[App\Http\Controllers\Core\WebSettingController::class, 'index'])->name('system.setting-index');
        Route::patch('/system/setting/update',[App\Http\Controllers\Core\WebSettingController::class, 'update'])->name('system.setting-update');
        Route::get('/system/database/export',[App\Http\Controllers\Core\WebSettingController::class, 'databaseExport'])->name('system.database-export');
        Route::post('/system/database/import',[App\Http\Controllers\Core\WebSettingController::class, 'databaseImport'])->name('system.database-import');
        Route::post('/system/update/check',[App\Http\Controllers\Core\WebSettingController::class, 'updateCheck'])->name('system.website-check');
        Route::post('/system/update/perform',[App\Http\Controllers\Core\WebSettingController::class, 'updatePerform'])->name('system.website-update');


    });


});
