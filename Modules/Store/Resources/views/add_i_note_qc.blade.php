@extends('layouts.master')

@section('content')

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
                            <h3 class="card-title">QC I-Note</h3>
                            <a href="{{url('qc/dashboard')}}" class="btn btn-primary btn-sm float-right">Back</a>
                        </div>
                        <div class="card-body">
                            @if($view->inspectionDate!=NULL)
                                <form action="{{url('store/submitInwardInspectionNote')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" value="{{$gate->gatePassId}}" name="submitId">
                                    <div class="modal-body">
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">I-Note Date</label>
                                                <div class="col-sm-8">
                                                    <input type="text" readonly value="{{date('d-m-Y')}}" class="form-control">
                                                </div>
                                            </div>
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
                                                <th>I-Note Status</th>
                                                <th>Remarks</th>
                                                <th>Rejected Quantity</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($inward_raw_material as $data)
                                                <tr>
                                                    <td>{{$data->itemType}}</td>
                                                    <td>{{$data->materialName}}</td>
                                                    <td>{{$data->uom}}</td>
                                                    <td>{{$data->qty}}</td>

                                                    @if($data->inspectionDate==NULL)
                                                        <td>
                                                            <div class="col-sm-8">
                                                                <select name="inspectionStatus[]" class="form-control select2" required>
                                                                    <option value="excellent">Excellent</option>
                                                                    <option value="good">Good</option>
                                                                    <option value="bad">Bad</option>
                                                                </select>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group row">
                                                                <div class="col-sm-8">
                                                                    <textarea required rows="1" name="rejectionReason[]" class="form-control"></textarea>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group row">
                                                                <div class="col-sm-8">
                                                                    <input required type="text" name="rejectedQty[]" class="form-control">
                                                                </div>
                                                            </div>
                                                        </td>
                                                    @elseif($data->inspectionDate!=NULL)
                                                        <td>
                                                            <div class="col-sm-8">
                                                                <select disabled name="inspectionStatus[]" class="form-control select2" required>
                                                                    <option value="excellent">{{$data->inspectionStatus}}</option>
                                                                </select>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group row">
                                                                <div class="col-sm-8">
                                                                    <textarea readonly rows="1" name="rejectionReason[]" class="form-control">{{$data->rejectionReason}}</textarea>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group row">
                                                                <div class="col-sm-8">
                                                                    <input readonly type="text" name="rejectedQty[]" value="{{$data->rejectedQty}}" class="form-control">
                                                                </div>
                                                            </div>
                                                        </td>
                                                    @endif

                                                </tr>
                                            @endforeach


                                            </tbody>
                                        </table>
                                    </div>








                                </form>
                            @elseif($view->inspectionDate==NULL)
                                <form action="{{url('store/submitInwardInspectionNote')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" value="{{$gate->gatePassId}}" name="submitId">
                                    <div class="modal-body">
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">I-Note Date</label>
                                                <div class="col-sm-8">
                                                    <input type="text" readonly value="{{date('d-m-Y')}}" class="form-control">
                                                </div>
                                            </div>
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
                                                <th>I-Note Status</th>
                                                <th>Remarks</th>
                                                <th>Rejected Quantity</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($inward_raw_material as $data)
                                                <tr>
                                                    <td>{{$data->itemType}}</td>
                                                    <td>{{$data->materialName}}</td>
                                                    <td>{{$data->uom}}</td>
                                                    <td>{{$data->qty}}</td>

                                                    @if($data->inspectionDate==NULL)
                                                        <input type="hidden" value="{{$data->id}}" name="detail_id[]">
                                                        <td>
                                                            <div class="col-sm-8">
                                                                <select name="inspectionStatus[]" class="form-control select2" required>
                                                                    <option value="excellent">Excellent</option>
                                                                    <option value="good">Good</option>
                                                                    <option value="bad">Bad</option>
                                                                </select>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group row">
                                                                <div class="col-sm-8">
                                                                    <textarea required rows="1" name="rejectionReason[]" class="form-control"></textarea>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group row">
                                                                <div class="col-sm-8">
                                                                    <input required type="text" name="rejectedQty[]" class="form-control">
                                                                </div>
                                                            </div>
                                                        </td>
                                                    @elseif($data->inspectionDate!=NULL)
                                                        <td>
                                                            <div class="col-sm-8">
                                                                <select disabled name="inspectionStatus[]" class="form-control select2" required>
                                                                    <option value="excellent">{{$data->inspectionStatus}}</option>
                                                                </select>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group row">
                                                                <div class="col-sm-8">
                                                                    <textarea readonly rows="1" name="rejectionReason[]" class="form-control">{{$data->rejectionReason}}</textarea>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group row">
                                                                <div class="col-sm-8">
                                                                    <input readonly type="text" name="rejectedQty[]" value="{{$data->rejectedQty}}" class="form-control">
                                                                </div>
                                                            </div>
                                                        </td>
                                                    @endif

                                                </tr>
                                            @endforeach


                                            </tbody>
                                        </table>
                                    </div>



                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Update</button>
                                    </div>





                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
