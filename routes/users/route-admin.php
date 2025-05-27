<?php

use Illuminate\Support\Facades\Route;

// HAK AKSES DEPARTEMENT ACADEMIC
Route::group(['prefix' => 'admin', 'middleware' => ['checkUser:Departement Admin'], 'as' => 'admin.'],function(){

    // GLOBAL ROUTE
    require __DIR__.'/../private-core.php';


    // STATUS ACTIVE BOLEH AKSES INI
    Route::middleware(['is-active:1'])->group(function () {

    });

});
