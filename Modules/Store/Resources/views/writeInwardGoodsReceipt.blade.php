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
                            <h3 class="card-title">Goods Receipt Note</h3>
                            <a href="{{url('store/inwardGoodsReceipt')}}" class="btn btn-primary btn-sm float-right">Back</a>
                        </div>
                        <div class="card-body">
                            <form action="{{url('store/submitInwardGoodsReceipt')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="inward_raw_material_id" value="{{$inward_raw_material->id}}">
                                <div class="row justify-content-around">
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">GRN#</label>
                                            <div class="col-sm-8">
                                                <input type="text" readonly name="grn" value="GRN00{{$countInwardGoodsReceipt}}" class="form-control" placeholder="GRN001">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Document</label>
                                            <div class="col-sm-8">
                                                <div class="custom-file">
                                                    <input type="file" name="document" class="custom-file-input" id="inputGroupFile01"
                                                           aria-describedby="inputGroupFileAddon01">
                                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row justify-content-around">
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="sga_13" class="col-sm-4 col-form-label">GRN Date</label>
                                            <div class="col-sm-8">
                                                <input type="text" readonly name="grnDate" value="{{date('d-m-Y')}}" class="form-control" placeholder="08-02-2020">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Purchased From</label>
                                            <div class="col-sm-8">
                                                <select class="form-control select2" required name="purchasedFrom">
                                                    <option value="ppra">PPRA</option>
                                                    <option value="direct purchase">Direct Purchase</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row justify-content-around">
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Gate Pass ID</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="gatePassId" readonly value="{{$inward_raw_material->gatePassId}}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Total Cost</label>
                                            <div class="col-sm-8">
                                                <input type="text" required name="totalCost" class="form-control" placeholder="175">
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row justify-content-around">
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Vendor Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" readonly name="name" value="{{$inward_gate_pass->vendorName}}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Purchase Order No</label>
                                            <div class="col-sm-8">
                                                <input type="text" required name="purchaseOrderNo" class="form-control" placeholder="PON001">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-around">
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Material Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" readonly name="materialName" value="{{$inward_raw_material->materialName}}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Unit of Measurement</label>
                                            <div class="col-sm-8">
                                                <input type="text" readonly name="uom" value="{{$inward_raw_material->uom}}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-around">
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Description</label>
                                            <div class="col-sm-8">
                                                <textarea readonly rows="2" name="description" class="form-control">{{$inward_raw_material->description}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Total Quantity</label>
                                            <div class="col-sm-8">
                                                @php
                                                    $qty=$inward_raw_material->qty;
                                                    $rejectedQty=$inward_raw_material->rejectedQty;
                                                    $totalQty=$qty-$rejectedQty;
                                                @endphp
                                                <input type="text" readonly name="totalQuantity" value="{{$totalQty}}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-11">
                                    <a href="#" class="btn btn-secondary ml-3 float-right">Print</a>
                                    <input type="submit" value="Save" class="btn btn-success float-right">
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
