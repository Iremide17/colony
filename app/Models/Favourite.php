<?php

namespace App\Models;

use App\Traits\HasUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Favourite extends Model
{
    use HasFactory;
    use HasUser;

    const TABLE = 'favourites';
    protected $table = self::TABLE;

    protected $fillable = [
        'user_id',
    ];

    public function id(): int
    {
        return $this->id;
    }

    // public function properties()
    // {
    //     return $this->morphedByMany(Property::class, 'favouriteable');
    // }
}