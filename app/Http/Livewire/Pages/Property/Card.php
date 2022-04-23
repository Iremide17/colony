<?php

namespace App\Http\Livewire\Pages\Property;

use Livewire\Component;
use App\Models\Property;

class Card extends Component
{
    public $property;

    public function mount(Property $property)
    {
        $this->property = $property;
    }
    
    public function render()
    {
        return view('livewire.pages.property.card');
    }
}