@extends('layouts.master')

@section('content')

    <div class="container-fluid">
        <div class="row mt-5">
            @if(session()->has('save'))
                <div class="alert alert-success" role="alert">
                    <strong>Success</strong> {{session()->get('save')}}
                </div>
            @endif

                @if(session()->has('reject'))
                    <div class="alert alert-danger" role="alert">
                        <strong>Success</strong> {{session()->get('reject')}}
                    </div>
                @endif



            <div class="col-md-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">Approve Orders For Purchase</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card card-dark">

                    <div class="card-body">
                        <table  class="table table-bordered" id="pageTable">
                            <thead class="bg-light">
                            <tr>
                                <th>Sr#</th>
                                <th>User Name</th>
                                <th>Ordered Date</th>
                                <th>Credit Term</th>
                                <th>Detail</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $n=0; @endphp
                            @foreach($orderForApprove as $order)

                                <tr>
                                    @php $n ++; @endphp
                                    <td>{{$n}}</td>
                                    <td>{{$order->UserName}}</td>
                                    <td>{{$order->po_date}}</td>
                                    <td>{{$order->name}}</td>

                                    <td>
                                        <a class="btn btn-primary btn-sm" href="{{url('purchase/orderDetail/'.$order->order_id)}}">
                                            Check Detail
                                        </a>
                                    </td>

                                    <td class="project-actions">
                                        @if($order->status==0)
                                        <a class="btn btn-success btn-sm" href="{{url('purchase/accept/'.$order->order_id)}}">
                                            Accept
                                        </a>
                                        <a class="btn btn-danger btn-sm" href="{{url('purchase/reject/'.$order->order_id)}}">
                                            <span>Reject</span>
                                        </a>
                                        @endif

                                        @if($order->status==1)
                                        <a class="btn btn-primary btn-sm" href="#">
                                            <span>Approved</span>
                                        </a>
                                            @endif
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>



            <div class="row justify-content-around">


            </div>

        </div>
    </div>



@endsection
