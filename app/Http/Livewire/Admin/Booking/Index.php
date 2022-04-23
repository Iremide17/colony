<?php

namespace App\Http\Livewire\Admin\Booking;

use Livewire\Component;
use App\Models\Booking;
use Livewire\WithPagination;
use App\Events\BookingAccepted;

class Index extends Component
{
    use WithPagination;

    public $booking;

    public function mount(Booking $booking)
    {
        $this->booking = $booking;
    }

    
    public function getBookingsProperty()
    {
        return Booking::all();
    }

    public function acceptBooking($id)
    {
        $booking = Booking::where('id', $id)->first();
        $booking->update(['isAccepted' => true]);

        event(new BookingAccepted($booking));

        $this->dispatchBrowserEvent('success', [
            'message'     => $booking->property->title().' accepted successfully',
        ]);

        $this->reset();

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

        return view('livewire.admin.booking.index', [
            'bookings' => $this->bookings,
            'split' => $split
        ]);
    }
}