<?php

namespace App\Http\Livewire;

use App\Models\Review as ReviewModel;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Review extends Component
{
    public $count = 3;
    public $model;
    public $rating;
    public $message;

    protected $rules = [
        'rating' => 'required|integer|min:1|max:5',
        'message' => 'required',
    ];

    public function loadMore()
    {
        $this->count +2;
    }
    
    public function mount(Model $model)
    {
        $this->model = $model;
    }

    public function getReviewsProperty()
    {
        return ReviewModel::where('reviewable_id',$this->model->id())->paginate($this->count);
    }

    public function addReview()
    {
        $this->dispatchBrowserEvent('review-form');
    }

    public function reviewForm()
    {
        $this->validate();

        if(Auth::check()){
            if ($this->model->isReviewedBy(auth()->user())) {
                $this->dispatchBrowserEvent('hide-review-error-form', ['message' => class_basename($this->model).' already rated']);
            }else{
                $this->model->reviewsRelation()->create([
                    'body' => $this->message,
                    'rating' => $this->rating,
                    'user_id' => auth()->id(),
                ]);
                
                $this->dispatchBrowserEvent('hide-review-form', ['message' => 'Thanks for leaving a review on this '.class_basename($this->model)]);
            }
        }
        else{
            $this->dispatchBrowserEvent('hide-review-error-form', ['message' => 'You have to login first to rate this '.class_basename($this->model)]);
        }
    }
    
    public function render()
    {
        return view('livewire.review',[
            'reviews'       =>  $this->reviews
        ]);
    }
}