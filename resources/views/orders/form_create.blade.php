<form action="{{ route('orders.store') }}" method="POST" class="form-group">
    @csrf
    <div class="form-group mb-4">
        <label><span class="mb-2">Name</span></label>
        <input type="text" name="customer_name" class="form-control" required>
    </div>

    <div class="form-group mb-4">
        <label><span class="mb-2">Table Number</span></label>
        <input type="number" name="table_number" class="form-control" required>
    </div>

    <div class="d-grid">
        <button type="submit" class="btn btn-primary">
            {{ __('Order') }}
        </button>
    </div>
</form>
