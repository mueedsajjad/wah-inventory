<div class="row justify-content-around">
    <div class="col-md-12">
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Store Details</h3>
            </div>
            <!-- /.card-header -->

            <div class="card-body">
                <div id="append_condition">
                    <input type="hidden" id="countConditions"  name="countConditions" value="0">
                    <div class="row">
                            <div class="col-md-6">
                                <a href="{{url('/gate/inward')}}">
                            <div class="info-box" style="cursor: pointer">
                                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-door-closed"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text text-black">Inward-GatePass</span>
                                    <span class="info-box-number">
                                                      {{$inward_gate_pass}}
{{--                                            <small>%</small>--}}
                                           </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                                </a>
                            <!-- /.info-box -->
                        </div>
                        <div class="col-md-6">
                            <a href="{{url('/gate/inward')}}">
                            <div class="info-box" style="cursor: pointer">
                                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-door-open"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Outward-GatePass</span>
                                    <span class="info-box-number">
                                           10
{{--                                    <small>%</small>--}}
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            </a>
                            <!-- /.info-box -->
                        </div>


                        <div id="singleData" class="col-md-6">

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
<script>
    function singleData(data) {
        console.log(data);
        var path = location.pathname.split('/');
        var app=path[1];
        console.log(app);
        $.ajax({
            type: "GET",
            url: "/"+app+"/store/single-data/"+data,
            success:function(data)
            {
                $("#singleData").html(data);
            }
        });
    }
</script>
