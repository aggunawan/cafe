<form action="{{ route('orders.dishes.delete', [$order->id, $dish->id]) }}" method="post">
    @method('DELETE')
    @csrf
    <label>
        <input type="number" name="decrement" placeholder="Decrement">
    </label>
    <button type="submit">Delete</button>
</form>
