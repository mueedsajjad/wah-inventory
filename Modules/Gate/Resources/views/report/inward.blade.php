@extends('layouts.master')

@section('content')
    <section class="content pt-5">

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title">Gate Reports</h3>
                        </div>
                        <div class="card-body dash-menu text-center">
                            <a class="btn btn-app bg-danger" href="{{url('gate/inward')}}">
                                <i class="fas fa-edit"></i> Inward Report
                            </a>
                            <a class="btn btn-app bg-danger" href="{{url('gate/outward_report')}}">
                                <i class="fas fa-edit"></i> Outward Report
                            </a>
                            <a class="btn btn-app bg-danger" href="{{url('gate/vehicle_report')}}">
                                <i class="fas fa-edit"></i> Vehicle Report
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title">Inward Report</h3>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-6 mt-2">
                                <form id="dateHearing" action="{{ route('inward_gate_date') }}" method="POST" >
                                    @csrf
                                    <div class="d-flex">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">From:</label>
                                            <div class="col-sm-9">
                                                <input type="date" name="fromDate" id="fromDate" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">&nbsp;To:</label>
                                            <div class="col-sm-10">
                                                <input type="date" onchange="myFunction()" name="toDate" id="toDate" class="form-control">
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>
                            <div class="col-md-4 mt-2">
                                <a class="btn btn-success" href="{{url('/gate/Inward_Date_current_month')}}">Current Month</a>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Purchase Inward</a>
{{--                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Requisition Inward</a>--}}
                                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Factory Inward</a>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <table id="builtyTable" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>Gate Pass ID</th>
                                            {{--                                    <th>Gate Pass Type</th>--}}
                                            <th>Date</th>
                                            <th>Inward Type</th>
                                            <th>Purchase Order</th>
                                            <th>Requisition</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($report_data as $key=>$report)
                                            @if($report->purchase_order_id && $report->requisition_id)
                                            <tr>
                                                <td>{{$report->gatePassId}}</td>
                                                {{--                                    <td>Inward</td>--}}
                                                <td>{{$report->date}}</td>
                                                    <td>Purchase Inward</td>

                                                <td>{{$report->purchase_order_id}}</td>
                                                <td>{{$report->requisition_id}}</td>
                                                <td>

                                                    <a type="button" href="{{url('gate/inward_report/'.$report->id)}}" class="btn btn-primary">View</a>


                                                    {{--                                        --}}
                                                    {{--                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{$str_random}}">--}}
                                                    {{--                                            View--}}
                                                    {{--                                        </button>--}}

                                                    {{--                                            <div class="modal fade" id="{{$str_random}}">--}}
                                                    {{--                                                <div class="modal-dialog modal-lg">--}}
                                                    {{--                                                    <div class="modal-content">--}}
                                                    {{--                                                        <div class="modal-header">--}}
                                                    {{--                                                            <h4 class="modal-title"></h4>--}}
                                                    {{--                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                                                    {{--                                                                <span aria-hidden="true">&times;</span>--}}
                                                    {{--                                                            </button>--}}
                                                    {{--                                                        </div>--}}
                                                    {{--                                                        <div class="modal-body">--}}
                                                    {{--                                                            <div class="row">--}}
                                                    {{--                                                                <div class="col-md-12">--}}
                                                    {{--                                                                    <table class="table table-bordered">--}}

                                                    {{--                                                                        <tbody>--}}
                                                    {{--                                                                        <tr>--}}
                                                    {{--                                                                            <td>Item Type</td>--}}
                                                    {{--                                                                            <td></td>--}}
                                                    {{--                                                                        </tr>--}}
                                                    {{--                                                                        <tr>--}}
                                                    {{--                                                                            <td>Date</td>--}}
                                                    {{--                                                                            <td>20-02-2020</td>--}}
                                                    {{--                                                                        </tr>--}}
                                                    {{--                                                                        <tr>--}}
                                                    {{--                                                                            <td>Type</td>--}}
                                                    {{--                                                                            <td>Supplier</td>--}}
                                                    {{--                                                                        </tr>--}}
                                                    {{--                                                                        <tr>--}}
                                                    {{--                                                                            <td>Supplier ID</td>--}}
                                                    {{--                                                                            <td>MML01</td>--}}
                                                    {{--                                                                        </tr>--}}
                                                    {{--                                                                        <tr>--}}
                                                    {{--                                                                            <td>Supplier Name</td>--}}
                                                    {{--                                                                            <td>MMLOGIX</td>--}}
                                                    {{--                                                                        </tr>--}}
                                                    {{--                                                                        <tr>--}}
                                                    {{--                                                                            <td>Transporter</td>--}}
                                                    {{--                                                                            <td></td>--}}
                                                    {{--                                                                        </tr>--}}
                                                    {{--                                                                        <tr>--}}
                                                    {{--                                                                            <td>Vehicle No</td>--}}
                                                    {{--                                                                            <td>LEV-8442-07</td>--}}
                                                    {{--                                                                        </tr>--}}
                                                    {{--                                                                        <tr>--}}
                                                    {{--                                                                            <td>Driver Name</td>--}}
                                                    {{--                                                                            <td>Zahoor</td>--}}
                                                    {{--                                                                        </tr>--}}
                                                    {{--                                                                        <tr>--}}
                                                    {{--                                                                            <td>Driver Ph</td>--}}
                                                    {{--                                                                            <td>0333 1234567</td>--}}
                                                    {{--                                                                        </tr>--}}
                                                    {{--                                                                        </tbody>--}}
                                                    {{--                                                                    </table>--}}

                                                    {{--                                                                    <div class="card card-secondary">--}}
                                                    {{--                                                                        <div class="card-header">--}}
                                                    {{--                                                                            <h3 class="card-title">Products</h3>--}}
                                                    {{--                                                                        </div>--}}
                                                    {{--                                                                        <!-- /.card-header -->--}}

                                                    {{--                                                                        <div class="card-body">--}}
                                                    {{--                                                                            <table class="table table-bordered">--}}
                                                    {{--                                                                                <thead class="bg-light">--}}
                                                    {{--                                                                                <tr>--}}
                                                    {{--                                                                                    <th>Sr#</th>--}}
                                                    {{--                                                                                    <th>Product Name</th>--}}
                                                    {{--                                                                                    <th>Product Description</th>--}}
                                                    {{--                                                                                    <th>UOM</th>--}}
                                                    {{--                                                                                    <th>Qty</th>--}}
                                                    {{--                                                                                    <th>Remarks</th>--}}
                                                    {{--                                                                                </tr>--}}
                                                    {{--                                                                                </thead>--}}
                                                    {{--                                                                                <tbody>--}}
                                                    {{--                                                                                <tr>--}}
                                                    {{--                                                                                    <td>1</td>--}}
                                                    {{--                                                                                    <td>PR001</td>--}}
                                                    {{--                                                                                    <td></td>--}}
                                                    {{--                                                                                    <td></td>--}}
                                                    {{--                                                                                    <td></td>--}}
                                                    {{--                                                                                    <td></td>--}}
                                                    {{--                                                                                </tr>--}}
                                                    {{--                                                                                </tbody>--}}
                                                    {{--                                                                            </table>--}}

                                                    {{--                                                                        </div>--}}
                                                    {{--                                                                    </div>--}}
                                                    {{--                                                                </div>--}}

                                                    {{--                                                            </div>--}}
                                                    {{--                                                        </div>--}}
                                                    {{--                                                        <!----}}
                                                    {{--                                                                    <div class="modal-footer justify-content-between">--}}
                                                    {{--                                                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
                                                    {{--                                                                      <button type="button" class="btn btn-primary">Save changes</button>--}}
                                                    {{--                                                                    </div>--}}
                                                    {{--                                                        -->--}}
                                                    {{--                                                    </div>--}}
                                                    {{--                                                    <!-- /.modal-content -->--}}
                                                    {{--                                                </div>--}}
                                                    {{--                                                <!-- /.modal-dialog -->--}}
                                                    {{--                                            </div>--}}


                                                </td>
                                            </tr>
                                            @endif
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
{{--                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">--}}
{{--                                    <table id="builtyTable1" class="table table-bordered table-striped">--}}
{{--                                        <thead>--}}
{{--                                        <tr>--}}
{{--                                            <th>Gate Pass ID</th>--}}
{{--                                            --}}{{--                                    <th>Gate Pass Type</th>--}}
{{--                                            <th>Date</th>--}}
{{--                                            <th>Inward Type</th>--}}
{{--                                            <th>Requisition</th>--}}
{{--                                            <th>Action</th>--}}
{{--                                        </tr>--}}
{{--                                        </thead>--}}
{{--                                        <tbody>--}}
{{--                                        @foreach($report_data as $key=>$report)--}}
{{--                                             @if($report->purchase_order_id==null && $report->requisition_id )--}}
{{--                                            <tr>--}}
{{--                                                <td>{{$report->gatePassId}}</td>--}}
{{--                                                <td>{{$report->date}}</td>--}}
{{--                                                <td>Requisition Inward</td>--}}
{{--                                                <td>{{$report->requisition_id}}</td>--}}
{{--                                                <td>--}}

{{--                                                    <a type="button" href="{{url('gate/inward_report/'.$report->id)}}" class="btn btn-primary">View</a>--}}


{{--                                                    --}}{{--                                        --}}
{{--                                                    --}}{{--                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{$str_random}}">--}}
{{--                                                    --}}{{--                                            View--}}
{{--                                                    --}}{{--                                        </button>--}}

{{--                                                    --}}{{--                                            <div class="modal fade" id="{{$str_random}}">--}}
{{--                                                    --}}{{--                                                <div class="modal-dialog modal-lg">--}}
{{--                                                    --}}{{--                                                    <div class="modal-content">--}}
{{--                                                    --}}{{--                                                        <div class="modal-header">--}}
{{--                                                    --}}{{--                                                            <h4 class="modal-title"></h4>--}}
{{--                                                    --}}{{--                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                                    --}}{{--                                                                <span aria-hidden="true">&times;</span>--}}
{{--                                                    --}}{{--                                                            </button>--}}
{{--                                                    --}}{{--                                                        </div>--}}
{{--                                                    --}}{{--                                                        <div class="modal-body">--}}
{{--                                                    --}}{{--                                                            <div class="row">--}}
{{--                                                    --}}{{--                                                                <div class="col-md-12">--}}
{{--                                                    --}}{{--                                                                    <table class="table table-bordered">--}}

{{--                                                    --}}{{--                                                                        <tbody>--}}
{{--                                                    --}}{{--                                                                        <tr>--}}
{{--                                                    --}}{{--                                                                            <td>Item Type</td>--}}
{{--                                                    --}}{{--                                                                            <td></td>--}}
{{--                                                    --}}{{--                                                                        </tr>--}}
{{--                                                    --}}{{--                                                                        <tr>--}}
{{--                                                    --}}{{--                                                                            <td>Date</td>--}}
{{--                                                    --}}{{--                                                                            <td>20-02-2020</td>--}}
{{--                                                    --}}{{--                                                                        </tr>--}}
{{--                                                    --}}{{--                                                                        <tr>--}}
{{--                                                    --}}{{--                                                                            <td>Type</td>--}}
{{--                                                    --}}{{--                                                                            <td>Supplier</td>--}}
{{--                                                    --}}{{--                                                                        </tr>--}}
{{--                                                    --}}{{--                                                                        <tr>--}}
{{--                                                    --}}{{--                                                                            <td>Supplier ID</td>--}}
{{--                                                    --}}{{--                                                                            <td>MML01</td>--}}
{{--                                                    --}}{{--                                                                        </tr>--}}
{{--                                                    --}}{{--                                                                        <tr>--}}
{{--                                                    --}}{{--                                                                            <td>Supplier Name</td>--}}
{{--                                                    --}}{{--                                                                            <td>MMLOGIX</td>--}}
{{--                                                    --}}{{--                                                                        </tr>--}}
{{--                                                    --}}{{--                                                                        <tr>--}}
{{--                                                    --}}{{--                                                                            <td>Transporter</td>--}}
{{--                                                    --}}{{--                                                                            <td></td>--}}
{{--                                                    --}}{{--                                                                        </tr>--}}
{{--                                                    --}}{{--                                                                        <tr>--}}
{{--                                                    --}}{{--                                                                            <td>Vehicle No</td>--}}
{{--                                                    --}}{{--                                                                            <td>LEV-8442-07</td>--}}
{{--                                                    --}}{{--                                                                        </tr>--}}
{{--                                                    --}}{{--                                                                        <tr>--}}
{{--                                                    --}}{{--                                                                            <td>Driver Name</td>--}}
{{--                                                    --}}{{--                                                                            <td>Zahoor</td>--}}
{{--                                                    --}}{{--                                                                        </tr>--}}
{{--                                                    --}}{{--                                                                        <tr>--}}
{{--                                                    --}}{{--                                                                            <td>Driver Ph</td>--}}
{{--                                                    --}}{{--                                                                            <td>0333 1234567</td>--}}
{{--                                                    --}}{{--                                                                        </tr>--}}
{{--                                                    --}}{{--                                                                        </tbody>--}}
{{--                                                    --}}{{--                                                                    </table>--}}

{{--                                                    --}}{{--                                                                    <div class="card card-secondary">--}}
{{--                                                    --}}{{--                                                                        <div class="card-header">--}}
{{--                                                    --}}{{--                                                                            <h3 class="card-title">Products</h3>--}}
{{--                                                    --}}{{--                                                                        </div>--}}
{{--                                                    --}}{{--                                                                        <!-- /.card-header -->--}}

{{--                                                    --}}{{--                                                                        <div class="card-body">--}}
{{--                                                    --}}{{--                                                                            <table class="table table-bordered">--}}
{{--                                                    --}}{{--                                                                                <thead class="bg-light">--}}
{{--                                                    --}}{{--                                                                                <tr>--}}
{{--                                                    --}}{{--                                                                                    <th>Sr#</th>--}}
{{--                                                    --}}{{--                                                                                    <th>Product Name</th>--}}
{{--                                                    --}}{{--                                                                                    <th>Product Description</th>--}}
{{--                                                    --}}{{--                                                                                    <th>UOM</th>--}}
{{--                                                    --}}{{--                                                                                    <th>Qty</th>--}}
{{--                                                    --}}{{--                                                                                    <th>Remarks</th>--}}
{{--                                                    --}}{{--                                                                                </tr>--}}
{{--                                                    --}}{{--                                                                                </thead>--}}
{{--                                                    --}}{{--                                                                                <tbody>--}}
{{--                                                    --}}{{--                                                                                <tr>--}}
{{--                                                    --}}{{--                                                                                    <td>1</td>--}}
{{--                                                    --}}{{--                                                                                    <td>PR001</td>--}}
{{--                                                    --}}{{--                                                                                    <td></td>--}}
{{--                                                    --}}{{--                                                                                    <td></td>--}}
{{--                                                    --}}{{--                                                                                    <td></td>--}}
{{--                                                    --}}{{--                                                                                    <td></td>--}}
{{--                                                    --}}{{--                                                                                </tr>--}}
{{--                                                    --}}{{--                                                                                </tbody>--}}
{{--                                                    --}}{{--                                                                            </table>--}}

{{--                                                    --}}{{--                                                                        </div>--}}
{{--                                                    --}}{{--                                                                    </div>--}}
{{--                                                    --}}{{--                                                                </div>--}}

{{--                                                    --}}{{--                                                            </div>--}}
{{--                                                    --}}{{--                                                        </div>--}}
{{--                                                    --}}{{--                                                        <!----}}
{{--                                                    --}}{{--                                                                    <div class="modal-footer justify-content-between">--}}
{{--                                                    --}}{{--                                                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
{{--                                                    --}}{{--                                                                      <button type="button" class="btn btn-primary">Save changes</button>--}}
{{--                                                    --}}{{--                                                                    </div>--}}
{{--                                                    --}}{{--                                                        -->--}}
{{--                                                    --}}{{--                                                    </div>--}}
{{--                                                    --}}{{--                                                    <!-- /.modal-content -->--}}
{{--                                                    --}}{{--                                                </div>--}}
{{--                                                    --}}{{--                                                <!-- /.modal-dialog -->--}}
{{--                                                    --}}{{--                                            </div>--}}


{{--                                                </td>--}}
{{--                                            </tr>--}}
{{--                                            @endif--}}
{{--                                        @endforeach--}}

{{--                                        </tbody>--}}
{{--                                        <!-- <tfoot>--}}
{{--                                         <tr>--}}
{{--                                           <th>Rendering engine</th>--}}
{{--                                           <th>Browser</th>--}}
{{--                                           <th>Platform(s)</th>--}}
{{--                                           <th>Engine version</th>--}}
{{--                                           <th>CSS grade</th>--}}
{{--                                         </tr>--}}
{{--                                         </tfoot>-->--}}
{{--                                    </table>--}}
{{--                                </div>--}}
                                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">

                                    <table id="builtyTable2" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>Gate Pass ID</th>
                                            {{--                                    <th>Gate Pass Type</th>--}}
                                            <th>Date</th>
                                            <th>Inward Type</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($report_data as $key=>$report)
                                            <?php
//                                             $data_FI=;
//                                             $FI_requ=$data_FI->requisition_id;
                                            ?>

                                           @foreach($report_dat_one as $one)
                                               @if($report->requisition_id==$one->requisition_id)
                                            <tr>
                                                <td>{{$report->gatePassId}}</td>
                                                {{--                                    <td>Inward</td>--}}
                                                <td>{{$report->date}}</td>

                                                <td>Factory Inward</td>

                                                <td>

                                                    <a type="button" href="{{url('gate/inward_report/'.$report->id)}}" class="btn btn-primary">View</a>


                                                    {{--                                        --}}
                                                    {{--                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{$str_random}}">--}}
                                                    {{--                                            View--}}
                                                    {{--                                        </button>--}}

                                                    {{--                                            <div class="modal fade" id="{{$str_random}}">--}}
                                                    {{--                                                <div class="modal-dialog modal-lg">--}}
                                                    {{--                                                    <div class="modal-content">--}}
                                                    {{--                                                        <div class="modal-header">--}}
                                                    {{--                                                            <h4 class="modal-title"></h4>--}}
                                                    {{--                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                                                    {{--                                                                <span aria-hidden="true">&times;</span>--}}
                                                    {{--                                                            </button>--}}
                                                    {{--                                                        </div>--}}
                                                    {{--                                                        <div class="modal-body">--}}
                                                    {{--                                                            <div class="row">--}}
                                                    {{--                                                                <div class="col-md-12">--}}
                                                    {{--                                                                    <table class="table table-bordered">--}}

                                                    {{--                                                                        <tbody>--}}
                                                    {{--                                                                        <tr>--}}
                                                    {{--                                                                            <td>Item Type</td>--}}
                                                    {{--                                                                            <td></td>--}}
                                                    {{--                                                                        </tr>--}}
                                                    {{--                                                                        <tr>--}}
                                                    {{--                                                                            <td>Date</td>--}}
                                                    {{--                                                                            <td>20-02-2020</td>--}}
                                                    {{--                                                                        </tr>--}}
                                                    {{--                                                                        <tr>--}}
                                                    {{--                                                                            <td>Type</td>--}}
                                                    {{--                                                                            <td>Supplier</td>--}}
                                                    {{--                                                                        </tr>--}}
                                                    {{--                                                                        <tr>--}}
                                                    {{--                                                                            <td>Supplier ID</td>--}}
                                                    {{--                                                                            <td>MML01</td>--}}
                                                    {{--                                                                        </tr>--}}
                                                    {{--                                                                        <tr>--}}
                                                    {{--                                                                            <td>Supplier Name</td>--}}
                                                    {{--                                                                            <td>MMLOGIX</td>--}}
                                                    {{--                                                                        </tr>--}}
                                                    {{--                                                                        <tr>--}}
                                                    {{--                                                                            <td>Transporter</td>--}}
                                                    {{--                                                                            <td></td>--}}
                                                    {{--                                                                        </tr>--}}
                                                    {{--                                                                        <tr>--}}
                                                    {{--                                                                            <td>Vehicle No</td>--}}
                                                    {{--                                                                            <td>LEV-8442-07</td>--}}
                                                    {{--                                                                        </tr>--}}
                                                    {{--                                                                        <tr>--}}
                                                    {{--                                                                            <td>Driver Name</td>--}}
                                                    {{--                                                                            <td>Zahoor</td>--}}
                                                    {{--                                                                        </tr>--}}
                                                    {{--                                                                        <tr>--}}
                                                    {{--                                                                            <td>Driver Ph</td>--}}
                                                    {{--                                                                            <td>0333 1234567</td>--}}
                                                    {{--                                                                        </tr>--}}
                                                    {{--                                                                        </tbody>--}}
                                                    {{--                                                                    </table>--}}

                                                    {{--                                                                    <div class="card card-secondary">--}}
                                                    {{--                                                                        <div class="card-header">--}}
                                                    {{--                                                                            <h3 class="card-title">Products</h3>--}}
                                                    {{--                                                                        </div>--}}
                                                    {{--                                                                        <!-- /.card-header -->--}}

                                                    {{--                                                                        <div class="card-body">--}}
                                                    {{--                                                                            <table class="table table-bordered">--}}
                                                    {{--                                                                                <thead class="bg-light">--}}
                                                    {{--                                                                                <tr>--}}
                                                    {{--                                                                                    <th>Sr#</th>--}}
                                                    {{--                                                                                    <th>Product Name</th>--}}
                                                    {{--                                                                                    <th>Product Description</th>--}}
                                                    {{--                                                                                    <th>UOM</th>--}}
                                                    {{--                                                                                    <th>Qty</th>--}}
                                                    {{--                                                                                    <th>Remarks</th>--}}
                                                    {{--                                                                                </tr>--}}
                                                    {{--                                                                                </thead>--}}
                                                    {{--                                                                                <tbody>--}}
                                                    {{--                                                                                <tr>--}}
                                                    {{--                                                                                    <td>1</td>--}}
                                                    {{--                                                                                    <td>PR001</td>--}}
                                                    {{--                                                                                    <td></td>--}}
                                                    {{--                                                                                    <td></td>--}}
                                                    {{--                                                                                    <td></td>--}}
                                                    {{--                                                                                    <td></td>--}}
                                                    {{--                                                                                </tr>--}}
                                                    {{--                                                                                </tbody>--}}
                                                    {{--                                                                            </table>--}}

                                                    {{--                                                                        </div>--}}
                                                    {{--                                                                    </div>--}}
                                                    {{--                                                                </div>--}}

                                                    {{--                                                            </div>--}}
                                                    {{--                                                        </div>--}}
                                                    {{--                                                        <!----}}
                                                    {{--                                                                    <div class="modal-footer justify-content-between">--}}
                                                    {{--                                                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
                                                    {{--                                                                      <button type="button" class="btn btn-primary">Save changes</button>--}}
                                                    {{--                                                                    </div>--}}
                                                    {{--                                                        -->--}}
                                                    {{--                                                    </div>--}}
                                                    {{--                                                    <!-- /.modal-content -->--}}
                                                    {{--                                                </div>--}}
                                                    {{--                                                <!-- /.modal-dialog -->--}}
                                                    {{--                                            </div>--}}


                                                </td>
                                            </tr>
                                            @endif
                                        @endforeach
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
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>







            </div>

        </div>
    </section>
    <script>
        function myFunction(){

            if(document.getElementById("fromDate").value != ''){

                document.getElementById("dateHearing").submit();
            }
        }
    </script>
    <script>
        $( document ).ready(function() {
            $('#builtyTable').DataTable();
            $('#builtyTable1').DataTable();
            $('#builtyTable2').DataTable();
        });
    </script>
@endsection
