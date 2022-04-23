<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubBranch extends Model
{
    use HasFactory;

    const TABLE = 'sub_branches';
    protected $table = self::TABLE;

    protected $fillable = [
        'name',
        'branch_id'
    ];

    protected $with =[
        'branch'
    ];

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function freelancers(): HasMany
    {
        return $this->hasMany(Freelancer::class);
    }
}