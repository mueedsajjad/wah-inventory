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

                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Add Advance</h3>
                            <a href="{{url('admin/advanceEmployee')}}" class="btn btn-primary btn-sm float-right">Back</a>
                        </div>
                        <div class="card-body">
                            <form action="{{url('admin/advanceStore')}}" method="post">
                            @csrf
                               <div class="row justify-content-around">
                                
                                    <div class="col-md-5">
                                        <div class="form-group row">
                                            <label for="sga_13" class="col-sm-4 col-form-label">Reciept No#</label>
                                            <div class="col-sm-8">
                                                <input type="text" readonly name="recieptNo" value="RN00{{$id}}"  class="form-control" id="sga_13" placeholder="RN001">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="sga_13" class="col-sm-4 col-form-label">Date</label>
                                            <div class="col-sm-8">
                                                <input type="date" readonly name="date" min="<?php echo date('Y-m-d'); ?>" value="<?php echo date('Y-m-d'); ?>" class="form-control" id="sga_43">
                                            </div>
                                     </div>

                                     <div class="form-group row">
                                         <label for="sga_13" class="col-sm-4 col-form-label" >Employee<span class="text-red">*</span></label>
                                         <div class="col-sm-8">
                                         <input type="text" readonly  value="{{Auth::user()->name}}"  class="form-control" id="sga_13" > 
                                        </div>
                                     </div>
                                     <div class="form-group row">
                                         <label for="sga_13" class="col-sm-4 col-form-label" >Employee ID<span class="text-red">*</span></label>
                                         <div class="col-sm-8">
                                         <input type="text" readonly name="user_id" value="{{Auth::user()->id}}"  class="form-control" id="sga_13" > 
                                        </div>
                                     </div>
                                       
                                    </div>

                                    <div class="col-md-5">
                                    
                                      <div class="form-group row">
                                            <label for="sga_13" class="col-sm-4 col-form-label">Advance Date <span class="text-red">*</span></label>
                                            <div class="col-sm-8">
                                                <input type="date" name="advanceDate" class="form-control" min="<?php echo date('Y-m-d'); ?>" value="<?php echo date('Y-m-d'); ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="sga_13" class="col-sm-4 col-form-label">Installment <span class="text-red">*</span></label>
                                            <div class="col-sm-8"> 
                                                <input type="number" name="installment" class="form-control" required> 
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="sga_13" class="col-sm-4 col-form-label">Amount <span class="text-red">*</span></label>
                                            <div class="col-sm-8">
                                                <input type="number" name="advanceAmount" class="form-control" id="sga_19" placeholder="5000" required>
                                            </div>
                                        </div>
                                          
                                    </div>
                                </div>
                                    
                                </div>

                                <div class="row justify-content-around">
                            
                                    <div class="col-12 mb-2">
                                        <a href="{{url('admin/advance')}}" class="btn btn-danger ml-3 float-right mr-1">Cancel</a>
                                        <!-- <a href="#" class="btn btn-success ml-3 float-right">Save & Print</a> -->
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
@endsection
