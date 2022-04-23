<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\AgentSeeder;
use Database\Seeders\BranchSeeder;
use Database\Seeders\StatusSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\PrioritySeeder;
use Database\Seeders\PropertySeeder;
use Database\Seeders\SubBranchSeeder;
use Database\Seeders\UserTableSeeder;
use Database\Seeders\FreelancerSeeder;
use Database\Seeders\ApplicationSeeder;
use Database\Seeders\PropertyTypeSeeder;
use Database\Seeders\PropertyCategorySeeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(BranchSeeder::class);
        $this->call(SubBranchSeeder::class);
        $this->call(ApplicationSeeder::class);
        $this->call(PropertyTypeSeeder::class);
        $this->call(PropertyCategorySeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(PrioritySeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(AgentSeeder::class);
        $this->call(FreelancerSeeder::class);
        $this->call(PropertySeeder::class);    
    }
}