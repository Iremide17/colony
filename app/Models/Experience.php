<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Experience extends Model
{
    use HasFactory;

    const TABLE = 'experiences';
    protected $table = self::TABLE;

    protected $fillable = [
       
        'month',
        'year',
        'image',
        'description',
        'freelancer_id',
    ];

    protected $with =[
        'freelancer'
    ];

    protected $casts = [
        'month' => 'datetime',
        'year' => 'datetime'
    ];

    public function freelancer(): BelongsTo
    {
        return $this->belongsTo(Freelancer::class);
    }

    public function id(): int
    {
        return $this->id;
    }

    public function getMonthAttribute()
    {
        return $this->month->format('m');
    }

    public function getYearAttribute()
    {
        return $this->year->format('Y');
    }
}
