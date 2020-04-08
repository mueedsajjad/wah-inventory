
<div class="form-group row">
    <label class="col-sm-4 col-form-label">Order Number</label>
    <div class="col-sm-8">
        <select name="order_num" id="" class="form-control" onchange="order(this.value)">
            <option value="">Select</option>
            @foreach($delivery_data as $key=>$delivery)
                <option value="{{$delivery->so_number}}">{{$delivery->so_number}}</option>
            @endforeach
        </select>
    </div>


</div>
<div id="delivery_details"></div>


<script>
    function order(data) {
        var path = location.pathname.split('/');
        var app=path[1];
        console.log(app);
        console.log(data);
        if (data){
            $.ajax({
                type: "GET",
                url: "/"+app+"/gate/delivery_order/"+data,
                success:function(data)
                {
                    $("#delivery_details").html(data);
                }
            });
        }
    }

</script>
