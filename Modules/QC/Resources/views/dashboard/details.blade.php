<div class="row justify-content-around">
    <div class="col-md-12">
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Quality Control</h3>
            </div>
            <!-- /.card-header -->

            <div class="card-body">
                <div id="append_condition">
                    <input type="hidden" id="countConditions"  name="countConditions" value="0">
                    <div class="row">
                        <div class="col-md-3">
                            <a href="{{url('qc/inward_qc')}}">
                                <div class="info-box" style="cursor: pointer">
                                    <span class="info-box-icon bg-danger elevation-1 box shade"><i class="fas fa-check-circle"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text text-black">Material I-Note</span>
                                        <span class="info-box-number">
                                                      {{34}}
                                            {{--                                            <small>%</small>--}}
                                           </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                            </a>
                            <!-- /.info-box -->
                            {{--                        </div>--}}
                            {{--                        <div class="col-md-6">--}}
                            <a href="{{url('qc/production-product')}}">
                                <div class="info-box" style="cursor: pointer">
                                    <span class="info-box-icon bg-danger elevation-1 box shade"><i class="fas fa-check-circle"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Finish Goods I-Note</span>
                                        <span class="info-box-number">
                                                                                                 {{54}}

                                            {{--                                    <small>%</small>--}}
                                    </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                            </a>


                            <a href="{{url('qc/production-component')}}">
                                <div class="info-box" style="cursor: pointer">
                                    <span class="info-box-icon bg-danger elevation-1 box shade"><i class="fas fa-check-circle"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Components I-Note</span>
                                        <span class="info-box-number">
                                                                                                 {{12}}
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






