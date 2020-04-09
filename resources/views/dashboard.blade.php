@extends('layouts.master')

@section('content')

    <h1 class="display-4">Dashboard</h1>



    <div class="row">

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box text-white box shade" style=" background-image: linear-gradient(to right, #68b2f0, #1565c0,  #f02041);">
                <div class="inner">
                    <h3>{{$user-1}}</h3>

                    <p>HR</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-stalker"></i>
                </div>
                <a href="{{url('/admin/hr')}}" style="cursor: pointer"  class="small-box-footer bg-transparent">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>


        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box text-white box shade" >
                <div class="inner">
                    <h3>150</h3>

                    <p>Purchase</p>
                </div>
                <div class="icon">
                    <i class=" fas fa-dollar-sign"></i>
                </div>
                <a onclick="orderDetails()" style="cursor: pointer" class="small-box-footer bg-transparent">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>


        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box text-white box" style=" background-image: linear-gradient(to right, #68b2f0, #1565c0,  #f02041);">
                <div class="inner">
                    <h3>{{'54'}}</h3>
                    <p>Requisition Requests</p>
                </div>
                <div class="icon">
                    <i class="fas fa-paper-plane"></i>
                </div>
                <a onclick="requisition()" style="cursor: pointer"  class="small-box-footer bg-transparent">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <!-- ./col -->

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
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box text-white box" style=" background-image: linear-gradient(to right, #68b2f0, #1565c0,  #f02041);">
                <div class="inner">
                    <h3>{{$store}}</h3>
                    <p>Store</p>
                </div>
                <div class="icon text-teal">
                    <i class="fas fa-store"></i>
                </div>
                <a onclick="store()" style="cursor: pointer"  class="small-box-footer bg-transparent">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>


        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box text-white box" style=" background-image: linear-gradient(to right, #68b2f0, #1565c0,  #f02041);">
                <div class="inner">
                    <h3>{{'134'}}</h3>
                    <p>Production</p>
                </div>
                <div class="icon">
                    <i class="fas fa-industry"></i>
                </div>
                <a onclick="production()" style="cursor: pointer"  class="small-box-footer bg-transparent">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box text-white box" style=" background-image: linear-gradient(to right, #68b2f0, #1565c0,  #f02041);">
                <div class="inner">
                    <h3>{{89}}</h3>
                    <p>QC</p>
                </div>
                <div class="icon">
                    <i class="nav-icon fas fa-check-square"></i>
                </div>
                <a onclick="QC()" style="cursor: pointer"  class="small-box-footer bg-transparent">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>



        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box text-white box" style=" background-image: linear-gradient(to right, #68b2f0, #1565c0,  #f02041);">
                <div class="inner">
                    <h3>{{350}}</h3>
                    <p>Rejected Goods</p>
                </div>
                <div class="icon">
                    <i class="fas fa-ban"></i>
                </div>
                <a onclick="rejectnumber()" style="cursor: pointer"  class="small-box-footer bg-transparent">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>


        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box text-white box" style=" background-image: linear-gradient(to right, #68b2f0, #1565c0,  #f02041);">
                <div class="inner">
                    <h3>{{'45'}}</h3>
                    <p>Gate</p>
                </div>
                <div class="icon">
                    <i class="fas fa-dungeon"></i>
                </div>
                <a onclick="gate()" style="cursor: pointer"  class="small-box-footer bg-transparent">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>





{{--        <div class="col-lg-3 col-6">--}}
{{--            <!-- small box -->--}}
{{--            <div class="small-box text-white" style=" background-image: linear-gradient(to right, #68b2f0, #1565c0,  #f02041);">--}}
{{--                <div class="inner">--}}
{{--                    <h3>Settings</h3>--}}

{{--                    <p>All Settings</p>--}}
{{--                </div>--}}
{{--                <div class="icon">--}}
{{--                    <i class="ion ion-ios-cog"></i>               </div>--}}
{{--                <a href="{{url('/setting/setting')}}" style="cursor: pointer"  class="small-box-footer bg-transparent">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
{{--            </div>--}}
{{--        </div>--}}


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

    function gate() {
        console.log();
        var path = location.pathname.split('/');
        var app=path[1];
        console.log(app);
        $.ajax({
            type: "GET",
            url: "/"+app+"/gate/dash/",
            success:function(data)
            {
                $("#detail").html(data);
            }
        });
    }

    function requisition() {
        console.log();
        var path = location.pathname.split('/');
        var app=path[1];
        console.log(app);
        $.ajax({
            type: "GET",
            url: "/"+app+"/requisition/dash/",
            success:function(data)
            {
                $("#detail").html(data);
            }
        });
    }

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
    function production() {
        console.log();
        var path = location.pathname.split('/');
        var app = path[1];
        console.log(app);
        $.ajax({
            type: "GET",
            url: "/" + app + "/production/dash/",
            success: function (data) {
                $("#detail").html(data);
            }
        })
    }

    function QC() {
        console.log();
        var path = location.pathname.split('/');
        var app = path[1];
        console.log(app);
        $.ajax({
            type: "GET",
            url: "/" + app + "/qc/dash/",
            success: function (data) {
                $("#detail").html(data);
            }
        })
    }


    function rejectnumber() {
        console.log();
        var path = location.pathname.split('/');
        var app = path[1];
        console.log(app);
        $.ajax({
            type: "GET",
            url: "/" + app + "/qc/dash/rejected",
            success: function (data) {
                $("#detail").html(data);
            }
        })
    }

    function orderDetails() {
        console.log();
        var path = location.pathname.split('/');
        var app = path[1];
        console.log(app);
        $.ajax({
            type: "GET",
            url: "/" + app + "/order/details",
            success: function (data) {
                $("#detail").html(data);
            }
        })
    }

</script>
