<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModalBusinessRequest extends FormRequest
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
            'business-name' => 'required|unique:businesses,name|max:255',
            'business-type' => 'required',
            'business-description' => 'required',
            'business-wto' => 'required|max:255',
            'business-wto-description' => 'required',
            'business-pricing' => 'required|min:1|max:4',
            'business-website' => 'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/|unique:business_parameter_value,value',
            'business-gluten-free' => 'in:on,off',
            'business-gf-description' => ''
        ];
    }
}
