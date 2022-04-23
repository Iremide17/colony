<?php

namespace App\Http\Livewire\Pages\Nav\Booking;

use App\Models\Booking;
use Livewire\Component;
use Illuminate\View\View;

class Count extends Component
{
    public $count;

    protected $listeners = [
        'booking' => 'updateCount',
    ];

    public function mount()
    {
        $this->count = Booking::where('user_id', auth()->id())->where('isAccepted', false)->count();
    }

    public function updateCount(int $count): int
    {
        return $count;
    }
    
    public function render(): View
    {
        return view('livewire.pages.nav.booking.count');
    }
}