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
    Route::get('/', 'GateController@index');
    Route::get('gate','GateController@gate');
    Route::get('dashboard','GateController@dashboard');
    Route::get('attendance','GateController@attendance');
    Route::get('security','GateController@security');
    Route::get('vehicle','GateController@vehicle');

    // ------------ Reports --------------------//
    Route::get('report','GateController@report');
    Route::get('inward','GateController@inward');

});



