<?php

namespace App\Models;

use App\Cast\TitleCast;
use App\Traits\HasUser;
use App\Traits\HasReviews;
use App\Traits\HasTickets;
use App\Traits\HasComments;
use Illuminate\Support\Str;
use App\Models\PropertyType;
use App\Traits\HasFavourites;
use App\Contracts\CommentAble;
use App\Models\PropertyCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Property extends Model implements Viewable, CommentAble
{
    use HasUser;
    use HasFactory;
    use InteractsWithViews;
    use HasReviews;
    use HasTickets;
    use HasFavourites;
    use HasComments;

    const TABLE = 'properties';
    protected $table = self::TABLE;

    protected $fillable = [
        'title',
        'slug',
        'price',
        'discount',
        'area',
        'built',
        'bedroom',
        'bathroom',
        'purpose',
        'address',
        'city',
        'state',
        'postal',
        'latitude',
        'longitude',
        'rentFrequent',
        'description',
        'isFurnished',
        'isFenced',
        'isWified',
        'isParked',
        'isAirConditioned',
        'isSwimmed',
        'isTiled',
        'isTapped',
        'isAvailable',
        'isVerified',
        'image',
        'image2',
        'image3',
        'video',
        'property_category_id',
        'property_type_id',
        'agent_id',
    ];

    protected $with = [
        'agent', 'category', 'type', 'userRelation', 'ticketsRelation', 'favouritesRelation', 'commentsRelation'
    ];

    public function commentAbleTitle(): string
    {
        return $this->title();
    }

    public function commentType(): string
    {
        return 'properties';
    }

    protected $casts = [
        'title'  =>  TitleCast::class,
        'rentFrequent'  =>  TitleCast::class,
        'built' => 'datetime',
    ];

    public function id(): int
    {
        return $this->id;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function area(): string
    {
        return $this->area;
    }

    public function bedroom(): string
    {
        return $this->bedroom;
    }

    public function bathroom(): string
    {
        return $this->bathroom;
    }

    public function slug(): string
    {
        return $this->slug;
    }

    public function description(): string
    {
        return $this->description;
    }

    public function getCreatedDateAttribute()
    {
        return $this->created_at->format('M, d Y');
    }

    public function excerpt(int $limit = 250): string
    {
        return Str::limit(strip_tags($this->description()), $limit);
    }

    public function excerptTitle(int $limit = 10): string
    {
        return Str::limit(strip_tags($this->title()), $limit);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function purpose(): string
    {
        return $this->purpose;
    }

    public function frequency(): string
    {
        return $this->rentFrequent;
    }


    public function yearBuilt(): string
    {
        return $this->built->format('Y');
    }

    public function price(): string
    {
        return $this->price;
    }

    public function discount(): string
    {
        return $this->discount;
    }

    public function address(): string
    {
        return $this->address;
    }


    public function latitude(): string
    {
        return $this->latitude;
    }

    public function longitude(): string
    {
        return $this->longitude;
    }

    public function postalCode(): string
    {
        return $this->postal_code;
    }

    public function firstImage(): ?string
    {
        return $this->image;
    }

    public function secondImage(): ?string
    {
        return $this->image2;
    }

    public function thirdImage(): ?string
    {
        return $this->image3;
    }

    public function video(): ?string
    {
        return $this->video;
    }


    public function scopeVerified(Builder $query): Builder
    {
        return $query->where('isVerified', true);
    }

    public function scopeAvailable(Builder $query): Builder
    {
        return $query->where('isAvailable', true);
    }

    public function scopeCurrentAgent(Builder $query, $user): Builder
    {
        return $query->where('agent_id', $user->agent->id());
    }


    public function scopeLoadLatest(Builder $query, $count = 4)
    {
        return $query->inRandomOrder()
            ->verified()
            ->available()
            ->orderBy('created_at', 'desc')
            ->paginate($count);
    }

    public function scopeSearch($query, $term)
    {
        $term = "%$term%";
        return $query->where(function ($query) use ($term) {
            $query->where('title', 'like', $term)
                ->orWhere('address', 'like', $term);
        });
    }

    public function scopeSearchLocation($query, $term)
    {
        $term = "%$term%";
        return $query->where(function ($query) use ($term) {
            $query->where('state', 'like', $term)
                ->orWhere('address', 'like', $term)
                ->orWhere('city', 'like', $term);
        });
    }

    public function getTypeBadgeAttribute()
    {

        $types = [
            '1' => 'Self-contain',
            '2' => 'Single-room',
            '3' => 'Duplex',
        ];

        return $types[$this->property_type_id];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(PropertyCategory::class, 'property_category_id');
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(PropertyType::class, 'property_type_id');
    }

    public function agent(): BelongsTo
    {
        return $this->belongsTo(Agent::class);
    }

    public function getVerifyBadgeAttribute()
    {

        $verify = [
            '0' => 'Pending',
            '1' => 'Accepted',
        ];

        return $verify[$this->isVerified];
    }

    public function getAvailableBadgeAttribute()
    {

        $available = [
            '0' => 'Not paid',
            '1' => 'Paid',
        ];

        return $available[$this->isAvailable];
    }
}