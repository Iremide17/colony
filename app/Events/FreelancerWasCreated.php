<?php

namespace App\Events;

use App\Models\Freelancer;
use Illuminate\Queue\SerializesModels;

class FreelancerWasCreated
{
    use SerializesModels;

    public $freelancer;

    public function __construct(Freelancer $freelancer)
    {
        $this->freelancer = $freelancer;
    }
}