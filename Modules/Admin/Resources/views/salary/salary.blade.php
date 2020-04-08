@extends('layouts.master')

@section('content')

    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">


                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Salary</h3>
                            <a href="{{url('admin/salaryEmployee')}}"  class="btn btn-primary float-right" >
                                Salary
                            </a>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>No#</th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th>Salary</th>
                                    <th>Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $n=0; @endphp
                               @foreach($salary as $salaries)
                               @php $n++; @endphp
                                <tr>
                                    <td>{{$n}}</td>
                                    <td>{{$salaries->user_id}}</td>
                                    <td>{{$salaries->name}}</td>
                                    <td>{{$salaries->designation}}</td>
                                    <td>{{$salaries->salary}}</td>
                                    <td>{{$salaries->salaryDate}}</td>
                                </tr>
                                @endforeach

                                </tbody>
                                <!-- <tfoot>
                                 <tr>
                                   <th>Rendering engine</th>
                                   <th>Browser</th>
                                   <th>Platform(s)</th>
                                   <th>Engine version</th>
                                   <th>CSS grade</th>
                                 </tr>
                                 </tfoot>-->
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
