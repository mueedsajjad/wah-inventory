@extends('layouts.master')

@section('content')

    <section class="content pt-3">
        <div class="container-fluid">
            <div class="mb-1 d-flex justify-content-center">
                <a class="btn btn-primary btn-sm" href="{{url('store/dashboard')}}">
                    <i class="fas fa-tachometer-alt"></i>
                    Dashboard
                </a>
                <a class="btn btn-primary btn-sm ml-2" href="{{url('store/rawMaterial')}}">
                    <i class="fas fa-folder">
                    </i>
                    View Material
                </a>
                <a class="btn btn-primary btn-sm ml-2" href="{{url('store/product')}}">
                    <i class="fas fa-folder">
                    </i>
                    View Products
                </a>
            </div>
            <div class="row d-flex justify-content-center">

                <div class="col-md-8">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Add New Product / Material / Item</h3>
                        </div>
                        <div class="card-body">
                            @if(!empty($errors->first()))
                                <div class="alert alert-danger"  style="text-align: center">
                                    <span>{{ $errors->first() }}</span>
                                </div>
                            @endif
                            @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                            @endif
                            <form action="{{url('store/submitNewMaterial')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row justify-content-around">

                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="sga_14" class="col-sm-4 col-form-label">Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" required name="name" class="form-control" id="sga_14" placeholder="ABCD">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="sga_15" class="col-sm-4 col-form-label">Description</label>
                                            <div class="col-sm-8">
                                                <input type="text" required name="description" class="form-control" id="sga_15" placeholder="Product Description Here...">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Category</label>
                                            <div class="col-sm-8">
                                                <select class="form-control select2" required name="category">
                                                    @if(!$categories->isempty())
                                                        @foreach($categories as $category)
                                                            <option value="{{$category->name}}">{{$category->name}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Unit Of Measurement</label>
                                            <div class="col-sm-8">
                                                <select class="form-control select2" required name="uof">
                                                @if(!$units->isempty())
                                                    @foreach($units as $unit)
                                                    <option value="{{$unit->name}}">{{$unit->name}}</option>
                                                    @endforeach
                                                @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="sga_16" class="col-sm-4 col-form-label">Quantity</label>
                                            <div class="col-sm-8">
                                                <input type="text" required name="qty" class="form-control" id="sga_17" placeholder="250">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Location</label>
                                            <div class="col-sm-8">
                                                <select class="form-control select2" required name="storeLocation">
                                                    @if(!$stores->isempty())
                                                        @foreach($stores as $store)
                                                            <option value="{{$store->name}}">{{$store->name}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Status</label>
                                            <div class="col-sm-8">
                                                <select class="form-control select2" required name="status">
                                                    <option value="active">Active</option>
                                                    <option value="inactive">Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="sga_16" class="col-sm-4 col-form-label">Rate</label>
                                            <div class="col-sm-8">
                                                <input type="text" required name="rate" class="form-control" id="sga_16" placeholder="175">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="btn btn-success float-right">Submit</button>
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
