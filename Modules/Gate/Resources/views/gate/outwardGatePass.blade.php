@extends('layouts.master')

@section('content')
    <section class="content pt-5">
        <div class="container-fluid">
            <div class="row">


                <div class="col-md-12">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Outward Gate Pass</h3>
                        </div>
                        <div class="card-body">
                            @if(!empty($errors->first()))
                                <div class="alert alert-danger"  style="text-align: center">
                                    <span>{{ $errors->first() }}</span>
                                </div>
                            @endif
                            @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                            @endif
                            <form action="{{url('gate/addInwardGatePass')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row justify-content-around">
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="sga_13" class="col-sm-4 col-form-label">Gate Pass ID</label>
                                            <div class="col-sm-8">
                                                <input type="text" required name="gatePassId" readonly class="form-control" value="GP00" id="sga_13" placeholder="GP001">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="sga_13" class="col-sm-4 col-form-label">Date</label>
                                            <div class="col-sm-8">
                                                <input type="text" readonly required value="{{date('d-m-Y')}}" class="form-control" id="sga_19" placeholder="08-02-2020">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Driver ID</label>
                                            <div class="col-sm-8">
                                                <input type="text" required readonly name="driverId" class="form-control" value="DR00" placeholder="DR001">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Driver Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="driverName" required class="form-control" placeholder="Waseem">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="sga_21" class="col-sm-4 col-form-label">Driver Phone #</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="driverPh" required class="form-control" id="sga_24" placeholder="03351234567">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Vehicle No</label>
                                            <div class="col-sm-8">
                                                <input type="text" required name="vehicalNo" class="form-control" id="sga_22" placeholder="LHR-8828">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Vendor Type</label>
                                            <div class="col-sm-8">
                                                <select name="vendorType" class="form-control" required>
                                                    <option value="Registered Vendor">Registered Vendor</option>
                                                    <option value="Non Registered Vendor">Non Registered Vendor</option>
                                                    <option value="WIL Collection">WIL Collection</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Vendor ID</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="vendorId" required readonly value="VND00" class="form-control" placeholder="VND001">
                                            </div>
                                        </div>
                                        {{--                                    changing--}}
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Vendor details</label>
                                            <div class="col-sm-8" >
                                                <select name="vendor" id="V_details" class="form-control">
                                                    <option value="" id="sel" >select</option>
                                                    <option value="V1">V1</option>
                                                    <option value="V2">V2</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div id="display"></div>
                                        {{--                                    end here--}}

                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Vendor Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="vendorName" required class="form-control" placeholder="CDOXS">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Vendor Address</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="vendorAddress" required class="form-control" placeholder="Lahore Pak">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Vendor Phone #</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="vendorPh" required class="form-control" placeholder="03351234567">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-around">
                                    <div class="col-md-12">
                                        <div class="card card-secondary">
                                            <div class="card-header">
                                                <h3 class="card-title">Item Details</h3>
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body table-responsive">
                                                <table class="table table-bordered">
                                                    <thead class="bg-light">
                                                    <tr>
                                                        <th style="width: 5%;">Sr#</th>
                                                        <th style="width: 15%;">Type</th>
                                                        <th style="width: 15%;">PO</th>
                                                        <th style="width: 15%;">Name</th>
                                                        <th style="width: 15%;">UOM</th>
                                                        <th style="width: 15%;">Qty</th>
                                                        <th >Description</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="appendMaterial">
                                                    <tr>
                                                        <input name="countMaterial" type="hidden" value="1" id="countMaterial">
                                                        <td>1</td>
                                                        <td>
                                                            <select name="itemType[]" class="form-control" required>
                                                                <option value="Material">Material</option>
                                                                <option value="Component">Component</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select name="PO" id="" class="form-control">
                                                                <option value="">select</option>
{{--                                                                @foreach($PO as $key=>$PO_number)--}}
{{--                                                                    <option value="{{$PO_number->po_number}}">{{$PO_number->po_number}}</option>--}}
{{--                                                                @endforeach--}}


                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="materialName[]" class="form-control" placeholder="">
                                                            {{--                                                        <select name="materialName[]" class="form-control">--}}
                                                            {{--                                                            <option value="brassHead">Brass Head</option>--}}
                                                            {{--                                                            <option value="primer">Primer</option>--}}
                                                            {{--                                                            <option value="baseWad">Base Wad</option>--}}
                                                            {{--                                                            <option value="opWad">OP Wad</option>--}}
                                                            {{--                                                            <option value="leadShot">Lead Shot</option>--}}
                                                            {{--                                                            <option value="closingDisc">Closing Disc</option>--}}
                                                            {{--                                                            <option value="tube">Tube</option>--}}
                                                            {{--                                                            <option value="propellant">Propellant</option>--}}
                                                            {{--                                                        </select>--}}
                                                        </td>
                                                        <td>
                                                            <select name="uom[]" class="form-control">
{{--                                                                @if(!$units->isempty())--}}
{{--                                                                    @foreach($units as $unit)--}}
{{--                                                                        <option value="{{$unit->name}}">{{$unit->name}}</option>--}}
{{--                                                                    @endforeach--}}
{{--                                                                @endif--}}
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="qty[]" class="form-control" id="" placeholder="">
                                                        </td>
                                                        <td>
                                                            <textarea rows="1" type="text" name="description[]" class="form-control"></textarea>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <button class="btn btn-secondary btn-sm mt-3" type="button" id="addRow">
                                                    <i class="fas mr-2 fa-plus">
                                                        Add Row</i>
                                                </button>
                                                <button class="btn btn-danger btn-sm mt-3" type="button" id="deleteRow">
                                                    <i class="fas fa-trash">
                                                    </i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <a href="#" class="btn btn-secondary ml-1 float-right">Print</a>
                                        <input type="submit" value="Save" class="btn btn-success float-right">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </section>
    @endsection
