<?php

namespace App\Http\Livewire\Pages\Nav\Booking;

use App\Models\Booking;
use Livewire\Component;

class Indicator extends Component
{
    public $hasBookings;

    protected $listeners = [
        'booked' => 'setHasBooking',
        'propertyAdded' => 'updateBookingTotal',
        'propertyRemoved' => 'updateBookingTotal',
    ];

     public function mount(): void
    {
        $this->hasBookings = count(Booking::where('user_id', auth()->id())->where('isAccepted', false)->get());
    }

    public function setHasBooking(int $count): bool
    {
        return $count > 0;
    }
        
    public function updateBookingTotal(): void
    {
        $this->hasBookings = count(Booking::where('user_id', auth()->id())->where('isAccepted', false)->get());
    }
    
    public function render()
    {
        return view('livewire.pages.nav.booking.indicator');
    }
}