@extends('layouts.master')

<style>
    .steps{min-height:90px;padding:30px 0 0 0;font-family:'Open.steps .steps-container li.activated .step .step-image span Sans', sans-serif;position:relative}.steps .steps-container{background:#DDD;height:10px;width:100%;border-radius:10px   ;-moz-border-radius:10px   ;-webkit-border-radius:10px   ;-ms-border-radius:10px   ;margin:0;list-style:none}.steps .steps-container li{text-align:center;list-style:none;float:left}.steps .steps-container li .step{padding:0 50px}.steps .steps-container li .step .step-image{margin:-14px 0 0 0}.steps .steps-container li .step .step-image span{background-color:#DDD;display:block;width:37px;height:37px;margin:0 auto;border-radius:37px   ;-moz-border-radius:37px   ;-webkit-border-radius:37px   ;-ms-border-radius:37px   }.steps .steps-container li .step .step-current{font-size:11px;font-style:italic;color:#999;margin:8px 0 0 0}.steps .steps-container li .step .step-description{font-size:13px;font-style:italic;color:#538897}.steps .steps-container li.activated .step .step-image span{background-color:#da231a}.steps .steps-container li.activated .step .step-image span:after{background-color:#FFF;display:block;content:'';position:absolute;z-index:1;width:27px;height:27px;margin:5px;border-radius:27px   ;-moz-border-radius:27px   ;-webkit-border-radius:27px   ;-ms-border-radius:27px   ;box-shadow: 4px 4px 0px 0px rgba(0,0,0,0.15) ;-moz-box-shadow: 4px 4px 0px 0px rgba(0,0,0,0.15) ;-webkit-box-shadow: 4px 4px 0px 0px rgba(0,0,0,0.15) }.steps .step-bar{background-color:#da231a;height:10px;position:absolute;top:30px;border-radius:10px 0 0 10px;-moz-border-radius:10px 0 0 10px;-webkit-border-radius:10px 0 0 10px;-ms-border-radius:10px 0 0 10px}.steps .step-bar.last{border-radius:10px   ;-moz-border-radius:10px   ;-webkit-border-radius:10px   ;-ms-border-radius:10px   }
</style>
@section('content')

    <br>
    <br>
    @foreach($orders as $order)
        @if($order->stage_status==0)
        <div class="steps" style="    margin-bottom: 4%;">
        <ul class="steps-container">
            <li style="width:25%;" class="activated">
                <div class="step">
                    <div class="step-image"><span></span></div>
                    <div class="step-current">Step 1</div>
                    <div class="step-description">Ignition</div>
                </div>
            </li>
            <li style="width:25%;"  >
                <div class="step">
                    <div class="step-image"><span></span></div>
                    <div class="step-current">Step 2</div>
                    <div class="step-description">Parts Assembly</div>
                </div>
            </li>
            <li style="width:25%;" >
                <div class="step">
                    <div class="step-image"><span></span></div>
                    <div class="step-current">Step 3</div>
                    <div class="step-description">Product Closing</div>
                </div>
            </li>
            <li style="width:25%;">
                <div class="step">
                    <div class="step-image"><span></span></div>
                    <div class="step-current">Step 4</div>
                    <div class="step-description">Done</div>
                </div>
            </li>
        </ul>
        <div class="step-bar" style="width: 15%;"></div>
    </div>
        @endif
        @if($order->stage_status==1)
            <div class="steps" style="    margin-bottom: 4%;">
                <ul class="steps-container">
                    <li style="width:25%;" class="activated">
                        <div class="step">
                            <div class="step-image"><span></span></div>
                            <div class="step-current">Step 1</div>
                            <div class="step-description">Ignition</div>
                        </div>
                    </li>
                    <li style="width:25%;"  class="activated">
                        <div class="step">
                            <div class="step-image"><span></span></div>
                            <div class="step-current">Step 2</div>
                            <div class="step-description">Parts Assembly</div>
                        </div>
                    </li>
                    <li style="width:25%;" >
                        <div class="step">
                            <div class="step-image"><span></span></div>
                            <div class="step-current">Step 3</div>
                            <div class="step-description">Product Closing</div>
                        </div>
                    </li>
                    <li style="width:25%;">
                        <div class="step">
                            <div class="step-image"><span></span></div>
                            <div class="step-current">Step 4</div>
                            <div class="step-description">Done</div>
                        </div>
                    </li>
                </ul>
                <div class="step-bar" style="width: 38%;"></div>
            </div>
        @endif
        @if($order->stage_status==2)
            <div class="steps" style="    margin-bottom: 4%;">
                <ul class="steps-container">
                    <li style="width:25%;" class="activated">
                        <div class="step">
                            <div class="step-image"><span></span></div>
                            <div class="step-current">Step 1</div>
                            <div class="step-description">Ignition</div>
                        </div>
                    </li>
                    <li style="width:25%;"  class="activated">
                        <div class="step">
                            <div class="step-image"><span></span></div>
                            <div class="step-current">Step 2</div>
                            <div class="step-description">Parts Assembly</div>
                        </div>
                    </li>
                    <li style="width:25%;" class="activated">
                        <div class="step">
                            <div class="step-image"><span></span></div>
                            <div class="step-current">Step 3</div>
                            <div class="step-description">Product Closing</div>
                        </div>
                    </li>
                    <li style="width:25%;">
                        <div class="step">
                            <div class="step-image"><span></span></div>
                            <div class="step-current">Step 4</div>
                            <div class="step-description">Done</div>
                        </div>
                    </li>
                </ul>
                <div class="step-bar" style="width: 63%;"></div>
            </div>
        @endif
        @if($order->stage_status==3 || $order->status==4 || $order->status==5)
            <div class="steps" style="    margin-bottom: 4%;">
                <ul class="steps-container">
                    <li style="width:25%;" class="activated">
                        <div class="step">
                            <div class="step-image"><span></span></div>
                            <div class="step-current">Step 1</div>
                            <div class="step-description">Ignition</div>
                        </div>
                    </li>
                    <li style="width:25%;"  class="activated">
                        <div class="step">
                            <div class="step-image"><span></span></div>
                            <div class="step-current">Step 2</div>
                            <div class="step-description">Parts Assembly</div>
                        </div>
                    </li>
                    <li style="width:25%;" class="activated">
                        <div class="step">
                            <div class="step-image"><span></span></div>
                            <div class="step-current">Step 3</div>
                            <div class="step-description">Product Closing</div>
                        </div>
                    </li>
                    <li style="width:25%;" class="activated">
                        <div class="step">
                            <div class="step-image"><span></span></div>
                            <div class="step-current">Step 4</div>
                            <div class="step-description">Done</div>
                        </div>
                    </li>
                </ul>
                <div class="step-bar" style="width: 100%;"></div>
            </div>
        @endif

    @endforeach
    <br>


<section class="content pt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">Manufacturing Order</h3>
                    </div>
                    <div class="card-body">
                        <form action="#">

                            <div class="row">
                                @foreach($orders as $order)
                                   @php $quantity=$order->quantity @endphp
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Manufacturing Order #</label>
                                        <input type="text" readonly class="form-control" value="{{$order->manufacturing_order}}">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Production Deadline</label>
                                        <input readonly type="text" class="form-control" value="{{$order->production_deadline}}">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Created Date</label>
                                        <input type="text" readonly class="form-control" value="{{$order->created_date}}" >
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Products</label>
                                        <input type="text" readonly class="form-control" value="{{$order->product}}">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Quantity</label>
                                        <input type="text" readonly class="form-control" value="{{$order->quantity}}">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Total Cost</label>
                                        <input type="text" readonly class="form-control" value="{{$order->total_cost}}">
                                    </div>
                                </div>
                                    @endforeach

                            </div>

                        </form>



                        <div class="row">
                            <div class="col-md-12">



                                <div class="card card-light">
                                    <div class="card-header">
                                        <h3 class="card-title">Components</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <thead class="bg-light">
                                            <tr>
                                                <th>Sr.#</th>
                                                <th>name</th>
                                                <th>Available</th>
                                                <th>Demand</th>
                                                <th>Status</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php $i=0; @endphp
                                            @foreach($stocks as $stock)
                                                @php $i++; @endphp
                                                <tr>
                                                <td>{{$i}}</td>
                                                <td>{{$stock->name}}</td>

                                                <td>{{$stock->quantity}}</td>
                                                    @if($quantity>=$stock->quantity)
                                                        <td >
                                                            @php $netStock=$quantity-$stock->quantity @endphp
                                                            {{$netStock}}
                                                        </td>
                                                        @else
                                                        <td> 0 </td>
                                                 @endif
                                                    @if($stock->quantity>=$quantity)
                                                <td>
                                                    <div class="d-flex">
                                                        <div class="p-2 px-3 bg-success">
                                                            <i class="fa fa-check"></i>
                                                        </div>
                                                    </div>
                                                </td>
                                                    @else
                                                <td>
                                                        <a class="btn" href="{{url('production/componentRequisition')}}">
                                                            <i class="fas fa-plus-square mr-2">
                                                            </i> Order
                                                        </a>
                                                </td>
                                                @endif
                                            </tr>
                                            @endforeach
                                            </tbody>

                                        </table>

                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</section>

    @endsection
