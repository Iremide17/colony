<?php
namespace App\Traits;

use App\Models\User;
use App\Models\Ticket;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasTickets
{
    public function tickets()
    {
        return $this->ticketsRelation;
    }

    public function ticketsRelation(): MorphMany
    {
        return $this->morphMany(Ticket::class, 'ticketsRelation', 'ticketable_type', 'ticketable_id');
    }

    public function ticketedBy(User $user)
    {
        $this->ticketsRelation()->create(['user_id' => $user->id()]);

        $this->unsetRelation('ticketsRelation');
    }

    public function isTicketedBy(User $user): bool
    {
        return $this->ticketsRelation()->where('user_id', $user->id())->exists();
    }
}