<?php

namespace App\Jobs;

use App\Models\User;
use App\Models\Property;
use Illuminate\Bus\Queueable;
use App\Exceptions\CannotReviewItem;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class ReviewJob implements ShouldQueue
{
    private $review;
    private $rating;
    private $property;
    private $user;

    public function __construct(Property $property, User $user)
    {
        $this->property = $property;
        $this->user = $user;
        dd($this->review);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->property->isLikedBy($this->user)) {
            throw CannotReviewItem::alreadyReviewed('property');
        }

        $this->property->reviewedBy($this->user);
    }
}
