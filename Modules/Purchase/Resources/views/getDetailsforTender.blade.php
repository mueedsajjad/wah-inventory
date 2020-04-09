
<div class="row justify-content-around">
    <div class="col-md-6">


        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Requisition ID</label>
            <div class="col-sm-8">
                <input type="text" name="driverName" required class="form-control" placeholder="Waseem" readonly value="{{$record->requisition_id}}">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Purchase Order ID</label>
            <div class="col-sm-8">
                <input type="text" name="driverName" required class="form-control" placeholder="Waseem" readonly value="{{$record->purchase_order_id}}">
            </div>
        </div>


    </div>
    <div id="right_side" class="col-md-6">
        <div class="form-group row">
            <label for="sga_13" class="col-sm-4 col-form-label">Issue Date</label>
            <div class="col-sm-8">
                <input type="text" readonly required value="{{$record->issue_date}}" class="form-control" id="sga_19" placeholder="08-02-2020">
            </div>
        </div>
        <div class="form-group row">
            <label for="sga_13" class="col-sm-4 col-form-label">Purchase Type</label>
            <div class="col-sm-8">
                <input type="text" readonly required value="{{$record->purchase_type}}" class="form-control" id="sga_19" placeholder="08-02-2020">
            </div>
        </div>

    </div>



</div>


<div class="row justify-content-around">
    <div class="col-md-12">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Completed Items</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div id="append_condition">
                    <input type="hidden" id="countConditions"  name="countConditions" value="0">
                    @if(count($detailsOne) > 0)

                    <div class="row">

                        <table class="table-responsive table-hover">
                            <thead>
                            <tr>
                                <th>Material Code</th>
                                <th>UOM</th>
                                <th>Quantity</th>
                                <th>Description</th>
                                <th>Unit Price</th>
                                <th>Total Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($detailsOne as $key=>$requisition)
                                <tr>
                                    <div class="mome">
                                        {{--                                        <td><input type="text" class="form-control"  name="reqisition_id" value="{{$requisition->requisition_id}}" readonly></td>--}}
                                        <td><input type="text" class="form-control"  name="material_name[]" value="{{$requisition->material_name}}" readonly></td>
                                        <td><input type="text" class="form-control"  name="uom[]" value="{{$requisition->uom}}" readonly></td>
                                        <td><input type="text" class="form-control"  name="qty[]" value="{{$requisition->quantity}}" readonly></td>
                                        {{--                                        <td><input type="number" class="form-control"  name="qty_received[]" value="" required></td>--}}
                                        <td><input type="text" class="form-control"  name="description[]" value="{{$requisition->description}}"  readonly></td>
                                        <td><input type="text" class="form-control"  name="description[]" value="{{$requisition->unit_price}}"  readonly></td>

                                        <td><input type="text" class="form-control"  name="description[]" value="{{$requisition->total_price}}"  readonly></td>
                                    </div>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>

                    </div>
                    @else

                        No Record Found

                    @endif
                </div>

            </div>
        </div>
    </div>



</div>

<div class="row justify-content-around">
    <div class="col-md-12">
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">Pending Items</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div id="append_condition">
                    <input type="hidden" id="countConditions"  name="countConditions" value="0">
                    @if(count($detailsZero) > 0)
                    <div class="row">
                        <table class="table-responsive table-hover">
                            <thead>
                            <tr>
                                <th>Material Code</th>
                                <th>UOM</th>
                                <th>Quantity</th>
                                <th>Description</th>
                                <th>Unit Price</th>
                                <th>Total Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($detailsZero as $key=>$requisition)
                                <tr>
                                    <div class="mome">
                                        {{--                                        <td><input type="text" class="form-control"  name="reqisition_id" value="{{$requisition->requisition_id}}" readonly></td>--}}
                                        <td><input type="text" class="form-control"  name="material_name[]" value="{{$requisition->material_name}}" readonly></td>
                                        <td><input type="text" class="form-control"  name="uom[]" value="{{$requisition->uom}}" readonly></td>
                                        <td><input type="text" class="form-control"  name="qty[]" value="{{$requisition->quantity}}" readonly></td>
                                        {{--                                        <td><input type="number" class="form-control"  name="qty_received[]" value="" required></td>--}}
                                        <td><input type="text" class="form-control"  name="description[]" value="{{$requisition->description}}"  readonly></td>
                                        <td><input type="text" class="form-control"  name="description[]" value="{{$requisition->unit_price}}"  readonly></td>

                                        <td><input type="text" class="form-control"  name="description[]" value="{{$requisition->total_price}}"  readonly></td>
                                    </div>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>



                    </div>
                        @else

                        Tender Request Completed
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>
@if(count($detailsZero) > 0)
    <div class="col-md-3 mt-2">
        <a href="{{url('tender/create/'.$record->id)}}" class="btn-success btn btn-sm">Create Tender Order</a>
    </div>
@endif
