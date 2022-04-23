<?php

namespace App\Http\Livewire\Pages\Property;

use Livewire\Component;
use App\Models\Property;
use App\Models\PropertyType;
use Livewire\WithPagination;
use App\Models\PropertyCategory;


class Index extends Component
{

    use WithPagination;

    public $count = 5;
    public $search = '';
    public $type = '';
    public $category = '';
    public $purpose = '';
    public $price = '';
    public $airCondition;
    public $swimming;
    public $tapped;
    public $tiled;

    public $categories;
    public $types;

    protected $queryString = [
        'type' => ['except' => '' ],
        'search' => ['except' => ''],
        'category' => ['except' => ''],
        'purpose' => ['except' => ''],
        'price' => ['except' => ''],
        'airCondition' => ['except' => ''],
        'tiled' => ['except' => ''],
        'swimming' => ['except' => ''],
        'tapped' => ['except' => ''],
    ];

    public function mount()
    {
        $this->categories = PropertyCategory::all()->pluck('name', 'id');
        $this->types = PropertyType::all()->pluck('name', 'id');
    }
    
    public function loadMore()
    {
        $this->count += 3;
    }

    protected $listener = [
        'refreshProperty' => 'updatingSearchWord'
    ];


    public function getPropertiesProperty()
    {
        return Property::when($this->category, function($query, $category) {
            $query->whereHas('category', function ($query) use ($category) {
                $query->where('id', $category);
            });
        })
        ->when($this->type, function($query, $type) {
            $query->whereHas('type', function ($query) use ($type) {
                $query->where('id', $type);
            });
        })
        ->when($this->purpose, function($query) {
            $query->where('purpose',$this->purpose);
        })
        ->when($this->airCondition, function($query) {
            $query->where('isAirConditioned',$this->airCondition);
        })
        ->when($this->tiled, function($query) {
            $query->where('isTiled',$this->tiled);
        })
        ->when($this->tapped, function($query) {
            $query->where('isTapped',$this->tiled);
        })
        ->when($this->swimming, function($query) {
            $query->where('isSwimmed',$this->swimming);
        })
        ->search(trim($this->search))
        ->loadLatest($this->count);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function resetFilter()
    {
        $this->purpose = '';
        $this->type = '';
        $this->category = '';
        $this->price = '';
        $this->search = '';
        $this->airCondition = '';
        $this->swimming = '';
        $this->tapped = '';
        $this->tiled = '';
    }

    public function render()
    {
        $purpose = ['for-sale' => 'For-sale', 'for-rent' => 'For-rent'];
        $prices = ['0' => '0', '1000' => '1000', '2000' => '2000', '30000' => '30000', '50000' => '50000', '100000' => '100000'];

        return view('livewire.pages.property.index',[
            'properties'     => $this->properties,
            'purpose' => $purpose,
            'prices'    => $prices,
        ]);
    }
    
}