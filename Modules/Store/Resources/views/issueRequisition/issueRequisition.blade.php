
@extends('layouts.master')

@section('content')

    <section class="content pt-5">
        <div class="row">
            <div class="col-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">Requisitions</h3>
                    </div>

                    <div class="card-body dash-menu">
                        <a class="btn btn-app bg-danger" href="{{url('store/issueRequisition/componentRequisition')}}">
                            <i class="fas fa-search-minus"></i>Component Requisitions
                        </a>
                        <a class="btn btn-app bg-danger" href="{{url('store/issueRequisition/materialRequisition')}}">
                            <i class="fas fa-search-minus"></i>Material Requisitions
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
