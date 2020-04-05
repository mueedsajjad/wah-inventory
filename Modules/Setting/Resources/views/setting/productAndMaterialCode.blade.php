@extends('layouts.master')

@section('content')

    <section class="content pt-3">
        <div class="container-fluid">

            @if(session()->has('save'))
                <div class="alert alert-success" role="alert">
                    <strong>Success</strong>{{session()->get('save')}}
                </div>
            @endif

                @if(session()->has('exists'))
                    <div class="alert alert-danger" role="alert">
                        <strong>Fail</strong> {{session()->get('exists')}}
                    </div>
                @endif

            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Material Item Code</h3>
                            <button type="button" class="btn btn-primary float-right ml-3" data-toggle="modal" data-target="#modal-employeeUnderManager">
                            Add Item Code
                            </button>
                        </div>
                        <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title">Material Item Code</h3>
                        </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-striped" id="pageTable">
                                <thead>
                                <tr>
                                    <th>#No</th>
                                    <th>Name</th>
                                    <th>Code</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                               @php $n=0; @endphp
                               @foreach($materials as $material)
                               @php $n++; @endphp
                                <tr>
                                   <td>{{$n}}</td>
                                   <td>{{$material->material_name}}</td>
                                   <td>{{$material->material_code}}</td>
                                   <td><button class="btn btn-danger deleteMaterial"  data-id="{{$material->id}}"   data-toggle="modal" data-target="#modal-delete" type="button" id="deleteMaterial">Delete</button></td>
                                </tr>
                                @endforeach
                         
                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>

                <!-- product code -->
                <div class="col-md-12">
                    <div class="card">
                        
                        <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title">Product Item code</h3>
                        </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-striped" id="pageTable">
                                <thead>
                                <tr>
                                    <th>#No</th>
                                    <th>Name</th>
                                    <th>Code</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                               @php $n=0; @endphp
                               @foreach($products as $product)
                               @php $n++; @endphp
                                <tr>
                                   <td>{{$n}}</td>
                                   <td>{{$product->product_name}}</td>
                                   <td>{{$product->product_code}}</td>
                                   <td><a href="{{url('setting/deleteProductCode/'.$product->id)}}" class="btn btn-danger">Delete</a></td>
                                </tr>
                                @endforeach
                         
                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>

            </div>


                <div class="modal fade" id="modal-employeeUnderManager">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Add Item code</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card-body">
                                            <form action="{{url('setting/productAndMateralCodeStore')}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row justify-content-around">

                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <label class="col-sm-4 col-form-label">Name</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="name" class="form-control"  placeholder="Name" required>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Type</label>
                                                        <div class="col-sm-8">
                                                            <select class="form-control " name="type" required>
                                                                <option selected="selected" disabled>Select</option>
                                                                <option value="0">Product</option>
                                                                <option value="1">Material</option>
                                                            </select>
                                                        </div>
                                                    </div>


                                                        <div class="form-group row">
                                                            <label class="col-sm-4 col-form-label"></label>
                                                            <div class="col-sm-8">
                                                                <button type="submit" class="btn btn-dark">Submit</button>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>

                                            </form>
                                        </div>



                                    </div>

                                </div>
                            </div>
                            <!--
                                        <div class="modal-footer justify-content-between">
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                          <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                            -->
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>

    <div class="modal fade" id="modal-delete">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Record</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                                <form action="{{url('setting/deleteMaterialCode')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="" id="materialId">
                                    <label> Do you want to delete Record?</label>
                                    <div class="row justify-content-around">

                                        <div class="col-md-12">

                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <button  type="button" class="btn btn-default float-right"  data-dismiss="modal" >No</button>
                                                    <button type="submit" class="btn btn-danger float-right mr-1">Yes</button>
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
        </div>


        <div class="modal fade" id="modal-product-delete">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Record</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                                <form action="{{url('setting/deleteProductCode')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="" id="productId">
                                    <label> Do you want to delete Record?</label>
                                    <div class="row justify-content-around">

                                        <div class="col-md-12">

                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <button  type="button" class="btn btn-default float-right"  data-dismiss="modal" >No</button>
                                                    <button type="submit" class="btn btn-danger float-right mr-1">Yes</button>
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
        </div>

       

                <script>
        $('.deleteMaterial').click(function () {
            var id=$(this).data("id");
            console.log(id);
            $('#materialId').val(id);
        });

        $('.deleteProduct').click(function () {
            var id=$(this).data("id");
            console.log(id);
            $('#productId').val(id);
        });
    </script>
    </section>
@endsection
