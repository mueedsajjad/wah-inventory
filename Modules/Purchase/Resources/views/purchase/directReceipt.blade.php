@extends('layouts.master')

@section('content')

    <section class="content pt-5">
        <div class="container-fluid">

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
                    </div>
                </div>
            </div>
            <div class="row">


                <div class="col-md-12">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Direct Purchase</h3>
                        </div>
                        <div class="card-body">
                            <form action="products.html">
                                <div class="row justify-content-around">
                                    <div class="col-md-4">

                                        <div class="form-group row">
                                            <label for="sga_13" class="col-sm-4 col-form-label">Purchase ID</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="sga_13" placeholder="PR001">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="sga_13" class="col-sm-4 col-form-label">Date</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="sga_19" placeholder="12-02-2020">
                                            </div>
                                        </div>

                                    </div>
                                </div>


                                <div class="row justify-content-around">
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Purchase Type</label>
                                            <div class="col-sm-8">
                                                <select class="form-control select2">
                                                    <option selected="selected">General</option>
                                                    <option>Customer</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Department</label>
                                            <div class="col-sm-8">
                                                <select class="form-control select2">
                                                    <option selected="selected">Accounts</option>
                                                    <option>Production</option>
                                                    <option>Admin</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row justify-content-around">

                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Purchase By</label>
                                            <div class="col-sm-8">
                                                <select class="form-control select2">
                                                    <option selected="selected">Khalid Mehmood</option>
                                                    <option>Mehdi Rizvi</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="sga_21" class="col-sm-4 col-form-label">Receipt No</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="sga_21" placeholder="21354">
                                            </div>
                                        </div>

                                    </div>
                                </div>



                                <div class="row justify-content-around">

                                    <div class="col-md-4">

                                        <div class="form-group row">
                                            <label for="sga_20" class="col-sm-4 col-form-label">Reason of Purchase</label>
                                            <div class="col-sm-8">
                                                <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                                            </div>
                                        </div>
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

                                    <div class="col-md-4">


                                    </div>
                                    <div class="col-md-4">


                                    </div>
                                </div>




                                <div class="row justify-content-around">
                                    <div class="col-md-12">
                                        <div class="card card-secondary">
                                            <div class="card-header">
                                                <h3 class="card-title">Details</h3>
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body">
                                                <table class="table table-bordered">
                                                    <thead class="bg-light">
                                                    <tr>
                                                        <th>Sr#</th>
                                                        <th>Product Description</th>
                                                        <th>Qty</th>
                                                        <th>Amount</th>
                                                        <th></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Description</td>
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
