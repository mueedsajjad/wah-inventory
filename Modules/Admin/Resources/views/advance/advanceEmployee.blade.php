@extends('layouts.master')

@section('content')

    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Advance</h3>
                            <a href="{{url('admin/advance')}}"  class="btn btn-primary float-right" >
                                Advance
                            </a>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="pageTable" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>No#</th>
                                    <th>Reciept No</th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Advance Date</th>
                                    <th>Advance Amount</th>
                                    <th>Installment</th>
                                    <th>Status</th>
                                    <th>Action<th>
                                </tr>
                                </thead>
                                <tbody>
                               @php $n=0; @endphp
                               @foreach($advances as $advance)
                               @php $n++; @endphp
                                <tr>
                                 <td>{{$n}}</td>
                                 <td>{{$advance->recieptNo}}</td>
                                 <td>{{$advance->user_id}}</td>
                                 <td>{{$advance->name}}</td>
                                 <td>{{$advance->date}}</td>
                                 <td>{{$advance->advanceDate}}</td>
                                 <td>{{$advance->advanceAmount}}</td>
                                 <td>{{$advance->installment}}</td>
                                 <td>
                                 @if($advance->status==0)
                                    <button class="btn btn-sm btn-primary">Pending</button>
                                
                                 @elseif($advance->status==1)
                                    <button class="btn btn-sm btn-success">Approved</button>
                                
                                 @elseif($advance->status==2)
                                    <button class="btn btn-sm btn-danger">Rejected</button>

                                    @elseif($advance->status==3)
                                        <button class="btn btn-sm btn-default">Issued Loan</button>
                                    @elseif($advance->status==4)
                                    <button class="btn btn-sm btn-success">Completed</button>
                                 @endif
                                 </td>
                                 <td>
                                 <!-- @if(auth()->user()->can('Accept Loan Request'))
                                        @if($advance->status==0)
                                    <a href="{{url('admin/acceptLeaveRequest/'.$advance->id)}}" class="btn btn-primary ml-1">Accept</a>
                                    <a href="{{url('admin/rejectLeaveRequest/'.$advance->id)}}" class="btn btn-danger ml-1">Reject</a>
                                        @endif
                                    @endif -->

                                    @if(auth()->user()->can('Apply For Loan'))
                                            @if($advance->status==0)
                                            <a href="#" class="btn btn-danger  ml-1 deleteSalary" data-id="{{$advance->id}}" type="button"  data-toggle="modal" data-target="#modal-delete">Delete</a>
                                            @endif
                                                @if($advance->status==1 || $advance->status==2)
                                                    <label>No Action To Perform</label>
                                                @endif
                                    @endif
                                 </td>
                                </tr>
                               @endforeach
                                </tbody>
                               
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>

            </div>
        </div>

        {{---------------------------------------------  Delete Model    -----------------------------------------}}
    <div class="modal fade" id="modal-delete">
        <div class="modal-dialog modal-md">
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
                                <form action="{{url('admin/advanceDelete')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="" id="salaryId">
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
    </section>
   
    <script>
     $('.deleteSalary').click(function (){
         var id=$(this).data("id");
        // console.log(id);
         $('#salaryId').val(id);
     })
    </script>
@endsection
