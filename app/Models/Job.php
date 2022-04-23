<?php

namespace App\Models;

use App\Traits\HasUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{
    use HasFactory;
    use HasUser;

    const TABLE = 'jobs';
    protected $table = self::TABLE;

    protected $fillable = [
        'booking_id',
        'user_id',
        'freelancer_id',
        'branch_id',
        'status',
        'cancel',
        'approved_at',
        'completed_at',
    ];

    protected $with= [
      'userRelation','booking', 'freelancer', 'branch'
    ]; 

    protected $casts = [
        'status' => 'boolean',
        'cancel' => 'boolean',
        'approved_at' => 'datetime',
        'completed_at' => 'datetime',
    ];

    public function booking(): BelongsTo
    {
        return $this->belongsTo(Booking::class);
    }

    public function freelancer(): BelongsTo
    {
        return $this->belongsTo(Freelancer::class);
    }

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function id(): int
    {
        return $this->id;
    }

    public function approvedDate(): ?string
    {
        return $this->approved_at->format('d F Y');
    }

    public function completedDate(): ?string
    {
        return $this->completed_at->format('d F Y');
    }

    public function getStatusBadgeAttribute()
    {

        $status = [
            '0' => 'Pending',
            '1' => 'Accepted',
        ];

        return $status[$this->status];
    }
}