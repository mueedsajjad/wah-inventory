<div class="col-md-4">

</div>
<div class="form-group row">
    <label class="col-sm-4 col-form-label">Purchase Type</label>
    <div class="col-sm-8">
        <input type="text" name="purchase_type" disabled required readonly value="{{$purchase_type}}" class="form-control" >
    </div>
</div>
    @if($vend==null)

    @else


    <input type="hidden" name="ven_id" value="{{$vend->id}}">
    <input type="hidden" name="suppl_id" value="{{$vend->supplier_id}}">

<div class="form-group row">
    <label class="col-sm-4 col-form-label">Vendor ID:</label>
    <div class="col-sm-8">
        <input type="text" name="vendor_id" disabled required readonly value="{{$vend->supplier_id}}" class="form-control" >
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-4 col-form-label">Vendor Name:</label>
    <div class="col-sm-8">
        <input type="text" name="" disabled required readonly value="{{$vend->name}}" class="form-control" >
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-4 col-form-label">Vendor Email:</label>
    <div class="col-sm-8">
        <input type="text" name="" disabled required readonly value="{{$vend->email}}" class="form-control" >
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-4 col-form-label">Vendor Ph #:</label>
    <div class="col-sm-8">
        <input type="text" name="" disabled required readonly value="{{$vend->p_number}}" class="form-control" >
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-4 col-form-label">Vendor City:</label>
    <div class="col-sm-8">
        <input type="text" name="" required readonly value="{{$vend->city}}" class="form-control" >
    </div>
</div>
@endif

</div>
    </div>

{{--<div class="row justify-content-around">--}}
{{--    <div class="col-md-10">--}}
{{--        <div class="card card-dark">--}}
{{--            <div class="card-header">--}}
{{--                <h3 class="card-title">Item Details</h3>--}}
{{--            </div>--}}
{{--            <!-- /.card-header -->--}}

{{--            <div class="card-body">--}}
{{--                <div id="append_condition">--}}
{{--                    <input type="hidden" id="countConditions"  name="countConditions" value="0">--}}
{{--                    <div class="row">--}}

{{--                        <table>--}}
{{--                            <thead>--}}
{{--                            <tr>--}}
{{--                                <th>Purchase Order Id</th>--}}
{{--                                <th>Material Code</th>--}}
{{--                                <th>UOM</th>--}}
{{--                                <th>Quantity</th>--}}
{{--                                <th>Quantity Received</th>--}}
{{--                                <th>Description</th>--}}

{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                            @foreach($purchase_items_details as $data)--}}
{{--                                <tr>--}}
{{--                                    <div class="mome">--}}
{{--                                        <td><input type="text" class="form-control"  name="po_id" value="{{$data->purchase_order_id}}" readonly></td>--}}
{{--                                        <td><input type="text" class="form-control"  name="material_name[]" value="{{$data->material_name}}" readonly></td>--}}
{{--                                        <td><input type="text" class="form-control"  name="uom[]" value="{{$data->uom}}" readonly></td>--}}
{{--                                        <td><input type="text" class="form-control"  name="qty[]" value="{{$data->quantity}}" readonly></td>--}}
{{--                                        <td><input type="number" class="form-control"  name="qty_received[]" value="" required></td>--}}
{{--                                        <td><input type="text" class="form-control"  name="description[]" value=""  required></td>--}}
{{--                                    </div>--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}
{{--                            </tbody>--}}

{{--                        </table>--}}

{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="col-10 mb-5">--}}
{{--        <a href="#" class="btn btn-danger ml-3 float-right">Cancel</a>--}}
{{--        <a href="#" class="btn btn-success ml-3 float-right">Save & Print</a>--}}
{{--        <input type="submit" value="Save" class="btn btn-success float-right">--}}
{{--    </div>--}}

{{--</div>--}}
