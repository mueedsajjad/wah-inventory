@extends('layouts.master')


@section('content')
    <section class="content pt-3">
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
                        <h3 class="card-title">Current Stock</h3>
                        <a href="{{url('store/allStores')}}" class="btn btn-secondary btn-sm float-right">Back</a>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="storeTable" class="table table-bordered table-striped">
                            <thead>
                            <tr class="bg-dark">
                                <th>Sr</th>
                                <th>Item Name</th>
                                <th>Quantity</th>
                                <th>Store</th>
                                <th>Last Updated</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $n=0; @endphp
                            @foreach($storeStock as $item)
                                @php $n++; @endphp
                                <tr>
                                    <td>{{$n}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->quantity}}</td>
                                    <td>{{$item->store_location}}</td>
                                    <td>{{$item->date_updated}}</td>
                                </tr>
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
    </section>

    <script>
        $( document ).ready(function() {
            $('#storeTable').dataTable();
        });
    </script>
@endsection
