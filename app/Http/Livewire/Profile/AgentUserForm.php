<?php

namespace App\Http\Livewire\Profile;

use App\Models\User;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AgentUserForm extends Component
{

    public User $user;
    public $agent = [];

    public function mount()
    {
        $this->user = Auth::user();
        $this->agent = Auth::user()->agent->toArray();
    }

    public function updateAgentInformation()
    {
        Validator::make($this->agent, [
            'telephone' => ['required', 'string', 'max:255'],
            'address' => ['required'],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
        ])->validate();

        $this->user->agent()->update([
            'telephone'           => $this->agent['telephone'],
            'address'           => $this->agent['address'],
        ]);

        $this->dispatchBrowserEvent('success', ['message' => 'Profile updated successfully']);
    }

    public function render()
    {
        return view('livewire.profile.agent-user-form');
    }
}