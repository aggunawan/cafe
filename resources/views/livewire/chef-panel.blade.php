<div class="row justify-content-center py-5" wire:poll="fetchOrders">
    @foreach($orders as $order)
        <div class="col-11 col-lg-4">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-grid">
                        <p class="lead">New Order</p>

                        <p class="mb-0">
                            Customer : <span class="fw-bolder">{{ $order->customer_name }}</span>
                        </p>

                        <p class="mb-0">
                            Table : <span class="fw-bolder">{{ $order->table_number }}</span>
                        </p>

                        <hr>

                        @foreach($order->dishes as $dish)
                            <div class="d-flex flex-row justify-content-between">
                                <p class="mb-0 fw-bolder">
                                    {{ $dish->name }}
                                </p>

                                <p class="mb-0 fw-bolder text-primary">
                                    {{ $dish->pivot->quantity }}
                                </p>
                            </div>
                        @endforeach

                        <div class="d-flex flex-row justify-content-end mt-4">
                            <form action="{{ route('orders.servers.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="order_id" value="{{ $order->id }}">
                                <button type="submit" class="btn btn-primary">Ready to Serve</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
