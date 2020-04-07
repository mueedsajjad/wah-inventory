<input type="hidden" value="requisition" name="type">
<div class="form-group row">
    <label class="col-sm-4 col-form-label">Requisition No :</label>
    <div class="col-sm-8">
        <select name="req_number" id="req_id" class="form-control" required>
            <option value="">select</option>
            @foreach($requisitions as $key=>$requisition)
                <option value="{{$requisition->id}}">{{$requisition->requisition_id}}</option>
            @endforeach
        </select>
    </div>
</div>



<div id="display">

</div>


<script>
    $('#req_id').on('change',function () {
        $('#requisition_detail').show();
        var req_Id = $(this).val();
        var path = location.pathname.split('/');
        var app=path[1];
        console.log(app);
        console.log(req_Id);
        if (req_Id){
            $.ajax({
                type: "GET",
                url: "/"+app+"/gate/requisition_detail/"+req_Id,
                success:function(data)
                {

                    $("#details").html(data);

                }
            });
        }
    })
</script>
