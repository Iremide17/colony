<?php

namespace App\Exceptions;

use Exception;

class CannotFavouriteItem extends Exception
{
    public static function alreadyFavoured(string $item): self
    {
        return new self("The {$item} cannot be favoured multiple times");
    }
}