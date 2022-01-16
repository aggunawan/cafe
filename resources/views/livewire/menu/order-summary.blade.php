<div>
    <div class="container fixed-bottom">
        <div class="row justify-content-center" data-toggle="modal" data-target="#orderSummary">
            <div class="col-12 col-lg-8">
                <div class="shadow px-4 py-3 mb-5 bg-warning rounded" role="button">
                    <div class="row">
                        <div class="col d-flex">
                            <div class="w-auto">
                                <img src="{{ asset('images/bag.png') }}" alt="Order" style="max-height: 40px">
                            </div>
                            <div class="px-4 d-flex align-items-center">
                                <p class="mb-0"><strong>{{ $order->dishes->sum('pivot.quantity') }} items</strong></p>
                            </div>
                        </div>
                        <div class="col d-flex align-items-center justify-content-end">
                            <div class="d-flex flex-row">
                                @if($order->total_price != 0)
                                    <p class="mb-0 h5 mx-2"><strong>{{ number_format($order->total_price) }}</strong></p>
                                @endif
                                <img src="{{ asset('images/up.png') }}" alt="Show Order" style="width: 20px">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div
        wire:ignore.self
        class="modal fade"
        id="orderSummary"
        tabindex="-1"
        role="dialog"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <p class="lead">Checkout</p>
                        </div>
                        @foreach($order->dishes as $dish)
                            <div class="col-12">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex">
                                        <span class="fw-bolder">{{ $dish->name }}</span>
                                        <span class="fw-bolder text-primary mx-2">x {{ $dish->pivot->quantity }}</span>
                                    </div>
                                    <div class="d-flex">
                                    <span class="fw-bolder">
                                        {{ number_format($dish->pivot->quantity * $dish->pivot->price) }}
                                    </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-between">
                                <span class="fw-bolder">Total</span>
                                <div class="d-flex">
                                <span class="fw-bolder">
                                    {{ number_format($order->total_price) }}
                                </span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span class="fw-bolder">Customer</span>
                                <div class="d-flex">
                                    <span class="fw-bolder">
                                        {{ $order->customer_name }}
                                    </span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span class="fw-bolder">Table</span>
                                <div class="d-flex">
                                    <span class="fw-bolder">
                                        {{ $order->table_number }}
                                    </span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mt-4">
                                <span class="fw-bolder">Pay with</span>
                                <div class="d-flex">
                                    <div
                                        role="button"
                                        wire:click="setPaymentMethod(2)"
                                        class="px-4 py-2 rounded {{ $paymentMethod == 2 ? 'bg-primary text-white shadow' : 'bg-light' }}">
                                        Cash
                                    </div>
                                    <div
                                        role="button"
                                        wire:click="setPaymentMethod(3)"
                                        class="px-4 py-2 rounded {{ $paymentMethod == 3 ? 'bg-primary text-white shadow' : 'bg-light' }}">
                                        Cashless
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" wire:click="submitOrder" class="btn btn-primary">Submit Order</button>
                </div>
            </div>
        </div>
    </div>
</div>
