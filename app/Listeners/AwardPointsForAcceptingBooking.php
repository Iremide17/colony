<?php

namespace App\Listeners;

use App\Events\BookingAccepted;
use Illuminate\Contracts\Queue\ShouldQueue;

class AwardPointsForAcceptingBooking implements ShouldQueue
{
    public function handle(BookingAccepted $event)
    {
        $amount = config('points.rewards.new_booking_accepted');
        $message = 'Your booking was accepted';
        $user = $event->booking->user();
        $user->addPoints($amount, $message);
    }
}