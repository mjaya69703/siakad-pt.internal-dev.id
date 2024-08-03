<?php

use Illuminate\Support\Facades\Route;

// HAK AKSES DEPARTEMENT OFFICER
Route::group(['prefix' => 'officer', 'middleware' => ['user-access:Departement Officer'], 'as' => 'officer.'],function(){
    // GLOBAL ROUTE
    require __DIR__.'/route-global.php';
    // STATUS ACTIVE BOLEH AKSES INI
    Route::middleware(['is-active:1'])->group(function () {


    });

});
