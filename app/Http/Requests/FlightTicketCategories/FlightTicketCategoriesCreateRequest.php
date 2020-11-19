<?php

namespace App\Http\Requests\FlightTicketCategories;

use Illuminate\Foundation\Http\FormRequest;

class FlightTicketCategoriesCreateRequest extends FormRequest
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
            'name'=>'required|unique:flight_tickets_categories'
        ];
    }
}
