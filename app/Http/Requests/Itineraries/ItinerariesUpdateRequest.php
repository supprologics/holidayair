<?php

namespace App\Http\Requests\Itineraries;

use Illuminate\Foundation\Http\FormRequest;

class ItinerariesUpdateRequest extends FormRequest
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
            'title'=>'required',
            'tour_id'=>'required',
            'description'=>'required',
        ];
    }
}
