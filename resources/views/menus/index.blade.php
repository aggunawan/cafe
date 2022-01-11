@extends('layouts.guest')

@section('content')
    <div class="container">
        <div class="row justify-content-center py-5">
            <div class="col-12 col-lg-10">
                <div class="shadow px-4 py-3 mb-5 bg-white rounded">
                    <ul class="nav nav-pills mb-5" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button
                                class="btn btn-secondary active"
                                id="pills-home-tab"
                                data-bs-toggle="pill"
                                data-bs-target="#pills-home"
                                type="button"
                                role="tab"
                                aria-controls="pills-home"
                                aria-selected="true">Paket Promo</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button
                                class="nav-link text-black"
                                id="pills-profile-tab"
                                data-bs-toggle="pill"
                                data-bs-target="#pills-profile"
                                type="button"
                                role="tab"
                                aria-controls="pills-profile"
                                aria-selected="false">Kolaborasi</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button
                                class="nav-link text-black"
                                id="pills-profile-tab"
                                data-bs-toggle="pill"
                                data-bs-target="#pills-profile"
                                type="button"
                                role="tab"
                                aria-controls="pills-profile"
                                aria-selected="false">Menu Baru</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button
                                class="nav-link text-black"
                                id="pills-profile-tab"
                                data-bs-toggle="pill"
                                data-bs-target="#pills-profile"
                                type="button"
                                role="tab"
                                aria-controls="pills-profile"
                                aria-selected="false">Teman Nongkrong</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="row">
                                <div class="col-3">
                                    <div class="card shadow border-1 mb-4" role="button">
                                        <div
                                            class="card-body"
                                            style="height: 250px; background-image: url('{{ asset('images/coffee.jpg') }}'); background-size: cover">
                                        </div>
                                        <div class="card-footer">
                                            <p class="my-2"><strong>Hot Coffee</strong></p>
                                            <p class="text-primary"><strong>10.000</strong></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="card shadow border-1 mb-4" role="button">
                                        <div
                                            class="card-body"
                                            style="height: 250px; background-image: url('{{ asset('images/coffee.jpg') }}'); background-size: cover">
                                        </div>
                                        <div class="card-footer">
                                            <p class="my-2"><strong>Hot Coffee</strong></p>
                                            <p class="text-primary"><strong>10.000</strong></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="card shadow border-1 mb-4" role="button">
                                        <div
                                            class="card-body"
                                            style="height: 250px; background-image: url('{{ asset('images/coffee.jpg') }}'); background-size: cover">
                                        </div>
                                        <div class="card-footer">
                                            <p class="my-2"><strong>Hot Coffee</strong></p>
                                            <p class="text-primary"><strong>10.000</strong></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="card shadow border-1 mb-4" role="button">
                                        <div
                                            class="card-body"
                                            style="height: 250px; background-image: url('{{ asset('images/coffee.jpg') }}'); background-size: cover">
                                        </div>
                                        <div class="card-footer">
                                            <p class="my-2"><strong>Hot Coffee</strong></p>
                                            <p class="text-primary"><strong>10.000</strong></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="card shadow border-1 mb-4" role="button">
                                        <div
                                            class="card-body"
                                            style="height: 250px; background-image: url('{{ asset('images/coffee.jpg') }}'); background-size: cover">
                                        </div>
                                        <div class="card-footer">
                                            <p class="my-2"><strong>Hot Coffee</strong></p>
                                            <p class="text-primary"><strong>10.000</strong></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="card shadow border-1 mb-4" role="button">
                                        <div
                                            class="card-body"
                                            style="height: 250px; background-image: url('{{ asset('images/coffee.jpg') }}'); background-size: cover">
                                        </div>
                                        <div class="card-footer">
                                            <p class="my-2"><strong>Hot Coffee</strong></p>
                                            <p class="text-primary"><strong>10.000</strong></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">...</div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container fixed-bottom">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <a href="" class="text-decoration-none text-black">
                    <div class="shadow px-4 py-3 mb-5 bg-secondary rounded" role="button">
                        <div class="row">
                            <div class="col d-flex">
                                <div class="w-auto">
                                    <img src="{{ asset('images/bag.png') }}" alt="Order" style="max-height: 50px">
                                </div>
                                <div class="px-4 d-flex align-items-center">
                                    <p class="mb-0 h5"><strong>2 items</strong></p>
                                </div>
                            </div>
                            <div class="col d-flex align-items-center justify-content-end">
                                <p class="mb-0 h5"><strong>20.000</strong></p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
