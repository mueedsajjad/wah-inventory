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
                            <h3 class="card-title">Add Customer</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{url('sale/addCustomer')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row justify-content-around">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="sga_1" class="col-sm-4 col-form-label">Customer ID</label>
                                            <div class="col-sm-8">
                                                <input type="text" readonly required value="CS00{{$countCustomerId}}" class="form-control" name="customer_id" id="customer_id" placeholder="CS-001">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="sga_2" class="col-sm-4 col-form-label">Customer Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" required class="form-control" name="name" id="name" placeholder="MMLOGIX">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="sga_3" class="col-sm-4 col-form-label">Mobile Number</label>
                                            <div class="col-sm-8">
                                                <input type="text" required min="11" max="11" class="form-control" name="m_number" id="m_number" placeholder="+92 333 1234567">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="sga_4" class="col-sm-4 col-form-label">Phone Number</label>
                                            <div class="col-sm-8">
                                                <input type="text" required class="form-control" name="p_number" id="p_number" placeholder="+92 42 37800153">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Credit Term</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="credit_term" required>
                                                    @if(!$credit_term->isempty())
                                                        @foreach($credit_term as $item)
                                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="sga_5" class="col-sm-4 col-form-label">Email Id</label>
                                            <div class="col-sm-8">
                                                <input type="email" class="form-control" required name="email_id" id="email_id" placeholder="info@mmlogix.com">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Customer Status</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="customer_status" required>
                                                    <option value="active">Active</option>
                                                    <option value="inactive">Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="sga_6" class="col-sm-4 col-form-label">GSTN Number</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" required name="gstn_number" id="gstn_number" placeholder="213458746">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">State</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="state" required>
                                                    @if(!$state->isempty())
                                                        @foreach($state as $item)
                                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">City</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="city" required>
                                                    @if(!$city->isempty())
                                                        @foreach($city as $item)
                                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="sga_7" class="col-sm-4 col-form-label">Tax/Excise Reference No</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" required name="tax_reference_no" id="tax_reference_no" placeholder="35463154">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="sga_8" class="col-sm-4 col-form-label">VAT / TIN Number</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" required name="vat_number" id="vat_number" placeholder="547654">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Payment Terms</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="payment_terms" required>
                                                    @if(!$payment_term->isempty())
                                                        @foreach($payment_term as $item)
                                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            <div class="row justify-content-around">
                                <div class="col-md-12">
                                </div>
                                <div class="col-12">
                                    <input type="submit" value="Save" class="btn btn-success ml-2 float-right">
                                    <a href="#" class="btn btn-secondary float-right">Print</a>
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
