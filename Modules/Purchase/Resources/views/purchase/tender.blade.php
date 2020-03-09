@extends('layouts.master')


@section('content')

    <section class="content pt-5">
        <div class="container-fluid">
            <div class="row">

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



                <div class="col-md-12">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Tender</h3>
                        </div>
                        <div class="card-body">
                            <form action="products.html">
                                <div class="row justify-content-around">
                                    <div class="col-md-4">

                                        <div class="form-group row">
                                            <label for="sga_13" class="col-sm-4 col-form-label">Tender ID</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="sga_13" placeholder="TD001">
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
                                            <label class="col-sm-4 col-form-label"></label>
                                            <div class="col-sm-8">
                                                <select class="form-control select2">
                                                    <option selected="selected"></option>
                                                    <option selected="selected"></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label"></label>
                                            <div class="col-sm-8">
                                                <select class="form-control select2">
                                                    <option selected="selected"></option>
                                                    <option selected="selected"></option>
                                                </select>
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




                            </form>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </section>
@endsection
