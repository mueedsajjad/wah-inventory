@extends('layouts.master')

@section('content')

    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Inspection Note</h3>
                        </div>
                        <div class="card-body">
                            <form action="products.html">


                                <div class="row justify-content-around">
                                    <div class="col-md-4">

                                        <div class="form-group row">
                                            <label for="sga_13" class="col-sm-4 col-form-label">Inspection ID</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="sga_13" placeholder="GP001">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="sga_13" class="col-sm-4 col-form-label">Inspection Date</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="sga_19" placeholder="08-02-2020">
                                            </div>
                                        </div>

                                    </div>
                                </div>


                                <div class="row justify-content-around">
                                    <div class="col-md-4">

                                        <div class="form-group row">
                                            <label for="sga_13" class="col-sm-4 col-form-label">Purchase Order No</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="sga_13" placeholder="GP001">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="sga_13" class="col-sm-4 col-form-label">Purchase Order Date</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="sga_19" placeholder="08-02-2020">
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="row justify-content-around">
                                    <div class="col-md-4">

                                        <div class="form-group row">
                                            <label for="sga_13" class="col-sm-4 col-form-label">Goods Receipt No</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="sga_13" placeholder="GP001">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="sga_13" class="col-sm-4 col-form-label">Goods Receipt Date</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="sga_19" placeholder="08-02-2020">
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
                                                        <th>Oty Inspected</th>
                                                        <th>Qty Accepted</th>
                                                        <th>Qty Rejected</th>
                                                        <th>Reason of Rejection</th>
                                                        <th></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>PR001</td>
                                                        <td>Description</td>
                                                        <td>250</td>
                                                        <td>238</td>
                                                        <td>12</td>
                                                        <td>Damage</td>
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
