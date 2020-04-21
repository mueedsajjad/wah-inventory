@extends('layouts.master')

@section('content')


    <div class="row">

        <div class="col-md-12">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">New Purchase Order</h3>
                </div>


                <div class="card-body">
                    <form action="{{url('purchase/purchase-order-approval')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{$records->id}}" name="requisition_id">
                        <div class="row justify-content-around">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label for="sga_13" class="col-sm-4 col-form-label">Purchase Requisition</label>

                                    <div class="col-sm-8">
                                        <div class="">
                                            <input type="text" value="{{$records->requisition_id}}" class="form-control" readonly>
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
                                    <label class="col-sm-4 col-form-label">Purchase By</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="purchase_type" required>
                                            <option disabled>Select Purchase Type</option>
                                            <option value="ppra">PPRA</option>
                                            <option value="direct-purchase">Direct Purchase</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
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
                            <div class="col-md-10">
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
                                                        <th>Requisition Id</th>
                                                        <th>Material Code</th>
                                                        <th>UOM</th>
                                                        <th>Quantity</th>
                                                        <th>Description</th>
                                                        <th>Unit Price</th>
                                                        <th>Total Price</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <div class="moma">
                                                        @php $n=0; @endphp
                                                        @foreach($details as $data)
                                                            @php $n++; @endphp
                                                            <tr>
                                                                <div class="mome">
                                                                    <td><input type="text" class="form-control"  name="" value="{{$data->requisition_id}}" readonly></td>
                                                                    <td><input type="text" class="form-control"  name="material_name[]" value="{{$data->material_name}}" readonly></td>
                                                                    <td><input type="text" class="form-control"  name="uom[]" value="{{$data->uom}}" readonly></td>
                                                                    <td><input id="quantity" type="text" class="form-control quantity"  name="qty[]" value="{{$data->quantity}}" readonly></td>
                                                                    <td><input type="text" class="form-control"  name="description[]" value="{{$data->description}}" readonly ></td>
                                                                    <td><input type="text" class="form-control unitPrice"  name="unitprice[]" value="" required></td>
                                                                    <td><input type="text" class="form-control totalPrice"  name="totalprice[]" value="" required></td>
                                                                </div>
                                                            </tr>
                                                        @endforeach
                                                    </div>

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


@endsection
<script
    src="https://code.jquery.com/jquery-3.5.0.min.js"
    integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ="
    crossorigin="anonymous">

</script>
<script>
    // $('#unitPrice').on("change", function(e) {
    //
    //     console.log("a");
    //      unitPrice = $('#unitPrice').val();
    //     quantity= $('#quantity').val();
    //     unitPrice= unitPrice*quantity;
    //     console.log(unitPrice);
    //     $('#totalPrice').val=unitPrice;
    //
    // });


    $('document').ready(function() {

        $('.moma').on('onkeypress', '.unitPrice', function (e) {

            alert('moms')

        });

    });

    // function priceChange()
    // {
    //
    //     unitPrice=$("#unitPrice").val();
    //     quantity=$("#quantity").val();
    //     unitPrice=unitPrice*quantity;
    //     $("#totalPrice").val(unitPrice);
    //     console.log(unitPrice);
    //
    // }
</script>
