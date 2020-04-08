@extends('layouts.master')

@section('content')

    <section class="content pt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title">Gate Reports</h3>
                        </div>

                        <div class="card-body dash-menu">
                            <a class="btn btn-app bg-danger" href="{{url('gate/inward')}}">
                                <i class="fas fa-edit"></i> Inward Report
                            </a>
                            <a class="btn btn-app bg-danger" href="{{url('gate/outward_report')}}">
                                <i class="fas fa-edit"></i> Outward Report
                            </a>
                            <a class="btn btn-app bg-danger" href="#">
                                <i class="fas fa-edit"></i> Attendance Report
                            </a>
                            <a class="btn btn-app bg-danger" href="#">
                                <i class="fas fa-edit"></i> Security Report
                            </a>
                            <a class="btn btn-app bg-danger" href="#">
                                <i class="fas fa-edit"></i> Vehicle Report
                            </a>
                        </div>
                    </div>
                </div>


@yield('data')





            </div>
        </div>
    </section>
@endsection
