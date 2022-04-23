<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    public function run()
    {
        $status = collect([
            $this->createStatus(
                'Open',
                'blue'
            ),
            $this->createStatus(
                'Closed',
                'red'
            ),
        ]);
    }

    private function createStatus(string $name, string $color)
    {
        return Status::factory()->create(compact('name', 'color'));
    }
}
