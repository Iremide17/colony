<?php

namespace App\Http\Livewire\Pages;

use App\Models\Status;
use App\Models\Booking;
use Livewire\Component;
use App\Models\Category;
use App\Models\Priority;
use Illuminate\Foundation\Bus\DispatchesJobs;

class Ticket extends Component
{
    use DispatchesJobs;
    
    public $booking;


    public function mount(Booking $booking)
    {
        $this->booking = $booking;
    }

    public function raiseTicket()
    {
         $this->dispatchBrowserEvent('ticket-form');
    }
    
    public function render()
    {
        return view('livewire.pages.ticket',[
            'categories' =>   Category::all(),
            'priorities' =>   Priority::all(),
            'statuses' =>   Status::all(),
        ]);
    }
}
