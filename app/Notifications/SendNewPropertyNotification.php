<?php

namespace App\Notifications;

use App\Models\User;
use App\Models\Property;
use Illuminate\Bus\Queueable;
use App\Mail\NewPropertyEmail;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SendNewPropertyNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $property;

    public function __construct(Property $property)
    {
        $this->property = $property;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }


    public function toMail(User $user)
    {
        return (new NewPropertyEmail($this->property))
            ->to($user->email(), $user->name());
    }

}