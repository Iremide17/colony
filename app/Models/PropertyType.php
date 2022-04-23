<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyType extends Model
{
    use HasFactory;

    const TABLE = 'property_types';
    protected $table = self::TABLE;

    protected $fillable = [
        'name',
    ];
}