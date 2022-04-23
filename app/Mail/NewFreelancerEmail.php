<?php

namespace App\Mail;

use App\Models\Freelancer;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewFreelancerEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $freelancer;

    public function __construct(Freelancer $freelancer)
    {
        $this->freelancer = $freelancer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("New Freelancer Registration")
            ->markdown('emails.new_freelancer');
    }
}