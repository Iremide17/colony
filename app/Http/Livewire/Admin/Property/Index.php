<?php

namespace App\Http\Livewire\Admin\Property;

use Livewire\Component;
use App\Models\Property;
use App\Jobs\DeleteModel;
use Livewire\WithPagination;
use App\Events\PropertyAccepted;

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
        return Property::search(trim($this->searchWord))->latest()->paginate($this->count);
    }

    public function acceptAll()
    {
        Property::whereIn('id', $this->selectedRows)->update(['isVerified' => true]);

        $this->dispatchBrowserEvent('success', ['message' => 'All selected properties were verified']);

        $this->reset(['selectedRows', 'selectPageRows']);

    }

    public function acceptProperty($id)
    {
        $property = Property::where('id', $id)->first();
        $property->update(['isVerified' => true]);

        event(new PropertyAccepted($property));

        $this->dispatchBrowserEvent('success', [
            'message'     => $property->title().' accepted successfully',
        ]);

        $this->reset();

    }

    
    public function unacceptProperty($id)
    {
        $property = Property::where('id', $id)->first();
        $property->update(['isVerified' => false]);

        $this->dispatchBrowserEvent('success', [
            'message'     => $property->title().' rejected successfully',
        ]);

        $this->reset();

    }


    public function rejectAll()
    {
        Property::whereIn('id', $this->selectedRows)->update(['isVerified' => false]);

        $this->dispatchBrowserEvent('success', ['message' => 'All selected properties were unverified']);

        $this->reset(['selectedRows', 'selectPageRows']);

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
        return view('livewire.admin.property.index', [
            'properties'     => $this->properties,
        ]);
    }
}
