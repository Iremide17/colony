<?php

namespace Database\Seeders;

use App\Models\Priority;
use Illuminate\Database\Seeder;

class PrioritySeeder extends Seeder
{
    public function run()
    {
        $status = collect([
            $this->createPriority(
                'Low',
                'gray'
            ),
            $this->createPriority(
                'Medium',
                'cyan'
            ),
            $this->createPriority(
                'High',
                'brown'
            ),
        ]);
    }

    private function createPriority(string $name, string $color)
    {
        return Priority::factory()->create(compact('name', 'color'));
    }
}
