<div class="row justify-content-around">
    <div class="col-md-10">
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Item Details</h3>
            </div>
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
                                <th>Quantity Received</th>
                                <th>Description</th>

                            </tr>
                            </thead>
                            <tbody>
{{--                            @dd($purchase_items_details)--}}
                            @foreach($purchase_items_details as $data)

                                <tr>

                                        <td><input type="text" class="form-control"  name="po_id" value="{{$data->purchase_order_id}}" readonly></td>
                                        <td><input type="text" class="form-control"  name="material_name[]" value="{{$data->material_name}}" readonly></td>
                                        <td><input type="text" class="form-control"  name="uom[]" value="{{$data->uom}}" readonly></td>
                                        <td><input type="text" class="form-control"  name="qty[]" value="{{$data->quantity}}" readonly></td>
                                        <td><input type="number" class="form-control"  name="qty_received[]" value="" required></td>
                                        <td><input type="text" class="form-control"  name="description[]" value=""  required></td>

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
