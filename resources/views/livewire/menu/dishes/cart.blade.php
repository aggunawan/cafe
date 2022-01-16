<div
    wire:ignore.self
    class="modal fade" id="addToCart"
    role="dialog"
    tabindex="-1"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            @if($dish)
                <div class="modal-body">
                    <div class="d-flex flex-column mb-4">
                        <img src="{{ $dish->picture }}" alt="{{ $dish->name }}" class="img-thumbnail mb-4">
                        <p class="lead">{{ $dish->name }}</p>
                        <p class="mb-0 text-secondary">{{ $dish->description }}</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="w-full d-flex align-items-center">
                            <p class="text-primary fw-bolder mb-0 h5">
                                {{ number_format($price) }}
                            </p>
                        </div>
                        <div class="d-flex flex-row align-items-center">
                            <button
                                class="btn btn-outline-secondary"
                                wire:click="sub">
                                <img src="{{ asset('images/minus.png') }}"
                                     alt="Sub"
                                     style="width: 20px">
                            </button>
                            <p class="text-primary fw-bolder mb-0 h5 mx-3">
                                {{ $quantity }}
                            </p>
                            <button
                                type="button"
                                class="btn btn-outline-secondary"
                                wire:click="add">
                                <img src="{{ asset('images/plus.png') }}" alt="Add" style="width: 20px">
                            </button>
                        </div>
                    </div>
                </div>
            @endif
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
