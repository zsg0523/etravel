<?php

namespace App\Http\Requests\Api;

use App\Models\Travel;
use Illuminate\Foundation\Http\FormRequest;

class TravelRequest extends FormRequest
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
            'travel_name' => 'required|max:25',
            'travel_at' => 'required';
        ];
    }
}
