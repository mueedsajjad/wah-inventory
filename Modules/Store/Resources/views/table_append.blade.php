{{--<div class="table-responsive">--}}
{{--    <table id="materialTable" class="table table-bordered table-striped">--}}
{{--        <thead>--}}
{{--        <tr>--}}
{{--            <th>Type</th>--}}
{{--            <th>Name</th>--}}
{{--            <th>UOM</th>--}}
{{--            <th>Quantity</th>--}}
{{--            <th>Description</th>--}}
{{--        </tr>--}}
{{--        </thead>--}}
{{--        <tbody>--}}
{{--        @foreach($inward_raw_material as $data)--}}
{{--            <tr>--}}
{{--                <td>{{$data->itemType}}</td>--}}
{{--                <td>{{$data->materialName}}</td>--}}
{{--                <td>{{$data->uom}}</td>--}}
{{--                <td>{{$data->qty}}</td>--}}
{{--                <td>{{$data->description}}</td>--}}
{{--            </tr>--}}
{{--        @endforeach--}}


{{--        </tbody>--}}
{{--    </table>--}}
{{--</div>--}}

{{--    <h4>Inward Gate Pass Details</h4>--}}
{{--<div class="table-responsive">--}}
{{--    <table id="gateTable" class="table table-bordered table-striped">--}}
{{--        <thead>--}}
{{--        <tr>--}}
{{--            <th>Gate Pass Id</th>--}}
{{--            <th>Driver Id</th>--}}
{{--            <th>Driver Name</th>--}}
{{--            <th>Vehicle Number</th>--}}
{{--            <th>Driver Phone</th>--}}
{{--            <th>Vendor Type</th>--}}
{{--            <th>Vendor Id</th>--}}
{{--            <th>Vendor Name</th>--}}
{{--            <th>Vendor Phone</th>--}}
{{--        </tr>--}}
{{--        </thead>--}}
{{--        <tbody id="append_details_two">--}}

{{--            <td>{{$inward_gate_pass->gatePassId}}</td>--}}
{{--            <td>{{$inward_gate_pass->driverId}}</td>--}}
{{--            <td>{{$inward_gate_pass->driverName}}</td>--}}
{{--            <td>{{$inward_gate_pass->vehicalNo}}</td>--}}
{{--            <td>{{$inward_gate_pass->driverPh}}</td>--}}
{{--            <td>{{$inward_gate_pass->vendorType}}</td>--}}
{{--            <td>{{$inward_gate_pass->vendorId}}</td>--}}
{{--            <td>{{$inward_gate_pass->vendorName}}</td>--}}
{{--            <td>{{$inward_gate_pass->vendorPh}}</td>--}}

{{--        </tbody>--}}
{{--    </table>--}}
{{--</div>--}}



    <section class="content pt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @if(!empty($errors->first()))
                        <div class="alert alert-danger text-center">
                            <span>{{ $errors->first() }}</span>
                        </div>
                    @endif
                    @if(session()->has('message'))
                        <div class="alert alert-success text-center">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title">Gate Pass Details</h3>
{{--                            <a href="{{url('store/inwardGoodsReceipt')}}" class="btn btn-primary btn-sm float-right">Back</a>--}}
                        </div>
                                <form action="" method="" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row justify-content-around">
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Gate Pass ID</label>
                                                <div class="col-sm-8">
                                                    <input type="text" readonly name="" value="{{$inward_gate_pass->gatePassId}}" class="form-control" placeholder="GRN001">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Driver Id</label>
                                                <div class="col-sm-8">
                                                    <input type="text" readonly required name="" value="{{$inward_gate_pass->driverId}}" class="form-control" placeholder="PON001">
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row justify-content-around">
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Driver Name</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="" readonly value="{{$inward_gate_pass->driverName}}" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Vehicle Number</label>
                                                <div class="col-sm-8">
{{--                                                    <input type="hidden" value="{{$pop->purchase_type}}">--}}
                                                    <input type="text" name="" readonly value="{{$inward_gate_pass->vehicalNo}}" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row justify-content-around">
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Driver Ph#</label>
                                                <div class="col-sm-8">
                                                    <input type="text" readonly name="name" value="{{$inward_gate_pass->driverPh}}" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Vendor Type</label>
                                                <div class="col-sm-8">
                                                    <input type="text" readonly name="name" value="{{$inward_gate_pass->vendorType}}" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>




                                    <div class="row justify-content-around">
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Vendor Name</label>
                                                <div class="col-sm-8">
                                                    <input type="text" readonly name="name" value="{{$inward_gate_pass->vendorName}}" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Vendor Id</label>
                                                <div class="col-sm-8">
                                                    <input type="text" readonly name="name" value="{{$inward_gate_pass->vendorId}}" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>






                                    <div class="row justify-content-around">
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Vendor Ph#</label>
                                                <div class="col-sm-8">
                                                    <input type="text" readonly name="name" value="{{$inward_gate_pass->vendorPh}}" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>







                                    <div class="card card-dark">
                                        <div class="card-header">
                                            <h3 class="card-title">Bilty Details</h3>
                                            {{--                            <a href="{{url('store/inwardGoodsReceipt')}}" class="btn btn-primary btn-sm float-right">Back</a>--}}
                                        </div>
                                    </div>
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
{{--                                                <input type="hidden" value="{{$data->itemType}}" name="itemType[]">--}}
{{--                                                <input type="hidden" name="inward_raw_material_id[]" value="{{$data->id}}">--}}
                                                <tr>
                                                    <td>
                                                        <input type="text" readonly name="" value="{{$data->itemType}}" class="form-control">
                                                    </td>
                                                    <td>
                                                        <input type="text" readonly name="" value="{{$data->materialName}}" class="form-control">
                                                    </td>
                                                    <td>
                                                        <input type="text" readonly name="" value="{{$data->uom}}" class="form-control">
                                                    </td>
                                                    <td>
                                                        <input type="text" readonly name="" value="{{$data->qty}}" class="form-control">
                                                    </td>
                                                    <td>
                                                        <textarea rows="1" readonly name="" class="form-control">{{$data->description}}</textarea>
                                                    </td>
                                                </tr>
                                            @endforeach


                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-11 mt-2">
{{--                                        <a href="#" class="btn btn-secondary ml-3 float-right">Print</a>--}}
{{--                                        <input type="submit" value="Save" class="btn btn-success float-right">--}}
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
{{--        </div>--}}
    </section>
{{--@endsection--}}






