
@extends('layouts.master')

@section('content')

    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title">Production Dashboard</h3>
                        </div>
                        <div class="card-body dash-menu">
                            <a class="btn btn-app bg-danger" href="{{url('gmsga/production')}}">
                                <i class="fas fa-edit"></i>Production Orders
                            </a>
                            <!--<a class="btn btn-app bg-danger" href="create-demand-note.html">
                              <i class="fas fa-edit"></i> Demand
                            </a>-->
                            <!--   <a class="btn btn-app bg-danger" href="">
                                 <i class="fas fa-edit"></i> Daily Product Plan
                               </a>-->
                            <!-- <a class="btn btn-app bg-danger">
                               <i class="fas fa-edit"></i> Bill of Material
                             </a>-->
                            <!--<a class="btn btn-app bg-danger">
                              <i class="fas fa-edit"></i> Finished Goods Receipt
                            </a>-->
                            <a class="btn btn-app bg-danger">
                                <i class="fas fa-edit"></i> Material Request Form
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title">Material request</h3>
                        </div>
                        <div class="card-body">
                            <form action="products.html">
                                <div class="row justify-content-around">
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="sga_13" class="col-sm-4 col-form-label">Transaction No</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="sga_13" placeholder="MRF-001">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="sga_13" class="col-sm-4 col-form-label">Transaction Date</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="sga_14" placeholder="08-02-2020">
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row justify-content-around">
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Product Order</label>
                                            <div class="col-sm-8">
                                                <select class="form-control select2">
                                                    <option selected="selected">Production Order 1</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <!--
                                                              <div class="form-group row">
                                                                <label for="sga_13" class="col-sm-4 col-form-label">Qty</label>
                                                                <div class="col-sm-8">
                                                                  <input type="text" class="form-control" id="sga_14" placeholder="125">
                                                                </div>
                                                              </div>
                                        -->
                                    </div>
                                </div>
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
                                                    <th>Material</th>
                                                    <th>Description</th>
                                                    <th>UOM</th>
                                                    <th>Qty</th>
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






                                <div class="row justify-content-around">
                                    <div class="col-md-12">
                                        <!--
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
                                        -->
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
