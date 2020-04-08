

<div class="row justify-content-around">
    <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Component Requisition ID</label>
            <div class="col-sm-8">
                <input type="text" name="driverName" required class="form-control" placeholder="Waseem" readonly value="{{$record->component_requisition_id}}">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Gate Type</label>
            <div class="col-sm-8">
                <input type="text" name="driverName" required class="form-control"  readonly value="{{$record->gate_type}}">
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
                    <div class="row justify-content-center">
                        <table class="table-responsive table-hover" >
                            <thead>
                            <tr>
                                <th>Requisition Id</th>
                                <th>Material Name/Code</th>
                                <th>UOM</th>
                                <th>Description</th>
                                <th>Action</th>


                            </tr>
                            </thead>
                            <tbody>
                            @foreach($details as $key => $data)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$data->component_name}}</td>
                                    <td>{{$data->quantity}}</td>
                                    <td>{{$data->description}}</td>
                                    @if($data->status == 0)
                                        <td class="d-flex">
                                            <a href="{{url('requisition/material/accept/'.$data->id)}}" class="btn btn-success btn-sm m-1">Accept</a>
                                            <a href="{{url('requisition/material/reject/'.$data->id)}}" class="btn btn-danger btn-sm m-1">Reject</a>
                                        </td>
                                    @elseif($data->status == 1)
                                        <td >
                                            Approved
                                        </td>
                                    @elseif($data->status == 2)
                                        <td >
                                            Rejected
                                        </td>
                                    @else
                                        <td >
                                            In Progress
                                        </td>
                                    @endif
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

