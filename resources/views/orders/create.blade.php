@extends('layouts.guest')
@section('content')
    <div class="container">
        <div class="row justify-content-center py-5">
            <div class="col-12 col-lg-3">
                <div class="shadow px-4 py-3 mb-5 rounded bg-white">
                    <div class="d-flex justify-content-center">
                        <p class="lead">Create Order</p>
                    </div>
                    @include('orders.form_create')
                </div>
            </div>
        </div>
    </div>
@endsection
