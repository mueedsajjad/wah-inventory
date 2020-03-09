@extends('layouts.master')

@section('content')


    <?php error_reporting(0);?>

    <div class="container-fluid">
        <div class="row mr-0" >
            <div class="col-md-12 mt-2" >
                <div class="card p-3">
                    @if (session('status'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="d-flex justify-content-between">
                        <div class=""><span class="display-4">Assign Permissions</span><sub class="ml-2" style="color: gray;">Assign Permissions-To-Role</sub></div>
                        <div><a href="{{url('/dashboard')}}" class="btn bg-cyan my-3 mx-3">Back</a></div>
                    </div>


                    <div class="row form-group mx-5" >
                        <div class=" mt-3">
                            <form action="{{url('/getPermission')}}" method="get">
                                <label for="role">Select User</label>
                                <select class="ml-1 form-control role"  name="role"  onchange="this.form.submit()" >
                                    <option value="" style="color: grey">Select Role</option>
                                    @foreach($role as $data)
                                        <option value="{{$data->id}}">{{$data->name}}</option>
                                    @endforeach
                                </select>
                            </form>
                        </div>


                    <div class="mt-5 mx-5">
                        <div class="">
                            <h3>{{"Role: ".$roles->name}}</h3>
                        </div>
                    </div>
                    </div>

    @if($roles->name)
                    <div class="mx-5 my-5">
                        <h4>Permissions</h4>
                        <form action="{{url('/assign-permission')}}" method="POST">
                            @csrf

                            <input type="hidden" name="role" value="{{$role_id}}">
                            <div class="row">
                                @foreach($permissions as $data)
                                    <div class="col-lg-3 col-10 col-md-4">
                                        <div class="custom-control custom-checkbox mb-3">
                                            <input type="checkbox" class="custom-control-input" value="{{$data->id}}" id="{{$data->id}}" name="permissions[]" >
                                            <label class="custom-control-label" for="{{$data->id}}">{{$data->name}}</label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="mt-3">

                                <button type="submit"  class="btn btn-primary">Permissions</button>

                            </div>

                        </form>
                    </div>


                    <hr style="color: green;">


                        <div class="mx-5 my-5">
                            <h4>Checked Permissions</h4>
                            <form action="{{url('/unchecked')}}" method="POST">

                                @csrf
                                <input type="hidden" name="role" value="{{$role_id}}">
                                <div class="row">
                                    @foreach($assignPermission as $data)
                                        <div class="col-lg-3 col-10 col-md-4">
                                            <div class="custom-control custom-checkbox mb-3">
                                                <input type="checkbox" class="custom-control-input" value="{{$data->id}}" id="{{$data->id}}" name="permissions[]" checked>
                                                <label class="custom-control-label" for="{{$data->id}}">{{$data->name}}</label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="mt-3">

                                    <button type="submit"  class="btn btn-primary">Unchecked</button>

                                </div>
                            </form>
                        </div>
@endif
                      </div>

                   </div>
                </div>
            </div>




@endsection


