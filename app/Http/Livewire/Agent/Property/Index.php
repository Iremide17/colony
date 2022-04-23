<?php

namespace App\Http\Livewire\Agent\Property;

use Livewire\Component;
use App\Models\Property;
use App\Jobs\DeleteModel;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $selectedRows = [];
    public $selectPageRows = false;
    public $searchWord = '';
    public $count = 5;
    protected $queryString = [
        'searchWord' => ['except' => ''],
    ];

    public function updatedSelectPageRows($value)
    {
        if ($value) {
            $this->selectedRows = $this->properties->pluck('id')->map(function ($id) {
                return (string) $id;
            });
        }
        else{
            $this->reset(['selectedRows', 'selectPageRows']);
        }
    }
    
    public function getPropertiesProperty()
    {
        return Property::currentAgent(auth()->user())->search(trim($this->searchWord))->latest()->paginate($this->count);
    }

    public function deleteAll()
    {
        Property::whereIn('id', $this->selectedRows)->delete();

        $this->dispatchBrowserEvent('success', ['message' => 'All selected properties were deleted']);

        $this->reset(['selectedRows', 'selectPageRows']);
    }

    public function delete($id)
    {
        $property = Property::where('id', $id)->first();
        
        DeleteModel::dispatch($property);

        $this->dispatchBrowserEvent('success', [
            'message'     => $property->title(). ' deleted successfully',
        ]);

        $this->reset();
    }
    
    public function render()
    {
        return view('livewire.agent.property.index',[
            'properties'     => $this->properties,
        ]);
    }
}