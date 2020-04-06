<table id="builtyTable" class="table table-bordered table-striped table-responsive">
    <thead>
    <tr>
        <th>Sr#</th>
        <th>Material Name/Code</th>
        <th>Quantity</th>
        <th>Description</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($details as $key => $data)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$data->material_name}}</td>
            <td>{{$data->quantity}}</td>
            <td>{{$data->description}}</td>
            @if($data->status == 0)
            <td class="d-flex">
                <a href="{{url('requisition/material/accept/'.$data->id)}}" class="btn btn-success btn-sm m-1">Accept</a>
                <a href="{{url('requisition/material/reject/'.$data->id)}}" class="btn btn-danger btn-sm m-1">Reject</a>
            </td>
            @elseif($data->status == 1)
                <td >
                    Approved
                </td>
            @elseif($data->status == 2)
                <td >
                    Rejected
                </td>
            @else
                <td >
                    In Progress
                </td>
            @endif
        </tr>
    @endforeach
    </tbody>
</table>
