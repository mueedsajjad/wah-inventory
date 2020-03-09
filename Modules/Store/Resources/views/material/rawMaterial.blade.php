@extends('layouts.master')

@section('content')
    <section class="content pt-3">
        <div class="row">

            <div class="col-12">
                <!-- /.card -->

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Raw Material List</h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="text-right mb-3 ">
                            <a class="btn btn-primary btn-sm" href="{{url('store/addMaterial')}}">
                                <i class="fas fa-plus">
                                </i>
                                Add Raw Material
                            </a>
                        </div>

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>ID</th>
                                <th>Raw Material</th>
                                <th>Description</th>
                                <th>In Stock</th>
                                <th>Unit</th>
                                <th>Location</th>
                                <th>Manage</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>RM001</td>
                                <td>Material 1</td>
                                <td>Description</td>
                                <td>375</td>
                                <td>PCS</td>
                                <td>Store 1</td>
                                <td class="project-actions">
                                    <a class="btn btn-primary btn-sm" href="#">
                                        <i class="fas fa-folder">
                                        </i>
                                        View
                                    </a>
                                    <a class="btn btn-info btn-sm" href="#">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="#">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </a>
                                </td>
                            </tr>




                            </tbody>

                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection

