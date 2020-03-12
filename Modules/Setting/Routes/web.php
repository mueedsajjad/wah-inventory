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

Route::prefix('setting')->group(function() {
    Route::get('/', 'SettingController@index');

    //    ------------------- Setting Controller ----------------------    //

    Route::get('setting','SettingController@setting');

    Route::post('unitStore','SettingController@unitStore');
    Route::get('unitDelete/{id}','SettingController@unitDelete');

    Route::post('categoryStore','SettingController@categoryStore');
    Route::get('categoryDelete/{id}','SettingController@categoryDelete');


    Route::post('storeStore','SettingController@storeStore');
    Route::get('storeDelete/{id}','SettingController@storeDelete');


    Route::post('operationStore','SettingController@operationStore');
    Route::get('operationDelete/{id}','SettingController@operationDelete');

    Route::post('departmentStore','SettingController@departmentStore');
    Route::get('departmentDelete/{id}','SettingController@departmentDelete');

    // ------------------------------- General Setting ----------------------------- //

    Route::get('settingGeneral', 'SettingController@settingGeneral');

    Route::post('creditStore', 'SettingController@creditStore');
    Route::get('creditDelete/{id}', 'SettingController@creditDelete');

    Route::post('stateStore', 'SettingController@stateStore');
    Route::get('stateDelete/{id}', 'SettingController@stateDelete');

    Route::post('cityStore', 'SettingController@cityStore');
    Route::get('cityDelete/{id}', 'SettingController@cityDelete');

    Route::post('paymentStore', 'SettingController@paymentStore');
    Route::get('paymentDelete/{id}', 'SettingController@paymentDelete');

    // ------------------------------- Duty Setting ----------------------------- //
    Route::get('dutySchedule', 'SettingController@dutySchedule');
    Route::post('dutyScheduleStore', 'SettingController@dutyScheduleStore');
    Route::post('deletedutySchedule', 'SettingController@deletedutySchedule');


});
