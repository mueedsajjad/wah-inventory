@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box text-white" style="background-image: linear-gradient(to right, #68b2f0, #1565c0,  #f02041);">
                <div class="inner">
                    <h3>{{'24'}}</h3>
                    <p>New Sale Orders</p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios-cart"></i>
                </div>
                <a href="{{url('sale/dashboard/newOrders')}}"  style="cursor: pointer"  class="small-box-footer bg-transparent">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box text-white" style="background-image: linear-gradient(to right, #68b2f0, #1565c0,  #f02041);">
                <div class="inner">
                    <h3>{{'24'}}</h3>
                    <p>Delivery Orders</p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios-cart"></i>
                </div>
                <a href="{{url('sale/dashboard/deliveryOrders')}}" style="cursor: pointer"  class="small-box-footer bg-transparent">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box text-white" style="background-image: linear-gradient(to right, #68b2f0, #1565c0,  #f02041);">
                <div class="inner">
                    <h3>{{'24'}}</h3>
                    <p>Orders Delivered</p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios-cart"></i>
                </div>
                <a href="{{url('sale/dashboard/ordersDelivered')}}" style="cursor: pointer"  class="small-box-footer bg-transparent">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

@endsection
