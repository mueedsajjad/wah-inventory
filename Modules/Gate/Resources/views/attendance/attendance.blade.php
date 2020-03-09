@extends('layouts.master')

@section('content')

    <section class="content pt-5">
        <div class="container-fluid">
            <div class="row">


                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Mark Attendance</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Attendance</th>
                                    <th>Check-In / Out Time</th>
                                    <th>Save</th>
                                </tr>
                                </thead>
                                <tbody>

                                <tr>
                                    <td>0001</td>
                                    <td>Nabeel</td>
                                    <td>
                                        <div class="form-group row">
                                            <div class="col-sm-8">
                                                <select class="form-control select2">
                                                    <option selected="selected">Select</option>
                                                    <option>Present</option>
                                                    <option>Absent</option>
                                                </select>
                                            </div>
                                        </div>

                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-primary ml-3">Marked</a>
                                    </td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="bootstrap-timepicker">
                                                    <div class="form-group">
                                                        <label>Check In</label>

                                                        <div class="input-group date" id="timepicker" data-target-input="nearest">
                                                            <input type="text" class="form-control datetimepicker-input" data-target="#timepicker">
                                                            <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                                                                <div class="input-group-text"><i class="far fa-clock"></i></div>
                                                            </div>
                                                        </div>
                                                        <!-- /.input group -->
                                                    </div>
                                                    <!-- /.form group -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="checkboxSuccess1" class="col-sm-1 col-form-label">
                                                Late
                                            </label>
                                            <div class="icheck-danger col-sm-8 d-inline">
                                                <input type="checkbox" id="checkboxSuccess3">
                                                <label for="checkboxSuccess3">
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td><a href="#" class="btn btn-success ml-3">Save</a></td>
                                </tr>
                                <tr>
                                    <td>0001</td>
                                    <td>Mohib</td>
                                    <td>
                                        <div class="form-group row">
                                            <div class="col-sm-8">
                                                <select class="form-control select2">
                                                    <option selected="selected">Select</option>
                                                    <option>Present</option>
                                                    <option>Absent</option>
                                                </select>
                                            </div>
                                        </div>

                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-primary ml-3">Marked</a>
                                    </td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="bootstrap-timepicker">
                                                    <div class="form-group">
                                                        <label>Check In</label>

                                                        <div class="input-group date" id="timepicker" data-target-input="nearest">
                                                            <input type="text" class="form-control datetimepicker-input" data-target="#timepicker">
                                                            <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                                                                <div class="input-group-text"><i class="far fa-clock"></i></div>
                                                            </div>
                                                        </div>
                                                        <!-- /.input group -->
                                                    </div>
                                                    <!-- /.form group -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="checkboxSuccess1" class="col-sm-1 col-form-label">
                                                Late
                                            </label>
                                            <div class="icheck-danger col-sm-8 d-inline">
                                                <input type="checkbox" id="checkboxSuccess3">
                                                <label for="checkboxSuccess3">
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td><a href="#" class="btn btn-success ml-3">Save</a></td>
                                </tr>

                                </tbody>
                                <!-- <tfoot>
                                 <tr>
                                   <th>Rendering engine</th>
                                   <th>Browser</th>
                                   <th>Platform(s)</th>
                                   <th>Engine version</th>
                                   <th>CSS grade</th>
                                 </tr>
                                 </tfoot>-->
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>



            </div>
        </div>
    </section>
@endsection
