<?php

use Illuminate\Support\Facades\Route;

// HAK AKSES DEPARTEMENT ACADEMIC
Route::group(['prefix' => 'admin', 'middleware' => ['user-access:Departement Admin'], 'as' => 'admin.'],function(){

    // GLOBAL ROUTE
    require __DIR__.'/route-global.php';

    // STATUS ACTIVE BOLEH AKSES INI
    Route::middleware(['is-active:1'])->group(function () {

    });

});
