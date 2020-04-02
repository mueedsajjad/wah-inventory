@extends('layouts.master')


@section('content')
    <section class="content pt-5">
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
                        <h3 class="card-title">Material Requisitions</h3>
                        <a href="{{url('store/issueRequisition')}}" class="btn btn-secondary btn-sm float-right">Back</a>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr class="bg-dark">
                                <th>Sr</th>
                                <th>Material Name</th>
                                <th>Required Quantity</th>
                                <th>Issue Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $n=0; @endphp
                            @foreach($production_material_detail as $item)
                                @php $n++; @endphp
                                <tr>
                                    <td>{{$n}}</td>
                                    <td>{{$item->material_name}}</td>
                                    <td>{{$item->quantity}}</td>
                                    <td>
                                        @if($item->status==0)
                                            <a href="{{url('store/issueRequisition/proceedMaterialRequisition/'.$item->id.'/'.$item->material_name.'/'.$item->quantity)}}" class="btn btn-sm btn-secondary">Proceed</a>
                                        @else
                                            <button type="button" class="btn btn-sm btn-success">Issued</button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
    </section>
@endsection
