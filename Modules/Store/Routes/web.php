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
    Route::get('assignStore', 'StoreController@assignStore');

//   ------------------Material----------------------------
    Route::get('rawMaterial', 'StoreController@rawMaterial');
    Route::get('addMaterial', 'StoreController@addMaterial');
    Route::post('submitNewMaterial', 'StoreController@submitNewMaterial');
    Route::post('submitEditedMaterial', 'StoreController@submitEditedMaterial');
    Route::post('deleteMaterial', 'StoreController@deleteMaterial');

//    -------------------- Product ---------------------- //
    Route::get('product', 'StoreController@product');

    Route::get('newBuiltyArrival', 'StoreController@newBuiltyArrival');
    Route::get('storewiseNewBuiltyArrival/{storeLocation}', 'StoreController@storewiseNewBuiltyArrival');
    Route::get('viewBuiltyDetails/{gatePassId}', 'StoreController@viewBuiltyDetails');
    Route::post('sendForInspection', 'StoreController@sendForInspection');









    Route::get('addProduct', 'StoreController@addProduct');
    Route::get('goodsReceipt', 'StoreController@goodsReceipt');
    Route::get('inspection', 'StoreController@inspection');


    //    -------------------- Delivery ---------------------- //

    Route::get('deliveryOrder', 'StoreController@deliveryOrder');

    // -------------------------- IssueRequisition ---------------------  //

    Route::get('IssueRequisition', 'StoreController@IssueRequisition');




    Route::get('report', 'StoreController@report');

 // ------------------------------- Production Product -------------------- //
    Route::get('productionProduct', 'StoreController@productionProduct');


});
