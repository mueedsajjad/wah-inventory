@extends('layouts.master')

@section('content')

    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
            
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Advance</h3>
                            <!-- <a href="{{url('admin/advance')}}"  class="btn btn-primary float-right" >
                                Advance
                            </a> -->
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
                                    <th>Advance Amount</th>
                                    <th>Date</th>
                                    <th>Action<th>
                                </tr>
                                </thead>
                                <tbody>
                               
                                <tr>
                                 
                                </tr>
                               

                                </tbody>
                               
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
