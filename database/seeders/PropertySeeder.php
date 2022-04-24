<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Property;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $property = collect([
            $this->createProperty(
                'new house around ondo lipakala',
                'new-house-around-ondo-lipakala',
                1500,
                300,
                25,
                now(),
                1,
                1,
                'for-rent',
                '10, aboderin street orita challenge ibadan',
                'Ondo city',
                'Ondo',
                200621,
                '7.10380666404',
                '4.8500226183',
                'daily',
                'Do you need help moving to your new home? Our logistics department has got you covered. <br>
                                You Interact with our e-commerce & points platform, Earn points as you search,
                                order and make bookings for items available',
                false,
                true,
                false,
                false,
                false,
                false,
                true,
                true,
                true,
                true,
                'properties/p-1.png',
                'properties/p-2.png',
                'properties/p-3.png',
                'properties/pv-1.mp4',
                1,
                1,
                1
            ),
            $this->createProperty(
                'Ondo road house for rent',
                'ondo-road-house-for-rent',
                1100,
                250,
                25,
                now(),
                1,
                1,
                'for-rent',
                '10, aboderin street orita challenge',
                'Ondo city',
                'Ondo',
                200621,
                '7.0833',
                '4.8333',
                'daily',
                'Do you need help moving to your new home? Our logistics department has got you covered. <br>
                            You Interact with our e-commerce & points platform, Earn points as you search,
                            order and make bookings for items available',
                true,
                true,
                true,
                true,
                true,
                true,
                true,
                true,
                true,
                true,
                'properties/p-1.png',
                'properties/p-2.png',
                'properties/p-3.png',
                'properties/pv-1.mp4',
                2,
                1,
                1
            ),
        ]);
    }

    private function createProperty(
        string $title,
        string $slug,
        int $price,
        int $discount,
        int $area,
        string $built,
        string $bedroom,
        string $bathroom,
        string $purpose,
        string $address,
        string $city,
        string $state,
        int $postal,
        string $latitude,
        string $longitude,
        string $rentFrequent,
        string $description,
        bool $isFurnished,
        bool $isFenced,
        bool $isWified,
        bool $isParked,
        bool $isAirConditioned,
        bool $isSwimmed,
        bool $isTiled,
        bool $isTapped,
        bool $isAvailable,
        bool $isVerified,
        string $image,
        string $image2,
        string $image3,
        string $video,
        int $property_category_id,
        int $property_type_id,
        int $agent_id
    ) {
        return Property::factory()->create(compact(
            'title',
            'slug',
            'price',
            'discount',
            'area',
            'built',
            'bedroom',
            'bathroom',
            'purpose',
            'address',
            'city',
            'state',
            'postal',
            'latitude',
            'longitude',
            'rentFrequent',
            'description',
            'isFurnished',
            'isFenced',
            'isWified',
            'isParked',
            'isAirConditioned',
            'isSwimmed',
            'isTiled',
            'isTapped',
            'isAvailable',
            'isVerified',
            'image',
            'image2',
            'image3',
            'video',
            'property_category_id',
            'property_type_id',
            'agent_id',
        ));
    }
}