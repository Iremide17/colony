<?php

namespace App\Models;

use App\Traits\HasUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;
    use HasUser;

    const TABLE = 'transactions';
    public $table = self::TABLE;

    protected $fillable = [
        'amount_paid',
        'status', 
        'trans_id',
        'ref_id',
        'booking_id',
        'user_id',
        'isVerified'
    ];

    protected $casts = [
        'isVerified' => 'boolean',
    ];

    public function id(): int
    {
        return $this->id;
    }

    public function tcode(): string
    {
        return $this->trans_id;
    }

    public function rcode(): string
    {
        return $this->ref_id;
    }

    public function paidAmount(): string
    {
        return $this->amount_paid;
    }

    public function paidDate(): string
    {
        return $this->created_at->format('d, M Y');
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function getVerificationBadgeAttribute()
    {

        $verify = [
            '0' => 'Unverified',
            '1' => 'Verified',
        ];

        return $verify[$this->isVerified];
    }

    public function scopeSearch($query, $term)
    {
        $term = "%$term%";
        return $query->where(function($query) use ($term) {
            $query->where('trans_id', 'like', $term)
                    ->orWhere('ref_id', 'like', $term);

        });
    }

    public function scopeLoadLatest(Builder $query, $count = 4)
    {
        return $query->inRandomOrder()
            ->paginate($count);
    }

}
