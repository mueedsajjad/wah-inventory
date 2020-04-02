
@extends('layouts.master')

@section('content')

    <section class="content pt-5">
        <div class="row">
            <div class="col-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">Assign Stores</h3>
                    </div>

                    <div class="card-body dash-menu">
                        <a class="btn btn-app bg-danger" href="{{url('store/assignStore/assignStoreToFactoryInMadeProducts')}}">
                            <i class="fas fa-project-diagram"></i>Factory In Made Products
                        </a>
                        <a class="btn btn-app bg-danger" href="{{url('store/assignStore/assignStoreToFactoryInMadeComponents')}}">
                            <i class="fas fa-project-diagram"></i>Factory In Made Components
                        </a>
                        <a class="btn btn-app bg-danger" href="{{url('store/assignStore/assignStoreToFactoryInwardMaterial')}}">
                            <i class="fas fa-project-diagram"></i>Factory Inward Material
                        </a>
                        <a class="btn btn-app bg-danger" href="{{url('store/assignStore/assignStoreToFactoryInwardComponents')}}">
                            <i class="fas fa-project-diagram"></i>Factory Inward Components
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
