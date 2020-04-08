@extends('layouts.master')


@section('content')
    <section class="content pt-5">
        <div class="row">
            <div class="col-12">
                <!-- /.card -->
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

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Assign Stores Factory In Made Products</h3>
                        <a href="{{url('store/assignStore')}}" class="btn btn-secondary btn-sm float-right">Back</a>
                    </div>
                    <div class="card-body table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr class="bg-dark">
                            <th>Sr</th>
                            <th>Order #</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Production Deadline</th>
                            <th>Total Price</th>
                            <th>Type</th>
                            <th width="20%">Store</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $n=0; @endphp
                        @if(!$products->isempty())
                        @foreach($products as $product)
                            @php $n++; @endphp
                            <tr>
                                <td>{{$n}}</td>
                                <td>{{$product->manufacturing_order}}</td>
                                <td>{{$product->product}}</td>
                                <td>{{$product->quantity}}</td>
                                <td>{{$product->production_deadline}}</td>
                                <td>{{$product->total_cost}}</td>
                                <td>{{$product->type}}</td>
                                <td>
                                    @if($product->status==5)
                                    <form action="{{url('store/submitFactoryInMadeProductsToStore')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                        <input type="hidden" name="manufacturing_order" value="{{$product->manufacturing_order}}">
                                        <input type="hidden" name="name" value="{{$product->product}}">
                                        <input type="hidden" name="quantity" value="{{$product->quantity}}">
                                        <input type="hidden" name="total_cost" value="{{$product->total_cost}}">

                                        <div class="row">
                                            <select class="form-control" style="width: 70%;"  name="store_location">
                                                <option disabled selected>Select</option>
                                                @foreach($stores as $store)
                                                <option value="{{$store->name}}">{{$store->name}}</option>
                                                @endforeach
                                            </select>
                                            <button type="submit" class="btn btn-sm btn-primary ml-1">Submit</button>
                                        </div>
                                    </form>
                                    @else
                                        <button type="button" class="btn btn-sm btn-success">Store Assigned</button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        @else
                            <tr>
                                <td colspan="8" class="text-center">No Data.</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </section>
@endsection
