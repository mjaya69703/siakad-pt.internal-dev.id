<?php

use Illuminate\Support\Facades\Route;

    // MASTER AKADEMIK => TAHUN AKADEMIK
    Route::get('/akademik/tahun-akademik',[App\Http\Controllers\Master\Akademik\TahunAkademikController::class, 'renderTaka'])->name('akademik.taka-render');
    Route::post('/akademik/tahun-akademik',[App\Http\Controllers\Master\Akademik\TahunAkademikController::class, 'handleTaka'])->name('akademik.taka-handle');
    Route::patch('/akademik/tahun-akademik/{code}',[App\Http\Controllers\Master\Akademik\TahunAkademikController::class, 'updateTaka'])->name('akademik.taka-update');
    Route::delete('/akademik/tahun-akademik/{code}',[App\Http\Controllers\Master\Akademik\TahunAkademikController::class, 'deleteTaka'])->name('akademik.taka-delete');

    // MASTER AKADEMIK => PROGRAM STUDI
    Route::get('/akademik/program-studi',[App\Http\Controllers\Master\Akademik\ProgramStudiController::class, 'renderProdi'])->name('akademik.prodi-render');
    Route::post('/akademik/program-studi',[App\Http\Controllers\Master\Akademik\ProgramStudiController::class, 'handleProdi'])->name('akademik.prodi-handle');
    Route::patch('/akademik/program-studi/{code}',[App\Http\Controllers\Master\Akademik\ProgramStudiController::class, 'updateProdi'])->name('akademik.prodi-update');
    Route::delete('/akademik/program-studi/{code}',[App\Http\Controllers\Master\Akademik\ProgramStudiController::class, 'deleteProdi'])->name('akademik.prodi-delete');

    // MASTER AKADEMIK => FAKULTAS
    Route::get('/akademik/fakultas',[App\Http\Controllers\Master\Akademik\FakultasController::class, 'renderFakultas'])->name('akademik.fakultas-render');
    Route::post('/akademik/fakultas',[App\Http\Controllers\Master\Akademik\FakultasController::class, 'handleFakultas'])->name('akademik.fakultas-handle');
    Route::patch('/akademik/fakultas/{code}',[App\Http\Controllers\Master\Akademik\FakultasController::class, 'updateFakultas'])->name('akademik.fakultas-update');
    Route::delete('/akademik/fakultas/{code}',[App\Http\Controllers\Master\Akademik\FakultasController::class, 'deleteFakultas'])->name('akademik.fakultas-delete');

    // MASTER AKADEMIK => KURIKULUM
    Route::get('/akademik/kurikulum',[App\Http\Controllers\Master\Akademik\KurikulumController::class, 'renderKurikulum'])->name('akademik.kurikulum-render');
    Route::post('/akademik/kurikulum',[App\Http\Controllers\Master\Akademik\KurikulumController::class, 'handleKurikulum'])->name('akademik.kurikulum-handle');
    Route::patch('/akademik/kurikulum/{code}',[App\Http\Controllers\Master\Akademik\KurikulumController::class, 'updateKurikulum'])->name('akademik.kurikulum-update');
    Route::delete('/akademik/kurikulum/{code}',[App\Http\Controllers\Master\Akademik\KurikulumController::class, 'deleteKurikulum'])->name('akademik.kurikulum-delete');

    // MASTER PENGGUNA => USERS 
    Route::get('/pengguna/users',[App\Http\Controllers\Master\Pengguna\UsersController::class, 'renderUsers'])->name('pengguna.users-render');
    Route::get('/pengguna/users/{code}/views',[App\Http\Controllers\Master\Pengguna\UsersController::class, 'viewUsers'])->name('pengguna.users-views');
    Route::post('/pengguna/users',[App\Http\Controllers\Master\Pengguna\UsersController::class, 'handleUsers'])->name('pengguna.users-handle');
    Route::patch('/pengguna/users/{code}',[App\Http\Controllers\Master\Pengguna\UsersController::class, 'updateUsers'])->name('pengguna.users-update');
    Route::patch('/pengguna/users/{code}/profile', [App\Http\Controllers\Master\Pengguna\UsersController::class, 'handleProfile'])->name('pengguna.users-profile');
    Route::delete('/pengguna/users/{code}',[App\Http\Controllers\Master\Pengguna\UsersController::class, 'deleteUsers'])->name('pengguna.users-delete');

    // MASTER PENGGUNA => USERS 
    Route::get('/pengguna/dosen',[App\Http\Controllers\Master\Pengguna\DosenController::class, 'renderDosen'])->name('pengguna.dosen-render');
    Route::get('/pengguna/dosen/{code}/views',[App\Http\Controllers\Master\Pengguna\DosenController::class, 'viewDosen'])->name('pengguna.dosen-views');
    Route::post('/pengguna/dosen',[App\Http\Controllers\Master\Pengguna\DosenController::class, 'handleDosen'])->name('pengguna.dosen-handle');
    Route::patch('/pengguna/dosen/{code}',[App\Http\Controllers\Master\Pengguna\DosenController::class, 'updateDosen'])->name('pengguna.dosen-update');
    Route::patch('/pengguna/dosen/{code}/profile', [App\Http\Controllers\Master\Pengguna\DosenController::class, 'handleProfile'])->name('pengguna.dosen-profile');
    Route::delete('/pengguna/dosen/{code}',[App\Http\Controllers\Master\Pengguna\DosenController::class, 'deleteDosen'])->name('pengguna.dosen-delete');

    // MASTER PENGGUNA => MAHASISWA
    Route::get('/pengguna/mahasiswa',[App\Http\Controllers\Master\Pengguna\MahasiswaController::class, 'renderMahasiswa'])->name('pengguna.mahasiswa-render');
    Route::get('/pengguna/mahasiswa/{code}/views',[App\Http\Controllers\Master\Pengguna\MahasiswaController::class, 'viewMahasiswa'])->name('pengguna.mahasiswa-views');
    Route::post('/pengguna/mahasiswa',[App\Http\Controllers\Master\Pengguna\MahasiswaController::class, 'handleMahasiswa'])->name('pengguna.mahasiswa-handle');
    Route::patch('/pengguna/mahasiswa/{code}',[App\Http\Controllers\Master\Pengguna\MahasiswaController::class, 'updateMahasiswa'])->name('pengguna.mahasiswa-update');
    Route::patch('/pengguna/mahasiswa/{code}/profile', [App\Http\Controllers\Master\Pengguna\MahasiswaController::class, 'handleProfile'])->name('pengguna.mahasiswa-profile');
    Route::delete('/pengguna/mahasiswa/{code}',[App\Http\Controllers\Master\Pengguna\MahasiswaController::class, 'deleteMahasiswa'])->name('pengguna.mahasiswa-delete');

    // MASTER PUBLIKASI => KATEGORI
    Route::get('/publikasi/kategori', [App\Http\Controllers\Master\Publikasi\KategoriController::class, 'renderKategori'])->name('publikasi.kategori-render');
    Route::post('/publikasi/kategori', [App\Http\Controllers\Master\Publikasi\KategoriController::class, 'handleKategori'])->name('publikasi.kategori-handle');
    Route::patch('/publikasi/kategori/{code}', [App\Http\Controllers\Master\Publikasi\KategoriController::class, 'updateKategori'])->name('publikasi.kategori-update');
    Route::delete('/publikasi/kategori/{code}', [App\Http\Controllers\Master\Publikasi\KategoriController::class, 'deleteKategori'])->name('publikasi.kategori-delete');

    // MASTER PUBLIKASI => BERITA
    Route::get('/publikasi/berita', [App\Http\Controllers\Master\Publikasi\BeritaController::class, 'renderBerita'])->name('publikasi.berita-render');
    Route::get('/publikasi/berita/{code}/view', [App\Http\Controllers\Master\Publikasi\BeritaController::class, 'viewBerita'])->name('publikasi.berita-view');
    Route::post('/publikasi/berita', [App\Http\Controllers\Master\Publikasi\BeritaController::class, 'handleBerita'])->name('publikasi.berita-handle');
    Route::patch('/publikasi/berita/{code}', [App\Http\Controllers\Master\Publikasi\BeritaController::class, 'updateBerita'])->name('publikasi.berita-update');
    Route::delete('/publikasi/berita/{code}', [App\Http\Controllers\Master\Publikasi\BeritaController::class, 'deleteBerita'])->name('publikasi.berita-delete');

    // MASTER PUBLIKASI => PENGUMUMAN
    Route::get('/publikasi/pengumuman', [App\Http\Controllers\Master\Publikasi\PengumumanController::class, 'renderPengumuman'])->name('publikasi.pengumuman-render');
    Route::get('/publikasi/pengumuman/{code}/view', [App\Http\Controllers\Master\Publikasi\PengumumanController::class, 'viewPengumuman'])->name('publikasi.pengumuman-view');
    Route::post('/publikasi/pengumuman', [App\Http\Controllers\Master\Publikasi\PengumumanController::class, 'handlePengumuman'])->name('publikasi.pengumuman-handle');
    Route::patch('/publikasi/pengumuman/{code}', [App\Http\Controllers\Master\Publikasi\PengumumanController::class, 'updatePengumuman'])->name('publikasi.pengumuman-update');
    Route::delete('/publikasi/pengumuman/{code}', [App\Http\Controllers\Master\Publikasi\PengumumanController::class, 'deletePengumuman'])->name('publikasi.pengumuman-delete');

    // MASTER PUBLIKASI => GALERI
    Route::get('/publikasi/galeri', [App\Http\Controllers\Master\Publikasi\GaleriController::class, 'renderGaleri'])->name('publikasi.galeri-render');
    Route::get('/publikasi/galeri/{code}/view', [App\Http\Controllers\Master\Publikasi\GaleriController::class, 'viewGaleri'])->name('publikasi.galeri-view');
    Route::post('/publikasi/galeri', [App\Http\Controllers\Master\Publikasi\GaleriController::class, 'handleGaleri'])->name('publikasi.galeri-handle');
    Route::patch('/publikasi/galeri/{code}', [App\Http\Controllers\Master\Publikasi\GaleriController::class, 'updateGaleri'])->name('publikasi.galeri-update');
    Route::delete('/publikasi/galeri/{code}', [App\Http\Controllers\Master\Publikasi\GaleriController::class, 'deleteGaleri'])->name('publikasi.galeri-delete');

    // MASTER PUBLIKASI => GALERI FOTO
    Route::post('/publikasi/galeri/{code}/foto', [App\Http\Controllers\Master\Publikasi\GaleriController::class, 'handleFoto'])->name('publikasi.galeri-foto-handle');
    Route::delete('/publikasi/galeri/foto/{code}', [App\Http\Controllers\Master\Publikasi\GaleriController::class, 'deleteFoto'])->name('publikasi.galeri-foto-delete');

    // MASTER PENGATURAN => WEB SETTINGS
    Route::get('/pengaturan/web-settings', [App\Http\Controllers\Master\Pengaturan\WebSettingController::class, 'renderIndex'])->name('pengaturan.web-settings-render');
    Route::patch('/pengaturan/web-settings', [App\Http\Controllers\Master\Pengaturan\WebSettingController::class, 'handleSettings'])->name('pengaturan.web-settings-handle');
    Route::get('/pengaturan/export-settings', [App\Http\Controllers\Master\Pengaturan\WebSettingController::class, 'exportDatabase'])->name('pengaturan.export-database');
    Route::post('/pengaturan/import-settings', [App\Http\Controllers\Master\Pengaturan\WebSettingController::class, 'importDatabase'])->name('pengaturan.import-database');


    // MASTER PENGATURAN => LOG AKTIVITAS
    Route::get('/pengaturan/log-aktivitas', [App\Http\Controllers\Master\Pengaturan\LogAktivitasController::class, 'renderLogAktivitas'])->name('pengaturan.log-aktivitas-render');
    Route::get('/pengaturan/log-aktivitas/{id}/view', [App\Http\Controllers\Master\Pengaturan\LogAktivitasController::class, 'viewLogAktivitas'])->name('pengaturan.log-aktivitas-view');
    Route::get('/pengaturan/log-aktivitas/filter', [App\Http\Controllers\Master\Pengaturan\LogAktivitasController::class, 'filterLogAktivitas'])->name('pengaturan.log-aktivitas-filter');
    Route::delete('/pengaturan/log-aktivitas/{id}', [App\Http\Controllers\Master\Pengaturan\LogAktivitasController::class, 'deleteLogAktivitas'])->name('pengaturan.log-aktivitas-delete');
