<?php

namespace Database\Seeders;

use App\Models\Freelancer;
use Illuminate\Database\Seeder;

class FreelancerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Freelancer::factory()->count(1)->create(['user_id' => 4, 'branch_id' => 1, 'sub_branch_id' => 1]);
    }
}