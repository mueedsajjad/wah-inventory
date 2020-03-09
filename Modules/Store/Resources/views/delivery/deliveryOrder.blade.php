@extends('layouts.master')

@section('content')

    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">


                <div class="col-md-12">
                    <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title">Delivery Order Note</h3>
                        </div>
                        <div class="card-body">
                            <form action="products.html">
                                <div class="row justify-content-around">
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="sga_13" class="col-sm-4 col-form-label">DON#</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="sga_13" placeholder="S-001">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Customer Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" placeholder="MMLOGIX">
                                            </div>
                                        </div>

                                    </div>
                                </div>


                                <div class="row justify-content-around">
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="sga_13" class="col-sm-4 col-form-label">DO Date</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="sga_14" placeholder="08-02-2020">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">

                                    </div>
                                </div>


                                <div class="row justify-content-around">
                                    <div class="col-md-4  ">

                                    </div>

                                    <div class="col-md-4">


                                    </div>
                                </div>


                                <div class="row justify-content-around">
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="sga_18" class="col-sm-4 col-form-label">Sales Person</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="sga_18" placeholder="Mehdi Rizvi">
                                            </div>
                                        </div>



                                    </div>

                                    <div class="col-md-4">

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
                                                <table class="table table-bordered">
                                                    <thead class="bg-light">
                                                    <tr>
                                                        <th>Sr#</th>
                                                        <th>Product Name</th>
                                                        <th>Product Description</th>
                                                        <th>UOM</th>
                                                        <th>Qty</th>
                                                        <th>Unit Price</th>
                                                        <th>Amount</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>PR001</td>
                                                        <td>Product Description</td>
                                                        <td>PCS</td>
                                                        <td>50</td>
                                                        <td>100</td>
                                                        <td>5000</td>
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
