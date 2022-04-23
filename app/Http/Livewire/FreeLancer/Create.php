<?php

namespace App\Http\Livewire\FreeLancer;

use App\Models\Skill;
use App\Models\Branch;
use Livewire\Component;
use App\Models\SubBranch;
use App\Models\Freelancer;
use Livewire\WithFileUploads;
use App\Events\FreelancerWasCreated;
use Illuminate\Support\Facades\Validator;

class Create extends Component
{
    use WithFileUploads;
    public $progress = 20;
    public $totalSteps = 5;
    public $currentStep;
    
    public $title;
    public $telephone;
    public $address;
    public $city;
    public $rate;
    public $language;
    public $image;
    public $description;
    public $selectedCategory;
    public $selectedSubcategory;
    
    public $branches;
    public $sub_branches = null;
    public $colonyPrice = null;
    public $progressCount;

    public function mount()
    {
        $this->currentStep = 1;
        $this->branches = Branch::all()->pluck('name', 'id')->prepend('Select Category');
        $this->sub_branches = collect();
        $this->progressCount = $this->progress;
    }

    public function updatedSelectedCategory()
    {
        $this->sub_branches = SubBranch::where('branch_id', $this->selectedCategory)->get(); 
    }

    public function incrementStep()
    {
        $this->resetErrorBag();
        $this->validateData();
        $this->currentStep++;
        $this->progressCount += 20;
        if ($this->currentStep > $this->totalSteps) {
            $this->currentStep =  $this->totalSteps;
        }
    }

    public function decrementStep()
    {
        $this->resetErrorBag();
        $this->currentStep--;
        $this->progressCount -= 20;
        if ($this->currentStep < 1) {
            $this->currentStep = 1;
        }
    }

    public function validateData()
    {
        if ($this->currentStep == 1) {
            
            $this->validate([
                'title' => 'required|min:5|max:30'
            ]);
            
        }elseif ($this->currentStep == 2) {
            
             $this->validate(
                [
                    'address' => 'required',
                    'telephone' => 'required|max:11|min:11',
                    'city' => 'required',
                    'description' => 'required|min:20',
                    'language' => 'required',
                ],
                [
                    'description.required' => 'Your description is important to everyone, it just how we can get to know your work',
                    'description.min' => 'That just too small a description for a freelanver  to be. Please give a more interesting view of your capacity'
                ]
            );
            
        }elseif ($this->currentStep == 3) {
            
            $this->validate([
                'selectedCategory' => 'required|integer',
                'selectedSubcategory' => 'required|integer',
            ]);
            
        }elseif ($this->currentStep == 4) {
            
            $this->validate([
                'selectedCategory' => 'required|integer',
                'selectedSubcategory' => 'required|integer',
            ]);
            
        }
        
    }

    public function updatedRate()
    {
        $this->colonyPrice = 'Colony gets 5% - '. $this->rate * 5 / 100;
    }

    public function freelancerForm()
    {
            $check = Freelancer::where('user_id', auth()->id())->exists();
        
            if($check){
                $notification= array(
                    'messege'=> 'Sorry! it seems you have already registered as a freelancer! ',
                    'title' => 'Registration failed!',
                    'button'=> 'Thank you!', 
                    'alert-type' => 'error'
                ); 
        
                return redirect()->to('/')->with($notification);
            }
            else{
                $freelancer = new Freelancer();
                $freelancer->title = $this->title;
                $freelancer->address = $this->address;
                $freelancer->telephone = $this->telephone;
                $freelancer->city = $this->city;
                $freelancer->description = $this->description;
                $freelancer->language = $this->language;
                $freelancer->branch_id = $this->selectedCategory;
                $freelancer->sub_branch_id = $this->selectedSubcategory;
                $freelancer->rate = $this->rate;
                $freelancer->user_id = auth()->id();

                if ($this->image) {
                    $freelancer->image = $this->image->store('freelancers', 'public');
                }
                
                $freelancer->save();
                
                if($freelancer->save()){

                    event(new FreelancerWasCreated($freelancer));
                    
                    $notification= array(
                        'messege'=> 'You have successfully created your freelancer\'s profile!',
                        'title' => 'Successful! Welcome on board',
                        'button'=> 'Continue!', 
                        'alert-type' => 'success'
                    ); 
            
                    return redirect()->to('/')->with($notification);
                }else{

                    $notification= array(
                        'messege'=> 'There was an error creating your profile, please try again later',
                        'title' => 'There was an Error',
                        'button'=> 'Continue!',
                        'alert-type' => 'error'
                    ); 
            
                    return redirect()->back()->with($notification);
                }
            }   
    }
    
    public function render()
    {
        return view('livewire.free-lancer.create');
    }
}