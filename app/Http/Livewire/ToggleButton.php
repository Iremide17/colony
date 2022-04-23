<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Database\Eloquent\Model;

class ToggleButton extends Component
{

    public Model $model;
    public string $field;
    public bool $isActive;

    public function mount()
    {
        $this->isActive = (bool) $this->model->getAttribute($this->field);
    }

    public function updated($field,$value)
    {
        if ($this->field == 'logistic') {

            if ($value == 'false') {
                $currentTotal = $this->model->total + 1500;
                $this->model->setAttribute($this->field, $value)->save();
                $this->model->update(['total' => $currentTotal]);
        
                $this->dispatchBrowserEvent('success', [
                    'message'     => $this->field.' successfully added to booking.',
                ]);
            }else {
                $currentTotal = $this->model->total - 1500;
                $this->model->setAttribute($this->field, $value)->save();
                $this->model->update(['total' => $currentTotal]);
                $this->dispatchBrowserEvent('info', [
                    'message'     => $this->field.' successfully removed from booking.',
                ]);
            }
        } elseif($this->field == 'cleaning') {
            if ($value == 'false') {
                $currentTotal = $this->model->total + 1500;
                $this->model->setAttribute($this->field, $value)->save();
                $this->model->update(['total' => $currentTotal]);
        
                $this->dispatchBrowserEvent('success', [
                    'message'     => $this->field.' successfully added to booking.',
                ]);
            }else {
                $currentTotal = $this->model->total - 1500;
                $this->model->setAttribute($this->field, $value)->save();
                $this->model->update(['total' => $currentTotal]);
                $this->dispatchBrowserEvent('info', [
                    'message'     => $this->field.' successfully removed from booking.',
                ]);
            }
        } 
        
        $this->emit('refreshBooking');
        
    }

    
    public function render()
    {
        return view('livewire.toggle-button');
    }
}