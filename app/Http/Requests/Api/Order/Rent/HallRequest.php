<?php

namespace App\Http\Requests\Api\Order\Rent;

use Illuminate\Foundation\Http\FormRequest;

class HallRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to category 1.
     */
    public function rules(): array
    {
        return [
            'for_rent' => ['required', 'in:1'],
            'street_width_from' => ['nullable'],
            'street_width_to' => ['nullable'],
            'property_age_from' => ['nullable'],
            'property_age_to' => ['nullable'],
            'face_building_id' => ['nullable'],
            'kitchen' => ['nullable','boolean'],
            'description' => ['nullable']
        ];
    }
}
