@extends('layouts.guest')

@section('content')
    <div class="container">
        @if($categories->first())
            <div class="row justify-content-center py-5">
                <div class="col-12 col-lg-10">
                    <div class="shadow px-4 py-3 mb-5 rounded bg-white">
                        @livewire('menu.categories', ['categories' => $categories, 'tab' => $categories->first()->id])
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                @livewire('menu.dishes.index', ['tab' => $categories->first()->id])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

    @livewire('menu.order-summary')
@endsection
