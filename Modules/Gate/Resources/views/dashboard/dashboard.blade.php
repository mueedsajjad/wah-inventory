@extends('layouts.master')

@section('content')

    <div class="row">

        <div class="col-lg-3 col-6" >
            <!-- small box -->
            <div class="small-box text-white" style=" background-image: linear-gradient(to right, #68b2f0, #1565c0,  #f02041);">
                <div class="inner">
                    <h3>Inward Gate</h3>

                    <p>Add incoming Entry Here </p>
                </div>
                <div class="icon">
                    <i class = "icon ion-arrow-left-a"></i>
                </div>
                <a href="{{url('gate/inwardGatePass')}}" class="small-box-footer bg-transparent">Add new <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box text-white" style=" background-image: linear-gradient(to right, #68b2f0, #1565c0,  #f02041);">
                <div class="inner">
                    <h3>Outward Gate </h3>

                    <p>Add OutGoing Data Here</p>
                </div>
                <div class="icon">
                    <i class="icon ion-arrow-right-a"></i>
                </div>
                <a href="{{url('gate/outwardGatePass')}}" class="small-box-footer bg-transparent">Add New <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box text-white" style=" background-image: linear-gradient(to right, #68b2f0, #1565c0,  #f02041);">
                <div class="inner">
                    <h3>{{'Reports'}}</h3>
                    <p>Gate</p>
                </div>
                                <div class="icon">
                                    <i class="icon ion-document-text"></i>
                                </div>
                <a onclick="gate()" style="cursor: pointer"  class="small-box-footer bg-transparent">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
{{--        <div class="col-lg-3 col-6">--}}
{{--            <!-- small box -->--}}
{{--            <div class="small-box bg-warning" >--}}
{{--                <div class="inner">--}}
{{--                    <h3>Reports</h3>--}}

{{--                    <p>View Reports</p>--}}
{{--                </div>--}}
{{--                <div class="icon">--}}
{{--                    <i class="icon ion-document-text"></i>--}}
{{--                </div>--}}
{{--                <a href="{{url('gate/report')}}" class="small-box-footer">View Reports <i class="fas fa-arrow-circle-right"></i></a>--}}
{{--            </div>--}}
{{--        </div>--}}

        <!-- ./col -->
{{--        <div class="col-lg-3 col-6">--}}
{{--            <!-- small box -->--}}
{{--            <div class="small-box bg-danger">--}}
{{--                <div class="inner">--}}
{{--                    <h3>65</h3>--}}

{{--                    <p>Unique Visitors</p>--}}
{{--                </div>--}}
{{--                <div class="icon">--}}
{{--                    <i class="ion ion-pie-graph"></i>--}}
{{--                </div>--}}
{{--                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
{{--            </div>--}}
{{--        </div>--}}
        <!-- ./col -->
    </div>
    <div id="detail">

    </div>

@endsection

<script >
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

</script>
