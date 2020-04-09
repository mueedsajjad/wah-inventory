@extends('layouts.master')

@section('content')



    <section class="content pt-3">
        <div class="container-fluid">


            <div class="alert alert-primary" role="alert">
                <strong>Note:</strong> If Vendor is not created against this Purchase Order then First Create Vendor and add Commercial and Technical Offer
            </div>
            @if(session()->has('save'))
                <div class="alert alert-success" role="alert">
                    <strong>Success</strong> {{session()->get('save')}}
                </div>
            @endif
                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif


            <div class="row">


                <div class="col-md-12">
                    <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title">New Tender Order</h3>
                        </div>


                        <div class="card-body">
                            <form action="{{url('tender/tender-order')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row justify-content-around">
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="sga_13" class="col-sm-4 col-form-label">Purchase Order</label>

                                            <input type="hidden" class="form-control" value="{{$record->id}}" name="po_id">
                                            <div class="col-sm-8">
                                                <div class="">
{{--                                                    <select class="form-control select2 " name="po_id" onchange="getRequData(this.value)">--}}
{{--                                                        <option selected="selected" disabled>Select Requisition</option>--}}
{{--                                                        @foreach($purchase_order as $credits)--}}
{{--                                                            <option value="{{$credits->id}}">{{$credits->purchase_order_id}}</option>--}}
{{--                                                        @endforeach--}}
{{--                                                    </select>--}}
                                                    <input type="text" readonly value="{{$record->purchase_order_id}}" name="" class="form-control">
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="sga_13" class="col-sm-4 col-form-label">Document</label>

                                            <div class="col-sm-8">
                                                <div class="custom-file">
                                                    <input type="file" name="upload"  id="exampleInputFile">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                                <div class="row justify-content-around">



                                </div>


                                <div class="row justify-content-around">

                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="sga_13" class="col-sm-4 col-form-label">PO date</label>
                                            <div class="col-sm-8">
                                                <input type="date"  name="issue_date"  required value="{{\Carbon\Carbon::now()->toDateString()}}" class="form-control" id="sga_19" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Select Vendor</label>
                                            <div class="col-sm-8">
                                                <select name="vendor" onchange="getVendor(this.value)" id="" class="form-control select2">
                                                    <option value="" >Select Vendor</option>
                                                    @foreach($vendor as $data)
                                                        <option value="{{$data->id}}">{{$data->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <div id="vend">

                                </div>

{{--                                <div class="row justify-content-around">--}}
{{--                                    <div class="col-md-4">--}}
{{--                                        <div class="form-group row">--}}
{{--                                            <label for="sga_18" class="col-sm-4 col-form-label">Supplier Name</label>--}}
{{--                                            <div class="col-sm-8">--}}
{{--                                                <input type="text" name="supplier_name" class="form-control" disabled  id="sga_18" placeholder="MMLOGIX (PVT) Ltd.">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}


{{--                                    <div class="col-md-4">--}}
{{--                                        <div class="form-group row">--}}
{{--                                            <label for="checkboxSuccess1" class="col-sm-4 col-form-label">--}}
{{--                                                Approved--}}
{{--                                            </label>--}}
{{--                                            <div class="icheck-success col-sm-8 d-inline">--}}
{{--                                                <input type="checkbox" name="check" checked="" id="checkboxSuccess1">--}}
{{--                                                <label for="checkboxSuccess1">--}}
{{--                                                </label>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                        <!--
                                                              <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Status</label>
                                                                <div class="col-sm-8">
                                                                  <select class="form-control select2">
                                                                    <option selected="selected">Active</option>
                                                                    <option>Inactive</option>
                                                                  </select>
                                                                </div>
                                                              </div>
                                        -->
{{--                                    </div>--}}




                                <div class="row justify-content-around">
                                    <div class="col-md-4">
                                        <!--
                                                              <div class="form-group row">
                                                                <label for="sga_16" class="col-sm-4 col-form-label">Rate</label>
                                                                <div class="col-sm-8">
                                                                  <input type="text" class="form-control" id="sga_16" placeholder="175">
                                                                </div>
                                                              </div>
                                        -->
                                    </div>
                                    <div class="col-md-4">

                                    </div>
                                </div>

                                <div class="row justify-content-around">
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="sga_16" class="col-sm-4 col-form-label">Commercial Offer</label>
                                            <div class="col-sm-8">
                                                <textarea type="text" class="form-control" name="c_offer" id="sga_16"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="sga_16" class="col-sm-4 col-form-label">Technical Offer</label>
                                            <div class="col-sm-8">
                                                <textarea type="text" class="form-control" name="t_offer" id="sga_16"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div id="data">
                                    <div class="row justify-content-around">
                                        <div class="col-md-12">
                                            <div class="card card-dark">
                                                <div class="card-header">
                                                    <h3 class="card-title">Products</h3>
                                                </div>
                                                <!-- /.card-header -->

                                                <div class="card-body">
                                                    <div id="append_condition">
                                                        <input type="hidden" id="countConditions"  name="countConditions" value="0">
                                                        <div class="row">

                                                            <table>
                                                                <thead>
                                                                <tr>
                                                                    <th>PO Id</th>
                                                                    <th>Material Code</th>
                                                                    <th>UOM</th>
                                                                    <th>Quantity</th>
                                                                    <th>Description</th>
                                                                    <th>Unit Price</th>
                                                                    <th>Total Price</th>
                                                                    <th>Select</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach($details as $data)
                                                                    <tr>
                                                                        <div class="mome">
                                                                            <td><input type="text" class="form-control"  name="" value="{{$data->purchase_order_id}}" readonly></td>
                                                                            <td><input type="text" class="form-control"  name="material_name[]" value="{{$data->material_name}}" readonly></td>
                                                                            <td><input type="text" class="form-control"  name="uom[]" value="{{$data->uom}}" readonly></td>
                                                                            <td><input type="text" class="form-control"  name="qty[]" value="{{$data->quantity}}" readonly></td>
                                                                            <td><input type="text" class="form-control"  name="description[]" value="{{$data->description}}" readonly ></td>
                                                                            <td><input type="text" class="form-control"  name="unit_price[]" value="{{$data->unit_price}}" readonly required></td>
                                                                            <td><input type="text" class="form-control"  name="total_price[]" value="{{$data->total_price}}" readonly required></td>
                                                                            <td><input type="checkbox" value="{{$data->id}}" name="check[]" class="form-control"></td>
                                                                        </div>
                                                                    </tr>
                                                                @endforeach
                                                                </tbody>

                                                            </table>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-10 mb-5">
                                            <a href="#" class="btn btn-danger ml-3 float-right">Cancel</a>
                                            <a href="#" class="btn btn-success ml-3 float-right">Save & Print</a>
                                            <input type="submit" value="Save" class="btn btn-success float-right">
                                        </div>

                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>

    <script src="{{asset('public/plugins/jquery/jquery.min.js')}}"></script>

    <script>
        $('#create_condition_btn').click(function(){
            var countConditions=$('#countConditions').val();

            ++countConditions;
            $('#countConditions').val(countConditions);
            var html =
                ' <div class="row">'+
                ' <div id="p_number'+countConditions+'" class="form-group col-1"> <input type="text" class="form-control"  name="p_number'+countConditions+'" placeholder="PR001"> </div>'+
                ' <div id="p_name'+countConditions+'" class="form-group col-2"> <input type="text" class="form-control"  name="p_name'+countConditions+'" placeholder="Product Name"> </div>'+
                '<div id="p_description'+countConditions+'" class="form-group col-2"> <input type="text" class="form-control"  name="p_description'+countConditions+'" placeholder="Product Description"> </div>'+
                ' <div id="p_unit'+countConditions+'" class="form-group col-2"> <input type="text" class="form-control"  name="p_unit'+countConditions+'" placeholder="PCS"> </div> '+
                '   <div id="p_quantity'+countConditions+'" class="form-group col-2"> <input type="text" class="form-control"  name="p_quantity'+countConditions+'" placeholder="100"> </div> '+
                '  <div id="p_price'+countConditions+'" class="form-group col-2"> <input type="text" class="form-control"  name="p_price'+countConditions+'" placeholder="120"> </div>'+
                '  <div id="p_total_price'+countConditions+'" class="form-group col-1"> <input type="text" class="form-control"  name="p_total_price'+countConditions+'" placeholder="150"> </div>'+
                '</div>'

            $('#append_condition').append(html);
        });

        $('#remove_condition_btn').click(function(){
            var countConditions=$('#countConditions').val();

            if(countConditions<1){
                return false;
            }

            $('#p_number'+countConditions).remove();
            $('#p_name'+countConditions).remove();
            $('#p_description'+countConditions).remove();
            $('#p_unit'+countConditions).remove();
            $('#p_quantity'+countConditions).remove();
            $('#p_price'+countConditions).remove();
            $('#p_total_price'+countConditions).remove();

            --countConditions;
            $('#countConditions').val(countConditions);
        });
    </script>

    <script>
        function getRequData(data) {
            console.log(data);
            var path = location.pathname.split('/');
            var app=path[1];
            console.log(app);
            $.ajax({
                type: "GET",
                url: "/"+app+"/purchase/get-requ/"+data,
                success:function(data)
                {
                    $("#data").html(data);
                }
            });
        }

        function getVendor(data) {
            console.log(data);
            var path = location.pathname.split('/');
            var app=path[1];
            console.log(app);
            $.ajax({
                type: "GET",
                url: "/"+app+"/purchase/get-vendor/"+data,
                success:function(data)
                {
                    $("#vend").html(data);
                }
            });
        }
    </script>


@endsection
