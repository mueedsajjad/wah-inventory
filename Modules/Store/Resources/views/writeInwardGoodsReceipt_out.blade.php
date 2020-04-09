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
                            <?php
                            $gate=\Illuminate\Support\Facades\DB::table('inward_gate_pass')->where('id',$id)->first();
                            $raww=\Illuminate\Support\Facades\DB::table('inward_raw_material')->where('gatePassId',$gate->gatePassId)->first();
                            ?>
                            @if($raww->status==3)
                                <form action="{{url('store/submitInwardGoodsReceipt_out')}}" method="post" enctype="multipart/form-data">
                                    @csrf
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
                                                <label class="col-sm-4 col-form-label">Gate Pass ID</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="gatePassId" readonly value="{{$mat_raw->gatePassId}}" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row justify-content-around">

                                        <div class="col-md-4">

                                        </div>
                                    </div>







                                    <div class="row justify-content-around">
                                        <div class="col-md-4">

                                        </div>
                                        <div class="col-md-4">
                                        </div>
                                    </div>








                                    <div class="table-responsive">
                                        <table id="materialTable" class="table table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th>GRN Date</th>
                                                <th>Material Name</th>
                                                {{--                                            <th>Document</th>--}}
                                                <th>Description</th>
                                                <th>Unit of Measurement</th>
                                                <th>Total Quantity</th>
                                                <th>Assign Store</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($inward_raw_material as $data)
                                                <input type="hidden" value="{{$data->itemType}}" name="itemType[]">
                                                <input type="hidden" name="inward_raw_material_id[]" value="{{$data->id}}">
                                                <tr>
                                                    <td>
                                                        <input type="text" readonly name="grnDate[]" value="{{date('d-m-Y')}}" class="form-control" placeholder="08-02-2020">
                                                    </td>
                                                    <td>
                                                        <input type="text" readonly name="materialName[]" value="{{$data->materialName}}" class="form-control">
                                                    </td>
                                                    <td>
                                                        <textarea rows="1" readonly name="description[]" class="form-control">{{$data->description}}</textarea>
                                                    </td>
                                                    <td>
                                                        <input type="text" readonly name="uom[]" value="{{$data->uom}}" class="form-control">

                                                    </td>
                                                    <td>
                                                        @php
                                                            $qty=$data->qty;
                                                            $rejectedQty=$data->rejectedQty;
                                                            $totalQty=$qty-$rejectedQty;
                                                        @endphp
                                                        <input type="text" readonly name="totalQuantity[]" value="{{$totalQty}}" class="form-control">
                                                    </td>
                                                    <td>
                                                        {{--                                                        <input type="hidden" value="{{$item->materialName}}" name="materialName">--}}
                                                        {{--                                                        <input type="hidden" value="{{$item->itemType}}" name="itemType">--}}
                                                        {{--                                                        <input type="hidden" value="{{$item->id}}" name="ids">--}}
                                                        <div class="row">
                                                            {{--                                                            <label class="col-sm-4 col-form-label">Assign Store  </label>--}}
                                                            <select name="storeLocation[]" style="width: 70%;" class="col-md-8 form-control">
                                                                @if(!$stores->isempty())
                                                                    @foreach($stores as $store)
                                                                        <option value="{{$store->name}}">{{$store->name}}</option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach


                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-11 mt-2">
                                        <a href="#" class="btn btn-secondary ml-3 float-right">Print</a>
                                        <input type="submit" value="Save" class="btn btn-success float-right">
                                    </div>

                                </form>






                            @elseif($raww->status>=4)
                                <form action="{{url('store/submitInwardGoodsReceipt')}}" method="post" enctype="multipart/form-data">
                                    @csrf
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
                                                <label class="col-sm-4 col-form-label">Purchase Order No</label>
                                                <div class="col-sm-8">
                                                    <input type="text" readonly required name="purchaseOrderNo" value="{{$mat_raw->purchase_order_id}}" class="form-control" placeholder="PON001">
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row justify-content-around">
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Gate Pass ID</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="gatePassId" readonly value="{{$mat_raw->gatePassId}}" class="form-control">
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

                                        </div>
                                    </div>








                                    <div class="row justify-content-around">
                                        <div class="col-md-4">

                                        </div>
                                        <div class="col-md-4">
                                        </div>
                                    </div>








                                    <div class="table-responsive">
                                        <table id="materialTable" class="table table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th>GRN Date</th>
                                                <th>Material Name</th>
                                                {{--                                            <th>Document</th>--}}
                                                <th>Description</th>
                                                <th>Unit of Measurement</th>
                                                <th>Total Quantity</th>
                                                <th>Assign Store</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($inward_raw_material as $data)
                                                <input type="hidden" value="{{$data->itemType}}" name="itemType[]">
                                                <input type="hidden" name="inward_raw_material_id[]" value="{{$data->id}}">
                                                <tr>
                                                    <td>
                                                        <input type="text" readonly name="grnDate[]" value="{{date('d-m-Y')}}" class="form-control" placeholder="08-02-2020">
                                                    </td>
                                                    <td>
                                                        <input type="text" readonly name="materialName[]" value="{{$data->materialName}}" class="form-control">
                                                    </td>
                                                    <td>
                                                        <textarea rows="1" readonly name="description[]" class="form-control">{{$data->description}}</textarea>
                                                    </td>
                                                    <?php
                                                        $cost=DB::table('purchase_order_approval_detail')->where('purchase_order_id',$data->purchase_order_id)->where('material_name',$data->materialName)->first();
                                                    ?>
                                                    <td>
                                                        <input type="text" readonly name="uom[]" value="{{$data->uom}}" class="form-control">

                                                    </td>
                                                    <td>
                                                        @php
                                                            $qty=$data->qty;
                                                            $rejectedQty=$data->rejectedQty;
                                                            $totalQty=$qty-$rejectedQty;
                                                        @endphp
                                                        <input type="text" readonly name="totalQuantity[]" value="{{$totalQty}}" class="form-control">
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            {{--                                                            <label class="col-sm-4 col-form-label">Assign Store  </label>--}}
                                                            <select disabled name="storeLocation[]" style="width: 70%;" class="col-md-8 form-control">
                                                                @if(!$stores->isempty())
                                                                    @foreach($stores as $store)
                                                                        <option value="{{$store->name}}">{{$store->name}}</option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach


                                            </tbody>
                                        </table>
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
