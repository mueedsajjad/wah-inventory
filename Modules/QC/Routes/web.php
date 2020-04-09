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
    Route::get('dashboard', 'QCController@dashboard');
    Route::get('dash', 'QCController@dash');
    Route::get('dash/rejected', 'QCController@rejected');
    Route::get('dash/list', 'QCController@list');
    Route::get('inward_qc', '\Modules\Store\Http\Controllers\StoreController@inwardInspectionNote');
    Route::get('inward_qc_out', '\Modules\Store\Http\Controllers\StoreController@inwardInspectionNote_out');



    Route::get('production-product', 'QCController@productionProduct');
    Route::get('production-component', 'QCController@productionComponent');

    Route::post('component-inspection', 'QCController@componentInspection');
    Route::post('product-inspection', 'QCController@productInspection');

});
