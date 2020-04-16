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
                        
                        <form action="{{url('admin/employeeSalaryDetails')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row form-group">
                                <label class="col-sm-3" for="exampleInputEmail1">Employee<span class="text-red">*</span></label>
                                <select class="col-sm-8 " id="entranceEmployee" name="Employee" required>
                                    <option selected disabled>Select Employee</option >
                                    @foreach($user as $employee)
                                         @if($employee->id!=1)
                                        <option value="{{$employee->id}}"> {{$employee->name}} </option >
                                         @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="row form-group">
                                    <label class="col-sm-3" for="exampleInputEmail1">Salary Month<span class="text-red">*</span></label>
                                    <input id="date" class="col-sm-8 form-control" name="salaryMonth" type="date" required>
                            </div>
                            
                            <div class="text-right mt-5">
                                    <!-- <a  href="#" id="calculator" class="btn btn-default mr-1 calculator">Cancel</a>
                                    -->
                                    <a href="{{url('admin/salaryEmployee')}}" class="btn btn-default mr-1">Cancel</a>
                                    
                                    <!-- <button class="btn btn-primary mr-4" type="submit">Calculate Salary</button>
                                    -->
                                    <a  href="#" id="calculator" class="btn btn-primary mr-4" >Calculate Salary</a>
                                
                                </div>
                            </form>
                            
                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mt-2">
                <div class="card p-3">
                    <div class="card-header">
                     Pay Salary
                    </div>

                    {{--  Entrance Time --}}
                    <div class="card-body row">
                        <div class="col-12 mt-5">
                        
                        <form action="{{url('admin/salaryStore')}}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Employee ID</label>
                                    
                                    <input id="id" value=""  name="userId"  required readonly class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Employee Name</label>
                                    <input id="name" value="" readonly required class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Salary</label>
                                    <input id="salary" name="salary" readonly value="" class="form-control"  required>
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

<script>
    // $('#entranceEmployeeStatus').on("change", function(e) {
    //     var status = $("#entranceEmployeeStatus").val();

    //     if(status==0){
    //         $('#entranceEmployeeTimeDiv').hide();
    //     }
    //     else if(status==1){
    //         $('#entranceEmployeeTimeDiv').show();
    //     }
    // });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#calculator').on("click", function(e) {
        var id=$("#entranceEmployee").val();
        var date=$("#date").val();
        //console.log(id);
        //var salary=
        //return;

        $.ajax({
            type:'POST',
            url:'{{url('admin/employeeSalaryDetails')}}',
            data:{'id': id,'date':date},
            success: function(data) {
                data=JSON.parse(data);
                var name =data.name;
                var id= data.user_id;
                var salary= data.salary;

                $('#id').val(id);
                $('#name').val(name);
                $('#salary').val(salary);
            },
            error: function (data) {
                var errors = data.responseJSON;
            }
        });
    });

    // $('#departureEmployee').on("change", function(e) {
    //     var id=$("#departureEmployee").val();

    //     $.ajax({
    //         type:'POST',
    //         url:'{{url('admin/departureEmployeeDetails')}}',
    //         data:{'id': id},
    //         success: function(data) {
    //             data=JSON.parse(data);
    //             var name =data.name;
    //             var id= data.id;

    //             $('#departureEmployeeId').val(id);
    //             $('#departureEmployeeName').val(name);
    //         },
    //         error: function (data) {
    //             var errors = data.responseJSON;
    //         }
    //     });
    // });
</script>
@endsection
