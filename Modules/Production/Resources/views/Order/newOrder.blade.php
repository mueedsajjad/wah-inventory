@extends('layouts.master')


@section('content')
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title">New Manufacturing Order</h3>
                        </div>
                        <div class="card-body">
                            <form action="#">

                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Manufacturing Order #</label>
                                            <input type="text" class="form-control" placeholder="MO-1">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Production Deadline</label>
                                            <input type="text" class="form-control" placeholder="27-Feb-2020">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Created Date</label>
                                            <input type="text" class="form-control" placeholder="27-Feb-2020">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Products</label>
                                            <input type="text" class="form-control" placeholder="MO-1">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <input type="text" class="form-control" placeholder="27-Feb-2020">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Total Cost</label>
                                            <input type="text" class="form-control" placeholder="50000 PKR">
                                        </div>
                                    </div>

                                </div>

                            </form>



                            <div class="row">
                                <div class="col-md-12">



                                    <div class="card card-light">
                                        <div class="card-header">
                                            <h3 class="card-title">Ingredients</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <table class="table table-bordered">
                                                <thead class="bg-light">
                                                <tr>
                                                    <th>Sr.#</th>
                                                    <th>Items</th>
                                                    <th>Notes</th>
                                                    <th>Quantity</th>
                                                    <th>Cost</th>
                                                    <th>Availability</th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Primer</td>
                                                    <td>--------</td>
                                                    <td>1</td>
                                                    <td>150</td>
                                                    <td class="bg-success">
                                                        <button type="button" class="btn text-white" data-toggle="modal" data-target="#modal-default">
                                                            Available
                                                        </button>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a class="btn" href="#">
                                                            <i class="fas fa-plus-square mr-2">
                                                            </i>Buy
                                                        </a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a class="btn btn-danger btn-sm" href="#">
                                                            <i class="fas fa-trash">
                                                            </i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Tube</td>
                                                    <td>--------</td>
                                                    <td>1</td>
                                                    <td>75</td>
                                                    <td class="bg-danger">
                                                        <button type="button" class="btn text-white" data-toggle="modal" data-target="#modal-default">
                                                            Not Available
                                                        </button>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a class="btn" href="#">
                                                            <i class="fas fa-plus-square mr-2">
                                                            </i>Buy
                                                        </a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a class="btn btn-danger btn-sm" href="#">
                                                            <i class="fas fa-trash">
                                                            </i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Brass Head</td>
                                                    <td>--------</td>
                                                    <td>1</td>
                                                    <td>80</td>
                                                    <td class="bg-success">
                                                        <button type="button" class="btn text-white" data-toggle="modal" data-target="#modal-default">
                                                            Available
                                                        </button>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a class="btn" href="#">
                                                            <i class="fas fa-plus-square mr-2">
                                                            </i>Buy
                                                        </a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a class="btn btn-danger btn-sm" href="#">
                                                            <i class="fas fa-trash">
                                                            </i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>Base Wad</td>
                                                    <td>--------</td>
                                                    <td>1</td>
                                                    <td>90</td>
                                                    <td class="bg-success">
                                                        <button type="button" class="btn text-white" data-toggle="modal" data-target="#modal-default">
                                                            Available
                                                        </button>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a class="btn" href="#">
                                                            <i class="fas fa-plus-square mr-2">
                                                            </i>Buy
                                                        </a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a class="btn btn-danger btn-sm" href="#">
                                                            <i class="fas fa-trash">
                                                            </i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>5</td>
                                                    <td>OP Wad</td>
                                                    <td>--------</td>
                                                    <td>1</td>
                                                    <td>90</td>
                                                    <td class="bg-success">
                                                        <button type="button" class="btn text-white" data-toggle="modal" data-target="#modal-default">
                                                            Available
                                                        </button>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a class="btn" href="#">
                                                            <i class="fas fa-plus-square mr-2">
                                                            </i>Buy
                                                        </a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a class="btn btn-danger btn-sm" href="#">
                                                            <i class="fas fa-trash">
                                                            </i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>6</td>
                                                    <td>Closing Disk</td>
                                                    <td>--------</td>
                                                    <td>1</td>
                                                    <td>90</td>
                                                    <td class="bg-yellow">
                                                        <button type="button" class="btn text-dark" data-toggle="modal" data-target="#modal-default">
                                                            Expected 28-Feb-2020
                                                        </button>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a class="btn" href="#">
                                                            <i class="fas fa-plus-square mr-2">
                                                            </i>Buy
                                                        </a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a class="btn btn-danger btn-sm" href="#">
                                                            <i class="fas fa-trash">
                                                            </i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>7</td>
                                                    <td>Lead Shots</td>
                                                    <td>--------</td>
                                                    <td>1</td>
                                                    <td>90</td>
                                                    <td class="bg-success">
                                                        <button type="button" class="btn text-white" data-toggle="modal" data-target="#modal-default">
                                                            Available
                                                        </button>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a class="btn" href="#">
                                                            <i class="fas fa-plus-square mr-2">
                                                            </i>Buy
                                                        </a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a class="btn btn-danger btn-sm" href="#">
                                                            <i class="fas fa-trash">
                                                            </i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>8</td>
                                                    <td>Obtrature</td>
                                                    <td>--------</td>
                                                    <td>1</td>
                                                    <td>90</td>
                                                    <td class="bg-success">
                                                        <button type="button" class="btn text-white" data-toggle="modal" data-target="#modal-default">
                                                            Available
                                                        </button>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a class="btn" href="#">
                                                            <i class="fas fa-plus-square mr-2">
                                                            </i>Buy
                                                        </a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a class="btn btn-danger btn-sm" href="#">
                                                            <i class="fas fa-trash">
                                                            </i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>9</td>
                                                    <td>Propellant</td>
                                                    <td>--------</td>
                                                    <td>1</td>
                                                    <td>90</td>
                                                    <td class="bg-success">
                                                        <button type="button" class="btn text-white" data-toggle="modal" data-target="#modal-default">
                                                            Available
                                                        </button>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a class="btn" href="#">
                                                            <i class="fas fa-plus-square mr-2">
                                                            </i>Buy
                                                        </a>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a class="btn btn-danger btn-sm" href="#">
                                                            <i class="fas fa-trash">
                                                            </i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <a class="btn btn-secondary btn-sm mt-3  " href="#">
                                                <i class="fas mr-2 fa-plus">
                                                    Add Row</i>
                                            </a>
                                        </div>
                                    </div>




                                    <div class="card card-light">
                                        <div class="card-header">
                                            <h3 class="card-title">STAGES</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <table class="table table-bordered">
                                                <thead class="bg-light">
                                                <tr>
                                                    <th>Sr.#</th>
                                                    <th>Operation Steps</th>
                                                    <th>Resource</th>
                                                    <th>Time</th>
                                                    <th>Cost</th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Stage 1</td>
                                                    <td>--------</td>
                                                    <td>1h 15m</td>
                                                    <td>150</td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <div class="p-2 px-3 bg-light">
                                                                <i class="fa fa-play"></i>
                                                            </div>
                                                            <div class="px-3 p-2 bg-yellow">
                                                                <i class="fa fa-hourglass-half"></i>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a class="btn btn-danger btn-sm" href="#">
                                                            <i class="fas fa-trash">
                                                            </i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Stage 2</td>
                                                    <td>--------</td>
                                                    <td>2h 30m</td>
                                                    <td>75</td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <div class="p-2 px-3 bg-light">
                                                                <i class="fa fa-play"></i>
                                                            </div>
                                                            <div class="px-3 p-2 bg-yellow">
                                                                <i class="fa fa-hourglass-half"></i>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a class="btn btn-danger btn-sm" href="#">
                                                            <i class="fas fa-trash">
                                                            </i>
                                                        </a>
                                                    </td>
                                                </tr>

                                                </tbody>
                                            </table>
                                            <a class="btn btn-secondary btn-sm mt-3  " href="#">
                                                <i class="fas mr-2 fa-plus">
                                                    Add Row
                                                </i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <a href="#" class="btn btn-danger ml-3 float-right">Cancel</a>
                                    <a href="#" class="btn btn-success ml-3 float-right">Save & Print</a>
                                    <input type="submit" value="Save" class="btn btn-success float-right">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section>

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Default Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>One fine body&hellip;</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection
