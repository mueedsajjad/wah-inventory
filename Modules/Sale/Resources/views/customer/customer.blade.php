@extends('layouts.master')

@section('content')

    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">


                <div class="col-md-12">

                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Add A Customer</h3>
                        </div>
                        <div class="card-body">
                            <form action="#">
                                <div class="row justify-content-around">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="sga_1" class="col-sm-4 col-form-label">Customer ID</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="sga_1" placeholder="CS-001">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="sga_2" class="col-sm-4 col-form-label">Customer Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="sga_2" placeholder="MMLOGIX">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="sga_3" class="col-sm-4 col-form-label">Mobile Number</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="sga_3" placeholder="+92 333 1234567">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="sga_4" class="col-sm-4 col-form-label">Phone Number</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="sga_4" placeholder="+92 42 37800153">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Credit Term</label>
                                            <div class="col-sm-8">
                                                <select class="form-control select2">
                                                    <option selected="selected">10 Days</option>
                                                    <option>10 Days</option>
                                                    <option>15 Days</option>
                                                    <option>30 Days</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="sga_5" class="col-sm-4 col-form-label">Email Id</label>
                                            <div class="col-sm-8">
                                                <input type="email" class="form-control" id="sga_5" placeholder="info@mmlogix.com">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Customer Status</label>
                                            <div class="col-sm-8">
                                                <select class="form-control select2">
                                                    <option selected="selected">Active</option>
                                                    <option>Inactive</option>
                                                    <option>Active</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="sga_6" class="col-sm-4 col-form-label">GSTN Number</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="sga_6" placeholder="213458746">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">State</label>
                                            <div class="col-sm-8">
                                                <select class="form-control select2">
                                                    <option selected="selected">Punjab</option>
                                                    <option>Punjab</option>
                                                    <option>Sindh</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">City</label>
                                            <div class="col-sm-8">
                                                <select class="form-control select2">
                                                    <option selected="selected">Lahore</option>
                                                    <option>Lahore</option>
                                                    <option>Karachi</option>
                                                    <option>Islamabad</option>
                                                    <option>Multan</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="sga_7" class="col-sm-4 col-form-label">Tax/Excise Reference No</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="sga_7" placeholder="35463154">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="sga_8" class="col-sm-4 col-form-label">VAT / TIN Number</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="sga_8" placeholder="547654">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Payment Terms</label>
                                            <div class="col-sm-8">
                                                <select class="form-control select2">
                                                    <option selected="selected">Cash</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </form>
                            <div class="row justify-content-around">
                                <div class="col-md-12">
                                </div>
                                <div class="col-12">
                                    <a href="#" class="btn btn-danger ml-3 float-right">Cancel</a>
                                    <a href="#" class="btn btn-success ml-3 float-right">Save & Print</a>
                                    <input type="submit" value="Save" class="btn btn-success float-right">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </section>

@endsection
