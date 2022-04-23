<?php

namespace App\Jobs;

use App\Models\Property;
use Illuminate\Bus\Queueable;
use App\Http\Requests\PropertyRequest;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class UpdateProperty implements ShouldQueue
{
    use Dispatchable;

    private $property;
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

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        Property $property,
        string $title,
        string $price,
        ?string $area,
        ?string $built,
        ?string $bedroom,
        ?string $bathroom,
        string $category,
        string $type,
        string $purpose,
        ?string $address,
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
        ?string $video
    )
    {
        $this->property = $property;
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
    }

    public static function fromRequest(Property $property, PropertyRequest $request): self
    {
        return new static(
            $property,
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
            
        );
    }

    public function handle(): Property
    {
        $this->property->update([
            'title'                     => $this->title,
            'price'                     => $this->price,
            'area'                      => $this->area,
            'built'                     => $this->built,
            'bedroom'                   => $this->bedroom,
            'bathroom'                  => $this->bathroom,
            'category'                  => $this->category,
            'type'                      => $this->type,
            'purpose'                   => $this->purpose,
            'address'                   => $this->address,
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
        ]);

        if (!is_null($this->image)) {
            SaveImageServiceMultiple::UploadImage($this->image, 'image', $this->property, Property::TABLE);
        }
        if (!is_null($this->image2)) {
            SaveImageServiceMultiple::UploadImage($this->image2, 'image2', $this->property, Property::TABLE);
        }
        if (!is_null($this->image3)) {
            SaveImageServiceMultiple::UploadImage($this->image3, 'image3', $this->property, Property::TABLE);
        }
        if (!is_null($this->video)) {
            SaveVideoService::UploadImage($this->video, 'video', $this->property, Property::TABLE);
        }
        return $this->property;
    }
}
