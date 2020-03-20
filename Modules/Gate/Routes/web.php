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
    Route::post('addInwardGatePass','GateController@addInwardGatePass');

    Route::get('outVehicle','GateController@outVehicle');
    Route::post('submitVehicleOut','GateController@submitVehicleOut');

    Route::get('inVehicle','GateController@inVehicle');
    Route::post('submitInVehicle','GateController@submitInVehicle');





    Route::get('/', 'GateController@index');

    Route::get('dashboard','GateController@dashboard');
    Route::get('attendance','GateController@attendance');
    Route::get('security','GateController@security');


    // ------------ Reports --------------------//
    Route::get('report','GateController@report');
    Route::get('inward','GateController@inward');

});



