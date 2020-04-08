
<div class="form-group row">
    <label class="col-sm-4 col-form-label">Order Number</label>
    <div class="col-sm-8">
            <select name="order_num" id="order_num" class="form-control" required>
            <option value="">Select</option>
            @foreach($delivery_data as $key=>$delivery)
                <option value="{{$delivery->so_number}}">{{$delivery->so_number}}</option>
            @endforeach
        </select>
    </div>


</div>
<div id="delivery_details"></div>


<script>
    $('#order_num').on('change', function () {
        // alert('Working');
        var orderId = $(this).val();
        console.log(orderId)
        if (orderId){
            $.ajax({
                // type: "GET",
                // url: "/"+app+"/gate/delivery_order/"+data,
                type: "GET",
                url: 'delivery_order/'+orderId,
                success:function(data)
                {
                    $("#delivery_details").html(data);
                }
            });
        }
    });

    $('#order_num').on('change', function () {
        var orderId = $(this).val();
        if (orderId){
            $.ajax({
                // type: "GET",
                // url: "/"+app+"/gate/delivery_order/"+data,
                type: "GET",
                url: 'delivery_order_table/'+orderId,
                success:function(data)
                {
                    $("#details_table").html(data);
                }
            });
        }
    });




</script>
