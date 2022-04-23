<?php

namespace App\Listeners;

use App\Models\User;
use App\Events\FreelancerWasCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\NewFreelancerNotification;

class SendNewFreelancerNotification implements ShouldQueue
{
    public function handle(FreelancerWasCreated $event)
    {
        $admins = User::where('type', User::ADMIN)->get();

        foreach ($admins as $admin) {
            $admin->notify(new NewFreelancerNotification($event->freelancer));
        }
    }
}