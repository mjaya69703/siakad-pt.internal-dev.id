<?php

use Illuminate\Support\Facades\Route;

// HAK AKSES WEB ADMINISTRATOR
Route::group(['prefix' => 'web-admin', 'middleware' => ['checkUser:Web Administrator'], 'as' => 'web-admin.'],function(){
    // GLOBAL MENU AUTHENTIKASI

    // GLOBAL ROUTE
    require __DIR__.'/../private-core.php';


    // MASTER AUTHORITY
    require __DIR__.'/../master-core.php';
});
