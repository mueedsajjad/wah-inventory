@extends('layouts.master')

@section('content')

    <div class="container-fluid">

        <div class="row mt-5">
            <div class="col-12 text-right">
                <a class="btn btn-primary btn-sm" href="{{url('purchase/orderForApprove')}}">
                  Back
                </a>
            </div>
        </div>

         

        <div class="row mt-5">

            <div class="col-md-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">Purchase Order Detail</h3>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card card-dark">

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead class="bg-light">
                            <tr>
                                <th>Purchase Number</th>
                                <th>Product Name</th>
                                <th>Product Description</th>
                                <th>QTY </th>
                                <th>Unit Price</th>
                                <th>Total Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order as $orders)
                                <tr>
                                    <td>{{$orders->purchase_id}}</td>
                                    <td>{{$orders->p_name}}</td>
                                    <td>{{$orders->p_d}}</td>
                                    <td>{{$orders->quantity}}</td>
                                    <td>{{$orders->unit_price}}</td>
                                    <td>{{$orders->total_price}}</td>
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
