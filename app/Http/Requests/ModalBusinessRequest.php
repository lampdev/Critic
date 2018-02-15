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
            'business-name' => 'required|unique|max:255',
            'business-description' => 'required',
            'business-wto' => 'required|max:255',
            'business-wto-description' => 'required',
            'business-pricing' => 'required|min:1|max:4',
            'business-website' => 'required',
            'business-gluten-free' => 'sometimes|in:on,1,off',
            'business-gf-description' => 'required'
        ];
    }
}
