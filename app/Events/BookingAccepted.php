<?php

namespace App\Events;

use App\Models\Booking;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BookingAccepted implements ShouldQueue
{
    use SerializesModels;

    public $booking;

    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }
}