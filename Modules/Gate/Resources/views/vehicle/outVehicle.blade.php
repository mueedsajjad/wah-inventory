@extends('layouts.master')
@section('content')
    <section class="content pt-5">
        <div class="container-fluid">
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
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Vehicle Out</h3>
                            <a class="btn btn-primary btn-sm float-right" href="{{url('gate/vehicleManagement')}}">Back</a>
                        </div>
                        <div class="card-body">
                            <form action="{{url('gate/submitVehicleOut')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row justify-content-around">
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Record No</label>
                                            <div class="col-sm-8">
                                                <input type="text" readonly required name="record_id" value="V00{{$countOutVehicle}}" class="form-control" placeholder="V001">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">From</label>
                                            <div class="col-sm-8">
                                                <input type="text" required readonly value="Factory" name="from" class="form-control" placeholder="Factory">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Destination</label>
                                            <div class="col-sm-8">
                                                <input type="text" required name="to" class="form-control" placeholder="Customer">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Out Meter Reading</label>
                                            <div class="col-sm-8">
                                                <input type="number" required name="out_meter_reading" class="form-control" placeholder="0001548">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
{{--                                        <div class="form-group row">--}}
{{--                                            <label class="col-sm-4 col-form-label">Out Date Time</label>--}}
{{--                                            <div class="col-sm-8">--}}
{{--                                                @php date_default_timezone_set("Asia/Karachi"); @endphp--}}
{{--                                                <input type="text" readonly required name="out_time" value="{{date('d-m-Y H:i:s')}}" class="form-control" placeholder="11-02-2020">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Vehicle No</label>
                                            <div class="col-sm-8">
                                                <input type="text" required name="vehicle_no" class="form-control" placeholder="LEV-8442-07">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Vehicle Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" required name="vehicle_name" class="form-control" placeholder="Truck">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Staff ID</label>
                                            <div class="col-sm-8">
                                                <input type="text" required name="staff_id" class="form-control" placeholder="SI001">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Staff Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" required name="staff_name" class="form-control" placeholder="Khalid Mehmood">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-around">
                                    <div class="col-12">
                                        <a href="#" class="btn btn-secondary ml-1 float-right">Print</a>
                                        <button type="submit" class="btn btn-success float-right">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
