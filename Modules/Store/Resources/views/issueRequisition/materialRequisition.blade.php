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
                                <th>Inward/Outward</th>
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
                                        @if($item->gate_type=='inward')
                                            @if($item->status==1)
                                                <a href="{{url('store/issueRequisition/proceedComponentRequisition/'.$item->id.'/'.$item->component_name.'/'.$item->quantity)}}" class="btn btn-sm btn-secondary">Proceed</a>
                                            @elseif($item->status==3)
                                                <button type="button" class="btn btn-sm btn-success">Issued</button>
                                            @elseif($item->status==5)
                                                <button type="button" class="btn btn-sm btn-success">Received by Production</button>
                                            @endif
                                        @elseif($item->gate_type=='outward')
                                            @if($item->status==1)
                                                <button type="button" class="btn btn-sm btn-secondary">Outward</button>

                                            @elseif($item->status==4)
                                                <button type="button" class="btn btn-sm btn-secondary">Forwarded For Outward</button>
                                            @endif
                                        @endif
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            @if($item->gate_type=='inward')
                                                @if($item->status==3)
                                                    <a class="btn btn-success">Inward Done</a>
                                                @else
                                                    <a class="btn btn-primary">Inward</a>
                                                @endif
                                            @elseif($item->gate_type=='outward')
                                                @if($item->status==4)
                                                    <a class="btn btn-success">Forwarded Outward</a>
                                                @elseif($item->status==1)
                                                    <a href="{{url('/store/forwarded_to_gate_mat/'.$item->id)}}" class="btn btn-primary">Forward For Outward</a>
                                                @endif
                                            @endif
                                        </div>
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
