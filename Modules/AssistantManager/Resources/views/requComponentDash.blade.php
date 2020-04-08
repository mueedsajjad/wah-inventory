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
                    <h3 class="card-title">Component Requisition Requests Status</h3>
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
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($c_requ as $key => $data)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$data->component_requisition_id}}</td>
                                    <td>{{strtoupper($data->gate_type)}}</td>
                                    <td>{{$data->issue_date}}</td>
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



@endsection
<script>
    function getDetails(data) {
        console.log(data);
        var path = location.pathname.split('/');
        var app=path[1];
        console.log(app);
        $.ajax({
            type: "GET",
            url: "/"+app+"/requisition/component-details/"+data,
            success:function(data)
            {
                $("#data").html(data);
            }
        });
    }
</script>
