<?php

namespace App\Models;

use App\Cast\TitleCast;
use App\Traits\HasUser;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Freelancer extends Model implements Viewable
{
    use HasFactory;
    use HasUser;
    use InteractsWithViews;

    const TABLE = 'freelancers';
    protected $table = self::TABLE;

    protected $fillable = [
       
        'title',
        'telephone',
        'address',
        'city',
        'rate',
        'language',
        'image',
        'description',
        'branch_id',
        'sub_branch_id',
        'isVerified',
        'user_id',
    ];

    protected $with = [
        'userRelation','branch','subBranches'
    ];

    protected $casts = [
        'isVerified' => 'boolean',
        'title'  =>  TitleCast::class,
        'language' => 'array',
    ];

    public function id(): int
    {
        return $this->id;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function rate(): int
    {
        return $this->rate;
    }

    public function description(): string
    {
        return $this->description;
    }

    public function excerpt(int $limit = 250): string
    {
        return Str::limit(strip_tags($this->description()) , $limit);
    }


    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function subBranches(): BelongsTo
    {
        return $this->belongsTo(SubBranch::class, 'sub_branch_id');
    }

    public function jobs(): HasMany
    {
        return $this->hasMany(Job::class);
    }

    public function getCreatedDateAttribute()
    {
        return $this->created_at->format('M, d Y');
    }

    public function scopeVerified(Builder $query): Builder
    {
        return $query->where('isVerified', true);
    }

    public function scopeSearch($query, $term)
    {
        $term = "%$term%";
        return $query->where(function($query) use ($term) {
            $query->where('title', 'like', $term)
                    ->orWhere('description', 'like', $term);

        });
    }

    public function scopeLoadLatest(Builder $query, $count = 4)
    {
        return $query->inRandomOrder()
            ->paginate($count);
    }

    public function getVerifyBadgeAttribute()
    {

        $verify = [
            '0' => 'Pending',
            '1' => 'Accepted',
        ];

        return $verify[$this->isVerified];
    }
}