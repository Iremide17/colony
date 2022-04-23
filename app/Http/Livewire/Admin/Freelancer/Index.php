<?php

namespace App\Http\Livewire\Admin\Freelancer;

use App\Models\Branch;
use Livewire\Component;
use App\Models\SubBranch;
use App\Models\Freelancer;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $selectedRows = [];
    public $selectPageRows = false;
    public $searchWord = '';
    public $cat = '';
    public $SubCat = '';
    public $count = 5;
    public $viewFreelancer;
    public $Categories;
    public $SubCategories;
    protected $queryString = [
        'searchWord' => ['except' => ''],
        'cat' => ['except' => ''],
        'SubCat' => ['except' => ''],
    ];

    public function updatedSelectPageRows($value)
    {
        if ($value) {
            $this->selectedRows = $this->freelancers->pluck('id')->map(function ($id) {
                return (string) $id;
            });
        }
        else{
            $this->reset(['selectedRows', 'selectPageRows']);
        }
    }

    public function viewFreelancer($freelancer_id)
    {
        $this->viewFreelancer = Freelancer::where('id',$freelancer_id)->first();
    }

    public function mount()
    {
        $this->Categories = Branch::all()->pluck('name','id' );
        $this->SubCategories = SubBranch::all()->pluck('name','id');
    }
    
    public function getFreelancersProperty()
    {
        return Freelancer::when($this->cat, function($query, $cat) {
            $query->whereHas('branch', function ($query) use ($cat) {
                $query->where('id', $cat);
            });
        })
        ->when($this->SubCat, function($query, $SubCat) {
            $query->whereHas('subBranches', function ($query) use ($SubCat) {
                $query->where('id', $SubCat);
            });
        })
        ->search(trim($this->searchWord))
        ->loadLatest($this->count);
    }

    public function verfication($freelancer, $value)
    {
        $result = Freelancer::findOrFail($freelancer['id']);
        $result->update(['isVerified' => $value]);
        
        $this->dispatchBrowserEvent('success', ['message' => 'Verification updated successfully']);
    }

    public function resetAll()
    {
        $this->viewFreelancer = '';
    }
    
    public function render()
    {
        return view('livewire.admin.freelancer.index', [
            'freelancers' => $this->freelancers
        ]);
    }
}