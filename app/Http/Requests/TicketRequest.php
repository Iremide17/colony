<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketRequest extends FormRequest
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
            'title'     => 'required',
            'category'  => 'required',
            'priority'  => 'required',
            'message'   => 'required',
            'booking'   => 'required'
        ];
    }

    public function title(): string
    {
        return $this->get('title');
    }

    public function category(): string
    {
        return $this->get('category');
    }

    public function priority(): int
    {
        return $this->get('priority');
    }

    public function message(): string
    {
        return $this->get('message');
    }

    public function booking(): int
    {
        return $this->get('booking');
    }
}
