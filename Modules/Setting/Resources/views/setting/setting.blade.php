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
                                Settings
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5 col-sm-3">
                                    <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                                        <a class="nav-link active" id="vert-tabs-home-tab" data-toggle="pill" href="#vert-tabs-home" role="tab" aria-controls="vert-tabs-home" aria-selected="false">Units of measure</a>
                                        <a class="nav-link" id="vert-tabs-profile-tab" data-toggle="pill" href="#vert-tabs-profile" role="tab" aria-controls="vert-tabs-profile" aria-selected="false">Categories</a>
                                        <a class="nav-link" id="vert-tabs-messages-tab" data-toggle="pill" href="#vert-tabs-messages" role="tab" aria-controls="vert-tabs-messages" aria-selected="false">Operations</a>
                                        <a class="nav-link " id="vert-tabs-settings-tab" data-toggle="pill" href="#vert-tabs-settings" role="tab" aria-controls="vert-tabs-settings" aria-selected="true">Stores</a>
                                        <a class="nav-link " id="vert-tabs-departments-tab" data-toggle="pill" href="#vert-tabs-departments" role="tab" aria-controls="vert-tabs-settings" aria-selected="true">Departments</a>
                                    </div>

                                </div>
                                <div class="col-7 col-sm-9">
                                    <div class="tab-content" id="vert-tabs-tabContent">
                                        <div class="tab-pane text-left fade active show" id="vert-tabs-home" role="tabpanel" aria-labelledby="vert-tabs-home-tab">
                                            <h4>Units of measure</h4>

                                            <table class="table table-bordered col-md-3">
                                                <tbody>
                                                @foreach($units as $unit)
                                                <tr>
                                                    <td>{{$unit->name}}</td>
                                                    <td><a class="text-danger" href="{{url('setting/unitDelete/'.$unit->id)}}"><i class="fa fa-trash"></i></a></td>
                                                </tr>
                                                @endforeach
                                                </tbody>
                                            </table>

                                            <a href="#" data-toggle="modal" data-target="#modal-unit" ><i class="fa fa-plus fa-1x mr-1"></i> Add new Unit</a>
                                        </div>
                                        <div class="tab-pane fade" id="vert-tabs-profile" role="tabpanel" aria-labelledby="vert-tabs-profile-tab">
                                            <h4>Categories</h4>
{{--                                            <p>The categories here can be assigned to items for better organizing and grouping of products and materials.</p>--}}
                                            <table class="table table-bordered col-md-3">
                                                <tbody>
                                                @foreach($categories as $category)
                                                <tr>
                                                    <td>{{$category->name}}</td>
                                                    <td><a class="text-danger" href="{{url('setting/categoryDelete/'.$category->id)}}"><i class="fa fa-trash"></i></a></td>
                                                </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                            <a href="#" data-toggle="modal" data-target="#modal-category" ><i class="fa fa-plus fa-1x mr-1"></i> Add new Category</a>
                                        </div>

                                        <div class="tab-pane fade" id="vert-tabs-messages" role="tabpanel" aria-labelledby="vert-tabs-messages-tab">
                                            <h4>Operations</h4>
{{--                                            <p>You can reorder Operations in this list. The same order is used in the selection menu when choosing a Production Operation for a product.</p>--}}
                                            <table class="table table-bordered col-md-3">
                                                <tbody>
                                                @foreach($operations as $operation)
                                                <tr>
                                                    <td>{{$operation->name}}</td>
                                                    <td><a class="text-danger" href="{{url('setting/operationDelete/'.$operation->id)}}"><i class="fa fa-trash"></i></a></td>
                                                </tr>

                                                @endforeach
                                                </tbody>
                                            </table>
                                            <a href="#" data-toggle="modal" data-target="#modal-operation" ><i class="fa fa-plus fa-1x mr-1"></i> Add new Operation</a>
                                        </div>

                                        <div class="tab-pane fade" id="vert-tabs-settings" role="tabpanel" aria-labelledby="vert-tabs-settings-tab">
                                            <h4>Stores</h4>
                                            <table class="table table-bordered col-md-3">
                                                <tbody>
                                                @foreach($stores as $store)

                                                <tr>
                                                    <td>{{$store->name}}</td>
                                                    <td><a class="text-danger" href="{{url('setting/storeDelete/'.$store->id)}}"><i class="fa fa-trash"></i></a></td>
                                                </tr>
                                               @endforeach
                                                </tbody>
                                            </table>

                                            <a href="#" data-toggle="modal" data-target="#modal-store" ><i class="fa fa-plus fa-1x mr-1"></i> Add new Store</a>

                                        </div>
                                        <div class="tab-pane fade" id="vert-tabs-departments" role="tabpanel" aria-labelledby="vert-tabs-settings-tab">
                                            <h4>Departments</h4>
                                            <table class="table table-bordered col-md-3">
                                                <tbody>
                                                @foreach($departments as $department)
                                                    <tr>
                                                        <td>{{$department->name}}</td>
                                                        <td><a class="text-danger" href="{{url('setting/departmentDelete/'.$department->id)}}"><i class="fa fa-trash"></i></a></td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>

                                            <a href="#" data-toggle="modal" data-target="#modal-departments" ><i class="fa fa-plus fa-1x mr-1"></i> Add new Department</a>

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
{{--  unit modal --}}
    <div class="modal fade" id="modal-unit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Unit</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{url('setting/unitStore')}}" method="post">
                    @csrf
                <div class="modal-body">

                        <div class="form-group">
                            <label for="exampleInputPassword1">Unit Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputPassword1" placeholder="Unit Name" required>
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
    <div class="modal fade" id="modal-category">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{url('setting/categoryStore')}}" METHOD="post">
                    @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Category Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputPassword1" placeholder="Category Name" required>
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
    <div class="modal fade" id="modal-operation">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Operation</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{url('setting/operationStore')}}" method="post">
                    @csrf
                <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Operation Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputPassword1" placeholder="Operation Name" required>
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
    <div class="modal fade" id="modal-store">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Store</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{url('setting/storeStore')}}">
                    @csrf
                <div class="modal-body">

                        <div class="form-group">
                            <label for="exampleInputPassword1">Store Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputPassword1" placeholder="Store Name" required>
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
    {{--  Department modal --}}
    <div class="modal fade" id="modal-departments">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Store</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{url('setting/departmentStore')}}">
                    @csrf
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="exampleInputPassword1">Department Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputPassword1" placeholder="Enter ..." required>
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
