@extends('layouts.master')

@section('content')

    <section class="content pt-3">
        <div class="row">

            <div class="col-12">
                <!-- /.card -->

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Product List</h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="text-right mb-3 ">
                            <a class="btn btn-primary btn-sm" href="{{url('store/addProduct')}}">
                                <i class="fas fa-plus">
                                </i>
                                Add Product
                            </a>
                        </div>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>ID</th>
                                <th>Product Name</th>
                                <th>Product Description</th>
                                <th>In Stock</th>
                                <th>Unit</th>
                                <th>Location</th>
                                <th>Manage</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>PR001</td>
                                <td>Product 1</td>
                                <td>Product Description</td>
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
                            <tr>
                                <td>2</td>
                                <td>PR002</td>
                                <td>Product 2</td>
                                <td>Product Description</td>
                                <td>185</td>
                                <td>PCS</td>
                                <td>Store 3</td>
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
                            <tr>
                                <td>3</td>
                                <td>PR003</td>
                                <td>Product 3</td>
                                <td>Product Description</td>
                                <td>57</td>
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
                            <tr>
                                <td>4</td>
                                <td>PR004</td>
                                <td>Product 4</td>
                                <td>Product Description</td>
                                <td>25</td>
                                <td>PCS</td>
                                <td>Store 4</td>
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
                            <tr>
                                <td>5</td>
                                <td>PR005</td>
                                <td>Product 5</td>
                                <td>Product Description</td>
                                <td>75</td>
                                <td>PCS</td>
                                <td>Store 3</td>
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
                            <tr>
                                <td>6</td>
                                <td>PR006</td>
                                <td>Product 6</td>
                                <td>Product Description</td>
                                <td>5</td>
                                <td>PCS</td>
                                <td>Store 2</td>
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
                            <tr>
                                <td>7</td>
                                <td>PR007</td>
                                <td>Product 7</td>
                                <td>Product Description</td>
                                <td>37</td>
                                <td>PCS</td>
                                <td>Store 2</td>
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
