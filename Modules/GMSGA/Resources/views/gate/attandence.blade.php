@extends('layouts.master')

@section('content')

    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title">Gate Dashboard</h3>
                        </div>
                        <div class="card-body dash-menu">
                            <a class="btn btn-app bg-danger" href="{{url('gmsga/gatePassInward')}}">
                                <i class="fas fa-edit"></i> Gate Pass
                            </a>
                            <!--
                                            <a class="btn btn-app bg-danger">
                                              <i class="fas fa-edit"></i> Gate Pass Outward
                                            </a>
                            -->
                            <a class="btn btn-app bg-danger" href="{{url('gmsga/attendance')}}">
                                <i class="fas fa-edit"></i> Attendance
                            </a>
                            <a class="btn btn-app bg-danger" href="{{url('gmsga/security')}}">
                                <i class="fas fa-edit"></i> Security
                            </a>
                            <a class="btn btn-app bg-danger" href="{{url('gmsga/vehicleManagement')}}">
                                <i class="fas fa-edit"></i> Vehicle Management
                            </a>
                            <!--
                                            <a class="btn btn-app bg-light">
                                              <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <a class="btn btn-app bg-light">
                                              <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <a class="btn btn-app bg-light">
                                              <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <a class="btn btn-app bg-light">
                                              <i class="fas fa-edit"></i> Edit
                                            </a>
                            -->
                        </div>
                    </div>
                </div>


                <div class="col-md-12">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Attendance</h3>
                        </div>
                        <div class="card-body">
                            <form action="products.html">


                                <div class="row justify-content-around">

                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Date</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" placeholder="11-02-2020">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Shift</label>
                                            <div class="col-sm-8">
                                                <select class="form-control select2">
                                                    <option selected="selected">Morning</option>
                                                    <option>Evening</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Employee ID</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" placeholder="E001">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Employee Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" placeholder="Khalid Mehmood">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label"></label>

                                            <div class="col-sm-8">
                                                <a href="#" class="btn btn-dark"> Clock In</a>
                                                <a href="#" class="btn btn-dark ml-3"> Clock Out</a>
                                            </div>

                                        </div>





                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Status</label>
                                            <div class="col-sm-8">
                                                <select class="form-control select2">
                                                    <option selected="selected">Present</option>
                                                    <option>Absent</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Leave Type</label>
                                            <div class="col-sm-8">
                                                <select class="form-control select2">
                                                    <option selected="selected">Select</option>
                                                    <option>Sick</option>
                                                    <option>Casual</option>
                                                    <option>Annual</option>
                                                    <option>Upaid</option>
                                                    <option>Others</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="checkboxSuccess2" class="col-sm-4 col-form-label">
                                                Late
                                            </label>
                                            <div class="icheck-success col-sm-8 d-inline">
                                                <input type="checkbox" id="checkboxSuccess2">
                                                <label for="checkboxSuccess1">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="checkboxSuccess1" class="col-sm-4 col-form-label">
                                                Half Day
                                            </label>
                                            <div class="icheck-success col-sm-8 d-inline">
                                                <input type="checkbox" id="checkboxSuccess1">
                                                <label for="checkboxSuccess1">
                                                </label>
                                            </div>
                                        </div>



                                    </div>
                                </div>



                                <div class="row justify-content-around">

                                    <div class="col-md-4">


                                    </div>
                                    <div class="col-md-4">


                                    </div>
                                </div>



                                <div class="row justify-content-around">

                                    <div class="col-md-4">


                                    </div>
                                    <div class="col-md-4">


                                    </div>
                                </div>




                                <div class="row justify-content-around">
                                    <div class="col-md-12">


                                        <div class="card card-secondary">
                                            <div class="card-header">
                                                <h3 class="card-title">Attendance Details</h3>
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body">
                                                <table class="table table-bordered">
                                                    <thead class="bg-light">
                                                    <tr>
                                                        <th>Employee ID</th>
                                                        <th>Employee Name</th>
                                                        <th>Shift</th>
                                                        <th>Leave Type</th>
                                                        <th>Clock In</th>
                                                        <th>Clock Out</th>
                                                        <th>Status</th>
                                                        <th>Duration</th>
                                                        <th>Attendance</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>E001</td>
                                                        <td>Morning</td>
                                                        <td>-</td>
                                                        <td>08:00 AM</td>
                                                        <td>04:00 PM</td>
                                                        <td>Present</td>
                                                        <td>8 Hours</td>
                                                        <td class="project-actions">
                                                            <a class="btn btn-success btn-sm" href="#">
                                                                Marked
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <a class="btn btn-secondary btn-sm mt-3  " href="#">
                                                    <i class="fas mr-2 fa-plus">
                                                        Add Row</i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <a href="#" class="btn btn-danger ml-3 float-right">Cancel</a>
                                        <a href="#" class="btn btn-success ml-3 float-right">Save & Print</a>
                                        <input type="submit" value="Save" class="btn btn-success float-right">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </section>

@endsection
