<?php

namespace App\Listeners;

use App\Events\BookingAccepted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\NewBookingAcceptedNotification;

class SendNewAcceptBookingNotification implements ShouldQueue
{
    public function handle(BookingAccepted $event)
    {
        $user = $event->booking->user();

        $user->notify(new NewBookingAcceptedNotification($event->booking));

    }
}