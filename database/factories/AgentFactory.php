<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AgentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'telephone'                 =>  $this->faker->phoneNumber(),
            'address'                   =>  $this->faker->city(),
            'image'                     =>  'agents/brand-'. rand(1,6) . '.png',
            'user_id'                   => $attribute['user_id'] ?? User::factory(),
        ];
  }
}
