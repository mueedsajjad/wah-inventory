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
                        <h3 class="card-title">Magazine 1</h3>
                        <a href="{{url('store/allStores')}}" class="btn btn-secondary btn-sm float-right">Back</a>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr class="bg-dark">
                                <th>Sr</th>
                                <th>Material Name</th>
                                <th>Unit of Measurement</th>
                                <th>Total Quantity</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $n=0; @endphp
                            @if(count($storeMagazine1))
                                @foreach($storeMagazine1 as $magazine1 => $array)
                                    @php $n++; @endphp
                                    <tr>
                                        <td>{{$n}}</td>
                                        @foreach ($array as $item => $val)
                                            <td>{{$val}}</td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4" class="text-center">No Data.</td>
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
