@extends('layouts.master')

@section('content')


    <section class="content pt-5">
        <div class="container-fluid">
            <div class="row">


                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Mark Employee Attendance</h3>
                            <a href="{{url('admin/attendanceMark')}}" class="btn btn-primary float-right" >Mark Attendance </a>
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
                                    <th>Date</th>
                                    <th>Save</th>
                                </tr>
                                </thead>
                                <tbody>
                             @foreach($attendance as $attendances)
                                <tr>
                                    <td>{{$attendances->userId}}</td>
                                    <td>{{$attendances->name}}</td>
                                    <td>
                                        @if($attendances->status==1)
                                            Present
                                        @endif
                                            @if($attendances->status==0)
                                               Absent
                                            @endif
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
                                                            <input type="text" value="{{$attendances->inTime}}" class="form-control datetimepicker-input" data-target="#timepicker" disabled>
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

                                            <label for="checkboxSuccess1" class="col-sm-2 col-form-label">
                                                Late
                                            </label>
                                            @if($attendances->late==1)
                                            <div class="icheck-danger col-sm-8 d-inline">
                                                <input type="checkbox" id="checkboxSuccess3" checked>
                                                <label for="checkboxSuccess3">
                                                </label>
                                            </div>
                                            @endif

                                            @if($attendances->late==0)
                                                <div class="icheck-danger col-sm-8 d-inline">
                                                    <input type="checkbox" id="checkboxSuccess3" >
                                                    <label for="checkboxSuccess3">
                                                    </label>
                                                </div>
                                            @endif
                                        </div>
                                    </td>

                                    <td>{{$attendances->date}}</td>
                                    <td><a href="#" class="btn btn-danger ml-3">Delete</a></td>
                                </tr>
@endforeach

                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>



            </div>
        </div>
    </section>
@endsection
