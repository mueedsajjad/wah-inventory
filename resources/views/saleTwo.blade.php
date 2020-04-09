
<div class="row justify-content-around">
    <div class="col-md-12">
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Sales Year 2020</h3>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div id="piechart">

                    </div>
                </div>
                <div class="col-md-6 p-2">
                    <div class="col-md-12">
                        <a href="{{url('/sale/dashboard')}}">
                            <div class="info-box" style="cursor: pointer">
                                <span class="info-box-icon bg-danger elevation-1 box shade"><i class="fas fa-shopping-cart"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text text-black">Sales Dashboard</span>
                                    <span class="info-box-number">
                                        {{--                                            <small>%</small>--}}
                                           </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </a>
                        <!-- /.info-box -->
                    </div>
                    <div class="col-md-12">
                        <a href="{{url('/sale/saleOrder')}}">
                            <div class="info-box" style="cursor: pointer">
                                <span class="info-box-icon bg-danger elevation-1 box shade"><i class="fas fa-shopping-cart"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Sales Order</span>
                                    <span class="info-box-number">
                                           15
{{--                                    <small>%</small>--}}
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </a>
                        <!-- /.info-box -->
                    </div><div class="col-md-12">
                        <a href="{{url('/sale/saleOrder')}}">
                            <div class="info-box" style="cursor: pointer">
                                <span class="info-box-icon bg-danger elevation-1 box shade"><i class="fas fa-shopping-cart"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Delivery Reports</span>
                                    <span class="info-box-number">
                                           123
{{--                                    <small>%</small>--}}
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </a>
                        <!-- /.info-box -->
                    </div><div class="col-md-12">
                        <a href="{{url('/sale/saleOrder')}}">
                            <div class="info-box" style="cursor: pointer">
                                <span class="info-box-icon bg-danger elevation-1 box shade"><i class="fas fa-shopping-cart"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Completed Order</span>
                                    <span class="info-box-number">
                                           24
{{--                                    <small>%</small>--}}
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </a>
                        <!-- /.info-box -->
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script src="{{asset('public/plugins/jquery/jquery.min.js')}}"></script>


<script type="text/javascript">
    // Load google charts
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    // Draw the chart and set the chart values
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ['P-001 Kartoos', 178661],
            ['P-002 Kartoos', 12222],
            ['P-003 Kartoos', 123441],

        ]);

        // Optional; add a title and set the width and height of the chart
        var options = {'title':'Sales', 'width':550, 'height':400};

        // Display the chart inside the <div> element with id="piechart"
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
    }
</script>
