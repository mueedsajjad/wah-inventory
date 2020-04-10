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
                                    <td>{{$data->component_requisition_id}}</td>
                                </tr>
                                <tr>
                                    <th>Gate Type</th>
                                    <td>{{$data->gate_type}}</td>
                                </tr>

                                <tr>
                                    <th>	Issue Date</th>
                                    <td>{{$data->issue_date}}</td>
                                </tr>
                                <tbody>
                                </tbody>
                            </table>
                            <hr>

                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>Component Name</th>
{{--                                    <th>UMO</th>--}}
                                    <th> Quantity</th>
                                    <th>Description</th>

                                </tr>

                                @foreach($report_data as $key=>$row)
                                    <tr>
                                        <td>{{$row->component_name}}</td>
{{--                                        <td>{{$row->uom}}</td>--}}
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

