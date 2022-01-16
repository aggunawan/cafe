@extends('layouts.guest')

@section('content')
    <div class="container">
        @livewire('chef-panel', ['orders' => $orders])
    </div>
@endsection
