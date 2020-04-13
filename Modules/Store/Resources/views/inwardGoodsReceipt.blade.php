@extends('layouts.master')

@section('content')
    <section class="">
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4 mt-2">
                <form id="dateHearing" action="{{ route('dateHearing') }}" method="POST" >
                    @csrf
                    <div class="d-flex">
                        <div class="form-group row p-0 m-0">
                            <label class="col-sm-3 col-form-label">From</label>
                            <div class="col-sm-9">
                                <input type="date" name="fromDate" id="fromDate" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row p-0 m-0">
                            <label class="col-sm-2 col-form-label">To</label>
                            <div class="col-sm-10">
                                <input type="date" onchange="myFunction()" name="toDate" id="toDate" class="form-control">
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-12">
                <!-- /.card -->
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
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Inward Goods Receipt</h3>
                        <a href="{{url('/')}}" class="btn btn-secondary btn-sm float-right">Back</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="table-responsive">
                                <table id="builtyTable" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Sr#</th>
                                        <th>Gate Pass ID</th>
                                        <th>Driver Name</th>
                                        <th>Vehicle #</th>
                                        <th>Vendor Type</th>
                                        <th>Vendor Name</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                        <th>Approval for I-Note</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(!$inward_gate_pass->isempty())
                                        @php $count=0; @endphp
                                        @foreach($inward_gate_pass as $item)
                                            <?php
                                            $material=\Illuminate\Support\Facades\DB::table('inward_raw_material')->where('gatePassId',$item->gatePassId)->where('status',3)->orwhere('gatePassId',$item->gatePassId)->where('status',4)->orwhere('gatePassId',$item->gatePassId)->where('status',5)->orwhere('gatePassId',$item->gatePassId)->where('status',6)->first();
//                                            $view=$material->status;
//                                            $date=$material->inspectionDate;
//                                              dd($material);
                                            ?>
                                                @php ++$count; @endphp
                                                <tr>
                                                    <td>{{$count}}</td>
                                                    <td>{{$item->gatePassId}}</td>
                                                    <td>{{$item->driverName}}</td>
                                                    <td>{{$item->vehicalNo}}</td>
                                                    <td>{{$item->vendorType}}</td>
                                                    <td>{{$item->vendorName}}</td>
                                                    <td>{{$item->date}}</td>
                                                    <td>
                                                        @if($material)
                                                            @if($material->status==3)
                                                                <a class="btn btn-secondary btn-sm" href="{{url('store/inwardGoodsReceipt/writeInwardGoodsReceipt/'.$item->id.'/'.$item->gatePassId)}}"
                                                                >Make Receipt</a>
                                                            @elseif($material->status==4 || $material->status>4)
                                                                <a class="btn btn-success btn-sm" href="{{url('store/inwardGoodsReceipt/writeInwardGoodsReceipt/'.$item->id.'/'.$item->gatePassId)}}">View Receipt</a>
                                                            @endif
                                                        @else
                                                            <a class="btn btn-secondary btn-sm" href="{{url('store/inwardGoodsReceipt/writeInwardGoodsReceipt/'.$item->id.'/'.$item->gatePassId)}}">Make Receipt</a>
                                                        @endif
                                                    </td>
                                                    <?php
                                                        $data=\Illuminate\Support\Facades\DB::table('inward_raw_material')->where('gatePassId',$item->gatePassId)->first();
                                                    ?>
                                                    <td>
                                                        @if($data->status==4)
                                                            <a class="getReceiptData" data-toggle="modal" data-target="#changeApprovalStatusModal" data-id="{{$data->id}}">
                                                                <i class="fas fa-toggle-off fa-2x" style="color: #DA231A;"></i>
                                                            </a>
                                                        @elseif($data->status<4)
                                                            <a class="getReceiptData">
                                                                <i class="fas fa-toggle-off fa-2x" style="color: #DA231A;"></i>
                                                            </a>
                                                        @else
                                                            <i class="fas fa-toggle-on fa-2x" style="color: green;"></i>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                            @endif
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>     </div>
    </section>

    <!-- The change Approval Status Modal -->
    <div class="modal fade" id="changeApprovalStatusModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{url('store/changeInwardReceiptApprovalStatus')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="" id="sendId" name="sendId">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Change Approval Status</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        Are you sure you want to change the status?
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $('.getReceiptData').click(function () {
            var sendId=$(this).data("id");
            $('#sendId').val(sendId);
        });
    </script>
    <script>
        $( document ).ready(function() {
            $('#builtyTable').DataTable();
        });
    </script>
@endsection
