<?php

namespace App\Http\Livewire\Pages\User;

use App\Models\Job as Jobs;
use App\Models\User;
use Livewire\Component;

class Job extends Component
{

    public $user;
    public $currenJob;

    public function mount(User $user)
    {
        $this->user = $user;
        $this->currenJob = '';
    }

    function viewJob($job_id)
    {
        $job = Jobs::findOrFail($job_id);
        $this->currenJob = $job;
    }

    public function clearViewJob()
    {
        $this->currenJob = '';
    }

    public function cancelJob()
    {
        
    }

    public function getJobsProperty()
    {
       return Jobs::where('user_id', $this->user->id())->get();
    }

    public function render()
    {
        return view('livewire.pages.user.job',[
            'jobs'  => $this->jobs
        ]);
    }
}