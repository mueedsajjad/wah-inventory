@extends('layouts.master')

@section('content')

    <section class="content pt-3">
        <div class="container-fluid">
            @if(!empty($errors->first()))
                <div class="alert alert-danger text-center">
                    <span>{{ $errors->first() }}</span>
                </div>
            @endif
            @if(session()->has('message'))
                <div class="alert alert-success text-center">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Issue Component From Warehouse</h3>
                            <a href="{{url('store/componentRequisition')}}" class="btn btn-primary btn-sm float-right">Back</a>
                        </div>
                        <div class="card-body">
                            <form action="{{url('store/submitIssuedComponentRequisition')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="production_component_detail_id" value="{{$id}}">
                                <div class="row justify-content-around">
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="sga_13" class="col-sm-4 col-form-label">Transaction No</label>
                                            <div class="col-sm-8">
                                                <input type="text" readonly name="transaction_id" value="TNC00{{$count_store_requisition_issued}}" class="form-control"  placeholder="S-001">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Select Store</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="store_location" required>
                                                    @if(count($stores))
                                                        @foreach($stores as $store)
                                                        <option value="{{$store->name}}">{{$store->name}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-around">
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="sga_18" class="col-sm-4 col-form-label">Component Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" readonly required value="{{$name}}" name="name" placeholder="OP Wad">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="sga_13" class="col-sm-4 col-form-label">Issued date</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" required readonly value="{{date('d-m-Y')}}" placeholder="08-02-2020">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-around">
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="sga_18" class="col-sm-4 col-form-label">Quantity</label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control" readonly required value="{{$quantity}}" name="quantity" placeholder="OP Wad">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                    </div>
                                </div>


                                <div class="col-12">
                                    <a href="#" class="btn btn-secondary ml-3 float-right">Print</a>
                                    <button type="submit" class="btn btn-success float-right">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
