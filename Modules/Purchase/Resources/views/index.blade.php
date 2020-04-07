@extends('layouts.master')

@section('content')
    <section class="content pt-3">
        <div class="container-fluid">
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
            <div class="card">
                <div class="card-header bg-dark">
                    <h3 class="card-title">Requisitions Requests</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="builtyTable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Requisition Request ID</th>
                                <th>Issue Date</th>
                                <th>Status</th>
                                <th>Action</th>
                                <th>Details</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($records as $key => $data)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$data->requisition_id}}</td>
                                    <td>{{$data->issue_date}}</td>

                                    @if($data->status == 0)
                                    <td>Pending for Request</td>
                                    <td>
                                        <a href="{{url('/purchase/new-request/'.$data->id)}}" class="btn btn-sm btn-success">Make Requisition</a>
                                    </td>
                                        @elseif($data->status ==  1)
                                    <td>Request sent for Approval</td>
                                    <td>
                                    </td>
                                    @elseif($data->status ==  2)
                                        <td>Accepted </td>
                                        <td>
                                        </td>
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
            url: "/"+app+"/assistantmanager/get-details/"+data,
            success:function(data)
            {
                $("#data").html(data);
            }
        });
    }
</script>
