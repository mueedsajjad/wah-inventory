@extends('layouts.master')

@section('content')
    <div class="row">
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box text-white" style=" background-image: linear-gradient(to right, #68b2f0, #1565c0,  #f02041);">
                <div class="inner">
                    <h3>6</h3>
                    <p>Stores</p>
                </div>
                <div class="icon">
                    <i class="ion ion-android-playstore"></i>
                </div>
                <a onclick="store()" style="cursor: pointer"  class="small-box-footer bg-transparent">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-12 col-6">
    <div id="detail">

    </div>
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
