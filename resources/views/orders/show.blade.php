@extends('layouts.guest')

@section('content')
    Status {{ $order->status }}
    <br>
    Dishes
    <ul>
        @foreach($order->dishes as $dish)
            <li>
                {{ $dish->id }} . {{ $dish->name }} - {{ $dish->pivot->price }} ({{ $dish->pivot->quantity }})
                <br>
                @include('orders.dishes.delete', ['order' => $order, 'dish' => $dish])
            </li>
        @endforeach
    </ul>

    @include('orders.dishes.create', ['order' => $order])
    @include('orders.places.create', ['order' => $order, 'paymentMethods' => $paymentMethods])
@endsection

