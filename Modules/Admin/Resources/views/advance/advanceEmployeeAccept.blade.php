@extends('layouts.master')

@section('content')

    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                @if(session()->has('save'))
            <div class="alert alert-success text-center" role="alert">
                <strong>Success</strong> {{session()->get('save')}}
            </div>
        @endif
        @if(session()->has('exists'))
            <div class="alert alert-danger text-center" role="alert">
                <strong>Warning</strong> {{session()->get('exists')}}
            </div>
        @endif
        
        @if(session()->has('advance'))
            <div class="alert alert-danger text-center" role="alert">
                <strong>Warning</strong> {{session()->get('advance')}}
            </div>
        @endif
        
        @if($errors->any())
            <div class="alert alert-danger text-center">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Advance</h3>
                            <!-- <a href="{{url('admin/advance')}}"  class="btn btn-primary float-right" >
                                Advance
                            </a> -->
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="pageTable" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <!-- <th>No#</th> -->
                                    <th>Reciept No</th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Advance Date</th>
                                    <th>Advance</th>
                                    <th>Installment</th>
                                    <th>Action<th>
                                </tr>
                                </thead>
                                <tbody>
                               @php $n=0; @endphp
                               @foreach($advances as $advance)
                               @php $n++; @endphp
                                <tr>
                                 <!-- <td>{{$n}}</td> -->
                                 <td>{{$advance->recieptNo}}</td>
                                 <td>{{$advance->user_id}}</td>
                                 <td>{{$advance->name}}</td>
                                 <td>{{$advance->date}}</td>
                                 <td>{{$advance->advanceDate}}</td>
                                 <td>{{$advance->advanceAmount}}</td>
                                 <td>{{$advance->installment}}</td>
                                 <td>
                                 @if(auth()->user()->can('Accept Loan Request'))
                                        @if($advance->status==0)
                                         <a href="{{url('admin/loanAccept/'.$advance->id)}}" class="btn btn-sm btn-primary ">Accept</a>
                                         <a href="{{url('admin/loanReject/'.$advance->id)}}" class="btn btn-sm btn-danger ">Reject</a>
                                        @elseif($advance->status==1)
                                        <button class="btn btn-sm btn-success">Approved</button>
                                        <a href="{{url('admin/loanIssue/'.$advance->id)}}" class="btn btn-sm btn-danger ">Issue Loan</a>
                                        @elseif($advance->status==2)
                                        <button class="btn btn-sm btn-danger">Rejected</button>
                                        @elseif($advance->status==3)
                                        <button class="btn btn-sm btn-default">Issued Loan</button>
                                        @elseif($advance->status==4)
                                        <button class="btn btn-sm btn-success">Completed</button>
                                        @endif
                                    @endif

                                    <!-- @if(auth()->user()->can('Apply For Request'))
                                            @if($advance->status==0)
                                               <a href="#" class="btn btn-danger  ml-1 deleteMaterial" data-id="{{$advance->id}}" type="button"  data-toggle="modal" data-target="#modal-delete">Delete</a>
                                            @endif
                                                @if($advance->status==1 || $advance->status==2)
                                                    <label>No Action To Perform</label>
                                                @endif
                                    @endif -->
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
                                <form action="{{url('admin/salaryDelete')}}" method="post" enctype="multipart/form-data">
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
    <!-- $('.deleteMaterial').click(function () {
        var id=$(this).data("id");
        //console.log(id);
        $('#materialId').val(id);
    }); -->
    <script>
     $('.deleteSalary').click(function (){
         var id=$(this).data("id");
        // console.log(id);
         $('#salaryId').val(id);
     })
    </script>
@endsection
