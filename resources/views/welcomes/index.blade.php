@extends('layouts.guest')

@section('content')
    <div class="container fixed-bottom">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <a href="" class="text-decoration-none text-black">
                    <div class="shadow px-4 py-3 mb-5 bg-white rounded d-flex" role="button">
                        <div class="w-auto">
                            <img src="{{ asset('images/cup-black.png') }}" alt="Order">
                        </div>
                        <div class="d-grid px-4">
                            <p class="mb-0 h5"><strong>Order Here</strong></p>
                            <small>See our Menu</small>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
