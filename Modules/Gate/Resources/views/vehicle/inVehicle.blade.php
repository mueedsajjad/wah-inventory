@extends('layouts.master')

@section('content')
    <section class="content pt-3">
        <div class="row">
            <div class="col-12">
                <!-- /.card -->
                @if(!empty($errors->first()))
                    <div class="alert alert-danger text-center">
                        <span>{{ $errors->first() }}</span>
                    </div>
                @endif
                @if(session()->has('message'))
                    <div class="alert alert-success text-center">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Vehicle In</h3>
                        <a class="btn btn-primary btn-sm float-right" href="{{url('gate/vehicleManagement')}}">Back</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="builtyTable" class="table table-bordered table-striped">
                                <thead>
                                <tr class="bg-secondary">
                                    <th>Sr#</th>
                                    <th>Record ID</th>
                                    <th>Vehicle No</th>
                                    <th>Vehicle Name</th>
                                    <th>Staff Name</th>
                                    <th>From</th>
                                    <th>Destination</th>
                                    <th>Out Date Time</th>
                                    <th>Out Meter Reading</th>
                                    <th>In Date Time</th>
                                    <th>In Meter Reading</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!$vehicles->isempty())
                                    @php $count=0; @endphp
                                    @foreach($vehicles as $item)
                                        @php ++$count; @endphp
                                        <tr>
                                            <td>{{$count}}</td>
                                            <td>{{$item->record_id}}</td>
                                            <td>{{$item->vehicle_no}}</td>
                                            <td>{{$item->vehicle_name}}</td>
                                            <td>{{$item->staff_name}}</td>
                                            <td>{{$item->from}}</td>
                                            <td>{{$item->to}}</td>
                                            <td>{{$item->out_time}}</td>
                                            <td>{{$item->out_meter_reading}}</td>
                                            <td>{{$item->in_time}}</td>
                                            <td>{{$item->in_meter_reading}}</td>
                                            <td>
                                                @if($item->status==0)
                                                    <a class="btn btn-sm btn-secondary getVehicleData" data-toggle="modal" data-target="#enterInVehicleDetailsModal"
                                                       data-id="{{$item->id}}" data-out_meter_reading="{{$item->out_meter_reading}}">
                                                        Enter Details
                                                    </a>
                                                @else
                                                    <button type="button" class="btn btn-sm btn-success">Vehicle Entered</button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>

    <!-- The add Inspection Note Modal -->
    <div class="modal fade" id="enterInVehicleDetailsModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{url('gate/submitInVehicle')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="sendId" name="sendId">
                    <input type="hidden" id="out_meter_reading" name="out_meter_reading">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Enter In Vehicle Details</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
{{--                        <div class="col-md-12">--}}
{{--                            <div class="form-group row">--}}
{{--                                <label class="col-sm-4 col-form-label">Out Date Time</label>--}}
{{--                                <div class="col-sm-8">--}}
{{--                                    @php date_default_timezone_set("Asia/Karachi"); @endphp--}}
{{--                                    <input type="text" readonly required name="in_time" value="{{date('d-m-Y H:i:s')}}" class="form-control">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">In Meter Reading</label>
                                <div class="col-sm-8">
                                    <input type="number" required name="in_meter_reading" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $('.getVehicleData').click(function () {
            var sendId=$(this).data("id");
            $('#sendId').val(sendId);

            var out_meter_reading=$(this).data("out_meter_reading");
            $('#out_meter_reading').val(out_meter_reading);
        });
    </script>
@endsection
