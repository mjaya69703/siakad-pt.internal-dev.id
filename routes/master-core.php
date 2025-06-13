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
    
    // MASTER AKADEMIK => MATAKULIAH
    Route::get('/akademik/mata-kuliah',[App\Http\Controllers\Master\Akademik\MataKuliahController::class, 'renderMataKuliah'])->name('akademik.mata-kuliah-render');
    Route::post('/akademik/mata-kuliah',[App\Http\Controllers\Master\Akademik\MataKuliahController::class, 'handleMataKuliah'])->name('akademik.mata-kuliah-handle');
    Route::patch('/akademik/mata-kuliah/{code}',[App\Http\Controllers\Master\Akademik\MataKuliahController::class, 'updateMataKuliah'])->name('akademik.mata-kuliah-update');
    Route::delete('/akademik/mata-kuliah/{code}',[App\Http\Controllers\Master\Akademik\MataKuliahController::class, 'deleteMataKuliah'])->name('akademik.mata-kuliah-delete');
    
    // MASTER AKADEMIK => KELAS
    Route::get('/akademik/kelas',[App\Http\Controllers\Master\Akademik\KelasController::class, 'renderKelas'])->name('akademik.kelas-render');
    Route::post('/akademik/kelas',[App\Http\Controllers\Master\Akademik\KelasController::class, 'handleKelas'])->name('akademik.kelas-handle');
    Route::patch('/akademik/kelas/{code}',[App\Http\Controllers\Master\Akademik\KelasController::class, 'updateKelas'])->name('akademik.kelas-update');
    Route::delete('/akademik/kelas/{code}',[App\Http\Controllers\Master\Akademik\KelasController::class, 'deleteKelas'])->name('akademik.kelas-delete');
    
    // MASTER AKADEMIK => JADWAL KULIAH
    Route::get('/akademik/jadwal-kuliah',[App\Http\Controllers\Master\Akademik\JadwalKuliahController::class, 'renderJadwalKuliah'])->name('akademik.jadwal-kuliah-render');
    Route::post('/akademik/jadwal-kuliah',[App\Http\Controllers\Master\Akademik\JadwalKuliahController::class, 'handleJadwalKuliah'])->name('akademik.jadwal-kuliah-handle');
    Route::patch('/akademik/jadwal-kuliah/{code}',[App\Http\Controllers\Master\Akademik\JadwalKuliahController::class, 'updateJadwalKuliah'])->name('akademik.jadwal-kuliah-update');
    Route::delete('/akademik/jadwal-kuliah/{code}',[App\Http\Controllers\Master\Akademik\JadwalKuliahController::class, 'deleteJadwalKuliah'])->name('akademik.jadwal-kuliah-delete');
    Route::get('akademik/get-waktu-kuliah/{jenis_kelas_id}', [App\Http\Controllers\Master\Akademik\JadwalKuliahController::class, 'getWaktuKuliahByJenisKelas'])->name('akademik.get-waktu-kuliah');

    // MASTER AKADEMIK => JENIS KELAS
    Route::get('/akademik/jenis-kelas',[App\Http\Controllers\Master\Akademik\JenisKelasController::class, 'renderJenisKelas'])->name('akademik.jenis-kelas-render');
    Route::post('/akademik/jenis-kelas',[App\Http\Controllers\Master\Akademik\JenisKelasController::class, 'handleJenisKelas'])->name('akademik.jenis-kelas-handle');
    Route::patch('/akademik/jenis-kelas/{code}',[App\Http\Controllers\Master\Akademik\JenisKelasController::class, 'updateJenisKelas'])->name('akademik.jenis-kelas-update');
    Route::delete('/akademik/jenis-kelas/{code}',[App\Http\Controllers\Master\Akademik\JenisKelasController::class, 'deleteJenisKelas'])->name('akademik.jenis-kelas-delete');
    
    // MASTER AKADEMIK => WAKTU KULIAH
    Route::get('/akademik/waktu-kuliah',[App\Http\Controllers\Master\Akademik\WaktuKuliahController::class, 'renderWaktuKuliah'])->name('akademik.waktu-kuliah-render');
    Route::post('/akademik/waktu-kuliah',[App\Http\Controllers\Master\Akademik\WaktuKuliahController::class, 'handleWaktuKuliah'])->name('akademik.waktu-kuliah-handle');
    Route::patch('/akademik/waktu-kuliah/{code}',[App\Http\Controllers\Master\Akademik\WaktuKuliahController::class, 'updateWaktuKuliah'])->name('akademik.waktu-kuliah-update');
    Route::delete('/akademik/waktu-kuliah/{code}',[App\Http\Controllers\Master\Akademik\WaktuKuliahController::class, 'deleteWaktuKuliah'])->name('akademik.waktu-kuliah-delete');

    // MASTER PMB => PERIODE PENDAFTARAN
    Route::get('/pmb/periode',[App\Http\Controllers\Master\PMB\PeriodePendaftaranController::class, 'renderPeriode'])->name('pmb.periode-render');
    Route::post('/pmb/periode',[App\Http\Controllers\Master\PMB\PeriodePendaftaranController::class, 'handlePeriode'])->name('pmb.periode-handle');
    Route::patch('/pmb/periode/{code}',[App\Http\Controllers\Master\PMB\PeriodePendaftaranController::class, 'updatePeriode'])->name('pmb.periode-update');
    Route::delete('/pmb/periode/{code}',[App\Http\Controllers\Master\PMB\PeriodePendaftaranController::class, 'deletePeriode'])->name('pmb.periode-delete');

    // MASTER PMB => JALUR PENDAFTARAN
    Route::get('/pmb/jalur',[App\Http\Controllers\Master\PMB\JalurPendaftaranController::class, 'renderJalur'])->name('pmb.jalur-render');
    Route::post('/pmb/jalur',[App\Http\Controllers\Master\PMB\JalurPendaftaranController::class, 'handleJalur'])->name('pmb.jalur-handle');
    Route::patch('/pmb/jalur/{code}',[App\Http\Controllers\Master\PMB\JalurPendaftaranController::class, 'updateJalur'])->name('pmb.jalur-update');
    Route::delete('/pmb/jalur/{code}',[App\Http\Controllers\Master\PMB\JalurPendaftaranController::class, 'deleteJalur'])->name('pmb.jalur-delete');
    
    // MASTER PMB => BIAYA PENDAFTARAN
    Route::get('/pmb/biaya',[App\Http\Controllers\Master\PMB\BiayaPendaftaranController::class, 'renderBiaya'])->name('pmb.biaya-render');
    Route::post('/pmb/biaya',[App\Http\Controllers\Master\PMB\BiayaPendaftaranController::class, 'handleBiaya'])->name('pmb.biaya-handle');
    Route::patch('/pmb/biaya/{code}',[App\Http\Controllers\Master\PMB\BiayaPendaftaranController::class, 'updateBiaya'])->name('pmb.biaya-update');
    Route::delete('/pmb/biaya/{code}',[App\Http\Controllers\Master\PMB\BiayaPendaftaranController::class, 'deleteBiaya'])->name('pmb.biaya-delete');
    
    // MASTER PMB => SYARAT PENDAFTARAN
    Route::get('/pmb/syarat',[App\Http\Controllers\Master\PMB\SyaratPendaftaranController::class, 'renderSyarat'])->name('pmb.syarat-render');
    Route::post('/pmb/syarat',[App\Http\Controllers\Master\PMB\SyaratPendaftaranController::class, 'handleSyarat'])->name('pmb.syarat-handle');
    Route::patch('/pmb/syarat/{code}',[App\Http\Controllers\Master\PMB\SyaratPendaftaranController::class, 'updateSyarat'])->name('pmb.syarat-update');
    Route::delete('/pmb/syarat/{code}',[App\Http\Controllers\Master\PMB\SyaratPendaftaranController::class, 'deleteSyarat'])->name('pmb.syarat-delete');
    
    // MASTER PMB => GELOMBANG PENDAFTARAN
    Route::get('/pmb/gelombang',[App\Http\Controllers\Master\PMB\GelombangPendaftaranController::class, 'renderGelombang'])->name('pmb.gelombang-render');
    Route::post('/pmb/gelombang',[App\Http\Controllers\Master\PMB\GelombangPendaftaranController::class, 'handleGelombang'])->name('pmb.gelombang-handle');
    Route::patch('/pmb/gelombang/{code}',[App\Http\Controllers\Master\PMB\GelombangPendaftaranController::class, 'updateGelombang'])->name('pmb.gelombang-update');
    Route::delete('/pmb/gelombang/{code}',[App\Http\Controllers\Master\PMB\GelombangPendaftaranController::class, 'deleteGelombang'])->name('pmb.gelombang-delete');
    
    // MASTER PMB => JADWAL PMB
    Route::get('/pmb/jadwal',[App\Http\Controllers\Master\PMB\JadwalPMBController::class, 'renderJadwal'])->name('pmb.jadwal-render');
    Route::post('/pmb/jadwal',[App\Http\Controllers\Master\PMB\JadwalPMBController::class, 'handleJadwal'])->name('pmb.jadwal-handle');
    Route::patch('/pmb/jadwal/{code}',[App\Http\Controllers\Master\PMB\JadwalPMBController::class, 'updateJadwal'])->name('pmb.jadwal-update');
    Route::delete('/pmb/jadwal/{code}',[App\Http\Controllers\Master\PMB\JadwalPMBController::class, 'deleteJadwal'])->name('pmb.jadwal-delete');
    
    // MASTER PMB => PENDAFTAR
    Route::get('/pmb/pendaftar', [App\Http\Controllers\Master\PMB\PendaftarController::class, 'renderPendaftar'])->name('pmb.pendaftar-render');
    Route::post('/pmb/pendaftar', [App\Http\Controllers\Master\PMB\PendaftarController::class, 'handlePendaftar'])->name('pmb.pendaftar-handle');
    Route::patch('/pmb/pendaftar/{code}', [App\Http\Controllers\Master\PMB\PendaftarController::class, 'updatePendaftar'])->name('pmb.pendaftar-update');
    Route::delete('/pmb/pendaftar/{code}', [App\Http\Controllers\Master\PMB\PendaftarController::class, 'deletePendaftar'])->name('pmb.pendaftar-delete');
    Route::get('/pmb/pendaftar/{code}', [App\Http\Controllers\Master\PMB\PendaftarController::class, 'renderDetail'])->name('pmb.pendaftar-detail');
    Route::post('/pmb/pendaftar/{code}/dokumen', [App\Http\Controllers\Master\PMB\PendaftarController::class, 'handleDokumen'])->name('pmb.pendaftar-dokumen-handle');
    Route::patch('/pmb/pendaftar/{code}/validasi', [App\Http\Controllers\Master\PMB\PendaftarController::class, 'validasiDokumen'])->name('pmb.pendaftar-validasi');
    Route::get('/pmb/pendaftar/export/excel', [App\Http\Controllers\Master\PMB\PendaftarController::class, 'exportPendaftarExcel'])->name('pmb.pendaftar-export-excel');
    Route::get('/pmb/pendaftar/export/pdf', [App\Http\Controllers\Master\PMB\PendaftarController::class, 'exportPendaftarPDF'])->name('pmb.pendaftar-export-pdf');
    Route::post('/pmb/pendaftar/batch/validasi', [App\Http\Controllers\Master\PMB\PendaftarController::class, 'batchValidasiDokumen'])->name('pmb.pendaftar-batch-validasi');
    Route::post('/pmb/pendaftar/batch/status', [App\Http\Controllers\Master\PMB\PendaftarController::class, 'batchUpdateStatus'])->name('pmb.pendaftar-batch-status');

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

    // MASTER INFRASTRUKTUR => GEDUNG
    Route::get('/infrastruktur/gedung', [App\Http\Controllers\Master\Infrastruktur\GedungController::class, 'renderGedung'])->name('infrastruktur.gedung-render');
    Route::post('/infrastruktur/gedung', [App\Http\Controllers\Master\Infrastruktur\GedungController::class, 'handleGedung'])->name('infrastruktur.gedung-handle');
    Route::patch('/infrastruktur/gedung/{code}', [App\Http\Controllers\Master\Infrastruktur\GedungController::class, 'updateGedung'])->name('infrastruktur.gedung-update');
    Route::delete('/infrastruktur/gedung/{code}', [App\Http\Controllers\Master\Infrastruktur\GedungController::class, 'deleteGedung'])->name('infrastruktur.gedung-delete');

    // MASTER INFRASTRUKTUR => RUANG
    Route::get('/infrastruktur/ruang', [App\Http\Controllers\Master\Infrastruktur\RuangController::class, 'renderRuang'])->name('infrastruktur.ruang-render');
    Route::post('/infrastruktur/ruang', [App\Http\Controllers\Master\Infrastruktur\RuangController::class, 'handleRuang'])->name('infrastruktur.ruang-handle');
    Route::patch('/infrastruktur/ruang/{code}', [App\Http\Controllers\Master\Infrastruktur\RuangController::class, 'updateRuang'])->name('infrastruktur.ruang-update');
    Route::delete('/infrastruktur/ruang/{code}', [App\Http\Controllers\Master\Infrastruktur\RuangController::class, 'deleteRuang'])->name('infrastruktur.ruang-delete');

    // MASTER INFRASTRUKTUR => KATEGORI BARANG
    Route::get('/infrastruktur/kategori-barang', [App\Http\Controllers\Master\Infrastruktur\KategoriBarangController::class, 'renderKategoriBarang'])->name('infrastruktur.kategori-barang-render');
    Route::post('/infrastruktur/kategori-barang', [App\Http\Controllers\Master\Infrastruktur\KategoriBarangController::class, 'handleKategoriBarang'])->name('infrastruktur.kategori-barang-handle');
    Route::patch('/infrastruktur/kategori-barang/{code}', [App\Http\Controllers\Master\Infrastruktur\KategoriBarangController::class, 'updateKategoriBarang'])->name('infrastruktur.kategori-barang-update');
    Route::delete('/infrastruktur/kategori-barang/{code}', [App\Http\Controllers\Master\Infrastruktur\KategoriBarangController::class, 'deleteKategoriBarang'])->name('infrastruktur.kategori-barang-delete');

    // MASTER INFRASTRUKTUR => BARANG
    Route::get('/infrastruktur/barang', [App\Http\Controllers\Master\Infrastruktur\BarangController::class, 'renderBarang'])->name('infrastruktur.barang-render');
    Route::post('/infrastruktur/barang', [App\Http\Controllers\Master\Infrastruktur\BarangController::class, 'handleBarang'])->name('infrastruktur.barang-handle');
    Route::patch('/infrastruktur/barang/{code}', [App\Http\Controllers\Master\Infrastruktur\BarangController::class, 'updateBarang'])->name('infrastruktur.barang-update');
    Route::delete('/infrastruktur/barang/{code}', [App\Http\Controllers\Master\Infrastruktur\BarangController::class, 'deleteBarang'])->name('infrastruktur.barang-delete');

    // MASTER INFRASTRUKTUR => MUTASI BARANG
    Route::get('/infrastruktur/mutasi-barang', [App\Http\Controllers\Master\Infrastruktur\MutasiBarangController::class, 'renderMutasiBarang'])->name('infrastruktur.mutasi-barang-render');
    Route::post('/infrastruktur/mutasi-barang', [App\Http\Controllers\Master\Infrastruktur\MutasiBarangController::class, 'handleMutasiBarang'])->name('infrastruktur.mutasi-barang-handle');
    Route::patch('/infrastruktur/mutasi-barang/{code}', [App\Http\Controllers\Master\Infrastruktur\MutasiBarangController::class, 'updateMutasiBarang'])->name('infrastruktur.mutasi-barang-update');
    Route::delete('/infrastruktur/mutasi-barang/{code}', [App\Http\Controllers\Master\Infrastruktur\MutasiBarangController::class, 'deleteMutasiBarang'])->name('infrastruktur.mutasi-barang-delete');

    // MASTER INFRASTRUKTUR => PENGADAAN BARANG
    Route::get('/infrastruktur/pengadaan-barang', [App\Http\Controllers\Master\Infrastruktur\PengadaanBarangController::class, 'renderPengadaanBarang'])->name('infrastruktur.pengadaan-barang-render');
    Route::post('/infrastruktur/pengadaan-barang', [App\Http\Controllers\Master\Infrastruktur\PengadaanBarangController::class, 'handlePengadaanBarang'])->name('infrastruktur.pengadaan-barang-handle');
    Route::patch('/infrastruktur/pengadaan-barang/{code}', [App\Http\Controllers\Master\Infrastruktur\PengadaanBarangController::class, 'updatePengadaanBarang'])->name('infrastruktur.pengadaan-barang-update');
    Route::delete('/infrastruktur/pengadaan-barang/{code}', [App\Http\Controllers\Master\Infrastruktur\PengadaanBarangController::class, 'deletePengadaanBarang'])->name('infrastruktur.pengadaan-barang-delete');

    // MASTER INFRASTRUKTUR => INVENTARIS BARANG
    Route::get('/infrastruktur/inventaris-barang', [App\Http\Controllers\Master\Infrastruktur\InventarisBarangController::class, 'renderInventarisBarang'])->name('infrastruktur.inventaris-barang-render');
    Route::post('/infrastruktur/inventaris-barang', [App\Http\Controllers\Master\Infrastruktur\InventarisBarangController::class, 'handleInventarisBarang'])->name('infrastruktur.inventaris-barang-handle');
    Route::patch('/infrastruktur/inventaris-barang/{code}', [App\Http\Controllers\Master\Infrastruktur\InventarisBarangController::class, 'updateInventarisBarang'])->name('infrastruktur.inventaris-barang-update');
    Route::delete('/infrastruktur/inventaris-barang/{code}', [App\Http\Controllers\Master\Infrastruktur\InventarisBarangController::class, 'deleteInventarisBarang'])->name('infrastruktur.inventaris-barang-delete');

    // MASTER KEUANGAN => SALDO
    Route::get('/keuangan/saldo', [App\Http\Controllers\Master\Keuangan\SaldoController::class, 'renderSaldo'])->name('keuangan.saldo-render');
    Route::post('/keuangan/saldo', [App\Http\Controllers\Master\Keuangan\SaldoController::class, 'handleSaldo'])->name('keuangan.saldo-handle');
    Route::patch('/keuangan/saldo/{code}', [App\Http\Controllers\Master\Keuangan\SaldoController::class, 'updateSaldo'])->name('keuangan.saldo-update');
    Route::delete('/keuangan/saldo/{code}', [App\Http\Controllers\Master\Keuangan\SaldoController::class, 'deleteSaldo'])->name('keuangan.saldo-delete');
