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

Route::prefix('sale')->group(function() {

    Route::get('sale', 'SaleController@sale');
    Route::post('saleStore', 'SaleController@saleStore');
    Route::get('saleOrder', 'SaleController@saleOrder');
    Route::post('getSaleOrderProducts', 'SaleController@getSaleOrderProducts');
    Route::post('changeApprovalStatus', 'SaleController@changeApprovalStatus');
    Route::post('saleOrder/searchSaleOrderByDate', 'SaleController@searchSaleOrderByDate');

    Route::get('dashboard', 'SaleController@dashboard');
    Route::get('dashboard/newOrders', 'SaleController@newOrders');
    Route::get('dashboard/deliveryOrders', 'SaleController@deliveryOrders');
    Route::get('dashboard/ordersDelivered', 'SaleController@ordersDelivered');

    Route::get('customer', 'SaleController@customer');
    Route::post('addCustomer', 'SaleController@addCustomer');




    Route::get('/', 'SaleController@index');
});
