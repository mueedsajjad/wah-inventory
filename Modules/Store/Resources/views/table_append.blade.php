<div class="table-responsive">
    <table id="materialTable" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Type</th>
            <th>Name</th>
            <th>UOM</th>
            <th>Quantity</th>
            <th>Description</th>
        </tr>
        </thead>
        <tbody>
        @foreach($inward_raw_material as $data)
            <tr>
                <td>{{$data->itemType}}</td>
                <td>{{$data->materialName}}</td>
                <td>{{$data->uom}}</td>
                <td>{{$data->qty}}</td>
                <td>{{$data->description}}</td>
            </tr>
        @endforeach


        </tbody>
    </table>
</div>

    <h4>Inward Gate Pass Details</h4>
<div class="table-responsive">
    <table id="gateTable" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Gate Pass Id</th>
            <th>Driver Id</th>
            <th>Driver Name</th>
            <th>Vehicle Number</th>
            <th>Driver Phone</th>
            <th>Vendor Type</th>
            <th>Vendor Id</th>
            <th>Vendor Name</th>
            <th>Vendor Phone</th>
        </tr>
        </thead>
        <tbody id="append_details_two">

            <td>{{$inward_gate_pass->gatePassId}}</td>
            <td>{{$inward_gate_pass->driverId}}</td>
            <td>{{$inward_gate_pass->driverName}}</td>
            <td>{{$inward_gate_pass->vehicalNo}}</td>
            <td>{{$inward_gate_pass->driverPh}}</td>
            <td>{{$inward_gate_pass->vendorType}}</td>
            <td>{{$inward_gate_pass->vendorId}}</td>
            <td>{{$inward_gate_pass->vendorName}}</td>
            <td>{{$inward_gate_pass->vendorPh}}</td>

        </tbody>
    </table>
</div>

    {{--                        <form class="form-control" action="" method="">--}}
    {{--                            <div class="row">--}}
    {{--                                <div class="col-md-12">--}}
    {{--                                    <label>Quantity Received</label><br>--}}
    {{--                                    <input type="number" name="" value="1122" readonly>--}}
    {{--                                </div>--}}
    {{--                                <div class="col-md-12 mt-2">--}}
    {{--                                    <input type="submit" name="accept" value="Accept" class="btn btn-success">--}}
    {{--                                    <input type="submit" name="reject" value="Reject" class="btn btn-danger">--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </form>--}}

