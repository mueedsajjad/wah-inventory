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
                                <table class="table-bordered table">
                                    <thead>
                                    <tr>
                                        <th>Sr No</th>
                                        <th>Name</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($store_info as $key => $data)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td><a style="color: red" onclick="singleData({{$data->id}})">{{$data->name}}</a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

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
