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
    Route::get('vendor_data','GateController@vendor_data');
    Route::post('addInwardGatePass','GateController@addInwardGatePass');


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
    Route::get('inward','GateController@inward');

});



