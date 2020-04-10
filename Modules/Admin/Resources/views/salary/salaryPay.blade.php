@extends('layouts.master')

@section('content')

    <div class="content pt-5">
    <div class="container-fluid">
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
        
        @if($errors->any())
            <div class="alert alert-danger text-center">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <div class="col-md-12">
            <div class="card p-3">
                <h3>
                    Salary To Employee
                    <a href="{{url('admin/salary')}}" class="btn btn-secondary btn-sm float-right">Back</a>
                </h3>
            </div>
        </div>

        <div class="row mr-0">
            <div class="col-md-6 mt-2">
                <div class="card p-3">
                    <div class="card-header">
                       Salary
                    </div>

                    {{--  Entrance Time --}}
                    <div class="card-body row">
                        <div class="col-12 mt-5">
                            
                            <form action="{{url('admin/salaryStore')}}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Employee ID</label>
                                    
                                    <input value="{{$salaryEmployee->user_id}}"  name="userId"  required readonly class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Employee Name</label>
                                    <input value="{{$salaryEmployee->name}}" readonly required class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Salary</label>
                                    <input name="salary" readonly value="{{$netSalary}}" class="form-control"  required>
                                </div>
                                



                                <div class="text-right">
                                    <a href="{{url('admin/salaryEmployee')}}" class="btn btn-default mr-1">Cancel</a>
                                    <button class="btn btn-primary" type="submit"> <i class="fa fa-save pr-1" style="color: white;"></i>Save</button>
                                </div>
                            </form>
                           
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</div>


@endsection
