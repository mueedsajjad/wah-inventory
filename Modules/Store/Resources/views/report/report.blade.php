@extends('layouts.master')

@section('content')

    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title">Store Reports</h3>
                        </div>
                        <div class="card-body dash-menu">
                            <a class="btn btn-app bg-danger" href="{{url('store/rawMaterial')}}">
                                <i class="fas fa-edit"></i> Raw Material Report
                            </a>

                            <a class="btn btn-app bg-danger" href="{{url('store/product')}}">
                                <i class="fas fa-edit"></i> Products Report
                            </a>
                            <a class="btn btn-app bg-danger" href="{{url('store/goodsReceipt')}}">
                                <i class="fas fa-edit"></i> Goods Receipt Report
                            </a>
                            <a class="btn btn-app bg-danger" href="{{url('store/inspection')}}">
                                <i class="fas fa-edit"></i> I-Note Report
                            </a>
                            <a class="btn btn-app bg-danger" href="{{url('store/deliveryOrder')}}">
                                <i class="fas fa-edit"></i> Delivery Order Report
                            </a>
                            <a class="btn btn-app bg-danger" href="{{url('store/IssueRequisition')}}">
                                <i class="fas fa-edit"></i> Issue / Requisition Report
                            </a>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </section>
@endsection
