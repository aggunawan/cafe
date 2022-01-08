<form action="{{ route('orders.places.store', $order->id) }}" method="POST">
    @csrf
    <select name="payment_method">
        @foreach($paymentMethods as $payment => $label)
            <option value="{{ $payment }}">{{ ucwords($label) }}</option>
        @endforeach
    </select>
    <button type="submit">Place Order</button>
</form>
