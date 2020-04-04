@extends('layouts.master')

@section('content')

    <section class="content pt-5">
        <div class="container-fluid">
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
            <div class="row">


                <div class="col-md-12">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Material Requisition To Store</h3>
                        </div>

                        <div class="card-body">

                            <form action="{{url('production/materialRequisitionStore')}}" method="post" enctype="multipart/form-data">
                                @csrf




                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="sga_13" class="col-sm-4 col-form-label">Issue Date</label>
                                            <div class="col-sm-8">
                                                <input type="date"  name="issue_date"  required value="{{\Carbon\Carbon::now()->toDateString()}}" class="form-control" id="sga_19" readonly>
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
                                                        <th style="width: 15%;">Material Name</th>
                                                        <th style="width: 15%;">UOM</th>
                                                        <th style="width: 15%;">Qty</th>
                                                        <th >Material Description</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="appendMaterial">
                                                    <tr>
                                                        <input name="countMaterial" type="hidden" value="1" id="countMaterial">
                                                        <td>1</td>
                                                        <td>
                                                            <select name="materialName[]" class="form-control ">
                                                                <option selected disabled>Select</option>
                                                                @if(!$components->isempty())
                                                                    @foreach($components as $unit)
                                                                        <option value="{{$unit->id}}">{{$unit->component_name}}</option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </td>
                                                        <td>

                                                            <select name="uom[]" class="form-control ">
                                                                <option selected disabled>Select</option>
                                                                @if(!$units->isempty())
                                                                    @foreach($units as $unit)
                                                                        <option value="{{$unit->id}}">{{$unit->name}}</option>
                                                                    @endforeach
                                                                @endif
                                                            </select>

                                                        </td>
                                                        <td>
                                                            <input type="text" name="qty[]" class="form-control" id="" placeholder="">
                                                        </td>
                                                        <td>
                                                            <textarea rows="1" type="text" name="description[]" class="form-control"></textarea>
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

                '<select name="materialName[]" class="form-control select2">'+
                '<?php if(!$components->isempty()){
                    foreach($components as $data){ ?>'+
                '<option value="{{$data->id}}">{{$data->component_name}}</option>'+
                '<?php }
                    } ?>'+
                '</select>'+
                '</td>'+
                '<td>'+
                '<select name="uom[]" class="form-control select2">'+
                '<?php if(!$units->isempty()){
                    foreach($units as $unit){ ?>'+
                '<option value="{{$unit->id}}">{{$unit->name}}</option>'+
                '<?php }
                    } ?>'+
                '</select>'+
                '</td>'+
                '<td>'+
                '<input type="text" name="qty[]" class="form-control" id="" placeholder="">'+
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