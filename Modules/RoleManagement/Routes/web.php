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

Route::prefix('rolemanagement')->group(function() {
    Route::get('/', 'RoleManagementController@index');

});

Route::get('role', 'RoleManagementController@viewRoles');
Route::post('/role', 'RoleManagementController@storeRole')->name('showrole');
Route::get('/permission', 'RoleManagementController@viewPermissions');
Route::post('/permission', 'RoleManagementController@storePermission')->name('showpermission');
Route::get('/del-permit/{id}', 'RoleManagementController@permitDelete');
Route::get('/assign-permission', 'RoleManagementController@assignPermissions');
Route::post('/assign-permission', 'RoleManagementController@StoreAssignPermissions');
Route::get('/assign-role', 'RoleManagementController@assignRoles');
Route::post('/assign-role', 'RoleManagementController@StoreAssignRoles');
Route::get('/check/{id}', 'RoleManagementController@checkPermissions');
Route::post('/unchecked', 'RoleManagementController@unChecked');





Route::get('getPermissions/{id}', 'RoleManagementController@getPermissions');

Route::get('getPermission', 'RoleManagementController@getPermission');
