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

Route::prefix('store')->group(function() {
    Route::get('/', 'StoreController@index');
    Route::get('dashboard', 'StoreController@dashboard');
    Route::get('rawMaterial', 'StoreController@rawMaterial');
    Route::get('addMaterial', 'StoreController@addMaterial');

//    -------------------- Product ---------------------- //
    Route::get('product', 'StoreController@product');
    Route::get('addProduct', 'StoreController@addProduct');
    Route::get('goodsReceipt', 'StoreController@goodsReceipt');
    Route::get('inspection', 'StoreController@inspection');


    //    -------------------- Delivery ---------------------- //

    Route::get('deliveryOrder', 'StoreController@deliveryOrder');

    // -------------------------- IssueRequisition ---------------------  //

    Route::get('IssueRequisition', 'StoreController@IssueRequisition');




    Route::get('report', 'StoreController@report');




});
