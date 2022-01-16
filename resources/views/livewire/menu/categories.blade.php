<ul class="nav nav-pills mb-4" id="pills-tab" role="tablist">
    @foreach($categories as $category)
        <li class="nav-item" role="presentation">
            <button
                class="btn mx-1 {{ $tab == $category->id ? 'btn-secondary' : 'btn-light' }}"
                id="pills-home-tab"
                data-bs-toggle="pill"
                data-bs-target="#pills-home"
                type="button"
                role="tab"
                aria-controls="pills-home"
                wire:click="setTab({{ $category->id }})"
                aria-selected="true"><strong>{{ $category->name }}</strong></button>
        </li>
    @endforeach
</ul>
