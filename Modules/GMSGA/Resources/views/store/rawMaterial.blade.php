@extends('layouts.master')

@section('content')

    <section class="content pt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">Store Dashboard</h3>
                    </div>
                    <div class="card-body dash-menu">
                        <a class="btn btn-app bg-danger" href="raw-material.html">
                            <i class="fas fa-edit"></i> Raw Material
                        </a>
                        <a class="btn btn-app bg-danger" href="products.html">
                            <i class="fas fa-edit"></i> Products
                        </a>
                        <a class="btn btn-app bg-danger" href="goods-receipt.html">
                            <i class="fas fa-edit"></i> Goods Receipt
                        </a>
                        <a class="btn btn-app bg-danger" href="inote.html">
                            <i class="fas fa-edit"></i> I-Note
                        </a>
                        <a class="btn btn-app bg-danger" href="deliver-order.html">
                            <i class="fas fa-edit"></i> Delivery Order
                        </a>
                        <a class="btn btn-app bg-danger" href="issue-product-from-store.html">
                            <i class="fas fa-edit"></i> Issue / Requisition
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <!-- /.card -->

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Raw Material List</h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="text-right mb-3 ">
                            <a class="btn btn-primary btn-sm" href="add-products.html">
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

