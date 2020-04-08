@extends('layouts.master')

@section('headSection')

    <link rel="stylesheet" href="{{ asset('public/plugins/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/print_jquery/print.css') }}" media="print" />
@endsection

@section('content')
    <section class="">
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4 mt-2">
                <form id="dateHearing" action="{{ route('dateHearing') }}" method="POST" >
                    @csrf
                    <div class="d-flex">
                        <div class="form-group row p-0 m-0">
                            <label class="col-sm-3 col-form-label">From</label>
                            <div class="col-sm-9">
                                <input type="date" name="fromDate" id="fromDate" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row p-0 m-0">
                            <label class="col-sm-2 col-form-label">To</label>
                            <div class="col-sm-10">
                                <input type="date" onchange="myFunction()" name="toDate" id="toDate" class="form-control">
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>

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
                        <h3 class="card-title">New Bilty Arrivals</h3>
                        {{--                        <a href="{{url('/')}}" class="btn btn-sm btn-secondary">Back</a>--}}
                        <a href="{{url('/')}}" class="btn btn-secondary btn-sm float-right">Back</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="builtyTable" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Sr#</th>
                                    <th>Gate Pass ID</th>
                                    <th>Driver Name</th>
                                    <th>Vehicle #</th>
                                    <th>Date</th>
                                    <th>Inward Receiving</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!$inward_gate_pass->isempty())
                                    @php $count=0; @endphp
                                    @foreach($inward_gate_pass as $item)
                                        @php ++$count; @endphp
                                        <tr>
                                            <td>{{$count}}</td>
                                            <td>{{$item->gatePassId}}</td>
                                            <td>{{$item->driverName}}</td>
                                            <td>{{$item->vehicalNo}}</td>
                                            <td>{{$item->date}}</td>
                                            <td>
                                                @if($item->status==0)
                                                    <a class="getBiltyData" data-toggle="modal" data-target="#changeUnloadStatusModal" data-gatepassid="{{$item->gatePassId}}">
                                                        <i class="fas fa-toggle-off fa-2x" style="color: #DA231A;"></i>
                                                    </a>
                                                @else
                                                    <i class="fas fa-toggle-on fa-2x" style="color: green;"></i>
                                                @endif
                                            </td>
                                            <td>
                                                <button type="button" onclick="getDetail({{$item->id}})" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalCenter">
                                                    View Inward Details
                                                </button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLongTitle">Bilty Details</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body" id="data">
                                                                ...
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                {{--                                                <button type="button" class="btn btn-primary">Save changes</button>--}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div></td>
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
            <!-- /.col -->
        </div>

        <!-- /.row -->
    </section>


    <!-- The Bilty Details Modal -->
    <div class="modal fade" id="biltyDetailsModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content modal-lg">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Bilty Details</h4>
                    <button type="button" class="close closebtn" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="print_card modal-body" id="mome">

                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button id="print" class="btn btn-info">Print</button>
                    <button type="button" class="btn btn-secondary closebtn" data-dismiss="modal" >Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- The change Unload Status Modal -->
    <div class="modal fade" id="changeUnloadStatusModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{url('store/changeUnloadStatus_out')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="" id="gatepassid" name="gatepassid">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Change Unload Status</h4>
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


    <script src="{{ asset('public/print_jquery/printThis.js') }}"></script>
    <script>
        $('#print').click(function () {
            // $(".l_p").hide();
            // $('a').each(function() {
            //     $(this).data('href', $(this).attr('href')).removeAttr('href');
            // });
            $('.print_card').printThis();
        });
    </script>
    <script>
        $( document ).ready(function() {
            $('#builtyTable').DataTable();
        });

        $('.getBiltyData').click(function () {
            var gatepassid=$(this).data("gatepassid");
            $('#gatepassid').val(gatepassid);
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        {{--$('.getBiltyDetailsbtn').click(function () {--}}
        {{--    //prevent Bootstrap modal from closing when clicking outside--}}
        {{--    console.log('mosm');--}}
        {{--    $("#biltyDetailsModal").modal({--}}
        {{--        backdrop: 'static',--}}
        {{--        keyboard: false--}}
        {{--    });--}}

        {{--    var gatepassid=$(this).data("gatepassid");--}}
        {{--    console.log(gatepassid);--}}
        {{--    $.ajax({--}}
        {{--        type:'get',--}}
        {{--        url:'{{url('store/viewBuiltyDetails')}}/'+gatepassid,--}}
        {{--        success: function(data) {--}}
        {{--                $('#mome').append(data);--}}
        {{--        },--}}
        {{--});--}}

        function getDetail(data) {
            console.log(data);
            var path = location.pathname.split('/');
            var app=path[1];
            console.log(app);
            $.ajax({
                type: "GET",
                url: "/"+app+"/store/viewBuiltyDetails_out/"+data,
                success:function(data)
                {
                    $("#data").html(data);
                }
            });
        }

        $('.closebtn').click(function () {
            $('#append_details').text('');
        });

    </script>
    <script>
        function myFunction(){

            if(document.getElementById("fromDate").value != ''){

                document.getElementById("dateHearing").submit();
            }
        }
    </script>
@endsection
