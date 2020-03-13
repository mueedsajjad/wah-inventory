@extends('layouts.master')

@section('content')
    <section class="content pt-3">
        <div class="row">
            <div class="col-12">
                <!-- /.card -->
                @if(!empty($errors->first()))
                    <div class="alert alert-danger"  style="text-align: center">
                        <span>{{ $errors->first() }}</span>
                    </div>
                @endif
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">New Builty Arrivals</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body dash-menu">
                        @if(!$stores->isempty())
                            @foreach($stores as $store)
                            <a class="btn btn-app bg-danger" href="{{url('store/storewiseNewBuiltyArrival/'.$store->id)}}">
                                <i class="fas fa-store"></i> {{$store->name}}
                            </a>
                            @endforeach
                        @endif
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>


@endsection
