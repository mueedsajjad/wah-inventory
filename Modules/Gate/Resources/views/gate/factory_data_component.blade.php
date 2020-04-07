
<div class="form-group row">
    <label class="col-sm-4 col-form-label">Component</label>
    <div class="col-sm-8">
        <select name="out_type" id="" class="form-control" onchange="getData(this.value)">
            <option value="">select</option>
            @foreach($component as $data)
                <option value="{{$data->id}}">{{$data->component_requisition_id}}</option>
            @endforeach
        </select>
    </div>
</div>


<script>
    function getData(data) {


        var path = location.pathname.split('/');
        var app=path[1];
        console.log(app);
        console.log(data);
        if (data){
            $.ajax({
                type: "GET",
                url: "/"+app+"/gate/get_data_component/"+data,
                success:function(data)
                {
                    $("#getData").html(data);
                }
            });
        }
    }

</script>
