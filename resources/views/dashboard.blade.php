@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>150</h3>

                    <p>New Orders</p>
                </div>
                <div class="icon">
                    <i class="ion ion-paperclip"></i>
                </div>
                <a href="{{url('/order/order-approve')}}" class="small-box-footer bg-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$user-1}}</h3>

                    <p>Employee Details</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-stalker"></i>                </div>
                <a href="{{url('/admin/employee')}}" class="small-box-footer bg-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$store}}</h3>
                    <p>Stores</p>
                </div>
                <div class="icon">
                    <i class="ion ion-android-playstore"></i>
                </div>
                <a onclick="store()" class="small-box-footer bg-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>Settings</h3>

                    <p>All Settings</p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios-cog"></i>               </div>
                <a href="{{url('/setting/setting')}}" class="small-box-footer bg-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$store}}</h3>
                    <p>Stores</p>
                </div>
                <div class="icon">
                    <i class="ion ion-android-playstore"></i>
                </div>
                <a onclick="store()" class="small-box-footer bg-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <div id="detail">

    </div>

@endsection

<script>
    function store() {
        console.log();
        var path = location.pathname.split('/');
        var app=path[1];
        console.log(app);
        $.ajax({
            type: "GET",
            url: "/"+app+"/store/dash/",
            success:function(data)
            {
                $("#detail").html(data);
            }
        });
    }
</script>
