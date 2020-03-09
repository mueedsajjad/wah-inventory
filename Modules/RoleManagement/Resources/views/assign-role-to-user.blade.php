@extends('layouts.master')

@section('content')


    <div class="container-fluid">
        <div class="row mr-0" >
            <div class="col-md-12 mt-2" >
                <div class="card p-3">
                    <div class="d-flex justify-content-between">
                        <div class=""><span class="display-4">Assign Role</span><sub class="ml-2" style="color: gray;">Assign-Role-To-Users</sub></div>
                        <div><a href="{{url('/dashboard')}}" class="btn bg-cyan my-3 mx-3">Back</a></div>
                    </div>
                                    <form action="{{url('/assign-role')}}" method="POST" class="form-group">
                                        @csrf


                                    <div class="mt-5 col-lg-3 col-md-3 col-10">
                                            <label>Users<span style="color:red;">*</span></label>
                                            <select class="form-control"  name="user" >
                                                <option class="" style="color: grey">Select User</option>
                                                @foreach($user as $data)
                                                    <option value="{{$data->id}}">{{$data->name}}</option>
                                                @endforeach
                                            </select>
                                            <label>Role<span style="color:red;">*</span></label>
                                            <select class="form-control"  name="role" >
                                                    <option class="" style="color: grey">Select Role</option>
                                                @foreach($role as $data)
                                                    <option value="{{$data->id}}">{{$data->name}}</option>
                                                @endforeach
                                            </select>
                                    <div class="mt-3">
                                        <button type="submit" class="btn btn-primary" ><i class="fa fa-save" ></i>&nbsp;Save</button>

                                        <a href="{{URL::previous()}}" class="btn btn-danger">Cancel</a>
                                    </div>
                                    </div>
                                   </form>
                     </div>
                </div>
            </div>
    </div>


@endsection


