
@extends('layouts.master')

@section('content')

    <section class="content pt-3">
        <div class="row">
            <div class="col-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">ALL Stores</h3>
                    </div>

                    <div class="card-body dash-menu">
                        <a class="btn btn-app bg-danger" href="{{url('store/storeMagazine1')}}">
                            <i class="fas fa-store"></i>Magazine 1
                        </a>
                        <a class="btn btn-app bg-danger" href="{{url('store/storeMagazine2')}}">
                            <i class="fas fa-store"></i>Magazine 2
                        </a>
                        <a class="btn btn-app bg-danger" href="{{url('store/storeFinishedGoods1')}}">
                            <i class="fas fa-store"></i>Finished Goods 1
                        </a>
                        <a class="btn btn-app bg-danger" href="{{url('store/storeFinishedGoods2')}}">
                            <i class="fas fa-store"></i>Finished Goods 2
                        </a>
                        <a class="btn btn-app bg-danger" href="{{url('store/storeComponents')}}">
                            <i class="fas fa-store"></i>Components
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
