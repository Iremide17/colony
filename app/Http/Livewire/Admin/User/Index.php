<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class Index extends Component
{

    use WithPagination;

    public $selectedRows = [];
    public $selectPageRows = false;
    public $searchTerm = null;
    public $type = null;
    public $per_page = 5;
    public $sortBy = 'asc';
    public $orderBy = 'name';
    protected $queryString = [
        'type' => ['except' => ''],
        'searchTerm' => ['except' => ''],
    ];

    public function updatedSelectPageRows($value)
    {
        if ($value) {
            $this->selectedRows = $this->users->pluck('id')->map(function ($id) {
                return (string) $id;
            });
        } else {
            $this->reset(['selectedRows', 'selectPageRows']);
        }
    }

    public function getUsersProperty()
    {
        return User::when($this->type, function ($query, $type) {
            return $query->where('type', $type);
        })
            ->search(trim($this->searchTerm))
            ->orderBy($this->orderBy, $this->sortBy)
            ->latest()->paginate($this->per_page);
    }

    public function clearSearchTermFilter()
    {
        $this->searchTerm = null;
    }

    public function clearSearchTypeFilter()
    {
        $this->type = null;
    }

    public function filterUserbyType($type = null)
    {
        $this->resetPage();
        $this->type = $type;
    }

    public function changeUser($user, $type)
    {
        Validator::make(['type' => $type], [
            'type'      => [
                'required',
                Rule::in(User::SUPERADMIN, User::ADMIN, User::AGENT, User::FREELANCER, User::USER),
            ],
        ]);
        $use = User::findOrFail($user['id']);
        $use->update(['type' => $type]);
        $this->dispatchBrowserEvent('success', ['message' => 'User type changed successfully!']);
        $this->reset();
    }



    public function render()
    {
        return view('livewire.admin.user.index', [
            'users'     => $this->users,
        ]);
    }
}