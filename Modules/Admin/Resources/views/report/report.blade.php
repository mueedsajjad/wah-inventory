@extends('layouts.master')


@section('content')
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title">HR Reports</h3>
                        </div>
                        <div class="card-body dash-menu">
                            <a class="btn btn-app bg-danger" href="{{url('admin/employeeReport')}}">
                                <i class="fas fa-edit"></i> List Employees
                            </a>
                            <a class="btn btn-app bg-danger" href="{{url('admin/attedanceReport')}}">
                                <i class="fas fa-edit"></i> Attendance
                            </a>
                            <a class="btn btn-app bg-danger" href="#">
                                <i class="fas fa-edit"></i> Leaves
                            </a>
                            <a class="btn btn-app bg-danger" href="#">
                                <i class="fas fa-edit"></i> Salaries
                            </a>
                            <a class="btn btn-app bg-danger" href="#">
                                <i class="fas fa-edit"></i> Advance
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

