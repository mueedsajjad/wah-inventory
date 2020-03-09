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


});

