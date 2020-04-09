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
                            <!-- <a class="btn btn-app bg-danger" href="#">
                                <i class="fas fa-edit"></i> Leaves
                            </a>
                            <a class="btn btn-app bg-danger" href="#">
                                <i class="fas fa-edit"></i> Salaries
                            </a>
                            <a class="btn btn-app bg-danger" href="#">
                                <i class="fas fa-edit"></i> Advance
                            </a> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped" id="pageTable">
                    <thead>
                    <tr>
                        <th>#No</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Designation</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Address</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $n=0; @endphp
                    @foreach($users as $user)
                        @php $n++; @endphp
                        <tr>
                            <td>{{$n}}</td>
                            <td>{{$user->username}}</td>
                            <td>{{$user->department_name}}</td>
                            <td>{{$user->role}} </td>
                            <td>{{$user->mobile}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->address}},{{$user->city}},{{$user->state}}</td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
        </div>

    </section>
@endsection
