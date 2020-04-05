@extends('layouts.master')

@section('content')
{{----------------------- Nav Tabs  --------------------------------}}
{{--<nav class="main-header navbar navbar-expand-md navbar-dark  py-0">--}}
{{--    <div class="container-fluid">--}}
{{--        <a href="dashboard.html" class="navbar-brand">--}}
{{--            <!-- <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"--}}
{{--                  style="opacity: .8">-->--}}
{{--            <span class="brand-text font-weight-normal"><img class=" pr-3" src="./logo.png" alt="logo" > SGA - WAH Industries</span>--}}
{{--        </a>--}}

{{--        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--            <span class="navbar-toggler-icon"></span>--}}
{{--        </button>--}}

{{--        <div class="collapse navbar-collapse order-3" id="navbarCollapse">--}}
{{--            <!-- Left navbar links -->--}}
{{--            <ul class="navbar-nav">--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="btn m-0 btn-app" href="dashboard.html">--}}
{{--                        <i class="fas fa-chart-line"></i>Dashboard--}}
{{--                    </a>--}}
{{--                </li>--}}


{{--                <li class="nav-item dropdown">--}}
{{--                    <a id="dropdownSubMenu1" href="gate.html"  class=" dropdown-toggle btn m-0 btn-app"><i class="fas fa-edit"></i>--}}
{{--                        Gate Pass</a>--}}
{{--                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow ">--}}
{{--                        <li><a href="#" class="dropdown-item">Some action </a></li>--}}
{{--                        <li><a href="#" class="dropdown-item">Some other action</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}

{{--                <li class="nav-item dropdown">--}}
{{--                    <a id="dropdownSubMenu2" href="attendance.html"  class=" dropdown-toggle btn m-0 btn-app"><i class="fas fa-edit"></i>--}}
{{--                        attendance</a>--}}
{{--                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow ">--}}
{{--                        <li><a href="#" class="dropdown-item">Some action </a></li>--}}
{{--                        <li><a href="#" class="dropdown-item">Some other action</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}

{{--                <li class="nav-item dropdown">--}}
{{--                    <a id="dropdownSubMenu11" href="security.html" class=" dropdown-toggle btn m-0 btn-app"><i class="fas fa-edit"></i>--}}
{{--                        Security</a>--}}
{{--                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow ">--}}
{{--                        <li><a href="#" class="dropdown-item">Add New Product </a></li>--}}
{{--                        <li><a href="#" class="dropdown-item">Product List</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}

{{--                <li class="nav-item dropdown">--}}
{{--                    <a id="dropdownSubMenu3" href="vehicle-management.html"  class=" dropdown-toggle btn m-0 btn-app"><i class="fas fa-edit"></i>--}}
{{--                        Vehicle Management</a>--}}
{{--                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow ">--}}
{{--                        <li><a href="#" class="dropdown-item">Some action </a></li>--}}
{{--                        <li><a href="#" class="dropdown-item">Some other action</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}

{{--                <li class="nav-item dropdown">--}}
{{--                    <a id="dropdownSubMenu5" href="gate-reports.html"  class=" dropdown-toggle btn m-0 btn-app"><i class="fas fa-edit"></i>--}}
{{--                        Reports</a>--}}
{{--                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow ">--}}
{{--                        <li><a href="#" class="dropdown-item">Some action </a></li>--}}
{{--                        <li><a href="#" class="dropdown-item">Some other action</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}



{{--                <li class="nav-item dropdown ml-auto text-right">--}}
{{--                    <a id="dropdownSubMenu13" href="index.html" class=" dropdown-toggle btn m-0 btn-app"><i class="fas fa-sign-out-alt"></i>--}}
{{--                        Logout</a>--}}
{{--                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow ">--}}
{{--                        <li><a href="#" class="dropdown-item">Add New Product </a></li>--}}
{{--                        <li><a href="#" class="dropdown-item">Product List</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </div>--}}

{{--        <!-- Right navbar links -->--}}
{{--        <!----}}
{{--              <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">--}}
{{--                &lt;!&ndash; Messages Dropdown Menu &ndash;&gt;--}}
{{--                <li class="nav-item dropdown">--}}
{{--                  <a class="nav-link" data-toggle="dropdown" href="#">--}}
{{--                    <i class="fas fa-comments"></i>--}}
{{--                    <span class="badge badge-danger navbar-badge">3</span>--}}
{{--                  </a>--}}
{{--                  <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">--}}
{{--                    <a href="#" class="dropdown-item">--}}
{{--                      &lt;!&ndash; Message Start &ndash;&gt;--}}
{{--                      <div class="media">--}}
{{--                        <img src="../../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">--}}
{{--                        <div class="media-body">--}}
{{--                          <h3 class="dropdown-item-title">--}}
{{--                            Brad Diesel--}}
{{--                            <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>--}}
{{--                          </h3>--}}
{{--                          <p class="text-sm">Call me whenever you can...</p>--}}
{{--                          <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>--}}
{{--                        </div>--}}
{{--                      </div>--}}
{{--                      &lt;!&ndash; Message End &ndash;&gt;--}}
{{--                    </a>--}}
{{--                    <div class="dropdown-divider"></div>--}}
{{--                    <a href="#" class="dropdown-item">--}}
{{--                      &lt;!&ndash; Message Start &ndash;&gt;--}}
{{--                      <div class="media">--}}
{{--                        <img src="../../dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">--}}
{{--                        <div class="media-body">--}}
{{--                          <h3 class="dropdown-item-title">--}}
{{--                            John Pierce--}}
{{--                            <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>--}}
{{--                          </h3>--}}
{{--                          <p class="text-sm">I got your message bro</p>--}}
{{--                          <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>--}}
{{--                        </div>--}}
{{--                      </div>--}}
{{--                      &lt;!&ndash; Message End &ndash;&gt;--}}
{{--                    </a>--}}
{{--                    <div class="dropdown-divider"></div>--}}
{{--                    <a href="#" class="dropdown-item">--}}
{{--                      &lt;!&ndash; Message Start &ndash;&gt;--}}
{{--                      <div class="media">--}}
{{--                        <img src="../../dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">--}}
{{--                        <div class="media-body">--}}
{{--                          <h3 class="dropdown-item-title">--}}
{{--                            Nora Silvester--}}
{{--                            <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>--}}
{{--                          </h3>--}}
{{--                          <p class="text-sm">The subject goes here</p>--}}
{{--                          <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>--}}
{{--                        </div>--}}
{{--                      </div>--}}
{{--                      &lt;!&ndash; Message End &ndash;&gt;--}}
{{--                    </a>--}}
{{--                    <div class="dropdown-divider"></div>--}}
{{--                    <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>--}}
{{--                  </div>--}}
{{--                </li>--}}
{{--                &lt;!&ndash; Notifications Dropdown Menu &ndash;&gt;--}}
{{--                <li class="nav-item dropdown">--}}
{{--                  <a class="nav-link" data-toggle="dropdown" href="#">--}}
{{--                    <i class="far fa-bell"></i>--}}
{{--                    <span class="badge badge-warning navbar-badge">15</span>--}}
{{--                  </a>--}}
{{--                  <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">--}}
{{--                    <span class="dropdown-header">15 Notifications</span>--}}
{{--                    <div class="dropdown-divider"></div>--}}
{{--                    <a href="#" class="dropdown-item">--}}
{{--                      <i class="fas fa-envelope mr-2"></i> 4 new messages--}}
{{--                      <span class="float-right text-muted text-sm">3 mins</span>--}}
{{--                    </a>--}}
{{--                    <div class="dropdown-divider"></div>--}}
{{--                    <a href="#" class="dropdown-item">--}}
{{--                      <i class="fas fa-users mr-2"></i> 8 friend requests--}}
{{--                      <span class="float-right text-muted text-sm">12 hours</span>--}}
{{--                    </a>--}}
{{--                    <div class="dropdown-divider"></div>--}}
{{--                    <a href="#" class="dropdown-item">--}}
{{--                      <i class="fas fa-file mr-2"></i> 3 new reports--}}
{{--                      <span class="float-right text-muted text-sm">2 days</span>--}}
{{--                    </a>--}}
{{--                    <div class="dropdown-divider"></div>--}}
{{--                    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>--}}
{{--                  </div>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                  <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i--}}
{{--                    class="fas fa-th-large"></i></a>--}}
{{--                </li>--}}
{{--              </ul>--}}
{{--        -->--}}
{{--    </div>--}}
{{--</nav>--}}

<section class="content pt-5">
    <div class="container-fluid">
        <div class="row">


            <div class="col-md-12">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Inward Gate Pass</h3>
                    </div>
                    <div class="card-body">
                        @if(!empty($errors->first()))
                            <div class="alert alert-danger"  style="text-align: center">
                                <span>{{ $errors->first() }}</span>
                            </div>
                        @endif
                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        <form action="{{url('gate/addInwardGatePass')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row justify-content-around">
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label for="sga_13" class="col-sm-4 col-form-label">Gate Pass ID</label>
                                        <div class="col-sm-8">
                                            <input type="text" required name="gatePassId" readonly class="form-control" value="GP00{{$countInwardGatePass}}" id="sga_13" placeholder="GP001">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="sga_13" class="col-sm-4 col-form-label">Date</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly required value="{{date('d-m-Y')}}" class="form-control" id="sga_19" placeholder="08-02-2020">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Driver ID</label>
                                        <div class="col-sm-8">
                                            <input type="text" required readonly name="driverId" class="form-control" value="DR00{{$countInwardGatePass}}" placeholder="DR001">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">PO/Requisition</label>
                                        <div class="col-sm-8">
                                            <select name="Po/req" id="" class="form-control">
                                                <option value="">select</option>
                                                <option value="Purchase Order" id="po">Purchase Order</option>
                                                <option value="Requisition" id="req">Requisition</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Driver Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="driverName" required class="form-control" placeholder="Waseem">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="sga_21" class="col-sm-4 col-form-label">Driver Phone #</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="driverPh" required class="form-control" id="sga_24" placeholder="03351234567">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Vehicle No</label>
                                        <div class="col-sm-8">
                                            <input type="text" required name="vehicalNo" class="form-control" id="sga_22" placeholder="LHR-8828">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 " style="display: none" id="vendor_details" >
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Purchase Order #</label>
                                        <div class="col-sm-8">
                                            <select name="po_num" id="po_num" class="form-control" required>
                                                <option value="">select</option>
                                                @foreach($PO as $key=>$PO_id)
                                                    <option value="{{$PO_id->id}}">{{$PO_id->purchase_order_id}}</option>
                                                    @endforeach

                                            </select>
                                        </div>
                                    </div>
{{--                                    <div class="form-group row">--}}
{{--                                        <label class="col-sm-4 col-form-label">Vendor Type</label>--}}
{{--                                        <div class="col-sm-8">--}}
{{--                                            <select name="vendorType" class="form-control" required>--}}
{{--                                                <option value="Registered Vendor">Registered Vendor</option>--}}
{{--                                                <option value="Non Registered Vendor">Non Registered Vendor</option>--}}
{{--                                                <option value="WIL Collection">WIL Collection</option>--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group row">--}}
{{--                                        <label class="col-sm-4 col-form-label">Vendor ID</label>--}}
{{--                                        <div class="col-sm-8">--}}
{{--                                            <input type="text" name="vendorId" required readonly value="VND00{{$countInwardGatePass}}" class="form-control" placeholder="VND001">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    changing--}}
{{--                                    <div class="form-group row">--}}
{{--                                        <label class="col-sm-4 col-form-label">Vendor details</label>--}}
{{--                                        <div class="col-sm-8" >--}}
{{--                                            <select name="vendor" id="V_details" class="form-control">--}}
{{--                                                <option value="" id="sel" >select</option>--}}
{{--                                                <option value="V1">V1</option>--}}
{{--                                                <option value="V2">V2</option>--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                    <div id="display"></div>
{{--                                    end here--}}

{{--                                    <div class="form-group row">--}}
{{--                                        <label class="col-sm-4 col-form-label">Vendor Name</label>--}}
{{--                                        <div class="col-sm-8">--}}
{{--                                            <input type="text" name="vendorName" required class="form-control" placeholder="CDOXS">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group row">--}}
{{--                                        <label class="col-sm-4 col-form-label">Vendor Address</label>--}}
{{--                                        <div class="col-sm-8">--}}
{{--                                            <input type="text" name="vendorAddress" required class="form-control" placeholder="Lahore Pak">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group row">--}}
{{--                                        <label class="col-sm-4 col-form-label">Vendor Phone #</label>--}}
{{--                                        <div class="col-sm-8">--}}
{{--                                            <input type="text" name="vendorPh" required class="form-control" placeholder="03351234567">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                              <div id="tbody">

                              </div>

                        </form>
                    </div>
                </div>
            </div>



        </div>
    </div>
</section>

<script>
    $('#addRow').click(function () {
        var count=$('#countMaterial').val();
        ++count;
        var html='<tr id="deleteMaterial'+count+'">'+
                    '<td>'+count+'</td>'+
                    '<td>'+
                        '<select name="itemType[]" class="form-control" required>'+
                            '<option value="Material">Material</option>'+
                            '<option value="Component">Component</option>'+
                        '</select>'+
                    '</td>'+

                        '<td>'+
                                '<select name="PO" id="" class="form-control">'+
                                '<option value="">select</option>'+
                                {{--'@foreach($PO as $key=> $PO_number)'+--}}
                                {{--'<option value="{{$PO_number->po_number}}">{{$PO_number->po_number}}</option>'+--}}
                                {{--'@endforeach'+--}}

                                '</select>'+
                        '</td>'+

                    '<td>'+
                        '<input type="text" name="materialName[]" class="form-control" placeholder="">'+
                        // '<select name="materialName[]" class="form-control select2">'+
                        //     '<option value="brassHead">Brass Head</option>'+
                        //     '<option value="primer">Primer</option>'+
                        //     '<option value="baseWad">Base Wad</option>'+
                        //     '<option value="opWad">OP Wad</option>'+
                        //     '<option value="leadShot">Lead Shot</option>'+
                        //     '<option value="closingDisc">Closing Disc</option>'+
                        //     '<option value="tube">Tube</option>'+
                        //     '<option value="propellant">Propellant</option>'+
                        // '</select>'+
                    '</td>'+
                    '<td>'+
                        '<select name="uom[]" class="form-control select2">'+
                           '<?php if(!$units->isempty()){
                             foreach($units as $unit){ ?>'+
                            '<option value="{{$unit->name}}">{{$unit->name}}</option>'+
                           '<?php }
                                } ?>'+
                        '</select>'+
                    '</td>'+
                '<td>'+
                    '<input type="text" name="qty[]" class="form-control" id="" placeholder="">'+
                '</td>'+
                '<td>'+
                    '<textarea rows="1" type="text" name="description[]" class="form-control"></textarea>'+
                '</td>'+
            '</tr>';

        $('#countMaterial').val(count);
        $('#appendMaterial').append(html);
    });

    $('#deleteRow').click(function () {
        var count = $('#countMaterial').val();
        if(count<2){
            return false;
        }
        else{
            $('#deleteMaterial'+count).remove();
            --count;
            $('#countMaterial').val(count);
        }
    });
    $('#po_num').on('change', function () {
        // alert('working');
          if ($(this).val()==''){
              $('#display').hide().empty();

          }
          else{
              $('#display').show();
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

          }


    });


    $('select[name="Po/req"]').on('change',function () {

        if ($(this).val()=='Purchase Order'){
            $('#vendor_details').show();
        }
        else {
            if ($(this).val()=='Requisition'){
                $('#vendor_details').hide();
                alert('Requisition Selected');
            }
            else
                $('#vendor_details').hide();
                $('#tbody').hide();
        }


    });

    $('#po_num').on('change',function () {
        $('#tbody').show();
        var poId = $(this).val();
        console.log(poId);
        if (poId){
            $.ajax({
                type: "GET",
                url: 'item_details/'+poId,
                success:function(data)
                {

                    $("#tbody").html(data);

                }
            });
        }
    })

</script>
@endsection
