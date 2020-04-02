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
                        <h3 class="card-title">Inspection Note</h3>
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
                                    <th>Description</th>
                                    <th>Date</th>
                                    <th style="">Store</th>
                                    <th>Send for Receipt Status</th>
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
                                            <td>{{$item->description}}</td>
                                            <td>{{$item->date}}</td>
                                            <td>{{$item->storeLocation}}</td>
                                            <td>
                                                @if($item->status==2)
                                                    <a class="getNoteData" data-toggle="modal" data-target="#changeRecepitStatusModal" data-id="{{$item->id}}">
                                                        <i class="fas fa-toggle-off fa-2x" style="color: #DA231A;"></i>
                                                    </a>
                                                @else
                                                    <i class="fas fa-toggle-on fa-2x" style="color: #DA231A;"></i>
                                                @endif
                                            </td>
                                            <td>
                                                @if(empty($item->inspectionDate))
                                                <a class="btn btn-secondary btn-sm getBiltyId" data-toggle="modal" data-target="#addInspectionNoteModal" data-id="{{$item->id}}"
                                                   >Add Note</a>
                                                @else
                                                <a class="btn btn-success btn-sm getBiltyData" data-toggle="modal" data-target="#viewInspectionNoteModal" data-id="{{$item->id}}"
                                                   data-inspectiondate="{{$item->inspectionDate}}" data-rejectionreason="{{$item->rejectionReason}}"
                                                   data-inspectionstatus="{{$item->inspectionStatus}}" data-rejectedqty="{{$item->rejectedQty}}">View Note</a>
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

    <!-- The add Inspection Note Modal -->
    <div class="modal fade" id="addInspectionNoteModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{url('store/submitInwardInspectionNote')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="" id="submitId" name="submitId">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Inspection Note</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Inspection Date</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly value="{{date('d-m-Y')}}" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Inspection Status</label>
                                <div class="col-sm-8">
                                    <select name="inspectionStatus" class="form-control select2" required>
                                        <option value="excellent">Excellent</option>
                                        <option value="good">Good</option>
                                        <option value="bad">Bad</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Rejection Reason</label>
                                <div class="col-sm-8">
                                    <textarea rows="3" name="rejectionReason" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Rejected Quantity</label>
                                <div class="col-sm-8">
                                    <input type="text" name="rejectedQty" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- The view Inspection Note Modal -->
    <div class="modal fade" id="viewInspectionNoteModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Inspection Note</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Inspection Date</label>
                            <div class="col-sm-8">
                                <input type="text" readonly name="inspectionDate" class="form-control inspectionDate">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Inspection Status</label>
                            <div class="col-sm-8">
                                <select name="inspectionStatus" class="form-control inspectionStatus" disabled>
                                    <option value="excellent">Excellent</option>
                                    <option value="good">Good</option>
                                    <option value="bad">Bad</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Rejection Reason</label>
                            <div class="col-sm-8">
                                <textarea rows="3" readonly name="rejectionReason" class="form-control rejectionReason"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Rejected Quantity</label>
                            <div class="col-sm-8">
                                <input type="text" readonly name="rejectedQty" class="form-control rejectedQty">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <!-- The change Recepit Status Modal -->
    <div class="modal fade" id="changeRecepitStatusModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{url('store/sendForInwardReceipt')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="" id="sendId" name="sendId">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Send For Receipt</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        Are You Sure you want to change the status?
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
        $('.getBiltyData').click(function () {
            // if(!$(this).data("inspectiondate")) {
            //     var d = new Date();
            //     var inspectiondate=d.getFullYear() + '-' + ('0'+(d.getMonth()+1)).slice(-2) + '-' + ('0'+d.getDate()).slice(-2);
            // }
            // else{
                var inspectiondate=$(this).data("inspectiondate");
            //}
            $('.inspectionDate').val(inspectiondate);

            var inspectionstatus=$(this).data("inspectionstatus");
            $('.inspectionStatus').select2().val(inspectionstatus).trigger('change');

            var rejectionreason=$(this).data("rejectionreason");
            $('.rejectionReason').val(rejectionreason);

            var rejectedqty=$(this).data("rejectedqty");
            $('.rejectedQty').val(rejectedqty);
        });

        $('.getBiltyId').click(function () {
            var submitId=$(this).data("id");
            $('#submitId').val(submitId);
        });

        $('.getNoteData').click(function () {
            var sendId=$(this).data("id");
            $('#sendId').val(sendId);
        });
    </script>
@endsection

