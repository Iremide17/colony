<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PropertyCategory;

class PropertyCategorySeeder extends Seeder
{
    public function run()
    {
        $type = collect([
            $this->createType(
                'Family House',
                'flaticon-beach-house-2'
            ),
            $this->createType(
                'Student Apartment',
                'flaticon-beach-house-2'
            ),
            $this->createType(
                'House & Villa',
                'flaticon-cabin'
            ),
            $this->createType(
                'Apartment',
                'flaticon-apartments'
            ),
            $this->createType(
                'Office & Studio',
                'flaticon-student-housing'
            ),
        ]);
    }

    private function createType(string $name, string $icon)
    {
        return PropertyCategory::factory()->create(compact('name', 'icon'));
    }
}