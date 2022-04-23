<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use App\Models\Property;
use App\Jobs\FavouritePropertyJob;
use App\Jobs\UnFavouritePropertyJob;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Bus\DispatchesJobs;

class Favourite extends Component
{

    use DispatchesJobs;

    public $property;

    public function mount(Property $property)
    {
        $this->property = $property;
    }

    public function toggleFavourite()
    {
        if ($this->property->isFavouritedBy(Auth::user())) {
            $this->dispatchSync(new UnFavouritePropertyJob($this->property, Auth::user()));
            $this->dispatchBrowserEvent('success', ['message' => 'You have successfully unfavourited property ' .$this->property->title()]);
        }else {
            $this->dispatchSync(new FavouritePropertyJob($this->property, Auth::user()));
            $this->dispatchBrowserEvent('success', ['message' => 'You have successfully saved ' .$this->property->title() . ' into your favourite']);
        }

        $this->emit('refreshProperty');
    }
    
    public function render()
    {
        return view('livewire.pages.favourite');
    }
}