<?php

namespace App\Listeners;

use App\Events\BookingMade;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\NewBookingNotification;

class SendNewBookingNotification implements ShouldQueue
{
    public function handle(BookingMade $event)
    {
        $agent = $event->booking->property->agent;

        $agent->user()->notify(new NewBookingNotification($event->booking));

    }
}