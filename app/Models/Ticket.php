<?php

namespace App\Models;

use App\Models\Comment;
use App\Traits\HasUser;
use App\Traits\HasComments;
use App\Contracts\CommentAble;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model implements CommentAble
{
    use HasFactory;
    use HasComments;
    use HasUser;

    const TABLE = 'tickets';
    protected $table = self::TABLE;

    protected $fillable = [
        'user_id', 
        'category_id', 
        'ticket_id', 
        'title', 
        'priority_id',
        'booking_id',
        'message', 
        'status_id',
        'assigned_to_user_id',
        'commentable_type',
        'commentable__id'
    ];

    protected $with =[
        'status', 'priority', 'category', 'userRelation', 'commentsRelation'
    ];

    public function assigned_to_user()
    {
        return $this->belongsTo(User::class, 'assigned_to_user_id');
    }

    public function id(): int
    {
        return $this->id;
    }

    public function title(): string
    {
        return $this->title;
    }

    // public function booking()
    // {
    //     return $this->belongsTo(Booking::class);
    // }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function priority()
    {
        return $this->belongsTo(Priority::class, 'priority_id');
    }

    public function getRouteKeyName()
    {
        return 'ticket_id';
    }

    public function commentAbleTitle(): string
    {
        return $this->title();
    }

    public function scopeFilterTickets($query)
    {
        $query->when(request()->input('priority'), function($query) {
                $query->whereHas('priority', function($query) {
                    $query->whereId(request()->input('priority'));
                });
            })
            ->when(request()->input('category'), function($query) {
                $query->whereHas('category', function($query) {
                    $query->whereId(request()->input('category'));
                });
            })
            ->when(request()->input('status'), function($query) {
                $query->whereHas('status', function($query) {
                    $query->whereId(request()->input('status'));
                });
            });
    }

    public function sendCommentNotification($comment)
    {
        $users = \App\User::where(function ($q) {
                $q->where('type', '2')
                ->where(function ($q) {
                    $q->whereHas('comments', function ($q) {
                        return $q->whereTicketId($this->id);
                    })
                    ->orWhereHas('tickets', function ($q) {
                        return $q->whereId($this->id);
                    }); 
                });
            })
            ->when(!$comment->user_id && !$this->assigned_to_user_id, function ($q) {
                $q->orWhereHas('type', 2);
            })
            ->when($comment->user, function ($q) use ($comment) {
                $q->where('id', '!=', $comment->user_id);
            })
            ->get();
        $notification = new CommentEmailNotification($comment);

        Notification::send($users, $notification);
        if($comment->user_id && auth()->user()->email())
        {
            Notification::route('mail', auth()->user()->email())->notify($notification);
        }
    }

    public function scopeSearch($query, $term)
    {
        $term = "%$term%";
        return $query->where(function($query) use ($term) {
            $query->where('title', 'like', $term)
                    ->orWhere('message', 'like', $term);

        });
    }

    public function scopeLoadLatest(Builder $query, $count = 5)
    {
        return $query->inRandomOrder()
            ->orderBy('created_at','desc')
            ->paginate($count);
    }

}
