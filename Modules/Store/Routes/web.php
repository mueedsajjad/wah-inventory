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
    Route::post('dateHearing_out', 'StoreController@date_filter_out')->name('dateHearing_out');
    Route::post('inspectionInward_Note_Date', 'StoreController@inwardInspectionNote_date')->name('inward_insp_note_date');
    Route::post('inspectionInward_Note_Date_out', 'StoreController@inwardInspectionNote_date_out')->name('inward_insp_note_date_out');
    Route::get('/', 'StoreController@index')->middleware('auth');
    Route::post('/storing_saless', 'StoreController@sale_storing');
    Route::get('/sales', 'StoreController@sales_list')->middleware('auth');
    Route::get('/sale_store_to_gate/{id}', 'StoreController@saling')->middleware('auth');
    Route::get('/forwarded_to_gate/{id}', 'StoreController@forwarded_to_gate_outward')->middleware('auth');
    Route::get('/forwarded_to_gate_mat/{id}', 'StoreController@forwarded_to_gate_outward_mat')->middleware('auth');
    Route::get('dashboard', 'StoreController@dashboard')->middleware('auth');
    Route::get('assignStore', 'StoreController@assignStore')->middleware('auth');

//   ------------------Material----------------------------
    Route::get('rawMaterial', 'StoreController@rawMaterial')->middleware('auth');
    Route::get('addMaterial', 'StoreController@addMaterial')->middleware('auth');
    Route::post('submitNewMaterial', 'StoreController@submitNewMaterial');
    Route::post('submitEditedMaterial', 'StoreController@submitEditedMaterial');
    Route::post('deleteMaterial', 'StoreController@deleteMaterial');

//    -------------------- Product ---------------------- //
    Route::get('product', 'StoreController@product')->middleware('auth');
////////////////////////////////////////////////////////////////////////////////////////////
    Route::get('newBuiltyArrival', 'StoreController@newBuiltyArrival')->middleware('auth');
    Route::get('newBuiltyArrival_out', 'StoreController@newBuiltyArrival_outward')->middleware('auth');
    Route::get('add_i_note_qc/{id}', 'StoreController@add_i_note_qc')->middleware('auth');
    Route::get('viewBuiltyDetails/{gatePassId}', 'StoreController@viewBuiltyDetails')->middleware('auth');
    Route::get('viewBuiltyDetails_out/{gatePassId}', 'StoreController@viewBuiltyDetails_out')->middleware('auth');
    Route::post('changeUnloadStatus', 'StoreController@changeUnloadStatus');
    Route::post('changeUnloadStatus_out', 'StoreController@changeUnloadStatus_out');

    Route::get('approveForInspectionNote', 'StoreController@approveForInspectionNote')->middleware('auth');
    Route::post('submitAssignedStore/{id}', 'StoreController@submitAssignedStore');
    Route::post('sendForInspection', 'StoreController@sendForInspection');
    Route::get('inwardInspectionNote', 'StoreController@inwardInspectionNote')->middleware('auth');
    Route::get('inwardInspectionNote_out', 'StoreController@inwardInspectionNote_out')->middleware('auth');
    Route::post('submitInwardInspectionNote', 'StoreController@submitInwardInspectionNote');
    Route::post('sendForInwardReceipt', 'StoreController@sendForInwardReceipt');

    Route::get('inwardGoodsReceipt', 'StoreController@inwardGoodsReceipt')->middleware('auth');
    Route::get('inwardGoodsReceipt_out', 'StoreController@inwardGoodsReceipt_out')->middleware('auth');
    Route::get('inwardGoodsReceipt/writeInwardGoodsReceipt/{id}/{gatePassId}', 'StoreController@writeInwardGoodsReceipt')->middleware('auth');
    Route::get('inwardGoodsReceipt/writeInwardGoodsReceipt_out/{id}/{gatePassId}', 'StoreController@writeInwardGoodsReceipt_out')->middleware('auth');
    Route::post('submitInwardGoodsReceipt', 'StoreController@submitInwardGoodsReceipt');
    Route::post('submitInwardGoodsReceipt_out', 'StoreController@submitInwardGoodsReceipt_out');
    Route::post('changeInwardReceiptApprovalStatus', 'StoreController@changeInwardReceiptApprovalStatus');

    Route::get('assignStore/assignStoreToFactoryInMadeProducts', 'StoreController@assignStoreToFactoryInMadeProducts')->middleware('auth');
    Route::post('submitFactoryInMadeProductsToStore', 'StoreController@submitFactoryInMadeProductsToStore');

    Route::get('assignStore/assignStoreToFactoryInMadeComponents', 'StoreController@assignStoreToFactoryInMadeComponents')->middleware('auth');
    Route::post('submitFactoryInMadeComponentsToStore', 'StoreController@submitFactoryInMadeComponentsToStore');

    Route::get('assignStore/assignStoreToFactoryInwardMaterial', 'StoreController@assignStoreToFactoryInwardMaterial')->middleware('auth');
    Route::post('submitFactoryInwardMaterialToStore', 'StoreController@submitFactoryInwardMaterialToStore');

    Route::get('assignStore/assignStoreToFactoryInwardComponents', 'StoreController@assignStoreToFactoryInwardComponents')->middleware('auth');
    Route::post('submitFactoryInwardComponentToStore', 'StoreController@submitFactoryInwardComponentToStore');

    Route::get('allStores', 'StoreController@allStores')->middleware('auth');
    Route::get('allStores/storeMagazine1', 'StoreController@storeMagazine1')->middleware('auth');
    Route::get('allStores/storeMagazine2', 'StoreController@storeMagazine2')->middleware('auth');
    Route::get('allStores/storeFinishedGoods1', 'StoreController@storeFinishedGoods1')->middleware('auth');
    Route::get('allStores/storeFinishedGoods2', 'StoreController@storeFinishedGoods2')->middleware('auth');
    Route::get('allStores/storeComponents', 'StoreController@storeComponents')->middleware('auth');

    Route::get('totalStock', 'StoreController@totalStock')->middleware('auth');

    Route::get('issueRequisition', 'StoreController@issueRequisition')->middleware('auth');
    Route::get('issueRequisition/componentRequisition', 'StoreController@componentRequisition')->middleware('auth');
    Route::get('issueRequisition/materialRequisition', 'StoreController@materialRequisition')->middleware('auth');
    Route::get('issueRequisition/proceedComponentRequisition/{id}/{name}/{quantity}', 'StoreController@proceedComponentRequisition')->middleware('auth');
    Route::get('issueRequisition/proceedMaterialRequisition/{id}/{name}/{quantity}', 'StoreController@proceedMaterialRequisition')->middleware('auth');
    Route::post('submitIssuedComponentRequisition', 'StoreController@submitIssuedComponentRequisition');
    Route::post('submitIssuedMaterialRequisition', 'StoreController@submitIssuedMaterialRequisition');



///////////////////////////////////////////////////////////////////////////////////////////////
    Route::get('addProduct', 'StoreController@addProduct')->middleware('auth');
    //    -------------------- Delivery ---------------------- //

    Route::get('deliveryOrder', 'StoreController@deliveryOrder')->middleware('auth');

    // -------------------------- IssueRequisition ---------------------  //






    Route::get('report', 'StoreController@report')->middleware('auth');

 // ------------------------------- Production Product -------------------- //


});
