@extends('layouts.master')

@section('content')

    <section class="content pt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
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
                    <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title">Sent to Gate</h3>
                            <a href="{{url('store/dashboard')}}" class="btn btn-primary btn-sm float-right">Back</a>
                        </div>
                        <div class="card-body">
                            @if($sale->status==1)
                                <form action="{{url('store/storing_saless')}}" method="post" enctype="multipart/form-data">
                                    @csrf


                                    <input type="hidden" name="id_st" value="{{$sale->id}}">
                                    <div class="row justify-content-around">
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Driver ID</label>
                                                <div class="col-sm-8">
                                                    <input type="text" placeholder="CNIC" name="driver_cnic" value="" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Driver Name</label>
                                                <div class="col-sm-8">
                                                    <input type="text" required name="driver_name" value="" class="form-control" placeholder="Kaleem">
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row justify-content-around">
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Vehicle No#</label>
                                                <div class="col-sm-8">
                                                    <input type="text" placeholder="LER-9091" name="vehicle_number" value="" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                            </div>
                                        </div>
                                    </div>



                                    <div class="table-responsive">
                                        <table id="materialTable" class="table table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th>SO Number</th>
                                                <th>Date</th>
                                                <th>Delivery Date</th>
                                                <th>Customer Name</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <input type="hidden" name="so_id" value="{{$sale->id}}">
                                                <td>
                                                    <input type="text" readonly name="" value="{{$sale->so_number}}" class="form-control">
                                                </td>
                                                <td>
                                                    <input type="text" readonly name="" value="{{$sale->date}}" class="form-control">
                                                </td>
                                                <td>
                                                    <input type="text" readonly name="" value="{{$sale->delivery_date}}" class="form-control">
                                                </td>
                                                <td>
                                                    <input type="text" readonly name="" value="{{$sale->customer_name}}" class="form-control">
                                                </td>
                                            </tr>


                                            </tbody>
                                        </table>
                                    </div>















                                    <div class="col-md-11 mt-2">
                                        {{--                                        <a href="#" class="btn btn-secondary ml-3 float-right">Print</a>--}}
                                        <input type="submit" value="Sent Bilty To Gate" class="btn btn-success float-right">
                                    </div>

                                </form>


                            @elseif($sale->status>1)



                                <form action="{{url('store/storing_saless')}}" method="post" enctype="multipart/form-data">
                                    @csrf


                                    <input type="hidden" name="id_st" value="{{$sale->id}}">
                                    <div class="row justify-content-around">
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Driver ID</label>
                                                <div class="col-sm-8">
                                                    <input type="text" readonly placeholder="CNIC" name="driver_cnic" value="{{$sale->driver_id}}" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Driver Name</label>
                                                <div class="col-sm-8">
                                                    <input type="text" readonly required name="driver_name" value="{{$sale->driver_name}}" class="form-control" placeholder="Kaleem">
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row justify-content-around">
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Vehicle No#</label>
                                                <div class="col-sm-8">
                                                    <input type="text" readonly placeholder="LER-9091" name="vehicle_number" value="{{$sale->vehicle_number}}" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                            </div>
                                        </div>
                                    </div>



                                    <div class="table-responsive">
                                        <table id="materialTable" class="table table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th>SO Number</th>
                                                <th>Date</th>
                                                <th>Delivery Date</th>
                                                <th>Customer Name</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <input type="text" readonly name="" value="{{$sale->so_number}}" class="form-control">
                                                </td>
                                                <td>
                                                    <input type="text" readonly name="" value="{{$sale->date}}" class="form-control">
                                                </td>
                                                <td>
                                                    <input type="text" readonly name="" value="{{$sale->delivery_date}}" class="form-control">
                                                </td>
                                                <td>
                                                    <input type="text" readonly name="" value="{{$sale->customer_name}}" class="form-control">
                                                </td>
                                            </tr>


                                            </tbody>
                                        </table>
                                    </div>















{{--                                    <div class="col-md-11 mt-2">--}}
{{--                                        --}}{{--                                        <a href="#" class="btn btn-secondary ml-3 float-right">Print</a>--}}
{{--                                        <input type="submit" value="Save" class="btn btn-success float-right">--}}
{{--                                    </div>--}}

                                </form>


                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
