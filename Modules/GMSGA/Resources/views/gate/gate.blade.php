@extends('layouts.master')

@section('content')

    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title">Gate Dashboard</h3>
                        </div>
                        <div class="card-body dash-menu">
                            <a class="btn btn-app bg-danger" href="{{url('gmsga/gatePassInward')}}">
                                <i class="fas fa-edit"></i> Gate Pass
                            </a>
                            <!--
                                            <a class="btn btn-app bg-danger">
                                              <i class="fas fa-edit"></i> Gate Pass Outward
                                            </a>
                            -->
                            <a class="btn btn-app bg-danger" href="{{url('gmsga/attendance')}}">
                                <i class="fas fa-edit"></i> Attendance
                            </a>
                            <a class="btn btn-app bg-danger" href="{{url('gmsga/security')}}">
                                <i class="fas fa-edit"></i> Security
                            </a>
                            <a class="btn btn-app bg-danger" href="{{url('gmsga/vehicleManagement')}}">
                                <i class="fas fa-edit"></i> Vehicle Management
                            </a>
                            <!--
                                            <a class="btn btn-app bg-light">
                                              <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <a class="btn btn-app bg-light">
                                              <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <a class="btn btn-app bg-light">
                                              <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <a class="btn btn-app bg-light">
                                              <i class="fas fa-edit"></i> Edit
                                            </a>
                            -->
                        </div>
                    </div>
                </div>


                <!--

                          <div class="col-md-12">
                            <div class="card card-dark">
                              <div class="card-header">
                                <h3 class="card-title">New Purchase Order</h3>
                              </div>
                              <div class="card-body">
                                <form action="products.html">
                                  <div class="row justify-content-around">
                                    <div class="col-md-4">
                                      <div class="form-group row">
                                        <label for="sga_13" class="col-sm-4 col-form-label">PO Number</label>
                                        <div class="col-sm-8">
                                          <input type="text" class="form-control" id="sga_13" placeholder="S-001">
                                        </div>
                                      </div>
                                    </div>

                                    <div class="col-md-4">
                                      <div class="form-group row">
                                        <label for="sga_13" class="col-sm-4 col-form-label">Document</label>
                                        <div class="col-sm-8">
                                          <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile">
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
                                          <input type="text" class="form-control" id="sga_14" placeholder="08-02-2020">
                                        </div>
                                      </div>
                                    </div>

                                    <div class="col-md-4">
                                      <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Credit Terms</label>
                                        <div class="col-sm-8">
                                          <select class="form-control select2">
                                            <option selected="selected">10 - Days</option>
                                            <option>10 - Days</option>
                                            <option>15 - Days</option>
                                            <option>30 - Days</option>
                                            <option>45 - Days</option>
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
                                          <select class="form-control select2">
                                            <option selected="selected">SUPP001</option>
                                          </select>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="col-md-4">
                                      <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Purchase By</label>
                                        <div class="col-sm-8">
                                          <select class="form-control select2">
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
                                          <input type="text" class="form-control" id="sga_18" placeholder="MMLOGIX (PVT) Ltd.">
                                        </div>
                                      </div>



                                    </div>

                                    <div class="col-md-4">
                                      <div class="form-group row">
                                        <label for="checkboxSuccess1" class="col-sm-4 col-form-label">
                                          Approved
                                        </label>
                                        <div class="icheck-success col-sm-8 d-inline">
                                          <input type="checkbox" checked="" id="checkboxSuccess1">
                                          <label for="checkboxSuccess1">
                                          </label>
                                        </div>
                                      </div>
                                      &lt;!&ndash;
                                                            <div class="form-group row">
                                                              <label class="col-sm-4 col-form-label">Status</label>
                                                              <div class="col-sm-8">
                                                                <select class="form-control select2">
                                                                  <option selected="selected">Active</option>
                                                                  <option>Inactive</option>
                                                                </select>
                                                              </div>
                                                            </div>
                                      &ndash;&gt;
                                    </div>
                                  </div>



                                  <div class="row justify-content-around">
                                    <div class="col-md-4">
                                      &lt;!&ndash;
                                                            <div class="form-group row">
                                                              <label for="sga_16" class="col-sm-4 col-form-label">Rate</label>
                                                              <div class="col-sm-8">
                                                                <input type="text" class="form-control" id="sga_16" placeholder="175">
                                                              </div>
                                                            </div>
                                      &ndash;&gt;
                                    </div>
                                    <div class="col-md-4">

                                    </div>
                                  </div>


                                  <div class="row justify-content-around">
                                    <div class="col-md-12">
                                      <div class="card card-dark">
                                        &lt;!&ndash;<div class="card-header">
                                          <h3 class="card-title">Products</h3>
                                        </div>&ndash;&gt;
                                        &lt;!&ndash; /.card-header &ndash;&gt;
                                        <div class="card-body">
                                          <table class="table table-bordered">
                                            <thead class="bg-light">
                                            <tr>
                                              <th>Sr#</th>
                                              <th>Product Name</th>
                                              <th>Product Description</th>
                                              <th>UOM</th>
                                              <th>Qty</th>
                                              <th>Unit Price</th>
                                              <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                              <td>1</td>
                                              <td>PR001</td>
                                              <td>Product Description</td>
                                              <td>PCS</td>
                                              <td>100</td>
                                              <td>150</td>
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

                -->

            </div>
        </div>
    </section>

@endsection
