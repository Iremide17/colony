<?php

namespace App\Http\Livewire\Admin\Transaction;

use Livewire\Component;
use App\Models\Transaction;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $selectedRows = [];
    public $selectPageRows = false;
    public $count = 10;
    public $searchWord = '';

    protected $queryString = [
        'searchWord' => ['except' => ''],
    ];

    public function updatedSelectPageRows($value)
    {
        if ($value) {
            $this->selectedRows = $this->transactions->pluck('id')->map(function ($id) {
                return (string) $id;
            });
        }
        else{
            $this->reset(['selectedRows', 'selectPageRows']);
        }
    }

    public function getTransactionsProperty()
    {
        return Transaction::search($this->searchWord)->loadLatest($this->count);
    }


    public function render()
    {
        return view('livewire.admin.transaction.index',[
            'transactions' => $this->transactions
        ]);
    }
}
