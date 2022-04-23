<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Property;
use App\Events\BookingMade;
use App\Events\BookingAccepted;
use App\Events\PropertyCreated;
use App\Observers\UserObserver;
use App\Observers\PropertyObserver;
use App\Events\FreelancerWasCreated;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use App\Listeners\SendNewAgentNotification;
use App\Listeners\SendNewBookingNotification;
use App\Listeners\SendNewPropertyNotification;
use App\Listeners\SendNewFreelancerNotification;
use App\Listeners\AwardPointsForAcceptingBooking;
use App\Listeners\SendBookingAcceptedNotification;
use App\Listeners\SendNewAcceptBookingNotification;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        BookingMade::class => [
            AwardPointsForBooking::class,
            SendNewBookingNotification::class,
        ],
        BookingAccepted::class => [
            AwardPointsForAcceptingBooking::class,
            SendNewAcceptBookingNotification::class,
        ],
        AgentWasCreated::class => [
            SendNewAgentNotification::class,
        ],
        PropertyCreated::class => [
            SendNewPropertyNotification::class,
        ],
        FreelancerWasCreated::class => [
            SendNewFreelancerNotification::class,
        ],
        ApplicationWasAccepted::class => [
            SendAgentAccepttedNotification::class,
        ],
        ApplicationWasRejected::class => [
            SendAgentRejecttedNotification::class,
        ],
        AgentBanned::class => [
            SendAgentBannedNotification::class,
        ],
    ];

    public function boot()
    {
        // User::observe(UserObserver::class);
        // Property::observe(PropertyObserver::class);
    }
}