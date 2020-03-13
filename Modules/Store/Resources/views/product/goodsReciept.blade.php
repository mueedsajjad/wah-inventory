@extends('layouts.master')

@section('content')

    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mb-1">
                    <a class="btn btn-primary btn-sm" href="{{url('store/dashboard')}}">
                        <i class="fas fa-tachometer-alt"></i>
                        Dashboard
                    </a>
                    <a class="btn btn-primary btn-sm ml-1" href="{{url('store/product')}}">
                        <i class="fas fa-folder">
                        </i>
                        View Products
                    </a>
                </div>

                <div class="col-md-12">
                    <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title">Goods Receipt Note</h3>
                        </div>
                        <div class="card-body">
                            <form action="products.html">
                                <div class="row justify-content-around">
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">GRN#</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" placeholder="S-001">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Document</label>
                                            <div class="col-sm-8">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="inputGroupFile01"
                                                           aria-describedby="inputGroupFileAddon01">
                                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row justify-content-around">
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="sga_13" class="col-sm-4 col-form-label">GRN Date</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" placeholder="08-02-2020">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Supplier ID</label>
                                            <div class="col-sm-8">
                                                <select class="form-control select2">

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row justify-content-around">
                                    <div class="col-md-4  ">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Receiving Location</label>
                                            <div class="col-sm-8">
                                                <select class="form-control select2">
                                                    @if(!$stores->isempty())
                                                        @foreach($stores as $store)
                                                            <option value="{{$store->name}}">{{$store->name}}</option>
                                                        @endforeach
                                                    @endif
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
                                            <label for="sga_18" class="col-sm-4 col-form-label">Purchase Order No</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="sga_18" placeholder="MMLOGIX (PVT) Ltd.">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Gate Pass ID</label>
                                            <div class="col-sm-8">
                                                <select class="form-control select2">

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="row justify-content-around">
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="sga_16" class="col-sm-4 col-form-label">Rate</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="sga_16" placeholder="175">
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
                                    </div>
                                </div>

                                    <div class="col-md-11">
                                        <a href="#" class="btn btn-danger ml-3 float-right">Cancel</a>
                                        <a href="#" class="btn btn-success ml-3 float-right">Save & Print</a>
                                        <input type="submit" value="Save" class="btn btn-success float-right">
                                    </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
