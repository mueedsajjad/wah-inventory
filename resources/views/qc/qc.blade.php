@extends('layouts.master')

@section('content')
    <div class="row">
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$count_all}}</h3>
                    <p>QC</p>
                </div>
                <div class="icon">
                    <i class="ion ion-android-playstore"></i>
                </div>
                <a onclick="QC()" style="cursor: pointer"  class="small-box-footer bg-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-12 col-6">
            <div id="detail">

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

        </script>
