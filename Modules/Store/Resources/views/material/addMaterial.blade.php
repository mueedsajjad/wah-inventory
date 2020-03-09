@extends('layouts.master')

@section('content')

    <section class="content pt-5">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-4">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Add New Product / Material / Item</h3>
                        </div>
                        <div class="card-body">
                            <form action="products.html">
                                <div class="row justify-content-around">

                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="sga_13" class="col-sm-4 col-form-label">Product ID</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="sga_13" placeholder="S-001">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="sga_14" class="col-sm-4 col-form-label">Product Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="sga_14" placeholder="ABCD">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="sga_15" class="col-sm-4 col-form-label">Product Description</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="sga_15" placeholder="Product Description Here...">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Product Type</label>
                                            <div class="col-sm-8">
                                                <select class="form-control select2">
                                                    <option selected="selected">Products</option>
                                                    <option>Components</option>
                                                    <option>Raw</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Product Category</label>
                                            <div class="col-sm-8">
                                                <select class="form-control select2">
                                                    <option selected="selected">Finish Goods</option>
                                                    <option>Components</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Unit Of Measurement</label>
                                            <div class="col-sm-8">
                                                <select class="form-control select2">
                                                    <option selected="selected">KG - Kilograms</option>
                                                    <option>LT - Liter</option>
                                                    <option>KG - Kilograms</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="sga_16" class="col-sm-4 col-form-label">In Stock</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="sga_17" placeholder="250">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Location</label>
                                            <div class="col-sm-8">
                                                <select class="form-control select2">
                                                    <option selected="selected">Store 1</option>
                                                    <option>Store 2</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Status</label>
                                            <div class="col-sm-8">
                                                <select class="form-control select2">
                                                    <option selected="selected">Active</option>
                                                    <option>Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="sga_16" class="col-sm-4 col-form-label">Rate</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="sga_16" placeholder="175">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <a href="#" class="btn btn-secondary">Cancel</a>
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
