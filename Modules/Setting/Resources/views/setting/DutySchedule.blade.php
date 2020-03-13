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
                    <strong>Fail</strong> {{session()->get('exists')}}
                </div>
            @endif

            @if(session()->has('delete'))
                <div class="alert alert-success" role="alert">
                    <strong>Success</strong> {{session()->get('delete')}}
                </div>
            @endif


            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card card-danger card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-edit"></i>
                                Setting
                            </h3>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-5 col-sm-3">
                                    <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                                        <a class="nav-link active" id="vert-tabs-home-tab" data-toggle="pill" href="#vert-tabs-home" role="tab" aria-controls="vert-tabs-home" aria-selected="false">Duty Schedule</a>
                                    </div>
                                </div>

                                <div class="col-7 col-sm-9">
                                    <div class="tab-content" id="vert-tabs-tabContent">
                                        <div class="tab-pane text-left fade active show" id="vert-tabs-home" role="tabpanel" aria-labelledby="vert-tabs-home-tab">
                                            <h4>Office Duty Schedule</h4>

                                            <table class="table table-bordered col-md-3">
                                                <tbody>
                                                <tr>
                                                    <td>Starting Time</td>
                                                    <td>Closing Time</td>
                                                    <td>Working Days</td>
                                                    <td></td>
                                                </tr>
                                                @foreach($duty as $duties)
                                                    <tr>
                                                        <td>{{$duties->in_time}}</td>
                                                        <td>{{$duties->out_time}}</td>
                                                        <td>{{$duties->day}}</td>
                                                        <td><a class="text-danger deleteMaterial"  data-id="{{$duties->id}}"   data-toggle="modal" data-target="#modal-delete" type="button" id="deleteMaterial"><i class="fa fa-trash"></i></a></td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>

                                                @if(count($duty))
                                                    @else
                                                <button href="#" data-toggle="modal" data-target="#modal-credit" ><i class="fa fa-plus fa-1x mr-1"></i>Add new Duty Schedule</button>
                                            @endif

                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- /.card -->
                    </div>
                </div>

            </div>

        </div>

    </section>


    {{--  Duty Schedule modal --}}
    <div class="modal fade" id="modal-credit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Duty Schedule</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{url('setting/dutyScheduleStore')}}" method="post">
                    @csrf
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="exampleInputPassword1">Starting Time</label>
                            <input type="time" name="startingTime" class="form-control" id="exampleInputPassword1"  required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Closing Time</label>
                            <input type="time" name="closingTime" class="form-control" id="exampleInputPassword1"  required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Days in Week</label>
                            <input type="number" name="days" class="form-control" id="exampleInputPassword1"  required>
                        </div>
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div class="modal fade" id="modal-delete">
        <div class="modal-dialog modal-lg">
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
                                <form action="{{url('setting/deletedutySchedule')}}" method="post" enctype="multipart/form-data">
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


     <script>
        $('.deleteMaterial').click(function () {
            var id=$(this).data("id");
            console.log(id);
            $('#materialId').val(id);
        });
        </script>
@endsection
