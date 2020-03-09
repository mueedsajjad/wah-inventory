@extends('layouts.master')

@section('content')

    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Add Advance</h3>
                        </div>
                        <div class="card-body">
                            <form action="products.html">
                                <div class="row justify-content-around">
                                    <div class="col-md-4">

                                        <div class="form-group row">
                                            <label for="sga_13" class="col-sm-4 col-form-label">Employee ID</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="sga_13" placeholder="E001">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="sga_13" class="col-sm-4 col-form-label">Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="sga_43" placeholder="Khalid Mehmood">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Advance Month</label>
                                            <div class="col-sm-8">
                                                <select class="form-control select2">
                                                    <option selected="selected">Jan</option>
                                                    <option>Feb</option>
                                                    <option>Mar</option>
                                                    <option>Apr</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Advance Year</label>
                                            <div class="col-sm-8">
                                                <select class="form-control select2">
                                                    <option selected="selected">2020</option>
                                                    <option>2021</option>
                                                    <option>2022</option>
                                                    <option>2023</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-4">

                                        <div class="form-group row">
                                            <label for="sga_13" class="col-sm-4 col-form-label">Previous Advance</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="sga_19" placeholder="5000">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="sga_13" class="col-sm-4 col-form-label">New Advance</label>
                                            <div class="col-sm-8">
                                                <input type="email" class="form-control" id="sga_13" placeholder="2000">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="sga_13" class="col-sm-4 col-form-label">Total Advance</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="sga_13" placeholder="7000">
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
                                    <div class="col-md-12">
                                    </div>
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
