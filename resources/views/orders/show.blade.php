Dishes
<ul>
    @foreach($order->dishes as $dish)
        <li>{{ $dish->name }} - {{ $dish->pivot->price }}</li>
    @endforeach
</ul>

@include('orders.dishes.create', ['order' => $order])

