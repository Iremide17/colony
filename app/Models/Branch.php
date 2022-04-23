<?php

namespace App\Models;

use App\Models\SubBranch;
use App\Models\Freelancer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Branch extends Model
{
    use HasFactory;

    const TABLE = 'branches';
    protected $table = self::TABLE;

    protected $fillable = [
        'name',
    ];

    protected $with = [
        // 'freelancers'
    ];

    public function id(): int
    {
        return $this->id;
    }

    public function subBranches(): HasMany
    {
        return $this->hasMany(SubBranch::class);
    }

    public function freelancers(): HasMany
    {
        return $this->hasMany(Freelancer::class);
    }
}
 