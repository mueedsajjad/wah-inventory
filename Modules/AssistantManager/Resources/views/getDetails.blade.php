
<div class="row justify-content-around">
    <div class="col-md-6">


        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Requisition ID</label>
            <div class="col-sm-8">
                <input type="text" name="driverName" required class="form-control" placeholder="Waseem" readonly value="{{$record->requisition_id}}">
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


    </div>



</div>


<div class="row justify-content-around">
    <div class="col-md-12">
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Item Details</h3>
            </div>
            <!-- /.card-header -->

            <div class="card-body">
                <div id="append_condition">
                    <input type="hidden" id="countConditions"  name="countConditions" value="0">
                    <div class="row">

                        <table class="table-responsive table-hover">
                            <thead>
                            <tr>
                                <th>Requisition Id</th>
                                <th>Material Code</th>
                                <th>UOM</th>

                                <th>Description</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($details as $key=>$requisition)
                                <tr>
                                    <div class="mome">
{{--                                        <td><input type="text" class="form-control"  name="reqisition_id" value="{{$requisition->requisition_id}}" readonly></td>--}}
                                        <td><input type="text" class="form-control"  name="material_name[]" value="{{$requisition->material_name}}" readonly></td>
                                        <td><input type="text" class="form-control"  name="uom[]" value="{{$requisition->uom}}" readonly></td>
                                        <td><input type="text" class="form-control"  name="qty[]" value="{{$requisition->quantity}}" readonly></td>
{{--                                        <td><input type="number" class="form-control"  name="qty_received[]" value="" required></td>--}}
                                        <td><input type="text" class="form-control"  name="description[]" value="{{$requisition->description}}"  readonly></td>
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



</div>
