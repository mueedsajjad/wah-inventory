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

Route::prefix('admin')->group(function() {
    Route::get('/', 'AdminController@index');

    Route::get('employee', 'AdminController@employee');
    Route::post('employeeStore', 'AdminController@employeeStore');

    Route::get('leave', 'AdminController@leave');

    Route::get('salary', 'AdminController@salary');

    Route::get('advance', 'AdminController@advance');

    Route::get('report', 'AdminController@report');
});
