<?php

namespace Database\Seeders;

use App\Models\PropertyType;
use Illuminate\Database\Seeder;

class PropertyTypeSeeder extends Seeder
{
    
    public function run()
    {
        $type = collect([
            $this->createType(
                'Self Contain',
            ),
            $this->createType(
                'Single Room',
            ),
            $this->createType(
                'Duplex',
            )
        ]);
    }

    private function createType(string $name)
    {
        return PropertyType::factory()->create(compact('name'));
    }
}