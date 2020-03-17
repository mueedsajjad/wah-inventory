@extends('layouts.master')


@section('content')

    <section class="content pt-3">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    @if(session()->has('save'))
                        <div class="alert alert-success" role="alert">
                            <strong>Success</strong> {{session()->get('save')}}
                        </div>
                    @endif
                    <div class="card-no-border">
                        <div class="card bg-transparent card-danger card-outline card-outline-tabs">
                            <div class="card-header p-0 border-bottom-0">
                                <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Schedule</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Tasks</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="card-body p-0 bg-transparent">
                                <div class="tab-content" id="custom-tabs-three-tabContent">
                                    <div class="tab-pane fade active show" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">


                                        <div class="row mt-3">
                                            <div class="col-12">
                                                <div class="production1">
                                                    <div class="card card-danger card-outline card-outline-tabs">
                                                        <div class="card-header p-0 border-bottom-0">
                                                            <ul class="nav nav-tabs" id="production-tab" role="tablist">
                                                                <li class="nav-item">
                                                                    <a class="nav-link active" id="schedule-open" data-toggle="pill" href="#pro-open" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Open</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link" id="schedule-done" data-toggle="pill" href="#prodone" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Done</a>
                                                                </li>
                                                            </ul>
                                                        </div>

                                                        <div class="card-body bg-transparent">
                                                            <div class="tab-content" id="schedule-open1">
                                                                <div class="tab-pane fade active show" id="pro-open" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">

                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <!-- /.card -->

                                                                            <div class="card">
                                                                                <!--                                          <div class="card-header">-->
                                                                                <!--                                            <h3 class="card-title">DataTable with default features</h3>-->
                                                                                <!--                                          </div>-->
                                                                                <!-- /.card-header -->

                                                                                <div class="card-body">
                                                                                    <table id="example1" class="table table-bordered">
                                                                                        <thead>
                                                                                        <tr>
                                                                                            <th>Sr</th>
                                                                                            <th>Order #</th>
                                                                                            <th>Product</th>
                                                                                            <th>Quantity</th>
                                                                                            <th>Production Deadline</th>
                                                                                            <th>Ingredients</th>
                                                                                            <th>Production</th>
                                                                                            @if(auth()->user()->can('Production Process'))
                                                                                            <th>Operations</th>
                                                                                            @endif
                                                                                        </tr>
                                                                                        </thead>
                                                                                        <tbody>
{{--                                                                                        <tr>--}}
{{--                                                                                            <td>1</td>--}}
{{--                                                                                            <td><a href="new-prodution-order.html">MO-1</a></td>--}}
{{--                                                                                            <td>12 Gauge Bullet</td>--}}
{{--                                                                                            <td>82192</td>--}}
{{--                                                                                            <td>20hrs</td>--}}
{{--                                                                                            <td>27-Feb-2020</td>--}}
{{--                                                                                            <td class="bg-danger"><button type="button" class="btn text-white" data-toggle="modal" data-target="#modal-default">--}}
{{--                                                                                                    Not Available--}}
{{--                                                                                                </button></td>--}}
{{--                                                                                            <!--                                                <td class="bg-success text-center"><a href="#">Available</a></td>-->--}}
{{--                                                                                            <td class="bg-light text-center">--}}
{{--                                                                                                <div class="form-group m-0">--}}
{{--                                                                                                    <select class="custom-select">--}}
{{--                                                                                                        <option selected>Not Started</option>--}}
{{--                                                                                                        <option>Blocked</option>--}}
{{--                                                                                                        <option>Work In Progress</option>--}}
{{--                                                                                                        <option>Done</option>--}}
{{--                                                                                                    </select>--}}
{{--                                                                                                </div>--}}


{{--                                                                                            </td>--}}
{{--                                                                                        </tr>--}}

                                                                                    @php $n=0; @endphp
                                                                                    @foreach($orders as $order)

                                                                                        @if($order->status==0 || $order->status==1||$order->status==2)
                                                                                            @php $n++; @endphp
                                                                                        <tr>
                                                                                            <td>{{$n}}</td>
                                                                                            <td><a href="{{url('production/processStatus')}}">{{$order->manufacturing_order}}</a></td>
                                                                                            <td>{{$order->product}}</td>
                                                                                            <td>{{$order->quantity}}</td>
                                                                                            <td>{{$order->production_deadline}}</td>


                                                                                            <td class="bg-success">
                                                                                                <button type="button" class="btn text-white" data-toggle="modal" data-target="#modal-default">
                                                                                                    In Stock
                                                                                                </button>

                                                                                            </td>
                                                                                            <!--
                                                                                                                                           <td class="bg-success text-center"><a href="#">Available</a></td>-->


                                                                                            <form action="{{url('production/processStatus')}}" method="post">
                                                                                                @csrf
                                                                                            <td class="bg-light text-center">
                                                                                                <div class="form-group m-0">

                                                                                                        <input type="hidden" name="id" value="{{$order->id}}">
                                                                                                    <select class="custom-select" name="status">

                                                                                                        @if($order->status==0)
                                                                                                            <option value="{{$order->status}}">Not Started</option>
                                                                                                        @endif
                                                                                                            @if($order->status==1)
                                                                                                                <option value="{{$order->status}}">Work In Progress</option>
                                                                                                            @endif

                                                                                                            @if($order->status==2)
                                                                                                                <option value="{{$order->status}}">Blocked</option>
                                                                                                            @endif

                                                                                                            @if($order->status==3)
                                                                                                                <option value="{{$order->status}}">Done</option>
                                                                                                            @endif

                                                                                                        <option value="3">Done</option>
                                                                                                        <option value="0">Not Started</option>
                                                                                                        <option value="2">Blocked</option>
                                                                                                        <option value="1">Work In Progress</option>

                                                                                                    </select>


                                                                                                </div>


                                                                                            </td>
                                                                                               @if(auth()->user()->can('Production Process'))
                                                                                             <td><input type="submit" value="Chanage Process" class="btn bnt-md btn-primary ml-1"></td>
                                                                                                   @endif
                                                                                            </form>
                                                                                        </tr>
                                                                                        @endif
                                                                                      @endforeach
                                                                                        </tbody>

                                                                                    </table>
                                                                                </div>
                                                                                <!-- /.card-body -->
                                                                            </div>
                                                                            <!-- /.card -->
                                                                        </div>
                                                                        <!-- /.col -->
                                                                    </div>


                                                                </div>
                                                                <div class="tab-pane fade" id="prodone" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">

                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <!-- /.card -->

                                                                            <div class="card">
                                                                                <!--                                          <div class="card-header">-->
                                                                                <!--                                            <h3 class="card-title">DataTable with default features</h3>-->
                                                                                <!--                                          </div>-->
                                                                                <!-- /.card-header -->
                                                                                <div class="card-body">
                                                                                    <table id="example2" class="table table-bordered ">
                                                                                        <thead>
                                                                                        <tr>
                                                                                            <th>Sr</th>
                                                                                            <th>Order #</th>
                                                                                            <th>Product</th>
                                                                                            <th>Quantity</th>
                                                                                            <th>Total Cost</th>
                                                                                            <th>Done Date</th>
                                                                                            <th>Status</th>
                                                                                            <th>Type</th>
                                                                                            @if(auth()->user()->can('Product Transfer'))
                                                                                            <th>Transfer To Store</th>
                                                                                            @endif

                                                                                        </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                        @php $n=0; @endphp
                                                                                        @foreach($orders as $order)

                                                                                            @if($order->status==3 || $order->status==4)
                                                                                                @php $n++; @endphp
                                                                                        <tr>
                                                                                            <td>{{$n}}</td>
                                                                                            <td><a href="done-prodution.html">{{$order->manufacturing_order}}</a></td>
                                                                                            <td>{{$order->product}}</td>
                                                                                            <td>{{$order->quantity}}</td>
                                                                                            <td>{{$order->total_cost}}</td>
                                                                                            <td>{{$order->production_deadline}}</td>

                                                                                            <td class="bg-success">
                                                                                                <button type="button" class="btn text-white" data-toggle="modal" data-target="#modal-default">
                                                                                                    Done
                                                                                                </button>
                                                                                            </td>


                                                                                            <form action="{{url('production/transferProduct')}}" method="post">
                                                                                                @csrf
                                                                                                @if(auth()->user()->can('Product Transfer'))
                                                                                                    @if($order->status==4)
                                                                                                        <td class="bg-light text-center">
                                                                                                            <div class="form-group m-0">
                                                                                                                <input type="hidden" name="id" value="{{$order->id}}">
                                                                                                                <select class="custom-select" name="store_id" disabled>
                                                                                                                    <option disabled selected>Select</option>
                                                                                                                    <option value="0">Product</option>
                                                                                                                    <option value="1">Component</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                    @else
                                                                                                        <td class="bg-light text-center">
                                                                                                            <div class="form-group m-0">
                                                                                                                <input type="hidden" name="id" value="{{$order->id}}">
                                                                                                                <select class="custom-select" name="store_id">
                                                                                                                    <option disabled selected>Select</option>
                                                                                                                    <option value="0">Product</option>
                                                                                                                    <option value="1">Component</option>
                                                                                                                </select>
                                                                                                            </div>

                                                                                                        </td>
                                                                                                    @endif

                                                                                                    @if($order->status==4)
                                                                                                        <td class="bg-success">
                                                                                                            <button type="button" class="btn text-white" >
                                                                                                               Transfered To Store
                                                                                                            </button>
                                                                                                        </td>
                                                                                                    @else
                                                                                                        <td><input type="submit" value="Transfer" class="btn bnt-md btn-primary ml-1"></td>
                                                                                                    @endif
                                                                                                @endif
                                                                                            </form>
                                                                                        </tr>
                                                                                        @endif
                                                                                        @endforeach

                                                                                        </tbody>

                                                                                    </table>
                                                                                </div>
                                                                                <!-- /.card-body -->
                                                                            </div>
                                                                            <!-- /.card -->
                                                                        </div>
                                                                        <!-- /.col -->
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- /.card -->
                                                    </div>

                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">

                                        <div class="row mt-3">
                                            <div class="col-12">
                                                <!-- /.card -->

                                                <div class="card">
                                                    <!--                                          <div class="card-header">-->
                                                    <!--                                            <h3 class="card-title">DataTable with default features</h3>-->
                                                    <!--                                          </div>-->
                                                    <!-- /.card-header -->
                                                    <div class="card-body">
                                                        <table id="example3" class="table table-bordered ">
                                                            <thead>

                                                            <tr>
                                                                <th>MO #</th>
                                                                <th>MO Deadline</th>
                                                                <th>Product</th>
                                                                <th>Quantity</th>
                                                                <th>Status</th>

                                                            </tr>

                                                            </thead>
                                                            <tbody>
                                                            @foreach($orders as $order)
                                                                @if($order->status==1 || $order->status==2 || $order->status==3)
                                                            <tr>
                                                                <td><a href="done-prodution.html">{{$order->manufacturing_order}}</a></td>
                                                                <td>{{$order->production_deadline}}</td>
                                                                <td>{{$order->product}}</td>
                                                                <td>Tube Extortion Plant</td>

                                                                <td>
                                                                    <div class="d-flex">
                                                                        @if($order->status==2)
                                                                        <div class="p-2 px-3 bg-light">
                                                                            <i class="fa fa-play"></i>
                                                                        </div>
                                                                        @endif
                                                                            @if($order->status==1)
                                                                           <div class="px-3 p-2 bg-yellow">
                                                                            <i class="fa fa-hourglass-half"></i>
                                                                           </div>
                                                                            @endif
                                                                            @if($order->status==3)
                                                                            <div class="d-flex">
                                                                                <div class="p-2 px-3 bg-success">
                                                                                    <i class="fa fa-check"></i>
                                                                                </div>
                                                                            </div>
                                                                            @endif
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><a href="done-prodution.html">{{$order->manufacturing_order}}</a></td>
                                                                <td>{{$order->production_deadline}}</td>
                                                                <td>{{$order->product}}</td>
                                                                <td>Initial Assembly and Printing</td>

                                                                <td>
                                                                    <div class="d-flex">
                                                                        @if($order->status==2)
                                                                            <div class="p-2 px-3 bg-light">
                                                                                <i class="fa fa-play"></i>
                                                                            </div>
                                                                        @endif
                                                                        @if($order->status==1)
                                                                            <div class="px-3 p-2 bg-yellow">
                                                                                <i class="fa fa-hourglass-half"></i>
                                                                            </div>
                                                                        @endif
                                                                        @if($order->status==3)
                                                                            <div class="d-flex">
                                                                                <div class="p-2 px-3 bg-success">
                                                                                    <i class="fa fa-check"></i>
                                                                                </div>
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><a href="done-prodution.html">{{$order->manufacturing_order}}</a></td>
                                                                <td>{{$order->production_deadline}}</td>
                                                                <td>{{$order->product}}</td>
                                                                <td>Loading and Closing</td>

                                                                <td>
                                                                    <div class="d-flex">
                                                                        @if($order->status==2)
                                                                            <div class="p-2 px-3 bg-light">
                                                                                <i class="fa fa-play"></i>
                                                                            </div>
                                                                        @endif
                                                                        @if($order->status==1)
                                                                            <div class="px-3 p-2 bg-yellow">
                                                                                <i class="fa fa-hourglass-half"></i>
                                                                            </div>
                                                                        @endif
                                                                        @if($order->status==3)
                                                                            <div class="d-flex">
                                                                                <div class="p-2 px-3 bg-success">
                                                                                    <i class="fa fa-check"></i>
                                                                                </div>
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                             @endif
                                                            @endforeach

                                                            </tbody>

                                                        </table>
                                                    </div>
                                                    <!-- /.card-body -->
                                                </div>
                                                <!-- /.card -->
                                            </div>
                                            <!-- /.col -->
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </section>

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Default Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="img/stock.png" class="img-fluid" alt="">
                    <!--          <p>One fine body&hellip;</p>-->
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection




