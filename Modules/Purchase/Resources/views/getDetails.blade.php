<table id="builtyTable" class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>Sr#</th>
        <th>Material Name/Code</th>
        <th>Quantity</th>
        <th>Description</th>
        <th>Unit Price</th>
        <th>Total Price</th>
    </tr>
    </thead>
    <tbody>
    @foreach($details as $key => $data)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$data->material_name}}</td>
            <td>{{$data->quantity}}</td>
            <td>{{$data->description}}</td>
            <td>{{$data->unit_price}}</td>
            <td>{{$data->total_price}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
