<?php

namespace App\Http\Livewire\Pages\Furnish;

use App\Models\Job;
use App\Models\Branch;
use App\Models\Booking;
use Livewire\Component;
use App\Models\SubBranch;
use App\Models\Freelancer;

class Index extends Component
{
    public $job = [];
    public $booking;
    public $count;
    public $searchWord;
    public $categories;
    public $subcategories;
    public $viewFreelancer;

    public $subcategory = '';
    public $category = '';

    protected $queryString = [
        'searchWord' => ['except' => ''],
        'subcategory' => ['except' => ''],
        'category' => ['except' => ''],
    ];



    public function mount(Booking $booking)
    {
        $this->booking = $booking;
        $this->categories = Branch::all();
        $this->subcategories = SubBranch::all();
        $this->viewFreelancer = '';
    }

    public function revealFreelancer($freelancer_id)
    {
        $freelancer = Freelancer::findOrFail($freelancer_id);
        $this->viewFreelancer = $freelancer;
        
    }

    public function getFreelancersProperty()
    {
        return Freelancer::when($this->subcategory, function($query, $subcategory) {
            $query->whereHas('subBranches', function ($query) use ($subcategory) {
                $query->where('name', $subcategory);
            });
        })
        ->when($this->category, function($query, $category) {
            $query->whereHas('branch', function ($query) use ($category) {
                $query->where('id', $category);
            });
        })
        ->where('isVerified',true)
        ->search(trim($this->searchWord))
        ->get();
    }

    public function searchCard($category_id)
    {
       $this->category = $category_id;
    }

    public function clearFilter()
    {
        $this->category = '';
        $this->subcategory = '';
    }

    public function assignJob($freelancer_id)
    {
        $job = new Job();
        $job->booking_id = $this->booking->id();
        $job->user_id = auth()->id();
        $job->freelancer_id = $freelancer_id;
        $job->branch_id = $freelancer_id;
        $job->save();

        if ($job->save()) {
            
            $notification = array(
                'alert-type' => 'success',
                'button' => 'Okay',
                'title' => 'Job Submitted',
                'messege' => 'Job created successfully! You will be notified shortly',
            );

            return redirect()->route('user.job',auth()->user())->with($notification);
        } else {
            $this->dispatchBrowserEvent('error',[
                'message' => 'There was a problem completing this task, Try again later!'
            ]);
        }
        
    }

    public function render()
    {
        return view('livewire.pages.furnish.index',[
            'freelancers' => $this->freelancers
        ]);
    }
}