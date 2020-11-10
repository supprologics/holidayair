<?php

namespace App\Http\Requests\Itineraries;

use Illuminate\Foundation\Http\FormRequest;

class ItinerariesCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return response::json(array('errors'=>'All fields required'));
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
