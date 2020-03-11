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

    
});

