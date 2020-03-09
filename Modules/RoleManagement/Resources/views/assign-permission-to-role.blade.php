@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row mr-0" >
            <div class="col-md-12 mt-2" >
                <div class="card p-3">
                    <div class="d-flex justify-content-between">
                        <div class=""><span class="display-4">Assign Permissions</span><sub class="ml-2" style="color: gray;">Assign Permissions-To-Role</sub></div>
                        <div><a href="{{url('/dashboard')}}" class="btn bg-cyan my-3 mx-3">Back</a></div>
                    </div>
                    <div class="row">
                        <div class="col-12">

                            <div class="mt-3 form-group" >
                                    <form action=" {{url('/assign-permission')}} " method="POST" >
                                        @csrf
                                        <table class="table-striped ml-5" style="">
                                            <tr>
                                                <th ><label class="ml-2">Roles<span style="color:red;">*</span></label></th>
                                                <th colspan="2">
                                                    <select class="ml-1 form-control"  name="role" >
                                                        @foreach($role as $data)
                                                            <option value="{{$data->id}}">{{$data->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </th>
                                            </tr>
                                            @foreach($permission as $data)
                                                <tr>
                                                    <td scope="col"> {{$data->name}} </td>
                                                    <td><input class="ml-2" type="checkbox" name="permissions[]" value="{{$data->id}}"> </td>
                                                </tr>
                                                @endforeach

                                            <tr>
                                                <td colspan="4"><button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save" ></i>&nbsp;Save</button>

                                                </td>
                                            </tr>
                                        </table>
                                    </form>
                            </div>
                        </div>
                    </div>


{{--                    <div class="col-lg-5 col-10 mx-auto">--}}
{{--                        <div class="mt-5">--}}
{{--                            <table class="table  table-striped2">--}}
{{--                                <thead>--}}
{{--                                <tr>--}}
{{--                                    <th scope="col"><span class="ml-2">Role Name</span></th>--}}
{{--                                    <th scope="col"></th>--}}
{{--                                </tr>--}}

{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                @foreach($permission as $data)--}}
{{--                                    <tr>--}}
{{--                                        <td>{{$data->name}} </td>--}}
{{--                                        <td  class="d-flex justify-content-end">--}}
{{--                                            <a href="{{url('/check/'.$data->id)}}"  class="btn btn-primary btn-sm">Permissions</a>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                        </div>--}}
{{--                    </div>--}}


                    <br>
                </div>
            </div>
        </div>
    </div>
@endsection


