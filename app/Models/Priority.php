<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Priority extends Model
{
    use HasFactory;

    const TABLE = 'priorities';
    protected $table = self::TABLE;

    protected $fillable = [
        'name',
        'color',
    ];

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'priority_id');
    }
}
