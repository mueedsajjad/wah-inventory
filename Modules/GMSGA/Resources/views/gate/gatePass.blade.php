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
