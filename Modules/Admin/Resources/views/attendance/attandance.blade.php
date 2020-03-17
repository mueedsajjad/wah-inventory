@extends('layouts.master')

@section('content')


    <section class="content pt-5">
        <div class="container-fluid">

            @if(session()->has('save'))
                <div class="alert alert-success" role="alert">
                    <strong>Success</strong> {{session()->get('save')}}
                </div>
            @endif

            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Mark Employee Attendance</h3>
                            <a href="{{url('admin/attendanceMark')}}" class="btn btn-primary float-right" >Mark Attendance </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-striped" id="pageTable">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Attendance</th>
                                    <th>Check-In Time</th>
                                    <th>Check-Out Time</th>
                                    <th>Duty Hours</th>
{{--                                    <th>Remaining Hours</th>--}}
                                    <th>Performed Hours</th>
                                    <th>OverTime</th>
                                    <th>Date</th>
                                    <th> </th>

                                </tr>
                                </thead>
                                <tbody>

                                @foreach($attendances as $attendance)
                                    <tr>
                                        <td>{{$attendance->userId}}</td>
                                        <td>{{$attendance->name}}</td>
                                        <td>
                                            @if($attendance->status==1)
                                                Present
                                            @endif
                                            @if($attendance->status==0)
                                                Absent
                                            @endif
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-primary ml-3">Marked</a>
                                        </td>

                                        <td>
                                            {{$attendance->inTime}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label for="checkboxSuccess1" class="col-sm-2 col-form-label">--}}
{{--                                                    Late--}}
{{--                                                </label>--}}
{{--                                                @if($attendances->late==1)--}}
{{--                                                    <div class="icheck-danger col-sm-8 d-inline">--}}
{{--                                                        <input type="checkbox" id="checkboxSuccess3" checked>--}}
{{--                                                        <label for="checkboxSuccess3">--}}
{{--                                                        </label>--}}
{{--                                                    </div>--}}
{{--                                                @endif--}}

{{--                                                @if($attendances->late==0)--}}
{{--                                                    <div class="icheck-danger col-sm-8 d-inline">--}}
{{--                                                        <input type="checkbox" id="checkboxSuccess3" >--}}
{{--                                                        <label for="checkboxSuccess3">--}}
{{--                                                        </label>--}}
{{--                                                    </div>--}}
{{--                                                @endif--}}
{{--                                            </div>--}}
                                        </td>
                                        <td>
                                                                {{$attendance->outTime}}

                                            {{--                                            <div class="form-group row">--}}
                                            {{--                                                <label for="checkboxSuccess1" class="col-sm-2 col-form-label">--}}
                                            {{--                                                    Late--}}
                                            {{--                                                </label>--}}
                                            {{--                                                @if($attendances->late==1)--}}
                                            {{--                                                    <div class="icheck-danger col-sm-8 d-inline">--}}
                                            {{--                                                        <input type="checkbox" id="checkboxSuccess3" checked>--}}
                                            {{--                                                        <label for="checkboxSuccess3">--}}
                                            {{--                                                        </label>--}}
                                            {{--                                                    </div>--}}
                                            {{--                                                @endif--}}

                                            {{--                                                @if($attendances->late==0)--}}
                                            {{--                                                    <div class="icheck-danger col-sm-8 d-inline">--}}
                                            {{--                                                        <input type="checkbox" id="checkboxSuccess3" >--}}
                                            {{--                                                        <label for="checkboxSuccess3">--}}
                                            {{--                                                        </label>--}}
                                            {{--                                                    </div>--}}
                                            {{--                                                @endif--}}
                                            {{--
                                                                                       </div>--}}

                                        </td>
                                        @php $overtime=$totalPerforminingHour[$attendance->userId]-$totalHours; @endphp
                                        @php $hours=$totalHours-$totalPerforminingHour[$attendance->userId]; @endphp

                                        <td>{{$totalHours}}</td>
{{--                                        @if($hours<0)--}}
{{--                                        <td>0</td>--}}
{{--                                        @else--}}
{{--                                        <td>{{$hours}}</td>--}}
{{--                                        @endif--}}
                                        <td>{{$totalPerforminingHour[$attendance->userId]}}:{{$nettimes[$attendance->userId]}}</td>

                                        @if($overtime<0 || $nettimes[$attendance->userId]<0)
                                            <td>00</td>
                                        @else
                                        <td>{{$overtime}}:{{$nettimes[$attendance->userId]}}</td>
                                        @endif
                                        <td>{{$attendance->date}}</td>
                                        <td>
{{--                                            <a href="#" class="btn btn-success btn-sm ml-1 editAttendance" type="button" data-toggle="modal" data-target="#modal-edit"--}}
{{--                                               data-id="{{$attendance->attendance_id}}" data-name="{{$attendance->name}}"--}}
{{--                                               data-userid="{{$attendance->userId}}"  data-status="{{$attendance->status}}"--}}
{{--                                               data-intime="{{$attendance->inTime}}"  data-outtime="{{$attendance->outTime}}"--}}
{{--                                               data-date="{{$attendance->date}}" >--}}
{{--                                                <i class="fa fa-edit pr-1"></i>--}}
{{--                                                Edit--}}
{{--                                            </a>--}}

                                            <a href="#" class="btn btn-danger btn-sm ml-1 deleteMaterial" data-id="{{$attendance->attendance_id}}" type="button"  data-toggle="modal" data-target="#modal-delete"><i class="fa fa-trash pr-1" class="text-red"></i>Delete</a>
                                        </td>
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

        <div class="modal fade" id="modal-delete">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Record</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <form action="{{url('admin/deleteAttendance')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" value="" id="materialId">
                                        <label> Do you want to delete Record?</label>
                                        <div class="row justify-content-around">

                                            <div class="col-md-12">

                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <button  type="button" class="btn btn-default float-right"  data-dismiss="modal" >No</button>
                                                        <button type="submit" class="btn btn-danger float-right mr-1">Yes</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        <div class="modal fade" id="modal-edit">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Attendance</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-body">

                                    <form action="{{url('admin/editAttendance')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" value="" id="Id">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Employee Name<span class="text-red">*</span></label>
                                            <select class="browser-default custom-select" name="user_id" id="name" required>
                                                <option >  </option >
                                                @foreach($user as $employee)
                                                    <option value="{{$employee->id}}"> {{$employee->name}} </option >
                                                @endforeach
                                            </select>
                                        </div>


                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Status<span class="text-red">*</span></label>
                                            <select class="browser-default custom-select" name="status" required id="status">
                                                <option value="1"> Present</option >
                                                <option value="0"> Absent</option >
                                            </select>

                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Check In</label>
                                            <input type="time"  name="inTime" class="form-control" value="" id="inTime">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Check Out</label>
                                            <input type="time" name="departureTime" value="" class="form-control" id="inputEmail3" id="departureTime" >
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Date<span class="text-red">*</span></label>
                                            <input type="Date" name="date" value="" class="form-control" id="date" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Late<span class="text-red">*</span></label>
                                            <select class="browser-default custom-select" name="late" id="late" required>
                                                <option value="1"> Present</option >
                                                <option value="0"> Absent</option >
                                            </select>

                                        </div>
                                        {{--                                            <div class="form-group">--}}
                                        {{--                                                <label for="checkboxSuccess1" class="col-form-label">--}}
                                        {{--                                                    Late--}}
                                        {{--                                                </label>--}}

                                        {{--                                                <div class="icheck-danger">--}}
                                        {{--                                                    <input type="checkbox" id="checkboxSuccess3" name="late" id="late">--}}
                                        {{--                                                    <label for="checkboxSuccess3">--}}
                                        {{--                                                    </label>--}}
                                        {{--                                                </div>--}}
                                        {{--                                            </div>--}}

                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <button type="submit" class="btn btn-success float-right mr-1">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>

                        </div>
                    </div>
                    <!--
                                <div class="modal-footer justify-content-between">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                    -->
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </section>

    <script>
        $('.deleteMaterial').click(function () {
            var id=$(this).data("id");
            //console.log(id);
            $('#materialId').val(id);
        });


        $('.editAttendance').click(function () {
            // ----- get values into variables --------- //
            var id=$(this).data("id");
            $('#Id').val(id);
            var userId=$(this).data("userid");
            $('#name').select2().val(userId).trigger("change");
            var status=$(this).data("status");
            $('#status').select2().val(status).trigger("change");
            var inTime=$(this).data("intime");
            $('#inTime').val(inTime);
            var departureTime=$(this).data("outtime");
            $('#departureTime').val(departureTime);
            var date=$(this).data("date");
            $('#date').val(date);
            var late=$(this).data("late");
            // console.log(late);
            $('#late').val(late);
        });
    </script>
@endsection
