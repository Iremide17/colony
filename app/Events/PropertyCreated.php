<?php

namespace App\Events;

use App\Models\Property;
use Illuminate\Queue\SerializesModels;

class PropertyCreated
{
    use SerializesModels;

    
    public $property;

    public function __construct(Property $property)
    {
        $this->property = $property;
    }
}