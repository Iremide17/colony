<?php

namespace App\Http\Livewire\Pages\User;

use App\Models\Job;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Canceljob extends Component
{

    use AuthorizesRequests;

    public $job;
    public $confirmingJobCancel = false;

    public function mount(Job $job)
    {
        $this->job = $job;
    }

    public function confirmJobCancel()
    {
        $this->resetErrorBag();
        $this->confirmingJobCancel = true;
    }

    public function cancelJob()
    {
        $this->job->update(['cancel' => false]);
        $this->dispatchBrowserEvent('success',['message' => 'Job cancelled successfully']);
        $this->reset();
    }

    
    public function render()
    {
        return view('livewire.pages.user.canceljob');
    }
}