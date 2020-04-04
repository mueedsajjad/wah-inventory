@extends('layouts.master')

@section('content')

    <section class="content pt-3">
        <div class="container-fluid">

            @if(session()->has('save'))
                <div class="alert alert-success" role="alert">
                    <strong>Success</strong> {{session()->get('save')}}
                </div>
            @endif
                @if(session()->has('error'))
                    <div class="alert alert-danger" role="alert">
                        <strong>Error</strong> {{session()->get('error')}}
                    </div>
                @endif



                <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Vendor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Direct Purchase</a>
                    </li>

                </ul>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="col-md-12">
                            <div class="card card-dark">
                                <div class="card-header">
                                    <h3 class="card-title">New Purchase Order</h3>
                                </div>


                                <div class="card-body">
                                    <form action="{{url('purchase/send-order')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" value="{{$record->id}}" name="id">
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

                                        <div id="data">

                                        </div>

                                        <div class="row justify-content-around">
                                            <div class="col-md-10">
                                                <div class="card card-dark">
                                                    <!--<div class="card-header">
                                                      <h3 class="card-title">Products</h3>
                                                    </div>-->
                                                    <!-- /.card-header -->

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

                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="col-md-12">
                            <div class="card card-dark">
                                <div class="card-header">
                                    <h3 class="card-title">New Purchase Order</h3>
                                </div>


                                <div class="card-body">
                                    <form action="{{url('purchase/purchase-order-approval')}}" method="post" enctype="multipart/form-data">
                                        @csrf
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
                                                    <label class="col-sm-4 col-form-label">Select Purchase Type</label>
                                                    <div class="col-sm-8">
                                                        <select name="purchase_by" id="" class="form-control">
                                                            <option value="vendor">Vendor</option>
                                                            <option value="direct">Direct Purchase</option>
                                                        </select>
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

                                    </form>
                                </div>
                            </div>
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

