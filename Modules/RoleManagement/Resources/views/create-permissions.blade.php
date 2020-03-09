@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row mr-0" >
            <div class="col-md-12 mt-2" >
                <div  class="card p-3">
                    <div class="d-flex justify-content-between">
                        <div class=""><span class="display-4">Permissions</span><sub class="ml-2" style="color: gray;">Create Permissions</sub></div>
                        <div><a href="{{url('/dashboard')}}" class="btn bg-cyan my-3 mx-3">Back</a></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-10">
                            <div class="mt-5">
                                <form action=" {{route('showpermission')}} " method="POST" class="form-group">
                                    @csrf
                                    <table>
                                        <thead>
                                        <tr>
                                            <th><label>Name<span style="color:red;">*</span></label></th>
                                            <th><input class="ml-1" type="text" name="name" required></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td colspan="1"></td>
                                            <td>
                                                <button type="submit" class="btn btn-primary btn-sm" ><i class="fa fa-save" style="color: white;"></i>&nbsp;Save</button>
                                            </td>

                                        </tr>
                                        </tbody>
                                    </table>
                                </form>

                            </div>
                        </div>
                        <div class="col-lg-5 col-10 mx-auto">
                            <div class="mt-5">
                                <table class="table  table-striped2">
                                    <thead>
                                    <tr>
                                        <th scope="col"><span class="ml-2">Permission Name</span></th>
                                        <th scope="col"></th>
                                    </tr>

                                    </thead>
                                    <tbody>
                                    @foreach($permission as $data)
                                        <tr>
                                            <td>{{$data->name}} </td>
                                            <td  class="d-flex justify-content-end">
{{--                                                <a href="{{url('/check/'.$data->id)}}"  class="btn btn-primary btn-sm"> Permissions</a>--}}
                                                <a href=" {{url('/del-permit/'.$data->id)}} " class="ml-1 btn btn-danger btn-sm">Delete</a>

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
@endsection


