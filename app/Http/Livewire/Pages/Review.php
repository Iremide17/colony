<?php

namespace App\Http\Livewire\Pages;

use App\Jobs\ReviewJob;
use App\Models\Booking;
use Livewire\Component;
use App\Exceptions\CannotReviewItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Bus\DispatchesJobs;

class Review extends Component
{
    use DispatchesJobs;
    
    public $booking;
    public $userReview;
    public $rating;

    protected $rules = [
        'rating' => 'required|integer|min:1|max:5',
        'userReview' => 'required',
    ];

    public function mount(Booking $booking)
    {
        $this->booking = $booking;
    }

    public function addReview()
    {
        $this->dispatchBrowserEvent('review-form');
    }

    public function reviewForm()
    {
        $this->validate();

        if ($this->booking->property->isReviewedBy(Auth::user())) {
            $this->dispatchBrowserEvent('hide-review-error-form', ['message' => 'Property already rated']);
        }else{
            $this->booking->property->reviewsRelation()->create([
                'body' => $this->userReview,
                'rating' => $this->rating,
                'user_id' => Auth::user()->id(),
            ]);
            
            $this->dispatchBrowserEvent('hide-review-form-error', ['message' => 'Thanks for leaving a review on this property. We hope you have a nice stay']);
        }
    }

    
    public function render()
    {
        return view('livewire.pages.review');
    }
}
