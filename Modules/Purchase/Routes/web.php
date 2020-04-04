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

Route::prefix('purchase')->group(function() {
    Route::get('/', 'PurchaseController@index');
    Route::get('/dashboard', 'PurchaseController@dashboard');
    Route::get('/new-purchase-list', 'PurchaseController@purchaseOrderlist');

    Route::get('/get-requ/{data}', 'PurchaseController@getRequ');
    Route::get('/get-details/{data}', 'PurchaseController@getDetail');

    Route::get('/order-approve/{data}', 'PurchaseController@orderApprove');
    Route::get('/order-reject/{data}', 'PurchaseController@orderReject');


    Route::get('/make-order/{data}', 'PurchaseController@makeOrder');

    Route::post('/purchase-order-approval', 'PurchaseController@purchaseOrderApproval');



    Route::get('purchase', 'PurchaseController@purchase');
    Route::post('purchaseStore', 'PurchaseController@purchaseStore');

    Route::get('orderForApprove', 'PurchaseController@orderForApprove');
    Route::get('orderDetail/{id}', 'PurchaseController@Order_purchase_detail');

    Route::get('accept/{id}', 'PurchaseController@accept');
    Route::get('reject/{id}', 'PurchaseController@reject');

    Route::get('selectSupplier', 'PurchaseController@selectSupplier');
    Route::post('storeSupplier', 'PurchaseController@storeSupplier');


    Route::get('purchaseOrder', 'PurchaseController@purchaseOrder');
    Route::get('directReceipt', 'PurchaseController@directReceipt');

    Route::get('tender', 'PurchaseController@tender');
});

Route::prefix('order')->group(function() {

    Route::get('/order-approve', 'PurchaseController@orderTable');
    Route::get('/order-approve/{id}', 'PurchaseController@orderApprove');



});