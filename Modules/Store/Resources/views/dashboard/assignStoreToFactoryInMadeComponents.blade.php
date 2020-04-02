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
                        <h3 class="card-title">Assign Stores Factory In Made Components</h3>
                        <a href="{{url('store/assignStore')}}" class="btn btn-secondary btn-sm float-right">Back</a>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr class="bg-dark">
                                <th>Sr</th>
                                <th>Order #</th>
                                <th>Component</th>
                                <th>Quantity</th>
                                <th>Production Deadline</th>
                                <th>Total Price</th>
                                <th>Type</th>
                                <th width="20%">Store</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $n=0; @endphp
                            @if(!$components->isempty())
                                @foreach($components as $component)
                                    @php $n++; @endphp
                                    <tr>
                                        <td>{{$n}}</td>
                                        <td>{{$component->manufacturing_order}}</td>
                                        <td>{{$component->component_name}}</td>
                                        <td>{{$component->quantity}}</td>
                                        <td>{{$component->production_deadline}}</td>
                                        <td>{{$component->total_cost}}</td>
                                        <td>{{$component->type}}</td>
                                        <td>
                                            @if($component->status==4)
                                                <form action="{{url('store/submitFactoryInMadeComponentsToStore')}}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="component_id" value="{{$component->id}}">
                                                    <input type="hidden" name="manufacturing_order" value="{{$component->manufacturing_order}}">
                                                    <input type="hidden" name="name" value="{{$component->component_name}}">
                                                    <input type="hidden" name="quantity" value="{{$component->quantity}}">
                                                    <input type="hidden" name="total_cost" value="{{$component->total_cost}}">

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
