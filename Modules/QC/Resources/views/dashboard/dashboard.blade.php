
@extends('layouts.master')

@section('content')


    <div class="content pt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="mb-3 ml-2">
                    <a class="btn btn-primary btn-sm" href="#">
                        <i class="fas fa-plus">
                        </i>
                        Add New Item/ Product/ Material
                    </a>
                </div>
                <div class="mb-3 ml-2">
                    <a class="btn btn-primary btn-sm" href="#">
                        <i class="fas fa-folder">
                        </i>
                        View Material
                    </a>
                </div>
                <div class="mb-3 ml-2">
                    <a class="btn btn-primary btn-sm" href="#">
                        <i class="fas fa-folder">
                        </i>
                        View Products
                    </a>
                </div>
                <div class="mb-3 ml-2">
                    <a class="btn btn-primary btn-sm" href="#">
                        <i class="fas fa-receipt">
                        </i>
                        Goods Receipt
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
