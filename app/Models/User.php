<?php

namespace App\Models;

use App\Models\PointAble;
use App\Traits\HasPoints;
use Illuminate\Support\Str;
use App\Traits\ModelHelpers;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Notifications\Notifiable;
use function Illuminate\Events\queueable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable implements MustVerifyEmail, PointAble
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use ModelHelpers;
    use HasPoints;

    const SUPERADMIN = 1;
    const ADMIN =2;
    const AGENT = 3;
    const FREELANCER = 4;
    const USER = 5;

    const TABLE = 'users';

    protected $table = self::TABLE;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
        'telephone'
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'created_at' => 'datetime',
        'trial_ends_at'     => 'datetime'
        // 'username'  => TitleCast::class
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function agent(): HasOne
    {
        return $this->hasOne(Agent::class);
    }

    public function freelancer(): HasOne
    {
        return $this->hasOne(Freelancer::class);
    }
    
    public function booking(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }

    public function id(): int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function telephone(): string
    {
        return $this->telephone;
    }

    public function type(): int
    {
        return (int) $this->type;
    }

    public function createdAt(): string
    {
        return $this->created_at;
    }


    public function createdAtDate(): string
    {
        return $this->created_at->format('d F Y');
    }

    public function isSuperAdmin(): bool
    {
        return $this->type() === self::SUPERADMIN;
    }

    public function isAdmin(): bool
    {
        return $this->type() === self::ADMIN;
    }

    public function isAgent(): bool
    {
        return $this->type() === self::AGENT;
    }

    public function isFreelancer(): bool
    {
        return $this->type() === self::FREELANCER;
    }

    public function isUser(): bool
    {
        return $this->type() === self::USER;
    }

     public function joinedDate()
     {
         return $this->created_at->format('d/m/Y');
     }
   
    public function getRouteKeyName()
    {
        return 'id';
    }

}