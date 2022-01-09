<ul>
    @foreach($order->dishes as $dish)
        <li>{{ $dish->id }}. {{ $dish->name }} {{ $dish->pivot->price }} ({{ $dish->pivot->quantity }})</li>
    @endforeach
</ul>

Status : {{ $order->status }}
<br>
Payment Method : {{ $order->payment_type }}
