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

Route::prefix('production')->group(function() {
    Route::get('/', 'ProductionController@index');
    Route::get('dashboard','ProductionController@dashboard');
    Route::get('newOrder','ProductionController@newOrder');

    Route::post('orderStore','ProductionController@orderStore');

    Route::post('processStatus','ProductionController@processStatus');

    Route::post('transferProduct','ProductionController@transferProduct');


    // ---------------------------- Component Order -------------------------- //

    Route::get('orderComponent','ProductionController@orderComponent');
    Route::post('orderComponentStore','ProductionController@orderComponentStore');

    Route::post('processStatusComponent','ProductionController@processStatusComponent');

    Route::post('transferComponent','ProductionController@transferComponent');

    Route::get('componentDashboard','ProductionController@componentDashboard');



    // ------------------------------------ requisition ----------------------------- //

    Route::get('materialRequisition','ProductionController@materialRequisition');

    Route::post('materialRequisitionStore','ProductionController@materialRequisitionStore');

    Route::get('componentRequisition','ProductionController@componentRequisition');
    Route::post('componentRequisitionStore','ProductionController@componentRequisitionStore');



});

