<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Traits\HasUser;


class Agent extends Model
{
    use HasFactory;
    use HasUser;

    const TABLE = 'agents';
    protected $table = self::TABLE;

    protected $fillable = [

        'telephone',
        'address',
        'image',
        'isVerified',
        'user_id',
    ];

    protected $with = [
        'userRelation'
    ];

    protected $casts = [
        'isVerified' => 'boolean'
    ];

    public function id(): int
    {
        return $this->id;
    }

    public function telephone(): string
    {
        return $this->telephone;
    }

    public function address(): string
    {
        return $this->address;
    }


    public function image(): string
    {
        return $this->image;
    }


    public function getCreatedDateAttribute()
    {
        return $this->created_at->format('M, d Y');
    }


    public function scopeLoadLatest(Builder $query, $count = 4)
    {
        return $query->inRandomOrder()
            ->verified()
            ->paginate($count);
    }

    public function scopeVerified(Builder $query): Builder
    {
        return $query->where('isVerified', true);
    }

    public function scopeSearch($query, $term)
    {
        $term = "%$term%";
        return $query->where(function ($query) use ($term) {
            $query->where('telephone', 'like', $term)
                ->orWhere('address', 'like', $term);
        });
    }
}