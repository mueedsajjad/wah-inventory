
<div class="row justify-content-around">
    <div class="col-md-12">
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Sales</h3>
            </div>
            <!-- /.card-header -->
            <div class="card p-3">
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">Production</h3>
                        <a href="javascript:void(0);">View Report</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex">
                        <!--
                                          <p class="d-flex flex-column">
                                            <span class="text-bold text-lg">820</span>
                                            <span>Visitors Over Time</span>
                                          </p>
                        -->
                        <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
                      <i class="fas fa-arrow-up"></i> 12.5%
                    </span>
                            <span class="text-muted">Since last week</span>
                        </p>
                    </div>
                    <!-- /.d-flex -->

                    <div class="position-relative mb-4">
                        <canvas id="visitors-chart" height="200"></canvas>
                    </div>

                    <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> This Week
                  </span>

                        <span>
                    <i class="fas fa-square text-gray"></i> Last Week
                  </span>
                    </div>
                </div>
            </div>

            <!-- /.card -->



        </div>
    </div>

</div>

<script src="{{asset('public/plugins/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('public/dist/js/demo.js')}}"></script>
<script src="{{asset('public/dist/js/pages/dashboard3.js')}}"></script>
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

