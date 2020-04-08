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

                @if(session()->has('delete'))
                    <div class="alert alert-danger" role="alert">
                        <strong>Fail</strong> {{session()->get('delete')}}
                    </div>
                @endif

                <div class="container-fluid">
                    <div class="row mt-5">
                        <div class="col-12 text-right">
                            <a class="btn btn-primary btn-md" href="{{url('admin/employee')}}">
                                Back
                            </a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                        @foreach($user as $users)
                            <!-- Profile Image -->
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle"
                                             src="{{asset('public/upload/'.$users->upload)}}"
                                             alt="User profile picture">
                                    </div>

                                    <h3 class="profile-username text-center">{{$users->username}}</h3>

                                    <p class="text-muted text-center">{{$users->designation}}</p>

                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <b>Department</b> <a href="#" class="float-right">{{$users->department_name}}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Role</b> <a href="#" class="float-right">{{$users->role}}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Salary</b> <a href="#" class="float-right">{{$users->salary}}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>createdDate</b> <a href="#" class="float-right">{{$users->createdDate}}</a>
                                        </li>
                                        
                                        <li class="list-group-item">
                                            <b>joinDate</b> <a href="#" class="float-right">{{$users->joinDate}}</a>
                                        </li>

                                        <li class="list-group-item">
                                            <b>Mobile</b> <a href="#" class="float-right">{{$users->mobile}}</a>
                                        </li>

                                        <li class="list-group-item">
                                            <b>Address</b> <a href="#" class="float-right">{{$users->address}},{{$users->city}},{{$users->state}}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Operations</b>

                                            <a class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#modal-employee" href="#">Edit</a>
                                            <a class="btn btn-danger btn-sm float-right mr-1" href="{{url('admin/employeeDelete/'.$users->id)}}">Delete</a>
                                        </li>

                                    </ul>


                                </div>
                                <!-- /.card-body -->
                            </div>
                            @endforeach
                            </div>

                            </div>
                </div>


            <div class="modal fade" id="modal-employee">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Employee</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-body">
                                        <form action="{{url('admin/employeeEdit')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id" class="form-control" value="{{$users->id}}">
                                            <input type="hidden" name="user_id" class="form-control" value="{{$users->user_id}}">
                                            <div class="row justify-content-around">

                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Employee Name</label>
                                                        <div class="col-sm-8">
                                                            @foreach($user as $users)
                                                            <input type="text" name="name" class="form-control" value="{{$users->username}}"  required>
                                                            @endforeach
                                                        </div>
                                                    </div>


                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Department</label>
                                                        <div class="col-sm-8">
                                                            <select class="form-control " name="department_id">

                                                                @foreach($user as $users)
                                                                    <option value="{{$users->department_id}}">{{$users->department_name}}</option>
                                                                @endforeach

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
                                                            @foreach($user as $users)
                                                            <input type="text" name="designation" class="form-control"  value="{{$users->designation}}" required>
                                                                @endforeach
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Role</label>
                                                        <div class="col-sm-8">
                                                            <select class="form-control " name="designation_id">
                                                                @foreach($user as $users)
                                                                    <option value="{{$users->role_id}}">{{$users->role}}</option>
                                                                @endforeach

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
                                                                @foreach($user as $users)
                                                                    @if($users->gender_id==1)
                                                                    <option value="{{$users->gender_id}}">Male</option>
                                                                        @else
                                                                        <option value="{{$users->gender_id}}">Female</option>
                                                                       @endif
                                                                @endforeach

                                                                <option value="1">Male</option>
                                                                <option value="2">Female</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Mobile</label>
                                                        <div class="col-sm-8">
                                                            @foreach($user as $users)
                                                            <input type="text" name="mobile" class="form-control"  value="{{$users->mobile}}" required>
                                                                @endforeach
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Email</label>
                                                        <div class="col-sm-8">
                                                            @foreach($user as $users)
                                                            <input type="email" name="email" class="form-control"  value="{{$users->email}}" required>
                                                            @endforeach
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
                                                                    @foreach($user as $users)
                                                                        <option value="{{$users->state_id}}">{{$users->state}}</option>
                                                                    @endforeach

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
                                                                    @foreach($user as $users)
                                                                        <option value="{{$users->city_id}}">{{$users->city}}</option>
                                                                    @endforeach

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
                                                                @foreach($user as $users)
                                                                <input type="text" name="address" class="form-control" value="{{$users->address}}" required>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Salary</label>
                                                        <div class="col-sm-8">
                                                            <div class="form-group">
                                                                @foreach($user as $users)
                                                                <input type="text" name="salary" class="form-control" value="{{$users->salary}}" required>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Created Date</label>
                                                        <div class="col-sm-8">
                                                            <div class="form-group">
                                                                @foreach($user as $users)
                                                                <input type="date" name="createdDate" class="form-control" value="{{$users->createdDate}}" required>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Join Date</label>
                                                        <div class="col-sm-8">
                                                            <div class="form-group">
                                                                @foreach($user as $users)
                                                                <input type="date" name="joinDate" class="form-control" value="{{$users->joinDate}}" required>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Update Image</label>
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
                                        <form action="#">


                                            <div class="row justify-content-around">

                                                <div class="col-md-12">

                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Department Name</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control"  placeholder="Store">
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

@endsection
