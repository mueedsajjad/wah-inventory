@extends('layouts.master')

@section('content')
    <div class="row">
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box text-white" style=" background-image: linear-gradient(to right, #68b2f0, #1565c0,  #f02041);">
                <div class="inner">
                    <h3>{{89}}</h3>
                    <p>QC</p>
                </div>
                <div class="icon">
                    <i class="ion ion-android-playstore"></i>
                </div>
                <a onclick="QC()" style="cursor: pointer"  class="small-box-footer bg-transparent">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>


        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box text-white" style=" background-image: linear-gradient(to right, #68b2f0, #1565c0,  #f02041);">
                <div class="inner">
                    <h3>{{350}}</h3>
                    <p>Rejected Goods</p>
                </div>
                <div class="icon">
                    <i class="ion ion-android-playstore"></i>
                </div>
                <a onclick="rejectnumber()" style="cursor: pointer"  class="small-box-footer bg-transparent">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-12 col-6">
            <div id="detail">

            </div>
        </div>
    </div>

        @endsection

        <script>
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

        </script>
