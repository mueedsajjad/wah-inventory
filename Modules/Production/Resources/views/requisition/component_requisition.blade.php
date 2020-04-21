@extends('layouts.master')


@section('content')

    <section class="content pt-5">
        <div class="container-fluid">

            @if($errors->any())
                <div class="alert alert-danger text-center">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

        @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="row">


                <div class="col-md-12">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Component Requisition To Store</h3>
                        </div>

                        <div class="card-body">

                            <form action="{{url('production/componentRequisitionStore')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row justify-content-around">

                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="sga_20" class="col-sm-4 col-form-label">Manufacturing No</label>
                                            <div class="col-sm-8">
                                                <select name="manufacturing_no" class="form-control" required>
                                                    <option selected disabled>Select</option>
                                                    @foreach($orders as $order)
                                                        <option value="{{$order->id}}">{{$order->manufacturing_order}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="sga_13" class="col-sm-4 col-form-label">Date</label>
                                            <div class="col-sm-8">
                                                <input type="text" readonly required value="{{date('d-m-Y')}}" class="form-control"
                                                       id="sga_19" placeholder="08-02-2020" >
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row justify-content-around">
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="sga_13" class="col-sm-4 col-form-label">Issue Date</label>
                                            <div class="col-sm-8">
                                                <input type="date"  name="issue_date" readonly required value="{{\Carbon\Carbon::now()->toDateString()}}" class="form-control" id="sga_19"
                                                >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="sga_13" class="col-sm-4 col-form-label">Requisition Type</label>
                                            <div class="col-sm-8">
                                                <select name="gate_type" id="" required class="form-control">
                                                    <option disabled selected>Select</option>
                                                    <option value="inward">In-Ward</option>
                                                    <option value="outward">Out-Ward</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-around">
                                    <div class="col-md-12">
                                        <div class="card card-secondary">
                                            <div class="card-header">
                                                <h3 class="card-title">Raw Material</h3>
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body table-responsive">
                                                <table class="table table-bordered">
                                                    <thead class="bg-light">

                                                    <tr>
                                                        <th style="width: 10%;">Sr#</th>
                                                        <th style="width: 30%;">Component Name</th>
                                                        <th style="width: 15%;">Qty</th>
                                                        <th>Component Description</th>
                                                    </tr>

                                                    </thead>
                                                    <tbody id="appendMaterial">
                                                    <tr>
                                                        <input name="countMaterial" type="hidden" value="1" id="countMaterial" >
                                                        <td>1</td>
                                                        <td>
                                                            <select name="materialName[]" class="form-control" required>
                                                                <option selected disabled>Select</option>
                                                                @foreach($components as $component)
                                                                    <option value="{{$component->component_name}}">{{$component->component_id}}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>

                                                        <td>
                                                            <input type="text" name="qty[]" class="form-control" id="" placeholder="" required>
                                                        </td>

                                                        <td>
                                                            <textarea rows="1" type="text" name="description[]" class="form-control" ></textarea>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <button class="btn btn-secondary btn-sm mt-3" type="button" id="addRow">
                                                    <i class="fas mr-2 fa-plus">
                                                        Add Row</i>
                                                </button>

                                                <button class="btn btn-danger btn-sm mt-3" type="button" id="deleteRow">
                                                    <i class="fas fa-trash">
                                                    </i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
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

    <script>
        $('#addRow').click(function () {
            var count=$('#countMaterial').val();
            ++count;
            var html='<tr id="deleteMaterial'+count+'">'+
                '<td>'+count+'</td>'+
                '<td>'+
                '<select name="materialName[]" required class="form-control select2">'+
                '<?php if(!$components->isempty()){
                    foreach($components as $component){ ?>'+
                '<option value="{{$component->component_name}}">{{$component->component_id}}</option>'+
                '<?php }
                    } ?>'+
                '</select>'+

                // '<select name="materialName[]" class="form-control select2">'+
                //     '<option value="brassHead">Brass Head</option>'+
                //     '<option value="primer">Primer</option>'+
                //     '<option value="baseWad">Base Wad</option>'+
                //     '<option value="opWad">OP Wad</option>'+
                //     '<option value="leadShot">Lead Shot</option>'+
                //     '<option value="closingDisc">Closing Disc</option>'+
                //     '<option value="tube">Tube</option>'+
                //     '<option value="propellant">Propellant</option>'+
                // '</select>'+

                '<td>'+
                '<input type="text" name="qty[]" class="form-control" id="" placeholder="" required>'+
                '</td>'+
                '<td>'+
                '<textarea rows="1" type="text" name="description[]" class="form-control"></textarea>'+
                '</td>'+
                '</tr>';


            $('#countMaterial').val(count);
            $('#appendMaterial').append(html);
        });

        $('#deleteRow').click(function () {
            var count = $('#countMaterial').val();
            if(count<2){
                return false;
            }
            else{
                $('#deleteMaterial'+count).remove();
                --count;
                $('#countMaterial').val(count);
            }
        });
    </script>
@endsection
