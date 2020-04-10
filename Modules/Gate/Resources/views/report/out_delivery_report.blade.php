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
                                    <th>Sale Order Number</th>
                                    <td>{{$delivery_details->so_number}}</td>
                                </tr>
                                <tr>
                                    <th>Delivery date</th>
                                    <td>{{$delivery_details->delivery_date}}</td>
                                </tr>

                                <tr>
                                        <th>Customer Name</th>
                                        <td>{{$delivery_details->customer_name}}</td>
                                 </tr>
                                <tr>
                                    <th>Driver Name</th>
                                    <td>{{$delivery_details->driver_name}}</td>
                                </tr>
                                 <tr>
                                        <th>Driver CNIC</th>
                                        <td>{{$delivery_details->driver_id}}</td>
                                 </tr>

                                <tr>
                                    <th>Vehicle Number</th>
                                    <td>{{$delivery_details->vehicle_number}}</td>
                                </tr>

                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                            <hr>

                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>Product Code</th>
                                    <th>UOM</th>
                                    <th>Quantity</th>
                                    <th>Description</th>

                                </tr>

                                @foreach($delivery_table as $key=>$row)
                                    <?php
                                      $uom=\Illuminate\Support\Facades\DB::table('unit')->where('id',$row->uom)->first();
                                      $uom_name=$uom->name;
                                      ?>
                                    <tr>
                                        <td>{{$row->product_code}}</td>
                                        <td>{{$uom_name}}</td>
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


