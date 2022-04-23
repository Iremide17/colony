<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Database\Eloquent\Model;

class DeleteModalComponent extends Component
{
    
    public $modalHeading = '';
    public $modalMessage = '';
    public $showModal = false;
    public $model;

    protected $listeners = ['showModal'];

    public function showModal($modelType, $modelId, $modalHeading, $modalMessage)
    {
        $this->showModal = true;
        $this->model = $modelType::findOrFail($modelId);
        $this->modalHeading = $modalHeading;
        $this->modalMessage = $modalMessage;
    }

    public function destroy()
    {
        try {
            $this->model->delete();
            $this->emit('refreshComponent');
            $this->emit('successAlert', 'Deleted Successfully');
            $this->showModal = false;
        } catch (\Throwable $th) {
            $this->emit('successError', 'Problem Deleting, Try again later');
        }
    }
    
    public function render()
    {
        return view('livewire.delete-modal-component');
    }
}