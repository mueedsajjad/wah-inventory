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
    Route::post('changeUnloadStatus', 'StoreController@changeUnloadStatus');




    Route::get('approveForInspectionNote', 'StoreController@approveForInspectionNote');
    Route::post('submitAssignedStore/{gatePassId}', 'StoreController@submitAssignedStore');
    Route::post('sendForInspection', 'StoreController@sendForInspection');
    Route::get('inwardInspectionNote', 'StoreController@inwardInspectionNote');
    Route::post('submitInwardInspectionNote', 'StoreController@submitInwardInspectionNote');
    Route::post('sendForInwardReceipt', 'StoreController@sendForInwardReceipt');


    Route::get('inwardGoodsReceipt', 'StoreController@inwardGoodsReceipt');
    Route::get('writeInwardGoodsReceipt/{id}/{gatePassId}', 'StoreController@writeInwardGoodsReceipt');
    Route::post('submitInwardGoodsReceipt', 'StoreController@submitInwardGoodsReceipt');
    Route::post('changeInwardReceiptApprovalStatus', 'StoreController@changeInwardReceiptApprovalStatus');


    Route::get('assignStoreToFactoryInMadeProducts', 'StoreController@assignStoreToFactoryInMadeProducts');
    Route::post('submitFactoryInMadeProductsToStore', 'StoreController@submitFactoryInMadeProductsToStore');

    Route::get('assignStoreToFactoryInMadeComponents', 'StoreController@assignStoreToFactoryInMadeComponents');
    Route::post('submitFactoryInMadeComponentsToStore', 'StoreController@submitFactoryInMadeComponentsToStore');

    Route::get('assignStoreToFactoryInwardMaterial', 'StoreController@assignStoreToFactoryInwardMaterial');
    Route::post('submitFactoryInwardMaterialToStore', 'StoreController@submitFactoryInwardMaterialToStore');




    Route::get('addProduct', 'StoreController@addProduct');
    //    -------------------- Delivery ---------------------- //

    Route::get('deliveryOrder', 'StoreController@deliveryOrder');

    // -------------------------- IssueRequisition ---------------------  //

    Route::get('IssueRequisition', 'StoreController@IssueRequisition');




    Route::get('report', 'StoreController@report');

 // ------------------------------- Production Product -------------------- //


});
