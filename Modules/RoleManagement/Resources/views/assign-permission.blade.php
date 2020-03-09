@extends('layouts.master')

@section('content')
    <div class="container-fluid" style="background-color: #ECECEC; height: 93.7%;" id="content" >
        <div class="row mr-0" >
            <div class="col-md-12 mt-2" >
                <div  style="background-color: white; border-top:2px solid #AFAFAF; box-shadow:0px 1px 5px 1px
            #AFAFAF;">
                    <div class="ml-2 mt-2 mb-2" >
                        <span style="font-weight: 549; font-size:16px; font-family: Arial;">Check Permissions<sub class="ml-2" style="color: gray;">Assign-Permissions</sub></span>
                    </div>
                    <div class="mt-3" style="border:1px solid #E9E9E9; border-top:none; border-right:none;border-left: none; "></div>
                    <div class="row">
                        <div class="col-3">
                            <div class="mt-4">
                                <form action="{{url('/assign-permission')}}" method="POST">
                                    <table class="table  table-striped  mt-2 ml-2" style="width: 98.7%; padding: 0px;  " >
                                        @csrf
                                        <input type="hidden" name="role" value="{{$role->id}}">
                                        <thead>
                                        <tr style="font-size: 11px; font-family:arial; ">
                                            <th scope="col" colspan="2"  style=" padding:4px 3px 3px 1px; font-weight: normal; border:1px solid #EAEAEA; "><span class="ml-2" style=" font-weight: bold;">Unchecked<span style="float: right; color: #D4D4D5;"><i class="fa fa-sort"></i></span></span></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?phperror_reporting(0);?>
                                        @foreach($permissions as $data)
                                            <tr style="font-size: 11.3px; font-family:arial;
                      font-weight: normal; ">
                                                <td scope="col" style=" padding:4px 3px 3px 6px; font-weight: normal; border:1px solid #EAEAEA; "> {{$data->name}} </td>
                                                <td><input type="checkbox" name="permissions[]" value="{{$data->id}}"> </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="2">
                                                <button type="submit"  class="btn btn-primary" style="
                                           border-radius: 0px;
                                           padding:0px 7px 0px 7px;
                                           background-color: #3C8DBC;
                                           font-weight: normal;
                                           font-family: Arial;
                                           font-size: 12px;
                                           border-color: #367FA9;
                                           color: white; float:right;">Permissions</button>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="mt-4">
                                <form action="{{url('/unchecked')}}" method="POST">
                                    <table class="table  table-striped  mt-2 ml-2" style="width: 98.7%; padding: 0px;  " >
                                        @csrf
                                        <input type="hidden" name="role" value="{{$role->id}}">
                                        <thead>
                                        <tr style="font-size: 11px; font-family:arial; ">
                                            <th scope="col"  colspan="2" style=" padding:4px 3px 3px 1px; font-weight: normal; border:1px solid #EAEAEA; "><span class="ml-2" style=" font-weight: bold;">Checked<span style="float: right; color: #D4D4D5;"><i class="fa fa-sort"></i></span></span></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($assignPermission as $data)
                                            <tr style="font-size: 11.3px; font-family:arial;
                      font-weight: normal; ">
                                                <td scope="col" style=" padding:4px 3px 3px 6px; font-weight: normal; border:1px solid #EAEAEA; "> {{$data->name}} </td>
                                                <td><input type="checkbox" name="permissions[]" value="{{$data->id}}" checked> </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="2"><button type="submit"  class="btn btn-primary" style="
                                           border-radius: 0px;
                                           padding:0px 7px 0px 7px;
                                           background-color: #3C8DBC;
                                           font-weight: normal;
                                           font-family: Arial;
                                           font-size: 12px;
                                           border-color: #367FA9;
                                           color: white; float:right;">Unchecked</button></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
@endsection


