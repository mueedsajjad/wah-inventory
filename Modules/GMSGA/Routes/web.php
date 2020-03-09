<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('gmsga')->group(function() {
    Route::get('/', 'GMSGAController@index');

    Route::get('production', 'GMSGAController@production');
    Route::get('materialRequest', 'GMSGAController@materialRequest');

    Route::get('gate', 'GMSGAController@gate');
    Route::get('gatePassInward', 'GMSGAController@gatePassInward');
    Route::get('attendance', 'GMSGAController@attendance');
    Route::get('security', 'GMSGAController@security');
    Route::get('vehicleManagement', 'GMSGAController@vehicleManagement');


    Route::get('store', 'GMSGAController@storeIndex');
    Route::get('rawMaterial', 'GMSGAController@rawMaterial');
    Route::get('product', 'GMSGAController@product');




});
