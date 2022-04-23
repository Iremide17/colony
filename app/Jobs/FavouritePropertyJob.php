<?php

namespace App\Jobs;

use App\Models\User;
use App\Models\Property;

class FavouritePropertyJob
{
    private $property;
    private $user;

    public function __construct(Property $property, User $user)
    {
        $this->property = $property;
        $this->user = $user;
    }

    public function handle()
    {
        if ($this->property->isFavouritedBy($this->user)) {
            throw CannotFavouriteItem::alreadyFavoured('property');
        }

        $this->property->favouritedBy($this->user);
    }
}