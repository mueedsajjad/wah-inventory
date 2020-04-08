@extends('layouts.master')

@section('content')

<div class="row">
        
        <!-- ./col -->
        <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$users}}</h3>

                    <p>Employee Details</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-stalker"></i>
                </div>
                <a href="{{url('/admin/employee')}}" style="cursor: pointer"  class="small-box-footer bg-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        
        <div class="col-lg-6 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>Report</h3>
                        <p> All Reports<p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-cart"></i>
                    </div>
                    <a href="{{url('/admin/report')}}" style="cursor: pointer"  class="small-box-footer bg-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
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
</script>

