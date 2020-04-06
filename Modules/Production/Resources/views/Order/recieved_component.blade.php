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

                            <div class="row">
                                <div class="col-12">
                                    <!-- /.card -->

                                    <div class="card">
                                        <!--                                          <div class="card-header">-->
                                        <!--                                            <h3 class="card-title">DataTable with default features</h3>-->
                                        <!--                                          </div>-->
                                        <!-- /.card-header -->

                                        <div class="card-body">
                                            <table id="pageTable" class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>Sr</th>
                                                    <th>Component Name</th>
                                                    <th>Quantity</th>
                                                    <th>Issue Date</th>
                                                    <th>Created Date</th>
                                                    <th>Status</th>
                                                    <th>Action</th>

                                                </tr>
                                                </thead>
                                                <tbody>

                                                @php $n=0; @endphp
                                                @foreach($orders as $order)

                                                    @if($order->status==0 || $order->status==1||$order->status==2 ||$order->status==3 ||$order->status==5 )
                                                        @php $n++; @endphp

                                                        <tr>
                                                            <td>{{$n}}</td>
                                                            <td>{{$order->component_name}}</td>

                                                            <td>{{$order->quantity}}</td>
                                                            <td>{{$order->issue_date}}</td>
                                                            <td>{{$order->create_date}}</td>
                                                            @if($order->status==0)
                                                            <td class="bg-default">
                                                                <span>  Not approved yet </span>
                                                            </td>
                                                         @elseif($order->status==1)
                                                                <td class="bg-success">
                                                                    <span> Approved </span>
                                                                </td>
                                                        @endif

                                                        @if($order->status==2)
                                                                <td class="bg-danger">
                                                                    <span> Rejected </span>
                                                                </td>
                                                        @endif

                                                            @if($order->status==3)
                                                                <td class="bg-success">
                                                                    <span> Received from  </span>
                                                                </td>
                                                            @endif

                                                            @if($order->status==5)
                                                                <td class="bg-success">
                                                                    <span> Done </span>
                                                                </td>
                                                            @endif

                                                            <!--
                                                                                                           <td class="bg-success text-center"><a href="#">Available</a></td>-->
                                                             @if($order->status==3)
                                                                <td class="bg-light text-center">
                                                                    <div class="form-group m-0">

                                                                        <form action="{{url('production/receiveComponent')}}" method="post">
                                                                            @csrf
                                                                        <input type="hidden" name="id" value="{{$order->id}}">
                                                                        <input type="hidden" name="name" value="{{$order->component_name}}">

                                                                        <input type="submit" value="Receive Components" class="btn bnt-md btn-primary ml-1">

                                                                        </form>
                                                                        </div>
                                                                        </td>
                                                              @endif

                                                                            @if($order->status==2)
                                                                            <td class="bg-danger">
                                                                                <span > Nothing to Perform</span>
                                                                                </td>
                                                                            @endif
                                                                            @if($order->status==0)
                                                                            <td class="bg-primary">
                                                                            <span> waiting</span>
                                                                            </td>
                                                                             @endif
                                                            @if($order->status==1)
                                                                <td class="bg-primary">
                                                                    <span> waiting from Store</span>
                                                                </td>
                                                            @endif

                                                            @if($order->status==5)
                                                                <td class="bg-primary">
                                                                    <span> Done </span>
                                                                </td>
                                                            @endif

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
                            <!-- /.card -->
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </section>

@endsection




