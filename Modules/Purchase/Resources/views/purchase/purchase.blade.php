@extends('layouts.master')

@section('content')



    <section class="content pt-3">
        <div class="container-fluid">

            @if(session()->has('save'))
                <div class="alert alert-success" role="alert">
                    <strong>Success</strong> {{session()->get('save')}}
                </div>
            @endif


            <div class="row">

                <div class="col-md-12">
                    <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title">Purchase Dashboard</h3>
                        </div>
                        <div class="card-body dash-menu">
                            <a class="btn btn-app bg-danger" href="{{url('purchase/purchaseOrder')}}">
                                <i class="fas fa-edit"></i> Purchase Orders
                            </a>
                            <a class="btn btn-app bg-danger" href="{{url('purchase/tender')}}">
                                <i class="fas fa-edit"></i> Tenders
                            </a>

                            <a class="btn btn-app bg-danger" href="{{url('purchase/directReceipt')}}">
                                <i class="fas fa-edit"></i> Direct Receipt
                            </a>

                            @if(auth()->user()->hasRole('GM'))

                            <a class="btn btn-app bg-danger" href="{{url('purchase/orderForApprove')}}">
                                <i class="fas fa-edit"></i> Orders For Approve
                            </a>
                                @endif

                            @if(auth()->user()->hasRole('GM'))
                                <a class="btn btn-app bg-danger" href="{{url('purchase/selectSupplier')}}">
                                    <i class="fas fa-edit"></i> Select Supplier for Purchase
                                </a>
                            @endif

                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title">New Purchase Order</h3>
                        </div>


                        <div class="card-body">
                            <form action="{{url('purchase/purchaseStore')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row justify-content-around">
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="sga_13" class="col-sm-4 col-form-label">PO Number</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="po_number" class="form-control" id="sga_13" placeholder="S-001">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="sga_13" class="col-sm-4 col-form-label">Document</label>

                                            <div class="col-sm-8">
                                                <div class="custom-file">
                                                    <input type="file" name="upload"  id="exampleInputFile">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                                <div class="row justify-content-around">
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="sga_13" class="col-sm-4 col-form-label">PO date</label>
                                            <div class="col-sm-8">
                                                <input type="date" name="date" class="form-control" id="sga_14" placeholder="08-02-2020">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Credit Terms</label>
                                            <div class="col-sm-8">
                                                <select class="form-control select2 " name="credit_term">
                                                    <option selected="selected" disabled>Select Days</option>
                                                    @foreach($credit as $credits)
                                                    <option value="{{$credits->id}}">{{$credits->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row justify-content-around">
                                    <div class="col-md-4  ">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Supplier ID</label>
                                            <div class="col-sm-8">
                                                <select class="form-control select2" disabled name="supplier_id">
                                                    <option selected="selected">SUPP001</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Purchase By</label>
                                            <div class="col-sm-8">
                                                <select class="form-control select2" name="purchase_by">
                                                    <option selected="selected">PPRA</option>
                                                    <option>Direct Purchase</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                </div>



                                <div class="row justify-content-around">
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="sga_18" class="col-sm-4 col-form-label">Supplier Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="supplier_name" class="form-control" disabled  id="sga_18" placeholder="MMLOGIX (PVT) Ltd.">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="checkboxSuccess1" class="col-sm-4 col-form-label">
                                                Approved
                                            </label>
                                            <div class="icheck-success col-sm-8 d-inline">
                                                <input type="checkbox" name="check" checked="" id="checkboxSuccess1">
                                                <label for="checkboxSuccess1">
                                                </label>
                                            </div>
                                        </div>
                                        <!--
                                                              <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Status</label>
                                                                <div class="col-sm-8">
                                                                  <select class="form-control select2">
                                                                    <option selected="selected">Active</option>
                                                                    <option>Inactive</option>
                                                                  </select>
                                                                </div>
                                                              </div>
                                        -->
                                    </div>
                                </div>



                                <div class="row justify-content-around">
                                    <div class="col-md-4">
                                        <!--
                                                              <div class="form-group row">
                                                                <label for="sga_16" class="col-sm-4 col-form-label">Rate</label>
                                                                <div class="col-sm-8">
                                                                  <input type="text" class="form-control" id="sga_16" placeholder="175">
                                                                </div>
                                                              </div>
                                        -->
                                    </div>
                                    <div class="col-md-4">

                                    </div>
                                </div>


                                <div class="row justify-content-around">
                                    <div class="col-md-12">
                                        <div class="card card-dark">
                                            <!--<div class="card-header">
                                              <h3 class="card-title">Products</h3>
                                            </div>-->
                                            <!-- /.card-header -->

                                            <div class="card-body">
{{--                                               here is all  --}}

                                                <div id="append_condition">
                                                        <input type="hidden" id="countConditions"  name="countConditions" value="0">
                                                      <div class="row">

                                                          <div class="form-group col-1 bg-light">
                                                              <label for="sga_13" class="col-form-label">PO Number</label>
                                                              <input type="text" class="form-control"  name="p_number0" placeholder="PR001">
                                                          </div>

                                                          <div class="form-group col-2 bg-light">
                                                              <label for="sga_13" class="col-form-label">Product Name</label>
                                                              <input type="text" class="form-control"  name="p_name0" placeholder="Product Name">
                                                          </div>

                                                          <div class="form-group col-2 bg-light">
                                                              <label for="sga_13" class="col-form-label">Product Description</label>
                                                              <input type="text" class="form-control"  name="p_description0" placeholder="Product Description">
                                                          </div>

                                                          <div class="form-group col-2 bg-light">
                                                              <label for="sga_13" class="col-form-label">UOM</label>
                                                              <input type="text" class="form-control"  name="p_unit0" placeholder="PCS">
                                                          </div>
                                                          <div class="form-group col-2 bg-light">
                                                              <label for="sga_13" class="col-form-label">Qty</label>
                                                              <input type="text" class="form-control"  name="p_quantity0" placeholder="100">
                                                          </div>
                                                          <div class="form-group col-2 bg-light">
                                                              <label for="sga_13" class="col-form-label">Unit Price</label>
                                                              <input type="text" class="form-control"  name="p_price0" placeholder="200">
                                                          </div>
                                                          <div class="form-group col-1 bg-light">
                                                              <label for="sga_13" class="col-form-label">Total Price</label>
                                                              <input type="text" class="form-control"  name="p_total_price0" placeholder="300">
                                                          </div>
                                                      </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-6 text-left">
                                                        <a id="create_condition_btn" class="btn btn-secondary btn-sm mt-3 " type="button" href="#">
                                                            <i class="fas mr-2 fa-plus">Add Row</i>
                                                        </a>

                                                    </div>
                                                    <div class="col-6 text-right">
                                                        <button class="btn btn-danger btn-sm" type="button" id="remove_condition_btn">
                                                            <i class="fas fa-trash">
                                                            </i>
                                                        </button>
                                                    </div>

                                                </div>


                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <a href="#" class="btn btn-danger ml-3 float-right">Cancel</a>
                                        <a href="#" class="btn btn-success ml-3 float-right">Save & Print</a>
                                        <input type="submit" value="Save" class="btn btn-success float-right">
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>

        <script src="{{asset('public/plugins/jquery/jquery.min.js')}}"></script>

    <script>
        $('#create_condition_btn').click(function(){
            var countConditions=$('#countConditions').val();

            ++countConditions;
            $('#countConditions').val(countConditions);
            var html =
                ' <div class="row">'+
           ' <div id="p_number'+countConditions+'" class="form-group col-1"> <input type="text" class="form-control"  name="p_number'+countConditions+'" placeholder="PR001"> </div>'+
           ' <div id="p_name'+countConditions+'" class="form-group col-2"> <input type="text" class="form-control"  name="p_name'+countConditions+'" placeholder="Product Name"> </div>'+
            '<div id="p_description'+countConditions+'" class="form-group col-2"> <input type="text" class="form-control"  name="p_description'+countConditions+'" placeholder="Product Description"> </div>'+
                ' <div id="p_unit'+countConditions+'" class="form-group col-2"> <input type="text" class="form-control"  name="p_unit'+countConditions+'" placeholder="PCS"> </div> '+
                '   <div id="p_quantity'+countConditions+'" class="form-group col-2"> <input type="text" class="form-control"  name="p_quantity'+countConditions+'" placeholder="100"> </div> '+
                '  <div id="p_price'+countConditions+'" class="form-group col-2"> <input type="text" class="form-control"  name="p_price'+countConditions+'" placeholder="120"> </div>'+
                '  <div id="p_total_price'+countConditions+'" class="form-group col-1"> <input type="text" class="form-control"  name="p_total_price'+countConditions+'" placeholder="150"> </div>'+
             '</div>'

            $('#append_condition').append(html);
        });

        $('#remove_condition_btn').click(function(){
            var countConditions=$('#countConditions').val();

            if(countConditions<1){
                return false;
            }

            $('#p_number'+countConditions).remove();
            $('#p_name'+countConditions).remove();
            $('#p_description'+countConditions).remove();
            $('#p_unit'+countConditions).remove();
            $('#p_quantity'+countConditions).remove();
            $('#p_price'+countConditions).remove();
            $('#p_total_price'+countConditions).remove();

            --countConditions;
            $('#countConditions').val(countConditions);
        });
    </script>

{{-------- nav tab for role    ----------}}
{{--    <nav class="main-header navbar navbar-expand-md navbar-dark  py-0">--}}
{{--        <div class="container-fluid">--}}
{{--            <a href="dashboard.html" class="navbar-brand">--}}
{{--                <!-- <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"--}}
{{--                      style="opacity: .8">-->--}}
{{--                <span class="brand-text font-weight-normal"><img class=" pr-3" src="./logo.png" alt="logo" > SGA - WAH Industries</span>--}}
{{--            </a>--}}

{{--            <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--                <span class="navbar-toggler-icon"></span>--}}
{{--            </button>--}}

{{--            <div class="collapse navbar-collapse order-3" id="navbarCollapse">--}}
{{--                <!-- Left navbar links -->--}}
{{--                <ul class="navbar-nav">--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="btn m-0 btn-app" href="dashboard.html">--}}
{{--                            <i class="fas fa-chart-line"></i>Dashboard--}}
{{--                        </a>--}}
{{--                    </li>--}}


{{--                    <li class="nav-item dropdown">--}}
{{--                        <a id="dropdownSubMenu1" href="gate.html"  class=" dropdown-toggle btn m-0 btn-app"><i class="fas fa-spray-can"></i>--}}
{{--                            Gate</a>--}}
{{--                        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow ">--}}
{{--                            <li><a href="#" class="dropdown-item">Some action </a></li>--}}
{{--                            <li><a href="#" class="dropdown-item">Some other action</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}

{{--                    <li class="nav-item dropdown">--}}
{{--                        <a id="dropdownSubMenu2" href="stores.html"  class=" dropdown-toggle btn m-0 btn-app"><i class="fas fa-dollar-sign"></i>--}}
{{--                            Store</a>--}}
{{--                        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow ">--}}
{{--                            <li><a href="#" class="dropdown-item">Some action </a></li>--}}
{{--                            <li><a href="#" class="dropdown-item">Some other action</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}

{{--                    <li class="nav-item dropdown">--}}
{{--                        <a id="dropdownSubMenu11" href="hr-admin.html" class=" dropdown-toggle btn m-0 btn-app"><i class="fas fa-globe-europe"></i>--}}
{{--                            HR / Admin</a>--}}
{{--                        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow ">--}}
{{--                            <li><a href="#" class="dropdown-item">Add New Product </a></li>--}}
{{--                            <li><a href="#" class="dropdown-item">Product List</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}

{{--                    <li class="nav-item dropdown">--}}
{{--                        <a id="dropdownSubMenu3" href="supplier.html"  class=" dropdown-toggle btn m-0 btn-app"><i class="fas fa-truck"></i>--}}
{{--                            Supplier</a>--}}
{{--                        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow ">--}}
{{--                            <li><a href="#" class="dropdown-item">Some action </a></li>--}}
{{--                            <li><a href="#" class="dropdown-item">Some other action</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}

{{--                    <li class="nav-item dropdown">--}}
{{--                        <a id="dropdownSubMenu4" href="purchase.html" class=" dropdown-toggle btn m-0 btn-app"><i class="fas fa-boxes"></i>--}}
{{--                            Purchase</a>--}}
{{--                        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow ">--}}
{{--                            <li><a href="#" class="dropdown-item">Some action </a></li>--}}
{{--                            <li><a href="#" class="dropdown-item">Some other action</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}


{{--                    <li class="nav-item dropdown">--}}
{{--                        <a id="dropdownSubMenu6" href="production.html" class=" dropdown-toggle btn m-0 btn-app"><i class="fas fa-user"></i>--}}
{{--                            Production</a>--}}
{{--                        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow ">--}}
{{--                            <li><a href="#" class="dropdown-item">Some action </a></li>--}}
{{--                            <li><a href="#" class="dropdown-item">Some other action</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}

{{--                    <li class="nav-item dropdown">--}}
{{--                        <a id="dropdownSubMenu7" href="sales.html" class=" dropdown-toggle btn m-0 btn-app"><i class="fas fa-dollar-sign"></i>--}}
{{--                            Sales</a>--}}
{{--                        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow ">--}}
{{--                            <li><a href="#" class="dropdown-item">Some action </a></li>--}}
{{--                            <li><a href="#" class="dropdown-item">Some other action</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}

{{--                    <li class="nav-item dropdown">--}}
{{--                        <a id="dropdownSubMenu8" href="quality.html" class=" dropdown-toggle btn m-0 btn-app"><i class="fas fa-torii-gate"></i>--}}
{{--                            Quality</a>--}}
{{--                        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow ">--}}
{{--                            <li><a href="#" class="dropdown-item">Some action </a></li>--}}
{{--                            <li><a href="#" class="dropdown-item">Some other action</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}

{{--                    <li class="nav-item dropdown">--}}
{{--                        <a id="dropdownSubMenu9" href="settings.html" class=" dropdown-toggle btn m-0 btn-app"><i class="fas fa-cog"></i>--}}
{{--                            Settings</a>--}}
{{--                        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow ">--}}
{{--                            <li><a href="#" class="dropdown-item">Add New Product </a></li>--}}
{{--                            <li><a href="#" class="dropdown-item">Product List</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}



{{--                    <li class="nav-item dropdown ml-auto text-right">--}}
{{--                        <a id="dropdownSubMenu13" href="hr-admin.html" class=" dropdown-toggle btn m-0 btn-app"><i class="fas fa-sign-out-alt"></i>--}}
{{--                            Logout</a>--}}
{{--                        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow ">--}}
{{--                            <li><a href="#" class="dropdown-item">Add New Product </a></li>--}}
{{--                            <li><a href="#" class="dropdown-item">Product List</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </div>--}}

{{--            <!-- Right navbar links -->--}}
{{--            <!----}}
{{--                  <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">--}}
{{--                    &lt;!&ndash; Messages Dropdown Menu &ndash;&gt;--}}
{{--                    <li class="nav-item dropdown">--}}
{{--                      <a class="nav-link" data-toggle="dropdown" href="#">--}}
{{--                        <i class="fas fa-comments"></i>--}}
{{--                        <span class="badge badge-danger navbar-badge">3</span>--}}
{{--                      </a>--}}
{{--                      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">--}}
{{--                        <a href="#" class="dropdown-item">--}}
{{--                          &lt;!&ndash; Message Start &ndash;&gt;--}}
{{--                          <div class="media">--}}
{{--                            <img src="../../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">--}}
{{--                            <div class="media-body">--}}
{{--                              <h3 class="dropdown-item-title">--}}
{{--                                Brad Diesel--}}
{{--                                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>--}}
{{--                              </h3>--}}
{{--                              <p class="text-sm">Call me whenever you can...</p>--}}
{{--                              <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>--}}
{{--                            </div>--}}
{{--                          </div>--}}
{{--                          &lt;!&ndash; Message End &ndash;&gt;--}}
{{--                        </a>--}}
{{--                        <div class="dropdown-divider"></div>--}}
{{--                        <a href="#" class="dropdown-item">--}}
{{--                          &lt;!&ndash; Message Start &ndash;&gt;--}}
{{--                          <div class="media">--}}
{{--                            <img src="../../dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">--}}
{{--                            <div class="media-body">--}}
{{--                              <h3 class="dropdown-item-title">--}}
{{--                                John Pierce--}}
{{--                                <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>--}}
{{--                              </h3>--}}
{{--                              <p class="text-sm">I got your message bro</p>--}}
{{--                              <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>--}}
{{--                            </div>--}}
{{--                          </div>--}}
{{--                          &lt;!&ndash; Message End &ndash;&gt;--}}
{{--                        </a>--}}
{{--                        <div class="dropdown-divider"></div>--}}
{{--                        <a href="#" class="dropdown-item">--}}
{{--                          &lt;!&ndash; Message Start &ndash;&gt;--}}
{{--                          <div class="media">--}}
{{--                            <img src="../../dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">--}}
{{--                            <div class="media-body">--}}
{{--                              <h3 class="dropdown-item-title">--}}
{{--                                Nora Silvester--}}
{{--                                <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>--}}
{{--                              </h3>--}}
{{--                              <p class="text-sm">The subject goes here</p>--}}
{{--                              <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>--}}
{{--                            </div>--}}
{{--                          </div>--}}
{{--                          &lt;!&ndash; Message End &ndash;&gt;--}}
{{--                        </a>--}}
{{--                        <div class="dropdown-divider"></div>--}}
{{--                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>--}}
{{--                      </div>--}}
{{--                    </li>--}}
{{--                    &lt;!&ndash; Notifications Dropdown Menu &ndash;&gt;--}}
{{--                    <li class="nav-item dropdown">--}}
{{--                      <a class="nav-link" data-toggle="dropdown" href="#">--}}
{{--                        <i class="far fa-bell"></i>--}}
{{--                        <span class="badge badge-warning navbar-badge">15</span>--}}
{{--                      </a>--}}
{{--                      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">--}}
{{--                        <span class="dropdown-header">15 Notifications</span>--}}
{{--                        <div class="dropdown-divider"></div>--}}
{{--                        <a href="#" class="dropdown-item">--}}
{{--                          <i class="fas fa-envelope mr-2"></i> 4 new messages--}}
{{--                          <span class="float-right text-muted text-sm">3 mins</span>--}}
{{--                        </a>--}}
{{--                        <div class="dropdown-divider"></div>--}}
{{--                        <a href="#" class="dropdown-item">--}}
{{--                          <i class="fas fa-users mr-2"></i> 8 friend requests--}}
{{--                          <span class="float-right text-muted text-sm">12 hours</span>--}}
{{--                        </a>--}}
{{--                        <div class="dropdown-divider"></div>--}}
{{--                        <a href="#" class="dropdown-item">--}}
{{--                          <i class="fas fa-file mr-2"></i> 3 new reports--}}
{{--                          <span class="float-right text-muted text-sm">2 days</span>--}}
{{--                        </a>--}}
{{--                        <div class="dropdown-divider"></div>--}}
{{--                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>--}}
{{--                      </div>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                      <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i--}}
{{--                        class="fas fa-th-large"></i></a>--}}
{{--                    </li>--}}
{{--                  </ul>--}}
{{--            -->--}}
{{--        </div>--}}
{{--    </nav>--}}
@endsection
