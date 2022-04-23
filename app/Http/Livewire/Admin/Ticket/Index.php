<?php

namespace App\Http\Livewire\Admin\Ticket;

use App\Models\Status;
use App\Models\Ticket;
use App\Models\Booking;
use App\Models\Comment;
use Livewire\Component;
use App\Models\Category;
use App\Models\Priority;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;

    public $count = 5;
    public $searchWord = '';
    public $category = '';
    public $priority = '';
    public $status = '';
    public $ticket_details;
    public $body;
    public $commentable_id;
    public $commentable_type = 'tickets';
    public $depth = 0;

    protected $queryString = [
        'searchWord' => ['except' => ''],
        'category' => ['except' => ''],
        'priority' => ['except' => ''],
        'status' => ['except' => ''],
    ];
    
    public function Ticket_details($ticket_id)
    {
        $this->ticket_details = Ticket::where('id',$ticket_id)->first();
        $this->commentable_id = $this->ticket_details->id();
    }

    public function getTicketsProperty()
    {
        return Ticket::when($this->category, function($query, $category) {
            $query->whereHas('category', function ($query) use ($category) {
                $query->where('id', $category);
            });
        })
        ->when($this->status, function($query, $status) {
            $query->whereHas('status', function ($query) use ($status) {
                $query->where('id', $status);
            });
        })
        ->when($this->priority, function($query, $priority) {
            $query->whereHas('priority', function ($query) use ($priority) {
                $query->where('id', $priority);
            });
        })
        ->search(trim($this->searchWord))
        ->loadLatest($this->count);
    }

    public function commentForm()
    {
        // dd($this->body, $this->commentable_id, $this->commentable_type, $this->depth);
        
        $comment = new Comment([
            'depth'             => $this->depth,
            'body'              => $this->body,
        ]);

        $comment->useredBy(auth()->user());
        $comment->commentable_type = $this->commentable_type;
        $comment->commentable_id = $this->commentable_id;
        $comment->save();

        $this->reset();
    }

    public function resetAll()
    {
        $this->reset();
    }

    public function updateTicket($ticket, $value)
    {
        $updateTicket = Ticket::find($ticket['id']);
        $updateTicket->update(['status_id' => $value]);
        $this->dispatchBrowserEvent('success', [
            'message'     => 'Success! Ticket updated successfully',
        ]);
    }

    public function render()
    {

        $priorities = Priority::all();
        $statuses = Status::all();
        $categories = Category::all();

        return view('livewire.admin.ticket.index', [
            'tickets' => $this->tickets,
            'priorities' => $priorities,
            'statuses' => $statuses,
            'categories' => $categories,
        ]);
    }
}
