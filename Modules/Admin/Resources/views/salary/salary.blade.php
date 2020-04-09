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
                                Salary
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
                                    <th>Salary</th>
                                    <th>Date</th>
                                    <th>Action<th>
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
                                    <td>
                                    <a href="#" class="btn btn-danger  ml-1 deleteSalary" data-id="{{$salaries->id}}" type="button"  data-toggle="modal" data-target="#modal-delete">Delete</a>
                                    </td>
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
        {{---------------------------------------------  Delete Model    -----------------------------------------}}
    <div class="modal fade" id="modal-delete">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Record</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                                <form action="{{url('admin/salaryDelete')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="" id="salaryId">
                                    <label> Do you want to delete Record?</label>
                                    <div class="row justify-content-around">

                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <button  type="button" class="btn btn-default float-right"  data-dismiss="modal" >No</button>
                                                    <button type="submit" class="btn btn-danger float-right mr-1">Yes</button>
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
    </section>
    <!-- $('.deleteMaterial').click(function () {
        var id=$(this).data("id");
        //console.log(id);
        $('#materialId').val(id);
    }); -->
    <script>
     $('.deleteSalary').click(function (){
         var id=$(this).data("id");
        // console.log(id);
         $('#salaryId').val(id);
     })
    </script>
@endsection
