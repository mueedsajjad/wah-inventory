@extends('layouts.master')

@section('content')

    <section class="content pt-3">
        <div class="container-fluid">

            @if(session()->has('save'))
                <div class="alert alert-success" role="alert">
                    <strong>Success</strong>{{session()->get('save')}}
                </div>
            @endif

                @if(session()->has('exists'))
                    <div class="alert alert-danger" role="alert">
                        <strong>Fail</strong> {{session()->get('exists')}}
                    </div>
                @endif

            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Employees</h3>
                            <button type="button" class="btn btn-primary float-right ml-3" data-toggle="modal" data-target="#modal-lg3">
                                Add Leave types
                            </button>
                            <button type="button" class="btn btn-primary float-right ml-3" data-toggle="modal" data-target="#modal-lg2">
                                Add Departments
                            </button>
                            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-employee">
                                Add Employee
                            </button>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped" id="pageTable">
                                <thead>
                                <tr>
                                    <th>#No</th>
                                    <th>Name</th>
                                    <th>Department</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                                @php $n=0; @endphp
                           @foreach($alluser as $user)
                              @php $n++; @endphp
                                <tr>
                                    <td>{{$n}}</td>
                                    <td>{{$user->username}}</td>
                                    <td>{{$user->department_name}}</td>
{{--                                    <td> </td>--}}
{{--                                    <td>--}}
{{--                                        <a href="#" class="btn btn-success ml-3">Active</a>--}}
{{--                                    </td>--}}
                                    <td>
                                        <a href="{{url('admin/employeeDetail/'.$user->user_id)}}" class="btn btn-primary ml-1">Detail</a>
{{--                                    <a href="#" class="btn btn-danger ml-1">Delete</a>--}}
                                    </td>
                                </tr>
                         @endforeach
                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>

            </div>

            <div class="modal fade" id="modal-employee">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add Employee</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-body">
                                        <form action="{{url('admin/employeeStore')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                            <div class="row justify-content-around">

                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Employee Name</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="name" class="form-control"  placeholder="Employee Name">
                                                        </div>
                                                    </div>


                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Department</label>
                                                        <div class="col-sm-8">
                                                            <select class="form-control " name="department_id">
                                                                <option selected="selected" disabled>Select Department</option>
                                                                @foreach($department as $departments)
                                                                   <option value="{{$departments->id}}">{{$departments->name}} </option>
                                                                @endforeach
{{--                                                                <option>Production</option>--}}
{{--                                                                <option>Officer</option>--}}
                                                            </select>
                                                        </div>
                                                    </div>


                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Designation</label>
                                                        <div class="col-sm-8">
                                                            <select class="form-control " name="designation_id">
                                                                <option selected="selected" disabled >Select Designation</option>
                                                                @foreach($role as $roles)
                                                                <option value="{{$roles->id}}">{{$roles->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Gender</label>
                                                        <div class="col-sm-8">
                                                            <select class="form-control " name="gender_id">
                                                                <option selected="selected" disabled >Select Gender</option>
                                                                <option value="1">Male</option>
                                                                <option value="2">Female</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Mobile</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="mobile" class="form-control"  placeholder="0333 1234567">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Email</label>
                                                        <div class="col-sm-8">
                                                            <input type="email" name="email" class="form-control" placeholder="info@mmlogix.com">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Password</label>
                                                        <div class="col-sm-8">
                                                            <input type="password" name="password" class="form-control" >
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">State</label>
                                                        <div class="col-sm-8">
                                                            <div class="form-group">

                                                                <select class="form-control " name="state_id">
                                                                    <option selected="selected" disabled>Select State</option>
                                                                    @foreach($state as $states)
                                                                    <option value="{{$states->id}}">{{$states->name}}</option>
                                                                    @endforeach
                                                                </select>

{{--                                                                <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>--}}
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">City</label>
                                                        <div class="col-sm-8">
                                                            <div class="form-group">
                                                                <select class="form-control " name="city_id">
                                                                    <option selected="selected" disabled>Select City</option>
                                                                    @foreach($city as $cities)
                                                                    <option value="{{$cities->id}}">{{$cities->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>



                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Address line</label>
                                                        <div class="col-sm-8">
                                                            <div class="form-group">
                                                                <input type="text" name="address" class="form-control" placeholder="Enter ...">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Image</label>
                                                        <div class="col-sm-8">
                                                            <div class="form-group">
                                                                <input type="file" name="upload" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label"></label>

                                                        <div class="col-sm-8">
                                                            <button type="submit" class="btn btn-dark">Submit</button>
                                                        </div>

                                                    </div>





                                                </div>
                                            </div>



                                        </form>
                                    </div>



                                </div>

                            </div>
                        </div>
                        <!--
                                    <div class="modal-footer justify-content-between">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                      <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                        -->
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>

            <div class="modal fade" id="modal-lg2">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add Department</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-body">
                                        <form action="{{url('admin/departmentStore')}}" method="post">
                                            @csrf
                                            <div class="row justify-content-around">

                                                <div class="col-md-12">

                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Department Name</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="name" class="form-control"  placeholder="Store">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label"></label>

                                                        <div class="col-sm-8">
                                                            <button type="submit" class="btn btn-dark">Save</button>
                                                        </div>

                                                    </div>





                                                </div>
                                            </div>



                                        </form>
                                    </div>



                                </div>

                            </div>
                        </div>
                        <!--
                                    <div class="modal-footer justify-content-between">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                      <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                        -->
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <div class="modal fade" id="modal-lg3">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add Leave Type</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-body">
                                        <form action="#">


                                            <div class="row justify-content-around">

                                                <div class="col-md-12">

                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Leave Name</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control"  placeholder="Sick">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label"></label>

                                                        <div class="col-sm-8">
                                                            <button type="submit" class="btn btn-dark">Submit</button>
                                                        </div>

                                                    </div>





                                                </div>
                                            </div>



                                        </form>
                                    </div>



                                </div>

                            </div>
                        </div>
                        <!--
                                    <div class="modal-footer justify-content-between">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                      <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                        -->
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        </div>
    </section>
{{--   Nav for Roles   --}}
{{--    <nav class="main-header navbar navbar-expand-md navbar-dark  py-0">--}}
{{--        <div class="container-fluid">--}}
{{--            <a href="dashboard.html" class="navbar-brand">--}}
{{--                <!-- <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"--}}
{{--                      style="opacity: .8">-->--}}
{{--                <span class="brand-text font-weight-normal"><img class=" pr-3" src="./logo.png" alt="logo" > SGA - WAH Industries</span>--}}
{{--            </a>--}}

{{--            <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--                <span class="navbar-toggler-icon"></span>--}}
{{--            </button>--}}

{{--            <div class="collapse navbar-collapse order-3" id="navbarCollapse">--}}
{{--                <!-- Left navbar links -->--}}
{{--                <ul class="navbar-nav">--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="btn m-0 btn-app" href="dashboard.html">--}}
{{--                            <i class="fas fa-chart-line"></i>Dashboard--}}
{{--                        </a>--}}
{{--                    </li>--}}


{{--                    <li class="nav-item dropdown">--}}
{{--                        <a id="dropdownSubMenu1" href="list-employees.html"  class=" dropdown-toggle btn m-0 btn-app"><i class="fas fa-edit"></i>--}}
{{--                            Employees</a>--}}
{{--                        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow ">--}}
{{--                            <li><a href="#" class="dropdown-item">Some action </a></li>--}}
{{--                            <li><a href="#" class="dropdown-item">Some other action</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}

{{--                    <li class="nav-item dropdown">--}}
{{--                        <a id="dropdownSubMenu48" href="attendance.html"  class=" dropdown-toggle btn m-0 btn-app"><i class="fas fa-edit"></i>--}}
{{--                            attendance</a>--}}
{{--                        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow ">--}}
{{--                            <li><a href="#" class="dropdown-item">Some action </a></li>--}}
{{--                            <li><a href="#" class="dropdown-item">Some other action</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}

{{--                    <li class="nav-item dropdown">--}}
{{--                        <a id="dropdownSubMenu2" href="leaves.html"  class=" dropdown-toggle btn m-0 btn-app"><i class="fas fa-edit"></i>--}}
{{--                            Leaves</a>--}}
{{--                        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow ">--}}
{{--                            <li><a href="#" class="dropdown-item">Some action </a></li>--}}
{{--                            <li><a href="#" class="dropdown-item">Some other action</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}

{{--                    <li class="nav-item dropdown">--}}
{{--                        <a id="dropdownSubMenu11" href="salaries.html" class=" dropdown-toggle btn m-0 btn-app"><i class="fas fa-edit"></i>--}}
{{--                            Salaries</a>--}}
{{--                        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow ">--}}
{{--                            <li><a href="#" class="dropdown-item">Add New Product </a></li>--}}
{{--                            <li><a href="#" class="dropdown-item">Product List</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}

{{--                    <li class="nav-item dropdown">--}}
{{--                        <a id="dropdownSubMenu3" href="advance.html"  class=" dropdown-toggle btn m-0 btn-app"><i class="fas fa-edit"></i>--}}
{{--                            Advance</a>--}}
{{--                        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow ">--}}
{{--                            <li><a href="#" class="dropdown-item">Some action </a></li>--}}
{{--                            <li><a href="#" class="dropdown-item">Some other action</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}

{{--                    <li class="nav-item dropdown">--}}
{{--                        <a id="dropdownSubMenu9" href="hr-reports.html" class=" dropdown-toggle btn m-0 btn-app"><i class="fas fa-edit"></i>--}}
{{--                            Reports</a>--}}
{{--                        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow ">--}}
{{--                            <li><a href="#" class="dropdown-item">Add New Product </a></li>--}}
{{--                            <li><a href="#" class="dropdown-item">Product List</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}



{{--                    <li class="nav-item dropdown ml-auto text-right">--}}
{{--                        <a id="dropdownSubMenu13" href="index.html" class=" dropdown-toggle btn m-0 btn-app"><i class="fas fa-sign-out-alt"></i>--}}
{{--                            Logout</a>--}}
{{--                        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow ">--}}
{{--                            <li><a href="#" class="dropdown-item">Add New Product </a></li>--}}
{{--                            <li><a href="#" class="dropdown-item">Product List</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </div>--}}

{{--            <!-- Right navbar links -->--}}
{{--        </div>--}}
{{--    </nav>--}}
@endsection
