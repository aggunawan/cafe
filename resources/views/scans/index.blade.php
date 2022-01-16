@extends('layouts.guest')

@section('content')
    <div class="container">
        <div class="row justify-content-center pt-5 mt-5">
            <div class="col-10 col-lg-6">
                <div class="d-flex justify-content-center">
                    <div class="shadow px-4 py-3 mb-5 bg-white rounded d-flex flex-column text-center py-4">
                        <p class="lead fw-bolder mb-4">Scan to Order</p>
                        {{ $qr }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
