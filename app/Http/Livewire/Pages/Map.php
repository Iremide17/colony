<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use App\Models\Property;

class Map extends Component
{
    public $long = '';
    public $lat = '';
    public $geoJson;

    public function loadLocations()
    {
        $props = Property::verified()
        ->available()
        ->orderBy('created_at','desc')
        ->get();

        $customLocations = [];

        foreach ($props as $prop) {
            $customLocations[] = [
                'type' => 'Feature',
                'geometry' => [
                    'coordinates' => [$prop->longitude, $prop->latitude],
                    'type' => 'Point'
                ],
                'properties' => [
                    'locationId' => $prop->id,
                    'title' => $prop->title,
                    'image' => $prop->image,
                    'description' => $prop->description
                ]
            ];
        }

        $geoLocation = [
            'type' => 'FeatureCollection',
            'features' => $customLocations
        ];

        $geoJson = collect($geoLocation)->toJson();
        $this->geoJson = $geoJson;

        $this->reset();
    }
    
    public function render()
    {
        $this->loadLocations();
        return view('livewire.pages.map');
    }
}