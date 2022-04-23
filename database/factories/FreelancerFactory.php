<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Branch;
use App\Models\SubBranch;
use Illuminate\Database\Eloquent\Factories\Factory;

class FreelancerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->word();
        
        return [
            'title'                     => $title,
            'city'                      =>  $this->faker->city(),
            'rate'                      => $this->faker->numberBetween($min = 1000, $max = 2500),  
            'language'                  =>  $this->faker->randomElement(['English', 'Yoruba', 'Hausa']),
            'description'               =>  $this->faker->paragraph(10),
            'isVerified'                => rand(0, 1),
            'telephone'                 =>  $this->faker->phoneNumber(),
            'address'                   =>  $this->faker->city(),
            'image'                     =>  'freelancers/brand-'. rand(1,6) . '.png',
            'branch_id'                 => $attribute['branch_id'] ?? Branch::factory(),
            'sub_branch_id'             => $attribute['sub_branch_id'] ?? SubBranch::factory(),
            'user_id'                   => $attribute['user_id'] ?? User::factory(),
        ];
    }
}