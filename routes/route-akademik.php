<?php

use Illuminate\Support\Facades\Route;

// HAK AKSES DEPARTEMENT ACADEMIC
Route::group(['prefix' => 'academic', 'middleware' => ['user-access:Departement Academic'], 'as' => 'academic.'],function(){

    // GLOBAL ROUTE
    require __DIR__.'/route-global.php';

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

        // SERVICE CONVERT EXPORT - IMPORT
        Route::get('/services/convert/export-student',[App\Http\Controllers\Services\Convert\ExportController::class, 'exportStudent'])->name('services.convert.export-student');
        Route::get('/services/convert/export-users',[App\Http\Controllers\Services\Convert\ExportController::class, 'exportUsers'])->name('services.convert.export-users');
        Route::post('/services/convert/import-users',[App\Http\Controllers\Services\Convert\ImportController::class, 'importUsers'])->name('services.convert.import-users');
        Route::post('/services/convert/import-student',[App\Http\Controllers\Services\Convert\ImportController::class, 'importStudent'])->name('services.convert.import-student');


    });

});
