@extends('layouts.master')

@section('content')

    <div class="card m-5">
        <div class="card-header">
            <h3 class="card-title">Purchase Requisitions Request Status</h3>
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
                        @foreach($records as $key => $data)
                           <tr>
                               <td>{{$key+1}}</td>
                               <td>{{$data->requisition_id}}</td>
                               <td>{{$data->issue_date}}</td>
                               <td>{{$data->status}}</td>
                           </tr>
                         @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



@endsection
