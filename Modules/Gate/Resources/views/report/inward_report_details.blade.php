@extends('layouts.master')

@section('content')

    <section class="content pt-5" id="section1">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                </div>

                <div class="col-md-12">
                    <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title">Report Detail</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Gate pass</th>
                                    <td>{{$data->gatePassId}}</td>
                                </tr>
                                <tr>
                                    <th>Date</th>
                                    <td>{{$data->date}}</td>
                                </tr>

                                @if($data->purchase_order_id==null)

                                @elseif($data->purchase_order_id)
{{--                                    <tr>--}}
{{--                                        <th>Inward Type</th>--}}
{{--                                        <td>Purchase Inward</td>--}}
{{--                                    </tr>--}}
                                <tr>
                                    <th>	Purchase Order</th>
                                    <td>{{$data->purchase_order_id}}</td>
                                </tr>
                                @endif
{{--                                @if($data->purchase_order_id==null && $data->requisition_id)--}}
{{--                                    <tr>--}}
{{--                                        <th>Inward Type</th>--}}
{{--                                        <td>Requisition Inward</td>--}}
{{--                                    </tr>--}}
{{--                                    @endif--}}
                                @if($data->requisition_id)
                                <tr>
                                    <th>Requisition</th>
                                    <td>{{$data->requisition_id}}</td>
                                </tr>
{{--                                @elseif($data->requisition_id==null && $data->purchase_order_id==null )--}}
{{--                                    <tr>--}}
{{--                                        <th>Inward type</th>--}}
{{--                                        <td>Factory Inward</td>--}}
{{--                                    </tr>--}}

                                    @endif
                                <tr>
                                    <th>Driver CNIC</th>
                                    <td>{{$data->driverCNIC}}</td>
                                </tr>
                                <tr>
                                    <th>Driver Name</th>
                                    <td>{{$data->driverName}}</td>
                                </tr>
                                <tr>
                                    <th>Driver Phone</th>
                                    <td>{{$data->driverPh}}</td>
                                </tr>
                                <tr>
                                    <th>Vehical No</th>
                                    <td>{{$data->vehicalNo}}</td>
                                </tr>

                                @if($data->vendorId==null)

                                    @elseif($data->vendorId)
                                <tr>
                                    <th>Vendor ID</th>
                                    <td>{{$data->gatePassId}}</td>
                                </tr>
                                <tr>
                                    <th>Vendor Name</th>
                                    <td>{{$data->vendorName}}</td>
                                </tr>
                                <tr>
                                    <th>Vendor Address</th>
                                    <td>{{$data->vendorAddress}}</td>
                                </tr>
                                <tr>
                                    <th>Vendor Phone</th>
                                    <td>{{$data->vendorPh}}</td>
                                </tr>
                                    @endif
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                            <hr>

                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>Material Name</th>
                                    <th>UMO</th>
                                    <th>Ordered Quantity</th>
                                    <th>Quantity Received</th>
                                    <th>Description</th>

                                </tr>

                                @foreach($report_details as $key=>$row)
                                    <tr>
                                        <td>{{$row->materialName}}</td>
                                        <td>{{$row->uom}}</td>
                                        <td>{{$row->order_qty}}</td>
                                        <td>{{$row->qty}}</td>
                                        <td>{{$row->description}}</td>
                                    </tr>
                                @endforeach


                            </table>
                            <br>

                            <div class="text-lg-right">
                                <button class="btn btn-primary" onclick="printContent('section1')">Print</button>
                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>







            </div>

        </div>
    </section>
    <script type="text/javascript">

        function printContent(el){
            var restorepage = document.body.innerHTML;
            var printcontent = document.getElementById(el).innerHTML;
            document.body.innerHTML=printcontent;
            window.print();
            document.body.innerHTML=restorepage;
        }
    </script>

@endsection
