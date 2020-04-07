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








Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/store/dash', 'HomeController@store');
Route::get('/store/single-data/{id}', 'HomeController@singleData');



Route::get('/gate/dash', 'HomeController@gate');
Route::get('/sale/dash', 'HomeController@sale');
Route::get('/production/dash', 'HomeController@production');


Route::get('/requisition/dash', 'HomeController@requisition');
