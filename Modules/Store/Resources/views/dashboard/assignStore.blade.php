
@extends('layouts.master')

@section('content')

    <div class="col-md-12 mt-5">
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Dashboard</h3>
            </div>

            <div class="card-body dash-menu">
                <a class="btn btn-app bg-danger" href="{{url('store/productionProduct')}}">
                    <i class="fas fa-edit"></i> Products
                </a>
            </div>
        </div>
    </div>


@endsection
