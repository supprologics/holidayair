<?php

namespace App\Http\Requests\Deals;

use Illuminate\Foundation\Http\FormRequest;

class DealsUpdateRequest extends FormRequest
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
            'airline_id'=>'required',
            'country_id'=>'required',
            'name'=>'required',
            'flight_type'=>'required',
            'amount'=>'required',
            'description'=>'required',
            'class_type'=>'required'
        ];
    }
}
