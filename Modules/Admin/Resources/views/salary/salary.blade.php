@extends('layouts.master')

@section('content')

    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">


                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Leave Application</h3>
                            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-lg">
                                Apply Leave
                            </button>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Dates</th>
                                    <th>Days</th>
                                    <th>Leave Types</th>
                                    <th>Reason</th>
                                    <th>Applied On</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                <tr>
                                    <td>0001</td>
                                    <td>Mohib</td>
                                    <td>21-Feb-2020 to 27-Feb-2020</td>
                                    <td>7</td>
                                    <td>Sick</td>
                                    <td>Injured</td>
                                    <td>21-Feb-2020</td>

                                    <td>
                                        <a href="#" class="btn btn-secondary ml-3">Pending</a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-primary ml-1">Approved</a>
                                        <a href="#" class="btn btn-danger ml-1">Reject</a>
                                        <button type="button" class="btn btn-dark ml-1" data-toggle="modal" data-target="#modal-lg1">
                                            View
                                        </button>                      <a href="#" class="btn btn-danger ml-1">Delete</a>
                                    </td>
                                </tr>

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
            <div class="modal fade" id="modal-lg">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Apply Leave</h4>
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
                                                        <label class="col-sm-4 col-form-label">Employee Name</label>
                                                        <div class="col-sm-8">
                                                            <select class="form-control select2">
                                                                <option selected="selected">Nabeel Rana</option>
                                                                <option>Mohib Yaseen</option>
                                                                <option>Taha Zafar</option>
                                                                <option>Mehdi Rizvi</option>
                                                                <option>Sajid Niazi</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Department</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" disabled placeholder="Store">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Leave Date</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" placeholder="20-02-2020">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Type of Leave</label>
                                                        <div class="col-sm-8">
                                                            <select class="form-control select2">
                                                                <option selected="selected">Sick</option>
                                                                <option>Casual</option>
                                                                <option>Annual</option>
                                                                <option>Unpaid</option>
                                                                <option>Others</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Reason</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" placeholder="Emergency">
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
            <div class="modal fade" id="modal-lg1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Apply Leave</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <h5>ID</h5>
                                                <h5>Name</h5>
                                                <h5>Dates</h5>
                                                <h5>Leave Days</h5>
                                                <h5>Type</h5>
                                                <h5>Reason</h5>
                                                <h5>Applied On</h5>
                                                <h5>Status</h5>
                                            </div>
                                            <div class="col-md-8">
                                                <h5>0001</h5>
                                                <h5>Mohib</h5>
                                                <h5>21-Feb-2020 - 27-Feb-2020 </h5>
                                                <h5>7</h5>
                                                <h5>Sick</h5>
                                                <h5>Injured</h5>
                                                <h5>21-Feb-2020</h5>
                                                <h5><a href="#" class="btn btn-secondary">Pending</a></h5>
                                            </div>

                                        </div>
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
