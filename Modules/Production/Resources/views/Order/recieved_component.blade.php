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

                                                    @if($order->status==0 || $order->status==1||$order->status==2)
                                                        @php $n++; @endphp

                                                        <tr>
                                                            <td>{{$n}}</td>
                                                            <td>{{$order->component_name}}</td>

                                                            <td>{{$order->quantity}}</td>
                                                            <td>{{$order->issue_date}}</td>
                                                            <td>{{$order->create_date}}</td>
                                                            @if($order->status==0)
                                                            <td class="bg-default">
                                                                <span>Not approved yet </span>
                                                            </td>
                                                         @elseif($order->status==1)
                                                                <td class="bg-success">
                                                                    <span> Approved </span>
                                                                </td>
                                                        @endif
                                                            <!--
                                                                                                           <td class="bg-success text-center"><a href="#">Available</a></td>-->


                                                                <td class="bg-light text-center">
                                                                    <div class="form-group m-0">
                                                                        @if($order->status==1)
                                                                        <form action="{{url('production/receiveComponent')}}" method="post">
                                                                            @csrf
                                                                        <input type="hidden" name="id" value="{{$order->id}}">
                                                                        <input type="hidden" name="name" value="{{$order->component_name}}">

                                                                        <input type="submit" value="Receive Components" class="btn bnt-md btn-primary ml-1">
{{--                                                                        <select class="custom-select" name="status">--}}

{{--                                                                            @if($order->status==0)--}}
{{--                                                                                <option value="{{$order->status}}">Not Started</option>--}}
{{--                                                                            @endif--}}
{{--                                                                            @if($order->status==1)--}}
{{--                                                                                <option value="{{$order->status}}">Work In Progress</option>--}}
{{--                                                                            @endif--}}

{{--                                                                            @if($order->status==2)--}}
{{--                                                                                <option value="{{$order->status}}">Blocked</option>--}}
{{--                                                                            @endif--}}

{{--                                                                            @if($order->status==3)--}}
{{--                                                                                <option value="{{$order->status}}">Done</option>--}}
{{--                                                                            @endif--}}

{{--                                                                            <option value="3">Done</option>--}}
{{--                                                                            <option value="0">Not Started</option>--}}
{{--                                                                            <option value="2">Blocked</option>--}}
{{--                                                                            <option value="1">Work In Progress</option>--}}

{{--                                                                        </select>--}}
                                                                        </form>
                                                                            @endif

                                                                            @if($order->status==2)
                                                                                <span> Received</span>
                                                                                @endif
                                                                            @if($order->status==0)
                                                                                <span> waiting</span>
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
                            <!-- /.card -->
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </section>

@endsection




