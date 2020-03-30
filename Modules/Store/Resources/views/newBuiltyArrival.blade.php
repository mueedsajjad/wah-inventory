@extends('layouts.master')

@section('content')
    <section class="content pt-3">
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
                        <h3 class="card-title">New Bilty Arrivals</h3>
                    </div>
                    <div class="card-body">
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
                                    <th>Unload Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!$inward_gate_pass->isempty())
                                    @php $count=0; @endphp
                                    @foreach($inward_gate_pass as $item)
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
                                                @if($item->status==0)
                                                    <a class="getBiltyData" data-toggle="modal" data-target="#changeUnloadStatusModal" data-gatepassid="{{$item->gatePassId}}">
                                                        <i class="fas fa-toggle-off fa-2x" style="color: #DA231A;"></i>
                                                    </a>
                                                @else
                                                    <i class="fas fa-toggle-on fa-2x" style="color: #DA231A;"></i>
                                                @endif
                                            </td>
                                            <td class="project-actions">
                                                <a class="btn btn-primary btn-sm getBiltyDetailsbtn" data-toggle="modal" data-target="#biltyDetailsModal" data-gatepassid="{{$item->gatePassId}}">
                                                    <i class="fas fa-folder mr-1"></i>View Bilty Details
                                                </a>
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
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>


    <!-- The Bilty Details Modal -->
    <div class="modal fade" id="biltyDetailsModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content modal-lg">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Bilty Details</h4>
                    <button type="button" class="close closebtn" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="table-responsive">
                        <table id="materialTable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Type</th>
                                <th>Name</th>
                                <th>UOM</th>
                                <th>Quantity</th>
                                <th>Description</th>
                            </tr>
                            </thead>
                            <tbody id="append_details">


                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary closebtn" data-dismiss="modal" >Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- The change Unload Status Modal -->
    <div class="modal fade" id="changeUnloadStatusModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{url('store/changeUnloadStatus')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="" id="gatepassid" name="gatepassid">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Change Unload Status</h4>
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
        $( document ).ready(function() {
            $('#builtyTable').DataTable();
        });

        $('.getBiltyData').click(function () {
            var gatepassid=$(this).data("gatepassid");
            $('#gatepassid').val(gatepassid);
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.getBiltyDetailsbtn').click(function () {
            //prevent Bootstrap modal from closing when clicking outside
            $("#biltyDetailsModal").modal({
                backdrop: 'static',
                keyboard: false
            });

            var gatepassid=$(this).data("gatepassid");

            $.ajax({
                type:'get',
                url:'{{url('store/viewBuiltyDetails')}}/'+gatepassid,
                success: function(data) {
                    data=$.parseJSON(data);
                    var trHTML;
                    jQuery(data).each(function(i, obj) {
                        var count=parseInt(i)+1;
                        trHTML='';
                        trHTML += '<tr><td>'+count+'</td><td>'+obj.itemType+'</td><td>'+obj.materialName+'</td><td>'+obj.uom+'</td><td>'+obj.qty+'</td><td>'+obj.description+'</td></tr>';
                        $('#append_details').append(trHTML);
                    });
                },
                error: function(data) {
                    alert('Something went wrong.');
                }
            });
        });

        $('.closebtn').click(function () {
            $('#append_details').text('');
        });

    </script>
@endsection
