
@extends('layouts.master')

@section('content')

    <section class="content pt-5">
        <div class="row">
            <div class="col-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">Vehicle Management</h3>
                    </div>

                    <div class="card-body dash-menu">
                        <a class="btn btn-app bg-danger" href="{{url('gate/vehicleManagement/outVehicle')}}">
                            <i class="fas fa-truck"></i>Out Vehicle
                        </a>
                        <a class="btn btn-app bg-danger" href="{{url('gate/vehicleManagement/inVehicle')}}">
                            <i class="fas fa-truck"></i>In Vehicle
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
