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
                        <h3 class="card-title">Gate Pass</h3>
                    </div>
                    <div class="card-body">
                        <form action="products.html">
                            <div class="row justify-content-around">
                                <div class="col-md-4">

                                    <div class="form-group row">
                                        <label for="sga_13" class="col-sm-4 col-form-label">Gate Pass ID</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="sga_13" placeholder="GP001">
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label for="sga_13" class="col-sm-4 col-form-label">Date</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="sga_19" placeholder="08-02-2020">
                                        </div>
                                    </div>

                                </div>
                            </div>


                            <div class="row justify-content-around">
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Type</label>
                                        <div class="col-sm-8">
                                            <select class="form-control select2">
                                                <option selected="selected">Supplier</option>
                                                <option selected="selected">Customer</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Gate Pass Type</label>
                                        <div class="col-sm-8">
                                            <select class="form-control select2">
                                                <option selected="selected">Inward</option>
                                                <option selected="selected">Outward</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row justify-content-around">

                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Supplier ID</label>
                                        <div class="col-sm-8">
                                            <select class="form-control select2">
                                                <option selected="selected">MML001</option>
                                                <option>MML003</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label for="sga_21" class="col-sm-4 col-form-label">Transporter</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="sga_21" placeholder="">
                                        </div>
                                    </div>

                                </div>
                            </div>



                            <div class="row justify-content-around">

                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label for="sga_20" class="col-sm-4 col-form-label">Supplier Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="sga_20" placeholder="MMLOGIX (PVT) LTD.">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="sga_20" class="col-sm-4 col-form-label">Address</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label for="sga_21" class="col-sm-4 col-form-label">Vehicle No</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="sga_22" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="sga_21" class="col-sm-4 col-form-label">Driver</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="sga_23" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="sga_21" class="col-sm-4 col-form-label">Driver Ph</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="sga_24" placeholder="">
                                        </div>
                                    </div>



                                </div>
                            </div>



                            <div class="row justify-content-around">

                                <div class="col-md-4">


                                </div>
                                <div class="col-md-4">


                                </div>
                            </div>



                            <div class="row justify-content-around">

                                <div class="col-md-4">


                                </div>
                                <div class="col-md-4">


                                </div>
                            </div>



                            <div class="row justify-content-around">

                                <div class="col-md-4">


                                </div>
                                <div class="col-md-4">


                                </div>
                            </div>




                            <div class="row justify-content-around">
                                <div class="col-md-12">
                                    <div class="card card-secondary">
                                        <div class="card-header">
                                            <h3 class="card-title">Products</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <table class="table table-bordered">
                                                <thead class="bg-light">
                                                <tr>
                                                    <th>Sr#</th>
                                                    <th>Product Name</th>
                                                    <th>Product Description</th>
                                                    <th>UOM</th>
                                                    <th>Qty</th>
                                                    <th>Remarks</th>
                                                    <th></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>PR001</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="project-actions">
                                                        <a class="btn btn-danger btn-sm" href="#">
                                                            <i class="fas fa-trash">
                                                            </i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <a class="btn btn-secondary btn-sm mt-3  " href="#">
                                                <i class="fas mr-2 fa-plus">
                                                    Add Row</i>
                                            </a>
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
</section>
@endsection
