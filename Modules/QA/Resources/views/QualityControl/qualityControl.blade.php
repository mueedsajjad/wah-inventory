@extends('layouts.master')

@section('content')

<section class="content pt-3">
    <div class="container-fluid">
        <div class="row">


            <div class="col-md-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">Quality Control</h3>
                    </div>
                    <div class="card-body">
                        <form action="products.html">

                            <div class="row justify-content-around">
                                <div class="col-md-12">
                                    <div class="card card-dark">
                                        <!--<div class="card-header">
                                          <h3 class="card-title">Products</h3>
                                        </div>-->
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <table id="tabless" class="table table-bordered">
                                                <thead class="bg-light">
                                                <tr>
                                                    <th>Sr#</th>
                                                    <th>Inspection No</th>
                                                    <th>Location</th>
                                                    <th>Type</th>
                                                    <th>Qty</th>
                                                    <th>Unit Price</th>
                                                    <th>Amount</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>IN001</td>
                                                    <td>Store 2</td>
                                                    <td>Material</td>
                                                    <td>250</td>
                                                    <td>150</td>
                                                    <td>37500</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
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
