<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLeadsRequests extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'bail|required|string|max:255',
            'email' => 'bail|required|string|email|max:255',
            'country_code' => 'bail|required|string|max:4',
            'mobile' => 'bail|required|number|max:15',
            'subject' => 'bail|required|string|max:255',
            'country' => 'bail|required|string|max:30',
            'state' => 'bail|required|string|max:30',
            'city' => 'bail|required|string|max:30'
        ];
    }
}
