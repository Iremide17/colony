<?php

namespace App\Jobs;

use App\Models\User;
use App\Models\Property;
use App\Events\PropertyCreated;
use App\Services\SaveVideoService;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PropertyRequest;
use App\Services\SaveImageServiceMultiple;
use Illuminate\Foundation\Bus\Dispatchable;

class CreateProperty
{
    use Dispatchable;

    private $title;
    private $price;
    private $area;
    private $built;
    private $bedroom;
    private $bathroom;
    private $category;
    private $type;
    private $purpose;
    private $address;
    private $city;
    private $state;
    private $postal;
    private $latitude;
    private $longitude;
    private $rentFrequent;
    private $description;
    private $isFurnished;
    private $isFenced;
    private $isWified;
    private $isParked;
    private $isAirConditioned;
    private $isSwimmed;
    private $isTiled;
    private $isTapped;
    private $image;
    private $image2;
    private $image3;
    private $video;
    private $agent;
    
    public function __construct(
        string $title,
        string $price,
        ?string $area,
        ?string $built,
        ?string $bedroom,
        ?string $bathroom,
        int $category,
        int $type,
        string $purpose,
        ?string $address,
        ?string $city,
        ?string $state,
        ?string $postal,
        ?string $latitude,
        ?string $longitude,
        ?string $rentFrequent,
        string $description,
        bool $isFurnished,
        bool $isFenced,
        bool $isWified,
        bool $isParked,
        bool $isAirConditioned,
        bool $isSwimmed,
        bool $isTiled,
        bool $isTapped,
        ?string $image,
        ?string $image2,
        ?string $image3,
        ?string $video,
        ?int $agent
    )
    {
        $this->title = $title;
        $this->price = $price;
        $this->area = $area;
        $this->built = $built;
        $this->bedroom = $bedroom;
        $this->bathroom = $bathroom;
        $this->category = $category;
        $this->type = $type;
        $this->purpose = $purpose;
        $this->address = $address;
        $this->city = $city;
        $this->state = $state;
        $this->postal = $postal;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->rentFrequent = $rentFrequent;
        $this->description = $description;
        $this->isFurnished = $isFurnished;
        $this->isFenced = $isFenced;
        $this->isWified = $isWified;
        $this->isParked = $isParked;
        $this->isAirConditioned = $isAirConditioned;
        $this->isSwimmed = $isSwimmed;
        $this->isTiled = $isTiled;
        $this->isTapped = $isTapped;
        $this->image = $image;
        $this->image2 = $image2;
        $this->image3 = $image3;
        $this->video = $video;
        $this->agent = $agent;
    }

    public static function fromRequest(PropertyRequest $request): self
    {
        return new static(
            $request->title(),
            $request->price(),
            $request->area(),
            $request->built(),
            $request->bedroom(),
            $request->bathroom(),
            $request->category(),
            $request->type(),
            $request->purpose(),
            $request->address(),
            $request->city(),
            $request->state(),
            $request->postal(),
            $request->latitude(),
            $request->longitude(),
            $request->rentFrequent(),
            $request->description(),
            $request->isFurnished(),
            $request->isFenced(),
            $request->isWified(),
            $request->isParked(),
            $request->isAirConditioned(),
            $request->isSwimmed(),
            $request->isTiled(),
            $request->isTapped(),
            $request->image(),
            $request->image2(),
            $request->image3(),
            $request->video(),
            $request->agent(),
        );
    }

    public function handle(): Property
    {
        $property = Property::create([
            'title'                     => $this->title,
            'price'                     => $this->price,
            'area'                      => $this->area,
            'built'                     => $this->built,
            'bedroom'                   => $this->bedroom,
            'bathroom'                  => $this->bathroom,
            'property_category_id'      => $this->category,
            'property_type_id'          => $this->type,
            'purpose'                   => $this->purpose,
            'address'                   => $this->address,
            'city'                      => $this->city,
            'state'                     => $this->address,
            'postal'                    => $this->postal,
            'latitude'                  => $this->latitude,
            'longitude'                 => $this->longitude,
            'rentFrequent'              => $this->rentFrequent,
            'description'               => $this->description,
            'isFurnished'               => $this->isFurnished ? true : false,
            'isFenced'                  => $this->isFenced ? true : false,
            'isWified'                  => $this->isWified ? true : false,
            'isParked'                  => $this->isParked ? true : false,
            'isAirConditioned'          => $this->isAirConditioned ? true : false,
            'isSwimmed'                 => $this->isSwimmed ? true : false,
            'isTiled'                   => $this->isTiled ? true : false,
            'isTapped'                  => $this->isTapped ? true : false,
            'agent_id'                  => $this->agent ? $this->agent : Auth::user()->agent->id(),
            'video'                     => $this->video,
        ]);

        SaveImageServiceMultiple::UploadBatch('image', $this->image, $property, Property::TABLE);
        if ($this->video) {
            SaveImageServiceMultiple::UploadBatch('image2', $this->image2, $property, Property::TABLE);
        }
        if ($this->video) {
            SaveImageServiceMultiple::UploadBatch('image3', $this->image3, $property, Property::TABLE);
        }

        if(auth()->user()->type() != User::ADMIN || User::SUPERADMIN){
            event(new PropertyCreated($property));
        }
        return $property;
    }
}
    