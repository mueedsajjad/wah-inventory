
        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Purchase Order #</label>
            <div class="col-sm-8">
                <select name="po_num" id="po_num" class="form-control" required>
                    <option value="">select</option>
                    @foreach($PO as $key=>$PO_id)
                        {{--                    <input type="hidden" name="po_numbu" value="{{$PO_id->id}}">--}}
                        <option value="{{$PO_id->id}}">{{$PO_id->purchase_order_id}}</option>
                    @endforeach
                </select>
            </div>
        </div>


    <div id="display">





    <script >
        $('#po_num').on('change', function () {
              var poId = $(this).val();
                // console.log(poId);
                if (poId){
                    $.ajax({
                        type: "GET",
                        url: 'vendor_data/'+poId,
                        success:function(data)
                        {

                            $("#display").html(data);

                        }
                    });
                }


        });
    </script>
