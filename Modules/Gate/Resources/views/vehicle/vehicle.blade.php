@extends('layouts.master')

@section('content')

    <section class="content pt-5">
        <div class="container-fluid">
            <div class="row">


                <div class="col-md-12">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Vehicle Record</h3>
                        </div>
                        <div class="card-body">
                            <form action="products.html">


                                <div class="row justify-content-around">

                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Record No</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" placeholder="V001">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Vehicle No</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" placeholder="LEV-8442-07">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">From</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" placeholder="Factory">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">To</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" placeholder="Customer">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Driver</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" placeholder="Khalid Mehmood">
                                            </div>
                                        </div>



                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Date</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" placeholder="11-02-2020">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Out Meter Reading</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" placeholder="0001548">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">In Meter Reading</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" placeholder="0001637">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Distance (km)</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" placeholder="89">
                                            </div>
                                        </div>



                                    </div>
                                </div>



                                <div class="row justify-content-around">

                                    <div class="col-md-4">


                                    </div>
                                    <div class="col-md-4">


                                    </div>
                                </div>



                                <div class="row justify-content-around">

                                    <div class="col-md-4">


                                    </div>
                                    <div class="col-md-4">


                                    </div>
                                </div>




                                <div class="row justify-content-around">
                                    <div class="col-12">
                                        <a href="#" class="btn btn-danger ml-3 float-right">Cancel</a>
                                        <a href="#" class="btn btn-success ml-3 float-right">Save & Print</a>
                                        <input type="submit" value="Save" class="btn btn-success float-right">
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
