@extends('layouts.master')

@section('content')
    <section class="content pt-3">
        <div class="container-fluid ">

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
                                        <a class="nav-link active" id="vert-tabs-home-tab" data-toggle="pill" href="#vert-tabs-home" role="tab" aria-controls="vert-tabs-home" aria-selected="false">Credit Terms</a>
                                        <a class="nav-link" id="vert-tabs-profile-tab" data-toggle="pill" href="#vert-tabs-profile" role="tab" aria-controls="vert-tabs-profile" aria-selected="false">States</a>
                                        <a class="nav-link" id="vert-tabs-messages-tab" data-toggle="pill" href="#vert-tabs-messages" role="tab" aria-controls="vert-tabs-messages" aria-selected="false">City</a>
                                        <a class="nav-link " id="vert-tabs-settings-tab" data-toggle="pill" href="#vert-tabs-settings" role="tab" aria-controls="vert-tabs-settings" aria-selected="true">Payment Terms</a>
                                    </div>
                                </div>
                                <div class="col-7 col-sm-9">
                                    <div class="tab-content" id="vert-tabs-tabContent">
                                        <div class="tab-pane text-left fade active show" id="vert-tabs-home" role="tabpanel" aria-labelledby="vert-tabs-home-tab">
                                            <h4>Credit Terms</h4>

                                            <table class="table table-bordered col-md-3">
                                                <tbody>
                                                @foreach($credit as $credits)
                                                    <tr>
                                                        <td>{{$credits->name}}</td>
                                                        <td><a class="text-danger" href="{{url('setting/creditDelete/'. $credits->id)}}"><i class="fa fa-trash"></i></a></td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>

                                            <a href="#" data-toggle="modal" data-target="#modal-credit" ><i class="fa fa-plus fa-1x mr-1"></i> Add new Credit Term</a>
                                        </div>
                                        <div class="tab-pane fade" id="vert-tabs-profile" role="tabpanel" aria-labelledby="vert-tabs-profile-tab">
                                            <h4>States</h4>
{{--                                                                                        <p>The categories here can be assigned to items for better organizing and grouping of products and materials.</p>--}}
                                            <table class="table table-bordered col-md-3">
                                                <tbody>
                                                @foreach($state as $states)
                                                    <tr>
                                                        <td>{{$states->name}}</td>
                                                        <td><a class="text-danger" href="{{url('setting/stateDelete/'.$states->id)}}"><i class="fa fa-trash"></i></a></td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                            <a href="#" data-toggle="modal" data-target="#modal-state" ><i class="fa fa-plus fa-1x mr-1"></i> Add new State</a>
                                        </div>

                                        <div class="tab-pane fade" id="vert-tabs-messages" role="tabpanel" aria-labelledby="vert-tabs-messages-tab">
                                            <h4>Cities</h4>
{{--                                                                                        <p>You can reorder Operations in this list. The same order is used in the selection menu when choosing a Production Operation for a product.</p>--}}
                                            <table class="table table-bordered col-md-3">
                                                <tbody>


                                                @foreach($city as $cities)

                                                    <tr>
                                                        <td>{{$cities->name}}</td>
                                                        <td>{{$cities->state_name}}</td>
                                                        <td><a class="text-danger" href="{{url('setting/cityDelete/'.$cities->id)}}"><i class="fa fa-trash"></i></a></td>
                                                    </tr>

                                                @endforeach
                                                </tbody>
                                            </table>
                                            <a href="#" data-toggle="modal" data-target="#modal-city" ><i class="fa fa-plus fa-1x mr-1"></i> Add new City</a>
                                        </div>

                                        <div class="tab-pane fade" id="vert-tabs-settings" role="tabpanel" aria-labelledby="vert-tabs-settings-tab">
                                            <h4>Payment Terms</h4>

                                            <table class="table table-bordered col-md-3">
                                                <tbody>
                                                @foreach($payment as $payments)
                                                    <tr>
                                                        <td>{{$payments->name}}</td>
                                                        <td><a class="text-danger" href="{{url('setting/paymentDelete/'.$payments->id)}}"><i class="fa fa-trash"></i></a></td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>

                                            <a href="#" data-toggle="modal" data-target="#modal-payment" ><i class="fa fa-plus fa-1x mr-1"></i> Add new Payment Term</a>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- /.card -->
                    </div>          </div>

            </div>

        </div>

    </section>


    {{--  unit modal --}}
    <div class="modal fade" id="modal-credit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Credit Terms</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{url('setting/creditStore')}}" method="post">
                    @csrf
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="exampleInputPassword1">Credit Term Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputPassword1" placeholder="Credit Term Name" required>
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
    {{--  Category modal --}}
    <div class="modal fade" id="modal-state">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{url('setting/stateStore')}}" METHOD="post">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">State</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputPassword1">State Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputPassword1" placeholder="State Name" required>
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
    {{--  Operation modal --}}
    <div class="modal fade" id="modal-city">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">City</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{url('setting/cityStore')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputPassword1">City Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputPassword1" placeholder="City Name" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Select State</label>
                                <select class="form-control select2" name="state_id">
                                    <option selected="selected" disabled>Select State</option>
                                    @foreach($state as $states)
                                    <option value="{{$states->id}}">{{$states->name}} </option>
                                    @endforeach

                                </select>

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
    {{--  Store modal --}}
    <div class="modal fade" id="modal-payment">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Payment Terms</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{url('setting/paymentStore')}}">
                    @csrf
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="exampleInputPassword1">Payment Terms</label>
                            <input type="text" name="name" class="form-control" id="exampleInputPassword1" placeholder="Payment Terms" required>
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
@endsection
