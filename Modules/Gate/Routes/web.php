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

    Route::get('inwardGatePass','GateController@inwardGatePass');
    Route::get('outwardGatePass','GateController@outwardGatePass');
    Route::get('vendor_data/{id}','GateController@vendor_data');
    Route::get('item_details/{id}','GateController@item_details');
    Route::post('addInwardGatePass','GateController@addInwardGatePass');

    //inward requisition
    Route::get('requisition_detail/{id}','GateController@requisition_detail');
    Route::get('right_side_purchase/{id}','GateController@poDetails');

    //outward
    Route::get('outward_customer/{id}','GateController@outward_customer');
    Route::get('outward_factory_material/{id}','GateController@outward_factory_material');
    Route::get('outward_factory_component/{id}','GateController@outward_factory_component');
    Route::post('addOutwardGatePass','GateController@addOutwardGatePass');
    Route::get('delivery_order/{id}','GateController@delivery_order');
    Route::get('delivery_order_table/{id}','GateController@delivery_order_table');



    Route::get('get_data_material/{id}','GateController@getDataMaterial');
    Route::get('get_data_component/{id}','GateController@getDataComponent');




    Route::get('vehicleManagement','GateController@vehicleManagement');
    Route::get('vehicleManagement/outVehicle','GateController@outVehicle');
    Route::post('submitVehicleOut','GateController@submitVehicleOut');
    Route::get('vehicleManagement/inVehicle','GateController@inVehicle');
    Route::post('submitInVehicle','GateController@submitInVehicle');





    Route::get('/', 'GateController@index');

    Route::get('dashboard','GateController@dashboard');
    Route::get('attendance','GateController@attendance');
    Route::get('security','GateController@security');


    // ------------ Reports --------------------//
    Route::get('report','GateController@report');
         //---Inward Report---//
    Route::get('inward','GateController@inward');
    Route::get('inward_report/{id}','GateController@inward_report');

        //----Outward Report------///
    Route::get('outward_report','GateController@outward_report');
    Route::get('out_report/{id}','GateController@out_report');
    Route::get('component_out_report/{id}','GateController@component_out_report');
    Route::get('out_delivery_report/{id}','GateController@out_delivery_report');

    //----Vehicle Report------///


    Route::get('vehicle_report','GateController@vehicle_report');



});



