<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = collect([
            $this->createCategory(
                'Uncategorized',
                'green'
            ),
            $this->createCategory(
                'Billing/Payments',
                'yellow'
            ),
            $this->createCategory(
                'Technical question',
                'purple'
            ),
        ]);
    }

    private function createCategory(string $name, string $color)
    {
        return Category::factory()->create(compact('name', 'color'));
    }
}
