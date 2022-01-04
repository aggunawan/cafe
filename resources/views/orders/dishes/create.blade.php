<form action="{{ route('orders.dishes.store', $order->id) }}" method="post">
    @csrf
    <label>
        <input type="number" name="dish_id" placeholder="Dish">
    </label>
    <br>
    <button type="submit">Order</button>
</form>
