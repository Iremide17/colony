<div wire:ignore>
    @if(Auth::guest())
        <label class="toggler toggler-danger">
            <i class="ti-heart"></i>
            <span class="_list_blickes _netork p-0 m-0">{{ count($this->property->favourites()) }}</span>
        </label>
    @else
        <label wire:click="toggleFavourite" class="toggler toggler-danger {{ $this->property->isFavouritedBy(auth()->user()) ? 'text-danger' : '' }} ">
            <i class="ti-heart"></i>
        </label>
    @endif
</div>
