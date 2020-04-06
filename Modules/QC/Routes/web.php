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

Route::prefix('qc')->group(function() {
    Route::get('/', 'QCController@index');
    Route::get('dashboard', '\Modules\Store\Http\Controllers\StoreController@inwardInspectionNote');
});
