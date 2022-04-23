<?php

namespace App\Jobs;

use App\Models\User;
use App\Models\Property;

class UnFavouritePropertyJob
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
        $this->property->disFavouritedBy($this->user);
    }
}