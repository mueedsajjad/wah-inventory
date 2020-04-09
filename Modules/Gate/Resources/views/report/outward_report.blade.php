@extends('gate::report.report')


@section('data')

    <div class="col-md-12">
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Outward Report</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Delivery Order</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Towards Factory</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <table id="example1" class="table table-bordered table-striped">

                            <thead>

                            <tr>
                                <th>Sale Order Number</th>
                                {{--                                    <th>Gate Pass Type</th>--}}
                                <th>Delivery Date</th>
                                <th>Customer Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($delivery_report as $key=>$report)

                                <tr>
                                    <td>{{$report->so_number}}</td>
                                    {{--                                    <td>Inward</td>--}}
                                    <td>{{$report->delivery_date}}</td>
                                    <td>{{$report->customer_name}}</td>
                                    <td>

                                        <a type="button" href="{{url('gate/out_delivery_report/'.$report->so_number)}}" class="btn btn-primary">View</a>


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
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Material</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Components</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                <table id="example1" class="table table-bordered table-striped">

                                    <thead>

                                    <tr>
                                        <th>Requisition ID</th>
                                        {{--                                    <th>Gate Pass Type</th>--}}
                                        <th>Issue Date</th>
                                        <th>Gate Type</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($report_data as $key=>$report)

                                        <tr>
                                            <td>{{$report->material_requisition_id}}</td>
                                            {{--                                    <td>Inward</td>--}}
                                            <td>{{$report->issue_date}}</td>
                                            <td>{{$report->gate_type}}</td>
                                            <td>

                                                <a type="button" href="{{url('gate/out_report/'.$report->id)}}" class="btn btn-primary">View</a>


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
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <table id="example1" class="table table-bordered table-striped">

                                    <thead>

                                    <tr>
                                        <th>Requisition ID</th>
                                        <th>Issue Date</th>
                                        <th>Gate Type</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($component as $key=>$report)

                                        <tr>
                                            <td>{{$report->component_requisition_id}}</td>
                                            <td>{{$report->issue_date}}</td>
                                            <td>{{$report->gate_type}}</td>
                                            <td>

                                                <a type="button" href="{{url('gate/component_out_report/'.$report->id)}}" class="btn btn-primary">View</a>


                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>

                        </div>


                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>

@endsection
