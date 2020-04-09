@extends('layouts.master')

@section('content')
    <section class="content pt-3">
        <div class="container-fluid">


            <div class="card ">
                <div class="card-header">
                    <h3 class="card-title">Tender Status</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="storeTable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Purchase Order ID</th>
                                <th>Requisition Request ID</th>

                                <th>Purchase type</th>
                                <th>Issue Date</th>
                                <th>Status</th>

                                <th>Action</th>
                                <th>Details</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($record as $key => $data)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$data->purchase_order_id}}</td>
                                    <td>{{$data->requisition_id}}</td>

                                    <td>{{$data->purchase_type}}</td>
                                    <td>{{$data->issue_date}}</td>
                                    @if($data->status == 0)
                                        <td>Pending for Approval</td>
                                        <td></td>
                                    @elseif($data->status == 1)
                                        <td> Approved</td>
                                        <td>
                                            <a href="{{url('purchase/make-order/'.$data->purchase_type.'/'.$data->id)}}" class="btn btn-sm btn-success" >Make Purchase Order</a>
                                        </td>
                                    @elseif($data->status == 2)
                                        <td>Rejected</td>
                                        <td></td>
                                    @elseif($data->status == 3)
                                        <td>PO Generated</td>
                                        <td></td>
                                    @elseif($data->status == 4)
                                        <td>Create Tender</td>
                                        <td><button type="button" onclick="getDetailsforTender({{$data->id}})" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModalCenters">
                                                Create Tender
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModalCenters" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                    <div class="modal-content ">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Create Tender</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body" id="dataa">
                                                            ...
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            {{--                                                <button type="button" class="btn btn-primary">Save changes</button>--}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div></td>
                                    @endif

                                    <td><button type="button" onclick="getDetails({{$data->id}})" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalCenter">
                                            Details
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                <div class="modal-content ">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Details</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body" id="data">
                                                        ...
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        {{--                                                <button type="button" class="btn btn-primary">Save changes</button>--}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div></td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        $( document ).ready(function() {
            $('#storeTable').dataTable();
        });
    </script>
@endsection
<script>
    function getDetails(data) {
        console.log(data);
        var path = location.pathname.split('/');
        var app=path[1];
        console.log(app);
        $.ajax({
            type: "GET",
            url: "/"+app+"/purchase/get-details/"+data,
            success:function(data)
            {
                $("#data").html(data);
            }
        });
    }

    function getDetailsforTender(data) {
        console.log(data);
        var path = location.pathname.split('/');
        var app=path[1];
        console.log(app);
        $.ajax({
            type: "GET",
            url: "/"+app+"/purchase/get-details-tender/"+data,
            success:function(data)
            {
                $("#dataa").html(data);
            }
        });
    }
</script>

