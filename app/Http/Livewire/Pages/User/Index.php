<?php

namespace App\Http\Livewire\Pages\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class Index extends Component
{
    use WithFileUploads;
    
    public $user;
    public $details = [];
    public $photo;

    
    public function mount(User $user)
    {
        $this->user = $user;
        $this->details = $this->user->toArray();
    }

    public function updateProfileInformation()
    {

        Validator::make($this->details, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($this->user->id)],
        ])->validate();

        $this->user->update([
            'name'         => $this->details['name'],
            'email'         => $this->details['email'],
        ]);

        $this->dispatchBrowserEvent('success', [
            'message'     => 'Updated successfully',
        ]);

    }

    public function updatedPhoto()
    {
        Validator::make($this->details, [
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
        ])->validate();

        if (isset($this->photo)) {
            File::delete(storage_path('public/' .$this->user->profile_photo_path));
            $this->user->update(['profile_photo_path' => $this->photo->store('profile-photos', 'public')]);
        }

        $this->dispatchBrowserEvent('success', [
            'message'     => 'Image updated successfully',
        ]);
    }
    
    public function render()
    {
        return view('livewire.pages.user.index');
    }
}