<div class="row">
    @if($category)
        @foreach($category->dishes as $dish)
            <div class="col-3">
                <div
                    class="card shadow border-1 mb-4"
                    role="button"
                    data-toggle="modal"
                    data-target="#addToCart"
                    wire:click="$emit('setDish', {{ $dish->id }})">
                    <div
                        class="card-body"
                        style="height: 250px; background-image: url('{{ $dish->picture }}'); background-size: cover">
                    </div>
                    <div class="card-footer">
                        <p class="my-2"><strong>{{ $dish->name }}</strong></p>
                        <div class="d-flex flex-row justify-content-between">
                            <div class="d-flex align-items-center">
                                <p class="text-primary mb-0"><strong>{{ number_format($dish->price) }}</strong></p>
                            </div>
                            <img src="{{ asset('images/add.png') }}" alt="Add to Cart" style="width: 35px">
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>
