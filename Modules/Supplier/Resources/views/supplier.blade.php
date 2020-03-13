@extends('layouts.master')

@section('content')

    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">

                <div class="col-md-7">
                    <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title">Add Supplier</h3>
                        </div>
                        <div class="card-body">
                            @if(!empty($errors->first()))
                                    <div class="alert alert-danger align-content-center">
                                        <span>{{ $errors->first() }}</span>
                                    </div>
                                @endif
                                @if(session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session()->get('message') }}
                                    </div>
                                @endif
                            <form action="{{url('supplier/addNewSupplier')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row justify-content-around">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="sga_1" class="col-sm-4 col-form-label">Supplier ID</label>
                                            <div class="col-sm-8">
                                                <input type="text" value="SP00{{$countSupplierId}}" name="supplier_id" required readonly class="form-control" placeholder="S-001">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Supplier Currency</label>
                                            <div class="col-sm-8">
                                                <input type="text" required readonly value="PKR" name="currency" class="form-control" placeholder="MMLOGIX">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="sga_2" class="col-sm-4 col-form-label">Supplier Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" required name="name" value="{{old('name')}}" class="form-control" placeholder="MMLOGIX">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="sga_3" class="col-sm-4 col-form-label">Mobile Number</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" required value="{{old('m_number')}}" name="m_number" placeholder="03331234567">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="sga_4" class="col-sm-4 col-form-label">Phone Number</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" required value="{{old('p_number')}}" name="p_number" placeholder="+924237800153">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Credit Term</label>
                                            <div class="col-sm-8">
                                                <select class="form-control select2" name="credit_term">
                                                    @if(!$credit_term->isempty())
                                                        @foreach($credit_term as $item)
                                                            <option value="{{$item->name}}">{{$item->name}}</option>
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
                                                <input type="email" name="email" value="{{old('email')}}" class="form-control" required placeholder="info@mmlogix.com">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Supplier Status</label>
                                            <div class="col-sm-8">
                                                <select class="form-control select2" name="status" required>
                                                    <option selected="selected">Active</option>
                                                    <option>Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="sga_6" class="col-sm-4 col-form-label">GSTN Number</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" value="{{old('gstn_number')}}" required name="gstn_number" placeholder="213458746">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">State</label>
                                            <div class="col-sm-8">
                                                <select class="form-control select2" name="state" required>
                                                    @if(!$state->isempty())
                                                        @foreach($state as $item)
                                                            <option value="{{$item->name}}">{{$item->name}}</option>
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
                                                <select class="form-control select2" name="city" required>
                                                    @if(!$city->isempty())
                                                        @foreach($city as $item)
                                                            <option value="{{$item->name}}">{{$item->name}}</option>
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
                                                <input type="text" name="tax_excise_no" value="{{old('tax_excise_no')}}" class="form-control" required placeholder="35463154">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="sga_8" class="col-sm-4 col-form-label">VAT / TIN Number</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" value="{{old('vat_tin_no')}}" name="vat_tin_no" required placeholder="547654">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Payment Terms</label>
                                            <div class="col-sm-8">
                                                <select class="form-control select2" name="payment_terms">
                                                    @if(!$payment_term->isempty())
                                                        @foreach($payment_term as $item)
                                                            <option value="{{$item->name}}">{{$item->name}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="sga_9" class="col-sm-4 col-form-label">Bank Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="bank_name" value="{{old('bank_name')}}" class="form-control" required placeholder="Mezaan Bank">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="sga_10" class="col-sm-4 col-form-label">Bank Branch</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="bank_branch" value="{{old('bank_branch')}}" required class="form-control" id="sga_10" placeholder="Allama Iqbal Town">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="sga_11" class="col-sm-4 col-form-label">Account Number</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" value="{{old('account_num')}}" name="account_num" required placeholder="000-313543154">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-around">
                                    <div class="col-md-12">
                                    </div>
                                    <div class="col-12">
                                        <button type="button" class="btn btn-danger ml-3 float-right">Cancel</button>
                                        <a href="#" class="btn btn-success ml-3 float-right">Save & Print</a>
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
