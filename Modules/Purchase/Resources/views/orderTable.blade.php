@extends('layouts.master')

@section('content')
    <section class="content pt-3">
        <div class="container-fluid">


    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Purchase Requisitions Request Status</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="builtyTable" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Sr#</th>
                        <th>Purchase Order ID</th>
                        <th>Requisition Request ID</th>
                        <th>Purchase type</th>
                        <th>Issue Date</th>
                        <th>Status</th>
                        <th>Details</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $key => $data)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$data->purchase_order_id}}</td>
                            <td>{{$data->requisition_id}}</td>
                            <td>{{$data->purchase_type}}</td>
                            <td>{{$data->issue_date}}</td>
                            @if($data->status == 0)
                                <td>Pending for Approval</td>
                            @elseif($data->status == 1)
                               <td> Approved</td>
                            @elseif($data->status == 2)
                                <td>Rejected</td>
                            @endif
                            <td><button type="button" onclick="getDetails({{$data->id}})" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalCenter">
                                    Details
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content modal-lg">
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
                            <td>
                                <a href="{{url('purchase/order-approve/'.$data->id)}}" class="btn btn-sm btn-success" >Accept</a>
                                <a href="{{url('purchase/order-reject/'.$data->id)}}" class="btn btn-sm btn-danger" >Reject</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
        </div>
    </section>
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
</script>