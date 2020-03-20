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
                        <h3 class="card-title">Components Current Stock</h3>
                        <a href="{{url('store/allStores')}}" class="btn btn-secondary btn-sm float-right">Back</a>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="storeTable" class="table table-bordered table-striped">
                            <thead>
                            <tr class="bg-dark">
                                <th>Sr</th>
                                <th>Component Name</th>
                                <th>Quantity</th>
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
                                    <td>{{$item->date_updated}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Components History</h3>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="storeTable" class="table table-bordered table-striped">
                            <thead>
                            <tr class="bg-dark">
                                <th>Sr</th>
                                <th>Manufacturing Order</th>
                                <th>Component Name</th>
                                <th>Quantity</th>
                                <th>Stored Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($components))
                                @php $n=0; @endphp
                                @foreach($components as $item)
                                    @php $n++; @endphp
                                    <tr>
                                        <td>{{$n}}</td>
                                        <td>{{$item->manufacturing_order}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->quantity}}</td>
                                        <td>{{$item->stored_date}}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" class="text-center">No Data</td>
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

    <script>
        $( document ).ready(function() {
            $('#storeTable').dataTable();
        });
    </script>
@endsection
