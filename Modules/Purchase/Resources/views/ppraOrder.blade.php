@extends('layouts.master')

@section('content')

    <section class="content pt-3">
        <div class="container-fluid">

                <div class="alert alert-primary" role="alert">
                    <strong>Note:</strong> If Vendor is not created against this Purchase Order then First Create Vendor and add Commercial and Technical Offer
                </div>

            <div class="col-md-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">New Purchase Order</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{url('purchase/ppra-order')}}" method="post" enctype="multipart/form-data">
                         @csrf
                            <input type="hidden" value="{{$record->id}}" name="id">
                            <input type="hidden" value="direct" name="vendor">

                            <div class="row justify-content-around">
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label for="sga_13" class="col-sm-4 col-form-label">PO No</label>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <input type="text" class="form-control" value="{{$record->purchase_order_id}}" readonly>
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

                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label for="sga_13" class="col-sm-4 col-form-label">Requisition NO</label>
                                        <div class="col-sm-8">
                                            <input type="text"  name="requ"  required value="{{$record->requisition_id}}" class="form-control" id="sga_19" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Purchase by</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" value="{{$record->purchase_type}}" readonly>

                                        </div>
                                    </div>
                                </div>
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
                                            <label class="col-sm-4 col-form-label">Vendor ID</label>
                                            <div class="col-sm-8">
{{--                                                <select name="vendor" onchange="getVendor(this.value)" id="" class="form-control select2">--}}
{{--                                                    <option value="" >Select Vendor</option>--}}
{{--                                                    @foreach($vendor as $data)--}}
{{--                                                        <option value="{{$data->id}}">{{$data->name}}</option>--}}
{{--                                                    @endforeach--}}
{{--                                                </select>--}}
                                                <input type="text" class="form-control" value="{{$vendor->supplier_id}}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="data">

                                </div>
                            <div class="row justify-content-around">
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label for="sga_16" class="col-sm-4 col-form-label">Vendor Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="sga_16" value="{{$vendor->name}}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label for="sga_16" class="col-sm-4 col-form-label">Vendor Phone#</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="sga_16" value="{{$vendor->m_number}}" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-around">
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label for="sga_16" class="col-sm-4 col-form-label">Vendor Acc No</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="sga_16" value="{{$vendor->account_num}}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label for="sga_16" class="col-sm-4 col-form-label">Vendor Email</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="sga_16" value="{{$vendor->email}}" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-around">
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label for="sga_16" class="col-sm-4 col-form-label">Commercial Offer</label>
                                        <div class="col-sm-8">
                                            <textarea type="text" class="form-control" name="c_offer" readonly id="sga_16">{{$ppra->commercial_offer}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label for="sga_16" class="col-sm-4 col-form-label">Technical Offer</label>
                                        <div class="col-sm-8">
                                            <textarea type="text" class="form-control" readonly name="t_offer" id="sga_16">{{$ppra->technical_offer}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>




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


                            <div id="data">

                            </div>
                            <div class="row justify-content-around">
                                <div class="col-md-10">
                                    <div class="card card-dark">
                                      <div class="card-header">
                                          <h4 class="card-title">Products</h4>
                                        </div>
                                        <div class="card-body">
                                            <div id="append_condition">
                                                <input type="hidden" id="countConditions"  name="countConditions" value="0">
                                                <div class="row">

                                                    <table>
                                                        <thead>
                                                        <tr>
                                                            <th>Purchase Order Id</th>
                                                            <th>Material Code</th>
                                                            <th>UOM</th>
                                                            <th>Quantity</th>
                                                            <th>Description</th>
                                                            <th>Unit Price</th>
                                                            <th>Total Price</th>
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
                                                                    <td><input type="text" class="form-control"  name="unitprice[]" value="{{$data->unit_price}}" readonly></td>
                                                                    <td><input type="text" class="form-control"  name="totalprice[]" value="{{$data->total_price}}" readonly></td>
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

                        </form>


                    </div>
                </div>
            </div>



        </div>
    </section>
    @endsection

<script>
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
                $("#data").html(data);
            }
        });
    }
</script>
