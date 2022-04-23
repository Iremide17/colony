<?php

namespace App\Http\Livewire\Pages\Property;

use Livewire\Component;
use App\Models\Property;
use Livewire\WithPagination;
use App\Models\Comment as comm;

class Comment extends Component
{

    use WithPagination;
    
    public $property;
    public $count = 3;

    public function mount(Property $property)
    {
        $this->property = $property;
    }

    public function loadMore()
    {
        $this->count += 3;
    }

    public function getCommentsProperty()
    {
        return comm::where('commentable_id', $this->property->id())->paginate($this->count);
    }
    
    public function render()
    {
        return view('livewire.pages.property.comment',[
            'comments' => $this->comments 
        ]);
    }
}