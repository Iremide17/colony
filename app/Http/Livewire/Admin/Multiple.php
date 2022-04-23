<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Jobs\DeleteModel;

class Multiple extends Component
{

    public $model;
    public $field;


    public function acceptAll($id)
    {
        $mode = class_basename($this->model);

        $this->model->update([$this->field => true]);

        $this->dispatchBrowserEvent('success', [
            'message'     => $mode.' accetpted successfully',
        ]);

        $this-> reset();

    }

    public function rejectAll($id)
    {
        $mode = class_basename($this->model);

        $this->model->update([$this->field => false]);

        $this->dispatchBrowserEvent('success', [
            'message'     => $mode.' rejected successfully',
        ]);

        $this-> reset();

    }

    public function deleteAll($id)
    {
        $mode = class_basename($this->model);

        DeleteModel::dispatch($this->model);

        $this->dispatchBrowserEvent('success', [
            'message'     => $mode.' deleted successfully',
        ]);

        $this-> reset();
    }

    public function render()
    {
        return view('livewire.admin.multiple');
    }
}
