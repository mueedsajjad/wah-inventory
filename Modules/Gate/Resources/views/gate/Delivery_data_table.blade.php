
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
                                <th> Order Id</th>
                                <th>Product Code</th>
                                <th>UOM</th>
                                <th>Quantity</th>
{{--                                <th>Quantity Received</th>--}}
{{--                                <th>Description</th>--}}

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($table_data as $data)
                                <tr>
                                    <div class="mome">
                                        <td><input type="text" class="form-control"  name="po_id" value="{{$data->so_number}}" readonly></td>
                                        <td><input type="text" class="form-control"  name="material_name[]" value="{{$data->product_code}}" readonly></td>
                                        <?php
                                            $n=\Illuminate\Support\Facades\DB::table('unit')->where('id',$data->uom)->first();
                                            $name=$n->name;
                                        ?>
                                        <td><input type="text" class="form-control"  name="uom[]" value="{{$name}}" readonly></td>
                                        <td><input type="text" class="form-control"  name="qty[]" value="{{$data->qty}}" readonly></td>
{{--                                        <td><input type="number" class="form-control"  name="qty_received[]" value="" required></td>--}}
{{--                                        <td><input type="text" class="form-control"  name="description[]" value=""  required></td>--}}
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
