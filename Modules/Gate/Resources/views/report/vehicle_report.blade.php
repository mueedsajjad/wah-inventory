@extends('gate::report.report')


@section('data')

    <div class="col-md-12">
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Vehicle Report</h3>
            </div>
            <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-6 mt-2">
                    <form id="dateHearing" action="{{ route('vehicle_gate_date') }}" method="POST" >
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
                    <a class="btn btn-success" href="{{url('/gate/vehicle_Date_current_month')}}">Current Month</a>
                </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body">

                        <table id="builtyTable" class="table table-bordered table-striped">

                            <thead>

                            <tr>
                                <th>SR#</th>
                                <th>Vehicle Number</th>
                                <th>Vehicle  Name</th>
                                <th>Staff ID</th>
                                <th>Staff Name</th>
                                <th>From</th>
                                <th>Destination</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($vehicle_data as $key=>$data)
                                <tr>
                                    <td>{{$data->record_id}}</td>
                                    <td>{{$data->vehicle_no}}</td>
                                    <td>{{$data->vehicle_name}}</td>
                                    <td>{{$data->staff_id}}</td>
                                    <td>{{$data->staff_name}}</td>
                                    <td>{{$data->from}}</td>
                                    <td>{{$data->to}}</td>
                                    <td>
                                        <?php
                                         $modal=str_random(5);
                                        ?>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{$modal}}">
                                            View Report
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="{{$modal}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header ">
                                                        <h5 class="modal-title" id="exampleModalLabel">Vehicle report</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
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
                                                                            <th>SR#</th>
                                                                            <td>{{$data->record_id}}</td>                                                                        </tr>
                                                                        <tr>
                                                                            <th>Vehicle Number</th>
                                                                            <td>{{$data->vehicle_no}}</td>

                                                                        </tr>

                                                                            <tr>
                                                                                <th>Vehicle  Name</th>
                                                                                <td>{{$data->vehicle_name}}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Staff ID</th>
                                                                                <td>{{$data->staff_id}}</td>
                                                                            </tr>

                                                                            <tr>
                                                                                <th>Staff Name</th>
                                                                                <td>{{$data->staff_name}}</td>
                                                                            </tr>

                                                                            <tr>
                                                                                <th>From</th>
                                                                                <td>{{$data->from}}</td>
                                                                            </tr>

                                                                            <tr>
                                                                                <th>Destination</th>
                                                                                <td>{{$data->to}}</td>
                                                                            </tr>

                                                                        <tr>
                                                                            <th>Outward Meter Reading</th>
                                                                            <td>{{$data->out_meter_reading}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Out Time</th>
{{--                                                                            <td>{{$data->out_time}}</td>--}}
                                                                            <td>{{date('h:i:s a m/d/Y', strtotime($data->out_time))}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Inward Meter Reading</th>
                                                                            <td>{{$data->in_meter_reading}}</td>
                                                                        </tr>

                                                                        <tr>
                                                                            <th>In Time</th>
                                                                            <td>{{date('h:i:s a m/d/Y', strtotime($data->in_time))}}</td>
{{--                                                                            <td>{{$data->in_time}}</td>--}}
                                                                        </tr>

                                                                        <tr>
                                                                                <th>Distance Covered</th>
                                                                                <td>{{$data->distance}}</td>
                                                                         </tr>

                                                                        </thead>
                                                                        <tbody>
                                                                        </tbody>
                                                                    </table>
                                                                    <hr>


                                                                    <div class="text-lg-right">
                                                                        <button class="btn btn-primary" onclick="printContent('{{$modal}}')">Print</button>
                                                                    </div>

                                                                </div>
                                                                <!-- /.card-body -->
                                                            </div>

                                                        </div>


                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                            </table>

            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <script type="text/javascript">

        function printContent(el){
            var restorepage = document.body.innerHTML;
            var printcontent = document.getElementById(el).innerHTML;
            document.body.innerHTML=printcontent;
            window.print();
            // document.body.innerHTML=restorepage;
            location.reload(true);
        }

        $( document ).ready(function() {
            $('#builtyTable').DataTable();
        });


        function myFunction(){

            if(document.getElementById("fromDate").value != ''){

                document.getElementById("dateHearing").submit();
            }
        }
    </script>

@endsection
