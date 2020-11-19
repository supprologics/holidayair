<?php

namespace App\Http\Requests\Airlines;

use Illuminate\Foundation\Http\FormRequest;

class AirlinesUpdateRequest extends FormRequest
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
            'code'=>'required',
            'country_id'=>'required',
            'name'=>'required',
        ];
    }
}
