<?php

namespace App\Http\Livewire\Pages\Ticket;

use App\Models\Status;
use App\Models\Ticket;
use App\Models\Comment;
use Livewire\Component;
use App\Models\Category;
use App\Models\Priority;

class Index extends Component
{
    public $ticket_details;
     public $body;
    public $commentable_id;
    public $commentable_type = 'tickets';
    public $depth = 0;

    public function Ticket_details($ticket_id)
    {
        $this->ticket_details = Ticket::where('id',$ticket_id)->first();
        $this->commentable_id = $this->ticket_details->id();
    }


    public function getTicketsProperty()
    {
        return Ticket::where('user_id', auth()->id())->get();
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
    
    public function render()
    {

        $priorities = Priority::all();
        $statuses = Status::all();
        $categories = Category::all();
        
        return view('livewire.pages.ticket.index',[
            'tickets' => $this->tickets,
            'priorities' => $priorities,
            'statuses' => $statuses,
            'categories' => $categories,
        ]);
    }
}
