@extends('layouts.master')

@section('content')

    <div class="content pt-5">
    <div class="container-fluid">
        @if(session()->has('save'))
            <div class="alert alert-success text-center" role="alert">
                <strong>Success</strong> {{session()->get('save')}}
            </div>
        @endif
        @if(session()->has('exists'))
            <div class="alert alert-danger text-center" role="alert">
                <strong>Warning</strong> {{session()->get('exists')}}
            </div>
        @endif
        
        @if(session()->has('leave'))
            <div class="alert alert-danger text-center" role="alert">
                <strong>Warning</strong> {{session()->get('leave')}}
            </div>
        @endif
        
        @if($errors->any())
            <div class="alert alert-danger text-center">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <div class="col-md-12">
            <div class="card p-3">
                <h3>
                    Mark Attendance
                    <a href="{{url('admin/attendance')}}" class="btn btn-secondary btn-sm float-right">Back</a>
                </h3>
            </div>
        </div>

        <div class="row mr-0" >
            <div class="col-md-6 mt-2">
                <div class="card p-3">
                    <div class="card-header">
                        Entrance
                    </div>

                    {{--  Entrance Time --}}
                    <div class="card-body row">
                        <div class="col-12 mt-5">

                            <div class="row form-group">
                                <label class="col-sm-3" for="exampleInputEmail1">Select Employee<span class="text-red">*</span></label>
                                <select class="col-sm-6 browser-default custom-select select2" id="entranceEmployee" name="entranceEmployee" required>
                                    <option selected disabled>Select Employee</option >
                                    @foreach($user as $employee)
                                        @if($employee->id!=1)
                                        <option value="{{$employee->id}}"> {{$employee->name}} </option >
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <form action="{{url('admin/checkInAttendanceStore')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Date</label>
                                    <input readonly  class="form-control" value="{{date('d-m-Y')}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Employee ID</label>
                                    <input  name="entranceEmployeeId" id="entranceEmployeeId" required readonly class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Employee Name</label>
                                    <input readonly class="form-control" id="entranceEmployeeName">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Status<span class="text-red">*</span></label>
                                    <select class="browser-default custom-select" id="entranceEmployeeStatus" name="entranceEmployeeStatus" required>
                                        <option disabled selected> Select </option>
                                        <option value="1"> Present</option>
                                        <option value="0"> Absent</option>
                                        <option value="2"> Leave</option>
                                    </select>
                                </div>
                                <!-- <div class="form-group" id="entranceEmployeeTimeDiv" style="display: none;">
                                    <label for="exampleInputEmail1">Entrance Time<span class="text-red">*</span></label>
                                    <input class="form-control" type="time" name="entranceEmployeeTime">
                                </div> -->
{{--                                <div class="row form-group">--}}
{{--                                    <label for="checkboxSuccess1" class="col-form-label">--}}
{{--                                        Late--}}
{{--                                    </label>--}}

{{--                                    <div class="icheck-danger ml-3">--}}
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
                    <div class="card-header">
                        Departure
                    </div>

                    {{------   Departure Time ------}}
                    <div class="card-body row">
                        <div class="col-12 mt-5" >
                            <div class="row form-group">
                                <label class="col-md-3" for="exampleInputEmail1">Select Employee<span class="text-red">*</span></label>
                                <select class="col-md-6 browser-default custom-select select2" id="departureEmployee" name="departureEmployee" required>
                                    <option selected disabled>Select Employee</option >
                                    @foreach($todayUsers as $employee)
                                        <option value="{{$employee->id}}"> {{$employee->name}} </option >
                                    @endforeach
                                </select>
                            </div>
                            <form  action="{{url('admin/checkOutAttendanceStore')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Date</label>
                                    <input readonly  class="form-control" value="{{date('d-m-Y')}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Employee ID</label>
                                    <input  name="departureEmployeeId" id="departureEmployeeId" required readonly class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Employee Name</label>
                                    <input readonly class="form-control" id="departureEmployeeName">
                                </div>
                                <!-- <div class="form-group">
                                    <label for="exampleInputEmail1">Departure Time<span class="text-red">*</span></label>
                                    <input class="form-control" required type="time" name="departureEmployeeTime">
                                </div> -->

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

<script>
    $('#entranceEmployeeStatus').on("change", function(e) {
        var status = $("#entranceEmployeeStatus").val();

        if(status==0){
            $('#entranceEmployeeTimeDiv').hide();
        }
        else if(status==1){
            $('#entranceEmployeeTimeDiv').show();
        }
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#entranceEmployee').on("change", function(e) {
        var id=$("#entranceEmployee").val();

        $.ajax({
            type:'POST',
            url:'{{url('admin/entranceEmployeeDetails')}}',
            data:{'id': id},
            success: function(data) {
                data=JSON.parse(data);
                var name =data.name;
                var id= data.id;

                $('#entranceEmployeeId').val(id);
                $('#entranceEmployeeName').val(name);
            },
            error: function (data) {
                var errors = data.responseJSON;
            }
        });
    });

    $('#departureEmployee').on("change", function(e) {
        var id=$("#departureEmployee").val();

        $.ajax({
            type:'POST',
            url:'{{url('admin/departureEmployeeDetails')}}',
            data:{'id': id},
            success: function(data) {
                data=JSON.parse(data);
                var name =data.name;
                var id= data.id;

                $('#departureEmployeeId').val(id);
                $('#departureEmployeeName').val(name);
            },
            error: function (data) {
                var errors = data.responseJSON;
            }
        });
    });
</script>
@endsection
