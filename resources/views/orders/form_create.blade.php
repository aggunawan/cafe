<form action="{{ route('orders.store') }}" method="POST">
    @csrf
    <label>
        <input type="text" name="customer_name" placeholder="Name">
    </label>
    <br>
    <label>
        <input type="number" name="table_number" placeholder="Table Number">
    </label>
    <br>
    <button type="submit">
        {{ __('order.create') }}
    </button>
</form>
