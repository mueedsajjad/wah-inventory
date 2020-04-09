@extends('layouts.master')
@section('content')
    <h1 class="display-4">Dashboard</h1>
    <div class="row">


        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box text-white shade box" style="background-image: linear-gradient(to right, #68b2f0, #1565c0,  #f02041);">
                <div class="inner">
                    <h3>{{'7'}}</h3>
                    <p>Sales Performance</p>
                </div>
                <div class="icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <a href="{{url('sale/dashboard/newOrders')}}"  style="cursor: pointer"  class="small-box-footer bg-transparent">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box text-white box" style=" background-image: linear-gradient(to right, #68b2f0, #1565c0,  #f02041);">
                <div class="inner">
                    <h3>{{'24'}}</h3>
                    <p>Sales VS Target</p>
                </div>
                <div class="icon">
                    <i class="fas fa-chart-bar"></i>
                </div>
                <a onclick="sale()" style="cursor: pointer"  class="small-box-footer bg-transparent">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box text-white box" style=" background-image: linear-gradient(to right, #68b2f0, #1565c0,  #f02041);">
                <div class="inner">
                    <h3>{{'344'}}</h3>
                    <p>Sales</p>
                </div>
                <div class="icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <a onclick="salechk()" style="cursor: pointer"  class="small-box-footer bg-transparent">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>


    </div>


    <div id="detail">

    </div>

@endsection


        <script>

            function sale() {
                console.log();
                var path = location.pathname.split('/');
                var app = path[1];
                console.log(app);
                $.ajax({
                    type: "GET",
                    url: "/" + app + "/sale/dash/",
                    success: function (data) {
                        $("#detail").html(data);
                    }
                })
            }
            function salechk() {
                console.log();
                var path = location.pathname.split('/');
                var app = path[1];
                console.log(app);
                $.ajax({
                    type: "GET",
                    url: "/" + app + "/sale/dash/two",
                    success: function (data) {
                        $("#detail").html(data);
                    }
                })
            }
        </script>
