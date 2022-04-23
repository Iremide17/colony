<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'                             => ['required', 'max:50'],
            'price'                             => ['required'],
            'purpose'                           => ['required'],
            'rentFrequent'                      => ['required'],
            'built'                             => ['required'],
            'category'                          => ['required'],
            'type'                              => ['required'],
            'address'                           => ['required'],
            'city'                              => ['required'],
            'state'                              => ['required'],
            'description'                       => ['required'],
            'agreement'                         => ['required'],
            'image'                             => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'image2'                            => ['sometimes', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'image3'                            => ['sometimes', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'video'                             => ['nullable'],
        ];
    }

    public function title(): string
    {
        return $this->get('title');
    }

    public function price(): string
    {
        return $this->get('price');
    }

    public function area(): ?string
    {
        return $this->get('area');
    }

    public function built(): string
    {
        return $this->get('built');
    }

    public function bedroom(): ?string
    {
        return $this->get('bedroom');
    }

    public function bathroom(): ?string
    {
        return $this->get('bathroom');
    }

    public function category(): int
    {
        return $this->get('category');
    }

    public function type(): int
    {
        return $this->get('type');
    }

    public function purpose(): string
    {
        return $this->get('purpose');
    }

    public function address(): ?string
    {
        return $this->get('address');
    }

    public function city(): ?string
    {
        return $this->get('city');
    }

    public function state(): ?string
    {
        return $this->get('state');
    }

    public function postal(): ?string
    {
        return $this->get('postal');
    }

    public function latitude(): ?string
    {
        return $this->get('latitude');
    }

    public function longitude(): ?string
    {
        return $this->get('longitude');
    }

    public function rentFrequent(): ?string
    {
        return $this->get('rentFrequent');
    }

    public function description(): string
    {
        return $this->get('description');
    }

    public function isFurnished(): bool
    {
        return $this->boolean('isFurnished');
    }

    public function isFenced(): bool
    {
        return $this->boolean('isFenced');
    }

    public function isWified(): bool
    {
        return $this->boolean('isWified');
    }

    public function isParked(): bool
    {
        return $this->boolean('isParked');
    }

    public function isAirConditioned(): bool
    {
        return $this->boolean('isAirConditioned');
    }

    public function isSwimmed(): bool
    {
        return $this->boolean('isSwimmed');
    }

    public function isTapped(): bool
    {
        return $this->boolean('isTapped');
    }

    public function isTiled (): bool
    {
        return $this->boolean('isTiled ');
    }

    public function image(): ?string
    {
        return $this->image;
    }

    public function image2(): ?string
    {
        return $this->image2;
    }

    public function image3(): ?string
    {
        return $this->image3;
    }

    public function video(): ?string
    {
        return $this->get('video');
    }

    public function agent(): ?int
    {
        return $this->get('agent_id');
    }
}