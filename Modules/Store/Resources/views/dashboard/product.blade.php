@extends('layouts.master')


@section('content')

    <div class="row mt-3">
        <div class="col-12"><a href="{{url('store/dashboard')}}" class="btn btn-md btn-primary float-right mr-3">Back </a></div>
    </div>

    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-body">
                    <table id="example1" class="table table-bordered">
                        <thead>

                        <tr>
                            <th>Sr</th>
                            <th>Order #</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Production Deadline</th>
                            <th>Total Price</th>
                            <th>Type</th>
                            <th>Store</th>
                            <th>Action</th>
                        </tr>

                        </thead>
                        <tbody>

                        @php $n=0; @endphp
                        @foreach($products as $product)

                            @if($product->status==4)
                                @php $n++; @endphp
                                <tr>
                                    <td>{{$n}}</td>
                                    <td>{{$product->manufacturing_order}}</td>
                                    <td>{{$product->product}}</td>
                                    <td>{{$product->quantity}}</td>
                                    <td>{{$product->production_deadline}}</td>
                                    <td>{{$product->total_cost}}</td>
                                    <!--
                                                                                   <td class="bg-success text-center"><a href="#">Available</a></td>-->
                                    <form action="{{url('store/processStatus')}}" method="post">
                                        @csrf
                                        <td class="bg-light text-center">
                                            <div class="form-group m-0">
                                                <input type="hidden" name="id" value="{{$product->id}}">
                                                @if($product->store_id==0)
                                                 Product
                                                    @else
                                                    Componets
                                                @endif
                                            </div>
                                        </td>

                                        <td>
                                            <div class="form-group m-0">
                                                <select class="form-control"  name="store_id">
                                                    <option disabled selected>Select</option>
                                                    @foreach($stores as $store)
                                                    <option value="{{$store->id}}">{{$store->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </td>
                                            <td><input type="submit" value="Submit" class="btn bnt-md btn-primary ml-1"></td>
                                    </form>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>

                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
@endsection
