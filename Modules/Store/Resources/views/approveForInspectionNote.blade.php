@extends('layouts.master')

@section('content')
    <section class="">
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
                        <h3 class="card-title">Assign Store to Bilty Materials</h3>
                        <a href="{{url('/')}}" class="btn btn-secondary btn-sm float-right">Back</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="builtyTable" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Sr#</th>
                                    <th>Gate Pass ID</th>
                                    <th>Type</th>
                                    <th>Name</th>
                                    <th>UOM</th>
                                    <th>Quantity</th>
                                    <th>Description</th>
                                    <th>Date</th>
                                    <th style="width: 15%;">Send for Inspection Status</th>
{{--                                    <th style="width: 20%;">Assign Store</th>--}}
                                </tr>
                                </thead>
                                <tbody>
                                @if(!$inward_raw_material->isempty())
                                    @php $count=0; @endphp
                                    @foreach($inward_raw_material as $item)
                                        @php ++$count; @endphp
                                        <tr>
                                            <td>{{$count}}</td>
                                            <td>{{$item->gatePassId}}</td>
                                            <td>{{$item->itemType}}</td>
                                            <td>{{$item->materialName}}</td>
                                            <td>{{$item->uom}}</td>
                                            <td>{{$item->qty}}</td>
                                            <td>{{$item->description}}</td>
                                            <td>{{$item->date}}</td>
                                            <td>
                                                @if($item->status==1)
                                                    <a class="getBiltyData" data-toggle="modal" data-target="#changeUnloadStatusModal" data-gatepassid="{{$item->gatePassId}}"
                                                        data-materialname="{{$item->materialName}}">
                                                        <i class="fas fa-toggle-off fa-2x" style="color: #DA231A;"></i>
                                                    </a>
                                                @else
                                                    <i class="fas fa-toggle-on fa-2x" style="color: green;"></i>
                                                @endif
                                            </td>
{{--                                            <td>--}}
{{--                                                @if(Empty($item->storeLocation))--}}
{{--                                                    <form action="{{url('store/submitAssignedStore/'.$item->id)}}" method="post" enctype="multipart/form-data">--}}
{{--                                                        @csrf--}}
{{--                                                        <input type="hidden" value="{{$item->materialName}}" name="materialName">--}}
{{--                                                        <input type="hidden" value="{{$item->itemType}}" name="itemType">--}}
{{--                                                        <div class="row">--}}
{{--                                                            <select name="storeLocation" style="width: 70%;" class="form-control">--}}
{{--                                                                @if(!$stores->isempty())--}}
{{--                                                                    @foreach($stores as $store)--}}
{{--                                                                        <option value="{{$store->name}}">{{$store->name}}</option>--}}
{{--                                                                    @endforeach--}}
{{--                                                                @endif--}}
{{--                                                            </select>--}}
{{--                                                            <button type="submit" class="btn btn-success btn-sm ml-1">Submit</button>--}}
{{--                                                        </div>--}}
{{--                                                    </form>--}}
{{--                                                @else--}}
{{--                                                    {{$item->storeLocation}}--}}
{{--                                                @endif--}}
{{--                                            </td>--}}
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>

    <!-- The change Unload Status Modal -->
    <div class="modal fade" id="changeUnloadStatusModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{url('store/sendForInspection')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="" id="gatepassid" name="gatepassid">
                    <input type="hidden" value="" id="materialname" name="materialname">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Send For Inspection</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        Are You Sure you want to change the status?
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        $('.getBiltyData').click(function () {
            var gatepassid=$(this).data("gatepassid");
            $('#gatepassid').val(gatepassid);
            var materialname=$(this).data("materialname");
            $('#materialname').val(materialname);
        });
    </script>
    <script>
        $( document ).ready(function() {
            $('#builtyTable').DataTable();
        });
    </script>
@endsection
