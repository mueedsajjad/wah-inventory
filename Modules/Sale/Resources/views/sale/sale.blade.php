
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
                    <form action="{{url('sale/saleStore')}}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">New Sale Order</h3>
                        </div>
                        <div class="card-body">

                            <div class="row justify-content-around">
                                <div class="col-md-5">
                                    <div class="form-group row">
                                        <label for="sga_13" class="col-sm-4 col-form-label">SO Number</label>
                                        <div class="col-sm-8">
                                            <input type="text" required name="so_number" readonly class="form-control" value="SO00{{$countSoNumber}}" id="sga_13" placeholder="GP001">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group row">
                                        <label for="sga_13" class="col-sm-4 col-form-label">Date</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly required value="{{date('d-m-Y')}}" class="form-control" id="sga_19" placeholder="08-02-2020">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-around">
                                <div class="col-md-5">
                                    <div class="form-group row">
                                        <label for="sga_13" class="col-sm-4 col-form-label">Customer Name</label>
                                        <div class="col-sm-8">
                                            <select name="customer_id" required class="form-control select2" id="customer_id">
                                                @if(!$customers->isempty())
                                                    <option selected disabled>---Select---</option>
                                                    @foreach($customers as $customer)
                                                        <option value="{{$customer->customer_id}}">{{$customer->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group row">
                                        <label for="sga_13" class="col-sm-4 col-form-label">Customer ID</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control" name="" id="customer_id_show">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-around">
                                <div class="col-md-5">
                                    <div class="form-group row">
                                        <label for="sga_13" class="col-sm-4 col-form-label">Delivery Date</label>
                                        <div class="col-sm-8">
                                            <input type="date" required class="form-control" name="delivery_date">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                </div>
                            </div>

                        </div>


                        <div class="card card-secondary ml-3 mr-3">
                            <div class="card-header">
                                <h3 class="card-title">Products</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive">
                                <table class="table table-bordered">
                                    <thead class="bg-light">
                                    <tr>
                                        <th style="width: 10%;">Sr#</th>
                                        <th style="width: 15%;">Product Code</th>
                                        <th style="width: 15%;">UOM</th>
                                        <th style="width: 15%;">Qty</th>
                                        <th >Product Description</th>
                                    </tr>
                                    </thead>
                                    <tbody id="appendProduct">
                                    <tr>
                                        <input name="countProduct" type="hidden" value="1" id="countProduct">
                                        <td>1</td>
                                        <td>
                                            <select name="productCode[]" class="form-control productCode">
                                                @if(!$products->isempty())
                                                    @foreach($products as $product)
                                                        <option value="{{$product->product_code}}">{{$product->product_code}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </td>

                                        <td>
                                            <select name="uom[]" class="form-control ">
                                                @if(!$units->isempty())
                                                    @foreach($units as $unit)
                                                        <option value="{{$unit->id}}">{{$unit->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>

                                        </td>
                                        <td>
                                            <input type="text" name="qty[]" class="form-control" id="" placeholder="">
                                        </td>
                                        <td>
                                            <textarea rows="1" type="text" name="description[]" class="form-control"></textarea>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <button class="btn btn-secondary btn-sm mt-3" type="button" id="addRow">
                                    <i class="fas mr-2 fa-plus">
                                        Add Row</i>
                                </button>

                                <button class="btn btn-danger btn-sm mt-3" type="button" id="deleteRow">
                                    <i class="fas fa-trash">
                                    </i>
                                </button>
                            </div>
                        </div>
                        <div class="col-12">
                            <input type="submit" value="Save" class="btn btn-success float-right mb-3 mr-2">
                        </div>
                    </div>
                </div>


                </form>


            </div>
        </div>
    </section>

    <script>
        $('#addRow').click(function () {
            var count=$('#countProduct').val();
            ++count;
            var html='<tr id="deleteProduct'+count+'">'+
                '<td>'+count+'</td>'+

                '<td>'+
                '<select name="productCode[]" class="form-control" >'+
                '<?php if(!$products->isempty()){
                    foreach($products as $product){ ?>'+
                '<option value="{{$product->product_code}}">{{$product->product_code}}</option>'+
                '<?php }
                    } ?>'+
                '</select>'+
                '</td>'+

                '<td>'+
                '<select name="uom[]" class="form-control">'+
                '<?php if(!$units->isempty()){
                    foreach($units as $unit){ ?>'+
                '<option value="{{$unit->id}}">{{$unit->name}}</option>'+
                '<?php }
                    } ?>'+
                '</select>'+
                '</td>'+
                '<td>'+
                '<input type="text" name="qty[]" class="form-control" id="" placeholder="">'+
                '</td>'+
                '<td>'+
                '<textarea rows="1" type="text" name="description[]" class="form-control"></textarea>'+
                '</td>'+
                '</tr>';

            $('#countProduct').val(count);
            $('#appendProduct').append(html);
        });

        $('#deleteRow').click(function () {
            var count = $('#countProduct').val();
            if(count<2){
                return false;
            }
            else{
                $('#deleteProduct'+count).remove();
                --count;
                $('#countProduct').val(count);
            }
        });

        $('#customer_id').on("change", function(e) {
           var  customer_id=$(this).val();
           $('#customer_id_show').val(customer_id);
        });

    </script>
@endsection
