@extends('layouts.master')


@section('content')
    <section class="content pt-3">
        <div class="row">
            <div class="col-12">
                <!-- /.card -->
                @if(!empty($errors->first()))
                    <div class="alert alert-danger text-center">
                        <span>{{ $errors->first() }}</span>
                    </div>
                @endif
                @if(session()->has('message'))
                    <div class="alert alert-success text-center">
                        {{ session()->get('message') }}
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Approve Inward Material in Respective Store</h3>
                        <a href="{{url('store/assignStore')}}" class="btn btn-secondary btn-sm float-right">Back</a>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Sr</th>
                                <th>Material Name</th>
                                <th>Unit of Measurement</th>
                                <th>Quantity</th>
                                <th>Store</th>
                                <th>Store Approval Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $n=0; @endphp
                            @if(!$inward_raw_material->isempty())
                                @foreach($inward_raw_material as $item)
                                    @php $n++; @endphp
                                    <tr>
                                        <td>{{$n}}</td>
                                        <td>{{$item->materialName}}</td>
                                        <td>{{$item->uom}}</td>
                                        @php
                                            $qty=$item->qty;
                                            $rejectedQty=$item->rejectedQty;
                                            $totalQty=$qty-$rejectedQty;
                                        @endphp
                                        <td>{{$totalQty}}</td>
                                        <td>{{$item->storeLocation}}</td>
                                        <td>
                                            @if($item->status==5)
                                                <form action="{{url('store/submitFactoryInwardMaterialToStore')}}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="inward_raw_material_id" value="{{$item->id}}">
                                                    <input type="hidden" name="materialName" value="{{$item->materialName}}">
                                                    <input type="hidden" name="uom" value="{{$item->uom}}">
                                                    <input type="hidden" name="quantity" value="{{$totalQty}}">
                                                    <input type="hidden" name="storeLocation" value="{{$item->storeLocation}}">

                                                    <button type="submit" class="btn btn-sm btn-primary">Approve Store</button>
                                                </form>
                                            @else
                                                <button type="button" class="btn btn-sm btn-success">Approved</button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" class="text-center">No Data.</td>
                                </tr>
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
    </section>
@endsection
