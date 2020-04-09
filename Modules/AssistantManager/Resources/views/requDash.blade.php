@extends('layouts.master')

@section('content')
    <h1 class="display-4">Dashboard</h1>
    <div class="row">

            <!-- small box -->

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger box shade">
                <div class="inner">
                    <h3>{{'54'}}</h3>
                    <p>Requisition Requests</p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios-paperplane"></i>
                </div>
                <a onclick="requisition()" style="cursor: pointer"  class="small-box-footer bg-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

    </div>




    <div id="detail">

    </div>

@endsection

<script>


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

</script>
