<div class="shadow px-4 py-3 mb-5 rounded bg-white py-5" wire:poll>
    <div class="d-grid">
        <div class="w-full text-center mb-4">
            <p class="lead">My Order</p>
        </div>

        @foreach($order->dishes as $dish)
            <div class="d-flex flex-column mb-2">
                <p class="mb-0 fw-bolder">{{ $dish->name }}</p>
                <div class="d-flex flex-row justify-content-between">
                    <p class="text-secondary mb-0">Items : {{ $dish->pivot->quantity }}</p>
                    <p class="text-primary fw-bolder mb-0">
                        {{ number_format($dish->pivot->price * $dish->pivot->quantity) }}
                    </p>
                </div>
            </div>
        @endforeach
    </div>

    <hr>

    <div class="d-flex flex-row justify-content-between mt-4">
        <p class="mb-0 fw-bolder">Payment</p>
        <p class="mb-0">
            {{ $order->payment_type->label }}
        </p>
    </div>

    <div class="d-flex flex-row justify-content-between">
        <p class="mb-0 fw-bolder">Status</p>
        <p class="mb-0">
            @switch($order->status->value)
                @case(2)
                Belum Dibayar
                @break
                @case(3)
                Sudah Dibayar / Dalam Proses
                @break
                @case(4)
                Siap Dihidangkan
                @break
            @endswitch
        </p>
    </div>
</div>
