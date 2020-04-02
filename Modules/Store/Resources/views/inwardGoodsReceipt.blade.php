@extends('layouts.master')

@section('content')
    <section class="content pt-5">
        <div class="row">
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
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="builtyTable" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Sr#</th>
                                    <th>Gate Pass ID</th>
                                    <th>Type</th>
                                    <th>Name</th>
                                    <th>UOM</th>
                                    <th>Quantity</th>
                                    <th>Quantity after Inspection</th>
                                    <th>Date</th>
                                    <th>Inspection Date</th>
                                    <th>Store</th>
                                    <th>Approval Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!$inward_raw_material->isempty())
                                    @php $count=0; @endphp
                                    @foreach($inward_raw_material as $item)
                                        @php ++$count; @endphp
                                        <tr>
                                            <td>{{$count}}</td>
                                            <td>{{$item->gatePassId}}</td>
                                            <td>{{$item->itemType}}</td>
                                            <td>{{$item->materialName}}</td>
                                            <td>{{$item->uom}}</td>
                                            <td>{{$item->qty}}</td>
                                            @php
                                                $qty=$item->qty;
                                                $rejectedQty=$item->rejectedQty;
                                                $totalQty=$qty-$rejectedQty;
                                            @endphp
                                            <td>{{$totalQty}}</td>
                                            <td>{{$item->date}}</td>
                                            <td>{{$item->inspectionDate}}</td>
                                            <td>{{$item->storeLocation}}</td>
                                            <td>
                                                @if($item->status==4 || $item->status==3)
                                                    <a class="getReceiptData" data-toggle="modal" data-target="#changeApprovalStatusModal" data-id="{{$item->id}}">
                                                        <i class="fas fa-toggle-off fa-2x" style="color: #DA231A;"></i>
                                                    </a>
                                                @else
                                                    <i class="fas fa-toggle-on fa-2x" style="color: #DA231A;"></i>
                                                @endif
                                            </td>
                                            <td>
                                                @if($item->status==3)
                                                    <a class="btn btn-secondary btn-sm" href="{{url('store/inwardGoodsReceipt/writeInwardGoodsReceipt/'.$item->id.'/'.$item->gatePassId)}}"
                                                    >Make Receipt</a>
                                                @else
                                                    <button class="btn btn-success btn-sm">Receipt Done</button>
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
        </div>
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
@endsection
