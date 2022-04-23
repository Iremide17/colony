<?php

namespace Database\Factories;

use App\Models\Agent;
use Illuminate\Support\Str;
use App\Models\PropertyType;
use App\Models\PropertyCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence();

        return [
            'title'                 => $title,
            'slug'                  => Str::slug($title . '-' . now()->getPreciseTimestamp(4)),
            'price'                 => $this->faker->numberBetween($min = 1000, $max = 2500),
            'area'                  => rand(67, 100),
            'built'                 => now(),
            'bedroom'               => rand(1, 5),
            'bathroom'              => rand(1, 5),
            'purpose'               => $this->faker->randomElement(['For-sale', 'For-rent']),
            'address'               =>  $this->faker->city(),
            'latitude'                   =>  $this->faker->latitude(-90,90),
            'longitude'                   =>  $this->faker->longitude(-90,90),
            'postal'                =>  $this->faker->postcode(),
            'image'                 => 'properties/p-'. rand(1, 12) . '.png',
            'image2'                => 'properties/p-'. rand(1, 12) . '.png',
            'image3'                => 'properties/p-'. rand(1, 12) . '.png',
            'video'                 => null,
            'rentFrequent'          => $this->faker->randomElement(['daily', 'weekly', 'monthly', 'yearly']),
            'description'           =>  $this->faker->paragraph(10),
            'isFurnished'           => rand(0, 1),
            'isFenced'              => rand(0, 1),
            'isWified'              => rand(0, 1),
            'isParked'              => rand(0, 1),
            'isAirConditioned'      => rand(0, 1),
            'isSwimmed'             => rand(0, 1),
            'isTiled'                 => rand(0, 1),
            'isTapped'                   => rand(0, 1),
            'isAvailable'           => rand(0, 1),
            'isVerified'            => rand(0, 1),
            'property_category_id'               => $attribute['property_category_id'] ?? PropertyCategory::factory(),
            'property_type_id'               => $attribute['property_type_id'] ?? PropertyType::factory(),
            'agent_id'               => $attribute['agent_id'] ?? Agent::factory(),
        ];
    }
}