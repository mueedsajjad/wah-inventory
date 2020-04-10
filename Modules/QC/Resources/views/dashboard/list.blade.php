<div class="row justify-content-around">
    <div class="col-md-12">
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Rejected Items List</h3>
            </div>
            <!-- /.card-header -->

            <div class="card-body">
                <div id="append_condition">
                    <input type="hidden" id="countConditions"  name="countConditions" value="0">

                        <table class="table-bordered table table-responsive">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Product/Material ID</th>
                                <th>Reason of Rejection</th>
                                <th>Rejected Qty</th>
                                <th>Action Date</th>
                            </tr>
                            </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>CO-PD-122</td>
                                    <td>Bad Quality</td>
                                    <td>54</td>
                                    <td>12-01-2020</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>CO-PD-122</td>
                                    <td>Bad Quality</td>
                                    <td>12</td>
                                    <td>19-02-2020</td>

                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>CO-PD-122</td>
                                    <td>Bad Quality</td>
                                    <td>34</td>
                                    <td>01-02-2020</td>

                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>CO-PD-145</td>
                                    <td>Bad Quality</td>
                                    <td>79</td>
                                    <td>23-03-2020</td>

                                </tr>
                                </tbody>
                        </table>

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
