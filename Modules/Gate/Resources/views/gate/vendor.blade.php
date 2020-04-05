
<div class="form-group row">
    <label class="col-sm-4 col-form-label">Purchase Type</label>
    <div class="col-sm-8">
        <input type="text" name="purchase_type" disabled required readonly value="{{$purchase_type}}" class="form-control" >
    </div>
</div>
@if($vend==null)

    @else


    <input type="hidden" name="ven_id" value="{{$vend->id}}">
    <input type="hidden" name="suppl_id" value="{{$vend->supplier_id}}">

<div class="form-group row">
    <label class="col-sm-4 col-form-label">Vendor ID:</label>
    <div class="col-sm-8">
        <input type="text" name="vendor_id" disabled required readonly value="{{$vend->supplier_id}}" class="form-control" >
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-4 col-form-label">Vendor Name:</label>
    <div class="col-sm-8">
        <input type="text" name="" disabled required readonly value="{{$vend->name}}" class="form-control" >
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-4 col-form-label">Vendor Email:</label>
    <div class="col-sm-8">
        <input type="text" name="" disabled required readonly value="{{$vend->email}}" class="form-control" >
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-4 col-form-label">Vendor Ph #:</label>
    <div class="col-sm-8">
        <input type="text" name="" disabled required readonly value="{{$vend->p_number}}" class="form-control" >
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-4 col-form-label">Vendor City:</label>
    <div class="col-sm-8">
        <input type="text" name="" required readonly value="{{$vend->city}}" class="form-control" >
    </div>
</div>
@endif
