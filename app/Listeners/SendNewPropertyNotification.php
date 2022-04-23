<?php

namespace App\Listeners;

use App\Models\User;
use App\Events\PropertyCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\SendNewPropertyNotification as prop;

class SendNewPropertyNotification
{
    public function handle(PropertyCreated $event)
    {
        $admins = User::where('type', User::ADMIN)->get();

        foreach ($admins as $admin) {
            $admin->notify(new prop($event->property));
        }
    }
}