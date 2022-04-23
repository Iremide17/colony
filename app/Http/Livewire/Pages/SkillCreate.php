<?php

namespace App\Http\Livewire\Pages;

use App\Models\Skill;
use Livewire\Component;

class SkillCreate extends Component
{

    public $showModal = false;
    public $name = '';

    protected $listeners = ['showModal'];

    protected $rules = [
        'name' => 'required|min:3|unique:skills,name',
    ];

    public function showModal()
    {
        // dd('hi');
        $this->showModal = true;
    }

    public function closeModal()
    {
        dd('hi');
        $this->showModal = false;
    }

    public function save()
    {
        $this->validate();
        Skill::create([
            'name' => $this->name
        ]);

        $this->reset('name');
        $this->emit('updateSkills');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.pages.skill-create');
    }
}