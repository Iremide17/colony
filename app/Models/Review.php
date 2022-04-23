<?php

namespace App\Models;

use App\Traits\HasUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;
    use HasUser;

    const TABLE = 'reviews';
    protected $table = self::TABLE;

    protected $fillable = ['body','rating','user_id'];
}