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

Route::prefix('assistantmanager')->group(function() {

    Route::get('/dashboard', 'AssistantManagerController@index');
    Route::get('/requisition-request', 'AssistantManagerController@requisitionRequest');
    Route::post('/requisition-request', 'AssistantManagerController@requisitionRequestSubmit');

});
