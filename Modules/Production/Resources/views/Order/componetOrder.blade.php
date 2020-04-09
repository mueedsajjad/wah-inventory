@extends('layouts.master')

@section('content')

    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    @if(session()->has('save'))
                        <div class="alert alert-success" role="alert">
                            <strong>Success</strong> {{session()->get('save')}}
                        </div>
                    @endif


                    <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title">New Component Manufacturing Order</h3>
                        </div>

                        <div class="card-body">
                            <form action="{{url('production/orderComponentStore')}}" method="post">
                                @csrf
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Manufacturing Order #</label>
                                            <input type="text" name="manufacturing_order" readonly class="form-control" value="CO-{{$id}}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Component Deadline</label>
                                            <input type="date" name="production_deadline" class="form-control" placeholder="27-Feb-2020" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Created Date</label>
                                            <input type="date" name="create_date" class="form-control" placeholder="27-Feb-2020" required>
                                        </div>
                                    </div>

                                    @php($component = \Illuminate\Support\Facades\DB::table('component')->get())
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Component</label>
                                            <select name="component_name" id="" class="form-control" required>
                                                <option disabled>Select Component</option>
                                                @foreach($component as $data)
                                                    <option value="{{$data->component_name}}">{{$data->component_id}}</option>
                                                @endforeach
                                            </select>
{{--                                            <input type="text" name="component_name" class="form-control" placeholder="Tube" required>--}}
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <input type="number" name="quantity" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Total Cost</label>
                                            <input type="number" name="total_cost" class="form-control" placeholder="00000" required>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-12">
                                    <a href="#" class="btn btn-danger ml-3 float-right">Cancel</a>
                                    <a href="#" class="btn btn-success ml-3 float-right">Save & Print</a>
                                    <input type="submit" value="Save" class="btn btn-success float-right">
                                </div>

                            </form>


                            {{--                            <div class="row">--}}
                            {{--                                <div class="col-md-12">--}}

                            {{--                                    <div class="card card-light">--}}
                            {{--                                        <div class="card-header">--}}
                            {{--                                            <h3 class="card-title">Ingredients</h3>--}}
                            {{--                                        </div>--}}
                            {{--                                        <!-- /.card-header -->--}}
                            {{--                                        <div class="card-body">--}}
                            {{--                                            <div class="col-md-12">--}}
                            {{--                                                <div class="card card-dark">--}}
                            {{--                                                    <!--<div class="card-header">--}}
                            {{--                                                      <h3 class="card-title">Products</h3>--}}
                            {{--                                                    </div>-->--}}
                            {{--                                                    <!-- /.card-header -->--}}

                            {{--                                                    <div class="card-body">--}}
                            {{--                                                        --}}{{--                                               here is all  --}}

                            {{--                                                        <div id="append_condition">--}}
                            {{--                                                            <input type="hidden" id="countConditions"  name="countConditions" value="0">--}}
                            {{--                                                            <div class="row">--}}

                            {{--                                                                <div class="form-group col-md-3 bg-light">--}}
                            {{--                                                                    <label for="sga_13" class="col-form-label">#No</label>--}}
                            {{--                                                                    <input disabled class="form-control"  name="p_number[]" value="1">--}}
                            {{--                                                                </div>--}}

                            {{--                                                                <div class="form-group col-md-3 bg-light">--}}

                            {{--                                                                    <label for="sga_13" class="col-form-label">Items</label>--}}
                            {{--                                                                    <select class="form-control" name="items[]">--}}
                            {{--                                                                        --}}{{----}}{{--                                                                        @foreach()--}}
                            {{--                                                                        <option >Hello</option>--}}
                            {{--                                                                        --}}{{----}}{{--                                                                        @endforeach--}}
                            {{--                                                                    </select>--}}

                            {{--                                                                    <input type="text" class="form-control"  name="p_number0" placeholder="Primer">--}}
                            {{--                                                                </div>--}}

                            {{--                                                                <div class="form-group col-md-3 bg-light">--}}
                            {{--                                                                    <label for="sga_13" class="col-form-label">Quantity</label>--}}
                            {{--                                                                    <input type="text" class="form-control"  name="quantity[]" >--}}
                            {{--                                                                </div>--}}

                            {{--                                                                <div class="form-group col-md-3 bg-light">--}}
                            {{--                                                                    <label for="sga_13" class="col-form-label">Cost</label>--}}
                            {{--                                                                    <input type="text" class="form-control" name="p_cost[]" >--}}
                            {{--                                                                </div>--}}

                            {{--                                                            </div>--}}
                            {{--                                                        </div>--}}

                            {{--                                                        <div class="row">--}}
                            {{--                                                            <div class="col-6 text-left">--}}
                            {{--                                                                <a id="create_condition_btn" class="btn btn-secondary btn-sm mt-3" type="button" href="#">--}}
                            {{--                                                                    <i class="fas mr-2 fa-plus">Add Row</i>--}}
                            {{--                                                                </a>--}}
                            {{--                                                            </div>--}}

                            {{--                                                            <div class="col-6 text-right">--}}
                            {{--                                                                <button class="btn btn-danger btn-sm" type="button" id="remove_condition_btn">--}}
                            {{--                                                                    <i class="fas fa-trash">--}}
                            {{--                                                                    </i>--}}
                            {{--                                                                </button>--}}
                            {{--                                                            </div>--}}

                            {{--                                                        </div>--}}


                            {{--                                                    </div>--}}
                            {{--                                                </div>--}}
                            {{--                                            </div>--}}

                            {{--                                        </div>--}}
                            {{--                                    </div>--}}



                            {{--                                    <div class="card card-light">--}}
                            {{--                                        <div class="card-header">--}}
                            {{--                                            <h3 class="card-title">STAGES</h3>--}}
                            {{--                                        </div>--}}
                            {{--                                        <!-- /.card-header -->--}}
                            {{--                                        <div class="card-body">--}}
                            {{--                                            <div id="append_stage">--}}
                            {{--                                                <input type="hidden" id="countStage"  name="countStage" value="0">--}}
                            {{--                                                <div class="row">--}}

                            {{--                                                    <div class="form-group col-md-1 bg-light">--}}
                            {{--                                                        <label for="sga_13" class="col-form-label">Sr.#</label>--}}
                            {{--                                                        <input disabled class="form-control"  value="1">--}}
                            {{--                                                    </div>--}}

                            {{--                                                    <div class="form-group col-md-3 bg-light">--}}
                            {{--                                                        <label for="sga_13" class="col-form-label">Operation Steps</label>--}}
                            {{--                                                        <input type="text" class="form-control"  name="operation[]">--}}
                            {{--                                                    </div>--}}

                            {{--                                                    <div class="form-group col-md-3 bg-light">--}}
                            {{--                                                        <label for="sga_13" class="col-form-label">Resource</label>--}}
                            {{--                                                        <select class="form-control" name="user_id[]">--}}
                            {{--                                                            --}}{{----}}{{--                                                                        @foreach()--}}
                            {{--                                                            <option >Fezan</option>--}}
                            {{--                                                            --}}{{----}}{{--                                                                        @endforeach--}}
                            {{--                                                        </select>--}}
                            {{--                                                    </div>--}}

                            {{--                                                    <div class="form-group col-md-3 bg-light">--}}
                            {{--                                                        <label for="sga_13" class="col-form-label">Time</label>--}}
                            {{--                                                        <input type="text" class="form-control" name="time[]" >--}}
                            {{--                                                    </div>--}}

                            {{--                                                    <div class="form-group col-md-2 bg-light">--}}
                            {{--                                                        <label for="sga_13" class="col-form-label">Cost</label>--}}
                            {{--                                                        <input type="text" class="form-control" name="cost[]" >--}}
                            {{--                                                    </div>--}}
                            {{--                                                </div>--}}
                            {{--                                            </div>--}}

                            {{--                                            <div class="row">--}}
                            {{--                                                <div class="col-6 text-left">--}}
                            {{--                                                    <a id="create_stage_btn" class="btn btn-secondary btn-sm mt-3" type="button" href="#">--}}
                            {{--                                                        <i class="fas mr-2 fa-plus">Add Row</i>--}}
                            {{--                                                    </a>--}}
                            {{--                                                </div>--}}

                            {{--                                                <div class="col-6 text-right">--}}
                            {{--                                                    <button class="btn btn-danger btn-sm" type="button" id="remove_stage_btn">--}}
                            {{--                                                        <i class="fas fa-trash">--}}
                            {{--                                                        </i>--}}
                            {{--                                                    </button>--}}
                            {{--                                                </div>--}}

                            {{--                                        </div>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                                <div class="col-12">--}}
                            {{--                                    <a href="#" class="btn btn-danger ml-3 float-right">Cancel</a>--}}
                            {{--                                    <a href="#" class="btn btn-success ml-3 float-right">Save & Print</a>--}}
                            {{--                                    <input type="submit" value="Save" class="btn btn-success float-right">--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section>

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Default Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>One fine body&hellip;</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <script src="{{asset('public/plugins/jquery/jquery.min.js')}}"></script>

    <script>
        $('#create_condition_btn').click(function(){
            var countConditions=$('#countConditions').val();
            ++countConditions;
            var condition=countConditions+1;
            $('#countConditions').val(countConditions);
            var html =
                ' <div class="row">'+
                ' <div id="number'+countConditions+'" class="form-group col-3"> <input disabled class="form-control"  name="p_number[]" value="'+condition+'"> </div>'+
                ' <div id="p_number'+countConditions+'" class="form-group col-3"> <select class="form-control"  name="items[]"><option>hello</option> </select> </div>'+
                ' <div id="p_quantity'+countConditions+'" class="form-group col-3"> <input type="text" class="form-control"  name="quantity[]" placeholder="100"> </div> '+
                ' <div id="p_price'+countConditions+'" class="form-group col-3"> <input type="text" class="form-control"  name="p_cost[]" placeholder="120"> </div>'+
                '</div>'

            $('#append_condition').append(html);
        });

        $('#remove_condition_btn').click(function(){
            var countConditions=$('#countConditions').val();

            if(countConditions<1){
                return false;
            }

            $('#number'+countConditions).remove();
            $('#p_number'+countConditions).remove();
            $('#p_quantity'+countConditions).remove();
            $('#p_price'+countConditions).remove();

            --countConditions;
            $('#countConditions').val(countConditions);
        });

        // --------------------------- product staging ------------------------------ //

        $('#create_stage_btn').click(function(){
            var countStage=$('#countStage').val();

            ++countStage;
            // var stage=countStage+1;
            $('#countStage').val(countStage);
            var html =
                ' <div class="row">'+
                ' <div id="sr'+countStage+'" class="form-group col-1"> <input disabled class="form-control"  name="sr[]" value="'+stage+'"> </div>'+
                ' <div id="operation'+countStage+'" class="form-group col-3"> <input type="text" class="form-control"  name="operation[]"> </div>'+
                ' <div id="user_id'+countStage+'" class="form-group col-3"> <select class="form-control"  name="user_id[]"><option>hello</option> </select> </div>'+
                '   <div id="time'+countStage+'" class="form-group col-3"> <input type="text" class="form-control"  name="time[]" placeholder="100"> </div> '+
                '  <div id="cost'+countStage+'" class="form-group col-2"> <input type="text" class="form-control"  name="cost[]" placeholder="120"> </div>'+

                '</div>'

            $('#append_stage').append(html);
        });

        $('#remove_stage_btn').click(function(){
            var countStage=$('#countStage').val();

            if(countStage<1){
                return false;
            }
            $('#sr'+countStage).remove();
            $('#operation'+countStage).remove();
            $('#user_id'+countStage).remove();
            $('#time'+countStage).remove();
            $('#cost'+countStage).remove();
            --countStage;
            // var stage=countStage+1;
            $('#countStage').val(countStage);
        });

    </script>
@endsection
