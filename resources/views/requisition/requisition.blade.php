<div class="row justify-content-around">
    <div class="col-md-12">
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Request Details</h3>
            </div>
            <!-- /.card-header -->

            <div class="card-body">
                <div id="append_condition">
                    <input type="hidden" id="countConditions"  name="countConditions" value="0">
                    <div class="row">
                            <div class="col-md-6">
                                <a href="{{url('/requisition/material-dashboard')}}">
                            <div class="info-box" style="cursor: pointer">
                                <span class="info-box-icon bg-danger elevation-1 shade box"><i class="fas fa-paper-plane"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text text-black">Material Requests</span>
                                    <span class="info-box-number">
                                                      {{$material_requisition}}
{{--                                            <small>%</small>--}}
                                           </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                                </a>
                            <!-- /.info-box -->
                        </div>
                        <div class="col-md-6">
                            <a href="{{url('/requisition/component-dashboard')}}">
                            <div class="info-box" style="cursor: pointer">
                                <span class="info-box-icon bg-danger elevation-1 shade box"><i class="fas fa-paper-plane"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Component Request</span>
                                    <span class="info-box-number">
                                                                                                 {{$component_requisition}}

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
