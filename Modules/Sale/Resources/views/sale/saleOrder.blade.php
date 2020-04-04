@extends('layouts.master')

@section('content')

    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">



                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">Latest Orders</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table m-0" id="pageTable">
                                    <thead>
                                    <tr>
                                        <th>SO Number</th>
                                        <th>date</th>
                                        <th>Name</th>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $order)
                                    <tr>
                                        <td>{{$order->so_number}}</td>
                                        <td>{{$order->date}}</td>
                                        <td>{{$order->name}}</td>
                                        <td>{{$order->product_name}}</td>
                                        <td>{{$order->quantity}}</td>
                                    </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.card-body -->
                        <!-- <div class="card-footer clearfix">
                            <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">Place New Order</a>
                        </div> -->
                        <!-- /.card-footer -->
                    </div>

                </div>



            </div>
        </div>
    </section>

@endsection
