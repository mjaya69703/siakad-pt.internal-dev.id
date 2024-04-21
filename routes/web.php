<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/error/verify', [App\Http\Controllers\Root\ErrorController::class, 'ErrorVerify'])->name('error.verify');
Route::get('/error/access', [App\Http\Controllers\Root\ErrorController::class, 'ErrorAccess'])->name('error.access');
Route::get('/error/notfound', [App\Http\Controllers\Root\ErrorController::class, 'ErrorNotFound'])->name('error.notfound');

Route::get('/', function () {
    return view('base.base-auth-index');
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
    Route::get('/profile',[App\Http\Controllers\Admin\HomeController::class, 'profile'])->name('home-profile');
    Route::get('/presensi',[App\Http\Controllers\Admin\PresensiController::class, 'index'])->name('home-presensi');
    Route::get('/presensi/view',[App\Http\Controllers\Admin\PresensiController::class, 'presensiList'])->name('home-presensi-list');
    Route::get('/presensi/view/{date}',[App\Http\Controllers\Admin\PresensiController::class, 'presensiView'])->name('home-presensi-view');
    // Route::get('/absensi',[App\Http\Controllers\Admin\PresensiController::class, 'index'])->name('home-absensi');
    // Route::get('/absensi/cek',[App\Http\Controllers\Admin\PresensiController::class, 'absenPulang'])->name('home-absensi-pulang');
    // Route::get('/presensi/get-data',[App\Http\Controllers\Admin\HomeController::class, 'presensiGet'])->name('home-presensi-get-data');
    // Route::get('/presensi/view/hadir',[App\Http\Controllers\Admin\HomeController::class, 'presensiHadir'])->name('home-presensi-view-hadir');
    // Route::get('/presensi/view/izin',[App\Http\Controllers\Admin\HomeController::class, 'presensiIzin'])->name('home-presensi-view-izin');

    // PRIVATE FUNCTION => PROFILE
    Route::patch('/profile/update-image',[App\Http\Controllers\Admin\HomeController::class, 'saveImageProfile'])->name('home-profile-save-image');
    Route::patch('/profile/update-data',[App\Http\Controllers\Admin\HomeController::class, 'saveDataProfile'])->name('home-profile-save-data');
    Route::patch('/profile/update-kontak',[App\Http\Controllers\Admin\HomeController::class, 'saveDataKontak'])->name('home-profile-save-kontak');
    Route::patch('/profile/update-password',[App\Http\Controllers\Admin\HomeController::class, 'saveDataPassword'])->name('home-profile-save-password');
    
    // PRIVATE FUNCTION => PRESENSI
    Route::post('/presensi/save-absen',[App\Http\Controllers\Admin\HomeController::class, 'saveAbsen'])->name('home-presensi-input-absen');
    Route::post('/presensi/save-sakit',[App\Http\Controllers\Admin\HomeController::class, 'saveSakit'])->name('home-presensi-input-sakit');
    Route::post('/presensi/save-izin',[App\Http\Controllers\Admin\HomeController::class, 'saveIzin'])->name('home-presensi-input-izin');
    Route::patch('/presensi/update-absen',[App\Http\Controllers\Admin\PresensiController::class, 'absenPulang'])->name('home-presensi-update-absen');

    // STATUS ACTIVE BOLEH AKSES INI
    Route::middleware(['is-active:1'])->group(function () {
        
        // ADMIN AUTHORITY
        // PAGES USER MANAGER GLOBAL
        Route::post('/staff-manager/create/save',[App\Http\Controllers\Admin\Pages\UserManageController::class, 'createSave'])->name('staffmanager-create-save');
        Route::patch('/staff-manager/update/{id}/status',[App\Http\Controllers\Admin\Pages\UserManageController::class, 'updateStatus'])->name('staffmanager-update-stat');
        Route::patch('/staff-manager/update/{code}/save/dosen',[App\Http\Controllers\Admin\Pages\UserManageController::class, 'updateSaveDosen'])->name('staffmanager-update-save-dosen');
        Route::patch('/staff-manager/update/{id}/status/dosen',[App\Http\Controllers\Admin\Pages\UserManageController::class, 'updateStatusDosen'])->name('staffmanager-update-stat-dosen');
        // PAGES USER MANAGER GLOBAL => ONLY STAFF
        Route::get('/staff-manager/create/staff',[App\Http\Controllers\Admin\Pages\UserManageController::class, 'create'])->name('staffmanager-create-staff');
        Route::get('/staff-manager/staff',[App\Http\Controllers\Admin\Pages\UserManageController::class, 'indexStaff'])->name('staffmanager-staff-index');
        Route::get('/staff-manager/staff/view/{code}',[App\Http\Controllers\Admin\Pages\UserManageController::class, 'viewStaff'])->name('staffmanager-staff-view');
        Route::delete('/staff-manager/staff/delete/{code}',[App\Http\Controllers\Admin\Pages\UserManageController::class, 'deleteStaff'])->name('staffmanager-staff-destroy');
        // PAGES USER MANAGER GLOBAL => ONLY ADMIN
        Route::get('/staff-manager/create/admin',[App\Http\Controllers\Admin\Pages\UserManageController::class, 'create'])->name('staffmanager-create-admin');
        Route::get('/staff-manager/admin',[App\Http\Controllers\Admin\Pages\UserManageController::class, 'index'])->name('staffmanager-admin-index');
        Route::get('/staff-manager/admin/view/{code}',[App\Http\Controllers\Admin\Pages\UserManageController::class, 'viewStaff'])->name('staffmanager-admin-view');
        Route::delete('/staff-manager/admin/delete/{code}',[App\Http\Controllers\Admin\Pages\UserManageController::class, 'deleteStaff'])->name('staffmanager-admin-destroy');
        // PAGES USER MANAGER GLOBAL => ONLY LECTURE
        Route::get('/staff-manager/lecture',[App\Http\Controllers\Admin\Pages\UserManageController::class, 'indexDosen'])->name('staffmanager-dosen-index');
        Route::get('/staff-manager/lecture/create',[App\Http\Controllers\Admin\Pages\UserManageController::class, 'createDosen'])->name('staffmanager-create-dosen');
        Route::get('/staff-manager/lecture/view/{code}',[App\Http\Controllers\Admin\Pages\UserManageController::class, 'viewDosen'])->name('staffmanager-dosen-view');
        Route::delete('/staff-manager/lecture/delete/{code}',[App\Http\Controllers\Admin\Pages\UserManageController::class, 'deleteDosen'])->name('staffmanager-dosen-destroy');

    });

});

// HAK AKSES STAFF ADMINISTRASI
Route::group(['prefix' => 'administrative', 'middleware' => ['user-access:Administrative Staff'], 'as' => 'administrative.'],function(){
    // GLOBAL MENU AUTHENTIKASI
    Route::get('/signout',[App\Http\Controllers\Admin\AuthController::class, 'AuthSignOutPost'])->name('auth-signout-post');

    // GLOBAL MENU
    Route::get('/home',[App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home-index');
    Route::get('/profile',[App\Http\Controllers\Admin\HomeController::class, 'profile'])->name('home-profile');
    Route::get('/presensi',[App\Http\Controllers\Admin\PresensiController::class, 'index'])->name('home-presensi');
    Route::get('/presensi/view',[App\Http\Controllers\Admin\PresensiController::class, 'presensiList'])->name('home-presensi-list');
    Route::get('/presensi/view/{date}',[App\Http\Controllers\Admin\PresensiController::class, 'presensiView'])->name('home-presensi-view');
    // Route::get('/presensi',[App\Http\Controllers\Admin\PresensiController::class, 'index'])->name('home-presensi');
    // Route::get('/presensi/get-data',[App\Http\Controllers\Admin\HomeController::class, 'presensiGet'])->name('home-presensi-get-data');
    // Route::get('/presensi/view/hadir',[App\Http\Controllers\Admin\HomeController::class, 'presensiHadir'])->name('home-presensi-view-hadir');
    // Route::get('/presensi/view/izin',[App\Http\Controllers\Admin\HomeController::class, 'presensiIzin'])->name('home-presensi-view-izin');
    // Route::get('/presensi/view/{date}',[App\Http\Controllers\Admin\PresensiController::class, 'presensiView'])->name('home-presensi-view');

    // PRIVATE FUNCTION => PROFILE
    Route::patch('/profile/update-image',[App\Http\Controllers\Admin\HomeController::class, 'saveImageProfile'])->name('home-profile-save-image');
    Route::patch('/profile/update-data',[App\Http\Controllers\Admin\HomeController::class, 'saveDataProfile'])->name('home-profile-save-data');
    Route::patch('/profile/update-kontak',[App\Http\Controllers\Admin\HomeController::class, 'saveDataKontak'])->name('home-profile-save-kontak');
    Route::patch('/profile/update-password',[App\Http\Controllers\Admin\HomeController::class, 'saveDataPassword'])->name('home-profile-save-password');
    
    // PRIVATE FUNCTION => PRESENSI
    Route::post('/presensi/save-absen',[App\Http\Controllers\Admin\HomeController::class, 'saveAbsen'])->name('home-presensi-input-absen');
    Route::post('/presensi/save-sakit',[App\Http\Controllers\Admin\HomeController::class, 'saveSakit'])->name('home-presensi-input-sakit');
    Route::post('/presensi/save-izin',[App\Http\Controllers\Admin\HomeController::class, 'saveIzin'])->name('home-presensi-input-izin');
    Route::patch('/presensi/update-absen',[App\Http\Controllers\Admin\PresensiController::class, 'absenPulang'])->name('home-presensi-update-absen');

});

// HAK AKSES KOORDINATOR PROGRAM STUDI
Route::group(['prefix' => 'faculty', 'middleware' => ['user-access:Faculty Coordinator'], 'as' => 'faculty.'],function(){
    // GLOBAL MENU AUTHENTIKASI
    Route::get('/signout',[App\Http\Controllers\Admin\AuthController::class, 'AuthSignOutPost'])->name('auth-signout-post');

    // GLOBAL MENU
    Route::get('/home',[App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home-index');
    Route::get('/profile',[App\Http\Controllers\Admin\HomeController::class, 'profile'])->name('home-profile');
    Route::get('/presensi',[App\Http\Controllers\Admin\PresensiController::class, 'index'])->name('home-presensi');
    Route::get('/presensi/view',[App\Http\Controllers\Admin\PresensiController::class, 'presensiList'])->name('home-presensi-list');
    Route::get('/presensi/view/{date}',[App\Http\Controllers\Admin\PresensiController::class, 'presensiView'])->name('home-presensi-view');
    // Route::get('/presensi',[App\Http\Controllers\Admin\PresensiController::class, 'index'])->name('home-presensi');
    // Route::get('/presensi/get-data',[App\Http\Controllers\Admin\HomeController::class, 'presensiGet'])->name('home-presensi-get-data');
    // Route::get('/presensi/view/hadir',[App\Http\Controllers\Admin\HomeController::class, 'presensiHadir'])->name('home-presensi-view-hadir');
    // Route::get('/presensi/view/izin',[App\Http\Controllers\Admin\HomeController::class, 'presensiIzin'])->name('home-presensi-view-izin');

    // PRIVATE FUNCTION => PROFILE
    Route::patch('/profile/update-image',[App\Http\Controllers\Admin\HomeController::class, 'saveImageProfile'])->name('home-profile-save-image');
    Route::patch('/profile/update-data',[App\Http\Controllers\Admin\HomeController::class, 'saveDataProfile'])->name('home-profile-save-data');
    Route::patch('/profile/update-kontak',[App\Http\Controllers\Admin\HomeController::class, 'saveDataKontak'])->name('home-profile-save-kontak');
    Route::patch('/profile/update-password',[App\Http\Controllers\Admin\HomeController::class, 'saveDataPassword'])->name('home-profile-save-password');
    
    // PRIVATE FUNCTION => PRESENSI
    Route::post('/presensi/save-absen',[App\Http\Controllers\Admin\HomeController::class, 'saveAbsen'])->name('home-presensi-input-absen');
    Route::post('/presensi/save-sakit',[App\Http\Controllers\Admin\HomeController::class, 'saveSakit'])->name('home-presensi-input-sakit');
    Route::post('/presensi/save-izin',[App\Http\Controllers\Admin\HomeController::class, 'saveIzin'])->name('home-presensi-input-izin');
    Route::patch('/presensi/update-absen',[App\Http\Controllers\Admin\PresensiController::class, 'absenPulang'])->name('home-presensi-update-absen');


});

// HAK AKSES MAHASISWA
Route::group(['prefix' => 'mahasiswa', 'middleware' => ['mhs-access:Calon Mahasiswa'], 'as' => 'mahasiswa.'],function(){
    // GLOBAL MENU AUTHENTIKASI
    Route::get('/signout',[App\Http\Controllers\Mahasiswa\AuthController::class, 'AuthSignOutPost'])->name('auth-signout-post');

    // GLOBAL MENU
    Route::get('/home',[App\Http\Controllers\Mahasiswa\HomeController::class, 'index'])->name('home-index');
    Route::get('/profile',[App\Http\Controllers\Mahasiswa\HomeController::class, 'profile'])->name('home-profile');

    // PRIVATE FUNCTION => PROFILE
    Route::patch('/profile/update-image',[App\Http\Controllers\Mahasiswa\HomeController::class, 'saveImageProfile'])->name('home-profile-save-image');
    Route::patch('/profile/update-data',[App\Http\Controllers\Mahasiswa\HomeController::class, 'saveDataProfile'])->name('home-profile-save-data');
    Route::patch('/profile/update-kontak',[App\Http\Controllers\Mahasiswa\HomeController::class, 'saveDataKontak'])->name('home-profile-save-kontak');
    Route::patch('/profile/update-password',[App\Http\Controllers\Mahasiswa\HomeController::class, 'saveDataPassword'])->name('home-profile-save-password');

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

});
