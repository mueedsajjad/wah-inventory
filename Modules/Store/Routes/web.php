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
    Route::post('dateHearing', 'StoreController@date_filter')->name('dateHearing');
    Route::post('inspectionInward_Note_Date', 'StoreController@inwardInspectionNote_date')->name('inward_insp_note_date');
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
////////////////////////////////////////////////////////////////////////////////////////////
    Route::get('newBuiltyArrival', 'StoreController@newBuiltyArrival');
    Route::get('viewBuiltyDetails/{gatePassId}', 'StoreController@viewBuiltyDetails');
    Route::post('changeUnloadStatus', 'StoreController@changeUnloadStatus');

    Route::get('approveForInspectionNote', 'StoreController@approveForInspectionNote');
    Route::post('submitAssignedStore/{id}', 'StoreController@submitAssignedStore');
    Route::post('sendForInspection', 'StoreController@sendForInspection');
    Route::get('inwardInspectionNote', 'StoreController@inwardInspectionNote');
    Route::post('submitInwardInspectionNote', 'StoreController@submitInwardInspectionNote');
    Route::post('sendForInwardReceipt', 'StoreController@sendForInwardReceipt');

    Route::get('inwardGoodsReceipt', 'StoreController@inwardGoodsReceipt');
    Route::get('inwardGoodsReceipt/writeInwardGoodsReceipt/{id}/{gatePassId}', 'StoreController@writeInwardGoodsReceipt');
    Route::post('submitInwardGoodsReceipt', 'StoreController@submitInwardGoodsReceipt');
    Route::post('changeInwardReceiptApprovalStatus', 'StoreController@changeInwardReceiptApprovalStatus');

    Route::get('assignStore/assignStoreToFactoryInMadeProducts', 'StoreController@assignStoreToFactoryInMadeProducts');
    Route::post('submitFactoryInMadeProductsToStore', 'StoreController@submitFactoryInMadeProductsToStore');

    Route::get('assignStore/assignStoreToFactoryInMadeComponents', 'StoreController@assignStoreToFactoryInMadeComponents');
    Route::post('submitFactoryInMadeComponentsToStore', 'StoreController@submitFactoryInMadeComponentsToStore');

    Route::get('assignStore/assignStoreToFactoryInwardMaterial', 'StoreController@assignStoreToFactoryInwardMaterial');
    Route::post('submitFactoryInwardMaterialToStore', 'StoreController@submitFactoryInwardMaterialToStore');

    Route::get('assignStore/assignStoreToFactoryInwardComponents', 'StoreController@assignStoreToFactoryInwardComponents');
    Route::post('submitFactoryInwardComponentToStore', 'StoreController@submitFactoryInwardComponentToStore');

    Route::get('allStores', 'StoreController@allStores');
    Route::get('allStores/storeMagazine1', 'StoreController@storeMagazine1');
    Route::get('allStores/storeMagazine2', 'StoreController@storeMagazine2');
    Route::get('allStores/storeFinishedGoods1', 'StoreController@storeFinishedGoods1');
    Route::get('allStores/storeFinishedGoods2', 'StoreController@storeFinishedGoods2');
    Route::get('allStores/storeComponents', 'StoreController@storeComponents');

    Route::get('totalStock', 'StoreController@totalStock');

    Route::get('issueRequisition', 'StoreController@issueRequisition');
    Route::get('issueRequisition/componentRequisition', 'StoreController@componentRequisition');
    Route::get('issueRequisition/materialRequisition', 'StoreController@materialRequisition');
    Route::get('issueRequisition/proceedComponentRequisition/{id}/{name}/{quantity}', 'StoreController@proceedComponentRequisition');
    Route::get('issueRequisition/proceedMaterialRequisition/{id}/{name}/{quantity}', 'StoreController@proceedMaterialRequisition');
    Route::post('submitIssuedComponentRequisition', 'StoreController@submitIssuedComponentRequisition');
    Route::post('submitIssuedMaterialRequisition', 'StoreController@submitIssuedMaterialRequisition');



///////////////////////////////////////////////////////////////////////////////////////////////
    Route::get('addProduct', 'StoreController@addProduct');
    //    -------------------- Delivery ---------------------- //

    Route::get('deliveryOrder', 'StoreController@deliveryOrder');

    // -------------------------- IssueRequisition ---------------------  //






    Route::get('report', 'StoreController@report');

 // ------------------------------- Production Product -------------------- //


});
