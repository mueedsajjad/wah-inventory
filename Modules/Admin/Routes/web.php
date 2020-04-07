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
    Route::get('/hr', 'AdminController@index');

    Route::get('employee', 'AdminController@employee');
    Route::post('employeeStore', 'AdminController@employeeStore');
    Route::post('employeeUnderManagerStore', 'AdminController@employeeUnderManagerStore');
    Route::get('employeeDetail/{id}', 'AdminController@employeeDetail');
    Route::get('employeeDelete/{id}', 'AdminController@employeeDelete');
    Route::post('employeeEdit', 'AdminController@employeeEdit');

    Route::post('departmentStore', 'AdminController@departmentStore');

    // ----------------------- Reports --------------------------------- //
    Route::get('employeeReport', 'AdminController@employeeReport');


    Route::get('salary', 'AdminController@salary');
    Route::get('salaryEmployee', 'AdminController@salaryEmployee');
    Route::post('employeeSalaryDetails', 'AdminController@employeeSalaryDetails');
    Route::post('salaryStore', 'AdminController@salaryStore');


    Route::get('advance', 'AdminController@advance');

    Route::get('report', 'AdminController@report');
    Route::get('attedanceReport', 'AttendanceController@attedanceReport');
    Route::post('attendanceMWD', 'AttendanceController@attendanceMWD');

// ----------------------- attendance Controller ----------------------- //
    Route::get('attendance', 'AttendanceController@attendance');

    Route::get('attendance/attendanceMark', 'AttendanceController@attendanceMark');
    Route::post('entranceEmployeeDetails', 'AttendanceController@entranceEmployeeDetails');
    Route::post('departureEmployeeDetails', 'AttendanceController@departureEmployeeDetails');

    Route::post('checkInAttendanceStore', 'AttendanceController@checkInAttendanceStore');
    Route::post('checkOutAttendanceStore', 'AttendanceController@checkOutAttendanceStore');

    Route::post('deleteAttendance', 'AttendanceController@deleteAttendance');
    Route::post('editAttendance', 'AttendanceController@editAttendance');

    // ----------------------- Leave Controller ----------------------- //
    Route::get('leave', 'LeaveController@leave');

    Route::get('leaveOfficer', 'LeaveController@leaveOfficer');
    Route::post('leaveStore', 'LeaveController@leaveStore');

    Route::get('acceptLeaveRequest/{id}', 'LeaveController@acceptLeaveRequest');
    Route::get('rejectLeaveRequest/{id}', 'LeaveController@rejectLeaveRequest');




});
