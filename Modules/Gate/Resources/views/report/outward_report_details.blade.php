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
                            <h3 class="card-title">Outward Report Detail</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Requisition ID</th>
                                    <td>{{$data->material_requisition_id}}</td>
                                </tr>
                                <tr>
                                    <th>Gate Type</th>
                                    <td>{{$data->gate_type}}</td>
                                </tr>

                                    <tr>
                                        <th>	Issue Date</th>
                                        <td>{{$data->issue_date}}</td>
                                    </tr>


{{--                                <tr>--}}
{{--                                    <th>Driver CNIC</th>--}}
{{--                                    <td>{{$data->driverCNIC}}</td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <th>Driver Name</th>--}}
{{--                                    <td>{{$data->driverName}}</td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <th>Driver Phone</th>--}}
{{--                                    <td>{{$data->driverPh}}</td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <th>Vehical No</th>--}}
{{--                                    <td>{{$data->vehicalNo}}</td>--}}
{{--                                </tr>--}}

{{--                                @if($data->vendorId==null)--}}

{{--                                @elseif($data->vendorId)--}}
{{--                                    <tr>--}}
{{--                                        <th>Vendor ID</th>--}}
{{--                                        <td>{{$data->gatePassId}}</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <th>Vendor Name</th>--}}
{{--                                        <td>{{$data->vendorName}}</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <th>Vendor Address</th>--}}
{{--                                        <td>{{$data->vendorAddress}}</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <th>Vendor Phone</th>--}}
{{--                                        <td>{{$data->vendorPh}}</td>--}}
{{--                                    </tr>--}}
{{--                                @endif--}}
{{--                                </thead>--}}
                                <tbody>
                                </tbody>
                            </table>
                            <hr>

                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>Material Name</th>
                                    <th>UMO</th>
                                    <th> Quantity</th>
                                    <th>Description</th>

                                </tr>

                                @foreach($report_data as $key=>$row)
                                    <tr>
                                        <td>{{$row->material_name}}</td>
                                        <td>{{$row->UOM}}</td>
                                        <td>{{$row->quantity}}</td>
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
