<?php

namespace App\Jobs;

use App\Models\Ticket;
use Illuminate\Support\Str;
use Illuminate\Bus\Queueable;
use App\Http\Requests\TicketRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class TicketJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $title;
    private $category;
    private $priority;
    private $message;
    
    public function __construct(
        string $title,
        string $category,
        string $priority,
        string $message
    )
    {
        $this->title = $title;
        $this->category = $category;
        $this->priority = $priority;
        $this->message = $message;
    }

    public static function fromRequest(TicketRequest $request): self
    {
        return new static(
            $request->title(),
            $request->category(),
            $request->priority(),
            $request->message(),
        );
    }

    
    public function handle()
    {
        $ticket = Ticket::create([
            'title'     => $this->title,
            'user_id'   => Auth::user()->id,
            'ticket_id' => strtoupper(Str::random(10)),
            'category_id'  => $this->category,
            'priority'  => $this->priority,
            'message'   => $this->message,
            'status'    => "Open",
        ]);

        return $ticket;
    }
}
