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

Route::prefix('gate')->group(function() {

    Route::get('inwardGatePass','GateController@inwardGatePass')->middleware('auth');
    Route::get('outwardGatePass','GateController@outwardGatePass')->middleware('auth');
    Route::get('vendor_data/{id}','GateController@vendor_data')->middleware('auth');
    Route::get('item_details/{id}','GateController@item_details')->middleware('auth');
    Route::post('addInwardGatePass','GateController@addInwardGatePass');

    //inward requisition
    Route::get('requisition_detail/{id}','GateController@requisition_detail')->middleware('auth');
    Route::get('right_side_purchase/{id}','GateController@poDetails')->middleware('auth');

    //outward
    Route::get('outward_customer/{id}','GateController@outward_customer')->middleware('auth');
    Route::get('outward_factory_material/{id}','GateController@outward_factory_material')->middleware('auth');
    Route::get('outward_factory_component/{id}','GateController@outward_factory_component')->middleware('auth');
    Route::post('addOutwardGatePass','GateController@addOutwardGatePass');
    Route::get('delivery_order/{id}','GateController@delivery_order')->middleware('auth');
    Route::get('delivery_order_table/{id}','GateController@delivery_order_table')->middleware('auth');



    Route::get('get_data_material/{id}','GateController@getDataMaterial')->middleware('auth');
    Route::get('get_data_component/{id}','GateController@getDataComponent')->middleware('auth');




    Route::get('vehicleManagement','GateController@vehicleManagement')->middleware('auth');
    Route::get('vehicleManagement/outVehicle','GateController@outVehicle')->middleware('auth');
    Route::post('submitVehicleOut','GateController@submitVehicleOut');
    Route::get('vehicleManagement/inVehicle','GateController@inVehicle')->middleware('auth');
    Route::post('submitInVehicle','GateController@submitInVehicle');





    Route::get('/', 'GateController@index')->middleware('auth');

    Route::get('dashboard','GateController@dashboard')->middleware('auth');
    Route::get('attendance','GateController@attendance')->middleware('auth');
    Route::get('security','GateController@security')->middleware('auth');


    // ------------ Reports --------------------//
    Route::post('Inward_Date', 'GateController@inward_date')->name('inward_gate_date');
    Route::get('Inward_Date_current_month', 'GateController@inward_current_month');
    Route::get('report','GateController@report')->middleware('auth');
         //---Inward Report---//
    Route::get('inward','GateController@inward')->middleware('auth');
    Route::get('inward_report/{id}','GateController@inward_report')->middleware('auth');

        //----Outward Report------///
    Route::get('outward_report','GateController@outward_report')->middleware('auth');
    Route::get('out_report/{id}','GateController@out_report')->middleware('auth');
    Route::get('component_out_report/{id}','GateController@component_out_report')->middleware('auth');
    Route::get('out_delivery_report/{id}','GateController@out_delivery_report')->middleware('auth');

    //----Vehicle Report------///


    Route::get('vehicle_report','GateController@vehicle_report')->middleware('auth');



});



