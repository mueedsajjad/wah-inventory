@extends('layouts.master')

@section('content')
    <section class="content pt-3">
        <div class="row">
            <div class="col-12">
                <!-- /.card -->
                @if(!empty($errors->first()))
                    <div class="alert alert-danger"  style="text-align: center">
                        <span>{{ $errors->first() }}</span>
                    </div>
                @endif
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Raw Material List</h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="text-right mb-3 ">
                            <a class="btn btn-primary btn-sm" href="{{url('store/addMaterial')}}">
                                <i class="fas fa-plus">
                                </i>
                                Add Product
                            </a>
                            <a class="btn btn-primary btn-sm" href="{{url('store/dashboard')}}">
                                <i class="fas fa-tachometer-alt"></i>
                                Dashboard
                            </a>
                        </div>

                        <div class="table-responsive">
                            <table id="materialTable" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Sr#</th>
                                    <th>Product Name</th>
                                    <th>Product Description</th>
                                    <th>Category</th>
                                    <th>Unit Of Measurement</th>
                                    <th>Quantity</th>
                                    <th>Location</th>
                                    <th>Status</th>
                                    <th>Rate</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!$products->isempty())
                                    @php $count=0; @endphp
                                    @foreach($products as $item)
                                        @php ++$count; @endphp
                                        <tr>
                                            <td>{{$count}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->description}}</td>
                                            <td>{{$item->category}}</td>
                                            <td>{{$item->uof}}</td>
                                            <td>{{$item->qty}}</td>
                                            <td>{{$item->storeLocation}}</td>
                                            <td>{{$item->status}}</td>
                                            <td>{{$item->rate}}</td>
                                            <td class="project-actions">
                                                <a class="btn btn-primary btn-sm getMaterialData" data-toggle="modal" data-target="#viewModal"
                                                   data-id="{{$item->id}}" data-name="{{$item->name}}" data-description="{{$item->description}}"
                                                   data-category="{{$item->category}}" data-uof="{{$item->uof}}" data-qty="{{$item->qty}}"
                                                   data-storelocation="{{$item->storeLocation}}" data-status="{{$item->status}}" data-rate="{{$item->rate}}">
                                                    <i class="fas fa-folder">View</i>
                                                </a>
                                                <a class="btn btn-info btn-sm getMaterialData" data-toggle="modal" data-target="#editModal"
                                                   data-id="{{$item->id}}" data-name="{{$item->name}}" data-description="{{$item->description}}"
                                                   data-category="{{$item->category}}" data-uof="{{$item->uof}}" data-qty="{{$item->qty}}"
                                                   data-storelocation="{{$item->storeLocation}}" data-status="{{$item->status}}" data-rate="{{$item->rate}}">
                                                    <i class="fas fa-pencil-alt">Edit</i>
                                                </a>
                                                <a class="btn btn-danger btn-sm deleteMaterial" data-toggle="modal" data-target="#deleteModal" data-id="{{$item->id}}">
                                                    <i class="fas fa-trash">Delete</i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>


    <!-- The Edit Modal -->
    <div class="modal fade" id="editModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Product</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="{{url('store/submitEditedMaterial')}}" method="post" enctype="multipart/form-data">
                @csrf
                <!-- Modal body -->
                    <div class="modal-body">
                        <input type="hidden" value="" class="materialId" name="materialId">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="sga_14" class="col-sm-4 col-form-label">Product Name</label>
                                <div class="col-sm-8">
                                    <input type="text" required name="name" class="form-control editname" placeholder="ABCD">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="sga_15" class="col-sm-4 col-form-label">Product Description</label>
                                <div class="col-sm-8">
                                    <input type="text" required name="description" class="form-control editdescription"  placeholder="Product Description Here...">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Category</label>
                                <div class="col-sm-8">
                                    <select class="form-control select2 editcategory" required name="category">
                                        @if(!$categories->isempty())
                                            @foreach($categories as $category)
                                                <option value="{{$category->name}}">{{$category->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Unit Of Measurement</label>
                                <div class="col-sm-8">
                                    <select class="form-control select2 edituof" required name="uof">
                                        @if(!$units->isempty())
                                            @foreach($units as $unit)
                                                <option value="{{$unit->name}}">{{$unit->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="sga_16" class="col-sm-4 col-form-label">Quantity</label>
                                <div class="col-sm-8">
                                    <input type="text" required name="qty" class="form-control editqty"  placeholder="250">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Location</label>
                                <div class="col-sm-8">
                                    <select class="form-control select2 editstoreLocation" required name="storeLocation">
                                        @if(!$stores->isempty())
                                            @foreach($stores as $store)
                                                <option value="{{$store->name}}">{{$store->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Status</label>
                                <div class="col-sm-8">
                                    <select class="form-control select2 editstatus" required name="status">
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="sga_16" class="col-sm-4 col-form-label">Rate</label>
                                <div class="col-sm-8">
                                    <input type="text" required name="rate" class="form-control editrate" placeholder="175">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- The View Modal -->
    <div class="modal fade" id="viewModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">View Product</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="sga_14" class="col-sm-4 col-form-label">Product Name</label>
                            <div class="col-sm-8">
                                <input type="text" readonly required name="name" class="form-control editname" placeholder="ABCD">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="sga_15" class="col-sm-4 col-form-label">Product Description</label>
                            <div class="col-sm-8">
                                <input type="text" readonly required name="description" class="form-control editdescription" id="sga_15" placeholder="Product Description Here...">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Category</label>
                            <div class="col-sm-8">
                                <select class="form-control select2 editcategory" disabled required name="category">
                                    @if(!$categories->isempty())
                                        @foreach($categories as $category)
                                            <option value="{{$category->name}}">{{$category->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Unit Of Measurement</label>
                            <div class="col-sm-8">
                                <select class="form-control select2 edituof" disabled required name="uof">
                                    @if(!$units->isempty())
                                        @foreach($units as $unit)
                                            <option value="{{$unit->name}}">{{$unit->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="sga_16" class="col-sm-4 col-form-label">Quantity</label>
                            <div class="col-sm-8">
                                <input type="text" required readonly name="qty" class="form-control editqty" id="sga_17" placeholder="250">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Location</label>
                            <div class="col-sm-8">
                                <select class="form-control select2 editstoreLocation" disabled required name="storeLocation">
                                    @if(!$stores->isempty())
                                        @foreach($stores as $store)
                                            <option value="{{$store->name}}">{{$store->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Status</label>
                            <div class="col-sm-8">
                                <select class="form-control select2 editstatus" disabled required name="status">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="sga_16" class="col-sm-4 col-form-label">Rate</label>
                            <div class="col-sm-8">
                                <input type="text" required readonly name="rate" class="form-control editrate" id="sga_16" placeholder="175">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

    <!-- The Delete Modal -->
    <div class="modal fade" id="deleteModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{url('store/deleteMaterial')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="" id="materialId" name="materialId">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Product</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        Are You Sure you want to delete this?
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        $( document ).ready(function() {
            $('#materialTable').DataTable();
        });

        $('.getMaterialData').click(function () {
            var id=$(this).data("id");
            var name=$(this).data("name");
            var description=$(this).data("description");
            var category=$(this).data("category");
            var uof=$(this).data("uof");
            var qty=$(this).data("qty");
            var storeLocation=$(this).data("storelocation");
            var status=$(this).data("status");
            var rate=$(this).data("rate");

            $('.materialId').val(id);
            $('.editname').val(name);
            $('.editdescription').val(description);
            $(".editcategory").select2().val(category).trigger("change");
            $('.edituof').select2().val(uof).trigger("change");
            $('.editqty').val(qty);
            $('.editstoreLocation').select2().val(storeLocation).trigger("change");
            $('.editstatus').select2().val(status).trigger("change");
            $('.editrate').val(rate);
        });

        $('.deleteMaterial').click(function () {
            var id=$(this).data("id");
            $('#materialId').val(id);
        });
    </script>
@endsection

