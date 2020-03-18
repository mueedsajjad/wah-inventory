
@extends('layouts.master')

@section('content')

    <section class="content pt-3">
        <div class="row">
            <div class="col-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">Assign Stores</h3>
                    </div>

                    <div class="card-body dash-menu">
                        <a class="btn btn-app bg-danger" href="{{url('store/assignStoreToFactoryInMadeProducts')}}">
                            <i class="fas fa-project-diagram"></i>Factory In Made Products
                        </a>
                        <a class="btn btn-app bg-danger" href="{{url('store/assignStoreToFactoryInMadeComponents')}}">
                            <i class="fas fa-project-diagram"></i>Factory In Made Components
                        </a>
                        <a class="btn btn-app bg-danger" href="{{url('store/assignStoreToFactoryInwardMaterial')}}">
                            <i class="fas fa-project-diagram"></i>Factory Inward Material
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
