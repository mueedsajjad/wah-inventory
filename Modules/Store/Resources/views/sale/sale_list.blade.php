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
                            <h3 class="card-title">Products ready to Sale</h3>
                            <a href="{{url('store/dashboard')}}" class="btn btn-primary btn-sm float-right">Back</a>
                        </div>
                        <div class="card-body">
                                <div class="table-responsive">
                                    <table id="tabless" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>SO Number</th>
                                            <th>Date</th>
                                            <th>Delivery Date</th>
                                            <th>Customer Name</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($sales_list as $data)
                                        <tr>
                                            <td>
                                                <input type="text" readonly name="" value="{{$data->so_number}}" class="form-control">
                                            </td>
                                            <td>
                                                <input type="text" readonly name="" value="{{$data->date}}" class="form-control">
                                            </td>
                                            <td>
                                                <input type="text" readonly name="" value="{{$data->delivery_date}}" class="form-control">
                                            </td>
                                            <td>
                                                <input type="text" readonly name="" value="{{$data->customer_name}}" class="form-control">
                                            </td>
                                            <td>
                                                <a href="{{url('/store/sale_store_to_gate/'.$data->id)}}" class="btn btn-primary">Proceed</a>
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
        </div>
    </section>
    <script>
        $( document ).ready(function() {
            $('#tabless').dataTable();
        });
    </script>
@endsection
