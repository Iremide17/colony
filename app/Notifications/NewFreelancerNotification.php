<?php

namespace App\Notifications;

use App\Models\User;
use App\Models\Freelancer;
use Illuminate\Bus\Queueable;
use App\Mail\NewFreelancerEmail;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewFreelancerNotification extends Notification
{
    use Queueable;

    public $freelancer;

    public function __construct(Freelancer $freelancer)
    {
        $this->freelancer = $freelancer;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }


    public function toMail(User $user)
    {
        return (new NewFreelancerEmail($this->freelancer))
            ->to($user->email(), $user->name());
    }
}