<div class="row justify-content-around">
    <div class="col-md-12">
        <div class="card card-dark">

            <!-- /.card-header -->

            <div class="card-body">
                <div id="append_condition">
                    <input type="hidden" id="countConditions"  name="countConditions" value="0">

                    <div class="row">
                     @foreach($employees as $employee)
                            <div class="col-md-3">
                                <a href="{{url('admin/employeeDepartmentWise/'.$employee->id)}}">
                            <div class="info-box" style="cursor: pointer">
                                <span class="info-box-icon elevation-1 box shadow" style="background-image: linear-gradient(to right, #68b2f0, #1565c0,  #f02041) !important;"> <i class="fas fa-user text-white"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text text-black">{{$employee->name}}</span>
                                    <span class="info-box-number">
                                    {{$employee->total}}
                                 </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>

                                </a>
                            <!-- /.info-box -->
                        </div>
                        @endforeach



                        <div id="singleData" class="col-md-6">

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

</div>

<script>

function requisition() {
        console.log();
        var path = location.pathname.split('/');
        var app=path[1];
        console.log(app);
        $.ajax({
            type: "GET",
            url: "/"+app+"/employeeDepartment/dash/",
            success:function(data)
            {
                $("#singleData").html(data);
            }
        });
    }

    // function singleData(data) {
    //     console.log(data);
    //     var path = location.pathname.split('/');
    //     var app=path[1];
    //     console.log(app);
    //     $.ajax({
    //         type: "GET",
    //         url: "/"+app+"/store/single-data/"+data,
    //         success:function(data)
    //         {
    //             $("#singleData").html(data);
    //         }
    //     });
    // }
</script>
