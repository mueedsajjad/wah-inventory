@extends('layouts.master')

@section('content')

    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                @if(session()->has('save'))
            <div class="alert alert-success text-center" role="alert">
                <strong>Success</strong> {{session()->get('save')}}
            </div>
        @endif
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Salary</h3>
                            <a href="{{url('admin/salaryEmployee')}}"  class="btn btn-primary float-right" >
                               Pay Salary
                            </a>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="pageTable" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>No#</th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Designation</th>
                                
                                    <th>Salary Status</th>
                                   
                                </tr>
                                </thead>
                                <tbody>
                                @php $n=0; @endphp
                               
                               @foreach($employees as $allUser)
                               @php $n++; @endphp
                                <tr>
                                    <td>{{$n}}</td>
                                    <td>{{$allUser['user_id']}}</td>
                                    <td>{{$allUser['username']}}</td>
                                    <td>{{$allUser['designation']}}</td>
                                    <td><button class="btn btn-sm btn-danger ml-1">Unpaid</button></td>
                                   
                                </tr>
                                @endforeach
                                </tbody>
                               
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>

            </div>
        </div>
    </section>
   
@endsection
