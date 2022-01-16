@extends('layouts.guest')

@section('content')
    <div class="container">
        <div class="row justify-content-center py-5">
            <div class="col-11 col-lg-4">
                @livewire('my-order', ['order' => $order])
            </div>
        </div>
    </div>
@endsection
