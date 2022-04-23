<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use App\Models\Property;

class Welcome extends Component
{


    public function render()
    {
        
        return view('livewire.pages.welcome', [
            'properties' => properties
        ]);
    }
}
