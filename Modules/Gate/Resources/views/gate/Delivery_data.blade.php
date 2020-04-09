
<div class="form-group row">
    <label class="col-sm-4 col-form-label">Customer Name</label>
    <div class="col-sm-8">
        <input type="text" required readonly name="cus_name" class="form-control" value="{{$delivery_data->customer_name}}" >
    </div>


</div>
<div class="form-group row">
    <label class="col-sm-4 col-form-label">Delivery Date</label>
    <div class="col-sm-8">
        <input type="text" required readonly name="delivery_date" class="form-control" value="{{$delivery_data->delivery_date}}" >
    </div>


</div>
<div class="form-group row">
    <label class="col-sm-4 col-form-label">Driver CNIC</label>
    <div class="col-sm-8">
        <input type="text" required readonly name="Driver_cnic" class="form-control" value="{{$delivery_data->driver_id}}" >
    </div>


</div>
<div class="form-group row">
    <label class="col-sm-4 col-form-label">Driver Name</label>
    <div class="col-sm-8">
        <input type="text" required readonly name="driver_name" class="form-control" value="{{$delivery_data->driver_name}}" >
    </div>


</div>
<div class="form-group row">
    <label class="col-sm-4 col-form-label">Vehicle Number</label>
    <div class="col-sm-8">
        <input type="text" required readonly name="vehical_num" class="form-control" value="{{$delivery_data->vehicle_number}}" >
    </div>


</div>

