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
    Route::get('/', 'QCController@index')->middleware('auth');
    Route::get('dashboard', 'QCController@dashboard')->middleware('auth');
    Route::get('dash', 'QCController@dash')->middleware('auth');
    Route::get('dash/rejected', 'QCController@rejected')->middleware('auth');
    Route::get('dash/list', 'QCController@list')->middleware('auth');
    Route::get('inward_qc', '\Modules\Store\Http\Controllers\StoreController@inwardInspectionNote')->middleware('auth');
    Route::get('inward_qc_out', '\Modules\Store\Http\Controllers\StoreController@inwardInspectionNote_out')->middleware('auth');



    Route::get('production-product', 'QCController@productionProduct')->middleware('auth');
    Route::get('production-component', 'QCController@productionComponent')->middleware('auth');

    Route::post('component-inspection', 'QCController@componentInspection');
    Route::post('product-inspection', 'QCController@productInspection');

});
