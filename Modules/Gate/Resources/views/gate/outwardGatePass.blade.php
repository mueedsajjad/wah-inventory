@extends('layouts.master')

@section('content')
    <section class="content pt-5">
        <div class="container-fluid">
            <div class="row">


                <div class="col-md-12">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Outward Gate Pass</h3>
                        </div>
                        <div class="card-body">
                            @if(!empty($errors->first()))
                                <div class="alert alert-danger"  style="text-align: center">
                                    <span>{{ $errors->first() }}</span>
                                </div>
                            @endif
                            @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                            @endif
                            <form action="{{url('gate/addOutwardGatePass')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row justify-content-around">
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="sga_13" class="col-sm-4 col-form-label">Gate Pass ID</label>
                                            <div class="col-sm-8">
                                                <input type="text" required name="gatePassId" readonly class="form-control" value="GP00{{$countInwardGatePass}}" id="sga_13" placeholder="GP001">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="sga_13" class="col-sm-4 col-form-label">Date</label>
                                            <div class="col-sm-8">
                                                <input type="text" readonly required value="{{date('d-m-Y')}}" class="form-control" id="sga_19" placeholder="08-02-2020">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Driver ID</label>
                                            <div class="col-sm-8">
                                                <input type="text" required readonly name="driverId" class="form-control" value="DR00{{$countInwardGatePass}}" placeholder="DR001">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Outward Type</label>
                                            <div class="col-sm-8">
                                                <select name="out_t" id="" class="form-control" onchange="showlist(this.value)">
                                                    <option value="">select</option>
                                                    <option value="customer" >Delivery Order</option>
                                                    <option value="factory" >Towards Factory</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row" style="display: none" id="type">
                                            <label class="col-sm-4 col-form-label">Material/Component</label>
                                            <div class="col-sm-8">
                                                <select name="product_type" id="" class="form-control" onchange="mat(this.value)" >
                                                    <option disabled selected>select Type</option>
                                                    <option value="material" >Material</option>
                                                    <option value="component" >Component</option>
                                                </select>
                                            </div>
                                        </div>
{{--                                        <div class="form-group row">--}}
{{--                                            <label class="col-sm-4 col-form-label">Driver Name</label>--}}
{{--                                            <div class="col-sm-8">--}}
{{--                                                <input type="text" name="driverName" required class="form-control" placeholder="Waseem">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group row">--}}
{{--                                            <label class="col-sm-4 col-form-label">Driver CNIC</label>--}}
{{--                                            <div class="col-sm-8">--}}
{{--                                                <input type="number"  name="driverCNIC" required class="form-control" placeholder="3520156743568">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group row">--}}
{{--                                            <label for="sga_21" class="col-sm-4 col-form-label">Driver Phone #</label>--}}
{{--                                            <div class="col-sm-8">--}}
{{--                                                <input type="text" name="driverPh" required class="form-control" id="sga_24" placeholder="03351234567">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group row">--}}
{{--                                            <label class="col-sm-4 col-form-label">Vehicle No</label>--}}
{{--                                            <div class="col-sm-8">--}}
{{--                                                <input type="text" required name="vehicalNo" class="form-control" id="sga_22" placeholder="LHR-8828">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                    </div>


                                    <div class="col-md-4" id="right_side">

                                    </div>

                                </div>
                                <div id="getData">

                                </div>

                            </form>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </section>

    <script >

        function showlist(data) {
            if (data == 'factory'){
                $('#type').show();
            }else if (data == 'customer'){
                $('#type').hide();
                var path = location.pathname.split('/');
                var app=path[1];
                console.log(app);
                console.log(data);
                if (data){
                    $.ajax({
                        type: "GET",
                        url: "/"+app+"/gate/outward_customer/"+data,
                        success:function(data)
                        {
                            $("#right_side").html(data);
                        }
                    });
                }
            }
        }

        function mat(data) {
            if(data == 'material'){
                var path = location.pathname.split('/');
                var app=path[1];
                console.log(app);
                console.log(data);
                if (data){
                    $.ajax({
                        type: "GET",
                        url: "/"+app+"/gate/outward_factory_material/"+data,
                        success:function(data)
                        {
                            $("#right_side").html(data);
                        }
                    });
                }
            }
            else if(data == 'component')
            {
                var path = location.pathname.split('/');
                var app=path[1];
                console.log(app);
                console.log(data);
                if (data){
                    $.ajax({
                        type: "GET",
                        url: "/"+app+"/gate/outward_factory_component/"+data,
                        success:function(data)
                        {
                            $("#right_side").html(data);
                        }
                    });
                }
            }
        }

    </script>
    @endsection
