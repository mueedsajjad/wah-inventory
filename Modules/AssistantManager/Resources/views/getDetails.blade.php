<table id="builtyTable" class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>Sr#</th>
        <th>Material Name/Code</th>
        <th>Quantity</th>
        <th>Description</th>
    </tr>
    </thead>
    <tbody>
    @foreach($details as $key => $data)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$data->material_name}}</td>
            <td>{{$data->quantity}}</td>
            <td>{{$data->description}}</td>


        </tr>
    @endforeach
    </tbody>
</table>
