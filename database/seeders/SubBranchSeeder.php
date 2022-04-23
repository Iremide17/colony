<?php

namespace Database\Seeders;

use App\Models\SubBranch;
use Illuminate\Database\Seeder;

class SubBranchSeeder extends Seeder
{
    public function run()
    {
        $subbranch = collect([
            $this->createSubBranch(
                'Networking',
                1
            ),
            $this->createSubBranch(
                'Computer Appreciation',
                1
            ),
            $this->createSubBranch(
                'Programmer',
                1
            ),
            $this->createSubBranch(
                'Cable Subscription',
                1
            ),
            $this->createSubBranch(
                'CCTV Installation',
                1
            ),
            $this->createSubBranch(
                'Interior Decorator',
                2
            ),
            $this->createSubBranch(
                'Artist',
                2
            ),
            $this->createSubBranch(
                'Hair Dresser',
                3
            ),
            $this->createSubBranch(
                'Shoe Maker',
                3
            ),
            $this->createSubBranch(
                'House Decor',
                3
            ),
            $this->createSubBranch(
                'Barbing',
                3
            ),
            $this->createSubBranch(
                'Hair Dresser',
                3
            
            ),
            $this->createSubBranch(
                'Panting / Wall Paper Fixing',
                3
            ),
        ]);
    }

    private function createSubBranch(string $name, int $branch_id)
    {
        return SubBranch::factory()->create(compact('name', 'branch_id'));
    }
}