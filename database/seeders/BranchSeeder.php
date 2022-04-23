<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    public function run()
    {
        $branch = collect([
            $this->createBranch(
                'IT & Networking',
            ),
            $this->createBranch(
                'Design & Creative',
            ),
            $this->createBranch(
                'Entrepreneur',
            ),
        ]);
    }

    private function createBranch(string $name)
    {
        return Branch::factory()->create(compact('name'));
    }
}
