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
    Route::get('employeeDetail/{id}', 'AdminController@employeeDetail');
    Route::get('employeeDelete/{id}', 'AdminController@employeeDelete');
    Route::post('employeeEdit', 'AdminController@employeeEdit');

    Route::post('departmentStore', 'AdminController@departmentStore');


    Route::get('leave', 'AdminController@leave');

    Route::get('salary', 'AdminController@salary');

    Route::get('advance', 'AdminController@advance');

    Route::get('report', 'AdminController@report');

// ----------------------- attendance Controller ----------------------- //
    Route::get('attendance', 'AttendanceController@attendance');

    Route::get('attendanceMark', 'AttendanceController@attendanceMark');
    Route::post('checkInAttendanceStore', 'AttendanceController@checkInAttendanceStore');
    Route::post('checkOutAttendanceStore', 'AttendanceController@checkOutAttendanceStore');

    Route::post('deleteAttendance', 'AttendanceController@deleteAttendance');
    Route::post('editAttendance', 'AttendanceController@editAttendance');

});
