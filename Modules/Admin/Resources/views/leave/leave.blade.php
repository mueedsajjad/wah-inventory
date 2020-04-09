
@extends('layouts.master')

@section('content')

<section class="content pt-3">
    <div class="container-fluid">

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

        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Leave Application</h3>
                        @if(auth()->user()->can('Apply for Attendance')) 
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-lg">
                            Apply Leave
                        </button>
                        @endif
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>

                            <tr>
                                <th>#No</th>
                                <th>Name</th>
                                <th>Department</th>
                                <th>Days</th>
                                <th>Leave Types</th>
                                <th>Reason</th>
                                <th>Applied On</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $count=0; @endphp
                        @foreach($allLeaves as $leave)
                               @php $count++; @endphp
                            <tr>
                                <td>{{$count}}</td>
                                <td>{{$leave->userName}}</td>
                                <td>{{$leave->name}}</td>
                                <td>{{$leave->days}}</td>
                                <td>{{$leave->leave_name}}</td>
                                <td>{{$leave->reason}}</td>
                                <td>{{$leave->leave_date}}</td>

                                <td>
                                    @if($leave->status==0)
                                    <a href="#" class="btn btn-secondary ml-3">Pending</a>
                                        @elseif($leave->status==1)
                                        <a href="#" class="btn btn-success ml-3">Approved</a>
                                      @elseif($leave->status==2)
                                        <a href="#" class="btn btn-danger ml-3">Rejected</a>
                                    @endif
                                </td>

                                <td>
                                    @if(auth()->user()->can('Accept Leave Request'))
                                        @if($leave->status==0)
                                    <a href="{{url('admin/acceptLeaveRequest/'.$leave->leaveId)}}" class="btn btn-primary ml-1">Accept</a>
                                    <a href="{{url('admin/rejectLeaveRequest/'.$leave->leaveId)}}" class="btn btn-danger ml-1">Reject</a>
                                        @endif
                                    @endif

                                    @if(auth()->user()->can('Accept Leave Request'))
                                            @if($leave->status==0)
                                               <a href="#" class="btn btn-danger  ml-1 deleteMaterial" data-id="{{$leave->leaveId}}" type="button"  data-toggle="modal" data-target="#modal-delete">Delete</a>
                                            @endif
                                                @if($leave->status==1 || $leave->status==2)
                                                    <label>No Action To Perform</label>
                                                @endif
                                    @endif
                                </td>

                            </tr>

                            @endforeach

                            </tbody>

                        </table>
                    </div>

                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-lg">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Apply Leave</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <form action="{{url('admin/leaveStore')}}" method="post">
                                        @csrf

                                        <div class="row justify-content-around">
                                            <div class="col-md-12">
{{--                                                <div class="form-group row">--}}
{{--                                                    <label class="col-sm-4 col-form-label">Employee Name</label>--}}
{{--                                                    <div class="col-sm-8">--}}
{{--                                                        <select class="form-control " name="user_id" required>--}}
{{--                                                            <option selected="selected" disabled>Select</option>--}}
{{--                                                            @foreach($employees as $employee)--}}
{{--                                                            <option value="{{$employee->user_id}}">{{$employee->name}}</option>--}}
{{--                                                            @endforeach--}}
{{--                                                        </select>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}


                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Apply Date</label>
                                                    <div class="col-sm-8">
                                                        <input name="leave_date" type="date" class="form-control" required placeholder="20-02-2020">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Leave Days</label>
                                                    <div class="col-sm-8">
                                                        <input name="days" type="number" class="form-control" value="1" required>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Type of Leave</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control" name="leave_type_id" required>
                                                            <option selected="selected" disabled>Select</option>
                                                            @foreach($leaves as $leave)
                                                            <option value="{{$leave->id}}">{{$leave->leave_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">From</label>
                                                    <div class="col-sm-8">
                                                        <input name="fromDate" type="Date" class="form-control"  required>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">To</label>
                                                    <div class="col-sm-8">
                                                        <input name="toDate" type="Date" class="form-control"  required>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Reason</label>
                                                    <div class="col-sm-8">
                                                        <input name="reason" type="text" class="form-control" placeholder="Emergency" required>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label"></label>
                                                    <div class="col-sm-8">
                                                        <button type="submit" class="btn btn-dark">Submit</button>
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
        <div class="modal fade" id="modal-lg1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Apply Leave</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h5>ID</h5>
                                            <h5>Name</h5>
                                            <h5>Dates</h5>
                                            <h5>Leave Days</h5>
                                            <h5>Type</h5>
                                            <h5>Reason</h5>
                                            <h5>Applied On</h5>
                                            <h5>Status</h5>
                                        </div>
                                        <div class="col-md-8">
                                            <h5>0001</h5>
                                            <h5>Mohib</h5>
                                            <h5>21-Feb-2020 - 27-Feb-2020 </h5>
                                            <h5>7</h5>
                                            <h5>Sick</h5>
                                            <h5>Injured</h5>
                                            <h5>21-Feb-2020</h5>
                                            <h5><a href="#" class="btn btn-secondary">Pending</a></h5>
                                        </div>

                                    </div>
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
    </div>

{{---------------------------------------------  Delete Model    -----------------------------------------}}
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
                                <form action="{{url('admin/deleteLeaveRequest')}}" method="post" enctype="multipart/form-data">
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
</script>
@endsection
