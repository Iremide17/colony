<?php

namespace App\Traits;

use App\Models\Favourite;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasFavourites
{
    public function favourites()
    {
        return $this->favouritesRelation;
    }

    public function favouritesRelation(): MorphMany
    {
        return $this->morphMany(Favourite::class, 'favouritesRelations', 'favouriteable_type', 'favouriteable_id');
    }

    public static function bootHasfavourites()
    {
        static::deleting(function ($model) {
            $model->favouritesRelation()->delete();
            $model->unsetRelation('favouritesRelations');
        });
    }

    public function favouritedBy(User $user)
    {
        $this->favouritesRelation()->create(['user_id' => $user->id()]);

        $this->unsetRelation('favouritesRelation');
    }

    public function disFavouritedBy(User $user)
    {
        optional($this->favouritesRelation()->where('user_id', $user->id())->first())->delete();
        $this->unsetRelation('favouritesRelation');
    }

    public function isFavouritedBy(User $user): bool
    {
        return $this->favouritesRelation()->where('user_id', $user->id())->exists();
    }
}