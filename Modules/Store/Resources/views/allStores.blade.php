
@extends('layouts.master')

@section('content')

    <section class="content pt-5">
        <div class="row">
            <div class="col-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">ALL Stores</h3>
                    </div>

                    <div class="card-body dash-menu">
                        <a class="btn btn-app bg-danger" href="{{url('store/allStores/storeMagazine1')}}">
                            <i class="fas fa-store"></i>Magazine 1
                        </a>
                        <a class="btn btn-app bg-danger" href="{{url('store/allStores/storeMagazine2')}}">
                            <i class="fas fa-store"></i>Magazine 2
                        </a>
                        <a class="btn btn-app bg-danger" href="{{url('store/allStores/storeFinishedGoods1')}}">
                            <i class="fas fa-store"></i>Finished Goods 1
                        </a>
                        <a class="btn btn-app bg-danger" href="{{url('store/allStores/storeFinishedGoods2')}}">
                            <i class="fas fa-store"></i>Finished Goods 2
                        </a>
                        <a class="btn btn-app bg-danger" href="{{url('store/allStores/storeComponents')}}">
                            <i class="fas fa-store"></i>Components
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
