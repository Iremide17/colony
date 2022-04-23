<?php

namespace App\Listeners;

use App\Events\BookingMade;
use Illuminate\Contracts\Queue\ShouldQueue;

class AwardPointsForBooking implements ShouldQueue
{
    public function handle(BookingMade $event)
    {
        $amount = config('points.rewards.new_booking');
        $message = 'You booked a property';
        $user = $event->booking->user();
        $user->addPoints($amount, $message);
    }
}