@extends('layouts.master')

@section('content')
    <h1 class="display-4">Dashboard</h1>

<div class="row">
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box text-white box shade" style=" background-image: linear-gradient(to right, #68b2f0, #1565c0,  #f02041);">
                <div class="inner">
                    <h3>{{$users}}</h3>

                    <p>Employee Details</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-stalker"></i>
                </div>
                <a onclick="employee()" style="cursor: pointer"  class="small-box-footer bg-transparent">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
                <!-- small box -->
            <div class="small-box text-white box shade" style=" background-image: linear-gradient(to right, #68b2f0, #1565c0,  #f02041);">
                    <div class="inner">
                        <h3>Report</h3>
                        <p> All Reports<p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-cart"></i>
                    </div>
                    <a href="{{url('/admin/report')}}" style="cursor: pointer"  class="small-box-footer bg-transparent">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>






    <!-- <div class="row">
    <div class="col-md-12"> -->

    <div id="detail" class="col-md-12">

    </div>
    <!-- </div>
    </div> -->

@endsection

<script>


    function employee() {
        console.log();
        var path = location.pathname.split('/');
        var app=path[1];
        console.log(app);
        $.ajax({
            type: "GET",
            url: "/"+app+"/employeeDepartment/dash/",
            success:function(data)
            {
                $("#detail").html(data);
            }
        });
    }

    // function sale() {
    //     console.log();
    //     var path = location.pathname.split('/');
    //     var app = path[1];
    //     console.log(app);
    //     $.ajax({
    //         type: "GET",
    //         url: "/" + app + "/sale/dash/",
    //         success: function (data) {
    //             $("#detail").html(data);
    //         }
    //     })
    // }
    // function production() {
    //     console.log();
    //     var path = location.pathname.split('/');
    //     var app = path[1];
    //     console.log(app);
    //     $.ajax({
    //         type: "GET",
    //         url: "/" + app + "/production/dash/",
    //         success: function (data) {
    //             $("#detail").html(data);
    //         }
    //     })
    // }
</script>

