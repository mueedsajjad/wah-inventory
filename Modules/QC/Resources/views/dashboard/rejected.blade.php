<div class="row justify-content-around">
    <div class="col-md-12">
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Rejected Items</h3>
            </div>
            <!-- /.card-header -->

            <div class="card-body">
                <div id="append_condition">
                    <input type="hidden" id="countConditions"  name="countConditions" value="0">
                    <div class="row">
                        <div class="col-md-3">
                                <div class="info-box" style="cursor: pointer" onclick="singleData()">
                                    <span class="info-box-icon bg-danger elevation-1 box shade"><i class="fas fa-ban"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text text-black">Products</span>
                                        <span class="info-box-number">
                                            56
                                            {{--                                            <small>%</small>--}}
                                           </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                            <!-- /.info-box -->
{{--                        </div>--}}
{{--                        <div class="col-md-6">--}}
                                <div class="info-box" style="cursor: pointer" onclick="singleData()">
                                    <span class="info-box-icon bg-danger elevation-1 box shade"><i class="fas fa-ban"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Material</span>
                                        <span class="info-box-number">
                                                    355
                                            {{--                                    <small>%</small>--}}
                                    </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>

                            <!-- /.info-box -->
                        </div>


                        <div id="singleData" class="col-md-9">

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
<script>
    function singleData() {
        var path = location.pathname.split('/');
        var app=path[1];
        console.log(app);
        $.ajax({
            type: "GET",
            url: "/"+app+"/qc/dash/list/",
            success:function(data)
            {
                $("#singleData").html(data);
            }
        });
    }
</script>
