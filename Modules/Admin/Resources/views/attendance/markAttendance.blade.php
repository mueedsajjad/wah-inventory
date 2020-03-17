@extends('layouts.master')

@section('content')

    <div id="page-content-wrapper">
    <div class="container-fluid"  id="content" >
        @if(session()->has('save'))
            <div class="alert alert-success" role="alert">
                <strong>Success</strong> {{session()->get('save')}}
            </div>
        @endif
            @if(session()->has('exists'))
                <div class="alert alert-danger" role="alert">
                    <strong>Warning</strong> {{session()->get('exists')}}
                </div>
            @endif

        <div class="row mr-0" >
            <div class="col-md-6 mt-2">
                <div class="card p-3">
                    <div class="d-flex justify-content-between">
                        <div class=""><span class="display-4">Entrance Time</span></div>
                        <div><a href="{{url('admin/attendance')}}" class="btn btn bg-gradient-blue my-3 mx-3">Back</a></div>
                    </div>

                    {{--  Entrance Time --}}
                    <div class="row">
                        <div class="col-12 mt-5">

                            <form action="{{url('admin/checkInAttendanceStore')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Employee Name<span class="text-red">*</span></label>
                                    <select class="browser-default custom-select" name="user_id" required>
                                        <option selected disabled>Select Employee</option >
                                        @foreach($user as $employee)
                                            <option value="{{$employee->id}}"> {{$employee->name}} </option >
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Status<span class="text-red">*</span></label>
                                    <select class="browser-default custom-select" name="status" required>
                                        <option selected disabled> Select </option>
                                            <option value="1"> Present</option >
                                            <option value="0"> Absent</option >
                                    </select>
                                    {{--                                    <label for="exampleInputEmail1">Employee Name<span class="text-red">*</span></label>--}}
                                    {{--                                    <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="Master" required>--}}
                                </div>

{{--                                <div class="form-group">--}}
{{--                                    <label for="exampleInputEmail1">Check In</label>--}}
{{--                                    <input type="time" name="inTime" class="form-control" id="inputEmail3" >--}}
{{--                                </div>--}}

{{--                                <div class="form-group">--}}
{{--                                    <label for="exampleInputEmail1">Entrance Time<span class="text-red">*</span></label>--}}
{{--                                    <input type="time" name="time" class="form-control" id="inputEmail3"  required>--}}

{{--                                    <div class="bootstrap-timepicker">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label>Check In</label>--}}

{{--                                            <div class="input-group date" id="timepicker" data-target-input="nearest">--}}
{{--                                                <input type="text" name="inTime" class="form-control datetimepicker-input" data-target="#timepicker">--}}
{{--                                                <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">--}}
{{--                                                    <div class="input-group-text"><i class="far fa-clock"></i></div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <!-- /.input group -->--}}
{{--                                        </div>--}}
{{--                                        <!-- /.form group -->--}}
{{--                                    </div>--}}

{{--                                </div>--}}

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Automatically,  Date And Time is Saved</label>
{{--                                    <input type="Date" name="date" class="form-control" id="inputEmail3" required>--}}
                                </div>

{{--                                <div class="form-group">--}}
{{--                                    <label for="checkboxSuccess1" class="col-form-label">--}}
{{--                                        Late--}}
{{--                                    </label>--}}

{{--                                    <div class="icheck-danger">--}}
{{--                                        <input type="checkbox" id="checkboxSuccess3" name="late">--}}
{{--                                        <label for="checkboxSuccess3">--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}


                                <div class="text-right">
                                    <a href="{{url('admin/attendance')}}" class="btn btn-default mr-1">Cancel</a>
                                    <button class="btn btn-primary " type="submit"> <i class="fa fa-save pr-1" style="color: white;"></i>Save</button>
                                </div>
                            </form>
                        </div>
                    </div>


                </div>
            </div>
            <div class="col-md-6 mt-2">
                <div class="card p-3">
                    <div class="d-flex justify-content-between">
                        <div class=""><span class="display-4">Departure Time</span></div>
                        <div><a href="{{url('admin/attendance')}}" class="btn bg-gradient-blue my-3 mx-3">Back</a></div>
                    </div>

                    {{------   Departure Time ------}}
                    <div class="row">
                        <div class="col-12 mt-5" >
                            <form  action="{{url('admin/checkOutAttendanceStore')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Employee Name<span class="text-red">*</span></label>
                                    <select class="browser-default custom-select" name="user_id" required>
                                        <option selected disabled> Select Employee </option >
                                         @foreach($user as $employee)
                                            <option value="{{$employee->id}}"> {{$employee->name}} </option >
                                        @endforeach
                                    </select>
                                </div>

{{--                                <div class="form-group">--}}
{{--                                    <label for="exampleInputEmail1">Check Out<span class="text-red">*</span></label>--}}
{{--                                    <input type="time" name="departureTime" class="form-control" id="inputEmail3"  required>--}}
{{--                                </div>--}}

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Automatically,  Date And Departure Time is Saved </label>
{{--                                    <input type="Date" name="date" class="form-control" id="inputEmail3" required>--}}
                                </div>

                                <div class="text-right">
                                    <a href="{{url('admin/attendance')}}" class="btn btn-default mr-1">Cancel</a>
                                    <button class="btn btn-primary " type="submit"> <i class="fa fa-save pr-1" style="color: white;"></i>Save</button>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
