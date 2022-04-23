<?php

namespace App\Exceptions;

use Exception;

class CannotReviewItem extends Exception
{
    public static function alreadyReviewed(string $item): self
    {
        return new self("The {$item} cannot be reviewed multiple times");
    }
}
