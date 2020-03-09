@extends('layouts.master')


@section('content')

    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card-no-border">
                        <div class="card bg-transparent card-danger card-outline card-outline-tabs">
                            <div class="card-header p-0 border-bottom-0">
                                <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Schedule</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Tasks</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body p-0 bg-transparent">
                                <div class="tab-content" id="custom-tabs-three-tabContent">
                                    <div class="tab-pane fade active show" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">


                                        <div class="row mt-3">
                                            <div class="col-12">
                                                <div class="production1">
                                                    <div class="card card-danger card-outline card-outline-tabs">
                                                        <div class="card-header p-0 border-bottom-0">
                                                            <ul class="nav nav-tabs" id="production-tab" role="tablist">
                                                                <li class="nav-item">
                                                                    <a class="nav-link active" id="schedule-open" data-toggle="pill" href="#pro-open" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Open</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link" id="schedule-done" data-toggle="pill" href="#prodone" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Done</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="card-body bg-transparent">
                                                            <div class="tab-content" id="schedule-open1">
                                                                <div class="tab-pane fade active show" id="pro-open" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">

                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <!-- /.card -->

                                                                            <div class="card">
                                                                                <!--                                          <div class="card-header">-->
                                                                                <!--                                            <h3 class="card-title">DataTable with default features</h3>-->
                                                                                <!--                                          </div>-->
                                                                                <!-- /.card-header -->
                                                                                <div class="card-body">
                                                                                    <table id="example1" class="table table-bordered ">
                                                                                        <thead>
                                                                                        <tr>
                                                                                            <th>Sr</th>
                                                                                            <th>Order #</th>
                                                                                            <th>Product</th>
                                                                                            <th>Quantity</th>
                                                                                            <th>Production Time</th>
                                                                                            <th>Production Deadline</th>
                                                                                            <th>Ingredients</th>
                                                                                            <th>Production</th>
                                                                                        </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                        <tr>
                                                                                            <td>1</td>
                                                                                            <td><a href="new-prodution-order.html">MO-1</a></td>
                                                                                            <td>12 Gauge Bullet</td>
                                                                                            <td>82192</td>
                                                                                            <td>20hrs</td>
                                                                                            <td>27-Feb-2020</td>
                                                                                            <td class="bg-danger"><button type="button" class="btn text-white" data-toggle="modal" data-target="#modal-default">
                                                                                                    Not Available
                                                                                                </button></td>
                                                                                            <!--                                                <td class="bg-success text-center"><a href="#">Available</a></td>-->
                                                                                            <td class="bg-light text-center">
                                                                                                <div class="form-group m-0">
                                                                                                    <select class="custom-select">
                                                                                                        <option selected>Not Started</option>
                                                                                                        <option>Blocked</option>
                                                                                                        <option>Work In Progress</option>
                                                                                                        <option>Done</option>
                                                                                                    </select>
                                                                                                </div>


                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>2</td>
                                                                                            <td><a href="new-prodution-order.html">MO-2</a></td>
                                                                                            <td>12 Gauge Bullet</td>
                                                                                            <td>82192</td>
                                                                                            <td>20hrs</td>
                                                                                            <td>27-Feb-2020</td>
                                                                                            <td class="bg-success"><button type="button" class="btn text-white" data-toggle="modal" data-target="#modal-default">
                                                                                                    In Stock
                                                                                                </button></td>
                                                                                            <!--                                                <td class="bg-success text-center"><a href="#">Available</a></td>-->
                                                                                            <td class="bg-light text-center">
                                                                                                <div class="form-group m-0">
                                                                                                    <select class="custom-select">
                                                                                                        <option selected>Done</option>
                                                                                                        <option>Not Started</option>
                                                                                                        <option>Blocked</option>
                                                                                                        <option>Work In Progress</option>
                                                                                                    </select>
                                                                                                </div>


                                                                                            </td>
                                                                                        </tr>

                                                                                        </tbody>
                                                                                        <tfoot>
                                                                                        <tr>
                                                                                            <th>Sr</th>
                                                                                            <th>Order #</th>
                                                                                            <th>Product</th>
                                                                                            <th>Quantity</th>
                                                                                            <th>Production Time</th>
                                                                                            <th>Production Deadline</th>
                                                                                            <th>Ingredients</th>
                                                                                            <th>Production</th>
                                                                                        </tr>
                                                                                        </tfoot>
                                                                                    </table>
                                                                                </div>
                                                                                <!-- /.card-body -->
                                                                            </div>
                                                                            <!-- /.card -->
                                                                        </div>
                                                                        <!-- /.col -->
                                                                    </div>




                                                                </div>
                                                                <div class="tab-pane fade" id="prodone" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">

                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <!-- /.card -->

                                                                            <div class="card">
                                                                                <!--                                          <div class="card-header">-->
                                                                                <!--                                            <h3 class="card-title">DataTable with default features</h3>-->
                                                                                <!--                                          </div>-->
                                                                                <!-- /.card-header -->
                                                                                <div class="card-body">
                                                                                    <table id="example2" class="table table-bordered ">
                                                                                        <thead>
                                                                                        <tr>
                                                                                            <th>Sr</th>
                                                                                            <th>Order #</th>
                                                                                            <th>Product</th>
                                                                                            <th>Quantity</th>
                                                                                            <th>Material</th>
                                                                                            <th>Operation</th>
                                                                                            <th>Total</th>
                                                                                            <th>Done Date</th>
                                                                                            <th>Production</th>
                                                                                        </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                        <tr>
                                                                                            <td>1</td>
                                                                                            <td><a href="done-prodution.html">MO-1</a></td>
                                                                                            <td>12 Gauge Bullet</td>
                                                                                            <td>50000 PKR</td>
                                                                                            <td>150000 PKR</td>
                                                                                            <td>20000</td>
                                                                                            <td>170000</td>
                                                                                            <td>28-Feb-2020</td>
                                                                                            <td class="bg-success"><button type="button" class="btn text-white" data-toggle="modal" data-target="#modal-default">
                                                                                                    Done
                                                                                                </button></td>

                                                                                        </tr>

                                                                                        </tbody>
                                                                                        <!--  <tfoot>
                                                                                          <tr>
                                                                                            <th>Sr</th>
                                                                                            <th>Order #</th>
                                                                                            <th>Product</th>
                                                                                            <th>Quantity</th>
                                                                                            <th>Production Time</th>
                                                                                            <th>Production Deadline</th>
                                                                                            <th>Ingredients</th>
                                                                                            <th>Production</th>
                                                                                          </tr>
                                                                                          </tfoot>-->
                                                                                    </table>
                                                                                </div>
                                                                                <!-- /.card-body -->
                                                                            </div>
                                                                            <!-- /.card -->
                                                                        </div>
                                                                        <!-- /.col -->
                                                                    </div>


                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- /.card -->
                                                    </div>

                                                </div>
                                            </div>
                                        </div>





                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">


                                        <div class="row mt-3">
                                            <div class="col-12">
                                                <!-- /.card -->

                                                <div class="card">
                                                    <!--                                          <div class="card-header">-->
                                                    <!--                                            <h3 class="card-title">DataTable with default features</h3>-->
                                                    <!--                                          </div>-->
                                                    <!-- /.card-header -->
                                                    <div class="card-body">
                                                        <table id="example3" class="table table-bordered ">
                                                            <thead>
                                                            <tr>
                                                                <th>Resource</th>
                                                                <th>MO #</th>
                                                                <th>MO Deadline</th>
                                                                <th>Product</th>
                                                                <th>Quantity</th>
                                                                <th>Operation</th>
                                                                <th>Prod Time</th>
                                                                <th>Status</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>Taha</td>
                                                                <td><a href="done-prodution.html">MO-1</a></td>
                                                                <td>28-Feb-2020</td>
                                                                <td>12 Gauge Bullet</td>
                                                                <td>5000</td>
                                                                <td>Filling</td>
                                                                <td>5h</td>
                                                                <td>
                                                                    <div class="d-flex">
                                                                        <div class="p-2 px-3 bg-light">
                                                                            <i class="fa fa-play"></i>
                                                                        </div>
                                                                        <div class="px-3 p-2 bg-yellow">
                                                                            <i class="fa fa-hourglass-half"></i>
                                                                        </div>
                                                                    </div>
                                                                </td>


                                                            </tr>
                                                            <tr>
                                                                <td>Mohib</td>
                                                                <td><a href="done-prodution.html">MO-1</a></td>
                                                                <td>28-Feb-2020</td>
                                                                <td>12 Gauge Bullet</td>
                                                                <td>5000</td>
                                                                <td>Printing</td>
                                                                <td>5h</td>
                                                                <td>
                                                                    <div class="d-flex">
                                                                        <div class="p-2 px-3 bg-success">
                                                                            <i class="fa fa-check"></i>
                                                                        </div>
                                                                    </div>
                                                                </td>


                                                            </tr>

                                                            </tbody>
                                                            <!--  <tfoot>
                                                              <tr>
                                                                <th>Sr</th>
                                                                <th>Order #</th>
                                                                <th>Product</th>
                                                                <th>Quantity</th>
                                                                <th>Production Time</th>
                                                                <th>Production Deadline</th>
                                                                <th>Ingredients</th>
                                                                <th>Production</th>
                                                              </tr>
                                                              </tfoot>-->
                                                        </table>
                                                    </div>
                                                    <!-- /.card-body -->
                                                </div>
                                                <!-- /.card -->
                                            </div>
                                            <!-- /.col -->
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </section>

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Default Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="img/stock.png" class="img-fluid" alt="">
                    <!--          <p>One fine body&hellip;</p>-->
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection




