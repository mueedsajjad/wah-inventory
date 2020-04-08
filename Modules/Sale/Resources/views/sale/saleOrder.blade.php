@extends('layouts.master')

@section('content')

    <section class="content pt-3">
        <div class="container-fluid">
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
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">Latest Orders</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="pageTable">
                                    <thead>
                                    <tr class="bg-dark">
                                        <th>Sr #</th>
                                        <th>SO Number</th>
                                        <th>Customer</th>
                                        <th>Date</th>
                                        <th>Delivery Date</th>
                                        <th>Approval Status</th>
                                        <th>Order Details</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(!$orders->isempty())
                                        @php $i=0; @endphp
                                        @foreach($orders as $order)
                                            @php ++$i; @endphp
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>{{$order->so_number}}</td>
                                            <td>{{$order->customer_name}}</td>
                                            <td>{{date('d-m-Y', strtotime($order->date))}}</td>
                                            <td>{{date('d-m-Y', strtotime($order->delivery_date))}}</td>
                                            <td>
                                                @if($order->status==0)
                                                    <a class="getStatusData" data-toggle="modal" data-target="#changeStatusModal" data-id="{{$order->id}}">
                                                        <i class="fas fa-toggle-off fa-2x" style="color: #DA231A;"></i>
                                                    </a>
                                                @else
                                                    <i class="fas fa-toggle-on fa-2x" style="color: green;"></i>
                                                @endif
                                            </td>
                                            <td>
                                                <a type="button"  class="btn btn-primary btn-sm orderDetailBtn" data-toggle="modal" data-target="#orderDetailsModal"
                                                    data-so_number="{{$order->so_number}}" data-customer_name="{{$order->customer_name}}" data-date="{{date('d-m-Y', strtotime($order->date))}}"
                                                   data-delivery_date="{{date('d-m-Y', strtotime($order->delivery_date))}}">
                                                    Order Details
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="8" class="text-center text-danger">No Data</td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="orderDetailsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content modal-xl">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Order Details</h5>
                        <button type="button" class="close closebtn" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row justify-content-around">
                            <div class="col-md-3">
                                <div class="form-group row">
                                    <label for="sga_13" class="col-sm-4 col-form-label">SO Number</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly name="so_number" id="so_number" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group row">
                                    <label for="sga_13" class="col-sm-4 col-form-label">Date</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly id="date"  value="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group row">
                                    <label for="sga_13" class="col-sm-4 col-form-label">Delivery Date</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control" name="delivery_date" id="delivery_date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group row">
                                    <label for="sga_13" class="col-sm-4 col-form-label">Customer</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control" name="delivery_date" id="customer_name">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <table class="table table-bordered" id="pageTable">
                            <thead>
                            <tr class="bg-dark">
                                <th>Sr #</th>
                                <th>Product Code</th>
                                <th>Product  Name</th>
                                <th>Quantity</th>
                                <th>Description</th>
                            </tr>
                            </thead>
                            <tbody id="append_data">

                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary closebtn" data-dismiss="modal">Close</button>
                        {{--                                                <button type="button" class="btn btn-primary">Save changes</button>--}}
                    </div>
                </div>
            </div>
        </div>

        <!-- The change Status Modal -->
        <div class="modal fade" id="changeStatusModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{url('sale/changeApprovalStatus')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="" id="id" name="id">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Change Approval Status</h4>
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
    </section>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.orderDetailBtn').click(function () {
            $("#orderDetailsModal").modal({
                backdrop: 'static',
                keyboard: false
            });

            var so_number=$(this).data('so_number');
            $('#so_number').val(so_number);
            var customer_name=$(this).data('customer_name');
            $('#customer_name').val(customer_name);
            var date=$(this).data('date');
            $('#date').val(date);
            var delivery_date=$(this).data('delivery_date');
            $('#delivery_date').val(delivery_date);

            $.ajax({
                type: "POST",
                url: "{{url('sale/getSaleOrderProducts')}}",
                data: {'so_number': so_number},
                success:function(data)
                {
                    var html='';
                    var count=1;
                    data=jQuery.parseJSON(data);
                    if(data=='error'){
                        alert('Error');
                    }
                    else{
                        jQuery.each(data, function(index, item) {
                            html += '<tr><td>'+count+'</td><td>'+item.product_code+'</td><td>'+item.product_name+'</td><td>'+item.qty+'</td><td>'+item.description+'</td></tr>';
                            ++count;
                        });

                        $('#append_data').append(html);
                    }
                }
            });
        });

        $('.closebtn').click(function () {
            $('#append_data').text('');
        });

        $('.getStatusData').click(function () {
            var id=$(this).data('id');
            $('#id').val(id);
        });

    </script>
@endsection
