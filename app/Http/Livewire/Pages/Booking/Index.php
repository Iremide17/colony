<?php

namespace App\Http\Livewire\Pages\Booking;

use App\Models\Booking;
use Livewire\Component;
use App\Models\Category;

class Index extends Component
{
    public $opened_booking = [];
    public $bookings_details = [];

    protected $listeners = [
        'refreshBooking' => 'mount'
    ];

    public function mount()
    {
        $this->bookings_details = $this->bookings_details;
    }

    public function BookingDetails($booking_id)
    {
        $this->bookings_details = Booking::where('id',$booking_id)->first();
    }

    public function furnish()
    {
         $this->dispatchBrowserEvent('furnish-form');
    }

    public function getBookingsProperty()
    {
        return Booking::where('user_id', auth()->id())->get();
    }

    public function updated($key, $value)
    {
        if (in_array($key, ['state.logistic', 'state.cleaning'])) {
            if ($value == false) {
                

            } else {
                

            }
            
        }
    }

    public function resetBooking()
    {
        $this->bookings_details = '';
    }

    public function render()
    {

        $split = [
            "type" => "percentage",
            "currency" => "NGN",
            "subaccounts" => [
             [ "subaccount" => "ACCT_0vpsncxygq3d5y1", "share" => 10 ],
            ],
            "bearer_type" => "all",
            "main_account_share" => 90
        ];

        return view('livewire.pages.booking.index', [
            'bookings' => $this->bookings,
            'categories' => Category::all(),
            'split' => $split
        ]);
    }
}