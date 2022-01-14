<ul>
    @foreach($orders as $order)
        <li>
            {{ $order->id }}
            <ul>
                @foreach($order->dishes as $dish)
                <li>
                    {{ $dish->name }} - {{ $dish->pivot->quantity }}
                </li>
                @endforeach
                <form action="{{ route('orders.servers.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="order_id" value="{{ $order->id }}">
                    <button type="submit">Ready to Serve</button>
                </form>
            </ul>
        </li>
    @endforeach
</ul>
