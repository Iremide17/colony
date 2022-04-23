<?php

namespace App\Models;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    const TABLE = 'categories';
    protected $table = self::TABLE;

    protected $fillable = ['name'];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
