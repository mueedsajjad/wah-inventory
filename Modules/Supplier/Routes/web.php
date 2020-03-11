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

Route::prefix('supplier')->group(function() {
    Route::get('/', 'SupplierController@index');
    Route::get('supplier', 'SupplierController@supplier');


//    ------------------------- Setting Controller    ------------------------------ //

//    Route::get('setting', 'SettingController@setting');
//
//    Route::post('creditStore', 'SettingController@creditStore');
//    Route::get('creditDelete/{id}', 'SettingController@creditDelete');
//
//    Route::post('stateStore', 'SettingController@stateStore');
//    Route::get('stateDelete/{id}', 'SettingController@stateDelete');
//
//    Route::post('cityStore', 'SettingController@cityStore');
//    Route::get('cityDelete/{id}', 'SettingController@cityDelete');
//
//    Route::post('paymentStore', 'SettingController@paymentStore');
//    Route::get('paymentDelete/{id}', 'SettingController@paymentDelete');

});
