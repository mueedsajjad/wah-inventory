@extends('layouts.master')

@section('content')

    <section class="content pt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">Purchase Dashboard</h3>
                    </div>
                    <div class="card-body dash-menu">
                        <a class="btn btn-app bg-danger" href="{{url('purchase/purchaseOrder')}}">
                            <i class="fas fa-edit"></i> Purchase Orders
                        </a>

                        <a class="btn btn-app bg-danger" href="{{url('purchase/tender')}}">
                            <i class="fas fa-edit"></i> Tenders
                        </a>

                        <a class="btn btn-app bg-danger" href="{{url('purchase/directReceipt')}}">
                            <i class="fas fa-edit"></i> Direct Receipt
                        </a>

                    </div>
                </div>
            </div>

            <div class="col-12">
                <!-- /.card -->

                <div class="card">
                    <div class="card-body">
                        <div class="text-right mb-3 ">
                            <a class="btn btn-primary btn-sm" href="{{url('purchase/purchase')}}">
                                <i class="fas fa-plus">
                                </i>
                                New Purchase Order
                            </a>
                        </div>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>PO ID</th>
                                <th>PO Date</th>
                                <th>Supplier ID</th>
                                <th>Supplier Name</th>
                                <th>Due Date</th>
                                <th>Total Amount</th>
                                <th>Received All</th>
                                <th>Paid All</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>PO001</td>
                                <td>2020-02-06 08:20:53</td>
                                <td>SUP001</td>
                                <td>MMLOGIX (PVT) Ltd.</td>
                                <td>2020-02-16</td>
                                <td>45,000.00</td>
                                <td class="text-danger">No</td>
                                <td class="text-danger">No</td>
                                <td class="project-actions">
                                    <a class="btn btn-primary btn-sm" href="#">
                                        <i class="fas fa-folder">
                                        </i>
                                        Update
                                    </a>
                                    <a class="btn btn-info btn-sm" href="#">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Close Order
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="#">
                                        <i class="fas fa-times">
                                        </i>
                                        Cancel Order
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
