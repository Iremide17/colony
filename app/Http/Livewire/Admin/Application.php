<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;
use App\Models\Application as Setting;

class Application extends Component
{
    use WithFileUploads;

    public Setting $application;
    public $app = [];
    public $photo;
    public $appDescription = [''];

    public function mount()
    {
        $this->application = Setting::first();
        $this->app = Setting::first()->toArray();
    }

    public function updateApplicationInformation()
    {

        $this->application->update([
            'name'         => $this->app['name'],
            'alias'         => $this->app['alias'],
            'email'         => $this->app['email'],
            'line1'         => $this->app['line1'],
            'line2'         => $this->app['line2'],
            'slogan'         => $this->app['slogan'],
            'motto'         => $this->app['motto'],
            'whatsapp'         => $this->app['whatsapp'],
            'facebook'         => $this->app['facebook'],
            'instagram'         => $this->app['instagram'],
            'address'         => $this->app['address'],
            'description'         => $this->app['description'],
            'regNo'         => $this->app['regNo'],
            'logistic'         => $this->app['logistic'],
            'cleaning'         => $this->app['cleaning'],
        ]);

        $this->dispatchBrowserEvent('success', [
            'message'     => 'Updated successfully',
        ]);

    }

    public function updatedPhoto()
    {
        dd('hi');
        
        if (isset($this->photo)) {
            File::delete(storage_path('app/' .$this->application->image));
            $this->application->update(['image' => $this->photo->store('applications', 'public')]);
            $this->mount();
        }

        $this->dispatchBrowserEvent('success', [
            'message'     => 'Company logo updated successfully',
        ]);
    }

    public function addDescription()
    {
        $this->appDescription[] = '';
    }

    public function removeDescription($index)
    {
        unset($this->appDescription[$index]);
        $this->appDescription = array_values($this->appDescription);
    }
    
    public function render()
    {
        return view('livewire.admin.application');
    }
}